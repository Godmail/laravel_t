<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/29
 * Time: 22:04
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //手动指定表名
    protected $connection = 'sqlsrv';
    protected $table = 'his_payroll';

}