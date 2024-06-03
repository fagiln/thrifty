<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\user\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerUpdateReq;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        $user=User::all();
        return $dataTable->render('seller.user.userlist', compact('user'));
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        // return response()->json($user);
        return view('seller.user.modals')->with('user', $user);
    }
    public function update(SellerUpdateReq $request, string $id)
    {
        $user= User::find($id);
        $user->update($request->all());
        return redirect('seller/user-list')->with(['status'=> "User berhasil di Perbarui"]);
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return with(['add', "User berhasil di Hapus"]);
    }
}
