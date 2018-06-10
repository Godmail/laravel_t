<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/10
 * Time: 12:15
 */
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

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

}