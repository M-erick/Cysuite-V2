<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'type', 'size', 'price', 'is_occupied',
    ];

    // Admin that belongs to the room
    public function admins()
    {
        return $this->belongsToMany(User::class, 'admin_room');
    }
}
