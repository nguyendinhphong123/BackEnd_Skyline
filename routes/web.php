<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoomController;
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


//Login
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/checklogin', [AuthController::class, 'postLogin'])->name('admin.checklogin');

Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {
    Route::get('admin', [AuthController::class, 'home'])->name('trangchu');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Category
    Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    Route::group(['prefix' => 'categories'], function () {
    Route::get('/trash', [CategoryController::class, 'getTrashed'])->name('categories.trash');
    Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/deleteforever/{id}', [CategoryController::class, 'deleteforever'])->name('categories.deleteforever');
    });
    // Rooms
    
        Route::resource('rooms',\App\Http\Controllers\RoomController::class);
    // thùng rác
    Route::get('/export-rooms', [RoomController::class, 'export'])->name('rooms.export');

    Route::group(['prefix' => 'rooms'], function () {
    Route::get('/trash', [RoomController::class, 'getTrashed'])->name('rooms.trash');
    Route::get('/restore/{id}', [RoomController::class, 'restore'])->name('rooms.restore');
    Route::delete('/deleteforever/{id}', [RoomController::class, 'deleteforever'])->name('rooms.deleteforever');
     //xuất file excel
    });
    // Customers
    Route::get('/customer', [CustomerController::class, 'index'])->name('customers.index');

    // Orders
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/detail/{id}', [OrderController::class, 'show'])->name('orders.detail');
    });
    Route::get('/export-orders', [OrderController::class, 'export'])->name('orders.export');

    Route::resource('users',\App\Http\Controllers\UserController::class);
    Route::resource('groups',\App\Http\Controllers\GroupController::class);
    Route::group(['prefix'=>'groups'], function(){
    Route::put('/updateRoles/{id}', [GroupController::class, 'updateRoles'])->name('groups.updateRoles');
    // Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('groups.detail');
});

});



