<?php
/**
 * Created by PhpStorm.
 * User: co_mmsalinas
 * Date: 30/10/2014
 * Time: 10:00 PM
 */
class OpenDays extends Eloquent
{
    protected $table = 'opendays';

    protected $guarded = array('id');

    public function restaurant(){
        return $this->belongsTo('Restaurant', 'restaurant_id');
    }

}