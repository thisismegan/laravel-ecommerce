@extends('user.template.default')
@section('title',$product->title)
@section('content')
<div class="body stop-float-body">
    <div class="apframe-main">
        <div class="container">
            <div>
                <div class="productView">
                    <section class="productView-details">
                        <div class="productView-product">
                            <h1 class="productView-title">{{ $product->title }}</h1>
                            <div class="productView-price">
                                <span>Rp{{ number_format($product->price,2,',','.') }}</span>
                            </div>
                        </div>
                    </section>
                    <section class="productView-images">
                        <figure class="productView-image">
                            <a href="{{ $product->id }}">
                                <img class="productView-image--default" src="{{ $product->image() }}">
                            </a>
                        </figure>
                    </section>
                    <section class="productView-details">
                        <div class="productView-options">
                            <div class="form-action">
                                <form class="form" method="post" action="{{ route('cart.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button class="button button--primary" type="submit">Add To Cart<button>
                                </form>
                            </div>
                            <!-- snippet location product_addtocart -->
                            <div class="form-action">
                                <form class="form" method="post" action="{{ route('wishlist') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="button" type="submit">Add to Wishlist<button>
                                </form>
                            </div>
                        </div>
                        <!-- snippet location product_details -->
                    </section>

                    <article class="productView-description">
                        <ul class="tabs" data-tab>
                            <li class="tab is-active">
                                <a class="tab-title" href="#tab-description">Description</a>
                            </li>
                        </ul>
                        <div class="tabs-contents">
                            <div class="tab-content is-active" id="tab-description">
                                <div class="col-lg-6">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div id="previewModal" class="modal modal--large" data-reveal>
                    <a href="#" class="modal-close" aria-label="Close" role="button">
                        <span aria-hidden="true">&#215;</span>
                    </a>
                    <div class="modal-content"></div>
                    <div class="loadingOverlay"></div>
                </div>
                <!-- snippet location reviews -->
                <ul class="tabs" data-tab role="tablist">
                    <li class="tab is-active" role="presentational">
                        <a class="tab-title" href="#tab-similar" role="tab" tabindex="0" aria-selected="false" controls="tab-similar">Customers Also Viewed</a>
                    </li>
                </ul>
                <div class="tabs-contents">

                    <div role="tabpanel" aria-hidden="true" class="tab-content has-jsContent is-active" id="tab-similar">
                        <section class="productCarousel" data-slick='{
                                    "dots": false,
                                    "arrows": false,
                                    "infinite": false,
                                    "mobileFirst": true,
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1,
                                    "rows":2,
                                    "autoplay": true,
                                    "responsive": [
                                        {
                                            "breakpoint": 1260,
                                            "settings": {
                                                "slidesToScroll": 1,
                                                "slidesToShow": 4
                                            }
                                        },
                                        {
                                            "breakpoint": 992,
                                            "settings": {
                                                "slidesToScroll": 1,
                                                "slidesToShow": 1
                                            }
                                        },
                                        {
                                            "breakpoint": 550,
                                            "settings": {
                                                "slidesToScroll": 1,
                                                "slidesToShow": 1
                                            }
                                        }
                                    ]
                                }'>
                            @foreach($related->shuffle() as $row)
                            @include('product-card')
                            @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection