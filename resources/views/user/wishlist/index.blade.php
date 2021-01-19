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
                            Your Wishlist
                        </h1>
                        @if($wishlist->count() != null)
                        <div data-cart-content>
                            <table class="cart">
                                <thead class="cart-header">
                                    <tr>
                                        <th class="cart-header-item">No</th>
                                        <th class="cart-header-item" colspan="2">Item</th>
                                        <th class="cart-header-item">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="cart-list">
                                    @foreach($wishlist as $row)
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
                                        <form action="{{ route('wishlist.destroy',$row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td class="cart-item-block cart-item-info">
                                                <button class="button button--small" type="submit" onclick="return confirm('Apa kamu yakin?')">Delete
                                                </button>
                                            </td>
                                        </form>
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