@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- ini diupdate --}}
    <a href="{{ route('product.create') }}" class="btn btn-primary">
        Tambah Produk
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
            @forelse ($data as $key => $value)
            <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->stock }}</td>
                <td>
                    <img src="{{ asset('storage/' . $value->image); }}" alt="" srcset="" height="100px">
                </td>
                <td>{{ $value->category()->first()->name ?? '' }}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href="{{ route('product.edit', $value) }}" class="btn btn-success btn-sm">
                        <span class="fas fa-edit"></span>
                    </a>

                    <form action="{{ route('product.destroy', $value) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <span class="fas fa-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9">
                    <i>Data Produk Tidak Ada</i>
                </td>
            </tr>
            @endforelse
        </table>

        {!! $data->links() !!}

    </div>
</div>
@endsection
