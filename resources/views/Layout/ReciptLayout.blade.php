<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Recipt</title>
    <style>
        h4 {
            margin: 0;
        }

        .w-full {
            width: 100%;
        }

        .w-half {
            width: 50%;
        }

        .margin-top {
            margin-top: 1.25rem;
        }

        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.products tr {
            background-color: rgb(96 165 250);
        }

        table.products th {
            color: #ffffff;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
        }

        table tr.items td {
            padding: 0.5rem;
        }

        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ URL('image/logo.png') }}" alt="Pustok" width="200" />
            </td>
            <td class="w-half">
                <h2>Order ID: {{ $data['OrderCode'] }}</h2>
            </td>
        </tr>
    </table>


    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div>
                        <h4>TO &lpar;Shipping Details&rpar;:</h4>
                    </div>
                    <div>{{ $data['shipping_address']['first_name'] }} {{ $data['shipping_address']['last_name'] }}</div> 
                    <div>{{ $data['user']['email'] }}</div>

                    <div>
                        {{ $data['shipping_address']['address'] }} <br>
                        {{ $data['shipping_address']['zip_code'] }},
                        {{ $data['shipping_address']['city'] }},
                        {{ $data['shipping_address']['state'] }},
                        {{ $data['shipping_address']['country'] }}
                    </div>

                    <div>{{ $data['shipping_address']['phone'] }}</div>

                </td>
                <td class="w-half">
                    <div>
                        <h4>From &lpar;Company Details&rpar;:</h4>
                    </div>
                    <div>{{ $data['CompanyDetails']['CompanyName'] }}</div>
                    <div>{{ $data['CompanyDetails']['CompanyAddress'] }}</div>
                    <div>{{ $data['CompanyDetails']['CompanyEmail'] }}</div>
                    <div>{{ $data['CompanyDetails']['Companyphone'] }}</div>
                </td>
            </tr>
        </table>
    </div>
    @php $TotalPrice = 0; @endphp

    <div class="margin-top">
        <table class="products">
            <tr>
                <th>S.No</th>
                <th>Item x Quantity</th>
                <th>Price Per Piece</th>
                <th>Shipping Fee</th>
                <th>Total Price</th>
            </tr>
            @foreach ($data['orders'] as $item)
                <tr class="items">
                    <td>{{ ((int) $loop->index) + 1 }}</td>
                    <td>{{ $item['book']->title }} x {{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['pricePerProduct'], 2) }}</td> <!-- Price formatted -->
                    <td>{{ number_format($item['shippingFee'], 2) }}</td> <!-- Shipping fee formatted -->
                    @php
                        $TotalPrice +=
                            ((int) $item['pricePerProduct']) * ((int) $item['quantity']) + ((int) $item['shippingFee']);
                    @endphp
                    <td>{{ number_format($TotalPrice, 2) }}</td> <!-- Total price formatted -->
                </tr>
            @endforeach
        </table>
    </div>

    <div class="total">
        Shipping Fee: ${{ number_format($data['shippingFee'], 2) }} USD <br> <!-- Shipping fee formatted -->
        Sub total: ${{ number_format($TotalPrice, 2) }} USD <br> <!-- Final total formatted --> 
        Coupon Discount: ${{ number_format($data['CouponDiscount'], 2) }} USD <br> <!-- Discount formatted -->
        Total: ${{ number_format($TotalPrice - $data['CouponDiscount'], 2) }} USD <!-- Final total formatted -->
    </div>


    <div class="footer margin-top">
        <div>Order Note</div>
        <div>{{ $data['OrderNote']->Note }}</div>
    </div>
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Pustok Book Store!</div>
    </div>
</body>

</html>
