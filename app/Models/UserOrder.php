<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'Code',
        "orderStatus",
        "quantity",
        "pricePerProduct",
        "shippingFee",
        "firstName",
        "lastName",
        "address",
        "countryName",
        "cityName",
        "stateName",
        "zipCode",
        "contactNumber",
        "orderNote",
    ];
    
    function book() {
        return $this->belongsTo(Book::class);
    }
}
