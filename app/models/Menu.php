<?php

class Menu extends Eloquent {

    protected $table = 'menus';

    protected $fillable = array('product','price','description','restaurant_id');
    protected $hidden = array('deleted_at');

    public function restaurant(){
        return $this->belongsTo('Restaurant', 'restaurant_id');
    }

}