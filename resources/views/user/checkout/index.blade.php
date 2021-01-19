@extends('user.template.default')
@section('title','Checkout')
@section('content')
<div class="body  stop-float-body">
    <div class="apframe-main">
        <div class="container">
            <div class="page">
                <main class="page-content" data-cart>
                    <div class="container">
                        <span class="square"></span>
                        <h1 class="page-heading" data-cart-page-title>
                            Checkout
                        </h1>
                        @if($cart->count()!==null)
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
                        <div class="new-customer">
                            <div class="panel">
                                <div class="panel-header">
                                    <h2 class="panel-title">List Order</h2>
                                </div>
                                <div class="panel-body">
                                    <table class="cart">
                                        <thead class="cart-header">
                                            <tr>
                                                <th class="cart-header-item">No</th>
                                                <th class="cart-header-item" colspan="2">Item</th>
                                                <th class="cart-header-item">Price</th>
                                                <th class="cart-header-item">Qty</th>
                                                <th class="cart-header-item">SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart-list">
                                            @foreach($cart as $row)
                                            <tr class="cart-item" data-item-row>
                                                <td class="cart-item-block cart-item-info">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="cart-item-block cart-item-figure">
                                                    <img class="cart-item-image" src="{{ $row->product->image() }}" alt="Chemex Coffeemaker 3 Cup" title="Chemex Coffeemaker 3 Cup">
                                                </td>
                                                <td class="cart-item-block cart-item-title">
                                                    <h4 class="cart-item-name"><a target="_blank" href="{{ route('product.detail',$row->product_id) }}">{{ $row->product->title }}</a></h4>
                                                </td>
                                                <td class="cart-item-block cart-item-info">
                                                    <span class="cart-item-value ">Rp{{ number_format($row->product->price,2,',','.') }}</span>
                                                </td>
                                                <td class="cart-item-block cart-item-title">
                                                    <h4 class="cart-item-name">{{ $row->qty }}</h4>
                                                </td>
                                                <td class="cart-item-block cart-item-info">
                                                    <strong class="cart-item-value ">Rp{{ number_format($row->subtotal,2,',','.') }}</strong>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div>
                                        <li class="cart-total">
                                            <div class="cart-total-label">
                                                <strong>Total:</strong>
                                            </div>
                                            <div class="cart-total-value">
                                                <strong>Rp{{ number_format($subtotal,2,',','.') }}</strong>
                                            </div>
                                        </li>
                                    </div>
                                    <form action="{{ route('checkout.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="address_id" value="{{ $address->id }}">
                                        <input type="hidden" name="phone" value="{{ $address->phone }}">
                                        <button class="button button--primary" type="submit"><span class="fa fa-dollar"></span> Paid</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else

                        @endif
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection