<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {

        $all_orders = Order::all();
        $user = User::role('member');
        $product = Product::all();

        return view('admin.dashboard.index', compact('all_orders', 'user', 'product'));
    }
}
