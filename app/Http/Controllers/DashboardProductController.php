<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Picture;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.product.edit', [
            'title' => "Edit : $product->name",
            'product' => $product,
            'brands' => Brand::all(['id', 'name']),
            'categories' => Category::all(['id', 'name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Product $product)
    {
        $rules_regular = [
            'name' => 'required|between:10,255',
            'slug' => 'required',
            'category_id' => 'required|integer|between:1,' . Category::count(),
            'brand_id' => 'required|integer|between:1,' . Brand::count(),
            'price' => 'required|integer',
            'discounted_price' => 'integer',
            'weight_in_grams' => 'required|integer',
            'description' => 'required',
        ];

        $rules_picture = [
            'picture0' => 'image',
            'picture1' => 'image',
            'picture2' => 'image',
            'picture3' => 'image',
            'picture4' => 'image'
        ];

        if ($r->slug != $product->slug) {
            $rules_regular['slug'] = 'required|unique:products';
        }

        $data_regular = $r->validate($rules_regular);
        $data_picture = $r->validate($rules_picture);

        if (!$r->discounted_price) {
            $data_regular['discounted_price'] = $data_regular['price'];
        }

        // Update non picture data
        Product::where('id', $product->id)->update([
            'name' => $data_regular['name'],
            'slug' => $data_regular['slug'],
            'category_id' => $data_regular['category_id'],
            'brand_id' => $data_regular['brand_id'],
            'price' => $data_regular['price'],
            'discounted_price' => $data_regular['discounted_price'],
            'weight_in_grams' => $data_regular['weight_in_grams'],
            'description' => $data_regular['description'],
        ]);

        // Update picture data
        $gallery = $product->gallery;

        for ($i = 0; $i < 5; $i++) {
            if ($r->file("picture$i")) {
                // Store the new pictures in storage and make new Picture instances
                $new_picture = Picture::create(['name' => $r->file("picture$i")->store('public/img/products')]);

                // Delete the previous pictures from storage, then update the Picture record in db
                if ($gallery->pictures->has($i)) {
                    Storage::delete($gallery->pictures[$i]->name);
                    $gallery->pictures[$i]->update(['name' => $new_picture->name]);
                }

                // Or insert a new picture, if the (n)th picture didnt exist before
                else {
                    $new_picture->gallery()->associate($gallery);
                    $new_picture->save();
                }
            }
        }

        return redirect()->intended('/dashboard/products/')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // TODO : refactor store() and define destroy()
        $pictures = $product->gallery->pictures;
        foreach ($pictures as $picture) {
            Storage::delete($picture->name);
        }

        $product->delete();

        return redirect()->intended('/dashboard/products/')->with('success', 'Product deleted');
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
