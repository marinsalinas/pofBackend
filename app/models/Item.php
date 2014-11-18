<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 17/11/2014
 * Time: 02:03 PM
 */

class Item extends Eloquent {

    protected $table = 'items';
    public $timestamps = false;

    function order(){
        return $this->belongsTo('Order', 'order_id');
    }

    function menu(){
        return $this->belongsTo('Menu', 'menu_id');
    }


} 