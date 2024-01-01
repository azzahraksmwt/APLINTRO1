<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function index(){
            return view('login');
    }

    public function login_proses(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
    
        if(Auth::attempt($data)){
            return redirect('home');
        } else {
            return redirect()->route('login')->with('failed','username atau password salah');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('login');
    }


    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
    
}