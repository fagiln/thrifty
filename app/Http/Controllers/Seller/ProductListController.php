<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\product\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreReq;
use App\Http\Requests\Product\ProductUpdateReq;
use App\Models\Category;
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

    
    public function store(ProductStoreReq $request)
    {
        //    dd($request->all());
        $file = $request->file('file');
        $data = $request->validated();
        $file_name = 'image-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $file_name);
        Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'category_id' => $data['category_id'],
            'stock' => $data['stock'],
            'img_path' => $file_name,
            'description' => $data['description'],
        ]);
        return  redirect('seller/product-list')->with('status', 'Berhasil Upload');
    }

    /**
     * Display the specified resource.
     */
    public function showadd()
    {
        $category = Category::all();
        return view('seller.product.addproduct', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('seller.product.editproduct', compact('product','category'));
    }

    public function update(ProductUpdateReq $request, string $id)
    {
        $product =  Product::find($id);
        $data = $request->validated();
        if ($request->hasFile('file')) {
            // Delete old image if it exists
            if ($product->img_path && file_exists(public_path('uploads/' . $product->img_path))) {
                unlink(public_path('uploads/' . $product->img_path));
            }
    
            // Upload new image
            $file = $request->file('file');
            $file_name = 'image-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $file_name);
    
            // Update the image path in the data array
            $data['img_path'] = $file_name;
        }
        $product->update($data);

        return redirect('seller/product-list')->with(['status'=> 'Berhasil update product']);
    }
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        unlink(public_path('uploads/' . $product->img_path));
        return with(['status' => 'Berhasil di Hapus']);
    }
}
