<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 28/10/2014
 * Time: 07:07 PM
 */

class Address extends Eloquent{

    protected $table = 'address';


    protected $guarded = array('id');

    protected $hidden = array('location');


    public function user(){
        return $this->belongsTo('User', 'user_id');
    }


}