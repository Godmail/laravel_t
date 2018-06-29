<?php
/**
 * Created by PhpStorm.
 * User: qfkin
 * Date: 2018/6/25
 * Time: 10:52
 */

 namespace App;

 use Illuminate\Database\Eloquent\Model;

 class Post extends Model{
     //手动指定表名
     protected $table='student';
     //手动指定id
     protected $primaryKey='idcode';


 }