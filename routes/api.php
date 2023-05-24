<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('categories',CategoryController::class);
Route::get('/rooms/{id}/related', [RoomController::class, 'relatedItems']);
Route::apiResource('rooms', RoomController::class);
Route::apiResource('users',UserController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('groups', GroupController::class);
// Route::apiResource('orders', OrderController::class);
Route::post('/orders', [CheckoutController::class, 'checkout']);


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('/login-customer', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    
});
