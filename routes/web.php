<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Admin Side Routes 


// Auth Controller 
Route::get('/register',[AuthController::class,'register'])->name('Auth.register');
Route::post('/registerauth',[AuthController::class,'registerauth'])->name('Auth.registerauth');
Route::get('/login',[AuthController::class,'login'])->name('Auth.login');
Route::post('/loginauth',[AuthController::class,'loginauth'])->name('Auth.loginauth');
Route::post('/delete',[AuthController::class, 'logout'])->name('logout');
 

// middleware Route 
Route::middleware('authmiddle')->group(function () {
    // Dashboard Controller 
Route::get('/Dashboard',[DashboardController::class,'index'])->name('Dashboard');
// ProductSubCategroyController 
Route::get('/productSucategory',[ProductSubCategoryController::class,'index'])->name('productSubcategory');
// Admin controller 
Route::get('/list/admin',[AdminController::class,'index'])->name('admin.list');
Route::get('/create/admin',[AdminController::class,'create'])->name('admin.create');
Route::post('/store/admin',[AdminController::class,'store'])->name('admin.store');
Route::get('/edit/{id}/admin',[AdminController::class,'edit'])->name('admin.edit');
Route::post('/update/{id}/admin',[AdminController::class,'update'])->name('admin.update');
Route::post('/destroy/{id}/admin',[AdminController::class,'destroy'])->name('admin.destroy');


// product controller 
Route::get('/list/product',[ProductController::class,'index'])->name('product.list');
Route::get('/create/product',[ProductController::class,'create'])->name('product.create');
Route::post('/store/product',[ProductController::class,'store'])->name('product.store');
Route::get('/edit/{id}/product',[ProductController::class,'edit'])->name('product.edit');
Route::post('/update/{id}/product',[ProductController::class,'update'])->name('product.update');
Route::post('/destroy/{id}/product',[ProductController::class,'destroy'])->name('product.destroy');

// category controller 
Route::get('/list/category',[CategoryController::class,'index'])->name('category.list');
Route::get('/create/category',[CategoryController::class,'create'])->name('category.create');
Route::post('/store/category',[CategoryController::class,'store'])->name('category.store');
Route::get('/edit/{id}/category',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/update/{id}/category',[CategoryController::class,'update'])->name('category.update');
Route::post('/destroy/{id}/category',[CategoryController::class,'destroy'])->name('category.destroy');

// SubCategory controller 
Route::get('/list/subcategory',[SubCategoryController::class,'index'])->name('subcategory.list');
Route::get('/create/subcategory',[SubCategoryController::class,'create'])->name('subcategory.create');
Route::post('/store/subcategory',[SubCategoryController::class,'store'])->name('subcategory.store');
Route::get('/edit/{id}/subcategory',[SubCategoryController::class,'edit'])->name('subcategory.edit');
Route::post('/update/{id}/subcategory',[SubCategoryController::class,'update'])->name('subcategory.update');
Route::post('/destroy/{id}/subcategory',[SubCategoryController::class,'destroy'])->name('subcategory.destroy');

// Brand controller 
Route::get('/list/brand',[BrandController::class,'index'])->name('brand.list');
Route::get('/create/brand',[BrandController::class,'create'])->name('brand.create');
Route::post('/store/brand',[BrandController::class,'store'])->name('brand.store');
Route::get('/edit/{id}/brand',[BrandController::class,'edit'])->name('brand.edit');
Route::post('/update/{id}/brand',[BrandController::class,'update'])->name('brand.update');
Route::post('/destroy/{id}/brand',[BrandController::class,'destroy'])->name('brand.destroy');

// Color controller 
Route::get('/list/color',[ColorController::class,'index'])->name('color.list');
Route::get('/create/color',[ColorController::class,'create'])->name('color.create');
Route::post('/store/color',[ColorController::class,'store'])->name('color.store');
Route::get('/edit/{id}/color',[ColorController::class,'edit'])->name('color.edit');
Route::post('/update/{id}/color',[ColorController::class,'update'])->name('color.update');
Route::post('/destroy/{id}/color',[ColorController::class,'destroy'])->name('color.destroy');

});