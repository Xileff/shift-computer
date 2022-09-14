@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/rounded.css">
    <div class="container mt-5 pt-5">
        <h1 class="poppins fw-bold px-5">{{ auth()->user()->username }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ auth()->user()->picture }}" alt="user_picture" class="img-fluid rounded-circle p-5">
            </div>
            <div class="col-md-8">
                <form action="/profile" class="montserrat">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ auth()->user()->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            value="{{ auth()->user()->username }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ auth()->user()->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" id="date"
                            value="{{ auth()->user()->date_of_birth }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
