

<?php $__env->startSection('css'); ?>    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <h2 class="page-title">Order Details</h2>

    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body ">
                    <!-- table -->
                    <h3>Order Information</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b>Order ID:</b> #<?php echo e($ordermain->id); ?></p>
                            <p><b>Invoice Number:</b> <?php echo e($ordermain->invoiceno); ?></p>
                            <p><b>Order Date:</b> <?php echo e(date('F j, Y', strtotime($ordermain->entrydate))); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>Order Status:</b> <?php echo e($ordermain->statusname); ?></p>
                            <p><b>PromoCode:</b> <?php echo e($ordermain->promocode); ?></p>
                            <p><b>Discount:</b> &#8377; <?php echo e($ordermain->discount); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>Delivery Fee:</b> &#8377; <?php echo e($ordermain->deliveryfee); ?></p>
                            <p><b>Total Amount:</b> &#8377; <?php echo e($ordermain->finaltotal); ?></p>
                        </div>
                    </div>
                    <h3>Shipping Address</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p><b>Receiver Name:</b> <?php echo e($ordermain->firstname ."". $ordermain->lastname); ?></p>
                            <p><b>Address:</b> <?php echo e($ordermain->address); ?></p>
                            <p><b>Apartment:</b> <?php echo e($ordermain->apartment); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>city:</b> <?php echo e($ordermain->city); ?></p>
                            <p><b>State:</b> <?php echo e($ordermain->sstate); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <p><b>Pincode:</b> <?php echo e($ordermain->pincode); ?></p>
                            <p><b>Phone:</b> <?php echo e($ordermain->phone); ?></p>
                        </div>
                    </div>
                    <?php if($ordermain->same_ship == 0): ?>
                        <h3>Billing  Address</h3>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <p><b>Receiver Name:</b> <?php echo e($ordermain->bill_firstname ."". $ordermain->bill_lastname); ?></p>
                                <p><b>Address:</b> <?php echo e($ordermain->bill_address); ?></p>
                                <p><b>Apartment:</b> <?php echo e($ordermain->bill_apartment); ?></p>
                            </div>
                            <div class="col-sm-4">
                                <p><b>city:</b> <?php echo e($ordermain->bill_city); ?></p>
                                <p><b>State:</b> <?php echo e($ordermain->billstate); ?></p>
                            </div>
                            <div class="col-sm-4">
                                <p><b>Pincode:</b> <?php echo e($ordermain->bill_pincode); ?></p>
                                <p><b>Phone:</b> <?php echo e($ordermain->bill_phone); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h3>Order Product</h3>
                    <hr>
                    <table class="table datatables display table-striped " id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>   
                                <th>Image</th>                                                             
                                <th>Name</th>
                                <th>Size</th>                                
                                <th>Qty</th>
                                <th>Price</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $proorderdetaillist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>                                    
                                    <td><a class=" d-flex align-content-center justify-content-center" href="<?php echo e(asset('storage') ."/". $orderPro->proimg); ?>" data-lightbox="image-<?php echo e($loop->iteration); ?>" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a></td>
                                    <td><?php echo e($orderPro->proname); ?></td>
                                    <td><?php echo e($orderPro->size); ?></td>
                                    <td><?php echo e($orderPro->qty); ?></td>
                                    <td><?php echo e($orderPro->dp); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                        </tbody>
                    </table>                    
                    <hr>
                    <?php if($ordermain->status == 1): ?>                        
                        <a href="<?php echo e(route('admin.order.action', [$ordermain->id, 4])); ?>" class="btn btn-primary">Dispatch (Accepte)</a>
                    <?php elseif($ordermain->status == 4): ?>   
                        <a href="<?php echo e(route('admin.order.action', [$ordermain->id, 5])); ?>" class="btn btn-primary">Delivered</a>                     
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/order-detail.blade.php ENDPATH**/ ?>