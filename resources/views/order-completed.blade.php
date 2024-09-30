@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Order Complated']" />
    <pre>
	@php
     //  print_r($Details);
 @endphp 
</pre>
    <!-- order complete Page Start -->
    <section class="order-complete inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="order-complete-message text-center">
                        <h1>Thank you !</h1>
                        <p>Your order has been received.</p>
                    </div>
                    <ul class="order-details-list">
                        <li>Order Number: <strong>{{ $Details['orderCode'] }}</strong></li>
                        <li>Date: <strong>{{ $Details['order_date'] }}</strong></li>
                        <li>Total: <strong>${{ number_format($Details['grandTotal'], 2) }}</strong></li>
                        <li>Payment Method: <strong>{{ $Details['paymentMethod'] }}</strong></li>
                    </ul>
                    <p>Pay with cash upon delivery...</p>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <b>You can Also Download the Recipt By Clicking :</b>
                        </div>
                        <div class="col-auto"> 
                            <a href="{{ Storage::url($Details['recipt']->FilePath) }}" target="blank" class="text-primary btn "
                                >Download Receipt Now</a>

                        </div>
                    </div>
                    <br>
                    <br>
                    <h3 class="order-table-title">Order Details</h3>
                    <div class="table-responsive">
                        <table class="table order-details-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Details['orders'] as $item)
                                    <tr>
                                        <td><a>{{ $item['book']->title }}</a> <strong>× {{ $item['quantity'] }}</strong>
                                        </td>
                                        <td><span>${{ number_format($item['pricePerProduct'] * $item['quantity'], 2) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                      
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Payment Method:</th>
                                    <td><span>{{ $Details['paymentMethod'] }}</span></td>
                                </tr>
                                <tr>
                                    <th>Subtotal:</th>
                                    <td><span>${{ number_format($Details['SubTotal'], 2) }}</span></td>
                                </tr>
                                <tr>
                                    <th>Coupon discount:</th>
                                    <td><span>${{ number_format($Details['CouponDiscount'], 2) }}</span></td>
                                </tr>
                                <tr>
                                    <th>Shipping fee:</th>
                                    <td><span>${{ number_format($Details['ShippingFee'], 2) }}</span></td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td><span>${{ number_format($Details['grandTotal'], 2) }}</span></td>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order complete Page End -->
@endsection
