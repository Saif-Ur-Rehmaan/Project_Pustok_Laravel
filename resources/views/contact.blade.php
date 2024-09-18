@extends('Layout.Layout')
@section('Content')
    <x-Breadcrumb :items="['Home', 'Contact']" />
    <!-- Cart Page Start -->
    <main class="contact_area inner-page-sec-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="google-map"></div>
                </div>
            </div>
            <div class="row mt--60 ">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="contact_adress">
                        <div class="ct_address">
                            <h3 class="ct_title">Location & Details</h3>
                            <p>It is a long established fact that readewill be distracted by the readable content of
                                a page when looking
                                at ilayout.</p>
                        </div>
                        <div class="address_wrapper">
                            <div class="address">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Address:</span> 1234 - Bandit Tringi lAliquam <br> Vitae. New York</p>
                                </div>
                            </div>
                            <div class="address">
                                <div class="icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Email: </span> support@Pustok.com </p>
                                </div>
                            </div>
                            <div class="address">
                                <div class="icon">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Phone:</span> (800) 0123 456 789 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12 mt--30 mt-md--0">
                    <div class="contact_form">
                        <h3 class="ct_title">Send Us a Message</h3>
                        <form  action="{{ route('sendMessage') }}" method="post" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Name <span class="required">*</span></label>
                                        <input type="text" value="{{old('name')}}" id="con_name" name="name" class="form-control" >
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Email <span class="required">*</span></label>
                                        <input type="email" id="con_email" value="{{old('email')}}" name="email" class="form-control"  >

                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Phone*</label>
                                        <input type="text" value="{{old('phoneNumber')}}" id="con_phone" name="phoneNumber" class="form-control">

                                        @error('phoneNumber')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <textarea id="con_message" name="message" class="form-control">{{old('message')}}</textarea>

                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-btn">
                                        <button type="submit" value="submit" id="submit" class="btn btn-black"
                                            name="submit">send</button>
                                    </div>
                                    <div class="form__output"></div>
                                </div>
                            </div>

                        </form>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Cart Page End -->
@endsection
@section('Scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $APIKEY }}"></script>
@endsection
