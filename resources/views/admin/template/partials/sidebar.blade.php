<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/images/favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>StayCation</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::path()==='admin' ? 'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ Request::segment(2)==='user' ? 'active':'' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ Request::segment(2)==='product' || Request::segment(2)==='category' ? 'menu-open':'' }} ">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::segment(2)==='product' || Request::segment(2)==='category' ? 'active':'' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::segment(2)==='product' ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Data Product
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::segment(2)==='category' ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link {{ Request::segment(2)==='order' ? 'active':'' }}">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.export.index') }}" class="nav-link {{ Request::segment(2)==='export' ? 'active':'' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Report
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>