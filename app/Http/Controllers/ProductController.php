<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $category = DB::table('products')
            ->select('category')
            ->groupBy('category')
            ->get();

        $electronics = Product::all()->where('category','=','Electronics');
        $provision = Product::all()->where('category','=','Provision');
        $fashion = Product::all()->where('category','=','Fashion');

        return view('home')->with(
            [
                'electronics'=> $electronics,
                'provision'=> $provision,
                'fashion'=> $fashion,
                'category'=> $category
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);

        return view('product')->with(
            [
                'p'=> $product
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $query = $request->name;

        $products =DB::table('products')
            ->where('name', 'like',"%$query%")
            ->get();

        return view("search")->with([
            'products'=> $products
        ]);
    }

    public function manage(){

        $products = Product::all();

        return view("manage")->with([
            'products'=> $products
        ]);
    }
}
