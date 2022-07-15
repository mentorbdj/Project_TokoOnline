@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <form action="{{ route('category.update', $data) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="name">Nama Kategori</label>
            <input type="text" value="{{ $data->name ?? '' }}" name="name" id="name" class="form-control" placeholder="Masukan Nama Kategori">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="description">Deskripsi Kategori</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Masukan Deskipsi Kategori">{{ $data->description ?? '' }}</textarea>
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="image_kategori">Gambar Kategori</label>
            <input type="file" name="image_kategori" id="imageKategori" value="{{ $data->gambar ?? '' }}">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>
@endsection
