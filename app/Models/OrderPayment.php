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
        'order_Code',
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
  
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
