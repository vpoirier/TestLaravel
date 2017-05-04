<?php

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home_blog', function () {
    return view('home_blog');
})->middleware('auth');

Route::get('/create', function () {
    return view('createpost');
});

Route::get('/visualize', function () {
    return view('visualize');
});

Route::get('/editpost', function () {
    return view('editpost');
});

Route::post('/posts', 'PostController@create');
Route::delete('/delete/{post}', 'PostController@delete');
Route::get('/seeposts', 'PostController@getAllPosts');
Route::post('/addmark', 'MarkController@addMark');
Route::get('/posts/{post}/edit', 'PostController@showPostToEdit');
Route::get('/edit/{post}', 'PostController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index');
