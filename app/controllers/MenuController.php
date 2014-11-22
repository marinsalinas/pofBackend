<?php

class MenuController extends BaseController
{

    public function index()
    {
        $admins = Adminusr::all();
        $menus = Menu::all();
        return View::make('menu/index', ['menus' => $menus],['admins' => $admins]);
    }

    public function create()
    {

        $admins = Adminusr::all();

        $restaurants = Restaurant::all();
        $foods = Food::all();
        return View::make('menu.create',['admins' => $admins],['restaurants' => $restaurants, 'foods'=>$foods]);

    }

    public function edit($comida)
    {

        $admins = Adminusr::all();

        $product = Menu::whereProduct($comida)->first();
        $food = Food::all();
        return View::make('menu.edicion',['product' => $product],['admins' => $admins, 'foods'=>$food]);

    }

    public function update($id)
    {

        $validacion = Validator::make(Input::all(), [

            'restaurant_id' => 'required',
            'product' => 'required',
            'price' => 'required',
            'description' => 'required',
            'food_id'=>'required'

        ]);


        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $file = Input::file("photo");

        $menu = Menu::find($id);
        $menu->restaurant_id=Input::get('restaurant_id');
        $menu->product=Input::get('product');
        $menu->price=Input::get('price');
        $menu->description=Input::get('description');
        $menu->food_id = Input::get('food_id');
        $newFile = NULL;
        $removeImg = NULL;
        if($file != NULL){
            $newFile = str_replace(' ', '', trim(Input::get("product")."_".microtime().".".Input::file("photo")->getClientOriginalExtension()));
            $removeImg = $menu->image_url;
            $menu->image_url = $newFile;

        }

        if($menu->save() && $file != null){
            File::delete("uploads/".$removeImg);
            $file->move("uploads",$newFile);
        }

        return Redirect::route('menu.index');
    }

    public function store()
    {
        $file = Input::file("photo");



        $validacion = Validator::make(Input::all(), [
            'restaurant_id' => 'required',
            'product' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'food_id'=>'required'
        ]);

        if ($validacion->fails()) {

            return Redirect::back()->withInput()->withErrors($validacion);
        }

        $menu = new Menu;
        $newFileName = str_replace(' ', '', trim(Input::get("name")."_".microtime().".".Input::file("photo")->getClientOriginalExtension()));
        $menu->restaurant_id=Input::get('restaurant_id');
        $menu->food_id = Input::get('food_id');
        $menu->product=Input::get('product');
        $menu->price=Input::get('price');
        $menu->description=Input::get('description');
        $menu->image_url = $newFileName;
        if($menu->save()){
            $file->move("uploads",$newFileName);
        }
        return Redirect::route('menu.index');

    }

    public function destroy($id)
    {

        $menu = Menu::find($id);

        $menu->delete();

        return Redirect::route('menu.index');

    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 06/11/14
 * Time: 9:47
 */