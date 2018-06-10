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
}