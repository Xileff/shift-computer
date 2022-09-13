@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/rounded.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/icons.css">
    <div class="container mt-5 pt-5">
        {{-- Flash message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif

        @if (session()->has('loginFailure'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('loginFailure') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif

        {{-- Content --}}
        <div class="row rounded-10 shadow">
            <div class="col-md-6 order-md-2 p-5">
                <h1 class="text-center poppins fw-bold">Welcome Back</h1>
                <form class="mb-2 montserrat" action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-50 mx-auto">
                        <button type="submit"
                            class="btn btn-primary rounded-10 w-100 pt-2 pb-2 d-block mx-auto poppins">Login</button>
                    </div>
                    <hr>
                    <div class="w-50 mx-auto">
                        <button type="submit"
                            class="btn btn-warning w-100 rounded-10 px-3 pt-2 pb-2 d-block mx-auto poppins"><i
                                class="bi bi-google"></i> Login
                            with
                            Google</button>
                    </div>
                </form>
                <small class="d-block w-50 mx-auto fs-7">
                    Don't have an account?
                    <a href="/register" class="text-primary">Register now</a>
                </small>
            </div>
            <div class="col-md-6 col-image"></div>
        </div>
    </div>
@endsection
