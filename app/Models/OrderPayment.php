<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;
    protected $fillable = [
      
    ];
    protected $casts = [
        'payment_details' => 'array', // Cast the JSON field to an array
        'paid_at' => 'datetime',
    ];
}
