<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Reservation_slot;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\Memo;

class ReservationController extends Controller
{
 

    //①予約一覧（管理側）
    public function index(Request $request)
    {
        $query = Reservation::query();
    
        if ($request->date) {
            $query->where('date', $request->date);
        }
    
        $reservations = $query->get();
    
        return view('employee.index', compact('reservations'));
    }


    //②ステータス表示（予約処理済み　または　キャンセル済み）
    public function updateStatus($id)
    {
        //contactモデルから該当のIDの情報を取得する
        $reservation=Reservation::find($id);
        //$contactがあれば＝idが明確になる＝未対応ボタン押される
        if($reservation) {
            //ステータスが「０」の時、「１」とする。
            $reservation->status = $reservation->status === 0?1:0;
            $reservation->save();
        }
        return redirect()->route('reservation.index');
    }


    //②予約詳細画面（管理画面）
    public function detail($id)
    {
        $reservation=Reservation::find($id);
        $memos=Memo::all();
        return view('employee.reservation_detail', compact('reservation', 'memos'));
    }

    //③予約内容のキャンセル処理
    public function destroy(Reservation $reservation){
        $reservation->delete();
        return redirect()->route('reservation.destroy');
    }







    //宿泊側画面・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・・


    //①アクセス案内ページ表示
    public function access()
    {
        return view('guests.access');
    }
    //部屋選択画面（宿泊側）
    public function selectRoom($id){
        $plans=Plan::find($id);
        $rooms=Room::all();
        return view('guests.selectRoom', compact('plans', 'rooms'));
    }

    //①カレンダー画面の表示（宿泊側)
    public function showCalendar(Request $request)
    {
        //Planモデルの中でも該当のIDについてのデータを取得する
        $room_id=$request->room_id;
        $plan_id=$request->plan_id;
        $rooms = Room::find($room_id);
        $plans = Plan::find($plan_id);
        return view('guests.calendar', compact('plans', 'rooms'));
    }

    public function getEvents(Request $request, $room_id, $plan_id)
    {
    // 選択された部屋とプランのデータを取得
    $rooms = Room::find($room_id);
    $plans = Plan::find($plan_id);

        $events = [];
    
        foreach ($rooms as $room) {
            foreach ($plans as $plan) {
                // 各部屋・プランに対するreservation_slotを取得
                $slots = Reservation_slot::where('room_id', $room->id)->get();
    
                foreach ($slots as $slot) {
                    // ステータスを判定
                    $status = "⚪";
                    if ($slot->available_count <= 3 && $slot->available_count > 0) {
                        $status = "△";
                    } elseif ($slot->available_count == 0) {
                        $status = "×";
                    }
    
                    // 合計金額を計算
                    $totalPrice = $slot->price + $plan->add_price;
    
                    $events[] = [
                        'title' => '価格:' . $totalPrice . '円, 空き:' . $status,
                        'start' => $slot->date, // 日付はslotのdateから取得
                        'url' => route('reservation.form', ['room' => $room->id, 'plan' => $plan->id, 'slot' => $slot->id]), // 予約フォームへのルートを設定 (ルート名やパラメータは適宜調整してください)
                    ];
                }
            }
        }
    
        return response()->json($events);
    }

    
    //①フォーム画面表示（宿泊側）
    //room_idとplan_idを情報としてもっておかなければならない
    public function form()
    {
        $plans=Plan::all();
        $rooms=Room::all();
        return view('guests.form', compact('plans', 'rooms'));
    }



    //②リクエスト内容をセッションで保存処理（宿泊側）
    public function store(Request $request)
    {
        // 1. リクエストデータをセッションに保存
        session(['data' => $request->all()]);
    
        // 2. 現在のセッションデータを取得
        $sessionData = session('data');
    
        // RoomオブジェクトとPlanオブジェクトの取得（エラーハンドリングは前回の回答を参照）
        $room_id = $sessionData['room_id'];
        $room = Room::find($room_id);
        //該当のRoomモデルの情報取得
        $room_name = $room->room_type;
        //Plan_idも同様に処理
        $plan_id = $sessionData['plan_id'];
        $plan = Plan::find($plan_id);
        $plan_name = $plan->title;
    
        // 3. セッションデータを部分的に更新
        $sessionData['room_name'] = $room_name;
        $sessionData['plan_name'] = $plan_name;

        //Reservation_slotモデルから該当のroom_id（部屋ID）とdate（宿泊日）を取得する
        //理由はその日の宿泊費のデータがほしい
        $prepare = Reservation_slot::where('room_id', $sessionData['room_id'])->where('date', $sessionData['date'])->first();


        // もし$prepareがnullの場合の処理を追加することを考慮。
        $normal_price = $prepare ? $prepare->price : 0;
        //プランによっては追加料金が発生するので、プランごとの追加料金を設定。
        $add_price = 0; // 初期化
        if($sessionData['plan_id'] === '14') {
            $add_price = 1000;
        } elseif($sessionData['plan_id'] === '15') {
            $add_price = 3000;
        } elseif($sessionData['plan_id'] === '16') {
            $add_price = 0;
        }
        ///合計金額を算定する
        $total_price = $add_price + $normal_price;
        
        // セッションの一部を更新
        $sessionData['total_price'] = $total_price;
        // $sessionData['post'] = $post; というように追加。
    
        // 4. 更新したデータを再度セッションに保存
        session(['data' => $sessionData]);
    
        return redirect()->route('reservation.confirm');
    }
    
    
    
    
    

    //確認画面を表示（宿泊側）
    public function confirm()
    {
        return view('guests.confirm');
    }


    //保存内容変更のため、編集画面移動（宿泊側）
    public function edit(Request $request)
    {
        // セッションからデータを取得
        $data = $request->session()->get('data');

        // セッションにデータがない場合は、情報入力フォームにリダイレクト
        if (!$data) {
            return redirect()->route('reservation.form');
        }

        $plans=Plan::all();
        $rooms=Room::all();

        // セッションから取得したデータを編集フォームに渡して表示
        return view('guests.form', compact(['data', 'plans', 'rooms']));
    }
    
    
    //予約確定＋情報保存（宿泊側）
    public function complete(Request $request)
    {
        $data = $request->session()->get('data');
        // データベースにデータを保存するロジック
        Reservation::create($data);
        // その他の処理...
        return redirect()->route('reservation.success', $data);
    }
    public function success()
    {
        $data=Reservation::all();
        return view('welcome', compact('data'));
    }

}
















   //お客様情報内容保存処理
    // public function store(){
    //     $validated = $request->validate([
    //        'room_id'=>'required|integer',
    //        'plan_id'=>'required|integer',
    //        'first_name'=>'required|max:20',
    //        'last_name'=>'required|max:20',
    //        'email'=>'required|string',
    //        'address'=>'required|string',
    //        'phone'=>'required|string',
    //        'message'=>'required|max:200',
    //     ]);
    //     $reservation = Reservation::create($validated);
    //     return redirect()->route('');
    // }
