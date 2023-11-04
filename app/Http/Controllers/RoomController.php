<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms=Room::whereDate('created_at', '>=', '2023-10-18')->get();
        return view('guests.room_index', compact('rooms'));
    }
}
