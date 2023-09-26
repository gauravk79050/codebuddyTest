<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/register', function () {
    return view('register');
})->name('register');;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [RegisterController::class,'index']);
Route::post('/login', [LoginController::class,'index']);

Route::prefix('admin')->middleware(['admin_role'])->group(function () {
    
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::get('/categories', [AdminController::class,'categories'])->name('categories');
    Route::get('/customers', [AdminController::class,'customers'])->name('customers');
    Route::get('/addCategories', [AdminController::class,'addCategories'])->name('addCategories');
    Route::get('/login-as-user/{user}', [AdminController::class,'loginAsUser'])->name('loginAsUser');
    Route::post('/storeCategory', [AdminController::class,'storeCategory'])->name('storeCategory');

    
});
   
Route::middleware(['user_role'])->group(function () {
    
    Route::get('/user', [UserController::class,'index'])->name('user');
});

Route::fallback(function () {
    return view('404');
});


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



