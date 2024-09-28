<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Coupon;
use App\Models\OrderPayment;
use App\Models\OrderRecipt;
use App\Models\PaymentMethod;
use App\Models\UserOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutLiveWireComponent extends Component
{

    public $coupun = '';
    public $PaymentMethods = [];
    public $ShippingDetails = [
        'FirstName' => '',
        'LastName' => '',

        'Country' => '',
        'PhoneNumber' => '',
        'Address' => '',
        'CityName' => '',
        'StateName' => '',
        'ZipCode' => '',
        'OrderNote' => '',
    ];
    public $ProductList = [];
    public $SubTotal = 0;
    public $couponDiscount = 0;
    public $shippingFee = 0;
    public $grandTotal = 0;
    public $SelectedPaymenyMethod = '';

    public function render()
    {
        // Fetch product list and calculate totals before rendering the view
        $this->fetchOrderSummary();
        $this->fetchPaymentMethods();
        return view('livewire.checkout-live-wire-component');
    }
    function fetchPaymentMethods()
    {
        $PaymentMethods = PaymentMethod::all()->where('status', 'Allowed');
        $this->PaymentMethods = $PaymentMethods;
        if ($PaymentMethods) {
            $this->SelectedPaymenyMethod = $PaymentMethods[0]->name;
        }
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

        // Set the Shipping fee : find by using some api
        $this->shippingFee = 0;
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
            if (!$CouponFromDB->expiry_date || !Carbon::parse($CouponFromDB->expiry_date)->isPast()) {
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
            'ShippingDetails.PhoneNumber' => 'required|string|max:20',
            'ShippingDetails.Address' => 'required|string|max:255',
            'ShippingDetails.CityName' => 'required|string|max:255',
            'ShippingDetails.StateName' => 'required|string|max:255',
            'ShippingDetails.ZipCode' => 'required|string|max:10',
        ], $this->messages());

        //set Those Details in db And redirect to /order-completed
        $PaymentMethod = PaymentMethod::all()->where('name', $this->SelectedPaymenyMethod)->where('status', 'Allowed')->first();
        if (!$PaymentMethod) {
            return redirect("/checkout")->with('fail', 'Selected Payment Method Not Available');
        }
        //check Payment method is COD Or online 
        if ($this->SelectedPaymenyMethod == "Cash On Delivery") {
            $cart = session()->get('cart', []);
            // transition for secure payment
            DB::beginTransaction();
            try {
                $orders = [];
                $OrderCode = Str::upper(Str::random(5)) . Carbon::now()->format('YmdHis');
                $shippingFeePerProduct = ((int)$this->shippingFee) / count($cart);
                foreach ($cart as  $item) {
                    $Bookid = $item['id'];
                    $quantity = $item['quantity'];
                    $book = Book::find($Bookid);
                    // validating book
                    if (!$book) {
                        return redirect("/checkout")->with('fail', 'Selected Payment Method Not Available');
                    }
                    //calculating price
                    $price = $book->discountPercent != 0
                        ? ($book->priceInUSD * (1 - $book->discountPercent / 100))
                        : $book->priceInUSD;

                    //creating order
                    $NewOrder = UserOrder::create([
                        'user_id' => Auth::user()->id,
                        'book_id' => $Bookid,
                        'Code' => $OrderCode,
                        "orderStatus" => 'Pending',
                        "quantity" => $quantity,
                        "pricePerProduct" => $price,
                        "shippingFee" => $shippingFeePerProduct,
                        "firstName" => $this->ShippingDetails['FirstName'],
                        "lastName" => $this->ShippingDetails['LastName'],
                        "address" => $this->ShippingDetails['Address'],
                        "countryName" => $this->ShippingDetails['Country'],
                        "cityName" => $this->ShippingDetails['CityName'],
                        "stateName" => $this->ShippingDetails['StateName'],
                        "zipCode" => $this->ShippingDetails['ZipCode'],
                        "contactNumber" => $this->ShippingDetails['PhoneNumber'],
                        "orderNote" => $this->ShippingDetails['OrderNote'],
                    ]);
                    $orders[] = [
                        'user_id' => Auth::user()->id,
                        'book' => $book,
                        "quantity" => $quantity,
                        "pricePerProduct" => $price,
                        "shippingFee" => $shippingFeePerProduct,
                        "orderNote" => $this->ShippingDetails['OrderNote'],
                    ];
                }
                //creating order payment
                $NewPayment = OrderPayment::create([
                    'order_Code' => $NewOrder->Code,
                    'payment_method_id' => $PaymentMethod->id,
                    'amount' => $this->grandTotal,
                    'currency' => 'USD',
                    'payment_status' => 'pending',
                    'transaction_id' => null,
                    'payment_details' => null,
                    'paid_at' => null,
                ]);
                //creating Recipt
                $Recipt = $this->CreateRecipt($orders, $NewPayment, $PaymentMethod, $OrderCode, $this->shippingFee);
                $NewRecipt = OrderRecipt::create([
                    'title' => 'COD Books Order',
                    'order_id' => $NewOrder->id,
                    'File' => $Recipt
                ]);

                session()->has('cart') ? session()->forget('cart') : '';
                session()->has('coupon') ? session()->forget('coupon') : '';
                dump('added');
                DB::commit();

                return redirect('/order-completed')
                    ->with("success", 'Order Placed Completed')
                    ->with(
                        'Details',
                        [
                            'orderCode' => $OrderCode,
                            'order' => $orders,
                            'payment' => $NewPayment,
                            'recipt' => $NewRecipt,
                        ]
                    );
            } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
                // return redirect("/checkout")->with('fail', 'Failed to place order. Please try again.');
            }
        } else {
            //handle other online payment methods
        }
    }

    public function messages()
    {
        return [
            'ShippingDetails.FirstName.required' => 'The first name field is required.',

            'ShippingDetails.StateName.required' => 'The first name field is required.',
            'ShippingDetails.LastName.required' => 'The last name field is required.',
            'ShippingDetails.Country.required' => 'The country field is required.',
            'ShippingDetails.PhoneNumber.required' => 'The phone number field is required.',
            'ShippingDetails.Address.required' => 'The address field is required.',
            'ShippingDetails.CityName.required' => 'The city name field is required.',
            'ShippingDetails.ZipCode.required' => 'The zip code field is required.',
        ];
    }

    function CreateRecipt($orders, $NewPayment, $PaymentMethod, $OrderCode, $shippingFee)
    {
        $user = Auth::user();

        // Define the receipt data
        $data = [
            'OrderCode' => $OrderCode,
            'user' => [
                'name' => $user->displayName,
                'email' => $user->email,
            ],
            'shipping_address' => [
                'first_name' => $this->ShippingDetails['FirstName'],
                'last_name' => $this->ShippingDetails['LastName'],
                'address' => $this->ShippingDetails['Address'],
                'city' => $this->ShippingDetails['CityName'],
                'state' => $this->ShippingDetails['StateName'],
                'zip_code' => $this->ShippingDetails['ZipCode'],
                'country' => $this->ShippingDetails['Country'],
                'phone' => $this->ShippingDetails['PhoneNumber']
            ],
            'orders' => $orders,
            'payments' => $NewPayment,
            'shippingFee' => $shippingFee,
            'CouponDiscount' => $this->couponDiscount,
            'order_date' => Carbon::now(),
            'CompanyDetails' => [
                'CompanyName' => 'Pustok Books Store ',
                'CompanyEmail' => 'Pustok@gmail.com ',
                'CompanyAddress' => '456 Elm Avenue, Suite 101 Downtown District San Francisco, CA 94107 USA',
                'Companyphone' => '+92 1234567890'
            ]

        ];

        // Load the view with data and generate PDF
        $pdf = PDF::loadView('Layout.ReciptLayout', compact('data'));

        // Specify a file path for storing the generated PDF (public folder in this example)
        $filePath = 'receipts/order_receipt_' . $OrderCode . '.pdf';

        // Save the PDF to the specified location
        Storage::put($filePath, $pdf->output());

        // Optionally, return the file path or any other response
        return $pdf->download('Pustok_OrderRecipt.pdf');
    }
}
