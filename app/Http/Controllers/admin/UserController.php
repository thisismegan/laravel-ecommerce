<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function show($id)
    {
        $admin = User::role('admin')->get();
        if ($id == Auth()->user()->id && $admin) {
            return redirect(route('admin.user.index'));
        }
        $user = User::where('id', $id)->with('address')->first();
        return view('admin.user.show', compact('user'));
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'User has been deleted');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('address')->first();
        return view('admin.user.edit', compact('user'));
    }

    public function update_address(Request $request, $id)
    {
        Address::where('id', $id)
            ->update([
                'country' => $request->country,
                'province'  => $request->province,
                'city'      => $request->city,
                'sub_district' => $request->sub_district,
                'street'        => $request->street,
                'zip_code'      => $request->zip_code,
                'phone'         => $request->phone
            ]);

        return redirect(route('admin.user.index'))->with('success', 'Data User Berhasil Di Update');
    }

    public function change_password()
    {
        return view('admin.user.change_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        $old_pass = Auth()->user()->password;
        $hash = Hash::check($request->old_password, $old_pass);
        if (!$hash) {
            return redirect(route('admin.change_password'))->with('failed', "The Old Password doesn't Match");
        }
        if (Hash::check($request->password, $old_pass)) {
            return redirect(route('admin.change_password'))->with('failed', 'Password Baru harus berbeda dengan password lama');
        }

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return redirect(route('admin.dashboard'))->with('success', 'Password Has Been Changed!');
    }
}
