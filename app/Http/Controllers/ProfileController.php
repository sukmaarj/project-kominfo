<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(Auth::id());

        return view('dashboard.profile.index', compact('user'));
    }

    public function edit(Request $request , $id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.profile.edit', ['user' => $user]);

    }

    public function update(Request $request, $id)
{
    // $request->validate([
    //     'nama_dinas' => 'required|max:255',
    //     'singkatan_dinas' => 'required',
    //     'email' => 'required',
    //     'alamat' => 'required',
    //     'new_password' => 'required|min:8',
    //     'password_confirmation' => 'required|same:new_password',
       
    // ]);

    $user = User::findOrFail($id);
    
    // Periksa setiap field individu dan lakukan pembaruan jika ada perubahan
    if ($request->filled('nama_dinas') && $request->input('nama_dinas') !== $user->nama_dinas) {
        $user->nama_dinas = $request->input('nama_dinas');
    }

    if ($request->filled('singkatan_dinas') && $request->input('singkatan_dinas') !== $user->singkatan_dinas) {
        $user->singkatan_dinas = $request->input('singkatan_dinas');
    }

    if ($request->filled('email') && $request->input('email') !== $user->email) {
        $user->email = $request->input('email');
    }

    if ($request->filled('alamat') && $request->input('alamat') !== $user->alamat) {
        $user->alamat = $request->input('alamat');
    }

    // Update password jika ada input password baru dan konfirmasi password
    if ($request->filled('new_password') && $request->filled('password_confirmation')) {
        if ($request->input('new_password') === $request->input('password_confirmation')) {
            $user->password = Hash::make($request->input('new_password'));
        } else {
            return redirect()->back()->with('error', 'New password and password confirmation do not match');
        }
    }

    // Simpan perubahan jika ada perubahan yang dilakukan
    if ($user->isDirty()) {
        $user->save();
        return redirect('/dashboard')->with('success', 'Data has been updated');
    }

    return redirect('/dashboard')->with('success', 'No changes were made');
}
    
//     $user->password = Hash::make($request->new_password);
//     $user->update();

//     return redirect('/dashboard')->with('success', 'New data has been update');
// }
}
