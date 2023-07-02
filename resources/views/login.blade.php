@extends('layouts.main')

@section('container')
<div class="row justify-content" >
    <div>
    
        <!-- alert registrasi berhasil -->
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- alert login gagal (terhubung dnegan LoginController.php) -->
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin vh-100" >
            <div class="page-header vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
            <h1 class="h3 mb-3 font-cambria text-center">LOGIN</h1>
            <div class="card-body">
            <form action="/login" method="post">
                @csrf

                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" 
                    autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="password" required>
                    <label for="password">Password</label>
                </div>


                <button class="w-100 btn btn-lg btn-info" type="submit">Login</button>
            </form>
        <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
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
                    <p class="text-white position-relative">"Mewujudkan masyarakat yang religius, berbudaya, beretika, melalui pembangunan budaya integritas 
                        yang didukung oleh Pemerintahan yang bersih, berwibawa dan profesional."</p>
            </div>
        </div>
        </main>
    </div>
</div>
    
@endsection