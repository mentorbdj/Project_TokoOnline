<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Order',
            'data'  => Order::paginate(5)
        ];

        return view('order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Order',
        ];

        return view('order.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_date' => 'required',
            'total'      => 'required',
            'shipping_date' => 'nullable',
            'is_delivered' => 'required',
            'list_order' => 'required|array'
        ]);

        $order = Order::create([
            'order_number' => 'ORD' . date('y') . str_pad((Order::count() ?? 0), 3, STR_PAD_RIGHT),
            'order_date'    => $request->order_date ,
            'total'         => $request->total,
            'shipping_date' => $request->shipping_date,
            'is_delivered'  => $request->is_delivered,
            'customer_id'   => null,
        ])->fresh();

        // foreach ($request->list_order as $key => $item) {
        //     OrderDetail::create([
        //         'product_name'      => $request->list_order[0],
        //         'product_qty'       => 1,
        //         'product_price'     => $request->list_order[1],
        //         'product_subtotal'  => 0,
        //         'order_id'          => $order->id,
        //     ]);
        // }

        return redirect()->route('order.index')->with('success', 'Order Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
