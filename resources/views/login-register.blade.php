@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Login']" />
    <main class="page-section inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0">
                    <!-- Register customer -->
                    <form action="{{ route('users.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">New Customer</h4>
                            <p><span class="font-weight-bold">I am a new customer</span></p>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="ProfilePic">Profile Pic</label>
                                    <input class="form-control "  value="{{old('ProfilePic')}}" name="ProfilePic" type="file" id="name"
                                        placeholder="Enter your full name">
                                    @error('ProfilePic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="name">Full Name</label>
                                    <input class="mb-0 form-control"  value="{{old('name')}}" name="name" type="text" id="name"
                                        placeholder="Enter your full name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="email">Email</label>
                                    <input class="mb-0 form-control"  value="{{old('email')}}" name="email" type="email" id="email"
                                        placeholder="Enter Your Email Address Here..">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password">Password</label>
                                    <input class="mb-0 form-control"  value="{{old('password')}}" name="password" type="password" id="password"
                                        placeholder="Enter your password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb--20">
                                    <label for="password_confirmation">Repeat Password</label>
                                    <input class="mb-0 form-control"  value="{{old('password_confirmation')}}" name="password_confirmation" type="password"
                                        id="repeat-password" placeholder="Repeat your password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($count == 0)
                                        <p>Change the role to admin to be able to manage the website from DB</p>
                                    @endif
                                </div> 
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outlined">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                    <!-- Login Customer-->
                    <form action="{{ route('users.login') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Returning Customer</h4>
                            <p><span class="font-weight-bold">I am a returning customer</span></p>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--15">
                                    <label for="LoginEmail">Enter your email address here...</label>
                                    <input class="mb-0 form-control"  value="{{old('LoginEmail')}}" name="LoginEmail" type="email" id="email1"
                                        placeholder="Enter you email address here...">
                                    @error('LoginEmail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 mb--20">
                                    <label for="LoginPassword">Password</label>
                                    <input class="mb-0 form-control"  value="{{old('LoginPassword')}}" name="LoginPassword" type="password" id="login-password"
                                        placeholder="Enter your password">

                                    @error('LoginPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outlined">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
