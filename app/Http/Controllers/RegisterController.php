<?php

namespace App\Http\Controllers;

//request untuk inputan form register
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\User;


class RegisterController extends Controller
{
    // menampilkan register
    public function index() {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function create()
    {
        return view('dashboard.posts.index', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'nama_dinas' => 'required|max:255|unique:users',
            'singkatan_dinas' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required',
            'password' => 'required|min:5|max:255',
        ]);

       
        //enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
		
        User::create($validatedData);

        // //menampilkan pesan bila berhasil register
        // $request->session()->flash('success', 'Registration successful! Please login');

        //menampilkan tampilan sesudah register balik ke login
        return redirect('/login')->with('success', 'Registration successful! Please login');
    }

}
