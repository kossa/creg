<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'PageController@home');
Route::get('graph', 'PageController@graph');
Route::get('contact', 'PageController@contact');
Route::post('contact', 'PageController@postContact');

Route::get('users/{id}/delete', 'UserController@destroy');
Route::resource('users', 'UserController');

Route::resource('articles', 'ArticleController');
