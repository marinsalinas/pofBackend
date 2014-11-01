<?php

class UsersapiController extends \BaseController{

    function __construct() {
        //Con esto le digo que no le aplique el filtro a la funcion store.
        $this->beforeFilter('auth.token', array('except' => array('store')));
        // ...
    }


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

    public function update($id){
        $validador = Validator::make(Input::all(),[
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'fullname' => 'required',
        ]);

        if($validador->fails()){
            return Response::json(array('error'=>true, 'message'=> 'Campos Requeridos'), 400);
        }

        $user = Auth::user();

        if($user->id != $id){
            return Response::json(array('error'=>true, 'message'=> 'Operacion No permitida'), 400);
        }

        $userTemp = User::where('username', '=', Input::get('username'))->first();

        if($userTemp != null &&($user->id != $userTemp->id)){
            return Response::json(array('error'=>true, 'message'=> 'El nombre de usuario ya existe'), 400);
        }

        $userTemp = User::where('email', '=', Input::get('email'))->first();

        if($userTemp != null &&($user->id != $userTemp->id)){
            return Response::json(array('error'=>true, 'message'=> 'El correo electronico ya existe'), 400);
        }

        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        $user->fullname = Input::get('fullname');
        $user->phone = Input::get('phone');
        $user->save();

        return Response::json(array('error'=>false, 'user'=>$user), 200);
    }

    public function destroy(){
        return Response::json(array('error'=>true, 'message'=>'Operacion No Permitida'), 400);
    }



}