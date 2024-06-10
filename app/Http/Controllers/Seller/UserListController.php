<?php

namespace App\Http\Controllers\Seller;

use App\DataTables\user\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerUpdateReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); 
        if ($request->hasFile('file')) {
            // Delete old image if it exists
            if ($user->avatar && file_exists(public_path('uploads/' . $user->avatar))) {
                unlink(public_path('uploads/' . $user->avatar));
            }
            $file = $request->file('file');
            $file_name = 'avatar-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $file_name);
            $data['avatar'] = $file_name;
        }
        $user->update($data);
        return redirect('seller/user-list')->with(['status'=> "User berhasil di Perbarui"]);
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        unlink(public_path('uploads/' . $user->avatar));
        return with(['status'=> "User berhasil di Hapus"]);
    }
}
