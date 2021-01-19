@extends('user.template.default')
@section('title','Account Setting')
@section('content')
<div class="account-body">
    <br>
    <div class="body  stop-float-body">
        @include('user.template.partial.nav_profil')
        <div class="apframe-main">
            <div class="container">
                <div class="page">
                    <ul class="addressList">
                        @if($address)
                        @include('user.template.partial.address')
                        @else
                        <li class="address">
                            <a class="panel panel--address panel--newAddress" href="{{ route('address.create') }}">
                                <span class="panel-body">
                                    <span class="address-addNew">
                                        <span class="address-symbol">+</span>
                                        <h5 class="address-title">New Address</h5>
                                    </span>
                                </span>
                            </a>
                        </li>

                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection