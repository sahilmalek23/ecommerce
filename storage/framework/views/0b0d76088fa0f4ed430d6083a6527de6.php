

<?php $__env->startSection('css'); ?>    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <h2 class="page-title">Product Master Report</h2>

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
                                <th>Size Add</th>
                                <th>Image Add</th>
                                <th>Entry Date</th>
                                <th>Main Image</th>                                
                                <th>Name</th>
                                <th>Category</th>                                                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $proMasList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proMasData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><a href="<?php echo e(route('admin.product.subproduct.add', $proMasData->id)); ?>">Sub Product Add</a></td>
                                    <td><a href="<?php echo e(route('admin.product.image.add', $proMasData->id)); ?>">Image Add</a></td>
                                    <td><?php echo e($proMasData->entrydate); ?></td>
                                    <td class="text-center">
                                        <?php if($proMasData->image == ''): ?>
                                            ---
                                        <?php else: ?>
                                            <a class=" d-flex align-content-center justify-content-center" href="<?php echo e(asset('storage') ."/". $proMasData->image); ?>" data-lightbox="image-<?php echo e($loop->iteration); ?>" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($proMasData->name); ?></td>
                                    <td><?php echo e($proMasData->category); ?></td>                                                                        
                                    <td>
                                        <div class="d-flex align-content-center justify-content-evenly">
                                            <a href="<?php echo e(route('admin.product.add', $proMasData->id)); ?>" class="nav-link text-primary"><span class="fe fe-16 fe-edit"></span></a>
                                            <a href="<?php echo e(route('admin.product.delete', $proMasData->id)); ?>" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
                                        </div>
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\laravelpro\resources\views/admin/product-master-report.blade.php ENDPATH**/ ?>