<?php

class UsersapiController extends \BaseController{
    public function index(){
        return Response::json(array('error' => false, 'user'=> Auth::user()), 200);
    }

    public function store(){
        $validacion = Validator::make(Input::all(), [

            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fullname' => 'required',
        ]);

        if ($validacion->fails()) {

            return Response::json(array('error'=>true, 'message' => 'Campos Requeridos'), 400);
        }
        $user = new User;
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        $user->fullname = Input::get('fullname');
        $user->phone = Input::get('phone');
        $user->save();

        return Response::json(array('error'=>false, 'user'=>$user), 200);
    }


}