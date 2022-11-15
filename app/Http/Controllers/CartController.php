<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // To be changed id
//        dd(User::find(1)->carts[1]->product);

        return view('cart')->with(
            [
                'carts'=> User::find(1)->carts
            ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
//        dd($request->all());
        Cart::create([
            'user_id'=> $request->user_id,
            'product_id' => $request->product,
            'qty' => $request->qty
        ]);

        return redirect("/cart");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
