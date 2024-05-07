<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog\PostController;
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


Route::get('/',[PostController::class,'home'])->name('blog');
Route::get('/create',[PostController::class,'createPost'])->name('createPost');
Route::post('/store/post',[PostController::class,'storePost'])->name('storePost');
Route::get('/singlePost/{slug}',[PostController::class,'showPost'])->name('showPost');

Route::post('/edit/post/{slug}',[PostController::class,'storePost'])->name('editPost');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
