@extends('website.layout.main')

@section('css')
    <style>
        .about-whatoffer-img {
            width: 140px;
            height: 140px;
            border: 4px solid red;
        }

        .about-card {
            border-radius: 1rem !important;
            margin: 1rem 0rem;
        }
    </style>
@endsection

@section('main')
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">about</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End-->
    <!-- About Area Start -->
    <div class="about-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-tittle mb-60 text-center pt-10">
                        <h2>Our Story</h2>
                        <p class="pera text-justify">At [Your Brand Name], our journey began with a simple love for
                            the timeless beauty of sarees. Inspired by the rich heritage and artistry woven into
                            every thread, we set out to bring these exquisite garments to women everywhere.</p>
                        <p class="pera text-justify">What started as a small collection soon blossomed into a
                            carefully curated range of sarees that celebrate tradition, craftsmanship, and elegance.
                            Each piece in our collection tells a story—of skilled hands, vibrant cultures, and the
                            special moments in life where a saree is more than just clothing; it’s an experience.
                        </p>
                        <p class="pera text-justify">Our passion is to connect you with these stories through sarees
                            that make you feel confident, graceful, and proud of your roots. We believe every woman
                            deserves to wear a saree that reflects her unique beauty and the richness of Indian
                            culture.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

    <!-- About Area Start -->
    <div class="about-area mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-tittle mb-60 text-center pt-10">
                        <h2>What We Offer</h2>
                        <p class="pera">At [Your Brand Name], we specialize in a wide range of sarees for every
                            occasion:</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3 col-6">
                        <div class="p-4 bg-light about-card">
                            <div class="d-flex justify-content-center">
                                <img src="{{asset('website')}}/img/about/whatweoffer.jpg"
                                    class="img-fluid rounded-circle about-whatoffer-img" alt="...">
                            </div>
                            <h2 class="fw-normal py-3">Bridal Sarees</h2>
                            <p>Rich, luxurious, and perfect for your big day</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="p-4 bg-light about-card">
                            <div class="d-flex justify-content-center">
                                <img src="{{asset('website')}}/img/about/whatweoffer.jpg"
                                    class="img-fluid rounded-circle about-whatoffer-img" alt="...">
                            </div>
                            <h2 class="fw-normal py-3">Party Wear Sarees</h2>
                            <p>Stylish and trendy for festive celebrations</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="p-4 bg-light about-card">
                            <div class="d-flex justify-content-center">
                                <img src="{{asset('website')}}/img/about/whatweoffer.jpg"
                                    class="img-fluid rounded-circle about-whatoffer-img" alt="...">
                            </div>
                            <h2 class="fw-normal py-3">Daily Wear Sarees</h2>
                            <p>Comfortable, elegant choices for everyday use</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="p-4 bg-light about-card">
                            <div class="d-flex justify-content-center">
                                <img src="{{asset('website')}}/img/about/whatweoffer.jpg"
                                    class="img-fluid rounded-circle about-whatoffer-img" alt="...">
                            </div>
                            <h2 class="fw-normal py-3">Traditional Handloom Sarees</h2>
                            <p>Authentic weaves from across India</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->

@endsection

@section('script') 

@endsection