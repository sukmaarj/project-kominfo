<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    
    public function index()
    {
        return view('dashboard.admin.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.create', [
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

        return redirect('/dashboard/admin')->with('success', 'New data has been added');
    }

    public function edit(Request $request , $id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.admin.edit', ['user' => $user]);

    }
    
    public function update(Request $request , User $user , $id)
{
    $user = User::findOrFail($id);

    $user->update($request->all());
    

    return redirect('/dashboard/admin');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //halaman delete
    public function destroy(User $user, $id)
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser->delete();

        return redirect('/dashboard/admin')->with('success', 'Data has been deleted');
    }

    public function editPassword($id)
{
    $user = User::findOrFail($id);

    return view('dashboard.admin.change-password', compact('user'));
}

public function updatePassword(Request $request, $id)
{
    $request->validate([
        'new_password' => 'required|min:8',
        'password_confirmation' => 'required|same:new_password',
    ]);

    $user = User::findOrFail($id);
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect('/dashboard/admin')->with('success', 'Password berhasil diperbarui.');
}





}
