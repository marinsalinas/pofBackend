<?php

class Menu extends Eloquent {

    protected $table = 'menus';

    protected $fillable = array('product','price','description','restaurant_id');


}