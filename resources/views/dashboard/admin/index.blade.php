@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data User</h1>
    </div>

    <!-- scirpt bila post baru berhasil ditambahkan -->
    @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive">

    <!-- tambah data post-->
    <a href="/dashboard/admin/create" class="btn btn-primary mb-3">Create New Data</a>
        <table class="table table-striped ">
          <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Dinas</th>
            <th scope="col">Singkatan Dinas</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$user->nama_dinas}}</td>
              <td>{{$user->singkatan_dinas}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->alamat}}</td>
              <td>
              <a href="{{ route('admin.edit', $user->id) }}" class="btny btn-secondary" >Edit</a>
              <a href="{{ route('admin.editPassword', $user->id) }}" class="btny btn-warning" >Ganti Password</a>
				      <form action="{{ route('admin.destroy', $user->id) }}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">delete</button>
              </form>

            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection