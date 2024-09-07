@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Wishlist']" />
    <!-- Wishlist Page Start -->
    <div class="cart_area inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="https://htmldemo.net/pustok/pustok/">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="wishlist#"><img
                                                    src="{{ URL('image/products/product-1.jpg') }}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="wishlist#">Rinosin Glasses</a></td>
                                        <td class="pro-price"><span>$395.00</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" class="form-control text-center" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>$395.00</span></td>
                                        <td class="pro-remove"><a href="wishlist#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="wishlist#"><img
                                                    src="{{ URL('image/products/product-2.jpg') }}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="wishlist#">Silacon Glasses</a></td>
                                        <td class="pro-price"><span>$275.00</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" class="form-control text-center" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>$550.00</span></td>
                                        <td class="pro-remove"><a href="wishlist#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="wishlist#"><img
                                                    src="{{ URL('image/products/product-3.jpg') }}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="wishlist#">Easin Glasses</a></td>
                                        <td class="pro-price"><span>$295.00</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" class="form-control text-center" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>$295.00</span></td>
                                        <td class="pro-remove"><a href="wishlist#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="wishlist#"><img
                                                    src="{{ URL('image/products/product-4.jpg') }}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="wishlist#">Macrox Glasses</a></td>
                                        <td class="pro-price"><span>$220.00</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" class="form-control text-center" value="1">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>$220.00</span></td>
                                        <td class="pro-remove"><a href="wishlist#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->
@endsection
