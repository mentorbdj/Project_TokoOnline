<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Kategori',
            'data'  => Category::paginate(5)
        ];

        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Kategori'
        ];

        return view('category.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate incoming request
        $request->validate([
            'name'           => 'required|string',
            'description'    => 'required|string',
            'image_kategori' => 'nullable',
        ]);

        // upload image
        if ($request->hasFile('image_kategori')) {
            $name       = Str::random(4) . '.' . $request->file('image_kategori')->getClientOriginalExtension();
            $fullpath   = $request->image_kategori->storeAs('kategori', $name, 'public');
            $request->merge(['image' => $fullpath]);
        }

        // store data
        Category::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $request->image
        ]);

        return redirect()->route('category.index')->with('success', 'Kategori Berhasil Ditambahkan!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'title' => 'Edit Kategori',
            'data'  => $category
        ];

        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // validate incoming request
        $request->validate([
            'name'           => 'required|string',
            'description'    => 'required|string',
            'image_kategori' => 'nullable',
        ]);

        // $category               = Category::findOrFail($id);
        $category->name         = $request->name;
        $category->description  = $request->description;

        if ($request->hasFile('image_kategori')) {
            $name       = Str::random(4) . '.' . $request->file('image_kategori')->getClientOriginalExtension();
            $fullpath   = $request->image_kategori->storeAs('kategori', $name, 'public');
            $request->merge(['image' => $fullpath]);

            @unlink('storage/'.$category->image);
            $category->image = $request->image;
        }

        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        @unlink('storage/'.$category->image);
        $category->delete();

        return redirect()->route('category.index');
    }

}
