@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/detail.css">
    <link rel="stylesheet" href="/css/rounded.css">
    <div class="container mt-5 pt-5">
        <div class="row pt-1 mb-3 pb-2">
            <div class="col-md-5 p-0 mb-5">
                <div class="d-flex flex-column justify-content-center position-relative">
                    <div class="row w-100 ms-0 mb-2" data-aos="fade-right">
                        {{-- All images --}}
                        @foreach ($product->gallery->pictures as $picture)
                            <div class="detail-image-wrapper detail-slides w-100 p-0">
                                <div class="numbertext">{{ $loop->iteration }}/{{ count($product->gallery->pictures) }}
                                </div>
                                <img src="{{ str_replace('public', '/storage', $product->gallery->pictures[$loop->index]->name) }}"
                                    class="detail-image" alt="{{ $product->name }}">
                            </div>
                        @endforeach
                    </div>

                    {{-- Thumbnails --}}
                    <div class="row row-thumbnail d-flex justify-content-center" data-aos="fade-up">
                        @foreach ($product->gallery->pictures as $picture)
                            <div class="col-2 col-thumbnail">
                                <img src="{{ str_replace('public', '/storage', $product->gallery->pictures[$loop->index]->name) }}"
                                    class="demo w-100 h-100 cursor" onclick="currentSlide({{ $loop->iteration }})">
                            </div>
                        @endforeach
                    </div>
                    {{-- Next and prev buttons --}}
                    <a class="prev" onclick="plusSlides(1)" data-aos="fade-right">&#10094;</a>
                    <a class="next" onclick="plusSlides(-1)" data-aos="fade-right">&#10095;</a>
                </div>

            </div>

            {{-- Product Details --}}
            <div class="col-md-7 d-flex flex-column px-5" data-aos="fade-down">
                <h3 class="fw-bold text-success poppins">{{ $product->name }}</h3>
                <h4 class="poppins">{{ $product->discounted_price }}</h4>

                {{-- Stars --}}
                <div class="d-flex justify-content-start row-stars mb-2">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($product->score > 1)
                            <img src="/assets/reviews/star_full.png" class="col-2" alt="">
                        @elseif($product->score > 0 && $product->score < 1)
                            <img src="/assets/reviews/star_half.png" class="col-2" alt="">
                        @else
                            <img src="/assets/reviews/star_empty.png" class="col-2" alt="">
                        @endif
                        @php $product->score -= 1 @endphp
                    @endfor
                </div>

                <div class="pt-1 pb-1">
                    <p>SKU : <span class="fw-bold">{{ $product->id }}</span></p>
                    <p>Weight : <span class="fw-bold">{{ $product->weight_in_grams }} gram</span></p>
                    <p>Category : <a href="/categories/{{ $product->category->name }}"
                            class="fw-bold text-success">{{ $product->category->name }}</a></p>
                    <p>Brand : <a href="/brands/{{ $product->brand->name }}"
                            class="fw-bold text-success">{{ $product->brand->name }}</a></p>
                    <br>
                    <p class="fw-bold">Description</p>
                    {!! $product->description !!}
                </div>
                <div class="row text-center mt-auto">
                    <div class="col-6 pt-1 pb-1">
                        <button class="btn btn-success w-100 h-100 py-3 rounded-6 poppins"><span
                                data-feather="dollar-sign"></span> Buy Now</button>
                    </div>
                    <div class="col-6 pt-1 pb-1">
                        <button class="btn btn-warning w-100 h-100 py-3 rounded-6 poppins"><span
                                data-feather="shopping-cart"></span>
                            Add to cart</button>
                    </div>
                </div>
            </div>

        </div>

        <hr class="dropdown-divider">

        {{-- Review --}}
        <div class="row pt-1 mt-3 pt-2 px-5">
            <p class="poppins fw-bold fs-1">Reviews</p>
            @if (count($product->reviews))
                @foreach ($product->reviews as $review)
                    <div class="row mb-4">
                        <p class="fs-5 fw-bold">{{ $review->user->username }}</p>

                        <div class="review-list-stars">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($review->score > 0)
                                    <img src="/assets/reviews/star_full.png" class="col-2" alt="">
                                @else
                                    <img src="/assets/reviews/star_empty.png" class="col-2" alt="">
                                @endif
                                @php $review->score -= 1 @endphp
                            @endfor
                        </div>

                        <p class="fs-7 fw-bold">{{ $review->title }}</p>
                        <p>{{ $review->text }}</p>
                    </div>
                @endforeach
            @else
                <h3 class="montserrat py-3">No reviews yet</h3>
            @endif
        </div>
    </div>

    <script src="/js/detail-slideshow.js"></script>
@endsection
