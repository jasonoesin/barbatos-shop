<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{
    //
    public function show($cat){

        $product =  Product::where('category','like',$cat)->paginate(10);


        return view('category')->with(
            [
                'products'=> $product
            ]);
    }
}
