@extends('admin.main')
@section('dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 poppins">Products</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/dashboard/products/create" class="btn btn-primary">New Product</a>
    <div class="table-responsive col-lg-10">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discounted Price</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discounted_price }}</td>
                        <td>{{ $product->created_at->diffForHumans() }}</td>
                        <td>{{ $product->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="/dashboard/products/{{ $product->slug }}" class="btn btn-info">
                                <span data-feather="eye"></span>
                            </a>
                            <a href="/dashboard/products/{{ $product->slug }}/edit" class="btn btn-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/products/{{ $product->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger border-0"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
