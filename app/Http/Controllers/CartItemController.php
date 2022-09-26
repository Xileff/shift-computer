<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        return view('layouts.cart', [
            'title' => auth()->user()->username . "'s Cart",
            'cart' => auth()->user()->cart
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(CartItem $cartItem)
    {
        return json_encode($cartItem);
    }

    public function edit(CartItem $cartItem)
    {
        //
    }

    public function update(Request $request, CartItem $cartItem)
    {
        // return dd($request->qty);
        $cartItem->update(['qty' => $request->qty]);
        return redirect()->intended('/cart');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->intended('/cart');
    }
}
