<?php

class RestaurantController extends BaseController
{

    public function index()
    {
        /*$restaurant = new Restaurant;
        $restaurant->name='Mudos';
        $restaurant->textaddress='San Pedro';
        $restaurant->onlycash=1;
        $restaurant->type='Mexicano';
        $restaurant->description='El mejor de toda Lindavista';
        $restaurant->save();*/

        $restaurants = Restaurant::all();
        $users = User::all();


        return View::make('restaurant/index', ['restaurants' => $restaurants],['users' => $users]);

    }

    public function create()
    {

        $users = User::all();


        return View::make('restaurant.create',['users' => $users]);

    }

    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'name' => 'required',
            'textaddress' => 'required',
            'onlycash' => 'required',
            'type' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        $restaurant = new Restaurant;
        $restaurant->name = Input::get('name');
        $restaurant->textaddress = Input::get('textaddress');
        $restaurant->onlycash = Input::get('onlycash');
        $restaurant->type=Input::get('type');
        $restaurant->description= Input::get('description');
        $restaurant->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        $restaurant->save();

        return Redirect::route('restaurant.index');

    }

    public function  show($name)
    {
        $restaurant = Restaurant::whereName($name)->first();

        $users = User::all();


        return View::make('restaurant.detalle', ['restaurant' => $restaurant],['users' => $users]);

        //return $name;
    }
}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 29/10/14
 * Time: 11:54
 */ 