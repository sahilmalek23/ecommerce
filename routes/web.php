<?php

use Illuminate\Support\Facades\Route;

// Admin Code
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\UserInvoiceController;

use App\Http\Middleware\ValidateAdmin;


// Member Code
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\RazorpayController;
use App\Http\Middleware\ValidateUser;

Route::prefix('admin')->group(function () {
    Route::controller(AuthController::class)->group(function (){
        Route::get('/hashgenerator', 'hashGenerator');
        Route::get('/login', 'login')->name('admin.login');
        Route::post('/login/submit', 'loginSubmit')->name('admin.login.submit');                
    }); 
    
    Route::middleware([ValidateAdmin::class])->group(function (){
        Route::controller(AdminController::class)->group(function (){
            Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        });
        Route::controller(ProductController::class)->group(function (){
            Route::get('/product/add/{id?}', 'productAdd')->name('admin.product.add');
            Route::post('/product/submit', 'productSubmit')->name('admin.product.submit');
            Route::get('/product/delete/{id}', 'productDelete')->name('admin.product.delete');
            Route::get('/product/master/report', 'productMasterReport')->name('admin.product.master.report');
            Route::get('/product/categroy/form/{id?}', 'categoryForm')->name('admin.product.categroy.form');
            Route::get('/product/categroy/delete/{id}', 'categoryDelete')->name('admin.product.categroy.delete');
            Route::post('/product/categroy/submit', 'categorySubmit')->name('admin.product.categroy.submit');
            Route::get('/product/categroy/report', 'categoryReport')->name('admin.product.categroy.report');
            Route::get('/product/subprodct/add/{id}', 'subProdctAdd')->name('admin.product.subproduct.add');
            Route::post('/product/subprodct/submit', 'subProductSubmit')->name('admin.product.subproduct.submit');
            Route::get('/product/subprodct/delete/{id}', 'subProductDelete')->name('admin.product.subproduct.delete');
            Route::get('/product/image/add/{id}', 'imageAdd')->name('admin.product.image.add');
            Route::post('/product/image/submit', 'imageSubmit')->name('admin.product.image.submit');
            Route::get('/product/image/delete/{id}', 'ImageDelete')->name('admin.product.image.delete');
        });  
        Route::controller(StockController::class)->group(function () {
            Route::get('/stock/report', 'StockReport')->name('admin.stock.report');
            Route::get('/stock/add/{id}', 'Add')->name('admin.stock.add');
            Route::post('/stock/add/submit', 'AddSubmit')->name('admin.stock.add.submit');
        });
        Route::controller(UserInvoiceController::class)->group(function () {
            Route::get('/orders/report/{status?}', 'index')->name('admin.orders.report');
            Route::get('/order/detail/{orderId?}', 'OrdersDetail')->name('admin.order.detail.report');
            Route::get('/order/action/{orderId?}/{status?}', 'OrderAction')->name('admin.order.action');            
        });
        
    });
});

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/product/detail/{id}', 'productDetail')->name('product.detail');
    Route::post('/product/addtocart/{buyFlag?}', 'addToCart')->name('product.addtocart');    
    Route::get('/cart/delete/{psid}', 'cartItemDelete')->name('cart.item.delete');
    Route::post('/cart/update-qty', 'updateCartQty')->name('cart.update.qty');
    Route::post('/apply-promo-code', 'applyPromoCode')->name('cart.apply.promo');

    Route::middleware([ValidateUser::class])->group(function () {
        Route::post( '/checkout', 'checkout')->name('checkout');
        // Route::any('/checkout', 'checkout')->name('checkout');
        Route::post('/purchase', 'purchase')->name('purchase');
        Route::post('/purchase/verify-payment', 'VerifyPaymentStatus')->name('purchase.verify.payment');
        Route::get('/order/confirmation/{orderId?}', 'orderConfirmation')->name('order.confirmation');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/order/detail/{orderId?}', 'orderDtails')->name('order.detail');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'sendOtp')->name('otp.send');
    Route::get('/verify-otp', 'showOtpForm')->name('otp.verify.form');
    Route::post('/verify-otp', 'verifyAndLogin')->name('otp.verify');
    Route::get('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout')->middleware([ValidateUser::class]);
});

Route::middleware([ValidateUser::class])->group(function () {
    Route::controller(RazorpayController::class)->group(function () {
        Route::get('/razorpay', 'index')->name('razorpay');
        Route::post('/razorpay', 'payment')->name('payment');
    });
});