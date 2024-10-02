<div class="page-section inner-page-sec-padding">
    <div wire:loading>
        <x-Loader></x-Loader>
    </div>
    @if ($OpenAddressModal)
        <div class="container-fluid position-absolute w-100 h-100 bg-dark" style="z-index: 999 ;">
            <div class="row justify-content-center">
                <form wire:submit.prevent='AddNewAddress' class="col-6">
                    <h1 class="text-center text-white mt-5">Add New Address</h1>
                
                    <div class="form-group">
                        <label for="title"><p class="text-white m-0">Title</p></label>
                        <input type="text" class="form-control" id="title" name="title" wire:model.debounce.500ms='newAddress.title' placeholder="Home, Office, etc." wire:model="title">
                    </div>
                
                    <div class="form-group">
                        <label for="address"><p class="text-white m-0">Address</p></label>
                        <input type="text" class="form-control" id="address" name="address" wire:model.debounce.500ms='newAddress.address' placeholder="Enter your address" wire:model="address">
                    </div>
                
                    <div class="form-group">
                        <label for="city"><p class="text-white m-0">City</p></label>
                        <input type="text" class="form-control" id="city" name="city" wire:model.debounce.500ms='newAddress.city' placeholder="Enter your city" wire:model="city">
                    </div>
                
                    <div class="form-group">
                        <label for="contact_number"><p class="text-white m-0">Contact Number</p></label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" wire:model.debounce.500ms='newAddress.contact_number' placeholder="Enter your contact number" wire:model="contact_number">
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-3">Add Address</button>
                </form>
                
            </div>
        </div>
        
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- My Account Tab Menu Start -->
                    <div class="col-lg-3 col-12">
                        <div class="myaccount-tab-menu nav" role="tablist">
                            <a href="my-account#dashboad" class="active" data-bs-toggle="tab">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                            <a href="my-account#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                                Orders</a>
                            <a href="my-account#Recipts" data-bs-toggle="tab"><i class="fas fa-download"></i>
                                Recipts</a>
                            <a href="my-account#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i>
                                Payment Methods
                            </a>
                            <a href="my-account#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i>
                                address
                            </a>
                            <a href="my-account#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i>
                                Account
                                Details
                            </a>
                            <a href="{{ URL('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>
                    <!-- My Account Tab Menu End -->
                    <!-- My Account Tab Content Start -->
                    <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                        <div class="tab-content" id="myaccountContent">
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Dashboard</h3>
                                    <div class="welcome mb-20">
                                        <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni
                                                !</strong><a href="login-register" class="logout">
                                                Logout</a>)</p>
                                    </div>
                                    <p class="mb-0">From your account dashboard. you can easily check &amp; view
                                        your
                                        recent orders, manage your shipping and billing addresses and edit your
                                        password and account details.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($Orders as $order)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $order->book->title }}</td>
                                                        <td>{{ $order->created_at }}</td>
                                                        <td>{{ $order->orderStatus }}</td>
                                                        <td>{{ number_format($order->pricePerProduct * $order->quantity, 2) }}
                                                        </td>


                                                    </tr>

                                                @empty
                                                    <h1>No Orders Were placed By You</h1>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="Recipts" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Recipts</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>title</th>
                                                    <th>OrderCode</th>
                                                    <th>Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($Recipts as $recipt)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $recipt->title }}</td>
                                                        <td>{{ $recipt->order_Code }}</td>
                                                        <td><a href="{{ Storage::url($recipt->FilePath) }}"
                                                                target="blank" class="btn">Download Recipt</a></td>
                                                    </tr>

                                                @empty
                                                    <h1>no Recipts Available</h1>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Payment Method</h3>
                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                <div class="myaccount-content">
                                    <div class="row justify-content-between">
                                        <div class="col-auto">
                                            <h3>Billing Address</h3>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn btn-success" wire:click='OpenAddressModel()'>Add New Address
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @forelse ($Addresses as $address)
                                            <div class="col-auto">
                                                <address>
                                                    <p><strong>{{ $address->title }}</strong></p>
                                                    <p>{{ $address->address }}</p>
                                                    <p>Mobile: {{ $address->contactNumber }}</p>
                                                </address>
                                                <a wire:click='DeleteAddress({{ $address->id }})'
                                                    class="btn btn-danger"><i class="fa fa-edit"></i> Delete Adderss</a>
                                            </div>

                                        @empty
                                            <h1>No address Found</h1>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                            <!-- Single Tab Content Start -->
                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                <div class="myaccount-content">
                                    <h3>Account Details</h3>
                                    <div class="account-details-form">
                                       
                                        <div class="row">
                                            <div class="col-lg-6 col-12 mb--30">
                                                <input id="first-name" placeholder="First Name" wire:model='newUser.firstName' type="text">
                                                @error('newUser.firstName') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-12 mb--30">
                                                <input id="last-name" placeholder="Last Name" wire:model='newUser.lastName' type="text">
                                                @error('newUser.lastName') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-12 mb--30">
                                                <input id="display-name" placeholder="Display Name" wire:model='newUser.displayName' type="text">
                                                @error('newUser.displayName') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-12 mb--30">
                                                <input id="email" placeholder="Email Address" wire:model='newUser.email' type="email">
                                                @error('newUser.email') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-12 mb--30">
                                                <h4>Password change</h4>
                                            </div>
                                            <div class="col-12 mb--30">
                                                <input id="current-pwd" placeholder="Current Password" wire:model='newUser.currentPassword' type="password">
                                                @error('newUser.currentPassword') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-12 mb--30">
                                                <input id="new-pwd" placeholder="New Password" type="password" wire:model='newUser.newPassword'>
                                                @error('newUser.newPassword') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-12 mb--30">
                                                <input id="confirm-pwd" placeholder="Confirm Password" wire:model='newUser.confirmPassword' type="password">
                                                @error('newUser.confirmPassword') 
                                                    <span class="text-danger">{{ $message }}</span> 
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn--primary" wire:click='UpdateUserInfo'>Save Changes</button>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Single Tab Content End -->
                        </div>
                    </div>
                    <!-- My Account Tab Content End -->
                </div>
            </div>
        </div>
    </div>
</div>
