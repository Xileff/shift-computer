<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view("layouts.category", [
            "title" => "Category : " . $category->name,
            "name" => $category->name,
            "products" => $category->products
        ]);
    }
}
