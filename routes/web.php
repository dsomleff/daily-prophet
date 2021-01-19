<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Posts
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('my-posts', 'PostController@index')->name('user.posts');
Route::get('posts/create', 'PostController@create')->name('posts.create');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');
Route::post('posts', 'PostController@store')->name('posts.store');
Route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit');
Route::put('posts/{post}', 'PostController@update')->name('posts.update');
Route::delete('posts/{post}', 'PostController@destroy')->name('posts.destroy');

// Comments
Route::post('comment', 'CommentController@store');
Route::delete('comment/{comment}', 'CommentController@destroy')->name('comments.destroy');

// Likes
Route::post('posts/{post}/like', 'LikeController@storeLike');
Route::post('posts/{post}/dislike', 'LikeController@storeDislike');
Route::delete('posts/{post}/like', 'LikeController@destroyLike');
Route::delete('posts/{post}/dislike', 'LikeController@destroyLike');

