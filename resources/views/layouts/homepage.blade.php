@extends('main')
@section('section')
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/card_category.css">
    <link rel="stylesheet" href="css/product.css">
    <div class="container-fluid mt-4 pt-5">
        <div id="carouselControl" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#" class="">
                        <img src="img/bannerAMD.jpg" class="d-block w-100 carousel-img " alt="nvidia">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#" class="">
                        <img src="img/bannerIntel.jpg" class="d-block w-100 carousel-img " alt="amd">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselControl" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselControl" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">
            <h1 class="fw-bold">Our catalogues</h1>
            <div class="row my-2 py-2 text-center mb-4" id="categoriesList">
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/cpu.png" class="card-img-top category-image"
                                alt="">
                            <p>CPU</p>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/gpu.png" class="card-img-top category-image"
                                alt="">
                            <P>GPU</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/ram.png" class="card-img-top category-image"
                                alt="">
                            <P>RAM</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/motherboard.png" class="card-img-top category-image"
                                alt="">
                            <P>Motherboard</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/ssd.png" class="card-img-top category-image"
                                alt="">
                            <P>SSD</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/hdd.png" class="card-img-top category-image"
                                alt="">
                            <P>HDD</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/psu.png" class="card-img-top category-image"
                                alt="">
                            <P>PSU</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/casing.png" class="card-img-top category-image"
                                alt="">
                            <P>Casing</P>
                        </div>
                    </a>
                </div>
                <div class="col-3 col-md-2 p-1">
                    <a href="#">
                        <div class="card card-category">
                            <img src="storage/img/carousel_category/monitor.png" class="card-img-top category-image"
                                alt="">
                            <P>Monitor</P>
                        </div>
                    </a>
                </div>
            </div>

            <h1 class="fw-bold">Latest Products</h1>
            <div class="row my-2 py-2 text-center mb-4">
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
                                    <img src="{{ $product->gallery->pictures[0]->name }}"
                                        class="card-img-top product-image" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="fw-bold">{{ $product->name }}</p>
                                    @if ($product->discounted_price)
                                        <span
                                            class="text-discount fw-bold text-muted text-striped">{{ $product->price }}</span>
                                    @endif
                                    <p class="text-success fw-bold text-price">{{ $product->discounted_price }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <script src="js/carousel-category.js"></script>
@endsection
