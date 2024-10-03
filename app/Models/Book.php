<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'author_id',
        'subcategory_id',
        'isFeatured',
        'RewardPoints',
        'productSummary',
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
        'availability',
    ];

       // Define the relationship with the SubCategory model
       public function subCategory()
       {
           return $this->belongsTo(BookSubCategory::class, 'subcategory_id');
       }
       public function Userorders()
       {
           return $this->hasMany(UserOrder::class, 'book_id');
       }
       public function author()
       {
           return $this->belongsTo(User::class, 'author_id');
       }
       public function reviews()
       {
           return $this->hasMany(Review::class, 'book_id');
       }
       public function wishlists()
       {
           return $this->hasMany(wishList::class, 'book_id');
       }
       public function deals()
       {
           return $this->hasMany(DealOfTheDay::class, 'book_id');
       }
}
