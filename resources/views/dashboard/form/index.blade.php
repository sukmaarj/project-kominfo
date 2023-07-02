@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengajuan Surat</h1>
</div>

<!-- form untuk postingan -->
<div class="col-lg-8">
    <form method="post" action="/dashboard/data" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
        <label for="nama_dinas" class="form-label">Nama Dinas</label>
            <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" required autofocus value="{{ $user->nama_dinas }}" readonly>
            @error('nama_dinas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
                        <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                 {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telephone</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required autofocus value="{{ old('no_telp') }}">
            @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
            @error('alamat')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <!-- menambahkan file image -->
        <div class="mb-3">
            <label for="file" class="form-label">File Lampiran</label>
            <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file">
            @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>        
        
        <button type="submit" class="btn btn-primary" >Send</button>
    </form>
</div>


@endsection