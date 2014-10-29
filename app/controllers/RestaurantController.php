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

        return View::make('restaurant/index', ['restaurants' => $restaurants]);

    }

    public function create()
    {

        return View::make('restaurant.create');

    }

    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'name' => 'required',
            'textaddress' => 'required',
            'onlycash' => 'required',
            'type' => 'required',
            'description' => 'required'


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
        $restaurant->save();

        return Redirect::route('restaurant.index');

    }

    public function  show($name)
    {
        $restaurant = Restaurant::whereName($name)->first();

        return View::make('restaurant.detalle', ['restaurant' => $restaurant]);

        //return $name;
    }
}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 29/10/14
 * Time: 11:54
 */ 