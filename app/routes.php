<?php

Route::get('/', function () {
    return View::make('hello');
});

/*Route::get('admin', function () {

    return View::make('users.index');
})->before('auth');*/



//Sessions Controller
Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::post('store', 'SessionsController@store');

//users Controler
Route::group(array('before' => 'auth'), function () {
    Route::resource('users', 'UsersController');
    Route::resource('restaurant', 'RestaurantController');

});


//Rutas Para API RESTFUL
Route::group(array('prefix' => 'api/v1'), function () {
    Route::post('login', 'PasswordController@store');
    Route::get('logout', 'PasswordController@destroy');


    //El before => auth.basic se encuentra en el contructor de la clase UserapiController
    Route::resource('users','UsersapiController');
});

