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

        return View::make('devices.create',['users' => $users],['restaurants' => $restaurants]);

    }

    public function edit($comida)
    {

        $users = User::all();

        $product = Menu::whereProduct($comida)->first();

        return View::make('devices.edicion',['product' => $product],['users' => $users]);

    }

    public function update($id)
    {
        $validacion = Validator::make(Input::all(), [

            'restaurant_id' => 'required',
            'imei' => 'required',
            'name' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'description' => 'required'

        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $device = Devices::find($id);
        $device->restaurant_id=Input::get('restaurant_id');
        $device->imei=Input::get('imei');
        $device->name=Input::get('name');
        $device->status=Input::get('status');
        $device->phone=Input::get('phone');
        $device->description=Input::get('description');
        $device->save();

        return Redirect::route('devices.index');
    }

    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'restaurant_id' => 'required',
            'imei' => 'required',
            'name' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'description' => 'required'

        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $device = new Devices();
        $device->restaurant_id=Input::get('restaurant_id');
        $device->imei=Input::get('imei');
        $device->name=Input::get('name');
        $device->status=Input::get('status');
        $device->phone=Input::get('phone');
        $device->description=Input::get('description');
        $device->save();

        return Redirect::route('devices.index');

    }

    public function destroy($id)
    {

        $device =  Devices::find($id);

        $device->delete();

        return Redirect::route('devices.index');

    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 06/11/14
 * Time: 9:47
 */