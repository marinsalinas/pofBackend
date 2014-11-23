<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 28/10/2014
 * Time: 07:07 PM
 */

class Address extends Eloquent{

    protected $table = 'address';

    protected $fillable=array('label', 'description', 'textaddress','location');

    protected $append = array('location');

    protected $guarded = array('id');

    //protected $hidden = array('location');


    public function user(){
        return $this->belongsTo('User', 'user_id');
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