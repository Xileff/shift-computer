<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['cartItems']; // this calls the relationship method 'cartItems', but its not case sensitive

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

        // TODO : Observe when an User is created, and create a new cart associated to them immediately
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
