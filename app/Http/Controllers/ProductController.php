<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

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
        $product = Product::firstWhere('slug', $slug);
        return view('layouts.product', [
            'title' => $product->title,
            'product' => $product
        ]);
    }
}
