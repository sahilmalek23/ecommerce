

<?php $__env->startSection('css'); ?>
  <style>
    .ql-container {
      height: 185px;
    }  
  </style>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<?php
  $name = $categoryId = $price = $dp = $description = $remarks = $editId = $image = '';
  $subBtn = "Save";
  if ($productData) {
    $editId = $productData->id;
    $name = $productData->name;
    $categoryId = $productData->category_id;
    $price = $productData->price;
    $dp = $productData->dp;
    $description = $productData->description;
    $remarks = $productData->remarks;
    $image = $productData->image;
    $subBtn = "Update";
  }
?>
   
<div class="col-12">
  <h2 class="page-title">Product <?php echo e($subBtn); ?></h2>              
  <div class="card-deck">                
    <div class="card shadow mb-4">                  
      <div class="card-body">
        <form action="<?php echo e(route('admin.product.submit')); ?>" method="post" enctype="multipart/form-data">

          <?php echo csrf_field(); ?>
          <input type="hidden" name="editId" value="<?php echo e($editId); ?>">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" value="<?php echo e($name); ?>" name="name" id="name" placeholder="Name">
            </div>
          </div>
          <?php $__errorArgs = ['name'];
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
            <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
            <div class="col-sm-9">
              <select class="form-control select2" name="category" id="category">
                <option selected disabled value="">Select Categroy</option>                
                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($categoryId == $category->id): ?> selected <?php endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <?php $__errorArgs = ['category'];
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
            <label  class="col-sm-3 col-form-label">Image</label>
            <div class="col-sm-9">
              <?php if($image == ''): ?>
                <input type="file" class="form-control" name="image" id="image" placeholder="Image">
              <?php else: ?>
              <div class='d-flex'>
                <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                <a class=" d-flex align-content-center justify-content-center" href="<?php echo e(asset('storage') ."/". $image); ?>" data-lightbox="image-" data-title="">
                  <span class="fe fe-24 fe-eye btn btn-primary fe-16"></span>
                </a>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger text-right"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <input type="hidden" name="description" id="description" value="">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
              <div id="editor">
                 <?php echo $description; ?>                                            
              </div>
            </div>
          </div> 
          <?php $__errorArgs = ['description'];
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
            <button type="submit" class="btn btn-primary"><?php echo e($subBtn); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div> <!-- / .card-desk-->  
</div>

                
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
  <script>
    $('form').submit(function () {
      var $description = $('.ql-editor').html();
      $('#description').val($description);
    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\laravelpro\resources\views/admin/productadd.blade.php ENDPATH**/ ?>