<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'image',
        'path',
    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }



}
