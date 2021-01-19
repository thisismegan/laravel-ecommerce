<?php

use App\Order;
use App\Contact_support;

$date = date('Y-m-d');
$order_today = Order::where('created_at', $date)->with('user')->get();
$contact_support = Contact_support::where('status', 0)->limit(5)->get();

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-success navbar-badge">{{ $order_today->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"> <i class="fas fa-shopping-cart mr-2"></i> {{ $order_today->count() }} Order's today</span>
                        <div class="dropdown-divider"></div>
                        @foreach($order_today as $row)
                        <a href="{{ route('admin.order.show',$row->id) }}" class="dropdown-item">
                            {{ $loop->iteration }} : {{ $row->user->name}} - {{ substr($row->invoice,0,10) }}...
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-envelope"></i>
                        <span class="badge badge-warning navbar-badge">{{ $contact_support->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"> <i class="fas fa-comment mr-2"></i> {{ $contact_support->count() }} Message Contact Support</span>
                        <div class="dropdown-divider"></div>
                        @foreach($contact_support as $row)
                        <a href="{{ route('admin.contact.index') }}" class="dropdown-item {{ $row->status == 0 ? 'bagde bg-warning' :'' }}">
                            {{ $loop->iteration }} : {{ $row->name}} - {{ substr($row->invoice,0,10) }}...
                        </a>
                        <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        <img src="{{ Auth()->user()->image() }}" class="img-circle elevation-2" style="width: 25px;" alt="User Image"> {{ Auth()->user()->name}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{ route('admin.profile') }}" class="dropdown-item">
                            <p><i class="fas fa-user mr-2"></i>
                                Profil</p>
                        </a>
                        <a href="{{ route('admin.change_password') }}" class="dropdown-item">
                            <p><i class="fas fa-key mr-2"></i>
                                Change Password</p>
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="fas fa-unlock mr-2"></i>
                            Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->