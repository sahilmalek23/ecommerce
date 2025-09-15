

<?php $__env->startSection('css'); ?>    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <h2 class="page-title"><?php echo e($title); ?></h2>

    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body ">
                    <!-- table -->
                    <table class="table datatables display table-striped " id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>   
                                <th>Order Details</th>                                                             
                                <th>Order Date</th>
                                <th>Email</th>                                
                                <th>Invoice No</th>
                                <th>Order Id</th>
                                <th>Payment Status</th>
                                <th>Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><a href="<?php echo e(route('admin.order.detail.report', $order->id)); ?>" class="nav-link text-primary"><span class="fe fe-16 fe-book"></span></a></td>
                                    <td><?php echo e($order->orderdate); ?></td>
                                    <td><?php echo e($order->email); ?></td>
                                    <td><?php echo e($order->invoiceno); ?></td>
                                    <td><?php echo e($order->order_id); ?></td>
                                    <td><?php echo e($order->paymentstatus); ?></td>
                                    <td><?php echo e($order->finaltotal); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/orders-report.blade.php ENDPATH**/ ?>