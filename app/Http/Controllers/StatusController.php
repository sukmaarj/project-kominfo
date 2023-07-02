<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index()
    {
        // $data = Data::all();
        
        return view('dashboard.status.index', [
            'datas' => Data::all()
        ]);
        
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'nama_dinas' => 'required|max:255',           
            'no_telp' => ['nullable', 'regex:/^[0-9]+$/'],
            'email' => 'required',
            'alamat' => 'required',
            'file' => 'file|file|mimes:doc,docx,pdf',
            'status' => 'required',
        ]);

        //mengecek kalau user tidak input image
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

    public function edit(Request $request, $id, Data $data)
    {
        $data = Data::findOrFail($id);

        return view('dashboard.status.edit', ['data' => $data]);
    }

    public function update(Request $request , Data $data , $id)
    {
        $data = Data::findOrFail($id);
    
        $data->update($request->all());
        
    
        return redirect('/dashboard/status')->with('success', 'Data has been update');
    }

    //halaman delete
    public function destroy(Data $data, $id)
    {
        $deleteData = Data::findOrFail($id);
        $deleteData->delete();

        return redirect('/dashboard/status')->with('success', 'Data has been deleted');
    }
    
    
}