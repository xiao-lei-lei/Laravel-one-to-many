<?php

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

Route::resource("posts","PostController");
Route::get("posts/{id}/comment","PostController@createComment");
Route::post("posts/{id}/comment","PostController@storeComment");
Route::get("comment/{id}/edit","CommentController@edit");
Route::put("/comment/{id}","CommentController@update");
Route::delete("/comment/{id}","CommentController@destroy");

