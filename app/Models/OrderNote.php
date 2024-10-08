<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderNote extends Model
{
    use HasFactory;
    protected $fillable=[
        'Note'
    ];
    public function userOrder()
    {
        return $this->belongsToMany(UserOrder::class, 'orderNote_id');
    }
}
