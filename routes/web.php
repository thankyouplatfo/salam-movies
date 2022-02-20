<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ViewController;
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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::redirect('/', '/admin/dashboard', 301);

    Route::get('/', function() {
        return redirect()->route('admin.categories');
    })->name('dashboard');

    Route::group(['prefix' => 'categories'], function() { 
        Route::get('/', [CategoryController::class,'index'])->name('admin.categories');
        Route::get('create', [CategoryController::class,'create'])->name('admin.categories.create');
        Route::post('store', [CategoryController::class,'store'])->name('admin.categories.store');
       
        Route::get('edit/{category}', [CategoryController::class,'edit'])->name('admin.categories.edit');
        Route::post('update/{category}', [CategoryController::class,'update'])->name('admin.categories.update');
        Route::post('destroy/{category}', [CategoryController::class,'destroy'])->name('admin.categories.destroy');
        //Route::get('blablabla',[CategoryController::class,'blablabla'])->name('admin.categories.blablabla');
    });

    Route::group(['prefix' => 'movies'], function() { 
        Route::get('/', [MovieController::class,'index'])->name('admin.movies');
        Route::get('create', [MovieController::class,'create'])->name('admin.movies.create');
        Route::post('/store', [MovieController::class,'store'])->name('admin.movies.store');
        Route::get('edit/{movie}', [MovieController::class,'edit'])->name('admin.movies.edit');
        Route::post('update/{movie}', [MovieController::class,'update'])->name('admin.movies.update');
        Route::post('destroy/{movie}', [MovieController::class,'destroy'])->name('admin.movies.destroy');
    });
});



//Route::resource('Category', CategoryController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [ViewController::class,'home'])->name('home');
Route::get('category/{category}', [ViewController::class,'category'])->name('category');
