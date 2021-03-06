<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

    protected $fillable = ['username','password','fullname','email','phone'];

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	protected $hidden = array('password', 'remember_token');

    public function address(){
        return $this->hasMany('Address', 'user_id');
    }

    public function getCreatedAtAttribute(){
        return date('c', strtotime($this->attributes['created_at']));
    }

    public function getUpdatedAtAttribute(){
        return date('c', strtotime($this->attributes['created_at']));
    }



    public function orders(){
        return $this->hasMany('Orders', 'user_id');
    }


}
