<?php

class MenuController extends BaseController
{

    public function index()
    {
/*        $menu = new Menu;
        $menu->restaurant_id=2;
        $menu->product='tacos';
        $menu->price='50';
        $menu->description='al pastor :3';
        $menu->save();*/

        $users = User::all();

        $menus = Menu::all();

        return View::make('menu/index', ['menus' => $menus],['users' => $users]);

    }

    public function create()
    {

        $users = User::all();


        return View::make('restaurant.create',['users' => $users]);

    }

    public function  edit($comida)
    {

        $product = Menu::whereProduct($comida)->first();

        $users = User::all();

        return View::make('menu.edicion', ['product' => $product],['users' => $users]);

    }

    public function update($id)
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
        $restaurant = Restaurant::find($id);
        $restaurant->name = Input::get('name');
        $restaurant->textaddress = Input::get('textaddress');
        $restaurant->onlycash = Input::get('onlycash');
        $restaurant->type=Input::get('type');
        $restaurant->description= Input::get('description');
        $restaurant->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        $restaurant->save();

        return Redirect::route('restaurant.index');
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

    public function destroy($id)
    {

        $restaurant = Restaurant::find($id);

        $restaurant->delete();

        return Redirect::route('restaurant.index');

    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 06/11/14
 * Time: 9:47
 */