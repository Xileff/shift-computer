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
        $product = Product::with(['category', 'brand'])->firstWhere('slug', $slug);
        // This may not be the best practice just yet(retrieeving the sum score of reviews and the reviews)

        $reviewCount = Review::where('product_id', $product->id)->count();
        $product->score = $reviewCount != 0 ?
            (Review::where('product_id', $product->id)->sum('score') / $reviewCount)
            : 0;
        $product->reviews = Review::where('product_id', $product->id)->get();
        return view('layouts.product', [
            'title' => "Jual $product->name",
            'product' => $product
        ]);
    }
}
