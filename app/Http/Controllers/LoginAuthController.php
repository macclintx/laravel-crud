<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function customLogin(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $cresidentials = $request -> only('email', 'password');
        if(Auth::attempt($cresidentials)){
            return redirect() -> intended('dashboard') -> withSuccess('Signed in');
        }
        return redirect('login') -> withSuccess('Login details are not valid');
    }

    public function registration(){
        return view('auth.register');
    }

    public function custonRegistration(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);
        $data = $request -> all();
        $check = $this -> create($data);
    }

    public function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard(){
        if(Auth::check()){
            return view('auth.dashboard');
        }
        return redirect('login')->withSuccess("You are not allowed to access!");
    }

    public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}