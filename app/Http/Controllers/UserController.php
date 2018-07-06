<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/7/1
 * Time: 18:39
 */
namespace  App\Http\Controllers;

use App\User;
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

    public function create(Request $request){

        if($request->isMethod('POST')) {

            $data = $request->input('User');
//           dd($data);
            if (User::create($data)) {
                return redirect('user/index')->with('success','添加成功');
            } else {
                return redirect()->back();
            }
        }
        return view('user.create');
    }

    public function save(Request $request){
        $data=$request->input('User');
//       dd($data);
        $user= new User();
        $user->name=$data['name'];
        $user->partment=$data['partment'];
        $user->typeX=$data['typeX'];
        $user->status=$data['status'];
        $user->sectime=$data['sectime'];
        $user->liyang=$data['liyang'];
        $user->islw=$data['islw'];
        if($user->save()){
            return redirect('user/index');
        }else{
            return redirect()->back();
        }

    }
}
