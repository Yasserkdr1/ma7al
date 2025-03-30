<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('indexx');
// });

Auth::routes();

Route::get('/', [HomeController::class,'index'])->name('home.indexx');
Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard',[UserController::class, 'index'])->name('user.indexx');
});


Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class, 'index'])->name('admin.indexx');
    Route::get('/admin/categories',[AdminController::class, 'categories'])->name('admin.categories');
    Route::get('/admin/category/add',[AdminController::class, 'category_add'])->name('admin.category.add');
    Route::post('/admin/category/store',[AdminController::class, 'category_store'])->name('admin.category.strore');
    Route::get('/admin/category/{id}/edit',[AdminController::class, 'category_edit'])->name('admin.category.edit');
    Route::put('/admin/category/update',[AdminController::class, 'category_update'])->name('admin.category.update');
    Route::delete('/admin/category/{id}/delete',[AdminController::class,'delete_category'])->name('admin.category.delete');
});

