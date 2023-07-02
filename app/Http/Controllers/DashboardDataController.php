<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class DashboardDataController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;

        return view('dashboard.data.index', [
            'datas' => Data::where('user_id', $user)->get()
        ]);
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'nama_dinas' => 'required|max:255',
            'email' => 'required',
            'no_telp' => ['nullable', 'regex:/^[0-9]+$/'],
            'alamat' => 'required',
            'file' => 'file|file|mimes:doc,docx,pdf',
        ]);

        $data = new Data;
        $data->user_id = $request->user()->id; // Mengisi 'user_id' dengan ID user yang terautentikasi
        $data->nama_dinas = $request->input('nama_dinas');
        $data->email = $request->input('email');
        $data->no_telp = $request->input('no_telp');
        $data->alamat = $request->input('alamat');
        $data->file = $request->input('file');
        $data->status = 'Progress';


        //mengecek kalau user tidak input file
        if($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('data-file');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
		$tujuan_upload = 'storage/data-file';
        $file = $request->file('file');
 
                // upload file
		$file->move($tujuan_upload,$file->getClientOriginalName());

        Data::create($validatedData);

        return redirect('/dashboard')->with('success', 'Data has been sent');
    }

  
}
