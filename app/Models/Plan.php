<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'add_price'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
