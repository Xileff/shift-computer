@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/detail.css">
    <link rel="stylesheet" href="/css/rounded.css">
    <div class="container mt-5 pt-5">
        <div class="row pt-1">
            <div class="col-md-5 d-flex justify-content-center">
                <div class="detail-image-wrapper">
                    <img src="{{ $product->gallery->pictures[1]->name }}" class="detail-image" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-md-7">
                <h3 class="fw-bold text-success montserrat">{{ $product->name }}</h3>
                <div class="pt-1 pb-1">
                    <p>SKU : <span class="fw-bold">{{ $product->id }}</span></p>
                    <p>Berat : <span class="fw-bold">{{ $product->weight_in_grams }} gram</span></p>
                    <p>Kategori : <a href="/categories/{{ $product->category->name }}"
                            class="fw-bold text-success">{{ $product->category->name }}</a></p>
                    <p>Brand : <a href="/brands/{{ $product->brand->name }}"
                            class="fw-bold text-success">{{ $product->brand->name }}</a></p>
                </div>
                <div class="row text-center">
                    <div class="col-6 pt-1 pb-1">
                        <button class="btn btn-success w-100 h-100 rounded-4 poppins">Beli Sekarang</button>
                    </div>
                    <div class="col-6 pt-1 pb-1">
                        <button class="btn btn-warning w-100 h-100 rounded-4 poppins">Masukkan ke keranjang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
