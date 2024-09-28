<div class="col-12 position-relative">
    <div wire:loading>
        <x-Loader></x-Loader>
    </div>
    <!-- Checkout Form s-->
    <div class="checkout-form">
        <div class="row row-40">
            <div class="col-12">
                <h1 class="quick-title">Checkout</h1>
                @if (!session()->has('coupon'))
                    <!-- Slide Down Trigger  -->
                    <div class="checkout-quick-box">
                        <p><i class="far fa-sticky-note"></i>Have a coupon? <a href="javascript:" class="slide-trigger"
                                data-target="#quick-cupon">
                                Click here to enter your code</a></p>
                    </div>
                    <!-- Slide Down Blox ==> Cupon Box -->
                    <div class="checkout-slidedown-box" id="quick-cupon">

                        <div class="checkout_coupon">
                            <input type="text" wire:model='coupun' class="mb-0" placeholder="Coupon Code">
                            <a wire:click='ApplyCoupon()' class="btn btn-outlined">Apply coupon</a>
                        </div>

                    </div>
                @endif
            </div>
            <div class="col-lg-7 mb--20">
                <!-- Billing Address -->
                <div id="billing-form" class="mb-40">
                    <h4 class="checkout-title">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 col-12 mb--20">
                            <label>First Name*</label>
                            <input type="text" wire:model='ShippingDetails.FirstName' placeholder="First Name">
                            @error('ShippingDetails.FirstName')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-6 col-12 mb--20">
                            <label>Last Name*</label>
                            <input type="text" wire:model='ShippingDetails.LastName' placeholder="Last Name">
                            @error('ShippingDetails.LastName')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-12 mb--20">
                            <label>Country*</label>
                            <input wire:model='ShippingDetails.Country' type="text" placeholder="Country">
                            @error('ShippingDetails.Country')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                            {{-- <select class="nice-select"   >
                                <option>Bangladesh</option>
                                <option>China</option>
                                <option>country</option>
                                <option>India</option>
                                <option>Japan</option>
                            </select> --}}
                        </div>
                        
                        <div class="col-md-6 col-12 mb--20">
                            <label>Phone no*</label>
                            <input type="text" wire:model='ShippingDetails.PhoneNumber' placeholder="Phone number">
                            @error('ShippingDetails.PhoneNumber')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb--20">
                            <label>Address*</label>
                            <input type="text" wire:model='ShippingDetails.Address' placeholder="Address ....">
                            @error('ShippingDetails.Address')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 mb--20">
                            <label>Town/City*</label>
                            <input type="text" wire:model='ShippingDetails.CityName' placeholder="Town/City">
                            @error('ShippingDetails.CityName')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 mb--20">
                            <label>State*</label>
                            <input type="text" wire:model='ShippingDetails.StateName' placeholder="State">
                            @error('ShippingDetails.StateName')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-12 mb--20">
                            <label>Zip Code*</label>
                            <input type="text" wire:model='ShippingDetails.ZipCode' placeholder="Zip Code">
                            @error('ShippingDetails.ZipCode')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-12 mb--20">
                            <label>Order Note* (optional)</label>
                            <input wire:model='ShippingDetails.OrderNote' type="text" placeholder="OrderNote">
                            @error('ShippingDetails.OrderNote')
                                <span class="text-danger ">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>
                <!-- Shipping Address -->

            </div>
            <div class="col-lg-5">
                <div class="row">
                    <!-- Cart Total -->
                    <div class="col-12">
                        <div class="checkout-cart-total">
                            <h2 class="checkout-title">YOUR ORDER</h2>
                            <h4>Product <span>Total</span></h4>
                            <ul>
                                @foreach ($ProductList as $item)
                                    <li>
                                        <span class="left">{{ $item['title'] }} X {{ $item['quantity'] }}</span>
                                        <span
                                            class="right">${{ number_format($item['TotalPriceOfThisBook'], 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <p>Sub Total <span>${{ number_format($SubTotal, 2) }}</span></p>
                            <p>Shipping Fee <span>${{ number_format($shippingFee, 2) }}</span></p>
                            <p>Coupon Discount <span>${{ number_format($couponDiscount, 2) }}</span></p>
                            <h4>Grand Total <span>${{ number_format($grandTotal, 2) }}</span></h4>
                            <div class="method-notice mt--25">
                                <select wire:model='SelectedPaymenyMethod' id="">
                                    @foreach ($PaymentMethods as $method)
                                        <option value="{{$method->name}}" {{  $SelectedPaymenyMethod==$method->name?'selected':''}}>{{$method->name}}</option>
                                    @endforeach 
                                </select> 
                              
                            </div>
                            <div class="term-block">
                                <input type="checkbox" id="accept_terms2">
                                <label for="accept_terms2">I’ve read and accept the terms &
                                    conditions</label>
                            </div>
                            <button class="place-order w-100" wire:click='PlaceOrder'>Place order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
