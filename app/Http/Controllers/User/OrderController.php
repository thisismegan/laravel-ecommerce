<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_confirm;
use App\Orders_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $id = Auth()->user()->id;
        $order = Order::where('user_id', $id)->get();

        return view('user.order.index', compact('order'));
    }

    public function paid($invoice)
    {
        $order = Order::where('invoice', $invoice)
            ->where('user_id', Auth()->user()->id)
            ->first();
        if (!$order) {
            return abort(403);
        }

        return view('user.order.order_confirm', compact('order'));
    }

    public function show(Request $request)
    {
        $invoice = Order::where('id', $request->order_id)->first();
        $id = $request->order_id;
        $order_confirm = Order_confirm::where('order_id', $id)->with('order')->first();
        $subtotal = Orders_detail::where('order_id', $id)->sum('subtotal');
        $order = Orders_detail::where('order_id', $id)->with('product')->get();
        return view('user.order.show', compact('order', 'subtotal', 'order_confirm', 'invoice'));
    }

    public function order_confirm(Request $request)
    {
        $status = Order::where('id', $request->order_id)->first();
        if ($status->status == 'waiting') {
            return redirect(route('order.index'))->with('warning', 'Anda sudah melakukan konfirmasi pembayaran, mohon menunggu pengecekan dari admin');
        }

        $request->validate(
            [
                'account_name'          => 'required|min:3|max:100',
                'account_number'        => 'required|numeric',
                'nominal'               => 'required|numeric',
                'image'                 => 'required|file|image',
            ]
        );

        if ($request->image == null) {
            return redirect()->back()->with('warning', 'Upload your proof of payment');
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('assets/bukti');
        }

        Order_confirm::create([
            'order_id'              => $request->order_id,
            'account_name'          => $request->account_name,
            'account_number'        => $request->account_number,
            'nominal'               => $request->nominal,
            'image'                 => $path,
            'note'                  => $request->note,
        ]);

        Order::where('id', $request->order_id)->update(['status' => 'waiting']);

        return redirect(route('order.index'))->with('success', 'Sukses Melakukan Pembayaran, Mohon menunggu pengecekan admin');
    }
}
