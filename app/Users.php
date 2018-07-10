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
    const type_0 = 0;
    const type_1 = 1;
    const type_2 = 2;
    const type_3 = 3;
    const type_4 = 4;

    protected $table='users';

    protected $fillable=['name','partment','type','status','synced','sectime','liyang','islw'];

    public $timestamps=true;

//    protected function getDateFormat()
//    {
//        return time();
//    }
//    protected function  asDateTime($value)
//    {
//        return $value;
//    }

    public function type($ind=null){
        $arr =[
            self::type_0=>'日',
            self::type_1=>'甲',
            self::type_2=>'乙',
            self::type_3=>'丙',
            self::type_4=>'丁',
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:$arr[self::type_0];
        }
        return $arr;
    }
}