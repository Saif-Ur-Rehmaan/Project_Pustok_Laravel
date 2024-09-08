<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'currency',
        'payment_status',
        'transaction_id',
        'payment_details',
        'paid_at',
    ];
}
