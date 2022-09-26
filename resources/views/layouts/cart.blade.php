@extends('main')
@section('section')
    <link rel="stylesheet" href="/css/rounded.css">
    <link rel="stylesheet" href="/css/cart.css">
    <div class="container mt-5 mb-5 pt-5 pb-5">
        <h1 class="poppins fw-bold">Cart</h1>
        @foreach ($cart->cartItems as $c)
            <div class="row my-2 py-4 rounded-5 shadow">
                <div class="col-4 d-flex justify-content-center">
                    <a href="/products/{{ $c->product->slug }}" class="cart-detail-image-wrapper d-inline-block mx-auto">
                        <img src="{{ str_replace('public', '/storage', $c->product->gallery->pictures[0]->name) }}"
                            class="cart-detail-image cursor-pointer rounded-5" alt="Image of {{ $c->product->name }}">
                    </a>
                </div>
                <div class="col-8 py-2 d-flex flex-column">
                    <div class="mb-auto">
                        <p class="montserrat fw-bold fs-5">{{ $c->product->name }}</p>
                        <p class="montserrat fs-6">Rp {{ $c->product->price }}</p>
                    </div>
                    <div class="mt-auto d-flex">
                        <div class="me-auto d-flex">
                            <form action="/cartItems/{{ $c->product->id }}" method="post">
                                @csrf
                                @method('put')
                                {{-- Add more --}}
                                <input hidden type="number" value="{{ $c->qty - 1 }}" name="qty" class="qtyMinus">
                                <button type="submit" class="btn btn-edit">
                                    <i data-feather="minus-circle" class="text-success"></i>
                                </button>
                            </form>

                            {{-- Quantity --}}
                            <div class="d-flex flex-column justify-content-center">
                                <p class="qty text-center ">{{ $c->qty }}</p>
                            </div>

                            <form action="/cartItems/{{ $c->product->id }}" method="post">
                                @csrf
                                @method('put')
                                {{-- Reduce --}}
                                <input hidden type="number" value="{{ $c->qty + 1 }}" name="qty" class="qtyPlus">
                                <button type="submit" class="btn btn-edit">
                                    <i data-feather="plus-circle" class="text-success"></i>
                                </button>
                            </form>
                        </div>
                        <div class="ms-auto">
                            <form action="/cartItems/{{ $c->product->id }}" method="post">
                                @csrf
                                @method('delete')
                                {{-- Delete --}}
                                <button type="submit" class="btn">
                                    <i data-feather="trash-2" class="text-danger"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row w-100 fixed-bottom bg-light py-2 px-1 shadow-lg">
        <button class="btn btn-success ms-auto rounded-5 w-25 py-2 px-2">Check Out</button>
    </div>
    <input type="hidden" id="cartId" value="{{ $cart->id }}">
    <script src="/js/cart.js"></script>
    <script>
        let changed = false;

        const cartId = document.querySelector('input#cartId').value
        const changes = [];

        // Test request cart item
        fetch(`/cartItems/${cartId}`).then(res => res.json()).then(data => {
            console.log(data)
        })

        // Save changes by sending a request to back end
        window.onbeforeunload = e => {
            e.preventDefault()
            console.log(1)
        }
    </script>
@endsection
