<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Customer',
            'data'  => Customer::paginate()
        ];

        return view('customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Customer'
        ];

        return view('customer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data yang dikirim
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'nullable|string',
            'address'    => 'required|string',
            'city'       => 'required|string',
            'postalcode' => 'required|string',
            'email'      => 'required|string|email',
            'phone'      => 'required|string',
        ]);

        // simpan data
        Customer::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'address'    => $request->address,
            'city'       => $request->city,
            'postalcode' => $request->postalcode,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $data = [
            'title' => 'Edit Customer',
            'data' => $customer
        ];

        return view('customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'nullable|string',
            'address'    => 'required|string',
            'city'       => 'required|string',
            'postalcode' => 'required|string',
            'email'      => 'required|string|email',
            'phone'      => 'required|string',
        ]);

        $customer->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'address'    => $request->address,
            'city'       => $request->city,
            'postalcode' => $request->postalcode,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
