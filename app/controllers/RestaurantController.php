<?php

class RestaurantController extends BaseController
{

    public function index()
    {
        $restaurant = new Restaurant;
        $restaurant->restName='Mudos';


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