<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'password',
        'last_login',
        'is_superuser',
        'username',
        'first_name',
        'last_name',
        'is_staff',
        'is_active',
        'date_joined',
        'full_name',
        'email',
        'address',
        'birth_date',
        'phone_number',
        'avatar',
        'otp_code',
        'limit_time_verify'
    ];

    protected $dates = [
        'last_login',
        'date_joined',
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
