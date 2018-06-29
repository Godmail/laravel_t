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
    public function handle($request,Closure $next){
        if(time()<strtotime('2018-06-23')){
            return redirect('activity0');
        }else{
            return $next($request);
        }
    }

}