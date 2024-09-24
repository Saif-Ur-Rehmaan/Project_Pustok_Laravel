<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <div class="cart_area cart-area-padding  ">
        <div class="container">
            <div class="page-section-title">
                <h1>Shopping Cart</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Ca rt Table -->
                    <div class="cart-table table-responsive mb--40 position-relative" >
                        <table class="table" >
                            <!-- Head Row -->
                            <thead>
                                <tr>
                                    <th class="pro-remove"></th>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody >
                                <div wire:loading>
                                    <x-Loader></x-Loader>
                                </div>
                                <!-- Product Row -->
                                @forelse ($CartItems as $item)
                                    <tr>
                                        <td class="pro-remove"><a
                                                wire:click='removeFromCart({{ $item['book']->id }})'><i
                                                    class="far fa-trash-alt"></i></a>
                                        </td>
                                        <td class="pro-thumbnail"><a href="cart#"><img
                                                    src="{{ URL($item['book']->image) }}" alt="Product"></a>
                                        </td>
                                        <td class="pro-title"><a href="cart#">{{ $item['book']->title }}</a></td>
                                        <td class="pro-price">
                                            @if ($item["book"]->discountPercent != 0)
                                                <!-- After Discount Price in USD -->
                                                <span class="price">
                                                    ${{ number_format($item["book"]->priceInUSD * (1 - $item["book"]->discountPercent / 100), 2) }}</span>
                                                <!-- Before Discount Price in USD -->
                                                <del class="price-old">${{ $item["book"]->priceInUSD }}</del> 
                                            @else
                                                <!-- Regular Price if no Discount -->
                                                <span class="price">${{ $item["book"]->priceInUSD }}</span>
                                            @endif
                                        </td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number"  wire:model='CartItems.{{$loop->index}}.quantity' wire:change.debounce.500ms='updateCartQuantity({{$loop->index}})'  
                                                    name="quantity" min="1" class="form-control text-center">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal">
                                            @if ($item["book"]->discountPercent != 0)
                                                <!-- After Discount Price in USD -->
                                                <span class="price">
                                                    ${{ number_format(($item["book"]->priceInUSD * (1 - $item["book"]->discountPercent / 100))*$item["quantity"], 2) }}</span>
                                           
                                            @else
                                                <!-- Regular Price if no Discount -->
                                                <span class="price">${{ ($item["book"]->priceInUSD )*$item["quantity"]}}</span>
                                            @endif
                                        </td>
                                    </tr>

                                @empty
                                    <h1>no items in cart</h1>
                                @endforelse

                                <!-- Discount Row  -->
                                <tr>
                                    <td colspan="6" class="actions">
                                        <div class="coupon-block">
                                            <div class="coupon-text">
                                                <label for="coupon_code">Coupon:</label>
                                                <input type="text" name="coupon_code" wire:model='Coupon'
                                                    class="input-text" id="coupon_code" value=""
                                                    placeholder="Coupon code">
                                            </div>
                                            <div class="coupon-btn">
                                                <input wire:click='ApplyCoupon()' class="btn btn-outlined"
                                                    name="apply_coupon" value="Apply coupon">
                                            </div>
                                        </div>
                                        <div class="update-block text-right">
                                            <input type="submit" class="btn btn-outlined" name="update_cart"
                                                value="Update cart">
                                            <input type="hidden" id="_wpnonce" name="_wpnonce"
                                                value="05741b501f"><input type="hidden" name="_wp_http_referer"
                                                value="/petmark/cart/">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb--30 mb-lg--0">
                    <!-- slide Block 5 / Normal Slider -->
                    <div class="cart-block-title">
                        <h2>YOU MAY BE INTERESTED IN…</h2>
                    </div>
                    <div class="product-slider sb-slick-slider"
                        data-slick-setting='{
                          "autoplay": true,
                          "autoplaySpeed": 8000,
                          "slidesToShow": 2
                          }'
                        data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 2} },
                        {"breakpoint":768, "settings": {"slidesToShow": 3} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Lpple
                                    </span>
                                    <h3><a href="{{ URL('product-details') }}">Revolutionize Your BOOK With These
                                            Easy-peasy Tips</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL('image/products/product-10.jpg') }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ URL('product-details') }}" class="hover-image">
                                                <img src="{{ URL('image/products/product-1.jpg') }}" alt="">
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
                                                <a href="cart#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Jpple
                                    </span>
                                    <h3><a href="{{ URL('product-details') }}">Turn Your BOOK Into High Machine</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL('image/products/product-2.jpg') }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ URL('product-details') }}" class="hover-image">
                                                <img src="{{ URL('image/products/product-1.jpg') }}" alt="">
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
                                                <a href="cart#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Wpple
                                    </span>
                                    <h3><a href="{{ URL('product-details') }}">3 Ways Create Better BOOK With</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL('image/products/product-3.jpg') }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ URL('product-details') }}" class="hover-image">
                                                <img src="{{ URL('image/products/product-2.jpg') }}" alt="">
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
                                                <a href="cart#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Epple
                                    </span>
                                    <h3><a href="{{ URL('product-details') }}">What You Can Learn From Bill Gates</a>
                                    </h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL('image/products/product-5.jpg') }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ URL('product-details') }}" class="hover-image">
                                                <img src="{{ URL('image/products/product-4.jpg') }}" alt="">
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
                                                <a href="cart#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="product-card">
                                <div class="product-header">
                                    <span class="author">
                                        Hpple
                                    </span>
                                    <h3><a href="{{ URL('product-details') }}">Simple Things You To Save BOOK</a></h3>
                                </div>
                                <div class="product-card--body">
                                    <div class="card-image">
                                        <img src="{{ URL('image/products/product-6.jpg') }}" alt="">
                                        <div class="hover-contents">
                                            <a href="{{ URL('product-details') }}" class="hover-image">
                                                <img src="{{ URL('image/products/product-4.jpg') }}" alt="">
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
                                                <a href="cart#" data-bs-toggle="modal" data-bs-target="#quickModal"
                                                    class="single-btn">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">£51.20</span>
                                        <del class="price-old">£51.20</del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cart Summary -->
                <div class="col-lg-6 col-12 d-flex">
                    <div class="cart-summary">
                        <div class="cart-summary-wrap">
                            <h4><span>Cart Summary</span></h4>
                            <p>Sub Total <span class="text-primary">$1250.00</span></p>
                            <p>Shipping Cost <span class="text-primary">$00.00</span></p>
                            <h2>Grand Total <span class="text-primary">$1250.00</span></h2>
                        </div>
                        <div class="cart-summary-button">
                            <a href="checkout" class="checkout-btn c-btn btn--primary">Checkout</a>
                            <button class="update-btn c-btn btn-outlined">Update Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
