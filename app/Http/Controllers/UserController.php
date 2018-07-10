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
        $users=Users::paginate(20);
        return view('user.index',[
            'users'=>$users,
        ]);
    }

    public function create(Request $request){

        $user=new Users();

        if($request->isMethod('POST')) {

            // 控制器验证
            /*
            $this->validate($request,[
               'User.name'=>'required|min:2|max:20',
                'User.partment'=>'required|min:2|max:20',
                'User.type'=>'required',
                'User.type'=>'integer',
                'User.status'=>'integer',
                'User.liyang'=>'integer',
                'User.islw'=>'integer',

            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 过短',
                'max'=>':attribute 过长',
                'integer'=>':attribute 必须为整数'
            ],[
                'User.name'=>'姓名',
                'User.partment'=>'部门',
                'User.type'=>'班种',
                'User.type'=>'班种',
                'User.status'=>'状态',
                'User.liyang'=>'是否立洋',
                'User.islw'=>'是否劳务',
            ]);
            */
            //validator 类验证

            $validator=\Validator::make($request->input(),[
                'User.name'=>'required|min:2|max:20',
                'User.partment'=>'required|min:2|max:20',
                'User.type'=>'required|integer',
                'User.status'=>'integer',
                'User.liyang'=>'integer',
                'User.islw'=>'integer',

            ],[
                'required'=>':attribute 为必填项',
                'min'=>':attribute 过短',
                'max'=>':attribute 过长',
                'integer'=>':attribute 必须为整数'
            ],[
                    'User.name'=>'姓名',
                    'User.partment'=>'部门',
                    'User.type'=>'班种',
                    'User.status'=>'状态',
                    'User.liyang'=>'是否立洋',
                    'User.islw'=>'是否劳务',
                ]
            );
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $request->input('User');
//           dd($data);
            if (Users::create($data)) {
                return redirect('user/index')->with('success','添加成功');
            } else {
                return redirect()->back();
            }
        }
        return view('user.create',[
            'user'=>$user
        ]);
    }

    public function save(Request $request){
        $data=$request->input('User');
//       dd($data);
        $user= new Users();
        $user->name=$data['name'];
        $user->partment=$data['partment'];
        $user->type=$data['type'];
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
