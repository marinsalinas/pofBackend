<?php

class UsersController extends \BaseController
{

    public function index()
    {

        //$user = DB::table('user')->where('user','=','oscar')->get();
        //return $user;
        // $user = new User;
        // $user-> user =  'juan';
        // $user->password='acosta';
        //$user-> save();
        //return User::all();

        $users = User::all();

        return View::make('users/index', ['users' => $users]);

    }


    public function  show($username)
    {
        $user = User::whereUsername($username)->first();

        return View::make('users.detalle', ['user' => $user]);
    }

    public function create()
    {

        return View::make('users.create');
    }


    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        $user = new User;
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user->save();

        return Redirect::route('users.index');

    }

}