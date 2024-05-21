<?php

namespace App\Models;

use App\Models\User;
use App\Models\Issue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory;
    protected $fillable = [
        'response_text',
        'user_id',
        'issue_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

}
