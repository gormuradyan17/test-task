<?php

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
Route::get('auth/social', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('social.login');

Route::get('oauth/{driver}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('social.callback');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');
    Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::get('/add-post', [App\Http\Controllers\PostController::class, 'create'])->name('posts.add');
    Route::delete('/files/{id}', [App\Http\Controllers\PostController::class, 'deleteFile'])->name('file.delete');
});



