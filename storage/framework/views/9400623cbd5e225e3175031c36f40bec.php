

<?php $__env->startSection('css'); ?>
    <style>
        .order-item {
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .product-image {
            width: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .order-part {
            padding: 10px 13px;
            border: 1px solid #a8b2db;
            border-radius: 10px;
            box-shadow: 3px 7px 12px;
        }
        hr {
            margin: 10px 0;
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
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">My Orders</a></li>                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center px-3">
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-8 order-part mb-3">
                <div class="row">
                    <div class="col-5">
                        <p>#INV <?php echo e($order['invoiceData']->invoiceno); ?></p>                    
                    </div>
                    <div class="col-7 text-right">
                        <b>Order Status:</b>
                        <?php if($order['invoiceData']->status == '0'): ?>
                            <span class="badge p-3 badge-warning">Pending</span>
                        <?php elseif($order['invoiceData']->status == '1'): ?>
                            <span class="badge p-3 badge-info">Processing</span>
                        <?php elseif($order['invoiceData']->status == '4'): ?>
                            <span class="badge p-3 badge-success">Shipped</span>
                        <?php elseif($order['invoiceData']->status == '5'): ?>
                            <span class="badge p-3 badge-success">Delivered</span>
                        <?php elseif($order['invoiceData']->status == '6'): ?>
                            <span class="badge p-3 badge-danger">Returned</span>
                        <?php endif; ?>
                    </div>
                    <?php $__currentLoopData = $order['invoiceProduct']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                        <div class="col-12">
                            <hr>
                            <div class="row align-items-center">
                            <div class="col-md-2 col-3 ">
                                <img src="<?php echo e(asset('storage')); ?>/<?php echo e($product->image); ?>" alt="Women's Dress" class="product-image">
                            </div>
                            <div class="col-6">
                                <h4 class="mb-1 font-weight-bold mb-3"><?php echo e($product->name); ?></h4>
                                <p class="text-muted mb-0">Size: <?php echo e($product->size); ?></p>
                            </div>
                            <div class="col-md-4 col-3 text-right">
                                <p class="mb-3">Qty: <?php echo e($product->qty); ?></p>
                                <p class="mb-0 font-weight-bold">₹<?php echo e($product->dp); ?></p>
                            </div>
                            </div>                        
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                    <div class="col-12 ">
                        <hr>
                        <a href="<?php echo e(route('order.detail', $order['invoiceData']->id)); ?>" class="d-block genric-btn default circle">View Order Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('website.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/website/orders.blade.php ENDPATH**/ ?>