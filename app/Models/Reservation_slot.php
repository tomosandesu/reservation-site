<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation_slot extends Model
{
    use HasFactory;
    protected $fillable = [
       'room_id',
       'date',
       'available_count',
       'price',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
