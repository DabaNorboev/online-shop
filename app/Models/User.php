<?php

namespace App\Models;

use \Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
    ];
}
