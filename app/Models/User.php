<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Use your existing 'users' table
    protected $table = 'users';

    // Columns you can mass assign
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];

    // Disable timestamps since you only have created_at
    public $timestamps = false;


    protected $hidden = [
        'password',
    ];

    // Automatically hash passwords when setting this attribute (Laravel 9+)
    protected $casts = [
        'password' => 'hashed',
    ];
}
