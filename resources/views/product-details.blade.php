@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Product Details']" />
    <main class="inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row  mb--60">
                <div class="col-lg-5 mb--30">
                    <!-- Product Details Slider Big Image-->
                    <div class="product-details-slider sb-slick-slider arrow-type-two">
                        <div class="single-slide">
                            <img src="{{ URL($Book->image) }}" alt="">
                        </div>

                    </div>
                    <!-- Product Details Slider Nav -->

                </div>
                <div class="col-lg-7">
                    <div class="product-details-info pl-lg--30 ">
                        <p class="tag-block">Tags:
                            @foreach (json_decode($Book->tags) as $tag)
                                <a href="{{ URL('search') }}" class="ClickAble">{{ $tag }}</a>,
                            @endforeach
                        </p>
                        <h3 class="product-title">{{ $Book->title }}</h3>
                        <ul class="list-unstyled">
                            <li>Ex Tax: <span class="list-value"> ${{ $Book->extax }}</span></li>
                            <li>Brands: <a href="product-details#"
                                    class="list-value font-weight-bold">{{ $Book->brand }}</a></li>
                            <li>Product Code: <span class="list-value"> {{ $Book->productCode }}</span></li>
                            <li>Reward Points: <span class="list-value"> {{ $Book->RewardPoints }}</span></li>
                            <li>Availability: 
                                @switch($Book->availability)
                                    @case("Out of Stock")
                                        <span class="list-value text-danger fw-bolder"> {{ $Book->availability }}</span>
                                        @break
                                
                                    @case("In Stock")
                                        <span class="list-value text-success"> {{ $Book->availability }}</span>
                                        
                                        @break
                                    @default
                                        <span class="list-value  "> {{ $Book->availability }}</span>
                                        
                                @endswitch
                            </li>
                        </ul>
                        <div class="price-block">
                            @if ($Book->discountPercent != 0)
                                <!-- After Discount Price in USD -->
                                <span class="price">
                                    ${{ number_format($Book->priceInUSD * (1 - $Book->discountPercent / 100), 2) }}</span>
                                <!-- Before Discount Price in USD -->
                                <del class="price-old">${{ $Book->priceInUSD }}</del>
                                <!-- Discount Percentage -->
                                <span class="price-discount">{{ $Book->discountPercent }}%</span>
                            @else
                                <!-- Regular Price if no Discount -->
                                <span class="price">${{ $Book->priceInUSD }}</span>
                            @endif
                        </div>
                        <div class="rating-widget">
                            <div class="rating-block">
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star star_on"></span>
                                <span class="fas fa-star "></span>
                            </div>
                            <div class="review-widget">
                                <a href="{{ URL('product-details') }}">(1 Reviews)</a> <span>|</span>
                                <a href="{{ URL('product-details') }}">Write a review</a>
                            </div>
                        </div>
                        <article class="product-details-article">
                            <h4 class="sr-only">Product Summery</h4>
                            <p>{{ $Book->productSummary }}.</p>
                        </article>
                        <div class="add-to-cart-row">
                            <div class="count-input-block">
                                <span class="widget-label">Qty</span>
                                <input type="number" class="form-control text-center" value="1">
                            </div>
                            <div class="add-cart-btn">
                                <a href="{{ URL('product-details') }}" class="btn btn-outlined--primary"><span
                                        class="plus-icon">+</span>Add to
                                    Cart</a>
                            </div>
                        </div>
                        <div class="compare-wishlist-row">
                            <a href="{{ URL('product-details') }}" class="add-link"><i class="fas fa-heart"></i>Add to Wish
                                List</a>
                            <a href="{{ URL('product-details') }}" class="add-link"><i class="fas fa-random"></i>Add to
                                Compare</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sb-custom-tab review-tab section-padding">
                <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="product-details#tab-1"
                            role="tab" aria-controls="tab-1" aria-selected="true">
                            DESCRIPTION
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="product-details#tab-2" role="tab"
                            aria-controls="tab-2" aria-selected="true">
                            REVIEWS &lpar;{{$Reviews->count()}}&rpar;
                        </a>
                    </li>
                </ul>
                <div class="tab-content space-db--20" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                        <article class="review-article">
                            <h1 class="sr-only">Tab Article</h1>
                            <p>{{ $Book->productDescription }}</p>
                        </article>
                    </div>
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                        <div class="review-wrapper">
                            <h2 class="title-lg mb--20">{{$Reviews->count()}} REVIEW FOR AUCTOR GRAVIDA ENIM</h2>
                            @forelse ($Reviews as $review)
                                <div class="review-comment mb--20">
                                    <div class="avatar">
                                        <img src="{{ URL($review->user->image) }}" width="60" height="60" class="rounded-circle" alt="">
                                    </div>
                                    <div class="text">
                                        <div class="row justify-content-between">
                                            <div class="col-auto">
                                                <div class="rating-block mb--15"> 
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($review->reviewStars>$i)
                                                            <span class="ion-android-star-outline star_on"></span>
                                                            @else
                                                            <span class="ion-android-star-outline"></span>  
                                                        @endif
                                                        
                                                    @endfor
        
                                                </div>
                                            </div>
                                            @if (Auth::check() && Auth::user()->id==$review->user->id)
                                                <a href="{{URL('/DeleteReview',Crypt::encrypt($review->id))}}" class="col-auto">
                                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0,0,300,150">
                                                            <g fill="#c61919" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M10,2l-1,1h-4c-0.6,0 -1,0.4 -1,1c0,0.6 0.4,1 1,1h2h10h2c0.6,0 1,-0.4 1,-1c0,-0.6 -0.4,-1 -1,-1h-4l-1,-1zM5,7v13c0,1.1 0.9,2 2,2h10c1.1,0 2,-0.9 2,-2v-13zM9,9c0.6,0 1,0.4 1,1v9c0,0.6 -0.4,1 -1,1c-0.6,0 -1,-0.4 -1,-1v-9c0,-0.6 0.4,-1 1,-1zM15,9c0.6,0 1,0.4 1,1v9c0,0.6 -0.4,1 -1,1c-0.6,0 -1,-0.4 -1,-1v-9c0,-0.6 0.4,-1 1,-1z"></path></g></g>
                                                            </svg>
                                                </a>
                                            @endif
                                        </div>
                                        <h6 class="author ">{{$review->user->displayName}} &nbsp;<span class="font-weight-400">{{($review->created_at)}}</span>
                                        </h6>
                                        <p>{{$review->comment}}</p>
                                    </div>
                                </div>
                                
                            @empty
                                <h1>No Reviews Available</h1>
                            @endforelse
                            <h2 class="title-lg mb--20 pt--15">ADD A REVIEW</h2>
                               <div class="rating-row pt-2">
                                    <p class="d-block">Your Rating</p>
                                    <span class="rating-widget-block">
                                        <input type="radio" class="StarIcon" value="5" name="star" id="star5">
                                        <label for="star5"></label>
                                        <input type="radio" class="StarIcon" value="4" name="star" id="star4">
                                        <label for="star4"></label>
                                        <input type="radio" class="StarIcon" value="3" name="star" id="star3">
                                        <label for="star3"></label>
                                        <input type="radio" class="StarIcon" value="2" name="star" id="star2">
                                        <label for="star2"></label>
                                        <input type="radio" class="StarIcon" value="1" name="star" id="star1">
                                        <label for="star1"></label>
                                    </span>
                                    <form action="{{URL('SendReview')}}" method="POST" class="mt--15 site-form ">
                                        @error('reviewStar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="message">Comment</label>
                                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                                    @error('message')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <input type="hidden" name="bookId" value="{{$Book->id}}">
                                             <input type="hidden" id="ReviewStar" name="reviewStar" value="0">
                                             @section('Scripts')
                                                <script>
                                                    const stars = document.getElementsByClassName("StarIcon");
                                                        for (let i = 0; i < stars.length; i++) {
                                                            const star = stars[i];
                                                            star.addEventListener("click", () => { 
                                                                document.getElementById("ReviewStar").value=star.value;
                                                            });
                                                        }
                                                </script>
                                                 
                                             @endsection
                                          
                                    
                                            <div class="col-lg-4">
                                                <div class="submit-btn">
                                                    <button type="submit"  class="btn btn-black">Post Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--=================================
            RELATED PRODUCTS BOOKS
            ===================================== -->
        <section class="">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2>RELATED PRODUCTS</h2>
                </div>
                <div class="product-slider sb-slick-slider slider-border-single-row"
                    data-slick-setting='{
                                "autoplay": true,
                                "autoplaySpeed": 8000,
                                "slidesToShow": 4,
                                "dots":true
                            }'
                    data-slick-responsive='[
                                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                {"breakpoint":480, "settings": {"slidesToShow": 1} }
                    ]'>
                @forelse ($RelatedBooks as $book)
                    <div class="single-slide">
                        <div class="product-card">
                            <div class="product-header">
                                <a class="author">
                                    {{$book->author->displayName}}
                                </a>
                                <h3><a href="{{ URL('product-details',Crypt::encrypt($book->id)) }}">{{$book->title}}</a></h3>
                            </div>
                            <div class="product-card--body">
                                <div class="card-image">
                                    <img src="{{ URL($book->image) }}" alt="">
                                    <div class="hover-contents">
                                        <a href="{{ URL('product-details',Crypt::encrypt($book->id)) }}" class="hover-image">
                                            <img src="{{ URL($book->image) }}" alt="">
                                        </a>
                                        <div class="hover-btns">
                                            <a href="cart" class="single-btn">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>
                                            <a href="wishlist" class="single-btn">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                            <a href="compare" class="single-btn">
                                                <i class="fas fa-random"></i>
                                            </a>
                                      
                                            <a    data-bs-toggle="modal"
                                                data-bs-target="#quickModal"  class="single-btn quickViewBtn" data-id="{{$book->id}}">
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
                    
                @empty
                    <h1>No Books Available of Same Category</h1>
                @endforelse


                </div>
            </div>
        </section>

    </main>
@endsection
