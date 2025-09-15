

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
                                
                                <th>Image</th>
                                <th>Title</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    
                                    <td><a class=" d-flex align-content-center justify-content-center" href="<?php echo e(asset('storage') ."/". $catData->image); ?>" data-lightbox="image-<?php echo e($loop->iteration); ?>" data-title=""><span class="fe fe-24 fe-eye btn btn-primary fe-16"></span></a></td>
                                    <td><?php echo e($catData->title); ?></td>
                                    <td>
                                        <div class="d-flex align-content-center justify-content-evenly">
                                            <a href="<?php echo e(route('admin.product.categroy.form', $catData->id)); ?>" class="nav-link text-primary"><span class="fe fe-16 fe-edit"></span></a>
                                            <a href="<?php echo e(route('admin.product.categroy.delete', $catData->id)); ?>" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/categroy-report.blade.php ENDPATH**/ ?>