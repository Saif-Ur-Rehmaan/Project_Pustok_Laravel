<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealOfTheDay extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'expireDate'
    ];
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
