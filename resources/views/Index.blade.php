@extends('Layout.Layout')

@section('Content')
    <!--================================= Hero Area ===================================== -->
    <section class="hero-area hero-slider-1">
        <div class="sb-slick-slider"
            data-slick-setting='{
                                                                "autoplay": true,
                                                                "fade": true,
                                                                "autoplaySpeed": 3000,
                                                                "speed": 3000,
                                                                "slidesToShow": 1,
                                                                "dots":true
                                                                }'>
            <div class="single-slide bg-shade-whisper  ">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-right">
                            <img src="{{ URL('image/bg-images/home-slider-2-ai.png') }}" alt="">
                        </div>
                        <div class="row g-0">
                            <div class="col-xl-6 col-md-6 col-sm-7">
                                <div class="home-content-inner content-left-side text-start">
                                    <h1>H.G. Wells<br>
                                        De Vengeance</h1>
                                    <h2>Cover Up Front Of Books and Leave Summary</h2>
                                    <a href="shop-grid" class="btn btn-outlined--primary">
                                        View Book Store
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slide bg-ghost-white">
                <div class="container">
                    <div class="home-content text-center text-sm-left position-relative">
                        <div class="hero-partial-image image-left">
                            <img src="{{ URL('image/bg-images/home-slider-1-ai.png') }}" alt="">
                        </div>
                        <div class="row align-items-center justify-content-start justify-content-md-end">
                            <div class="col-lg-6 col-xl-7 col-md-6 col-sm-7">
                                <div class="home-content-inner content-right-side text-start">
                                    <h1>J.D. Kurtness <br>
                                        De Vengeance</h1>
                                    <h2>Cover Up Front Of Books and Leave Summary</h2>
                                    <a href="shop-grid" class="btn btn-outlined--primary">
                                        View Book Store
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Home Features Section ===================================== -->
    <section class="mb--30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="text">
                            <h5>Free Shipping Item</h5>
                            <p> Orders over $500</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-redo-alt"></i>
                        </div>
                        <div class="text">
                            <h5>Money Back Guarantee</h5>
                            <p>100% money back</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="text">
                            <h5>Cash On Delivery</h5>
                            <p>Lorem ipsum dolor amet</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mt--30">
                    <div class="feature-box h-100">
                        <div class="icon">
                            <i class="fas fa-life-ring"></i>
                        </div>
                        <div class="text">
                            <h5>Help & Support</h5>
                            <p>Call us : + 0123.4567.89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Promotion Section One ===================================== -->
    <section class="section-margin">
        <h2 class="sr-only">Promotion Section</h2>
        <div class="container">
            <div class="row space-db--30">
                <div class="col-lg-6 col-md-6 mb--30">
                    <a href="{{ URL('/shop-grid') }}" class="promo-image promo-overlay">
                        <img src="{{ URL('image/bg-images/promo-banner-with-text.jpg') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 mb--30">
                    <a href="{{ URL('/shop-grid') }}" class="promo-image promo-overlay">
                        <img src="{{ URL('image/bg-images/promo-banner-with-text-2.jpg') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Home Slider Tab ===================================== -->
    <section class="section-padding">
        <h2 class="sr-only">Home Tab Slider Section</h2>
        <div class="container">
            <div class="sb-custom-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @if (count($Data['Section_FNM']['Featured']) > 0)
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-bs-toggle="tab" href="index#shop" role="tab"
                                aria-controls="shop" aria-selected="true">
                                Featured Products
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    @endif
                    @if (count($Data['Section_FNM']['NewArrival']) > 0)
                        <li class="nav-item">
                            <a class="nav-link" id="men-tab" data-bs-toggle="tab" href="index#men" role="tab"
                                aria-controls="men" aria-selected="true">
                                New Arrivals
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    @endif
                    @if (count($Data['Section_FNM']['MostSelling']) > 0)
                        <li class="nav-item">
                            <a class="nav-link" id="woman-tab" data-bs-toggle="tab" href="index#woman" role="tab"
                                aria-controls="woman" aria-selected="false">
                                Most Selling Products
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    @if (count($Data['Section_FNM']['Featured']) > 0)
                        <div class="tab-pane show active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 5,
                                            "rows":2,
                                            "dots":true
                                        }'
                                data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                        ]'>
                                @foreach ($Data['Section_FNM']['Featured'] as $book)
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a class="author">
                                                    {{ $book->author->displayName }}
                                                </a>
                                                <h3><a style="height: 40px;"
                                                        href="{{ URL('product-details', Crypt::encrypt($book->id)) }}">{{ $book->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{ URL($book->image) }}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="{{ URL('product-details', Crypt::encrypt($book->id)) }}"
                                                            class="hover-image">
                                                            <img src="{{ URL($book->image) }}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a class="AddToCartBtn single-btn"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a class="single-btn ManageWishlistBtn {{ Auth::check() &&$book->wishlists->where('user_id', Auth::user()->id)->where('book_id', $book->id)->isNotEmpty()? 'bg-success': '' }}"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>

                                                            <a data-bs-toggle="modal" data-bs-target="#quickModal"
                                                                class="single-btn quickViewBtn"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    @if ($book->discountPercent != 0)
                                                        <!-- After Discount Price in USD -->
                                                        <span class="price">
                                                            ${{ number_format($book->priceInUSD * (1 - $book->discountPercent / 100), 2) }}</span>
                                                        <!-- Before Discount Price in USD -->
                                                        <del class="price-old">${{ $book->priceInUSD }}</del>
                                                        <!-- Discount Percentage -->
                                                        <span class="price-discount">{{ $book->discountPercent }}%</span>
                                                    @else
                                                        <!-- Regular Price if no Discount -->
                                                        <span class="price">${{ $book->priceInUSD }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if (count($Data['Section_FNM']['NewArrival']) > 0)
                        <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 5,
                                            "rows":2,
                                            "dots":true
                                        }'
                                data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                        ]'>
                                @foreach ($Data['Section_FNM']['NewArrival'] as $book)
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a class="author">
                                                    {{ $book->author->displayName }}
                                                </a>
                                                <h3><a style="height: 40px;"
                                                        href="{{ URL('product-details', Crypt::encrypt($book->id)) }}">{{ $book->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{ URL($book->image) }}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="{{ URL('product-details', Crypt::encrypt($book->id)) }}"
                                                            class="hover-image">
                                                            <img src="{{ URL($book->image) }}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a class="AddToCartBtn single-btn"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a class="single-btn ManageWishlistBtn {{ Auth::check() &&$book->wishlists->where('user_id', Auth::user()->id)->where('book_id', $book->id)->isNotEmpty()? 'bg-success': '' }}"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>

                                                            <a data-bs-toggle="modal" data-bs-target="#quickModal"
                                                                class="single-btn quickViewBtn"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    @if ($book->discountPercent != 0)
                                                        <!-- After Discount Price in USD -->
                                                        <span class="price">
                                                            ${{ number_format($book->priceInUSD * (1 - $book->discountPercent / 100), 2) }}</span>
                                                        <!-- Before Discount Price in USD -->
                                                        <del class="price-old">${{ $book->priceInUSD }}</del>
                                                        <!-- Discount Percentage -->
                                                        <span class="price-discount">{{ $book->discountPercent }}%</span>
                                                    @else
                                                        <!-- Regular Price if no Discount -->
                                                        <span class="price">${{ $book->priceInUSD }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if (count($Data['Section_FNM']['MostSelling']) > 0)
                        <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider"
                                data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 5,
                                            "rows":2,
                                            "dots":true
                                        }'
                                data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                        ]'>
                                @foreach ($Data['Section_FNM']['MostSelling'] as $book)
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a class="author">
                                                    {{ $book->author }}
                                                </a>
                                                <h3><a style="height: 40px;"
                                                        href="{{ URL('product-details', Crypt::encrypt($book->id)) }}">{{ $book->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <img src="{{ URL($book->image) }}" alt="">
                                                    <div class="hover-contents">
                                                        <a href="{{ URL('product-details', Crypt::encrypt($book->id)) }}"
                                                            class="hover-image">
                                                            <img src="{{ URL($book->image) }}" alt="">
                                                        </a>
                                                        <div class="hover-btns">
                                                            <a class="AddToCartBtn single-btn"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-shopping-basket"></i>
                                                            </a>
                                                            <a class="single-btn ManageWishlistBtn {{ Auth::check() &&$book->wishlists->where('user_id', Auth::user()->id)->where('book_id', $book->id)->isNotEmpty()? 'bg-success': '' }}"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a href="compare" class="single-btn">
                                                                <i class="fas fa-random"></i>
                                                            </a>

                                                            <a data-bs-toggle="modal" data-bs-target="#quickModal"
                                                                class="single-btn quickViewBtn"
                                                                data-id="{{ $book->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    @if ($book->discountPercent != 0)
                                                        <!-- After Discount Price in USD -->
                                                        <span class="price">
                                                            ${{ number_format($book->priceInUSD * (1 - $book->discountPercent / 100), 2) }}</span>
                                                        <!-- Before Discount Price in USD -->
                                                        <del class="price-old">${{ $book->priceInUSD }}</del>
                                                        <!-- Discount Percentage -->
                                                        <span class="price-discount">{{ $book->discountPercent }}%</span>
                                                    @else
                                                        <!-- Regular Price if no Discount -->
                                                        <span class="price">${{ $book->priceInUSD }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!--================================= Deal of the day ===================================== -->

    @if (count($Data['DealOfTheDay']) > 0)
        <section class="section-margin">
            <div class="container-fluid">
                <div class="promo-section-heading">
                    <h2>Deal of the day up to 20% off Special offer</h2>
                </div>
                <div class="product-slider with-countdown  slider-border-single-row sb-slick-slider"
                    data-slick-setting='{
                                                            "autoplay": true,
                                                            "autoplaySpeed": 8000,
                                                            "slidesToShow": 6,
                                                            "dots":true
                                                        }'
                    data-slick-responsive='[
                                                                {"breakpoint":1400, "settings": {"slidesToShow": 4} },
                                                                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                                                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                                                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                                                                {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                                            ]'>
                    @foreach ($Data['DealOfTheDay'] as $deal)
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <a href="{{ URL('/index') }}" class="author">
                                        {{ $deal->book->author->displayName ?? 'Unknown Author' }}
                                        <!-- Adjust based on how you retrieve the author -->
                                    </a>
                                    <h3>
                                        <a style="height: 40px;"
                                            href="{{ URL('product-details', $deal->book->id) }}">{{ $deal->book->title }}</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL($deal->book->image) }}" alt="{{ $deal->book->title }}">
                                        <div class="hover-contents">
                                            <a href="{{ URL('product-details', $deal->book->id) }}" class="hover-image"
                                                style="height: 40px;">
                                                <img src="{{ URL($deal->book->image) }}" alt="{{ $deal->book->title }}">
                                            </a>
                                            <div class="hover-btns">
                                                <a class="AddToCartBtn single-btn" data-id="{{ $deal->book->id }}">
                                                    <i class="fas fa-shopping-basket"></i>
                                                </a>
                                                <a class="single-btn ManageWishlistBtn {{ Auth::check() &&$book->wishlists->where('user_id', Auth::user()->id)->where('book_id', $deal->book->id)->isNotEmpty()? 'bg-success': '' }}"
                                                    data-id="{{ $deal->book->id }}">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                                <a href="compare" class="single-btn">
                                                    <i class="fas fa-random"></i>
                                                </a>
                                                <a data-bs-toggle="modal" data-bs-target="#quickModal"
                                                    class="single-btn quickViewBtn" data-id="{{ $deal->book->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        @if ($deal->Book->discountPercent != 0)
                                            <!-- After Discount Price in USD -->
                                            <span class="price">
                                                ${{ number_format($deal->Book->priceInUSD * (1 - $deal->Book->discountPercent / 100), 2) }}</span>
                                            <!-- Before Discount Price in USD -->
                                            <del class="price-old">${{ $deal->Book->priceInUSD }}</del>
                                            <!-- Discount Percentage -->
                                            <span class="price-discount">{{ $deal->Book->discountPercent }}%</span>
                                        @else
                                            <!-- Regular Price if no Discount -->
                                            <span class="price">${{ $deal->Book->priceInUSD }}</span>
                                        @endif
                                    </div>
                                    <div class="count-down-block">
                                        <div class="product-countdown" data-countdown="{{ $deal->expireDate }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
    @endif


    <!--================================= Best Seller Product ===================================== -->
    @if (count($Data['BestSeller']['books']) > 0)
        @php
            $author = $Data['BestSeller']['author'];
            $books = $Data['BestSeller']['books'];
        @endphp
        <section class="section-margin bg-image section-padding-top section-padding"
            data-bg="{{ URL('image/bg-images/best-seller-bg.jpg') }}">
            <div class="container">
                <div class="section-title section-title--bordered mb-0">
                    <h2>Best BEST SELLER BOOKS</h2>
                </div>
                <div class="best-seller-block">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="author-image">
                                <img src="{{ URL($author->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="sb-slick-slider product-slider product-list-slider multiple-row slider-border-multiple-row"
                                data-slick-setting='{
                                    "autoplay": false,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow":2,
                                    "rows":2,
                                    "dots":true
                                }'
                                data-slick-responsive='[
                                    {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":992, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                    {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                ]'>
                                @foreach ($books as $book)
                                    <div class="single-slide">
                                        <div class="product-card card-style-list">
                                            <div class="card-image">
                                                <img src="{{ URL($book->image) }}" style="min-width: 100px;"
                                                    alt="">
                                            </div>
                                            <div class="product-card--body">
                                                <div class="product-header">
                                                    <a href="index#" class="author">
                                                        {{ $book->author->displayName }}
                                                    </a>
                                                    <h3>
                                                        <a href="{{ URL('product-details', Crypt::encrypt($book->id)) }}"
                                                            class="text-truncate ">{{ $book->title }}
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div class="price-block">
                                                    @if ($book->discountPercent != 0)
                                                        <!-- After Discount Price in USD -->
                                                        <span class="price">
                                                            ${{ number_format($book->priceInUSD * (1 - $book->discountPercent / 100), 2) }}</span>
                                                        <!-- Before Discount Price in USD -->
                                                        <del class="price-old">${{ $book->priceInUSD }}</del>
                                                        <!-- Discount Percentage -->
                                                        <span class="price-discount">{{ $book->discountPercent }}%</span>
                                                    @else
                                                        <!-- Regular Price if no Discount -->
                                                        <span class="price">${{ $book->priceInUSD }}</span>
                                                    @endif
                                                </div>
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
    @endif
    <!--================================= FEATURED  CATEGORIES  BOOKS ===================================== -->
    @if ($Data['FeaturedCatsWithBooks'])
        @foreach ($Data['FeaturedCatsWithBooks'] as $item)
            <!--================================= {{ $item['ParentCatName'] }}’S BOOKS ===================================== -->
            @if ($loop->index % 2 == 0)
                {{-- 2 row slick slide --}}
                <section class="section-margin">
                    <div class="container">
                        <div class="section-title section-title--bordered">
                            <h2>{{ $item['ParentCatName'] }} BOOKS</h2>
                        </div>
                        <div class="product-list-slider slider-two-column product-slider multiple-row sb-slick-slider slider-border-multiple-row"
                            data-slick-setting='{
                                                            "autoplay": true,
                                                            "autoplaySpeed": 8000,
                                                            "slidesToShow":3,
                                                            "rows":2,
                                                            "dots":true
                                                        }'
                            data-slick-responsive='[
                                                            {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                                            {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                                        ]'>

                            @foreach ($item['Books'] as $book)
                                <div class="single-slide">
                                    <div class="product-card card-style-list">
                                        <div class="card-image">
                                            <img src="{{ URL($book->image) }}" style="min-width: 155px;" alt="">
                                        </div>
                                        <div
                                            class="product-card--body  d-flex align-items-center flex-column justify-content-center">
                                            <div class="product-header">
                                                <a href="index#" class="author">
                                                    {{ $book->author->displayName }}
                                                </a>
                                                <h3><a
                                                        href="{{ URL('product-details', Crypt::encrypt($book->id)) }}">{{ $book->title }}</a>
                                                </h3>
                                            </div>
                                            <div class="price-block">
                                                @if ($book->discountPercent != 0)
                                                    <!-- After Discount Price in USD -->
                                                    <span class="price">
                                                        ${{ number_format($book->priceInUSD * (1 - $book->discountPercent / 100), 2) }}</span>
                                                    <!-- Before Discount Price in USD -->
                                                    <del class="price-old">${{ $book->priceInUSD }}</del>
                                                    <!-- Discount Percentage -->
                                                    <span class="price-discount">{{ $book->discountPercent }}%</span>
                                                @else
                                                    <!-- Regular Price if no Discount -->
                                                    <span class="price">${{ $book->priceInUSD }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                {{-- 1 row slick slide --}}
                <section class="section-margin">
                    <div class="container">
                        <div class="section-title section-title--bordered">
                            <h2>{{ $item['ParentCatName'] }} BOOKS</h2>
                        </div>
                        <div class="product-slider sb-slick-slider slider-border-single-row"
                            data-slick-setting='{
                                "autoplay": true,
                                "autoplaySpeed": 8000,
                                "slidesToShow": 5,
                                "dots":true
                            }'
                            data-slick-responsive='[
                                {"breakpoint":1500, "settings": {"slidesToShow": 4} },
                                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                {"breakpoint":320, "settings": {"slidesToShow": 1} }
                            ]'>
                            @foreach ($item['Books'] as $book)
                                <div class="single-slide">
                                    <div class="product-card">
                                        <div class="product-header">
                                            <a href="index#" class="author">
                                                {{ $book->author->name }}
                                            </a>
                                            <h3><a style="height: 40px;"
                                                    href="{{ URL('product-details', Crypt::encrypt($book->id)) }}">{{ $book->title }}</a>
                                            </h3>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="card-image">
                                                <img src="{{ URL($book->image) }}" alt="">
                                                <div class="hover-contents">
                                                    <a href="{{ URL('product-details', Crypt::encrypt($book->id)) }}" class="hover-image">
                                                        <img src="{{ URL($book->image) }}" alt="">
                                                    </a>
                                                    <div class="hover-btns">
                                                        <a class="AddToCartBtn single-btn" data-id="{{ $book->id }}">
                                                            <i class="fas fa-shopping-basket"></i>
                                                        </a>
                                                        <a class="single-btn ManageWishlistBtn {{ Auth::check() &&$book->wishlists->where('user_id', Auth::user()->id)->where('book_id', $book->id)->isNotEmpty()? 'bg-success': '' }}"
                                                            data-id="{{ $book->id }}">
                                                            <i class="fas fa-heart"></i>
                                                        </a>
                                                        <a href="compare" class="single-btn">
                                                            <i class="fas fa-random"></i>
                                                        </a>

                                                        <a data-bs-toggle="modal" data-bs-target="#quickModal"
                                                            class="single-btn quickViewBtn"
                                                            data-id="{{ $book->id }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-block">
                                                @if ($book->discountPercent != 0)
                                                    <!-- After Discount Price in USD -->
                                                    <span class="price">
                                                        ${{ number_format($book->priceInUSD * (1 - $book->discountPercent / 100), 2) }}</span>
                                                    <!-- Before Discount Price in USD -->
                                                    <del class="price-old">${{ $book->priceInUSD }}</del>
                                                    <!-- Discount Percentage -->
                                                    <span class="price-discount">{{ $book->discountPercent }}%</span>
                                                @else
                                                    <!-- Regular Price if no Discount -->
                                                    <span class="price">${{ $book->priceInUSD }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    @endif

    <!--================================= Home Blog Slider ===================================== -->

    <!--================================= Home Blog ===================================== -->
    <section class="section-margin">
        <div class="container">
            <div class="section-title">
                <h2>LATEST BLOGS</h2>
            </div>
            <div class="blog-slider sb-slick-slider"
                data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 2,
                "dots": true
            }'
                data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 1} }
            ]'>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="{{ URL('image/others/blog-grid-1.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                    <span class="date">
                                        13
                                    </span>
                                    <span class="month">
                                        Aug
                                    </span>
                                </div>
                                <h3 class="title"><a href="/blogs/blog-details">How to Water and Care for Mounted</a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="index#">Hastech</a>
                            </p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="/blogs/blog-details" class="card-link">Read More <i
                                    class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="{{ URL('image/others/blog-grid-2.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                    <span class="date">
                                        19
                                    </span>
                                    <span class="month">
                                        Jan
                                    </span>
                                </div>
                                <h3 class="title"><a href="/blogs/blog-details">Why You Never See BLOG TITLE That </a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="index#">Hastech</a>
                            </p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="/blogs/blog-details" class="card-link">Read More <i
                                    class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="single-slide">
                    <div class="blog-card">
                        <div class="image">
                            <img src="{{ URL('image/others/blog-grid-3.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <div class="content-header">
                                <div class="date-badge">
                                    <span class="date">
                                        31
                                    </span>
                                    <span class="month">
                                        Aug
                                    </span>
                                </div>
                                <h3 class="title"><a href="/blogs/blog-details">What Everyone Must Know About </a>
                                </h3>
                            </div>
                            <p class="meta-para"><i class="fas fa-user-edit"></i>Post by <a href="index#">Hastech</a>
                            </p>
                            <article class="blog-paragraph">
                                <h2 class="sr-only">blog-paragraph</h2>
                                <p>Virtual reality and 3-D technology are already well-established in the
                                    entertainment...</p>
                            </article>
                            <a href="/blogs/blog-details" class="card-link">Read More <i
                                    class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================= Footer ===================================== -->
@endsection
