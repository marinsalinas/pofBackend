<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 14/04/2015
 * Time: 06:14 PM
 */

class Report extends Eloquent {

    public $incrementing = false;

    protected $table = 'Report';

    public $timestamps = false;

    protected $primaryKey  = 'idDevice';

    //protected $fillable = array('idDevo','restaurant_id','name','phone','description','status');

    protected $append = array('position');

    public function  device(){
        return $this->hasOne('Device', 'imei', 'idDevice');
    }


    public function getPositionAttribute(){
        $idDevice = $this->attributes['idDevice'];
        //$wkt = DB::table($this->table)->find($idDevice, array(DB::raw('Y(position) AS latitude, X(position) AS longitude')));
        $wkt = DB::select(DB::raw("select Y(position) AS latitude, X(position) AS longitude from LastReport where idDevice = {$idDevice} limit 1"));

        $location = $wkt[0];
        return $location;
    }

    public function setPositionAttribute($value){
        $this->attributes['position'] = DB::raw("GeomFromText('POINT({$value['lng']} {$value['lat']})')");
    }


}