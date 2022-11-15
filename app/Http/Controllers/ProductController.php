<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
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

    public function show($id)
    {
        //
        $product = Product::find($id);

        return view('product')->with(
            [
                'p'=> $product
            ]);
    }

    public function edit($id)
    {
        //
        $current = Product::find($id);

        return view('product_edit')->with(
            [
                'p'=> $current
            ]);
    }

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

    public function destroy($id)
    {
        //
        Product::destroy($id);

        return redirect()->back();
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
