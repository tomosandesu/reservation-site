<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation_slot;
use App\Models\Room;
use App\Models\Plan;

class Reservation_SlotController extends Controller
{
    //予約枠設定画面表示
    public function create(Room $room)
    {
        $rooms=Room::all();
        return view('employee.reservation_slot_create', compact('rooms'));
    }
    //予約枠保存
    //保存メソッドのパラメーターにidを入れる
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'available_count' => 'required|integer',
            'price' => 'required|integer',
            'room_id' => 'required|integer'
        ]);
        $reservation_slot = Reservation_slot::create($validated);
        return redirect()->route('reservation_slot.index')->with('message', '保存できました');
    }
    //予約枠一覧画面表示
    public function index(Request $request)
    {
        $query = Reservation_slot::query();
    
        if($request->room_type) {
            $query->whereHas('room', function ($q) use ($request) {
                $q->where('room_type', $request->room_type);
            });
        }
    
        $reservation_slots = $query->get();
    
        return view('employee.reservation_slot_index', compact('reservation_slots'));
    }

    public function edit(Reservation_slot $reservation_slot)
    {
        return view('employee.reservation_slot_edit', compact('reservation_slot'));
    }

    public function update(Request $request, Reservation_slot $reservation_slot)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'available_count' => 'required|integer',
            'price' => 'required|integer',
        ]);
    
        $validated['room_id'] = $reservation_slot->room_id;
        $reservation_slot->update($validated);
        $request->session()->flash('massage', '更新しました');
        return redirect()->route('reservation_slot.index', compact('reservation_slot'));
    }

    public function destroy(Request $request, Reservation_slot $reservation_slot)
    {
        $reservation_slot->delete();
        $request->session()->flash('massage', '削除しました');
        return redirect()->route('reservation_slot.index');
    
    }







}
