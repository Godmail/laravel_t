<?php
/**
 * Created by PhpStorm.
 * User: qfkin
 * Date: 2018/6/9
 * Time: 23:51
 */

namespace App\Http\Controllers;

class MemberController extends Controller{
    public function info()
    {
        //return 'Member info';
//        return route('usercenter');
        return view('member/info',[
            'name'=>'Godmail',
            'age'=>'30',
            'city'=>'Nantong',
        ]);
    }
    public function info2($id)
    {
        return 'Member id:'.$id;
    }
}