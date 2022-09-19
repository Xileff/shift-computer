@extends('admin.main')
@section('dashboard')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 poppins">My posts</h1>
    </div>

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
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->discounted_price }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>{{ $p->updated_at }}</td>
                        <td>
                            <a href="/dashboard/products/{{ $p->slug }}" class="btn btn-info">
                                <span data-feather="eye"></span>
                            </a>
                            <a href="/dashboard/products/{{ $p->slug }}/edit" class="btn btn-warning">
                                <span data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/products/{{ $p->slug }}" method="post" class="d-inline">
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
