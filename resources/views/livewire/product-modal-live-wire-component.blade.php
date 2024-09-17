<!-- Modal -->

    <div class="modal-dialog" role="document">
        <div style='{{!$Loading?"display:none":"display:block";}}'>
            <x-Loader></x-Loader>

        </div>
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click='CloseProductModal()' aria-label="Close"></button>
            <div class="product-details-modal">
                <div class="row">
                    <div class="col-lg-5 d-flex justify-content-center align-items-center">
                        <!-- Product Details Slider Big Image-->
                        <img src="{{ URL($Book->image) }}" alt="">

                    </div>
                    <div class="col-lg-7 mt--30 mt-lg--30">
                        <div class="product-details-info pl-lg--30 ">

                            <p class="tag-block">Tags:
                                @foreach (json_decode($Book->tags) as $tag)
                                    <a href="{{ URL('search') }}" class="ClickAble">{{ $tag }}</a>,
                                @endforeach
                            </p>
                            <h3 class="product-title">{{ $Book->title }}</h3>
                            <ul class="list-unstyled">
                                <li>Ex Tax: <span class="list-value"> ${{ $Book->exTax }}</span></li>
                                <li>Brands: <a href="index#" class="list-value font-weight-bold"> {{ $Book->brand }}</a></li>
                                <li>Product Code: <span class="list-value"> {{ $Book->productCode }}</span></li>
                                <li>Reward Points: <span class="list-value"> {{ $Book->RewardPoints }}</span></li>
                                <li>Availability: <span class="list-value"> {{ $Book->availability }}</span></li>
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
                                    <a href="{{ URL('/index') }}">(1 Reviews)</a> <span>|</span>
                                    <a href="{{ URL('/index') }}">Write a review</a>
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
                                    <a href="{{ URL('/index') }}" class="btn btn-outlined--primary"><span
                                            class="plus-icon">+</span>Add to Cart</a>
                                </div>
                            </div>
                            <div class="compare-wishlist-row">
                                <a href="{{ URL('/index') }}" class="add-link"><i class="fas fa-heart"></i>Add to Wish
                                    List</a>
                                <a href="{{ URL('/index') }}" class="add-link"><i class="fas fa-random"></i>Add to
                                    Compare</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="widget-social-share">
                    <span class="widget-label">Share:</span>
                    <div class="modal-social-share">
                        <a href="index#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="index#" class="single-icon"><i class="fab fa-twitter"></i></a>
                        <a href="index#" class="single-icon"><i class="fab fa-youtube"></i></a>
                        <a href="index#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
