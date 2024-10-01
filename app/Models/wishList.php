<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishList extends Model
{
    use HasFactory;
    protected $fillable=[
        'book_id',
        'user_id'
    ];
    function book() {
        return $this->belongsTo(Book::class,'book_id');
    }
    function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
