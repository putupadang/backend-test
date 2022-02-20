<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'AuthController@login');
Route::get('get-posts', 'PostController@getPost');
Route::get('get-post-by-id/{id}', 'PostController@getPostById');
Route::get('get-post-likes/{id}', 'PostController@getPostLikes');

Route::get('test', 'PostController@deletePostByDays');

Route::group(['middleware' => ['auth:api']], function () {
  Route::post('add-post', 'PostController@addPost');
  Route::post('like-post', 'PostController@likePost');
  Route::post('delete-post', 'PostController@deletePost');
});
