

<?php $__env->startSection('css'); ?>    
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>


<div class="col-12">
  <h2 class="page-title">Stock Add</h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="<?php echo e(route(name: 'admin.stock.add.submit')); ?>" method="post" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="productId" value="<?php echo e($productId); ?>">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Stock Qty</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock Qty">
            </div>
          </div>
          <?php $__errorArgs = ['stock'];
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
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/stockadd.blade.php ENDPATH**/ ?>