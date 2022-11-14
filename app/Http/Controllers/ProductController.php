<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
     */
    public function create()
    {
        //
        return view('product_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $directories =  Storage::files("public/images/products");

        $last = count($directories) + 1;


        //
        $product = Product::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'detail' => $request->detail,
            'category' => $request->genre,
            'file_path' => "/products/$last.jpg"
        ]);

        $file = $request->file('file')->storeAs('public/images/products',"$last.jpg");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     */
    public function edit($id)
    {
        //
        $current = Product::find($id);

        return view('product_edit')->with(
            [
                'p'=> $current
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        // Updated File Path

        if($request->file('file')){
            $directories =  Storage::files("public/images/products");
            $last = count($directories) + 1;
            $request->file('file')->storeAs('public/images/products',"$last.jpg");

            Product::find($id)->update([
                'name'=> $request->name,
                'price'=> $request->price,
                'detail' => $request->detail,
                'category' => $request->genre,
                'file_path' => "/products/$last.jpg"
            ]);
        }else{
            Product::find($id)->update([
                'name'=> $request->name,
                'price'=> $request->price,
                'detail' => $request->detail,
                'category' => $request->genre,
            ]);
        }

        $product = Product::find($id);

        return view('product')->with(
            [
                'p'=> $product
            ]);
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

    public function manageWithQuery($query){
        $products = Product::where("name","like","%$query%")->get();

        return view("manage")->with([
            'products'=> $products
        ]);
    }
}
