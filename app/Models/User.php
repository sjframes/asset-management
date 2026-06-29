<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'employee_id',
        'department',
        'designation',
        'phone',
        'email',
        'role',
        'status',
        'password',
        'last_login',

        // Forgot Password
        'reset_requested',
        'reset_requested_at',
        'temporary_password',
        'force_password_change',
    ];

    /**
     * Hidden attributes.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'     => 'datetime',
            'last_login'            => 'datetime',
            'reset_requested_at'    => 'datetime',
            'force_password_change' => 'boolean',
            'reset_requested'       => 'boolean',
            'password'              => 'hashed',
        ];
    }
}