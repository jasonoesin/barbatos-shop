<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function register(Request $request){
        $this->validate($request,
        [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:8',
            'confirm_password' => 'required|alphaNum|min:8',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required'
        ]);

        $data = $request->toArray();

        $user = User::create($data);

        auth()->login($user);

        return redirect('/');

    }

    public function login(Request $request){
//        $this->validate($request,
//        [
//            'email' => 'required|email',
//            'password' => 'required|alphaNum|min:8'
//        ]);

        $data = $request->only('email', 'password');


        if(Auth::attempt($data)){
            return redirect('/');
        }else{
            return back();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
