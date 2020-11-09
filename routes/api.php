<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TagController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('posts','PagesController@home');
// Route::get('blog/{post}','PostController@show');
// Route::get('categories/{category}','CategoryController@show');
// Route::get('tags/{tag}','TagController@show');

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show']);
Route::get('categories/{category}', [CategoryController::class, 'show']);
Route::get('tags/{tag}', [TagController::class, 'show']);