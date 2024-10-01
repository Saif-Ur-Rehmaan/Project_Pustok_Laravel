<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'image',
        'displayName',
        'firstName',
        'lastName',
        'provider',
        'providerId',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
       
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];
    public function author()
    {
        return $this->hasMany(Book::class, 'author_id');
    }
    public function review()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
    public function wishlists()
    {
        return $this->hasMany(wishList::class, 'user_id');
    }
}
