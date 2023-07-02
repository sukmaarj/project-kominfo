@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data</h1>
</div>

<!-- form untuk postingan -->
<div class="col-lg-8">
    <form method="post" action="{{ route('admin.update', $user->id) }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xl-8 col-10 mb-3">
            <label for="nama_dinas" class="form-label">Nama Dinas</label>
            <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" required autofocus value="{{ $user->nama_dinas }}">
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="singkatan_dinas" class="form-label">Singkatan Dinas</label>
            <input type="text" class="form-control" id="singkatan_dinas" name="singkatan_dinas" required autofocus value="{{ $user->singkatan_dinas }}">
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ $user->email }}">
        </div>
        
        <div class="col-xl-8 col-10 mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required autofocus value="{{ $user->alamat }}">
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="old-password">Old Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" autofocus required value="{{ $user->password }}" readonly>
         </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
    </form>
</div>


@endsection