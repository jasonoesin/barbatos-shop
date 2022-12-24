<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

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
            'dob' => 'required',
            'country' => 'required'
        ]);

        $curr = new DateTime($request->dob);
        $max = new DateTime('yesterday');
        $min = new DateTime('1900-01-01');

        if ($curr < $min || $curr > $max) {
            return redirect('/register')->withErrors("Date of birth is not valid");
        }

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



        if(Auth::attempt($data)){
            if($request->remember){
                Cookie::queue('logged_email', $request->email,120);
                Cookie::queue('logged_password', $request->password,120);
            }else{
                Cookie::queue('logged_email', '');
                Cookie::queue('logged_password', '');
            }


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
