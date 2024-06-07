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
    public function index()
    {
        return view('seller.user.addseller');
    }
    public function store(SellerStoreReq $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); // Enkripsi password
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file) {
                $file_name = 'avatar-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $file_name);
                $data['avatar'] = $file_name;
            }
        }
    
        Seller::create($data);
    
        return redirect('seller/add-seller')
            ->with(['add' => 'Seller berhasil dibuat']);
    }
    
}
