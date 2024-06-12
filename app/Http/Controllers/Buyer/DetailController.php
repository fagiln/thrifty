<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail(string $id){
        $product= Product::findOrFail($id);
        return view('buyer.detail', compact('product'));
    }
}
