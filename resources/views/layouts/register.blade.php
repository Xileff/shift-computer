@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/rounded.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/icons.css">
    <div class="container mt-5 pt-5 mb-5">
        {{-- Flash message --}}
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif

        {{-- Content --}}
        <div class="row rounded-10 shadow">
            <div class="col-md-6 order-md-2 p-5">
                <h1 class="text-center poppins fw-bold">Welcome</h1>
                <form class="mb-2 montserrat" action="/register" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid  @enderror"
                            id="username" value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-50 mx-auto">
                        <button type="submit"
                            class="btn btn-primary rounded-10 w-100 pt-2 pb-2 d-block mx-auto poppins">Register</button>
                    </div>
                    <hr>
                    <div class="w-50 mx-auto">
                        <button type="submit"
                            class="btn btn-warning w-100 rounded-10 px-3 pt-2 pb-2 d-block mx-auto poppins"><i
                                class="bi bi-google"></i> Register
                            with
                            Google</button>
                    </div>
                </form>
                <div class="d-block w-50 mx-auto fs-7">
                    Already have an account?
                    <a href="/login" class="text-primary">Login now</a>
                </div>
            </div>
            <div class="col-md-6 col-image"></div>
        </div>
    </div>
@endsection
