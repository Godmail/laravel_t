<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/10
 * Time: 12:15
 */
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller{
    //原生sql查询
    public function test1(){
//        return 'test1';
        $students=DB::select('select * from student');
        dd($students);
    }

    public function insert(){
//        return 'test1';
        $bool=DB::insert('insert into student(name,age,sex) VALUES (?,?,?)',['mooc','33','0']);
        var_dump($bool);

    }
    public function update(){
        $num=DB::update('update student set age=? where name = ?',['31','Godmail']);
        var_dump($num);
    }
    public function delete($id=1001){
        $num=DB::delete('delete from student where id = ?',[$id]);
        var_dump($num);
    }

    //查询构造器
    public function query1(){
        //插入
//        $bool=DB::table('student')->insert(
//            ['name'=>'Godmail2','age'=>18]
//        );
//        var_dump($bool);

        //插入并返回ID
//        $id=DB::table('student')->insertGetID(
//            ['name'=>'Godmail3','age'=>18]
//        );
//        var_dump($id);

        //插入多条
        $bool=DB::table('student')->insert(
            [
                ['name'=>'Godmail2','age'=>18],
                ['name'=>'Godmail4','age'=>18]
            ]
        );
        var_dump($bool);
    }

    //查询构造器 更新数据
    public function query2(){
        //
//        $num=DB::table('student')
//            ->where('id',1005)
//            ->update( ['age'=>39]);
//        var_dump($num);

        //自增,自减
//        $num=DB::table('student')->increment('age',3);
//        $num=DB::table('student')
//            ->where('id',1005)
//            ->decrement('age',3);
//        var_dump($num);


        $num=DB::table('student')
            ->where('id',1005)
            ->decrement('age',3,['name'=>'lall']);
        var_dump($num);

    }

    //查询构造器删除
    public function query3(){

//       $num= DB::table('student')
//            ->where('id','1004')
//            ->delete();


//        $num= DB::table('student')
//            ->where('id','<=',1004)
//            ->delete();
        //清空表
       $num=DB::table('student')
       ->truncate();

        var_dump($num);
    }

    //查询构造器 查询 get() first() where() pluck() lists() select()

    public function query4(){
        //get()
        $students=DB::table('student')->get();
        //first
        $students=DB::table('student')
            ->orderBy('id','desc')
            ->first();

        //where()
        $students=DB::table('student')
            ->where('id','<=',3)
            ->orderBy('id','desc')
            ->first();
        //whereRaw 多条件
        $students=DB::table('student')
            ->whereRaw('id<= ? and age > ?',[3,15])
            ->orderBy('id','desc')
            ->get();

        //pluck() 返回结果集中的指定字段
        $students=DB::table('student')
            ->whereRaw('id<= ? and age > ?',[3,15])
            ->orderBy('id','desc')
            ->pluck('name');

        //lists()  5.4 已经废弃，使用pluck
        $students=DB::table('student')
            ->whereRaw('id<= ? and age > ?',[3,15])
            ->orderBy('id','desc')
            ->pluck('name','id');


        //select() 返回结果集中的指定字段
        $students=DB::table('student')
            ->whereRaw('id<= ? and age > ?',[3,15])
            ->select('id','name','age')
            ->orderBy('id','desc')
            ->get();

        //chunk()
        echo '<pre>';
        DB::table('student')
            ->orderBy('id','desc')
            ->chunk(2,function ($students){
                var_dump($students);
            });


        dd($students);
    }

    //聚合函数
    public function query5(){
        $num=DB::table('student')->count();

        $max=        DB::table('student')->max('age');
        $min=        DB::table('student')->min('age');
        $avg=        DB::table('student')->avg('age');
        $sum=        DB::table('student')->sum('age');

        var_dump($sum);
    }

    public function orm1(){
        $students=Student::all();

        $students=Student::find(5);

        //查询失败就报错
//        $students=Student::findOrFail(15);

        $students=Student::get();

        $students=Student::where('id','>',2)
            ->orderBy('age','desc')
            ->first();

//        echo '<pre>';
//        Student::chunk(2,function($students){
//            var_dump($students);
//        });


        //聚合函数 count max min 等 同上
        $num=Student::count();
        var_dump($num);
//        dd($students);
    }

    public  function orm2(){
//        // 使用模型新增数据
//        $student= new Student();
//        $student->name='Godmail';
//        $student->age=31;
//        $bool=$student->save();
//        var_dump($bool);
//        dd($student);

//        //使用模型取数据
//        $student=Student::find(8);
//        echo $student->created_at;
//

        //使用模型Create方法新增数据
        $student =Student::create(
          ['name'=>'CreateUser','age'=>21]
        );
//        dd($student);

        //firstOrCreate() 查找。如果没有则新增
//        $student=Student::firstOrCreate(
//            ['name'=>'CreateUser','age'=>22]
//        );
//        dd($student);
        //firstOrNew()  查找，如果没有则新建实例，但不保存，如果需要 要手动save
//        $student=Student::firstOrNew(
//            ['name'=>'CreateUser','age'=>22]
//        );
//echo         $bool=$student->save();
        dd($student);
    }

    public function  orm3(){
        //通过模型更新数据
//        $student=Student::find(15);
//        $student->name='Kitt2y';
//        echo $student->save();

        $num=Student::where('id','>',10)->update(
            ['age'=>28]
        );
        var_dump($num);
    }
    public function orm4(){
        //通过模型删除
//        $student=Student::find(13);
//        $bool=$student->delete();
//        var_dump($bool);

        //通过主键删除
//        Student::destroy(12);
//        Student::destroy(10,11);
//        Student::destroy([10,11]);
        Student::where('id','>',10)->delete();
    }

    public function section1(){
        $students=Student::get();
        $name='Godmail2';
        $arr=['Godmail','Jude'];
        return view('student.section1',['name'=>$name,'arr'=>$arr,'students'=>$students]);
    }

    public function urlTest(){
        return 'urlTest';
    }

    public function request1(Request $request ){
        //1、取值
//        echo $request->input('name');
//        echo $request->input('sex','未知');
//        if($request->has('class')){
//            echo $request->has('class');
//        }else{
//            echo '无该参数';
//        }
//        $res=$request->all();
//        dd($res);

        //2、判断请求的类型
//        echo         $request->method();
//        echo $request->isMethod('GET')?'yes':"no";

        $res= $request->ajax();
        var_dump($res);

//        $res=$request->is('student/*');
//        var_dump($res);

        echo $request->url();
    }

    public function session1(Request $request){
        //1、HTTP request session();
//        $request->session()->put('key1','value1');
//        echo $request->session()->get('key1');
        //2、 session 的辅助函数
        session()->put('key2','value2');
        echo session()->get('key2');

        //3、 通过session类
        //存储数据到Session
        Session::put('key3','value3');
        echo Session::get('key3');
        Session::put(['k4'=>'v4','k5'=>'v5']);
        //数组
        Session::push('student','s1');
        Session::push('student','s2');

        $res= Session::get('student','default');
        var_dump($res);
        //取出并删除
        $res=Session::pull('student');
        var_dump($res);

        //取出所有
//        $res=Session::all();
//        dd($res);

        if(Session::has('key1')){
            echo '存在';
        }else{
            echo '不存在';
        }

        //删除session指定数据
        Session::forget('key1');
        //清空session
        Session::flush();

        $res=Session::all();
        dd($res);
        //暂存数据，一次性访问
        Session::flash('k-flash','v-flash');
    }
    public function session2(Request $request){
        echo Session::get('message','无数据');
        return 'session2';
    }

    public function response(){
        $data=[
            'errorCode'=>0,
            'errorMsg'=>'success',
            'data'=>'内容~~~~',
        ];
//        dd($data);
//        return response()->json($data);
        //4 重定向
//        return redirect('session2');
//        return redirect('session2')->with('message','我是快闪数据');

        // action()
//        return redirect()->action('StudentController@session2')
//            ->with('message','我是快闪数据');
        //route 别名
//        return redirect()->route('se')
//            ->with('message','我是快闪数据');
        return redirect()->back();
    }

    //宣传页
    public function activity0(){
        return '活动即将开始，敬请期待';
    }
    public function activity1(){
        return '活动进行中';
    }
    public function activity2(){
        return '活动结束';
    }
}