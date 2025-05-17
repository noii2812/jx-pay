<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopUpHistory extends Model
{
    protected $fillable = [
        'order_id',
        'reference_number',
        'coin_amount',
        'price',
        'payment_method',
        'status'
    ];

    protected $casts = [
        'coin_amount' => 'integer',
        'price' => 'decimal:2',
    ];
}
