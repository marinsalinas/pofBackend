<?php

class RestaurantController extends BaseController
{

    public function index()
    {

        /*$restaurant = new Restaurant;
        $restaurant->name='Mudos';
        $restaurant->textaddress='San Pedro';
        $restaurant->onlycash=1;
        $restaurant->type='Mexicano';
        $restaurant->description='El mejor de toda Lindavista';
        $restaurant->save();*/

        $restaurants = Restaurant::all();

        $admins = Adminusr::all();

        if(Request::ajax()){
            $response =  Response::json(array('error'=>false, 'restaurants'=>$restaurants), 200);
            $response->header('Cache-Control', 'no-cache, max-age=0, must-revalidate, no-store');
            return $response;
       }

        $response = Response::make(View::make('restaurant/index', ['restaurants' => $restaurants],['admins' => $admins, 'view'=>'restaurant']));
        $response->header('Cache-Control', 'no-cache, max-age=0, must-revalidate, no-store');
        return $response;

    }

    public function show($name){

        $restaurant = Restaurant::whereName($name)->first();

        $admins = Adminusr::all();

        return View::make('restaurant.detalle', ['restaurant' => $restaurant], ['admins' => $admins]);
    }

    public function create()
    {

        $admins = Adminusr::all();


        return View::make('restaurant.create',['admins' => $admins]);

    }

    public function  edit($name)
    {

        $restaurant = Restaurant::whereName($name)->first();

        $admins = Adminusr::all();

        return View::make('restaurant.edicion', ['restaurant' => $restaurant], ['admins' => $admins]);
    }

    public function update($id)
    {
        $validacion = Validator::make(Input::all(), [

            'name' => 'required',
            'textaddress' => 'required',
            'onlycash' => 'required',
            'type' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        $restaurant = Restaurant::find($id);
        $restaurant->name = Input::get('name');
        $restaurant->textaddress = Input::get('textaddress');
        $restaurant->onlycash = Input::get('onlycash');
        $restaurant->type=Input::get('type');
        $restaurant->description= Input::get('description');
        $restaurant->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        $restaurant->save();

        return Redirect::route('restaurant.index');
    }

    public function store()
    {
        $validacion = Validator::make(Input::all(), [

            'name' => 'required',
            'textaddress' => 'required',
            'onlycash' => 'required',
            'type' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'


        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        $restaurant = new Restaurant;
        $restaurant->name = Input::get('name');
        $restaurant->textaddress = Input::get('textaddress');
        $restaurant->onlycash = Input::get('onlycash');
        $restaurant->type=Input::get('type');
        $restaurant->description= Input::get('description');
        $restaurant->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        $restaurant->save();

        return Redirect::route('restaurant.index');

    }

    public function destroy($id)
    {

        $restaurant = Restaurant::find($id);

        $restaurant->delete();

        return Redirect::route('restaurant.index');

    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 29/10/14
 * Time: 11:54
 */ 