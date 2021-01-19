@extends('user.template.default')
@section('title','Detail')
@section('content')
<div class="body  stop-float-body">
    <div class="apframe-main">
        <div class="container">
            <div class="page">
                <main class="page-content" data-cart>
                    <div class="container">
                        <span class="square"></span>
                        <h1 class="page-heading">
                            Your Order Detail {{ $invoice->invoice }}
                        </h1>
                        @if($order->count() != null)
                        <div data-cart-content>
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
                                    @foreach($order as $row)
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
                        </div>
                        <div data-cart-totals>
                            <ul class="cart-totals">
                                <li class="cart-total">
                                    <div class="cart-total-label">
                                        <strong>Subtotal:</strong>
                                    </div>
                                    <div class="cart-total-value">
                                        <strong>Rp{{ number_format($subtotal,2,',','.') }}</strong>
                                    </div>
                                </li>
                                <li class="cart-total">
                                    <div class="cart-total-label">
                                        <strong>Shipping:</strong>
                                    </div>
                                    <div class="cart-total-value">
                                        <button class="shipping-estimate-show">Free</button>
                                    </div>
                                </li>
                                <li class="cart-total">
                                    <div class="cart-total-label">
                                        <strong>Grand total:</strong>
                                    </div>
                                    <div class="cart-total-value cart-total-grandTotal">
                                        <strong>Rp{{ number_format($subtotal,2,',','.') }}</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="cart-actions">
                            <a class="button button--primary" href="{{ route('order.index') }}">Back</a>
                        </div>
                        <hr>

                        <!-- snippet location cart -->
                        @else
                        <h1 class="page-heading" data-cart-page-title>
                            is Empty!
                        </h1>
                        @endif
                    </div>
                    @if($order_confirm)
                    <h3>Bukti Pembayaran</h3>
                    <table class="table table--line wishlists-table">
                        <thead class="table-thead">
                            <tr>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Nominal</th>
                                <th>Image</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody">
                            <tr>
                                <td>{{$order_confirm->account_name}}</td>
                                <td>{{$order_confirm->account_number}}</td>
                                <td>{{ number_format($order_confirm->nominal,2,',','.') }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$order_confirm->image) }}" alt="" style="width:120px">
                                </td>
                                <td>{{$order_confirm->note}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <h4>Silahkan melakukan pembayaran</h4>
                    @endif
                </main>
            </div>
        </div>
    </div>
</div>
@endsection