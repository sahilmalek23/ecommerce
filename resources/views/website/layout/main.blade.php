<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Fashion | Teamplate</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website') }}/img/favicon.ico">

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/slicknav.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/flaticon.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/progressbar_barfiller.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/gijgo.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/animate.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/animated-headline.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/magnific-popup.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('website') }}/css/slick.css">  
  {{-- <link rel="stylesheet" href="{{ asset('website') }}/css/nice-select.css"> --}}
  <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
  {{-- added me --}}
  <link href="{{ asset('assets/js/toastr/build/toastr.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('website') }}/css/custome.css">
  @yield('css')
</head>

<body class="full-wrapper">
  <!-- ? Preloader Start -->
  {{-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{ asset('website') }}/img/logo/loder.png" alt="">
        </div>
      </div>
    </div>
  </div> --}}
  @include('website.layout.navbar')
  <main>
    @yield('main')
  </main>
  @include('website.layout.footer')
  <!--? Search model Begin -->
  <div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-btn">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Searching key.....">
      </form>
    </div>
  </div>
  <!-- Search model end -->
  <!-- Scroll Up -->
  <div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
  </div>

  <!-- JS here -->
  <!-- Jquery, Popper, Bootstrap -->
  <script src="{{ asset('website') }}/js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="{{ asset('website') }}/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="{{ asset('website') }}/js/popper.min.js"></script>
  <script src="{{ asset('website') }}/js/bootstrap.min.js"></script>

  <!-- Slick-slider , Owl-Carousel ,slick-nav -->
  <script src="{{ asset('website') }}/js/owl.carousel.min.js"></script>
  <script src="{{ asset('website') }}/js/slick.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery.slicknav.min.js"></script>

  <!-- One Page, Animated-HeadLin, Date Picker -->
  <script src="{{ asset('website') }}/js/wow.min.js"></script>
  <script src="{{ asset('website') }}/js/animated.headline.js"></script>
  <script src="{{ asset('website') }}/js/jquery.magnific-popup.js"></script>
  <script src="{{ asset('website') }}/js/gijgo.min.js"></script>

  <!-- Nice-select, sticky,Progress -->
  {{-- <script src="{{ asset('website') }}/js/jquery.nice-select.min.js"></script> --}}
  <script src="{{ asset('website') }}/js/jquery.sticky.js"></script>
  <script src="{{ asset('website') }}/js/jquery.barfiller.js"></script>

  <!-- counter , waypoint,Hover Direction -->
  <script src="{{ asset('website') }}/js/jquery.counterup.min.js"></script>
  <script src="{{ asset('website') }}/js/waypoints.min.js"></script>
  <script src="{{ asset('website') }}/js/jquery.countdown.min.js"></script>
  <script src="{{ asset('website') }}/js/hover-direction-snake.min.js"></script>

  <!-- contact js -->
  <script src="{{ asset('website') }}/js/contact.js"></script>
  <script src="{{ asset('website') }}/js/jquery.form.js"></script>
  <script src="{{ asset('website') }}/js/jquery.validate.min.js"></script>
  <script src="{{ asset('website') }}/js/mail-script.js"></script>
  <script src="{{ asset('website') }}/js/jquery.ajaxchimp.min.js"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="{{ asset('website') }}/js/plugins.js"></script>
  <script src="{{ asset('website') }}/js/main.js"></script>


  {{-- me added --}}
  <script src="{{ asset('website/library/js.cookie.min.js') }}"></script>
  <script src="{{ asset('assets/js/toastr/build/toastr.min.js') }}"></script>
  <script> 
    @if(session()->get('status') == 'Success') 
        toastr.success("{{ session()->get('msg') }}", "Success");
    @elseif (session()->get('status') == 'Error') 
        toastr.error("{{ session()->get('msg') }}", "Error");
    @endif   
  </script>
  @yield('script')

</body>

</html>