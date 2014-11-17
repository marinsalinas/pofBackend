<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 17/11/2014
 * Time: 02:03 PM
 */

class Item extends Eloquent {

    protected $table = 'items';


    function order(){
        $this->belongsTo('Order', 'order_id');
    }


} 