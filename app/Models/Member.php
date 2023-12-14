<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    use HasFactory, SoftDeletes;

    protected $table = 'member';

    protected $fillable = [
        'user_id',
        'address',
        'birth_date',
        'email',
        'full_name',
        'phone_number',
    ];

    protected $dates = [
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
