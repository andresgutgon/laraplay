<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'gender',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Enum can be used in validations. Check "Enum rule validation"
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'gender' => GenderEnum::class,
    ];
}
