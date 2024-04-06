<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ImageController::class,'showImages'])->name('img');
Route::post('/like-avatar/{userId}', [App\Http\Controllers\ImageController::class,'likeAvatar'])->name('like');
Route::get('/message',[App\Http\Controllers\ImageController::class,'userMessage'])->name('messsage');
Route::post('save-avatar', [App\Http\Controllers\AvatarController::class,'saveAvatar'])->name('saveAvatar');
Route::get('/gallery', [App\Http\Controllers\GalleryController::class,'allShow'])->name('all');
Route::get('/like-sort', [App\Http\Controllers\ImageController::class,'sortLike'])->name('sort');





Route::get('/redirect-if-not-authenticated', [App\Http\Controllers\ImageController::class,'redirectToHomeOrRegister'])->name('redirect');
// Route::get('/check-authenticated', [App\Http\Controllers\ImageController::class,'checkAuthenticated'])->name('check');

