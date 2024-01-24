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

    const ORDER_STATUS_PENDING = 0;
    const ORDER_STATUS_CREATED = 1;
    const ORDER_STATUS_RETURN = 2;
    const ORDER_STATUS_OVER_DUA_DATE = 3;
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
