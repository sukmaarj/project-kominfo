@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Data</h1>
</div>

<!-- form untuk postingan -->
<div class="col-lg-8">
    <form method="post" action="/dashboard/admin" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_dinas" class="form-label">Nama Dinas</label>
            <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" required autofocus>
            @error('nama_dinas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="singkatan_dinas" class="form-label">Singkatan Dinas</label>
            <input type="text" class="form-control" id="singkatan_dinas" name="singkatan_dinas" required autofocus >
            @error('singkatan_dinas')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
                        <label for="email">Email address</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required >
            @error('email')
                <div class="invalid-feedback">
                 {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required autofocus ></textarea>
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
        
        <button type="submit" class="btn btn-primary">Create Data</button>
    </form>
</div>

<script>
    
    //preview image create
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.scr = oFREvent.target.result;
        }
    }
    
</script>

@endsection