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
        'name_of_reading_kana',
        'image',
        'storage_image',
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

    public function scopeRestaurantSearch($query, $prefecture_id)
    {
        if(!empty($prefecture_id))
        {
            $query->where('prefecture_id', $prefecture_id);
        }
    }

    public function scopeGenreSearch($query, $genre_id){
        if(!empty($genre_id))
        {
            $query->where('genre_id', $genre_id);
        }
    }

    public function scopeNameSearch($query, $name)
    {
        if(!empty($name))
        {
            $query->where('name', 'like', '%'.$name.'%')->orWhere('name_of_reading_kana', 'like', '%'.$name.'%');
        }
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
