<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminRoom extends Model
{
    use HasFactory;
    protected $table = 'admin_room';

    // relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relationship with the Room model
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }


}
