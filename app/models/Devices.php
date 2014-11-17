<?php

class Devices extends Eloquent {

    protected $table = 'devices';

    protected $fillable = array('imei','restaurant_id','name','phone','description','status');


}