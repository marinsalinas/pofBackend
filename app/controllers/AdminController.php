<?php

class AdminController extends \BaseController
{

    public function index()
    {

        $admins = Adminusr::all();

        return View::make('admins/index', ['admins' => $admins]);

    }


    public function  edit($username)
    {

        $admin = Adminusr::whereUsername($username)->first();

        $admins = Adminusr::all();

        return View::make('admins.edicion', ['admin' => $admin], ['admins' => $admins]);
    }

    public function update($id)
    {

        $validacion = Validator::make(Input::all(), [

            'username' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $admin = Adminusr::find($id); // esta es la diferencia a almetodo store!
        $admin->username = Input::get('username');
        $admin->password = Hash::make(Input::get('password'));
        $admin->fullname = Input::get('fullname');
        $admin->email = Input::get('email');
        $admin->phone = Input::get('phone');
        $admin->save();


        return Redirect::to('admins');

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

    public function destroy($id)
    {

        $admin = Adminusr::find($id);

        $admin->delete();

        return Redirect::route('admins.index');

    }
}