@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                            <div class="col-md-8">
                                <form method="post" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row mb-3">
                                        <label for="nama_dinas" class="col-md-4 col-form-label text-md-end">{{ __('Nama Dinas') }}</label>

                                        <div class="col-md-7">
                                            <input id="nama_dinas" type="text" class="form-control @error('nama_dinas') is-invalid @enderror" name="nama_dinas" value="{{ $user->nama_dinas }}" required autocomplete="nama_dinas" >

                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <label for="singkatan_dinas" class="col-md-4 col-form-label text-md-end">{{ __('Singkatan Dinas') }}</label>

                                        <div class="col-md-7">
                                            <input id="singkatan_dinas" type="singkatan_dinas" class="form-control @error('singkatan_dinas') is-invalid @enderror" name="singkatan_dinas" value="{{ old('singkatan_dinas', $user->singkatan_dinas) }}" required autocomplete="singkatan_dinas" >

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <div class="col-md-7">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email" >

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>

                                        <div class="col-md-7" >
                                            <input id="alamat" type="text" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $user->alamat) }}"autocomplete="alamat" >
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="old-password" class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>

                                        <div class="col-md-7">
                                            <input id="old-password" type="password" class="form-control" name="old_password" autocomplete="old-password" value="{{ old('password', $user->password) }}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new-password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                                        <div class="col-md-7">
                                            <input id="new-password" type="password" class="form-control" name="new_password" autocomplete="new-password" >
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-7">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" >
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update Profile') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
