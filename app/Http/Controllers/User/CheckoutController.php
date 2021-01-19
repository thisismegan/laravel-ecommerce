<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\Orders_detail;
use Egulias\EmailValidator\Exception\LocalOrReservedDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth()->user()->id)->get();

        if ($cart->count() == null) {
            return redirect(route('homepage'));
        }
        $address = Address::where('user_id', Auth()->user()->id)->first();
        $subtotal = Cart::where('user_id', Auth()->user()->id)->sum('subtotal');
        return view('user.checkout.index', compact('cart', 'subtotal', 'address'));
    }

    public function store(Request $request)
    {
        $status = Order::where('status', 'unpaid')->where('user_id', Auth()->user()->id)->count();
        if ($status > 0) {
            return redirect()->back()->with('warning', 'Anda Masih Memiliki Orderan Yang Belum Dibayar');
        }

        $total = Cart::where('user_id', Auth()->user()->id)->sum('subtotal');

        $order = Order::create([
            'user_id'   =>  Auth()->user()->id,
            'created_at'    => date('Y-m-d'),
            'invoice'       => 'INV' . Auth()->user()->id . date('YmdHis'),
            'total'         => $total,
            'address_id'    => $request->address_id,
            'phone'         => $request->phone,
            'status'        => 'unpaid',
        ]);

        $cart = Cart::where('user_id', Auth()->user()->id)->get();
        foreach ($cart as $row) {
            $row->id = $order;
            unset($cart->user_id);

            orders_detail::create([
                'order_id' => $order->id,
                'product_id' => $row->product_id,
                'qty'       => $row->qty,
                'subtotal'  => $row->subtotal,
            ]);
        }
        Cart::where('user_id', Auth()->user()->id)->delete();

        $order = Order::where('user_id', Auth()->user()->id)->first();

        return redirect(route('order.paid', $order->invoice));
    }
}
