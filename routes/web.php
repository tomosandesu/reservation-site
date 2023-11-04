<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\reservation_slotController;
use App\Http\Controllers\planController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//TOP→アクセス案内ページ移動・表示
Route::get('access', [ReservationController::class, 'access'])->name('access.access');

//TOP→お問い合わせフォーム
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
//音合わせ内容保存
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
//お問い合わせ内容表示（管理側）
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
//ステータスの切り替え（管理側）
Route::put('/updateStatus/{id}', [ContactController::class, 'updateStatus'])->name('contact.updateStatus');

//ホテルの予約枠一覧画面（管理側）
Route::get('/reservation_slot', [Reservation_SlotController::class, 'index'])->name('reservation_slot.index');
//予約枠作成画面（管理側）
Route::get('/reservation_slot/create', [Reservation_SlotController::class, 'create'])->name('reservation_slot.create');
//予約枠保存（管理側）
Route::post('/reservation_slot/store', [Reservation_SlotController::class, 'store'])->name('reservation_slot.store');
//予約枠編集（管理側）
//reservation_slotのidを移行できるようにしてね
Route::get('/reservation_slot/{reservation_slot}', [Reservation_SlotController::class, 'edit'])->name('reservation_slot.edit');
//予約枠更新（管理側）
Route::patch('/reservation_slot/{reservation_slot}', [Reservation_SlotController::class, 'update'])->name('reservation_slot.update');
//予約枠削除（管理側）
Route::delete('/reservation_slot/{reservation_slot}', [Reservation_SlotController::class, 'destroy'])->name('reservation_slot.destroy');



//宿泊プラン一覧表示(管理側)
Route::get('/plan/plan', [PlanController::class, 'index'])->name('plan.index');
//写真アップロード（管理側）
Route::post('/plan/{plan}/image', [ImageController::class, 'store'])->name('image.store');
//宿泊プラン作成画面表示（管理側）
Route::get('/plan/create', [PlanController::class, 'create'])->name('plan.create');
//宿泊プラン保存（管理側）
Route::post('/plan/plan', [PlanController::class, 'store'])->name('plan.store');
//宿泊プラン編集画面（管理側）
Route::get('/plan/{plan}', [PlanController::class, 'edit'])->name('plan.edit');
//宿泊プラン更新（管理側）
Route::patch('/plan/{plan}', [PlanController::class, 'update'])->name('plan.update');
//宿泊プラン削除（管理側）
Route::delete('/plan/{plan}', [PlanController::class, 'destroy'])->name('plan.destroy');
//宿泊プラン表示（宿泊側）
Route::get('/plan', [PlanController::class, 'show'])->name('plan.show');
//宿泊プラン詳細表示（宿泊側）
Route::get('/plan/{plan_id}/detail', [PlanController::class, 'detail'])->name('plan.detail');

//部屋選択画面（宿泊側）
Route::get('/select/{plan_id}', [ReservationController::class, 'selectRoom'])->name('select-room');
//空室確認カレンダー画面表示[room_type= 露天風呂付和室](宿泊側)
Route::get('/calendar/{plan_id}/{room_id}', [ReservationController::class, 'showCalendar'])->name('show-Calendar');






//Ajaxでデータバース側から情報取得すしてカレンダーに反映(宿泊側)
Route::get('/get_events', [ReservationController::class, 'getEvents'])->name('get_events');









//お客様情報入力画面表示(宿泊側)
Route::get('/reservation/form', [ReservationController::class, 'form'])->name('reservation.form');
//お客様情報保存処理(宿泊側)
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
//お客情報確認画面表示(宿泊側)
Route::get('/reservation/confirm', [ReservationController::class, 'confirm'])->name('reservation.confirm');
//お客様情報編集画面を表示
Route::get('/reservation/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
//予約確定処理（情報保存処理）
Route::post('/reservation/complete', [ReservationController::class, 'complete'])->name('reservation.complete');
//予約完了画面表示
Route::get('/reservation/success', [ReservationController::class, 'success'])->name('reservation.success');



//客室紹介ページ表示(宿泊側)
Route::get('/room', [RoomController::class, 'index'])->name('room.index');


//予約一覧ページ（管理側）
Route::get('/reservation/index', [ReservationController::class, 'index'])->name('reservation.index');
//予約詳細ページ（管理側）
Route::get('/reservation/{reservations}', [ReservationController::class, 'detail'])->name('reservation.detail');
//予約一覧ステータス（管理側）
Route::put('/reservation/{reservation}', [ReservationController::class, 'updateStatus'])->name('reservation.updateStatus');
//予約内容削除処理（管理側）
Route::delete('/reservation/{reservation}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

//メモ新規作成画面
Route::get('/memo/{memo}', [MemoController::class, 'create'])->name('memo.create');
//予約詳細画面のメモ機能保存処理
Route::post('/memo/{memo}', [MemoController::class, 'store'])->name('memo.store');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
