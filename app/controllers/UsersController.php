<?php

class UsersController extends \BaseController
{

    public function index()
    {

        $users = User::all();

        return View::make('users/index', ['users' => $users]);

    }

    public function  show($username)
    {

        $user = User::whereUsername($username)->first();

        return View::make('users.detalle', ['user' => $user]);
    }

    public function  edit($username)
    {

        $user = User::whereUsername($username)->first();

        $users = User::all();

        return View::make('users.edicion', ['user' => $user],['users' => $users]);
    }

    public function create()
    {
        $users = User::all();


        return View::make('users/create', ['users' => $users]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return 'se ha borrado';

    }


    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'username' => 'required',
            'password' => 'required',
            'fullname'=>'required',
            'email' => 'required',
            'phone' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        $user = new User;
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->fullname = Input::get('fullname');
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user->save();

        return Redirect::route('users.index');

    }

}