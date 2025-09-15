

<?php $__env->startSection('main'); ?>

<?php
  
?>
   

  <h2 class="page-title">Size Add</h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="<?php echo e(route('admin.product.subproduct.submit')); ?>" method="post">

          <?php echo csrf_field(); ?>

          <input type="hidden" name="productId" value="<?php echo e($productId); ?>">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Size</label>
            <div class="col-sm-9">
              <select class="form-control select2" name="size" id="size">
                <option selected disabled value="">Select Size</option>                
                <?php $__currentLoopData = $sizeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option  value="<?php echo e($size->id); ?>"><?php echo e($size->size); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger text-right"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Price</label>
            <div class="col-sm-9">
              <input name="price" class="form-control" id="price">
            </div>
          </div>
          <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger text-right"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Discount Price</label>
            <div class="col-sm-9">
              <input name="dp" class="form-control" id="dp">
            </div>
          </div>
          <?php $__errorArgs = ['dp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger text-right"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          
          <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- / .card-desk-->  



<h2 class="page-title">Product Size Report</h2>

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
                            <th>Entry Date</th>                            
                            <th>Size</th>
                            <th>Price</th>
                            <th>Discount Price</th>                                  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $productSub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proSubData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($proSubData->entrydate); ?></td>
                                <td><?php echo e($proSubData->size); ?></td>
                                <td><?php echo e($proSubData->price); ?></td>
                                <td><?php echo e($proSubData->dp); ?></td>                                
                                <td>
                                    <div class="d-flex align-content-center justify-content-evenly">
                                        <a href="" class="nav-link text-primary d-none"><span class="fe fe-16 fe-edit"></span></a>
                                        <a href="<?php echo e(route('admin.product.subproduct.delete', $proSubData->id)); ?>" class="nav-link text-danger"><span class="fe fe-16 fe-trash-2"></span></a>
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
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/subproductform.blade.php ENDPATH**/ ?>