

<?php $__env->startSection('css'); ?>    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <h2 class="page-title">Stock Report</h2>

    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <!-- table -->
                    <table class="table datatables" id="dataTable-1">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Stock Add</th>
                                <th>Product Name</th>                                
                                <th>Size</th>
                                <th>Status</th>
                                <th>Inward</th>
                                <th>Outward</th>
                                <th>Total Stock</th>                                                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $StockList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $StockData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><a href="<?php echo e(route('admin.stock.add', $StockData->ProSubId)); ?>">Stock Add</a></td>                                    
                                    <td><?php echo e($StockData->productname); ?></td>
                                    <td><?php echo e($StockData->size); ?></td>
                                    <td><?php echo e($StockData->status); ?></td>
                                    <td><?php echo e($StockData->inwardstock); ?></td>
                                    <td><?php echo e($StockData->outwardstock); ?></td>                                    
                                    <td><?php echo e($StockData->totalstock); ?></td>                                                                          
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/stockreport.blade.php ENDPATH**/ ?>