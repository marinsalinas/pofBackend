<?php


class PasswordController extends \BaseController
{

    public function index()

    {


    }


    public function  show($username, $password)
    {

        if (Auth::attempt(['username' => $username, 'password' => $password])) {

            $user = DB::table('User')->where('username', '=', $username)->get();
            return $user;

        }
        return "Datos incorrectos";
    }

    public function create()
    {

        return View::make('users.create');
    }


    public function store()
    {

    }
}