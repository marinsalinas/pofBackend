<?php


class PasswordController extends \BaseController
{
    function __construct()
    {
        //Con esto le digo que no le aplique el filtro a la funcion store.
        $this->beforeFilter('auth.token', array('only' => array('destroy')));
        // ...
    }

    //Crea la Session y regresa informacion del Usuario
    public function  store()
    {

        if (Auth::once(Input::only('username', 'password'))) {
            $user = User::whereUsername(Input::get('username'))->first();
            $user->api_token = hash('sha256', Str::random(10), false);
            $user->save();
            $user->address;
            return Response::json(array('error'=>false, 'user'=>$user), 200);
        }
        return Response::json(array('error'=>true, 'message'=>'Datos Invalidos'), 401);
    }

    //Simplemente Destruye la sesion.
    public function destroy(){
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        Auth::logout();
        return Response::json(array('error'=>false, 'message'=>'Session Cerrada'), 200);
    }
}