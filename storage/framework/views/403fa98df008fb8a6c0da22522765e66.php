<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Fashion | Teamplate</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('website')); ?>/img/favicon.ico">

  <!-- CSS here -->
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/slicknav.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/flaticon.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/progressbar_barfiller.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/gijgo.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/animated-headline.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/slick.css">  
  
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/style.css">
  
  <link href="<?php echo e(asset('assets/js/toastr/build/toastr.css')); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo e(asset('website')); ?>/css/custome.css">
  <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="full-wrapper">
  <!-- ? Preloader Start -->
  
  <?php echo $__env->make('website.layout.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <main>
    <?php echo $__env->yieldContent('main'); ?>
  </main>
  <?php echo $__env->make('website.layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
  <script src="<?php echo e(asset('website')); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/vendor/jquery-1.12.4.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/popper.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/bootstrap.min.js"></script>

  <!-- Slick-slider , Owl-Carousel ,slick-nav -->
  <script src="<?php echo e(asset('website')); ?>/js/owl.carousel.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/slick.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.slicknav.min.js"></script>

  <!-- One Page, Animated-HeadLin, Date Picker -->
  <script src="<?php echo e(asset('website')); ?>/js/wow.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/animated.headline.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.magnific-popup.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/gijgo.min.js"></script>

  <!-- Nice-select, sticky,Progress -->
  
  <script src="<?php echo e(asset('website')); ?>/js/jquery.sticky.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.barfiller.js"></script>

  <!-- counter , waypoint,Hover Direction -->
  <script src="<?php echo e(asset('website')); ?>/js/jquery.counterup.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/waypoints.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.countdown.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/hover-direction-snake.min.js"></script>

  <!-- contact js -->
  <script src="<?php echo e(asset('website')); ?>/js/contact.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.form.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.validate.min.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/mail-script.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/jquery.ajaxchimp.min.js"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="<?php echo e(asset('website')); ?>/js/plugins.js"></script>
  <script src="<?php echo e(asset('website')); ?>/js/main.js"></script>


  
  <script src="<?php echo e(asset('website/library/js.cookie.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/toastr/build/toastr.min.js')); ?>"></script>
  <script> 
    <?php if(session()->get('status') == 'Success'): ?> 
        toastr.success("<?php echo e(session()->get('msg')); ?>", "Success");
    <?php elseif(session()->get('status') == 'Error'): ?> 
        toastr.error("<?php echo e(session()->get('msg')); ?>", "Error");
    <?php endif; ?>   
  </script>
  <?php echo $__env->yieldContent('script'); ?>

</body>

</html><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\laravelpro\resources\views/website/layout/main.blade.php ENDPATH**/ ?>