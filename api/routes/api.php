<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/res', [AuthController::class, 'res'])->name('res');



Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/user', [UserController::class, 'userDetail'])->name('userDetail');
    Route::post('/profileEdit', [UserController::class, 'profileEdit'])->name('profileEdit');
    Route::post('/changepassword', [UserController::class, 'changePassword'])->name('changePassword');


    // ..............list..............
    Route::middleware(['logActivity'])->group(function () {

        Route::post('/list/create', [ListController::class, 'create']);
        Route::post('/list/update', [ListController::class, 'updatelist']);
        Route::post('/list/delete', [ListController::class, 'delete']);
    });

    Route::post('/list/get', [ListController::class, 'get']);
    Route::post('/logs', [LogsController::class, 'getLogs']);
});
