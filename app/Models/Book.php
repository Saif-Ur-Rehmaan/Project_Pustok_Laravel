<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'title',
        'brand',
        'image',
        'tags',
        'extax',
        'priceInUSD',
        'discountPercent',
        'productDescription',
        'manufacturer',
        'color',
        'productCode',
        'availablity',
    ];
}
