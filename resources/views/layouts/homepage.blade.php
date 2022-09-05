@extends('main')
@section('section')
    <link rel="stylesheet" href="css/carousel.css">
    <div class="container-fluid mt-4 pt-5">
        <div id="carouselControl" class="carousel slide" data-bs-ride="carousel">
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
    </div>
@endsection
