<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('profile/update_profile',  [ProfileController::class, 'updateProfile'])->name('profile.update_profile');
Route::post('profile/change_password',  [ProfileController::class, 'changePassword'])->name('profile.change_password');

Route::resource('customer', CustomerController::class)->names('customer');
Route::resource('category', CategoryController::class)->names('category');
Route::resource('product', ProductController::class)->names('product');
Route::resource('order', OrderController::class)->names('order');

Route::get('product/{product}/ajax', [ProductController::class, 'ajax'])->name('product.ajax');


require __DIR__.'/auth.php';
