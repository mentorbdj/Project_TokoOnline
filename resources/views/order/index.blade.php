@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <a href="{{ route('order.create') }}" class="btn btn-primary">
        Tambah Order
    </a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>No Order</th>
                <th>Tanggal Pembelian</th>
                <th>total</th>
                <th>Tanggal Pengiriman</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
            @forelse ($data as $key => $value)
            <tr>
                <td>{{ $value->order_number }}</td>
                <td>{{ $value->order_date }}</td>
                <td>{{ $value->shipping_date }}</td>
                <td>{{ $value->created_at }}</td>
                <td>
                    <a href="{{ route('order.edit', $value) }}" class="btn btn-success btn-sm">
                        <span class="fas fa-edit"></span>
                    </a>

                    <form action="{{ route('order.destroy', $value) }}" method="post">
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
                <td colspan="6">
                    <i>Data Produk Tidak Ada</i>
                </td>
            </tr>
            @endforelse
        </table>

        {!! $data->links() !!}

    </div>
</div>
@endsection
