<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
    ];
    public function userProducts(): HasMany
    {
        return $this->HasMany(UserProduct::class, 'user_id', 'id');
    }
}
