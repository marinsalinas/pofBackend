<?php

class MenuController extends BaseController
{

    public function index()
    {
/*      $menu = new Menu;
        $menu->restaurant_id=2;
        $menu->product='tacos';
        $menu->price='50';
        $menu->description='al pastor :3';
        $menu->save();*/

        $admins = Adminusr::all();

        $menus = Menu::all();

        return View::make('menu/index', ['menus' => $menus],['admins' => $admins]);

    }

    public function create()
    {

        $admins = Adminusr::all();

        $restaurants = Restaurant::all();

        return View::make('menu.create',['admins' => $admins],['restaurants' => $restaurants]);

    }

    public function edit($comida)
    {

        $admins = Adminusr::all();

        $product = Menu::whereProduct($comida)->first();

        return View::make('menu.edicion',['product' => $product],['admins' => $admins]);

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