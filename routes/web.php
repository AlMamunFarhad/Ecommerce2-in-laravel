<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountProductController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:customer'])->name('dashboard');


// admin routes
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/users', 'manage_user')->name('admin.user');
            Route::get('/manage/stores', 'manage_stores')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });

        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create', 'create_category')->name('category.create');
            Route::get('/category/manage', 'manage_category')->name('category.manage');
     
        });
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create', 'create_subcategory')->name('sub.category.create');
            Route::get('/subcategory/manage', 'sub_category')->name('sub.category.manage');
     
        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage', 'manage_product')->name('product.manage');
            Route::get('/product/review/manage', 'review_manage')->name('product.review.manage');
     
        });
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/product/attribute/create', 'product_attribute')->name('product.attribute.create');
            Route::get('/product/attribute/manage', 'manage_attribute')->name('product.attribute.manage');
     
        });
        Route::controller(DiscountProductController::class)->group(function () {
            Route::get('/discount/create', 'discount_product')->name('discount.create');
            Route::get('/discount/manage', 'discount_manage')->name('discount.manage');
     
        });
    });
});

Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified', 'role:vendor'])->name('vendor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
