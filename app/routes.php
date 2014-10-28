<?php

Route::get('/', function () {
    return View::make('hello');
});

/*Route::get('admin', function () {

    return View::make('users.index');
})->before('auth');*/

Route::get('web', 'WebController@log');

Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::post('store', 'SessionsController@store');




Route::group(array('prefix' => 'api/v1','before' => 'auth.basic'), function () {
    Route::resource('users.password', 'PasswordController');
});

Route::group(array('before' => 'auth'), function () {
    Route::resource('users', 'UsersController');
});
