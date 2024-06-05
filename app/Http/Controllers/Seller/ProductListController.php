<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\product\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreReq;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('seller.product.productlist');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    dd($request->all());
        $file = $request->file('file');
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:category,id', // asumsikan tabel categories dan kolom id ada
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'file' => 'required', // atau 'required|file' jika mengharuskan gambar
        ]);
        $file_name = 'image-'.time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $file_name);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'img_path' => $file_name,
            'description' => $request->description,
        ]);
        return  redirect('seller/product-list')->with('status', 'Berhasil Upload');
    }

    /**
     * Display the specified resource.
     */
    public function showadd()
    {
        return view('seller.product.addproduct');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
