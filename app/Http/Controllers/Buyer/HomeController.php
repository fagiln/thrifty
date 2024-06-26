<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $slider = Slider::all();
    //     $product = Product::all();
    //     return view('buyer.home', compact('slider', 'product'));
    // }
    public function index(Request $request)
    {
        $slider = Slider::all();
        $categories = Category::all();

        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        }
        if ($request->has('category')) {
            $category = $request->get('category');
            if ($category) {
                $query->where('category_id', $category);
            }
        }
        $product = $query->where('stock', '>', 0)->get();

        return view('buyer.index', compact('product', 'slider', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function buy(string $id)
    {
        // Mulai transaksi database
        DB::beginTransaction();
    
        try {
            // Temukan produk berdasarkan ID
            $product = Product::findOrFail($id);
    
            // Periksa apakah stok mencukupi
            if ($product->stock < 1) {
                // Jika stok tidak mencukupi, lempar pengecualian
                throw new \Exception('Stok produk tidak mencukupi.');
            }
    
            // Kurangi stok produk
            $product->stock -= 1;
    
            // Simpan perubahan ke database
            $product->save();
    
            // Commit transaksi database
            DB::commit();
    
            // Redirect ke halaman home dengan pesan sukses
            return redirect('/home')->with('success', 'Produk berhasil dibeli.');
    
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            DB::rollBack();
    
            // Redirect ke halaman home dengan pesan error
            return redirect('/home')->with('error', $e->getMessage());
        }
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
