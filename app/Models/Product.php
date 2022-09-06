<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
}
