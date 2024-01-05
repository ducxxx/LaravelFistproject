<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class BookVote extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    use HasFactory, SoftDeletes;

    protected $table = 'book_vote';

    protected $fillable = [
        'book_id',
        'star_vote',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
