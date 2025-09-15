<!-- Preloader Start-->
<header>
   <!-- Header Start -->
   <div class="header-area ">
      <div class="main-header header-sticky">
         <div class="container-fluid">
            <div class="menu-wrapper d-flex align-items-center justify-content-between">
               <div class="header-left d-flex align-items-center">
                  <!-- Logo -->
                  <div class="logo">
                     <a href="{{route('home')}}"><img src="{{ asset('website') }}/img/logo/logo.png" alt=""></a>
                  </div>
                  <!-- Main-menu -->
                  <div class="main-menu  d-none d-lg-block">
                     <nav>
                        <ul id="navigation">
                           <li><a href="{{route('home')}}">Home</a></li>
                           <li><a href="{{route('shop')}}">shop</a></li>
                           <li><a href="{{route('about')}}">About</a></li>                           
                           <li><a href="{{route('contact')}}">Contact</a></li>
                           @guest
                              <li><a href="{{route('login')}}">Login</a></li>
                           @endguest
                           @auth
                              <li><a href="{{route('orders')}}">Orders</a></li>
                              <li><a href="{{route('logout')}}">Logout</a></li>
                           @endauth
                        </ul>
                     </nav>
                  </div>
               </div>
               <div class="header-right1 d-flex align-items-center ">
                  <!-- Social -->
                  <div class="header-social d-none ">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fab fa-pinterest-p"></i></a>
                  </div>
                  <!-- Search Box -->
                  <div class="search  d-md-block">
                     <ul class="d-flex align-items-center">
                        <li class="mr-15 d-none">
                           <div class="nav-search search-switch">
                              <i class="ti-search"></i>
                           </div>
                        </li>
                        <li><a href="{{route('cart')}}">
                              <div class="card-stor">
                                 <img src="{{ asset('website') }}/img/gallery/card.svg" alt="">
                                 @php 
                                   $cartHeaderCount = App\Helper\CommanHelper::getCartCount()
                                 @endphp
                                 <span>{{ $cartHeaderCount }}</span>
                              </div>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <!-- Mobile Menu -->
               <div class="col-12">
                  <div class="mobile_menu d-block d-lg-none"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Header End -->
</header>
<!-- header end -->