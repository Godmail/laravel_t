<?php
/**
 * Created by PhpStorm.
 * User: qfkin
 * Date: 2018/6/9
 * Time: 23:51
 */

namespace App\Http\Controllers;

use App\Member;

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
        Member::getMember();
        return 'Member id:'.$id;
    }
    public function info3($id)
    {
        Member::getMember();
        return 'Member id:'.$id;
    }

    public  function info4($id='23'){
//        return view('member/info',[
//           'name'=>'Godmail',
//            'id'=>$id,
//            'age'=>'30',
//            'city'=>'Nantong',
//        ]);
        return Member::getMember();
    }
}