@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Back, {{ auth()->user()->nama_dinas }}</h1>
    </div>

    @can('admin')
<div class="row">

<div class="col-xl-3 col-6 mb-4">
    <div class="card border">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Data User</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $datadinas }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-6 mb-4">
    <div class="card border">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Data Pengajuan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $datapengajuan }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>
    @endcan
@endsection