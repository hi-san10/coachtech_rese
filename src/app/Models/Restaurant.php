<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'prefecture_id',
        'genre_id',
        'name',
        'image',
        'detail'
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
