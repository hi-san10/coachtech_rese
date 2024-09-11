<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'restaurant_id',
        'date',
        'time',
        'number_of_people'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}