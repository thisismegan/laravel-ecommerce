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
                                Your Cart
                            </h1>
                            @if($cart->count() != null)
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
                                            <form action="{{ route('cart.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $row->id }}">
                                                <input type="hidden" name="price" value="{{ $row->product->price }}">
                                                <td class="cart-item-block cart-item-info">
                                                    <strong class="cart-item-value ">Rp{{ number_format($row->subtotal,2,',','.') }}</strong>
                                                    <button class="cart-remove icon" type="submit" onclick="return confirm('Apa kamu yakin?')">
                                                        <svg>
                                                            <use xlink:href="#icon-close"></use>
                                                            <svg viewBox="0 0 24 24" id="icon-close">
                                                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                                            </svg>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </form>
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
                                <a class="button button--primary" href="{{ route('checkout.index')}}">Checkout</a>
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