<?php

use App\Http\Controllers\DonviController;
use App\Http\Controllers\NgachLuongController;
use App\Http\Controllers\NhomngachController;
use App\Http\Controllers\UserController;
use App\Models\Donvi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Public Routes
//! User
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

//! Đơn vị
Route::get('/donvi', [DonviController::class, 'index']);
Route::post('/donvi', [DonviController::class, 'store']);
Route::get('/donvi/{id}', [DonviController::class, 'show']);
Route::put('/donvi/{id}/edit', [DonviController::class, 'update']);
Route::delete('/donvi/{id}/delete', [DonviController::class, 'destroy']);
//! NgachLuong
Route::get('/ngachluong', [NgachLuongController::class, 'index']);
Route::post('/ngachluong', [NgachLuongController::class, 'store']);
Route::get('/ngachluong/{id}', [NgachLuongController::class, 'show']);
Route::put('/ngachluong/{id}/edit', [NgachLuongController::class, 'update']);
Route::delete('/ngachluong/{id}/delete', [NgachLuongController::class, 'destroy']);
//! Nhom ngachluong
Route::get('/nhomngach', [NhomngachController::class, 'index']);
Route::post('/nhomngach', [NhomngachController::class, 'store']);
Route::get('/nhomngach/{id}', [NhomngachController::class, 'show']);
Route::put('/nhomngach/{id}/edit', [NhomngachController::class, 'update']);
Route::delete('/nhomngach/{id}/delete', [NhomngachController::class, 'destroy']);
// protected Routes

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function(){
    //user
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/loggeduser', [UserController::class, 'logged_user']);
    Route::post('/changepassword', [UserController::class, 'change_password']);
});
