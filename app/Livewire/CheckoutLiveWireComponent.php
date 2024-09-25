<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutLiveWireComponent extends Component
{

    public $coupun = '';
    public $ShippingDetails = [
        'FirstName' => '',
        'LastName' => '',

        'Country' => '',
        'EmailAddress' => '',
        'PhoneNumber' => '',
        'Address' => '',
        'CityName' => '',
        'StateName' => '',
        'ZipCode' => '',
    ];
    public $ProductList = [];
    public $SubTotal = 0;
    public $couponDiscount = 0;
    public $shippingFee = 0;
    public $grandTotal = 0;

    public function render()
    {
        // Fetch product list and calculate totals before rendering the view
        $this->fetchOrderSummary();
        return view('livewire.checkout-live-wire-component');
    }

    public function fetchOrderSummary()
    {
        // Get cart from session or default to an empty array
        $cart = session()->get('cart', []);
        $PList = [];

        // Fetching product details for the cart
        foreach ($cart as $item) {
            $book = Book::find($item['id']);
            if ($book) {
                // Calculate the total price for each book in the cart
                $price = $book->discountPercent != 0
                    ? ($book->priceInUSD * (1 - $book->discountPercent / 100)) * $item['quantity']
                    : $book->priceInUSD * $item['quantity'];

                // Add book details to the product list
                $PList[] = [
                    'title' => $book->title,
                    'quantity' => $item['quantity'],
                    'TotalPriceOfThisBook' => $price, // Use calculated price for each book
                ];
            }
        }

        // Calculate the subtotal using the fetched product list
        $this->SubTotal = array_reduce($PList, function ($carry, $item) {
            return $carry + $item['TotalPriceOfThisBook'];
        }, 0);

        // Apply coupon discount if available
        if (session()->has('coupon')) {
            $coupon = session()->get('coupon')['coupon'];

            if ($coupon->type == 'fixed') {
                $this->couponDiscount = $coupon->discount;
            } elseif ($coupon->type == 'percent') {
                $this->couponDiscount = ($coupon->discount / 100) * $this->SubTotal;
            }
        }

        // Set the grand total (subtotal minus coupon discount)
        $this->grandTotal = $this->SubTotal - $this->couponDiscount;

        // Finally, set the ProductList
        $this->ProductList = $PList;
    }

    public function ApplyCoupon()
    {
        if (Auth::guest()) {
            return redirect('/login-register')->with('fail', 'You Need To Login First Before Applying Coupon');
        }
        $coupon = $this->coupun;
        $CouponFromDB = Coupon::where('code', $coupon)->first();
        if ($CouponFromDB) {
            //check if its expired or not
            if ($CouponFromDB->expiry_date && !Carbon::parse($CouponFromDB->expiry_date)->isPast()) {
                session()->put('coupon', [
                    'applied' => true,
                    'coupon' => $CouponFromDB
                ]);
                return redirect('/checkout')->with('success', "Token Applied");
            } else {
                return redirect('/checkout')->with('fail', "Token expired");
            }
        }
        return redirect('/checkout')->with('fail', "invalid token");
    }

    public function PlaceOrder()
    {
        $this->validate([
            'ShippingDetails.FirstName' => 'required|string|max:255',
            'ShippingDetails.LastName' => 'required|string|max:255',

            'ShippingDetails.Country' => 'required|string|max:255',
            'ShippingDetails.EmailAddress' => 'required|email|max:255',
            'ShippingDetails.PhoneNumber' => 'required|string|max:20',
            'ShippingDetails.Address' => 'required|string|max:255',
            'ShippingDetails.CityName' => 'required|string|max:255',
            'ShippingDetails.StateName' => 'required|string|max:255',
            'ShippingDetails.ZipCode' => 'required|string|max:10',
        ], $this->messages());
    }

    public function messages()
    {
        return [
            'ShippingDetails.FirstName.required' => 'The first name field is required.',

            'ShippingDetails.StateName.required' => 'The first name field is required.',
            'ShippingDetails.LastName.required' => 'The last name field is required.',
            'ShippingDetails.Country.required' => 'The country field is required.',
            'ShippingDetails.EmailAddress.required' => 'The email address field is required.',
            'ShippingDetails.EmailAddress.email' => 'The email address must be a valid email.',
            'ShippingDetails.PhoneNumber.required' => 'The phone number field is required.',
            'ShippingDetails.Address.required' => 'The address field is required.',
            'ShippingDetails.CityName.required' => 'The city name field is required.',
            'ShippingDetails.ZipCode.required' => 'The zip code field is required.',
        ];
    }
}
