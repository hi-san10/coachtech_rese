<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $table = 'admin_users';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function admin()
    {
        return $this->belongsTo(AdminUser::class);
    }
}
