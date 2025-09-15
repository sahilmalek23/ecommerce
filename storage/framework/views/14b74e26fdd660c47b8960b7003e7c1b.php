

<?php $__env->startSection('css'); ?>
    <style>
        .login-form {
            max-width: 600px;
            margin: 0 auto;
            border: 2px solid #dee2f9;
            border-radius: 10px;
            padding: 30px;
            background-color: #ededed;
            box-shadow: 6px 6px #222222;
        }
        .copan-code {
            border: 2px solid #1f2b7b;
            border-radius: 24px;
            background: white;
        }
        .promo-input {
            border: none !important;
            border-radius: 21px !important;
            padding-left: 20px !important;
            height: 40px;
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
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Verify OTP</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="login-form my-5">
            <h2 class="text-center font-bold"><b>Enter OTP</b></h2>
            <p class="text-center text-muted">An OTP has been sent to your email address.</p>
            
            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('otp.verify')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="d-flex copan-code mt-3">
                    <span class="ti-lock align-self-center pl-3 text-primary"></span>
                    <input type="text" class="promo-input w-100 flex-fill" name="otp" placeholder="Enter 6-digit OTP" required autofocus>
                </div>
                <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger text-center mt-2"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <button type="submit" class="genric-btn primary mx-auto circle arrow d-block mt-4">Verify & Login</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('website.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\XAMPP\htdocs\ecommerce-app\resources\views/website/auth/verify-otp.blade.php ENDPATH**/ ?>