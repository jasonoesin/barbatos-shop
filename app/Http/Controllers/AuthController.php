<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function register(Request $request){
        $this->validate($request,
        [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|alphaNum|min:8',
            'confirm_password' => 'required|alphaNum|min:8',
            'gender' => 'required',
            'dob' => 'required', // Date Validated at Blade
            'country' => 'required'
        ]);

        if($request->password != $request->confirm_password){
            return redirect('/register')->withErrors("Password doesn't match.");
        }

        $data = $request->toArray();

        $user = User::create($data);

        auth()->login($user);

        $request->session()->flash('message', 'You have successfully registered and logged in !');
        return redirect('/product');
    }

    public function login(Request $request){
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:8'
        ]);

        $data = $request->only('email', 'password');

        // Remember me token expiration for 2 hours validated in config/auth.php
        if(Auth::attempt($data,$request->remember)){
            $request->session()->flash('message', 'You have successfully logged in !');
            return redirect('/product');
        }else{
            return back()->withErrors("Email or password doesn't match");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
