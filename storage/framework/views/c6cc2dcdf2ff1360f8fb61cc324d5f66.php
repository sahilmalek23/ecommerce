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
                     <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('website')); ?>/img/logo/logo.png" alt=""></a>
                  </div>
                  <!-- Main-menu -->
                  <div class="main-menu  d-none d-lg-block">
                     <nav>
                        <ul id="navigation">
                           <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                           <li><a href="<?php echo e(route('shop')); ?>">shop</a></li>
                           <li><a href="<?php echo e(route('about')); ?>">About</a></li>                           
                           <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                           <?php if(auth()->guard()->guest()): ?>
                              <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                           <?php endif; ?>
                           <?php if(auth()->guard()->check()): ?>
                              <li><a href="<?php echo e(route('orders')); ?>">Orders</a></li>
                              <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
                           <?php endif; ?>
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
                        <li><a href="<?php echo e(route('cart')); ?>">
                              <div class="card-stor">
                                 <img src="<?php echo e(asset('website')); ?>/img/gallery/card.svg" alt="">
                                 <?php 
                                   $cartHeaderCount = App\Helper\CommanHelper::getCartCount()
                                 ?>
                                 <span><?php echo e($cartHeaderCount); ?></span>
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
<!-- header end --><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/website/layout/navbar.blade.php ENDPATH**/ ?>