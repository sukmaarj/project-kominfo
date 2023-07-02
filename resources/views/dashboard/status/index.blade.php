@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pengajuan Surat dan Status</h1>
    </div>

    <!-- scirpt bila post baru berhasil ditambahkan -->
    @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive">

        <table class="table table-striped ">
          <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Dinas</th>
            <th scope="col">Email</th>
            <th scope="col">No Telephone</th>
            <th scope="col">Alamat</th>
            <th scope="col">File</th>
            <th scope="col">Time</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        @foreach ($datas as $data)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$data->nama_dinas}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->no_telp}}</td>
              <td>{{$data->alamat}}</td>
              <td>
                
                <a href="{{ \Storage::url($data->file) }}" target="_blank">
                <span data-feather="download" width="20"></span>
                Download
                </a>

              </td>
              <td>{{$data->created_at->diffForHumans()}}</td>
              <td>


                
                  @if($data->status == "Accept")
                    <span class="badge bg-success">Accept</span>
                  @elseif ($data->status == "Decline")
                  <span class="badge bg-danger">Decline</span>
                  @else
                  <span class="badge bg-secondary">Progress</span>
                  @endif

                
                
                
              </td>
              <td>
              <a href="{{ route('status.edit', $data->id) }}" class="btny btn-secondary" >Edit</a>
              <form action="{{ route('status.destroy', $data->id) }}" method="post">
                @method('delete')
                @csrf
                <button class="badge btn-warning border-0" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection