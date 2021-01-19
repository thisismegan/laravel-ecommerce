@extends('user.template.default')
@section('title','Cart')
@section('content')
<div class="body  stop-float-body">
    <div class="apframe-main">
        <div class="container">
            <div class="page">
                <main class="page-content" data-cart>
                    <div class="container">
                        <span class="square"></span>
                        <h1 class="page-heading" data-cart-page-title>
                            Your Orders
                        </h1>
                        @if($order->count() != null)
                        <div data-cart-content>
                            <table class="cart">
                                <thead class="cart-header">
                                    <tr>
                                        <th class="cart-header-item">No</th>
                                        <th class="cart-header-item" colspan="2">Invoice</th>
                                        <th class="cart-header-item">Total</th>
                                        <th class="cart-header-item">Status</th>
                                        <th class="cart-header-item">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody class="cart-list">
                                    @foreach($order as $row)
                                    <tr class="cart-item" data-item-row>
                                        <td class="cart-item-block cart-item-info">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td colspan="2" class="cart-item-block cart-item-info">
                                            <h4 class="cart-item-name">
                                                <form action="{{ route('order.show') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" value="{{ $row->id }}" name="order_id">
                                                    <input type="submit" value="{{ $row->invoice }}" id="invoice">
                                                </form>
                                            </h4>
                                        </td>
                                        <td class="cart-item-block cart-item-info">
                                            <span class="cart-item-value ">Rp{{ number_format($row->total,2,',','.') }}</span>
                                        </td>
                                        <td class="cart-item-block cart-item-info">
                                            <h4 class="cart-item-name">{{ $row->status }}</h4>
                                        </td>
                                        <td class="cart-item-block cart-item-info">
                                            @if($row->status=='unpaid')
                                            <a href="{{ route('order.paid',$row->invoice) }}" class="button button--primary button--small"> <span class="fa fa-dollar"></span> Paid</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- snippet location cart -->
                        @else
                        <h1 class="page-heading" data-cart-page-title>
                            is Empty!
                        </h1>
                        @endif
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection