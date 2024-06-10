<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileUpdateReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('buyer.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateReq $request, string $id)
    {
        $data = $request->validated();
        $profile = User::findOrFail($id);
        $data['password'] = Hash::make($data['password']); 
        if ($request->hasFile('file')) {
            // Delete old image if it exists
            if ($profile->avatar && file_exists(public_path('uploads/' . $profile->avatar))) {
                unlink(public_path('uploads/' . $profile->avatar));
            }
            $file = $request->file('file');
            $file_name = 'avatar-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $file_name);
            $data['avatar'] = $file_name;
        }
        $profile->update($data);
        return redirect()->back()->with(['status' => 'Update profile berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
