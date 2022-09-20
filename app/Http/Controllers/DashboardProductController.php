<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Picture;
use App\Models\Gallery;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Show all products
    public function index()
    {
        return view('admin.product.index', [
            'title' => 'CompuShifu',
            'products' => Product::latest('updated_at')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create', [
            'title' => 'New Product',
            'brands' => Brand::all(['id', 'name']),
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $rules = [
            'name' => 'required|between:10,255',
            'slug' => 'required|unique:products',
            'category' => 'required|integer|between:1,' . Category::count(),
            'brand' => 'required|integer|between:1,' . Brand::count(),
            'price' => 'required|integer',
            'discounted_price' => 'integer',
            'weight' => 'required|integer',
            'description' => 'required',
            'picture1' => 'required|image',
            'picture2' => 'image',
            'picture3' => 'image',
            'picture4' => 'image',
            'picture5' => 'image'
        ];

        $data = $r->validate($rules);

        if (!$r->discounted_price) {
            $data['discounted_price'] = $data['price'];
        }

        // Only make product record if there's at least 1 picture
        if ($r->file('picture1')) {
            // Make product -> gallery -> pictures
            $product = Product::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'category_id' => $data['category'],
                'brand_id' => $data['brand'],
                'price' => $data['price'],
                'discounted_price' => $data['discounted_price'],
                'weight_in_grams' => $data['weight'],
                'description' => $data['description']
            ]);

            $gallery = Gallery::create();

            // Assign foreign key for the new gallery 
            // This may not be the best idea for assigning gallery_id to Product record
            $gallery->product()->associate($product);
            $product->gallery_id = $gallery->id;

            // Insert pictures into storage
            $pictures = [];

            for ($i = 1; $i <= 5; $i++) {
                if ($r->file("picture$i")) {
                    array_push($pictures, Picture::create(['name' => $r->file("picture$i")->store('public/img/products')]));
                }
            }

            foreach ($pictures as $picture) {
                $picture->gallery()->associate($gallery);
                $picture->save();
            }

            $gallery->save();
            $product->save();
        }

        return redirect()->intended('/dashboard/products/')->with('success', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'title' => "Show : $product->name",
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return dd($product);
    }

    public function checkSlug(Request $r)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $r->name);

        return response()->json(['slug' => $slug]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
