<?php


// Route::get('/', 'PageController@home');

// Route::get('contact/{name?}', 'PageController@contact')->where('name', '[a-zA-Z]+');

// Route::get('calcule/{name}/{year}', 'PageController@calcul')->name('calculate-age');

Route::get('users/{id}/delete', 'UserController@destroy');
Route::resource('users', 'UserController');

Route::resource('articles', 'ArticleController');
