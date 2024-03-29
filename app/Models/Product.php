<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['gallery'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function gallery()
    {
        return $this->hasOne(Gallery::class, 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id');
    }

    public function cartItem()
    {
        return $this->belongsToMany(CartItem::class, 'product_id');
        // refers to CartItem table and the its column for the product id
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
