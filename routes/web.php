<?php

use App\Http\Controllers\RoomController;
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

Route::prefix('rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('room.index');
    Route::get('/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/store', [RoomController::class, 'store'])->name('room.store');
    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/update/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/destroy/{id}', [RoomController::class, 'destroy'])->name('room.destroy');

});
