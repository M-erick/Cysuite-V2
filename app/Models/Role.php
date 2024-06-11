<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * User Roles by Id
     */
    public const IS_GUEST = 1;
    public const IS_NORMAL_ADMIN = 2;
    public const  IS_SUPERVISOR_ADMIN = 3 ;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
