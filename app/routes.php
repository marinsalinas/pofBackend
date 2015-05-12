<?php

Route::get('/', function () {
    return View::make('index/index');
});

Route::get('test', function () {

    //$restaurant = Restaurant::all();

    //return View::make('test',['restaurant' => $restaurant]);

    /*$admin = new Adminusr();
    $admin->username='oscar';
    $admin->password=Hash::make('kirby94');
    $admin->phone='8114999160';
    $admin->email='oscar.luis.garcia94@gmail.com';
    $admin->fullname='oscar luis garcia ruiz fernandez';
    $admin->save();*/

});

//Sessions Controller
Route::get('login', 'SessionsController@create');

Route::get('logout', 'SessionsController@destroy');

Route::post('store', 'SessionsController@store');

//users Controler
Route::group(array('before' => 'auth'), function () {
    // usuarios para despues -> Route::resource('users', 'UsersController');
    Route::resource('restaurant', 'RestaurantController');
    Route::resource('menu', 'MenuController');
    Route::resource('devices', 'DevicesController');
    Route::get('devices/position/{id}', 'DevicesController@position');
    Route::resource('admins', 'AdminController');
    Route::resource('orders', 'OrdersController');
    // trabajare pormientras en esta ruta para el nuevo diseño
    Route::resource('dashboard','DashBoardController');
});

    //Rutas Para API RESTFUL
    Route::group(array('prefix' => 'api/v1'), function () {
    Route::post('login', 'PasswordController@store');
    Route::get('logout', 'PasswordController@destroy');

    Route::resource('users','UsersapiController');
    Route::put('users/{users}/password', 'UsersapiController@password');
    Route::resource('addressbook', 'AddressAPIController');

    Route::resource('restaurants', 'RestaurantAPIController');
    Route::resource('orders', 'OrdersAPIController');
    Route::post('prediction', 'OrdersAPIController@prediction');
    Route::resource('device', 'DevicesAPIController');
    Route::resource('shipping', 'ShippingController');



    /*   Event::listen('illuminate.query', function($sql){
            echo $sql."------";
        });*/

});

