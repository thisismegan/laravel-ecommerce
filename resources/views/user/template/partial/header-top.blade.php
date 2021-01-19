<style>
    .active {
        color: #eb8f73 !important;
        ;
    }
</style>
<?php

use App\Cart;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;

if (Auth()->user()) {
    $wishlist = Wishlist::where('user_id', Auth()->user()->id)->count();
    $total_cart = Cart::where('user_id', Auth()->user()->id)->count();
} else {
}
?>
<header id="header" class="header" role="banner">
    <div class="topbar">
        <div class="container">
            <nav class="navUser">
                <ul class="navUser-section navUser-section--alt">
                    <li class="navUser-item">
                        <a class="navUser-action navUser-item--compare" href="/compare" data-compare-nav>Compare<span class="countPill countPill--positive countPill--alt"></span></a>
                    </li>
                    @if(Auth::user())
                    <li class="navUser-item">
                        <a class="navUser-action  {{ $wishlist ? 'active' :'' }} " href="{{ route('wishlist.index',Auth()->user()->id) }}">
                            <span class="fa fa-heart"></span>
                            Wishlist
                        </a>
                    </li>
                    <li class="navUser-item navUser-item--account">
                        <a class="navUser-action has-dropdown" href="#" data-dropdown="currencySelection" aria-controls="currencySelection" aria-expanded="true">
                            <i class="fa fa-user"></i></i> {{ Auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu is-open f-open-dropdown" id="currencySelection" data-dropdown-content="" aria-hidden="false" tabindex="-1" style="position: absolute; right: 0px; top: 43px;">
                            <li class="dropdown-menu-item">
                                <a href="{{ route('user.profil') }}">
                                    <i class="fa fa-user"></i>
                                    Profil
                                </a>
                                <a href="{{ route('order.index') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Orders
                                </a>
                                <a href="{{ route('change_password') }}">
                                    <i class="fa fa-key"></i>
                                    Change Password
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-unlock-alt"></i>
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                            @else
                            <li class="navUser-item navUser-item--account">
                                <a class="navUser-action" href="{{ route('login') }}"><i class="fa fa-lock"></i></i>Sign in</a>
                                <a class="navUser-action" href="{{ route('register') }}"><i class="fa fa-edit"></i>Register</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="header_nav stop-float">
        <div class="container">
            <div class="header_nav-fix">
                <a href="#" class="mobileMenu-toggle" data-mobile-menu-toggle="menu">
                    <span class="mobileMenu-toggleIcon">Toggle menu</span>
                </a>
                <h1 class="header-logo header-logo--center">
                    <a href="{{ route('homepage') }}">
                        <img class="header-logo-image" src="{{ asset('homepage/assets/image/logo.png') }}" style="width: 230px;" alt="Alaska 4" title="Alaska 4">
                    </a>
                </h1>
                <div class="navPages-container" id="menu" data-menu>
                    <nav class="navPages">
                        <div class="navPages-quickSearch">
                            <div class="container-fluid">
                                <a class="modal-close hidden-sm hidden-xs" aria-label="Close" data-drop-down-close="" role="button">
                                    <span aria-hidden="true">×</span>
                                </a>
                                <section class="quickSearchResults" data-bind="html: results"></section>
                            </div>
                        </div>
                        <ul class="navPages-list">
                            <li class="navPages-item navPages-item-page ">
                                <a class="navPages-action {{ Request::path()==='/' ? 'active':'' }} " href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li class="navPages-item">
                                <a class="navPages-action has-subMenu" href="">
                                    WOMEN SERIES
                                </a>
                            </li>
                            <li class="navPages-item">
                                <a class="navPages-action has-subMenu" href="#" data-collapsible="navPages-24">
                                    BEST SELLER <i class="icon navPages-action-moreIcon" aria-hidden="true"><svg>
                                            <use xlink:href="#icon-chevron-down" />
                                        </svg></i>
                                </a>
                            </li>
                            <li class="navPages-item navPages-item-page">
                                <a class="navPages-action" href="#">Blog</a>
                            </li>
                            <li class="navPages-item navPages-item-page">
                                <a class="navPages-action has-subMenu is-root" href="{{ route('contact') }}">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                        <ul class="navPages-list navPages-list--user">
                            @if(Auth::user())
                            <li class="navPages-item">
                                <a href="{{ route('user.profil') }}" class="navPages-action">
                                    <i class="fa fa-user"></i>
                                    Profil
                                </a>
                                <a href="{{ route('order.index') }}" class="navPages-action">
                                    <i class="fa fa-shopping-cart"></i>
                                    Orders
                                </a>
                                <a class="navUser-action  {{ $wishlist ? 'active' :'' }} " href="{{ route('wishlist.index',Auth()->user()->id) }}">
                                    <span class="fa fa-heart"></span>
                                    Wishlist
                                </a>
                                <a class="navUser-action" href="{{ route('cart.index') }}">
                                    <span class="fa fa-shopping-cart "></span>
                                    <span class="hidden navUser-item-cartLabel">Cart</span>
                                    <span class="countPill cart-quantity">
                                        {{ $total_cart ?? '0' }}
                                    </span>
                                </a>
                                <a href="{{ route('change_password') }}" class="navPages-action">
                                    <i class="fa fa-key"></i>
                                    Change Password
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="navPages-action">
                                    <i class="fa fa-unlock-alt"></i>
                                    Logout
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                            @else
                            <li class="navPages-item">
                                <a class="navPages-action" href="{{ route('login') }}">Sign in</a>
                                or <a class="navPages-action" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="header__right">
                    <ul class="clearfix">
                        <li class="navUser-item navUser-item--cart">
                            <a class="navUser-action" href="{{ route('cart.index') }}">
                                <span class="fa fa-shopping-cart "></span>
                                <span class="hidden navUser-item-cartLabel">Cart</span>
                                <span class="countPill cart-quantity">
                                    {{ $total_cart ?? '0' }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('user.template.partial.notif')
        </div>
    </div>
</header>