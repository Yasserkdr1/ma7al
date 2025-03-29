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
});

