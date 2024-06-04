<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\product\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CategoryStoreReq;
use App\Http\Requests\Product\CategoryUpdateReq;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryListController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {

        return $dataTable->render('seller.category.categorylist');
    }
    public function showAdd()
    {
        return view('seller.category.addcategorylist');
    }
    public function store(CategoryStoreReq $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect('seller/category-list')->with(['status' => "Kategori berhasil di tambah"]);
    }
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('seller.category.editcategorylist')->with('category', $category);
    }
    public function update(CategoryUpdateReq $request, string $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect('seller/category-list')->with(['status' => 'Kategori berhasil di update']);
    }
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return  with(['status' => "Kategori berhasil di Hapus"]);
    }
}
