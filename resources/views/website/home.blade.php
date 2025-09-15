@extends('website.layout.main')

@section('css')    

    <style>
        .category-slider .slick-slide {
            background: #9285b3;
            margin: 5px;
        } 

        .category-slider .slick-slide img {
            width: 100% !important;
        }       

        .button-slick {            
            display: flex;
            justify-content: end;                
            gap: 10px;
        }

        .custom-prev, .custom-next {
            background: #9f78ff;
            border: none;
            padding: 9px 11px 5px;
            border-radius: 75px;
        }

        .cat-name {
            word-break: break-all;
            color: white;
            padding: 10px;
            margin: 0px;
        }
        
    </style>

@endsection

@section('main')
    <!--? Hero Area Start-->
    <div class="container-fluid">
        <div class="slider-area">
            <!-- Mobile Device Show Menu-->
            {{-- <div class="header-right2 d-flex align-items-center">
                <!-- Social -->
                <div class="header-social  d-block d-md-none">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
                <!-- Search Box -->
                <div class="search d-block d-md-none">
                    <ul class="d-flex align-items-center">
                        <li class="mr-15">
                            <div class="nav-search search-switch">
                                <i class="ti-search"></i>
                            </div>
                        </li>
                        <li>
                            <div class="card-stor">
                                <img src="{{ asset('website') }}/img/gallery/card.svg" alt="">
                                <span>0</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <!-- /End mobile  Menu-->

            <div class="slider-active dot-style">
                <!-- Single -->
                <div class="single-slider slider-bg1 hero-overly slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-9">
                                <!-- Hero Caption -->
                                <div class="hero__caption">
                                    <h1>fashion<br>changing<br>always</h1>
                                    <a href="javacript:void(0)" class="btn d-none">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="single-slider slider-bg2 hero-overly slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-9">
                                <!-- Hero Caption -->
                                <div class="hero__caption">
                                    <h1>fashion<br>changing<br>always</h1>
                                    <a href="javacript:void(0)" class="btn d-none">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <div class="single-slider slider-bg3 hero-overly slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-9">
                                <!-- Hero Caption -->
                                <div class="hero__caption">
                                    <h1>fashion<br>changing<br>always</h1>
                                    <a href="javacript:void(0)" class="btn d-none">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Hero -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-4">
                <h2 class="mb-4"><b>Shop by Category</b></h2>
            </div>
            <div class="col-8">
                <div class="button-slick">
                    <button class=" custom-prev ml-5 "><span class="ti-arrow-left"></span></button>
                    <button class=" custom-next mr-5"><span class="ti-arrow-right"></span></button>
                </div>
            </div>
        </div>
        <div class="category-slider">
            @foreach ($Category as $cat)
            <div>
                <a href="{{ route('shop') }}?catid={{$cat->id}}">
                    <img class="img-fluid" src="{{  asset('storage') ."/". $cat->image }}" alt="Women's Dress">
                    <p class="text-center mt-2 cat-name">{{ $cat->title }}</p>
                </a>
            </div>
            @endforeach              
        </div>
    </div>    
    <!--? New Arrival Start -->
    <div class="new-arrival">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-60 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2>new<br>arrival</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach ($productList as $PData)                                
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                        <a href="{{route('product.detail', $PData['psid'])}}">
                            <div class="single-new-arrival mb-50 text-center wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay=".1s">
                                <div class="popular-img">
                                    <img src="{{  asset('storage') ."/". $PData['image'] }}" alt="{{$PData['name']}}">
                                    
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="{{route('product.detail', $PData['psid'])}}">{{$PData['name']}}</a></h3>                                
                                    <span> &#8377; {{$PData['price']}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
            </div>
            <!-- Button -->
            <div class="row justify-content-center">
                <div class="room-btn">
                    <a href="{{route('shop')}}" class="border-btn">Browse More</a>
                </div>
            </div>
        </div>
    </div>
    <!--? New Arrival End -->
    <!--? collection -->
    <section class="collection section-bg2 section-padding30 section-over1 ml-15 mr-15"
        data-background="{{ asset('website') }}/img/gallery/section_bg01.png">
        <div class="container-fluid"></div>
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9">
                <div class="single-question text-center">
                    <h2 class="wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">collection houses our first-ever
                    </h2>
                    <a href="{{ route('about') }}" class="btn class=" wow fadeInUp data-wow-duration="2s" data-wow-delay=".4s">About
                        Us</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End collection -->
    <!--? Services Area Start -->
    <!--? Services Area Start -->
    <div class="categories-area section-padding40 gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="{{ asset('website') }}/img/icon/services1.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Fast & Free Delivery</h5>
                            <p>Get your order delivered quickly—no extra charges, no delays.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="cat-icon">
                            <img src="{{ asset('website') }}/img/icon/return-box.png" style="margin-bottom: 18px;"
                                width="50px" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Easy Returns</h5>
                            <p>Not happy with your purchase? Return it easily within days.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat mb-30 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="cat-icon">
                            <img src="{{ asset('website') }}/img/icon/services3.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>Secure Payments</h5>
                            <p>Your payment details are encrypted and 100% safe with us.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-cat wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="cat-icon">
                            <img src="{{ asset('website') }}/img/icon/services4.svg" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5>24/7 Customer Support</h5>
                            <p>Need help? Our support team is always here for you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? Services Area End -->

    <!--? Services Area End -->
@endsection