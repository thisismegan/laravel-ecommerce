<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_confirm;
use App\Orders_detail;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function show($id)
    {

        $order_confirm = Order_confirm::where('order_id', $id)->with('order')->first();
        $order = Order::where('id', $id)->with('address')->first();

        if (!$order) {
            return abort(403);
        }
        $detail = Orders_detail::where('order_id', $id)->with('product')->get();

        return view('admin.order.show', compact('detail', 'order', 'order_confirm'));
    }

    public function update(Request $request,  $id)
    {
        $order = Order::where('id', $id)->first();
        if ($order->status == 'unpaid') {
            return redirect()->back()->with('failed', 'Nomor Invoice:' . $order->invoice . ', Belum Melakukan Pembayaran');
        }

        $resi = Order::where('id', $id)->first();
        if ($resi->resi) {
            $input_resi = $resi->resi;
        } else {
            $input_resi = $request->resi;
        }
        Order::where('id', $id)
            ->update([
                'status' => $request->status,
                'resi'   => $input_resi
            ]);

        return redirect()->back()->with('success', 'Order Has been updated');
    }
}
