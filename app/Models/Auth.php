<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    use HasFactory;
    protected $guard = 'user';

    protected $fillable = [
        'username',
        'password',
        'permission',
    ];
    protected $hidden = [
        'password',
    ];
}
