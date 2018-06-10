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
    return view('welcome');
});

///////////关联控制器

Route::get('memberc/info','MemberController@info');

Route::get('memberc/info2',[
    'uses'=>'MemberController@info',
    'as'=>'memberinfo'
]);

Route::get('memberc/info3/{id}','MemberController@info2')->where('id','[0-9]+');
