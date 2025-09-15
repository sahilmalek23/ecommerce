<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Glow Link</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
     
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/feather.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/select2.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/dropzone.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/uppy.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/jquery.steps.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/dataTables.bootstrap4.css">

    
    <link href="<?php echo e(asset('assets/js/lightbox2-2.11.5/dist/css/lightbox.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/js/toastr/build/toastr.css')); ?>" rel="stylesheet" />
    <?php echo $__env->yieldContent('css'); ?>
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="<?php echo e(asset('assets')); ?>/css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
      <?php echo $__env->make('admin.layout.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <?php echo $__env->make('admin.layout.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <?php echo $__env->yieldContent('main'); ?>
            </div>
          </div>
        </div>
      </main>
          
    </div> <!-- .wrapper -->
    <script src="<?php echo e(asset('assets')); ?>/js/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/popper.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/moment.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/simplebar.min.js"></script>
    <script src='<?php echo e(asset('assets')); ?>/js/daterangepicker.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/jquery.stickOnScroll.js'></script>
    <script src="<?php echo e(asset('assets')); ?>/js/tinycolor-min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/config.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/d3.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/topojson.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/datamaps.all.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/datamaps-zoomto.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/datamaps.custom.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/Chart.min.js"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="<?php echo e(asset('assets')); ?>/js/gauge.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/jquery.sparkline.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/apexcharts.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/apexcharts.custom.js"></script>
    <script src='<?php echo e(asset('assets')); ?>/js/jquery.mask.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/select2.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/jquery.steps.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/jquery.validate.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/jquery.timepicker.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/dropzone.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/uppy.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/quill.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/jquery.dataTables.min.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/dataTables.bootstrap4.min.js'></script>
    
    <script src="<?php echo e(asset('assets/js/lightbox2-2.11.5/dist/js/lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/toastr/build/toastr.min.js')); ?>"></script>
    <script src='<?php echo e(asset('assets')); ?>/js/apps.js'></script>
    <script src='<?php echo e(asset('assets')); ?>/js/comman.js'></script>
    
    <script> 
        <?php if(session()->get('status') == 'Success'): ?> 
            toastr.success("<?php echo e(session()->get('msg')); ?>", "Success");
        <?php elseif(session()->get('status') == 'Error'): ?> 
            toastr.error("<?php echo e(session()->get('msg')); ?>", "Error");
        <?php endif; ?>   
    </script>
    <?php echo $__env->yieldContent('script'); ?>    
    
  </body>
</html><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/layout/main.blade.php ENDPATH**/ ?>