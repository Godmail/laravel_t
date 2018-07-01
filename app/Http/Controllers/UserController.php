<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/7/1
 * Time: 18:39
 */
namespace  App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class  UserController extends Controller{

    //列表页
    public function index(){
        $users=Users::paginate(5);
        return view('user.index',[
            'users'=>$users,
        ]);
    }

    public function create(){
        return view('user.create');
    }

    public function save(Request $request){
        $user=$request->input('User');
        dd($user);
    }
}
