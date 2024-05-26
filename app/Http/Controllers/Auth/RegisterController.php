<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreReq;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use ResponseFormatter;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }


    public function store(UserStoreReq $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); // Enkripsi password

        User::create($data);
        return redirect('/login')
            ->with(['register' => 'Register berhasil']);
    }
}
