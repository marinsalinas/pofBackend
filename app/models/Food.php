<?php


class Food extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'foods';

    protected $fillable = ['food_name'];



}
