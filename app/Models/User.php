<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'role_id'
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
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'admin_room');
    }
    public function guestRooms()
    {
        return $this->belongsToMany(Room::class, 'guest_room');
    }

    //  a user can have many issues .
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    // Rating relationships
    public function givenRatings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    public function receivedRatings()
    {
        return $this->hasMany(Rating::class, 'rated_user_id');
    }
}
