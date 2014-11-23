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
        $file = Input::file("photo");
        $dataUpload = array(
            'name' => Input::get('username'),
            'textaddress' => Input::get('textaddress'),
            'onlycash' => Input::get('onlycash'),
            'type' => Input::get('type'),
            'description' => Input::get('description'),
            'latitude' => Input::get('latitude'),
            'longitude' => Input::get('longitude'),
            "photo" => $file
        );

        $validacion = Validator::make(Input::all(), [
            'name' => 'required',
            'textaddress' => 'required',
            'onlycash' => 'required',
            'type' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',

        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }
        //$newFileName = str_replace(' ', '',(Input::get("name")."_".microtime().".".Input::file("photo")->getClientOriginalExtension()));
        $restaurant = Restaurant::find($id);
        $restaurant->name = Input::get('name');
        $restaurant->textaddress = Input::get('textaddress');
        $restaurant->onlycash = Input::get('onlycash');
        $restaurant->type=Input::get('type');
        $restaurant->description= Input::get('description');
        $restaurant->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));

        $newFile = NULL;
        $removeImg = NULL;
        if($file != NULL){
            $newFile = str_replace(' ', '',(Input::get("name")."_".microtime().".".Input::file("photo")->getClientOriginalExtension()));
            $removeImg = $restaurant->image_url;
            $restaurant->image_url = $newFile;
        }




        if($restaurant->save() && $file != null){
            File::delete("uploads/".$removeImg);
            $file->move("uploads",$newFile);
        }

        return Redirect::route('restaurant.index');
    }

    public function store()
    {
        $file = Input::file("photo");
        $dataUpload = array(
            'name' => Input::get('username'),
            'textaddress' => Input::get('textaddress'),
            'onlycash' => Input::get('onlycash'),
            'type' => Input::get('type'),
            'description' => Input::get('description'),
            'latitude' => Input::get('latitude'),
            'longitude' => Input::get('longitude'),
            "photo" => $file
        );

        $validacion = Validator::make(Input::all(), [
            'name' => 'required',
            'textaddress' => 'required',
            'onlycash' => 'required',
            'type' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'photo' => 'required'
        ]);

        if ($validacion->fails()) {
            //dd($validacion->messages());
            return Redirect::back()->withInput()->withErrors($validacion);
        }


        $newFileName = str_replace(' ', '', trim(Input::get("name")."_".microtime().".".Input::file("photo")->getClientOriginalExtension()));
        $restaurant = new Restaurant;
        $restaurant->name = Input::get('name');
        $restaurant->textaddress = Input::get('textaddress');
        $restaurant->onlycash = Input::get('onlycash');
        $restaurant->type=Input::get('type');
        $restaurant->description= Input::get('description');
        $restaurant->location = array('lat'=>Input::get('latitude'), 'lng'=>Input::get('longitude'));
        $restaurant->image_url = $newFileName;
        if($restaurant->save()){
            $file->move("uploads",$newFileName);
        }



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