<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRecipt extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'order_Code',
        'FilePath'
    ];
 
}
