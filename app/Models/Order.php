<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    use HasFactory, SoftDeletes;

    protected $table = 'order';

    protected $fillable = [
        'member_id',
        'club_id',
        'order_date',
        'due_date',
    ];

    protected $dates = [
        'order_date',
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_id');
    }
}
