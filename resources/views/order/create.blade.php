@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <form action="{{ route('order.store') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-4">
                <div class="form-group" style="margin-bottom: 1.5rem">
                    <label for="order_number">Nomor Order</label>
                    <input type="text" name="order_number" id="orderNumber" class="form-control" value="{{ 'ORD' . date('y') . str_pad((\App\Models\Order::count() + 1), 3, 0, STR_PAD_LEFT) }}" readonly>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem">
                    <label for="order_date">Tanggal Order</label>
                    <input type="date" name="order_date" id="orderDate" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem">
                    <label for="shipping_date">Tanggal Pengiriman</label>
                    <input type="date" name="shipping_date" id="shippingDate" class="form-control">
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem">
                    <label for="is_delivered">Sudah dikirim?</label>
                    <select name="is_delivered" id="isDelivered" class="form-control">
                        <option value="0">Belum Dikirim</option>
                        <option value="1">Sudah Dikirim</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 1.5rem">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group" style="margin-bottom: 1.5rem">
                    <label for="cariProduk">Cari Produk?</label>
                    <select name="" id="cariProduk" class="form-control">
                        <option disabled selected>Cari Produk?</option>
                        @forelse (\App\Models\Product::get()->toArray() as $product)
                            <option value="{{ $product['id'] }}">{{ $product['name'] . ' - ' . $product['stock']}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: 1.5rem; text-align: right;">
                    <button type="button" class="btn btn-success text-white" id="btnAddProduct">Tambah Daftar Produk</button>
                </div>
                <hr>
                <div id="listProduct">
                    <span>Produk Belum Ditambahkan!</span>
                </div>
                <hr>
                <div class="form-group" style="margin-bottom: 1.5rem">
                    <label for="total">Total</label>
                    <input type="number" name="total" id="totalProduct" class="form-control" min="0">
                </div>
            </div>
        </div>

    </form>

</div>

@endsection

@push('js')
<script>

    var listProduct = [];

    // event handler
    $("#btnAddProduct").click(function () {
        var productId = $("#cariProduk option:selected").val();

        $.ajax({
            'type': 'GET',
            'url': "{{ url('product') }}" + "/" + productId + "/ajax",
            'success': function (result) {
                tambahProduct(result)
            }
        })

    });

    $('#cariProduk').select2({
        placeholder: "Cari Produk",
        allowClear: true
    });

    function tambahProduct(data)
    {
        listProduct.push(data);
        writeListProduct();
    }

    function removeProduct(index)
    {
        listProduct.splice(index, 1);
        writeListProduct();
    }

    function writeListProduct()
    {
        var totalProduct = 0;
        var listProductHTML = "";
        if (listProduct.length > 0) {
            listProduct.forEach(function (x, i) {
                listProductHTML += '<div class="row">';
                listProductHTML += '<div class="col-7"><input type="text" name="list_order[][name_product]" class="form-control" value="'+x.name+'" readonly></div>';
                listProductHTML += '<div class="col-4"><input type="number" name="list_order[][price_product]" class="form-control" value="'+x.price+'" readonly></div>';
                listProductHTML += '<div class="col-1"><button type="button" onclick="removeProduct('+i+')"> x </button></div>';
                listProductHTML += '</div>';

                totalProduct += x.price;
            });
        } else {
            listProductHTML += '<span>Produk Belum Ditambahkan!</span>';
        }

        $("#listProduct").html(listProductHTML);
        $("#totalProduct").val(totalProduct);
    }
</script>
@endpush
