<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerStoreReq;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddSellerController extends Controller
{
   
    public function store(SellerStoreReq $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); // Enkripsi password

        Seller::create($data);
        return redirect('seller/add-seller')
            ->with(['add' => 'Seller berhasil dibuat']);
        }

}
