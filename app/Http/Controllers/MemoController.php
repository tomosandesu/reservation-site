<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Reservation;


class MemoController extends Controller
{

    public function create($id){
        $reservation=Reservation::find($id);
        return view('employee.memo', compact('reservation'));
    }
    //メモ機能の保存
    public function store(Request $request){
        $validated=$request->validate([
            'memo'=>'required|max:200',
            'reservation_id'=>'required|integer'
        ]);
        $memos=Memo::create($validated);
        return redirect()->route('reservation.detail', $memos);
    }

}
