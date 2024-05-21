<?php

namespace App\Models;

use App\Models\User;
use App\Models\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rated_user_id',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ratedUser()
    {
        return $this->belongsTo(User::class, 'rated_user_id');
    }
}
