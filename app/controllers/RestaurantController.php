<?php

class RestaurantController extends BaseController
{

    public function index()
    {
        $restaurant = new Restaurant;
        $restaurant->name='Mudos';
        $restaurant->textaddress='San Pedro';
        $restaurant->onlycash=1;
        $restaurant->type='Mexicano';
        $restaurant->description='El mejor de toda Lindavista';
        $restaurant->save();

        return Restaurant::all();
    }


    public function  show()
    {
    }

    public function create()
    {
        $restaurant = Restaurant::all();
        return $restaurant;

    }


    public function store()
    {
    }


}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz
 * Date: 29/10/14
 * Time: 11:54
 */ 