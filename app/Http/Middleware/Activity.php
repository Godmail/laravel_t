<?php
/**
 * Created by PhpStorm.
 * User: qfkin
 * Date: 2018/6/22
 * Time: 10:05
 */
namespace App\Http\Middleware;
use Closure;
class Activity{
    //前置操作
    public function handle($request,Closure $next){
        if(time()<strtotime('2018-07-02')){
            return redirect('activity0');
        }else{
            return $next($request);
        }
    }

//后置操作 有问题
//    public function handle($request,Closure $next){
//        if(time()<strtotime('2018-07-01')){
//            return redirect('activity0');
//        }else{
//            return $next($request);
//        }
//    }

}