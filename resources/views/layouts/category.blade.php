@extends('main')
<link rel="stylesheet" href="/css/product.css">
<div class="container mt-5 pt-5">
    <h1 class="fw-bold poppins">Category : {{ $name }}</h1>
    <div class="row my-2 py-2 text-center mb-4" data-aos="fade-down">
        @if (count($products))
            @foreach ($products as $product)
                <div class="col-4 col-md-2 p-1">
                    <a href="/products/{{ $product->slug }}">
                        <div class="card product rounded-3 shadow-sm h-100">
                            @if ($product->discounted_price)
                                <p class="discount-tag position-absolute bg-danger px-1 text-light fw-bold">
                                    {{ round((($product->price - $product->discounted_price) / $product->price) * 100, 2) }}%
                                    OFF
                                </p>
                            @endif
                            <div class="p-1">
                                <img src="{{ $product->gallery->pictures[0]->name }}" class="card-img-top product-image"
                                    alt="">
                            </div>
                            <div class="product-body h-100 d-flex flex-column">
                                <p class="fw-bold">{{ $product->name }}</p>
                                <div class="mt-auto">
                                    @if ($product->discounted_price)
                                        <span
                                            class="text-discount fw-bold text-muted text-striped">{{ $product->price }}</span>
                                    @endif
                                    <p class="text-success fw-bold text-price">{{ $product->discounted_price }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="vh-100 d-flex">
                <h1 class="montserrat mx-auto my-5 py-5">Products not available</h1>
            </div>
        @endif
    </div>
</div>
@section('section')
@endsection
