<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as ProductAdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrderProductsController;
use App\Http\Controllers\Admin\StatisticalController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CategoryController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/myview', function() {
    return view('myview');
});

Route::post('/data', function (Request $request) {
    return view('test', ['data' => $request->all()]);
});

Route::get('/view-demo', function() {
    return view('view_demo');
});

Route::get('/index', [CategoryController::class, 'index']);

Route::get('/shop', [ShopController::class, 'shop'])->name('products');
Route::get('/product-details/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{id}', [CategoryController::class, 'category'])->name('category.show');

Route::get('/product-details', function() {
    return view('mypage.product-details');
});
Route::get('/about', function() {
    return view('mypage.about');
});
Route::get('/blog', function() {
    return view('mypage.blog');
});
Route::get('/blog-details', function() {
    return view('mypage.blog-details');
});
Route::get('/login-shop', function() {
    return view('mypage.login');
});
Route::get('/elements', function() {
    return view('mypage.elements');
});
Route::get('/confirmation', function() {
    return view('mypage.confirmation');
});

Route::get('/contact', function() {
    return view('mypage.contact');
});

Route::name('admin.')->prefix("admin")->group(function() {
    Route::resource('categorys', CategoryAdminController::class)->middleware(['auth']);
});

Route::name('admin.')->prefix("admin")->group(function() {
    Route::resource('products', ProductAdminController::class)->middleware(['auth']);
});

Route::name('admin.')->prefix("admin")->group(function() {
    Route::resource('orders', OrdersController::class)->middleware(['auth']);
});

Route::name('admin.')->prefix("admin")->group(function() {
    Route::resource('orderproducts', OrderProductsController::class)->middleware(['auth']);
});

Route::get('admin/statistical', [StatisticalController::class, 'index'])->middleware(['auth'])->name('statistical');

Route::post('add-to-card', [OrderController::class, 'saveDataToSession'])->name('order.save');
Route::get('cart', [OrderController::class, 'orderList']);
Route::post('deletecart', [OrderController::class, 'deleteProduct'])->name('deletecart');
Route::put('order-update', [OrderController::class, 'update'])->name('order.update');
Route::get('checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Route::post('purchase', [OrderController::class, 'purchase'])->name('order.purchase');
Route::get('mail', [OrderController::class, 'sendmail']);