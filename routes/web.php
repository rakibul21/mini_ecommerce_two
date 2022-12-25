<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/home/product/detail/{id}',[HomeController::class,'detail'])->name('detail');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[UserController::class,'dashboardIndex'])->name('dashboard');

    Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/update-status/{id}',[ProductController::class,'updateStatus'])->name('product.update-status');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/product/invoice/{id}',[ProductController::class,'invoice'])->name('product.invoice');

    Route::get('/add/category',[CategoryController::class,'index'])->name('add-category');
    Route::post('/create/category',[CategoryController::class,'create'])->name('create-category');
    Route::get('/manage/category',[CategoryController::class,'manage'])->name('manage-category');
    Route::get('/edit/category/{id}',[CategoryController::class,'edit'])->name('edit.category');
    Route::post('/update/category/{id}',[CategoryController::class,'update'])->name('update-category');
    Route::get('/delete/category/{id}',[CategoryController::class,'delete'])->name('delete.category');

    Route::get('/brand/add',[BrandController::class,'index'])->name('brand-add');
    Route::post('/brand/create',[BrandController::class,'create'])->name('brand-create');
    Route::get('/brand/manage',[BrandController::class,'manage'])->name('brand-manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand-edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand-update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand-delete');

    Route::get('/admin/user-add',[UserController::class,'index'])->name('admin.user-add');
    Route::post('/admin/user-create',[UserController::class,'create'])->name('admin.user-create');
    Route::get('/admin/user-manage',[UserController::class,'manage'])->name('admin.user-manage');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('admin.user-edit');
    Route::post('/user/update/{id}',[UserController::class,'update'])->name('admin.user-update');
    Route::get('/user/delete/{id}',[UserController::class,'delete'])->name('admin.user-delete');
});
