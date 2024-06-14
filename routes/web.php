<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog\PostController;
use App\Http\Controllers\blog\CommentController;
use App\Http\Controllers\blog\ProfileController;
use App\Livewire\HomeLivewire;

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
Route::get('/single/{slug}/Post',[PostController::class,'showPost'])->name('showPost');
Route::get('/profile/{slug_user}',[ProfileController::class,'show_profile'])->name('show_profile');
Route::get('/chat',[ProfileController::class,'chat'])->name('chat');


Route::group(['middleware'=>'auth'],function(){
    Route::post('/store/post',[PostController::class,'storePost'])->name('storePost');
    Route::post('/store_comment',[CommentController::class,'store'])->name('store_comment');
    Route::get('/your_profile',[ProfileController::class,'show_your_profile'])->name('your_profile');
    Route::get('/edit/your_profile',[ProfileController::class,'edit_your_profile'])->name('edit_your_profile');
    Route::post('edit/your_profile',[ProfileController::class,'store_profile'])->name('store_profile');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
