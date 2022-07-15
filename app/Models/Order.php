<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model // orders
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_number',
        'order_date',
        'total',
        'shipping_date',
        'is_delivered',
        'customer_id',
    ];
}
