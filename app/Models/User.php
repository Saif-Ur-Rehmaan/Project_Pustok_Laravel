<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User  extends Authenticatable implements HasAvatar,HasName,FilamentUser
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

    // -------------------------------------------------------Filament User Configuration------------------------------------------------------
     
    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role_id,  [2]);  
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->image;
    }
    public function getFilamentName(): string
    {
        return "{$this->displayName}";
    }










    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

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
        return $this->hasMany(WishList::class, 'user_id');
    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }
    public function orders()
    {
        return $this->hasMany(UserOrder::class, 'user_id');
    }
}
