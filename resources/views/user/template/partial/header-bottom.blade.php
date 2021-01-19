<style>
    .text-white {
        color: white !important;
    }
</style>
<div class="main full">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="widget-banner block">
                    <div class="block_content">
                        <div class="image-box">
                            <div class="img-banner effect">
                                <a href="#">
                                    <img src="{{ asset('homepage/assets/image/1.png')}}" alt="Adv Banner" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner_wrap block">
                    <div class="block_content">
                        <div class="image-box">
                            <div class="img-banner effect">
                                <a href="#">
                                    <img src="{{ asset('homepage/assets/image/3.jpg')}}" alt="Adv Banner" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="on  block-hero-1">
                    <section class="heroCarousel" data-slick='{"dots": true,
                                "mobileFirst": true,
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "autoplay": true,
                                "autoplaySpeed": 5000
                            }'>
                        <div class="heroCarousel-slide " style="background-image: url(homepage/assets/image/2.jpeg)">
                            <a href="">
                                <img class="heroCarousel-image" src="{{ asset('homepage/assets/image/2.jpeg')}}" alt="Our signature fixture that bends to your will" title="Our signature fixture that bends to your will" />
                                <div class="heroCarousel-content heroCarousel-content--empty">
                                </div>
                            </a>
                        </div>
                        <div class="heroCarousel-slide" style="background-image: url(homepage/assets/image/4.png)">
                            <a href="">
                                <img class=" heroCarousel-image" src="{{ asset('homepage/assets/image/3.png')}}" alt="Dig in to a fresh new recipe" title="Dig in to a fresh new recipe" />
                                <div class="heroCarousel-content heroCarousel-content--empty">
                                </div>
                            </a>
                        </div>
                    </section>
                    <!-- snippet location home_content -->

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="widget-banner block">
                    <div class="block_content">
                        <div class="image-box">
                            <div class="img-banner effect">
                                <a href="#">
                                    <img src="{{ asset('homepage/assets/image/5.jpeg')}}" alt="Adv Banner" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-content-region="home_below_featured_products"></div>
        <div class="on big-section-index new-products">
            <div class="section__title">
                <h2 class="page-heading">
                    Voucher Buat Kamu nih!!
                    <span class="text-des text-center">Ambil Voucher-mu untuk menikmati Diskon dari produk kami!!</span>
                </h2>
            </div>
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