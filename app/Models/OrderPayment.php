<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;
    // Table name
    protected $table = 'order_payments';

    // Fields that are mass assignable
    protected $fillable = [
        'order_id',
        'payment_method_id',
        'amount',
        'currency',
        'payment_status',
        'transaction_id',
        'payment_details',
        'paid_at',
    ];

    // Cast payment_details to array
    protected $casts = [
        'payment_details' => 'array',
        'paid_at' => 'datetime',
    ];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(UserOrder::class, 'order_id');
    }
    public function paymentMethod()
    {
        return $this->belongsTo(UserOrder::class, 'payment_method_id');
    }
}
