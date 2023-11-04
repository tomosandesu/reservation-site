<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
       'room_type',
       'total_rooms',
    ];
    public function reservation_slots()
    {
        return $this->hasMany(Reservation_slot::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
