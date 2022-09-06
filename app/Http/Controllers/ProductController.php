<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        return view('layouts.homepage', [
            "title" => "CompuShifu",
            "products" => Product::latest('updated_at')->get()
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
