@extends('admin.main')
@section('dashboard')
    <link rel="stylesheet" href="/css/product-input.css">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Product</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/products" method="post" class="mb-5" enctype="multipart/form-data"> {{-- route default + method post akan mengarah ke method store(), jika tipe controllernya resource --}}
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label montserrat">Product Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="montserrat">Images(reccomended ratio is 1:1)</label>
                <div class="row py-1">
                    <div class="col">
                        <img src="/assets/product/empty.png" alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="/assets/product/empty.png" alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="/assets/product/empty.png" alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="/assets/product/empty.png" alt="" class="img-fluid picture-input cursor-pointer">
                    </div>
                    <div class="col">
                        <img src="/assets/product/empty.png" alt="" class="img-fluid picture-input cursor-pointer">
                    </div>

                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture1"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture2"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture3"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture4"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture5"
                        class="picture-input">
                </div>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label montserrat">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}" readonly>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="category" class="form-label montserrat">Category</label>
                    <select class="form-select" name="category" id="category">
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="brand" class="form-label montserrat">Brand</label>
                    <select class="form-select" name="brand" id="brand">
                        @foreach ($brands as $b)
                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label montserrat">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" required value="{{ old('price') }}" min="0">

                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="discounted_price" class="form-label montserrat">Discounted Price</label>
                <input type="number" class="form-control @error('discounted_price') is-invalid @enderror"
                    id="discounted_price" name="discounted_price" min="0" value="{{ old('discounted_price') }}">

                @error('discounted_price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label montserrat">Weight(grams)</label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                    name="weight" min="0" value="{{ old('weight') }}">

                @error('weight')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label montserrat">Description</label>
                <input id="description" type="hidden" name="description" class="normal-font"
                    value="{{ old('description') }}" required>
                <trix-editor input="description"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary d-block ms-auto">Upload</button>
        </form>
    </div>

    <script src="/js/preview-image.js"></script>
    <script src="/js/product-slug.js"></script>
@endsection
