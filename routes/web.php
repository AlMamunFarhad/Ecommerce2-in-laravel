<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\MasterSubCategoryController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Admin\DiscountProductController;
use App\Http\Controllers\Admin\ProductAttributeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:customer'])->name('dashboard');


// Admin routes
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
            Route::post('/product/attribute/store', 'store_attribute')->name('store.product.attribute');
            Route::get('/product/attribute/manage', 'manage_attribute')->name('product.attribute.manage');
            Route::get('product/attribute/edit/{id}', 'edit_attribute')->name('edit.attribute');
            Route::put('product/attribute/update/{id}', 'update_attribute')->name('update.attribute');
            Route::delete('product/attribute/delete/{id}', 'delete_attribute')->name('delete.attribute');
        });
        Route::controller(DiscountProductController::class)->group(function () {
            Route::get('/discount/create', 'discount_product')->name('discount.create');
            Route::get('/discount/manage', 'discount_manage')->name('discount.manage');
        });
        Route::controller(MasterCategoryController::class)->group(function () {
            Route::post('/store/category', 'store_category')->name('store.category');
            Route::delete('/delete/category/{id}', 'del_category')->name('delete.category');
            Route::get('/edit/category/{id}', 'edit_category')->name('edit.category');
            Route::put('/update/category/{id}', 'updateCategory')->name('update.category');
        });
        Route::controller(MasterSubCategoryController::class)->group(function () {
            Route::post('/store/subcategory', 'sub_category')->name('store.sub.category');
            Route::get('/edit/sub/category/{id}', 'editSubCategory')->name('edit.sub.category');    
            Route::put('/update/sub/category/{id}', 'updateSubCategory')->name('update.sub.category');
            Route::delete('/delete/sub/category/{id}', 'deleteSubcategory')->name('delete.sub.category');
        });
    });
});

// Seller routes
Route::middleware(['auth', 'verified', 'role:vendor'])->group(function () {
    Route::prefix('seller')->group(function () {
        Route::controller(SellerController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order/history', 'orderHistory')->name('seller.order.history');
        });
        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/product/create', 'index')->name('seller.create.product');
            Route::get('/product/manege', 'manage')->name('seller.manage.product');
        });
        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/store/create', 'index')->name('vendor.store');
            Route::get('/store/manage', 'manage')->name('vendor.store.manage');
            Route::post('store/publish', 'store_publish')->name('store.publish');
            Route::get('edit/store/{id}', 'edit_store')->name('edit.store');
            Route::put('update/store/{id}', 'update_store')->name('update.store');
            Route::delete('delete/store/{id}', 'delete_store')->name('delete.store');
        });
    });
});
// Customer routes
Route::middleware(['auth', 'verified', 'role:customer'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::get('/profile', 'index')->name('dashboard');
            Route::get('/order/history', 'history')->name('user.history');
            Route::get('/payment', 'payment')->name('user.payment');
            Route::get('/affiliate', 'affiliate')->name('user.affiliate');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
