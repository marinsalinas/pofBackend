<?php


class PasswordController extends \BaseController
{

    public function index()

    {


    }


    public function  show($username, $password)
    {

        $error = array('message' => "", 'errNo'=> "");
        /*if (Auth::attempt(['username' => $username, 'password' => $password])) {

            $user = DB::table('User')->where('username', '=', $username)->get();

            return Response::json(array('error'=>$error, 'user'=>$user[0]), 200);

        }*/

        Response::json(array('error'=>$error, 'user'=>Auth::user()), 200);
        //$error['message'] = 'Datos Invalidos';
        //$error['errNo'] = 401;
        //return Response::json(array('error'=>$error, 'user'=>''), 401);
    }

    public function create()
    {

        return View::make('users.create');
    }


    public function store()
    {

    }
}