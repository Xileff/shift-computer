@extends('admin.main')
@section('dashboard')
    <link rel="stylesheet" href="/css/product-input.css">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $product->name }}</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/products/{{ $product->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label montserrat">Product Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $product->name }}" required autofocus>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="montserrat">Images</label>
                <div class="row py-1">
                    <div class="col">
                        <img src="{{ str_replace('public', '/storage', $product->gallery->pictures[0]->name) }}"
                            alt="" class="img-fluid picture-input cursor-pointer">

                        @error('picture1')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(1) ? str_replace('public', '/storage', $product->gallery->pictures[1]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">

                        @error('picture2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(2) ? str_replace('public', '/storage', $product->gallery->pictures[2]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">

                        @error('picture3')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(3) ? str_replace('public', '/storage', $product->gallery->pictures[3]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">

                        @error('picture4')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <img src="{{ $product->gallery->pictures->has(4) ? str_replace('public', '/storage', $product->gallery->pictures[4]->name) : '/assets/product/empty.png' }}"
                            alt="" class="img-fluid picture-input cursor-pointer">

                        @error('picture5')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture0"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture1"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture2"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture3"
                        class="picture-input">
                    <input hidden type="file" accept="image/jpg, image/jpeg, image/png" name="picture4"
                        class="picture-input">
                </div>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label montserrat">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ $product->slug }}"
                    required readonly name="slug" id="slug">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="category" class="form-label montserrat">Category</label>
                    <select class="form-select" name="category_id" id="category_id">
                        @foreach ($categories as $c)
                            @if ($product->category->id == $c->id)
                                <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                            @else
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="brand" class="form-label montserrat">Brand</label>
                    <select class="form-select" name="brand_id" id="brand_id">
                        @foreach ($brands as $b)
                            @if ($product->brand->id == $b->id)
                                <option value="{{ $b->id }}" selected>{{ $b->name }}</option>
                            @else
                                <option value="{{ $b->id }}">{{ $b->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label montserrat @error('price') is-invalid @enderror">Price</label>
                <input type="number" class="form-control" value="{{ $product->price }}" required min="0"
                    name="price">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="discounted_price" class="form-label montserrat">Discounted Price</label>
                <input type="number" class="form-control @error('discounted_price') is-invalid @enderror"
                    name="discounted_price" value="{{ $product->discounted_price }}" min="0" required>
                @error('discounted_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="weight_in_grams" class="form-label montserrat">Weight(grams)</label>
                <input type="number" class="form-control @error('weight_in_grams') is-invalid @enderror"
                    name="weight_in_grams" value="{{ $product->weight_in_grams }}" required min="0"
                    id="weight_in_grams">
                @error('weight_in_grams')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label montserrat">Description</label>
                <input id="description" type="hidden" name="description" class="normal-font"
                    value="{!! $product->description !!}">
                <trix-editor input="description"></trix-editor>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary d-block ms-auto">Save Changes</button>
        </form>
    </div>
    <script src="/js/preview-image.js"></script>
    <script src="/js/product-slug.js"></script>
@endsection
