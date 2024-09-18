<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/home/img/favicon.ico') }}">

    <!-- CSS
 ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/vendor/bootstrap.min.css') }}">
    <!-- Pe-icon-7-stroke CSS -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/vendor/pe-icon-7-stroke.css') }}">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/vendor/font-awesome.min.css') }}">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/plugins/slick.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/plugins/animate.css') }}">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/plugins/nice-select.css') }}">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/plugins/jqueryui.min.css') }}">
    <!-- main style css -->
    <link rel="stylesheet" href="{{ asset('theme/home/css/style.css') }}">
    <style>
        .img-small {
            max-width: 150px;
            /* Điều chỉnh kích thước theo ý muốn */
            height: auto;
            /* Giữ tỷ lệ khung hình */
        }
    </style>
</head>

<body>




    <!-- hero slider area start -->
</body>
@include('clients.block.header')


</html>
<section class="slider-area">
    <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img" data-bg="{{ asset('theme/home/img/slider/home1-slide2.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-1">
                                <h2 class="slide-title">Family Jewelry <span>Collection</span></h2>
                                <h4 class="slide-desc">Designer Jewelry Necklaces-Bracelets-Earings</h4>
                                <a href="shop.html" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item start -->

        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img" data-bg="{{ asset('theme/home/img/slider/home1-slide3.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-2 float-md-end float-none">
                                <h2 class="slide-title">Diamonds Jewelry<span>Collection</span></h2>
                                <h4 class="slide-desc">Shukra Yogam & Silver Power Silver Saving Schemes.</h4>
                                <a href="shop.html" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item start -->

        <!-- single slider item start -->
        <div class="hero-single-slide hero-overlay">
            <div class="hero-slider-item bg-img" data-bg="{{ asset('theme/home/img/slider/home1-slide1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-slider-content slide-3">
                                <h2 class="slide-title">Grace Designer<span>Jewelry</span></h2>
                                <h4 class="slide-desc">Rings, Occasion Pieces, Pandora & More.</h4>
                                <a href="shop.html" class="btn btn-hero">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item end -->
    </div>
</section>
<!-- hero slider area end -->

<!-- twitter feed area start -->

<!-- twitter feed area end -->
<div class="service-policy section-padding">
    <div class="container">
        <div class="row mtn-30">
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-plane"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Free Shipping</h6>
                        <p>Free shipping all order</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-help2"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Support 24/7</h6>
                        <p>Support 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-back"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Money Return</h6>
                        <p>30 days for free return</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-credit"></i>
                    </div>
                    <div class="policy-content">
                        <h6>100% Payment Secure</h6>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- DAnh mục --}}
<div class="banner-statistics-area">
    <div class="container">
        <div class="row row-20 mtn-20">
            @foreach ($category as $item)
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="{{ Storage::url($item->thumbnail) }}" alt="product banner">
                        </a>
                        <div class="banner-content text-right">
                            <h2 class="banner-text2 text-white">{{ $item->name }}<span>CORONA</span></h2>
                            <a href="shop.html" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
            @endforeach

        </div>
    </div>
</div>



<!-- banner statistics area end -->

<!-- product area start -->
<section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">our products</h2>
                    <p class="sub-title">Add our products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container">
                    <!-- product tab menu start -->
                    <div class="product-tab-menu">
                        <ul class="nav justify-content-center">
                            @foreach ($category as $item)
                                <li><a href="#tab1" class="active" data-bs-toggle="tab">{{ $item->name }}</a>
                                </li>
                                {{-- <li><a href="#tab2" data-bs-toggle="tab">Storage</a></li>
                            <li><a href="#tab3" data-bs-toggle="tab">Lying</a></li>
                            <li><a href="#tab4" data-bs-toggle="tab">Tables</a></li> --}}
                            @endforeach
                        </ul>
                    </div>
                    <!-- product tab menu end -->

                    <!-- product tab content start -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                <!-- product item start -->
                                @foreach ($products as $item)
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{ route('products.detail', ['id' => $item->id]) }}">
                                                <img class="pri-img" src="{{ Storage::url($item->image) }}"
                                                    alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="wishlist.html" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="Add to wishlist"><i
                                                        class="pe-7s-like"></i></a>
                                                <a href="compare.html" data-bs-toggle="tooltip"
                                                    data-bs-placement="left" title="Add to Compare"><i
                                                        class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick_view"><span data-bs-toggle="tooltip"
                                                        data-bs-placement="left" title="Quick View"><i
                                                            class="pe-7s-search"></i></span></a>
                                            </div>
                                            <form action="{{ route('cart.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="quantity" id="" value="1">
                                                <input type="hidden" name="product_id" id=""
                                                    value="{{ $item->id }}">
                                                <div class="cart-hover">
                                                    <button class="btn btn-cart">add to cart</button>
                                                </div>
                                            </form>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a
                                                        href="product-details.html">{{ $item->category->name }}</a>
                                                </p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.html">{{ $item->name }}</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{ $item->price }}</span>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>

                    </div>
                </div>
            </div>
</section>

<section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">featured products</h2>
                    <p class="sub-title">Add featured products to weekly lineup</p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    @foreach ($products as $item)
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="{{ route('products.detail', ['id' => $item->id]) }}">
                                    <img class="pri-img" src="{{ Storage::url($item->image) }}" alt="product">

                                </a>
                                <div class="product-badge">
                                    <div class="product-label new">
                                        <span>new</span>
                                    </div>
                                    <div class="product-label discount">
                                        <span>10%</span>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="quantity" id="" value="1">
                                    <input type="hidden" name="product_id" id=""
                                        value="{{ $item->id }}">
                                    <div class="cart-hover">
                                        <button class="btn btn-cart">add to cart</button>
                                    </div>
                                </form>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a
                                            href="product-details.html">{{ $item->category->name }}</a></p>
                                </div>
                                <h6 class="product-name">
                                    <a href="product-details.html">{{ $item->name }}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-regular">{{ $item->price }}</span>

                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>





<!-- brand logo area end -->
</main>
@include('clients.block.footer')

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<script src="{{ asset('theme/home/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('theme/home/js/vendor/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('theme/home/js/vendor/bootstrap.bundle.min.js') }}"></script>
<!-- slick Slider JS -->
<script src="{{ asset('theme/home/js/plugins/slick.min.js') }}"></script>
<!-- Countdown JS -->
<script src="{{ asset('theme/home/js/plugins/countdown.min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('theme/home/js/plugins/nice-select.min.js') }}"></script>
<!-- jquery UI JS -->
<script src="{{ asset('theme/home/js/plugins/jqueryui.min.js') }}"></script>
<!-- Image zoom JS -->
<script src="{{ asset('theme/home/js/plugins/image-zoom.min.js') }}"></script>
<!-- Images loaded JS -->
<script src="{{ asset('theme/home/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
<!-- mail-chimp active js -->
<script src="{{ asset('theme/home/js/plugins/ajaxchimp.js') }}"></script>
<!-- contact form dynamic js -->
<script src="{{ asset('theme/home/js/plugins/ajax-mail.js') }}"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="{{ asset('theme/home/js/plugins/google-map.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('theme/home/js/main.js') }}"></script>
<main>
