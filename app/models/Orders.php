<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 16/11/2014
 * Time: 10:46 AM
 */

class Orders extends Eloquent{

    protected $table = 'orders';


    function user(){
        return $this->belongsTo('User', 'user_id');
    }

    function items(){
        return $this->hasMany('Item', 'order_id');
    }

    function  address(){
        return $this->belongsTo('Address', 'address_id');
    }

    function restaurant(){
        return $this->belongsTo('Restaurant', 'restaurant_id');
    }


}