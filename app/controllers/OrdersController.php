<?php

class OrdersController extends \BaseController
{

    public function index()
    {

        $admins = Adminusr::all();
        $orders = Orders::all();

        return View::make('orders/index', ['admins' => $admins],['orders'=>$orders]);

    }

    public function show($order){

        $order = Orders::whereId($order)->first();

        $admins = Adminusr::all();

        return View::make('orders.detalle', ['order' => $order], ['admins' => $admins]);

    }

    public function update($id)
    {

        $validacion = Validator::make(Input::all(), [

            'id_device' => 'required'

        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $order = Orders::find($id); // esta es la diferencia a almetodo store!

        if($order->status=='En Proceso'){
            $order->status='En Camino';
            $order->device_id = Input::get('id_device');

            $device = Devices::whereId(Input::get('id_device'))->first();
            $device->status = 'Activo';
            $device->save();
        }
        else{
            $order->status=Input::get('id_device');
        }

        $order->save();

        return Redirect::to('orders');

    }

    public function destroy($id)
    {

        $order = Orders::find($id);
        $order->status= 'Entregado';
        $order->save();

        $device = Devices::whereId($order->device_id)->first();
        $device->status='Inactivo';
        $device->save();

        return Redirect::route('orders.index');

    }

  /*  public function  edit($username)
    {

        $admin = Adminusr::whereUsername($username)->first();

        $admins = Adminusr::all();

        return View::make('admins.edicion', ['admin' => $admin], ['admins' => $admins]);
    }


    public function create()
    {
        $admins = Adminusr::all();


        return View::make('admins/create', ['admins' => $admins]);
    }

    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'username' => 'required',
            'password' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        $admin = new Adminusr;
        $admin->username = Input::get('username');
        $admin->password = Hash::make(Input::get('password'));
        $admin->fullname = Input::get('fullname');
        $admin->email = Input::get('email');
        $admin->phone = Input::get('phone');
        $admin->save();

        return Redirect::route('admins.index');

    }

    */
}