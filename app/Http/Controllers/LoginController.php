<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Tambahkan baris ini jika belum ada
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function doRegister(Request $request){
        try{
            $user = new \App\Models\User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        }catch(\Illuminate\Database\QueryException $ex){
            return Redirect::back()->withErrors(['message' => 'Email already registered, please use another email']);
        }
        return Redirect::back()->with('success', true);
    }
    public function authenticate(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // Authentication passed...
            return redirect(route('dashboard'));
        }else {
            // Authentication failed...
            return Redirect::back()->withErrors(['message' => 'User not found']);
        }
    }
}
