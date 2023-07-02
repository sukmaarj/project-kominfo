@extends('layouts.main')

@section('container')
<div class="row justify-content">
    <div>
        <main class="form-registration">
        <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
            <h1 class="h3 mb-3 font-cambria text-center">Registration Form</h1>
            <div class="card-body">
<form method="post" action="/register" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_dinas" class="form-label">Nama Dinas</label>
            <input type="text" class="form-control @error('nama_dinas') is-invalid @enderror" id="nama_dinas" name="nama_dinas" required autofocus value="{{ old('nama_dinas') }}">
            @error('nama_dinas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="singkatan_dinas" class="form-label">Singkatan Dinas</label>
            <input type="text" class="form-control @error('singkatan_dinas') is-invalid @enderror" id="singkatan_dinas" name="singkatan_dinas" required autofocus value="{{ old('singkatan_dinas') }}">
            @error('singkatan_dinas')
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
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
            @error('alamat')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
        <label for="password">Password</label>
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
        
                <button class="w-100 btn btn-lg btn-info mt-3" type="submit">Register</button>
                <small class="d-block text-center mt-3">Already registered? <a href="/login">Login</a></small>
            </form>

            
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div
            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            <div class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('/img/3081783.jpg');
              background-size: cover;">
                    <span class="mask bg-gradient-info opacity-6"></span>
                    <h4 class="mt-5 text-white font-weight-bolder position-relative">Dinas Komunikasi dan Informatika Kota Palembang</h4>
                    <p class="text-white position-relative">"Mewujudkan masyarakat yang religius, berbudaya, beretika, melalui pembangunan budaya integritas yang didukung oleh Pemerintahan yang bersih, berwibawa dan profesional."</p>
            </div>
        </div>
        </main>
    </div>
</div>
    
@endsection