<div class="cart-block ">
    <div class="cart-total">
        <span class="text-number">
            {{ count($Books) }}
        </span>
        <span class="text-item">
            Shopping Cart
        </span>
        <span class="price">
            ${{ number_format($TotalPrice, 2) }}
            <i class="fas fa-chevron-down"></i>
        </span>
    </div>
    <div class="cart-dropdown-block ">
        
        <div class=" single-cart-block position-relative">
            <div wire:loading>
                <x-Loader></x-Loader>
            </div>
            @forelse ($Books as $item)
                <div class="cart-product">
                    <a href="{{ URL('product-details', Crypt::encrypt($item['book']->id)) }}" class="image">
                        <img src="{{ URL($item['book']->image) }}" alt="{{ $item['book']->title }}">
                    </a>
                    <div class="content">
                        <h3 class="title"><a
                                href="{{ URL('product-details', Crypt::encrypt($item['book']->id)) }}">{{ $item['book']->title }}</a>
                        </h3>
                        <p class="price"><span class="qty">{{ $item['quantity'] }} ×</span>
                            @php
                                if ($item['book']->discountPercent != 0) {
                                    echo '$' .
                                        number_format(
                                            $item['book']->priceInUSD * (1 - $item['book']->discountPercent / 100),
                                            2,
                                        );
                                } else {
                                    echo '$' . $item['book']->priceInUSD * $item['quantity'];
                                }

                            @endphp
                        </p>
                        <button class="cross-btn" wire:click='removeFromCart({{ $item['book']->id }})'><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>

            @empty
                <h4>No Items in Cart</h4>
            @endforelse
        </div>
        <div class=" single-cart-block ">
            <div class="btn-block">
                <a href="{{URL('cart')}}" class="btn">View Cart <i class="fas fa-chevron-right"></i></a>
                <a href="checkout" class="btn btn--primary">Check Out <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
