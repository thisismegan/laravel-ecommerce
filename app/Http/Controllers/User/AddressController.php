<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $id = Auth()->user()->id;
        $address = Address::where('user_id', $id)->first();
        return view('user.profile.address', compact('address'));
    }

    public function create()
    {
        return view('user.address.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'country' => 'required',
            'province'  => 'required',
            'city'  => 'required',
            'sub_district' => 'required',
            'address'    => 'required',
            'zip_code'  => 'required',
            'phone' => 'required|numeric'
        ]);


        Address::create([
            'user_id'   => Auth()->user()->id,
            'name'      => $request['fullname'],
            'country'   => $request['country'],
            'province'  => $request['province'],
            'city'      => $request['city'],
            'sub_district'  => $request['sub_district'],
            'street'        => $request['address'],
            'zip_code'      => $request['zip_code'],
            'phone'         => $request['phone'],
        ]);

        return redirect(route('address.index'))->with('success', 'Your Address has been created!');
    }

    public function edit($id)
    {
        $address = Address::where('id', $id)->where('user_id', Auth()->user()->id)->first();
        if (!$address) {
            return abort(403);
        }
        return view('user.address.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'fullname' => 'required',
            'country' => 'required',
            'province'  => 'required',
            'city'  => 'required',
            'sub_district' => 'required',
            'address'    => 'required',
            'zip_code'  => 'required',
            'phone' => 'required|numeric'
        ]);

        Address::where('id', $address->id)
            ->update([
                'name'      => $request['fullname'],
                'country'   => $request['country'],
                'province'  => $request['province'],
                'city'      => $request['city'],
                'sub_district'  => $request['sub_district'],
                'street'        => $request['address'],
                'zip_code'      => $request['zip_code'],
                'phone'         => $request['phone'],
            ]);

        return redirect(route('address.index'))->with('success', 'Your Contact Address has been Updated!');
    }
}
