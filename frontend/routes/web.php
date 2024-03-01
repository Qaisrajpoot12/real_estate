<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
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




Route::get('/login', [AuthContoller::class, 'login'])->name('login')->middleware('tokenverify');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::post('/login-submit', [AuthContoller::class, 'login_submit'])->name('login_submit');

Route::get('/register', [AuthContoller::class, 'register'])->name('register');
Route::post('/register-submit', [AuthContoller::class, 'register_submit'])->name('register_submit');

Route::get('/logout', [AuthContoller::class, 'logout'])->name('logout');

Route::middleware(['checkAuth'])->group(function () {

    Route::get('/home', [UserController::class, 'home'])->name('home');


    Route::get('/edit-profile', [UserController::class, 'editprofile'])->name('editprofile');
    Route::post('/changepassword', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/edit-profile-submit', [UserController::class, 'editProfileSubmit'])->name('editProfileSubmit');


    Route::get('/edit-list/{id}', [ListsController::class, 'edit'])->name('editlist');
    Route::get('/create-listing', [ListsController::class, 'createlisting'])->name('createlisting');
    Route::post('/create-listing-submit', [ListsController::class, 'createlistingsubmit'])->name('createlistingsubmit');
    Route::post('/edit-list-submit/{id}', [ListsController::class, 'editListSubmit'])->name('editListSubmit');
    Route::get('/delete-list/{id}', [ListsController::class, 'delete'])->name('deletelist');
    // Route::get('/delete-list/{id}/{img_id}', [ListsController::class, 'List_Img_delete'])->name('List_Img_delete');
    Route::get('/featured-listing', [ListsController::class, 'featured'])->name('featured');
    Route::get('/list/{id}', [ListsController::class, 'listdetail'])->name('listdetail');
    Route::get('/logs', [LogsController::class, 'getlogs'])->name('getlogs');
});
