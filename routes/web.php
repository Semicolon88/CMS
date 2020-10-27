<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\pageController;


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

Route::get('/',[WebsiteController::class,'index']);
Route::get('category/{slug}',[WebsiteController::class,'category']);
Route::get('post/{slug}',[WebsiteController::class,'post']);
Route::get('page/{slug}',[WebsiteController::class,'page']);
Route::get('contact',[WebsiteController::class,'contact']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::resource('categories',CategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('pages',PageController::class);
    Route::resource('galleries',GalleryController::class);
});


