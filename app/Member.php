<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/10
 * Time: 10:36
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class  Member extends Model
{
    public static function getMember()
    {
        return 'Member name is Godmail _model';
    }

}