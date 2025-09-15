

<?php $__env->startSection("content"); ?>
    <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="<?php echo e(route('admin.login.submit')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="javascript:void(0)">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
        </svg>
    </a>
    <h1 class="h6 mb-3">Sign in</h1>
    <div class="form-group">
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="username" name="username" id="inputEmail" class="form-control form-control-lg" placeholder="User Name" autofocus="">
        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" >
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
    <p class="mt-5 mb-3 text-muted">© <?php echo e(date('Y')); ?></p>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.auth.layout.main", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/admin/auth/admin/login.blade.php ENDPATH**/ ?>