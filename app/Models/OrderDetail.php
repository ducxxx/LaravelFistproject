<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class OrderDetail extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    use HasFactory, SoftDeletes;

    protected $table = 'order_detail';

    protected $fillable = [
        'order_id',
        'club_book_id',
        'return_date',
        'overdue_day_count',
        'note',
        'order_status'
    ];

    protected $dates = [
        'return_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
