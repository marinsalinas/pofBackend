<?php

class DevicesController extends BaseController
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

        $devices = Devices::all();

        return View::make('devices/index', ['devices' => $devices],['users' => $users]);

    }

    public function create()
    {

        $users = User::all();

        $restaurants = Restaurant::all();

        return View::make('menu.create',['users' => $users],['restaurants' => $restaurants]);

    }

    public function edit($comida)
    {

        $users = User::all();

        $product = Menu::whereProduct($comida)->first();

        return View::make('menu.edicion',['product' => $product],['users' => $users]);

    }

    public function update($id)
    {
        $validacion = Validator::make(Input::all(), [

            'restaurant_id' => 'required',
            'product' => 'required',
            'price' => 'required',
            'description' => 'required'

        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $menu = Menu::find($id);
        $menu->restaurant_id=Input::get('restaurant_id');
        $menu->product=Input::get('product');
        $menu->price=Input::get('price');
        $menu->description=Input::get('description');
        $menu->save();

        return Redirect::route('menu.index');
    }

    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'restaurant_id' => 'required',
            'product' => 'required',
            'price' => 'required',
            'description' => 'required'

        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $menu = new Menu;
        $menu->restaurant_id=Input::get('restaurant_id');
        $menu->product=Input::get('product');
        $menu->price=Input::get('price');
        $menu->description=Input::get('description');
        $menu->save();

        return Redirect::route('menu.index');

    }

    public function destroy($id)
    {

        $menu = Menu::find($id);

        $menu->delete();

        return Redirect::route('menu.index');

    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 06/11/14
 * Time: 9:47
 */