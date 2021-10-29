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

Route::post('/handleLike', [App\http\Controllers\DetailsController::class, 'toggleLike'])->middleware('auth');

Route::get('/new_post', [App\http\Controllers\PostController::class, 'index'])->middleware('auth');

Route::post('/finished_post', [App\http\Controllers\PostController::class, 'savePost']);

Route::get('/manage_posts', [App\http\Controllers\ManagePostsController::class, 'index'])->middleware('auth');

Route::post('/handleActive', [App\http\Controllers\ManagePostsController::class, 'visibility'])->middleware('auth');

Route::get('/delete/{id}', [App\http\Controllers\DeleteController::class, 'index'])->middleware('auth');

Route::get('/modify/{id}', [App\http\Controllers\UpdateController::class, 'index'])->middleware('auth');

Route::post('/finished_update_post/{id}', [App\http\Controllers\UpdateController::class, 'update'])->middleware('auth');

Route::get('/add_tags', [App\http\Controllers\AddTagController::class, 'index'])->middleware('auth');

Route::post('/save_tag', [App\http\Controllers\AddTagController::class, 'saveTag'])->middleware('auth');

Route::get('/filter', [App\http\Controllers\FilterController::class, 'index']);

Route::post('/filterresults', [App\http\Controllers\FilterController::class, 'getResults']);
