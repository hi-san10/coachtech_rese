<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant_owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restaurant_id',
        'email',
        'password',
        'email_verified_at'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
