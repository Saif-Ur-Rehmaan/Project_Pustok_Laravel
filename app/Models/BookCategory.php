<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'isFeatured'
    ];
    public function subcategories()
    {
        return $this->hasMany(BookSubCategory::class, 'category_id');
    }
}
