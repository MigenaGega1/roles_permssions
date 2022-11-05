<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth']],function(){
   Route::resource('roles',RoleController::class);
    Route::get('/users',[UserController::class,'index'])->name('users.index');
//show user create form
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::post('/users',[UserController::class,'store'])->name('users.store');
//show edit form
    Route::get('users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
//update user
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::resource('products',ProductController::class);
});


