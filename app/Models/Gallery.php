<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['pictures'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
