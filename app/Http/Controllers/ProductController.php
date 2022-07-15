<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Product',
            'data'  => Product::paginate(5)
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Produk'
        ];

        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'numeric',
            'stock'       => 'numeric',
        ]);

        // upload gambar
        if ($request->hasFile('image_product')) {
            $request->merge(['image' => $request->image_product->store('products', 'public')]);
        }

        // insert data dan cek fillable
        Product::create($request->all());

        // kembalikan ke halaman index dengan membawa pesan
        return redirect()->route('product.index')->with('success', 'Produk Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = [
            'title' => 'Edit Product',
            'data'  => $product
        ];

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //melakukan validasi
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'price'       => 'numeric',
            'stock'       => 'numeric',
        ]);

        // upload gambar
        if ($request->hasFile('image_product')) {
            @unlink('storage/' . $product->image); // untuk menghapus gambar lama jika ada
            $request->merge(['image' => $request->image_product->store('products', 'public')]);
        }

        // update data dan cek fillable
        $product->update($request->all());

        // kembalikan ke halaman index dengan membawa pesan
        return redirect()->route('product.index')->with('success', 'Produk Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function ajax(Product $product)
    {
        return response($product);
    }
}
