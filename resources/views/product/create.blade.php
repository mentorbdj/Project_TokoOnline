@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="name">Nama Produk</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama Produk">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="description">Deskripsi Produk</label>
            <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Masukan Deskipsi Produk"></textarea>
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="price">Harga Produk</label>
            <input type="number" name="price" id="price" class="form-control" placeholder="Masukan Harga Produk">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="stock">Stok Produk</label>
            <input type="number" name="stock" id="stock" class="form-control" placeholder="Masukan Stok Produk">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="category_id">Kategori Produk</label>
            <select name="category_id" id="categoryId" class="form-control">
                @forelse (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty

                @endforelse
            </select>
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <label for="image_product">Gambar Produk</label>
            <input type="file" name="image_product" id="imageProduct">
        </div>

        <div class="form-group" style="margin-bottom: 1.5rem">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>
@endsection
