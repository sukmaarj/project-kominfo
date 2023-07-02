<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// tersambung dengan routes post /login di web.php
//berguna untuk login dan logout
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    // tersambung dengan routes post /login di web.php
    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        //menampilkan apakah login berhasil atau tidak berhasil
        //jika berhasil
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        //jika tidak berhasil
        return back()->with('loginError', 'Login failed');
    }

    //method logout yang terhubung dengan routes logout di web.php dan navbar.blade.php
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/');
    // }
    
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}