<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'reservation_id',
        'review_point',
        'comment'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
