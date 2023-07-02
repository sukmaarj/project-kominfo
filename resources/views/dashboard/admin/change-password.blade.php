@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Change Password</h1>
</div>

<!-- form untuk postingan -->
<div class="col-lg-8">
    <form method="post" action="{{ route('admin.updatePassword', $user->id) }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xl-8 col-10 mb-3">
            <label for="new-password">New Password</label>
            <input id="new-password" type="password" class="form-control" name="new_password" autocomplete="new-password" required >
        </div>

        <div class="col-xl-8 col-10 mb-3">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
        
    </form>
</div>


@endsection