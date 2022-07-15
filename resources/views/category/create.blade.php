@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="name">Nama Kategori</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="description">Deskripsi Kategori</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Masukan Deskipsi Kategori"></textarea>
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="image_kategori">Gambar Kategori</label>
            <input type="file" name="image_kategori" id="imageKategori">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>
@endsection
