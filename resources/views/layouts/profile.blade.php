@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/rounded.css">
    <link rel="stylesheet" href="/css/user_profile.css">
    <div class="container mt-5 pt-5 pb-5">
        {{-- Flash message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        <h1 class="poppins fw-bold px-5">{{ auth()->user()->username }}</h1>
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <img src="{{ auth()->user()->picture ? str_replace('public', '/storage', auth()->user()->picture) : '/assets/default.png' }}"
                    alt="user_picture" class="rounded-circle cursor-pointer picture-input user-profile">
            </div>
            <div class="col-md-8">
                <form action="/profile" class="montserrat" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" accept="image/jpg, image/jpeg, image/png" name="picture" id="picture"
                        class="picture-input" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" value="{{ auth()->user()->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            value="{{ auth()->user()->username }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ auth()->user()->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Gender</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="gender0" value="0"
                                {{ auth()->user()->gender == 0 ? 'checked' : '' }}>
                            <label for="gender0" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="gender" id="gender1" class="form-check-input" value="1"
                                {{ auth()->user()->gender == 1 ? 'checked' : '' }}>
                            <label for="gender1" class="form-check-label">Female</label>
                        </div>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label fw-bold">Date of Birth</label>
                        <input type="date" name="date_of_birth"
                            class="form-control @error('date_of_birth') is-invalid @enderror" id="date"
                            value="{{ auth()->user()->date_of_birth }}">
                        @error('date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-50 mx-auto">
                        <button type="submit" class="btn btn-primary w-100 rounded-10 pt-1 pb-1 poppins">Save
                            Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/js/preview-image.js"></script>
@endsection
