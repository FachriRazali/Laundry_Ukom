<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',   // ✅ Added
        'address', // ✅ Added
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
