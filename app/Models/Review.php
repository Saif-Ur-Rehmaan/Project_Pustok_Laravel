<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table="reviews";
    protected $fillable=[
        'user_id',
        'book_id',
        'reviewStars',
        'comment',
    ];
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('F j, Y');
    }

    public function book(){
        return $this->belongsTo(Book::class,'book_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
