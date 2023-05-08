<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
// use App\Http\Controllers\GroupController;
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

Route::get('/', function () {
    return view('home');
});

// Category
Route::resource('categories',\App\Http\Controllers\CategoryController::class);
// Rooms
Route::resource('rooms',\App\Http\Controllers\RoomController::class);
// Customers
Route::get('/customer', [CustomerController::class, 'index'])->name('customers.index');

// Orders
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/detail/{id}', [OrderController::class, 'show'])->name('orders.detail');
});

Route::resource('users',\App\Http\Controllers\UserController::class);
Route::resource('groups',\App\Http\Controllers\GroupController::class);
// Route::group(['prefix'=>'groups'], function(){
//     Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
//     Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
// });


