@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/detail.css">
    <link rel="stylesheet" href="/css/rounded.css">
    <div class="container mt-5 pt-5">
        <div class="row pt-1">
            <div class="col-md-5 d-flex justify-content-center position-relative flex-column p-0">
                <div class="row w-100 ms-0 mb-2">
                    {{-- All images --}}
                    @foreach ($product->gallery->pictures as $picture)
                        <div class="detail-image-wrapper detail-slides w-100 p-0">
                            <div class="numbertext">{{ $loop->iteration }}/{{ count($product->gallery->pictures) }}</div>
                            <img src="{{ $product->gallery->pictures[$loop->index]->name }}" class="detail-image"
                                alt="{{ $product->name }}">
                        </div>
                    @endforeach
                </div>

                {{-- Thumbnails --}}
                <div class="row row-thumbnail">
                    @foreach ($product->gallery->pictures as $picture)
                        <div class="col-2 col-thumbnail">
                            <img src="{{ $product->gallery->pictures[$loop->index]->name }}" class="demo w-100 h-100 cursor"
                                onclick="currentSlide({{ $loop->iteration }})">
                        </div>
                    @endforeach
                </div>

                {{-- Next and prev buttons --}}
                <a class="prev" onclick="plusSlides(1)">&#10094;</a>
                <a class="next" onclick="plusSlides(-1)">&#10095;</a>
            </div>

            {{-- Product Details --}}
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

    <script src="/js/detail-slideshow.js"></script>
@endsection
