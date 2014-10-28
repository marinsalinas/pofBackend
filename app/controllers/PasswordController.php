<?php


class PasswordController extends \BaseController
{
    //Crea la Session y regresa informacion del Usuario
    public function  store()
    {

        if (Auth::attempt(Input::only('username', 'password'))) {
            $user = User::whereUsername(Input::get('username'))->first();
            return Response::json(array('error'=>false, 'user'=>$user), 200);
        }
        return Response::json(array('error'=>true, 'message'=>'Datos Invalidos'), 401);
    }

    //Simplemente Destruye la sesion.
    public function destroy(){
        Auth::logout();
        return Response::json(array('error'=>false, 'message'=>'Session Cerrada'), 200);
    }
}