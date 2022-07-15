@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <form action="{{ route('profile.update_profile') }}" method="post">
        @csrf
        <h6 class="h6">Edit Profile</h6>
        <hr>
        <div class="form-group">
            <label for="">Nama Pengguna</label>
            <input
                type="text"
                name="name"
                value="{{ $data->name }}"
                class="form-control" />
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-sm">
        </div>
    </form>

    {{-- <form action="{{ route('profile.change_password') }}" method="post">
        @csrf
        <h6 class="h6">Edit Password</h6>
        <hr>
        <div class="form-group">
            <label for="">Password</label>
            <input
                type="password"
                name="password"
                class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Password Lama</label>
            <input
                type="password"
                name="password_lama"
                class="form-control" />
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-sm">
        </div>
    </form> --}}

</div>
@endsection
