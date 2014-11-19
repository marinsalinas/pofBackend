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

        $admins = Adminusr::all();

        $devices = Devices::all();

        return View::make('devices/index', ['devices' => $devices],['admins' => $admins]);

    }

    public function create()
    {

        $admins = Adminusr::all();

        $restaurants = Restaurant::all();

        return View::make('devices.create',['admins' => $admins],['restaurants' => $restaurants]);

    }

    public function edit($name)
    {

        $admins = Adminusr::all();

        $device = Devices::whereName($name)->first();

        return View::make('devices.edicion',['device' => $device],['admins' => $admins, 'view'=>'devices']);

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

    public function position($id){
        $dev= Devices::find($id);
        $dev->last_report = LastReport::where('idDevice', '=', $dev->imei)->get()->first();
        return Response::json(array('error' => false, 'last_report'=> $dev->last_report), 200);

    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 06/11/14
 * Time: 9:47
 */