<?php

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


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'profile']);
Route::middleware('auth:sanctum')->put('/profile/update', [AuthController::class, 'updateProfile']);

// Admin routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/users/unapproved', [AdminController::class, 'getUnapprovedUsers']);
    Route::put('/admin/users/approve/{id}', [AdminController::class, 'approveUser']);
    Route::get('/admin/users', [AdminController::class, 'getUsers']);
});
