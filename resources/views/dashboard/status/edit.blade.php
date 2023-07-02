@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Status</h1>
</div>

<!-- form untuk postingan -->
<div class="col-lg-8">
    <form method="post" action="{{ route('status.update', $data->id) }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xl-8 col-10 mb-3">
            <label for="nama_dinas" class="form-label">Nama Dinas</label>
            <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" required autofocus value="{{ $data->nama_dinas }}" readonly>
        </div>


        <div class="col-xl-8 col-10 mb-3">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email"  autofocus required value="{{$data->email }}" readonly>
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="no_telp" class="form-label">No Telephone</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required autofocus value="{{$data->no_telp }}" readonly>
        </div>
        
        <div class="col-xl-8 col-10 mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required autofocus value="{{ $data->alamat }}" readonly>
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="file" class="form-label">File Lampiran</label>
            <input class="form-control" type="file" id="file" name="file" required autofocus value="{{ $data->file }}" readonly>
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="status" class="form-label">Status</label>
            <div class="col-sm-9">
                    <select class="form-control" name="status">
                        @if ($data->status)
                            <option value="{{ old('status',  $data->status) }}">{{ old('status',  $data->status) }}</option>
                            <option value="" disabled>Pilih</option>
                            <option value="Accept" >Accept</option>
                            <option value="Decline">Decline</option>
                        @else
                            <option value="" selected disabled>Pilih</option>
                            <option value="Accept">Accept</option>
                                <option value="Decline">Decline</option>
                        @endif
                    </select>
                </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
        </div>
    </form>
</div>


@endsection