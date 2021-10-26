<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/content', [App\http\Controllers\ContentController::class, 'index']);

Route::get('/details/{id}', [App\http\Controllers\DetailsController::class, 'index']);

Route::view('/new_post', 'newPost')->middleware('auth');

Route::post('/finished_post', [App\http\Controllers\PostController::class, 'index']);

Route::get('/manage_posts', [App\http\Controllers\ManagePostsController::class, 'index']);

Route::get('/delete/{id}', [App\http\Controllers\DeleteController::class, 'index']);

Route::get('/modify/{id}', [App\http\Controllers\UpdateController::class, 'index']);

Route::post('/finished_update_post/{id}', [App\http\Controllers\UpdateController::class, 'update']);
