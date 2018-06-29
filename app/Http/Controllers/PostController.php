<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: qfkin
 * Date: 2018/6/25
 * Time: 10:45
 */
class PostController  extends Controller{
     protected function send_post( $post_data) {
         $url='http://www.ooxx365.com/friend/getnewinfo.php';
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $res=json_decode($result);
         $count=0;
         foreach($res as $re){
             foreach($re as $k=>$v){
                 $data[$count][$k]=$v;
             }
             $count++;
         }
         echo '--'.$count.'--';
         if($count==0){
             $arr=(explode(",",$postdata));
             print_r($arr);
             die();
         }elseif($count==1){
             DB::table('post')->insert($data);
             die();
         }
         echo '处理了'.$count.'条记录，当前最大ID为:';

            DB::table('post')->insert($data);

        echo  $max=        DB::table('post')->max('idcode');
    }
    public function post($id=1){
        $post_data='';
        echo '起始ID:';
        echo $max=        DB::table('post')->max('idcode');
        for($i=$max+1;$i<=$max+1000;$i++){
//            echo $i.'<br>';
            $post_data=$post_data.$i.',';
        }
        $post_data=rtrim($post_data,',');
        $post_data=array("idcode"=>$post_data,
           );
        return PostController::send_post($post_data);

    }

    public function showPost(){
        $users=DB::table('post')
            ->whereRaw(' longitude>=? and longitude<=? and  latitude>=? and latitude<=? and sex !=?',[118.958402,122.727417,30.790258,33.66504,1])
            ->get();


        return view('post.map',['users'=>$users]);
    }

}

