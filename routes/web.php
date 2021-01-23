<?php

use Illuminate\Support\Facades\Route;

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/');
});

Route::get('/', 'PostController@index')->name('main');
Route::view('contacts', 'pages.contacts');
Route::view('about', 'pages.about');

// Posts
Route::prefix('posts')->group(function () {
    Route::get('/', 'PostController@index')->name('posts.index');
    Route::get('/create', 'PostController@create')->name('posts.create');
    Route::get('/{post}', 'PostController@show')->name('posts.show');
    Route::post('/', 'PostController@store')->name('posts.store');
    Route::get('/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('/{post}', 'PostController@update')->name('posts.update');
    Route::delete('/{post}', 'PostController@destroy')->name('posts.destroy');
});

// Comments
Route::prefix('comment')->group(function () {
    Route::post('/', 'CommentController@store');
    Route::delete('/{comment}', 'CommentController@destroy')->name('comments.destroy');
});
Route::put('comment/{comment}',  'CommentController@update');

// Like/Dislike System
Route::prefix('posts/{post}')->group(function () {
    // Likes
    Route::post('/like', 'LikeController@store');
    Route::delete('/like', 'LikeController@destroy');
    // Dislikes
    Route::post('/dislike', 'DislikeController@store');
    Route::delete('/dislike', 'DislikeController@destroy');
});

// Users
Route::prefix('users')->group(function () {
    Route::get('/', 'UserRoleController@index')->name('users.index');
    Route::get('/{user}', 'UserController@index')->name('users.posts');
    Route::put('/{user}', 'UserRoleController@update')->name('users.update');
    Route::delete('/{user}','UserController@destroy')->name('users.destroy');

});
