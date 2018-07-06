<?php

/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/7/1
 * Time: 19:07
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';

    protected $fillable=['name','partment','typeX','status','synced','sectime','liyang','islw'];

    public $timestamps=true;

    protected function getDateFormat()
    {
        return time();
    }
    protected function  asDateTime($value)
    {
        return $value;
    }

}