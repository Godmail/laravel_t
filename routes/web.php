<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基础路由
Route::get('001', function () {
    return "Hello GET 001";
});
Route::post('002', function () {
    return "Hello post 002";
});

//多请求路由
Route::match(['get','post'],'003',function(){
   return "Hello match 003";
});
Route::any('004', function () {
    return "Hello any 004";
});

//路由参数
Route::get('005/{id}', function($id){
    return "005-id:".$id;
});
Route::get('name/{name?}', function($name=null){
    return "name:".$name;
});
Route::get('name2/{name?}', function($name='No name'){
    return "name:".$name;
})->where('name','[a-zA-Z]+');

Route::get('user/{id}/{name?}', function($id,$name='No name'){
    return 'id:'.$id."name:".$name;
})->where(['id'=>'[0-9]+','name'=>'[a-zA-Z]+']);

// 路由别名
Route::get('user/membercenter',['as'=>'usercenter',function(){
    return Route('usercenter');
}]);

//路由群组

Route::group(['prefix'=>'member'],function(){
    Route::get('name',function(){
        return 'member_name';
    });
    Route::get('{id}',function($id){
        return 'member_name'.$id;
    });
});


//路由中输出视图
Route::get('view',function(){
    return view('layouts');
});

///////////关联控制器

Route::get('memberc/info','MemberController@info');

Route::get('memberc/info2',[
    'uses'=>'MemberController@info',
    'as'=>'memberinfo'
]);

Route::get('memberc/info2/{id}','MemberController@info2')->where('id','[0-9]+');

Route::get('test/{id}','MemberController@info3')->where('id','[0-9]+');

Route::group(['prefix'=>'test'],function (){
    Route::get('info4/{id?}','MemberController@info4');
});

Route::group(['prefix'=>'student'],function(){
    Route::get('test1',['uses'=>'StudentController@test1']);
    Route::get('insert',['uses'=>'StudentController@insert']);
    Route::get('update',['uses'=>'StudentController@update']);
    Route::get('delete/{id?}',['uses'=>'StudentController@delete']);
    Route::get('query1',['uses'=>'StudentController@query1']);
    Route::get('query2',['uses'=>'StudentController@query2']);
    Route::get('query3',['uses'=>'StudentController@query3']);
    Route::get('query4',['uses'=>'StudentController@query4']);
    Route::get('query5',['uses'=>'StudentController@query5']);
    Route::get('orm1',['uses'=>'StudentController@orm1']);
    Route::get('orm2',['uses'=>'StudentController@orm2']);
    Route::get('orm3',['uses'=>'StudentController@orm3']);
    Route::get('orm4',['uses'=>'StudentController@orm4']);
    Route::get('section1',['uses'=>'StudentController@section1']);
    Route::get('urlTest',['as'=>'url2','uses'=>'StudentController@urlTest']);
});

Route::get('url',['as'=>'url1','uses'=>'StudentController@urlTest']);
Route::get('request1',['as'=>'request','uses'=>'StudentController@request1']);
Route::get('student/request1',['as'=>'request','uses'=>'StudentController@request1']);