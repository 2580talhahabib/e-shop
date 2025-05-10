<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
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
 

// middleware Route 
Route::middleware('authmiddle')->group(function () {
    // Dashboard Controller 
Route::get('/Dashboard',[DashboardController::class,'index'])->name('Dashboard');
// Admin controller 
Route::get('/list',[AdminController::class,'index'])->name('admin.list');
});