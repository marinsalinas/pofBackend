<?php

class WebController extends BaseController
{


    public function log()
    {

        // return Response::json(array('name' => 'Steve', 'state' => 'CA'));
        // return Response::json(array('name' => 'Steve', 'state' => 'CA'));
            return User::all()->toJson();


    }


}
