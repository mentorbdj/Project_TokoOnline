@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <form action="{{ route('customer.store') }}" method="post">
        @csrf

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="first_name">Nama Depan</label>
            <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Masukan Nama Depan">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="last_name">Nama Belakang</label>
            <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Masukan Nama Belakang">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="address">Alamat</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Masukan Alamat">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="city">Kota</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="Masukan Kota">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="postalcode">Kode Pos</label>
            <input type="text" name="postalcode" id="postalCode" class="form-control" placeholder="Masukan Kode Pos">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="phone">No Telpon</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Masukan No Telpon">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>
@endsection
