<?php

class Devices extends Eloquent {

    protected $table = 'devices';

    protected $fillable = array('imei','restaurant_id','name','phone','description','status');

    protected $hidden = array('device_id');

    public function  order(){
        return $this->hasMany('Orders', 'order_id');
    }

    public function last_report(){
        return $this->hasOne('LastReport', 'idDevice', 'imei');
    }


}