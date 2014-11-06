<?php

class Restaurant extends Eloquent
{

    protected $table = 'restaurants';

    protected $fillable = array('name','textaddress','onlycash','type','description', 'location');

    protected $append = array('location');

    protected $guarded = array('id');

    public function opendays(){
        return $this->hasMany('OpenDays', 'restaurant_id');
    }


    public function menu(){
        return $this->hasMany('Menu', 'restaurant_id');
    }

    public function getLocationAttribute(){
        $id = $this->attributes['id'];
        $wkt = DB::table($this->table)->find($id, array(DB::raw('Y(location) AS latitude, X(location) AS longitude')));
        $location = $wkt;
        return $location;
    }

    public function setLocationAttribute($value){
        $this->attributes['location'] = DB::raw("GeomFromText('POINT({$value['lng']} {$value['lat']})')");
    }

}

/**
 * Created by PhpStorm.
 * User: OscarGarciaRuiz //Modified : Marin Salinas
 * Date: 29/10/14
 * Time: 11:47
 */

