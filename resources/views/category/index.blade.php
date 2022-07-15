@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    {{-- ini diupdate --}}
    <a href="{{ route('category.create') }}" class="btn btn-primary">
        Tambah Kategori
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
            @forelse ($data as $key => $value)
            <tr>
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>
                    <img src="{{ asset('storage/' . $value->image); }}" alt="" srcset="" height="100px">
                </td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href="{{ route('category.edit', $value) }}" class="btn btn-success btn-sm">
                        <span class="fas fa-edit"></span>
                    </a>

                    <form action="{{ route('category.destroy', $value) }}" method="post">
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
                <td colspan="10">
                    <i>Data Kategori Tidak Ada</i>
                </td>
            </tr>
            @endforelse
        </table>

        {!! $data->links() !!}
    </div>
</div>
@endsection
