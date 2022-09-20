@extends('admin.main')
@section('dashboard')
    <link rel="stylesheet" href="/css/product-input.css">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $product->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="#" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label montserrat">Product Name</label>
                <input type="text" class="form-control" id="name" value="{{ $product->name }}" disabled>
            </div>

            <div class="mb-3">
                <label class="montserrat">Images</label>
                <div class="row py-1">
                    <div class="col">
                        <img src="{{ str_replace('public', '/storage', $product->gallery->pictures[0]->name) }}"
                            alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(1) ? str_replace('public', '/storage', $product->gallery->pictures[1]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(2) ? str_replace('public', '/storage', $product->gallery->pictures[2]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(3) ? str_replace('public', '/storage', $product->gallery->pictures[3]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(4) ? str_replace('public', '/storage', $product->gallery->pictures[4]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label montserrat">Slug</label>
                <input type="text" class="form-control" value="{{ $product->slug }}" disabled>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="category" class="form-label montserrat">Category</label>
                    <select class="form-select" disabled>
                        <option>{{ $product->category->name }}</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="brand" class="form-label montserrat">Brand</label>
                    <select class="form-select" disabled>
                        <option>{{ $product->brand->name }}</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label montserrat">Price</label>
                <input type="number" class="form-control" value="{{ $product->price }}" disabled>
            </div>

            <div class="mb-3">
                <label for="discounted_price" class="form-label montserrat">Discounted Price</label>
                <input type="number" class="form-control" value="{{ $product->discounted_price }}" disabled>
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label montserrat">Weight(grams)</label>
                <input type="number" class="form-control" value="{{ $product->weight_in_grams }}" disabled>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label montserrat">Description</label>
                <input id="description" type="hidden" class="normal-font" value="{!! $product->description !!}" disabled>
                <trix-editor input="description"></trix-editor>
            </div>
        </form>
    </div>
@endsection
