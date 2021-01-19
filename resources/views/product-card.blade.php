<div class="productCarousel-slide product">
    <article class="card  clearfix">
        <figure class="card-figure">
            <a href="{{ route('product.detail',$row->id) }}" target="_blank" class="product_img_link">
                <img class="card-image lazyload" data-sizes="auto" src="{{ $row->image() }}" data-src="{{ $row->image() }}" alt="{{ $row->title }}" title="{{ $row->title }}">
                <span class="product-additional">
                    <img class="replace-2x img-responsive" src="{{ $row->image() }}" alt="{{ $row->title }}" title="{{ $row->title }}">
                </span>
            </a>
            <figcaption class="card-figcaption">
                <div class="card-figcaption-body flex-box">
                    <div class="flex-item flex-quick-view">
                        <a target="_blank" href="{{ route('product.detail',$row->id) }}" class="button button--small card-figcaption-button"><span class="hidden">Quick view</span>
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div class="box-wishlist flex-item flex-wishlist true-compare">
                        <form class="form" method="post" action="{{ route('cart.store') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $row->id }}">
                            <input type="hidden" name="qty" value="1">
                            <input type="hidden" name="price" value="{{ $row->price }}">
                            <button class="button button--small card-figcaption-button" type="submit"><span class="hidden"></span>
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </form>
                    </div>
                    <div class="box-wishlist flex-item flex-wishlist true-compare ">
                        <form class="form" method="post" action="{{ route('wishlist') }}">
                            @csrf
                            <div class="form-action">
                                <input type="hidden" name="product_id" value="{{ $row->id }}">
                                <button class="button button--small card-figcaption-button" type="submit"><span class="hidden">Wishlist</span>
                                    <i class="fa fa-heart"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </figcaption>
        </figure>
        <div class="card-body">
            <p class="card-title">
                <a href="{{ route('product.detail',$row->id) }}">{{ $row->title }}</a>
            </p>
            <div class="card-text card-price" data-test-info-type="price">
                <div class="price-section price-section--withoutTax ">
                    <span class="price price--withoutTax">Rp{{ number_format($row->price,2,',','.') }}</span>
                </div>
            </div>
            <div class="deal-clock lof-clock-111-detail">
                <time>
                </time>
            </div>
            <div class="description">
                <p>{{ $row->description }}</p>
            </div>
        </div>
    </article>
</div>