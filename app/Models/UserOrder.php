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
        "orderNote_id",
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
    ];
    
    public function book() {
        return $this->belongsTo(Book::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function orderNotes()
    {
        return $this->hasMany(OrderNote::class, 'orderNote_id');
    }
}
