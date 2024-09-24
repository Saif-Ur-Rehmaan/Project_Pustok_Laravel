<div class="row position-relative">
    <div wire:loading>
        <x-Loader></x-Loader>
    </div>
    <div class="col-12">
        @error('quantity')
            <span class="text-danger">{{ $message }}</span><br>
        @enderror
    </div>
    <div class="col-12">
        <div class="add-to-cart-row">
            @if ($isInCart)
                <div class="add-cart-btn">
                    <a wire:click='HandleCart({{ $BookId }})'
                        class="btn btn-outlined--primary text-danger">
                        <span class="plus-icon">+</span>Remove From Cart
                    </a>
                </div>
            @else
                <div class="count-input-block">

                    <span class="widget-label">Qty</span>
                    <input type="number" wire:model='quantity' class="form-control text-center" value="1">
                </div>
                <div class="add-cart-btn">
                    <a wire:click='HandleCart({{ $BookId }})'  
                        class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
                </div>
            @endif
        </div>

    </div>
</div>
