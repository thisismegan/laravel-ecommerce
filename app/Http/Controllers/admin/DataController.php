<?php

namespace App\Http\Controllers\Admin;

use App\Contact_support;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function product()
    {
        $model = Product::orderBy('title')->with('category');
        return DataTables()->of($model)
            ->addIndexColumn()
            ->editColumn('price', function (Product $product) {
                return 'Rp' . number_format($product->price, 2, ',', '.');
            })
            ->editColumn('image', function (Product $product) {
                return '<img style="width:100px" src="' . $product->image() . '">';
            })
            ->editColumn('category_id', function (Product $product) {
                return $product->category->category_name;
            })
            ->addColumn('action', 'admin.product.action')
            ->rawColumns(['image', 'action', 'price', 'category_id'])
            ->toJson();
    }

    public function order()
    {
        $model = Order::with('user')->get();

        return DataTables()->of($model)
            ->addIndexColumn()
            ->editColumn('total', function (Order $order) {
                return 'Rp' . number_format($order->total, 2, ',', '.');
            })
            ->editColumn('name', function (Order $order) {
                return $order->user->name;
            })
            ->editColumn('resi', function (Order $order) {
                return $order->resi ? $order->resi : '';
            })
            ->addColumn('action', 'admin.order.action')
            ->addColumn('invoice', 'admin.order.invoice')
            ->rawColumns(['total', 'invoice', 'action', 'resi'])
            ->toJson();
    }

    public function user()
    {
        $model = User::role('member')->with('address')->get();

        return DataTables()->of($model)
            ->addIndexColumn()
            ->editColumn('image', function (User $user) {
                return '<img style="width:100px" src="' . $user->image() . '">';
            })
            ->editColumn('phone', function (User $user) {
                return $user->address['phone'];
            })
            ->addColumn('status', 'Aktif')
            ->addColumn('action', 'admin.user.action')
            ->rawColumns(['image', 'action', 'phone', 'status'])
            ->toJson();
    }

    public function export()
    {
        $model = DB::table('orders_detail')
            ->join('orders', 'orders.id', '=', 'orders_detail.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders_detail.product_id')
            ->select('users.*', 'orders.*', 'products.*', 'orders_detail.*')
            ->get();

        return DataTables()->of($model)
            ->addIndexColumn()
            ->editColumn('created_at', function ($model) {

                return date('d-m-Y', strtotime($model->created_at));
            })
            ->rawColumns(['created_at'])
            ->toJson();
    }

    public function contact_support()
    {
        $model = Contact_support::all();

        return DataTables()->of($model)
            ->addIndexColumn()
            ->editColumn('status', function (Contact_support $contact) {
                return $contact->status == 0 ? '<span class="badge bg-warning">Pending</a>' : '<span class="badge bg-success">Solved</a>';
            })
            ->addColumn('action', 'admin.contact.action')
            ->rawColumns(['action', 'status'])
            ->toJson();
    }
}
