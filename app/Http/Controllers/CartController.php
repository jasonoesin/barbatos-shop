<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\History;
use App\Models\HistoryDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // To be changed id
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
        Cart::find($id)->deleteOrFail();

        return redirect()->back();
    }

    public function purchase()
    {
        // TO BE CHANGED ID
        $carts = User::find(1)->carts;

        $history = History::create([
            "user_id" => 1
        ]);

        foreach($carts as $c){
            HistoryDetail::create([
                "history_id" => $history->id,
                "product_id" => $c->product->id,
                "qty" => $c->qty
            ]);
            $c->delete();
        }



        return redirect()->back();
    }
}
