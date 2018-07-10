<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/10
 * Time: 20:54
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    //手动指定表名
    protected $table='student';
    //手动指定id
    protected $primaryKey='id';

    //关闭自动维护时间戳
//    public $timestamps=false;

    //返回时间戳，否则返回datetime格式
    protected function getDateFormat(){
        return time();
    }

    //直接返回时间戳
    protected function asDateTime($val){
        return $val;
    }
    //设置允许批量添加的字段
    protected $fillable=['name','age'];
    //不允许批量添加的字段
//    protected $guarded=['age'];
}