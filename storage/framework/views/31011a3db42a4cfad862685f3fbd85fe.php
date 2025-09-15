

<?php $__env->startSection('css'); ?>
    <style>
        .success-icon {
            color: #28a745;
            font-size: 4rem;
        }
        .order-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        .order-item {
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .product-image {
            width: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .addtimg {
            border-radius: 1rem;
        }
        .border-radius-left {
            border-radius: 10px 0px 0px 10px !important;
        }
        .border-radius-right {
            border-radius: 0px 10px 10px 0px !important;
        }
        .add-button {
            border-radius: 17px;
        }
        .atcp-img {
            margin-top: auto;
            margin-bottom: auto;
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Orders</a></li>                            
                            <li class="breadcrumb-item " >Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <i class="fas fa-check-circle success-icon"></i>
                    <h1 class="mt-3 font-weight-bold d-none">Thank You for Your Order!</h1>
                    <p class="text-muted d-none">Your order has been successfully placed and is being processed.</p>
                </div>

                <div class="order-details">
                    <h1 class="font-weight-bold">Order Information</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Order ID:</strong> #<?php echo e($order->id); ?></p>
                            <p><strong>Invoice Number:</strong> <?php echo e($order->invoiceno); ?></p>
                            <p><strong>Order Date:</strong> <?php echo e(date('F j, Y', strtotime($order->entrydate))); ?></p>
                            <p><strong>Order Status:</strong> 
                                <?php if($order->status == '0'): ?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php elseif($order->status == '1'): ?>
                                    <span class="badge badge-info">Processing</span>
                                <?php elseif($order->status == '4'): ?>
                                    <span class="badge badge-success">Shipped</span>
                                <?php elseif($order->status == '5'): ?>
                                    <span class="badge badge-success">Delivered</span>
                                <?php elseif($order->status == '6'): ?>
                                    <span class="badge badge-danger">Returned</span>
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Discount:</strong> ₹<?php echo e($order->discount); ?></p>
                            <p><strong>Delivery Fee:</strong> ₹<?php echo e($order->deliveryfee); ?></p>
                            <p><strong>Total Amount:</strong> ₹<?php echo e($order->total); ?></p>
                        </div>
                    </div>
                </div>

                <div class="order-details">
                    <h1 class="font-weight-bold">Shipping Address</h1>
                    <p>
                        <?php echo e($order->firstname); ?> <?php echo e($order->lastname); ?>,<br>
                        <?php echo e($order->address); ?>,<br>
                        <?php if($order->apartment): ?>
                            <?php echo e($order->apartment); ?>,<br>
                        <?php endif; ?>
                        <?php echo e($order->city); ?>, <?php echo e($state); ?>, <?php echo e($order->pincode); ?><br>
                        Phone: <?php echo e($order->phone); ?>

                    </p>
                </div>

                <?php if($order->same_ship == 0): ?>
                <div class="order-details">
                    <h1 class="font-weight-bold">Billing Address</h1>
                    <p>
                        <?php echo e($order->bill_firstname); ?> <?php echo e($order->bill_lastname); ?><br>
                        <?php echo e($order->bill_address); ?><br>
                        <?php if($order->bill_apartment): ?>
                            <?php echo e($order->bill_apartment); ?><br>
                        <?php endif; ?>
                        <?php echo e($order->bill_city); ?>, <?php echo e($bill_state); ?> <?php echo e($order->bill_pincode); ?><br>
                        Phone: <?php echo e($order->bill_phone); ?>

                    </p>
                </div>
                <?php endif; ?>

                <div class="order-details">
                    <h1 class="font-weight-bold">Order Items</h1>
                    <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="order-item">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-3 ">
                                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->name); ?>" class="product-image">
                            </div>
                            <div class="col-6">
                                <h4 class="mb-1 font-weight-bold mb-3"><?php echo e($item->name); ?></h4>
                                <p class="text-muted mb-0">Size: <?php echo e($item->size); ?></p>
                            </div>
                            <div class="col-md-4 col-3 text-right">
                                <p class="mb-3">Qty: <?php echo e($item->qty); ?></p>
                                <p class="mb-0 font-weight-bold">₹<?php echo e($item->totalamount); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                

                <div class="text-center mt-5">
                    <a href="<?php echo e(route('orders')); ?>" class="genric-btn primary circle arrow">Go To Orders</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('website.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/website/order-detail.blade.php ENDPATH**/ ?>