<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartControler;

// Route::get('/', function () {
//     return view('indexx');
// });

Auth::routes();

Route::get('/', [HomeController::class,'index'])->name('home.indexx');
Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard',[UserController::class, 'index'])->name('user.indexx');
});
Route::get('/cart',[CartControler::class,'index'])->name('cart.index');
Route::post('/cart/add',[CartControler::class,'add_to_cart'])->name('cart.add');

Route::get('/shop',[ShopController::class,'index'])->name('shop.indexx');
Route::get('/shop/{product_slug}',[ShopController::class,'product_details'])->name('shop.products.details');

Route::put('/cart/increase-qunatity/{rowId}',[CartControler::class,'increase_card_quantity'])->name('cart.qty.increase');
Route::put('/cart/decrease-qunatity/{rowId}',[CartControler::class,'decrease_card_quantity'])->name('cart.qty.decrease');
Route::delete('/cart/remove/{rowId}',[CartControler::class,'remove_item'])->name('cart.item.remove');
Route::delete('/cart/clear',[CartControler::class,'empty_cart'])->name('cart.empty');




Route::get('/checkout',[CartControler::class,'checkout'])->name('cart.checkout');
Route::get('/search',[HomeController::class,'search'])->name('home.search');









Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class, 'index'])->name('admin.indexx');
    Route::get('/admin/categories',[AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add',[AdminController::class, 'category_add'])->name('admin.category.add');
    Route::post('/admin/category/store',[AdminController::class, 'category_store'])->name('admin.category.strore');
    Route::get('/admin/category/{id}/edit',[AdminController::class, 'category_edit'])->name('admin.category.edit');
    Route::put('/admin/category/update',[AdminController::class, 'category_update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}/delete',[AdminController::class,'delete_category'])->name('admin.category.delete');
    Route::get('/admin/products',[AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/products/add',[AdminController::class, 'product_add'])->name('admin.product.add');
    Route::post('/admin/product/store',[AdminController::class,'product_store'])->name('admin.product.store');
    Route::delete('/admin/product/{id}/delete',[AdminController::class,'product_delete'])->name('admin.product.delete');
    Route::get('/admin/orders',[AdminController::class,'orders'])->name('admin.orders');

});

