<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        return view('layouts.homepage', [
            "title" => "CompuShifu",
            "products" => Product::latest('updated_at')->get(),
            "categories" => Category::all()
        ]);
    }

    public function details($slug)
    {
        $product = Product::with(['category', 'brand', 'reviews'])->firstWhere('slug', $slug);
        // This may not be the best practice just yet(retrieeving the sum score of reviews)
        $product->score = Review::where('product_id', $product->id)->sum('score') / 5;
        return view('layouts.product', [
            'title' => $product->title,
            'product' => $product
        ]);
    }
}
