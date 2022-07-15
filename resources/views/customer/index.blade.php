@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ route('customer.create') }}" class="btn btn-primary">
        Tambah Customer
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>No</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Kode Pos</th>
                <th>No Telp</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
            @forelse ($data as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->last_name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->city }}</td>
                <td>{{ $value->postcode }}</td>
                <td>{{ $value->phone }}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href="{{ route('customer.edit', $value) }}" class="btn btn-success btn-sm">
                        <span class="fas fa-edit"></span>
                    </a>

                    <form action="{{ route('customer.destroy', $value) }}" method="post">
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
                    <i>Data Customer Tidak Ada</i>
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>
@endsection
