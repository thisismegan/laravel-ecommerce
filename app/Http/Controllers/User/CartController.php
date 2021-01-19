<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtotal = Cart::where('user_id', Auth()->user()->id)->sum('subtotal');

        $cart = Cart::where('user_id', Auth()->user()->id)->with('product')->get();
        return view('user/cart/index', compact('cart', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = Address::where('user_id', Auth()->user()->id)->count();
        if ($address < 1) {
            return redirect(route('address.index'))->with('warning', 'Anda belum memasukkan alamat, silahkan isikan alamat terlebih dahulu');
        }

        $cart  = Cart::where('user_id', Auth()->user()->id)
            ->where('product_id', $request->product_id)->first();
        if ($cart) {
            Cart::where('id', $cart->id)
                ->update([
                    'qty' => $cart->qty + $request->qty,
                    'subtotal' => $cart->subtotal + $request->price
                ]);

            return redirect()->back()->with('success', 'Berhasil Menambahkan Kuantitas Produk');
        }

        Cart::create([
            'user_id'       => Auth()->user()->id,
            'product_id'    => $request->product_id,
            'qty'           => $request->qty,
            'subtotal'      => $request->price
        ]);

        return redirect(route('homepage'))->with('success', 'Produk Berhasil Di tambahkan ke Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cart = Cart::where('id', $request->id)->first();
        if ($cart->qty > 1) {
            Cart::where('id', $request->id)
                ->update([
                    'qty' => $cart->qty - 1,
                    'subtotal' => $cart->subtotal - $request->price
                ]);

            return redirect()->back()->with('success', 'Data berhasil diubah');
        }

        Cart::where('id', $request->id)->delete();

        return redirect(route('cart.index'))->with('success', 'Produk berhasil dihapus dari daftar keranjang');
    }
}
