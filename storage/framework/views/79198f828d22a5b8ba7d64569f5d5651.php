

<?php $__env->startSection('css'); ?>    
    <style>
        .dropdown-item {
            font-size: 16px;
        }
        .form-group input {
            height: 41px;
            border-radius: 30px;
            width:120px;
        }
        .form-group select {
            height: 41px;
            border-radius: 10px;
            width:100%;
            font-size: 16px;
        }
        .page-link {
            padding: .5rem 1.75rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!-- breadcrumb Start-->
    <div class="page-notification">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- listing Area Start -->

    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-tittle mb-50">
                    <div class="row">
                        <div class="col-6">
                            <h2 style="font-size: 25px;">Shop with us</h2>
                        </div>
                        <div class="col-6">
                            <?php if(empty(!$category)): ?>
                                <h3 class="text-right"><b>Category:</b> <?php echo e($category->title); ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                        <p class="d-none">Browse from 230 latest items</p>
                    </div>
                </div>
            </div>  
            <div class="row my-4 d-none">
                <div class="col-6">
                    <label class="d-inline">Filter: </label>
                    <div class="dropdown d-inline">
                        <button class="genric-btn success medium dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            Price
                        </button>
                        <div class="dropdown-menu">
                            <p class="dropdown-item border-bottom" href="#">The highest price is Rs. 799.00</p>
                            <div class="dropdown-item">
                                <div class="d-inline-block">
                                    <span>&#8377;</span>
                                    <div class="form-group d-inline-block">                                        
                                        <input type="number" class="form-control" id="startprice" placeholder="From">
                                    </div>                                
                                </div>
                                <div class="d-inline-block">
                                    <span>&#8377;</span>
                                    <div class="form-group d-inline-block">                                        
                                        <input type="number" class="form-control" id="startprice" placeholder="To">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label class="d-inline">Sort By: </label>
                    <div class="form-group d-inline-block ">    
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                </div>           
            </div>                      
            <div class="row">                
                <div class="col-12">
                    <!--? New Arrival Start -->
                    <div class="new-arrival new-arrival2">
                        <div class="row">
                            <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
                                        <a href="<?php echo e(route('product.detail', $PData['psid'])); ?>">
                                            <div class="single-new-arrival mb-50 text-center wow " data-wow-duration="1s"
                                                data-wow-delay=".1s">
                                                <div class="popular-img">
                                                    <img src="<?php echo e(asset('storage') ."/". $PData['image']); ?>" alt="<?php echo e($PData['name']); ?>">
                                                    
                                                </div>
                                                <div class="popular-caption">
                                                    <h3><a href="<?php echo e(route('product.detail', $PData['psid'])); ?>"><?php echo e($PData['name']); ?></a></h3>                                
                                                    <span> &#8377; <?php echo e($PData['price']); ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                        </div>
                        <div class="d-flex justify-content-center">
                            <?php echo e($productMasterList->links()); ?>

                        </div>
                    </div>
                    <!--? New Arrival End -->
                </div>
            </div>
        </div>
    </div>


        
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/website/shop.blade.php ENDPATH**/ ?>