<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/6/18
 * Time: 7:06
 */
if(!isset($_POST["key"])){
    ?>

<?php
}
if($_POST["key"]!='Sync2018y6t'){

    log($_POST,"数据不合法");
    die("数据不合法！");
}

if(!isset($_POST['news_id'])||$_POST['news_id']==""){
    log($_POST,"数据不合法！newsid不能为空");
    die("数据不合法！newsid不能为空");
}else{
    $news_id=floatval ($_POST['news_id']);
    if(isset($_POST['publish_date_time'])) $arr['publish_date_time']=strtotime($_POST['publish_date_time']);
    if(isset($_POST['category']))  $arr['category']=$_POST['category'];
    if(isset($_POST['image_link']))  $arr['image_link']=serialize($_POST['image_link']);
    if(isset($_POST['headline']))  $arr['headline']=serialize($_POST['headline']);
    if(isset($_POST['content']))  $arr['content']=$_POST['content'];

    if(isset($_POST['headline'])&&$_POST['headline']!=""){
        $arr['title']=$_POST['headline'];
    }else if(isset($_POST['content'])&&$_POST['content']!=""){
        $length = mb_strlen(strip_tags($_POST['content']));
        $length = ($length > 20) ? 20 : $length;
        $arr['title']= mb_substr($_POST['content'], 0, $length - 1);

    }
}
mysqlcon();
$sql="select news_id from stock_news where news_id = ".$news_id;

$res=mysql_query($sql);
if(mysql_num_rows($res)<=0){
    log($_POST,"没有数据匹配".$sql);
    die("没有数据匹配".$sql);
}

if(isset($_POST['action'])&&($_POST['action']==0)){
    if(!isset($_POST['news_id']))die("news_id不能为空！");
    $sql="delete from stock_news where id=".$news_id;
//    mysql_query($sql);
    postlog($_POST,'删除成功'.$sql);
    die("删除成功！");
}

//print_r($arr);
$sql1="update stock_news set ";
$sql2="update stock_content set ";
foreach($arr as $k=>$v){
    $v=str_replace('"', '\"', $v);
    $v=str_replace("'", "\'", $v);
    if($k=='content'){
        $sql2.=$k."='".$v."',";
    }else{
        $sql1.=$k."='".$v."',";
    }
}
$sql1.=' news_id ='.$news_id." where news_id=".$news_id;
$sql2.=' content_id ='.$news_id." where content_id=".$news_id;
//echo $sql1." ;    ".$sql2;



//mysql_query($sql1);
//mysql_query($sql2);

postlog($_POST,'同步成功'.$sql1.' '.$sql2);
echo "同步成功！";



function mysqlcon(){
//    $con = mysql_connect('127.0.0.1','mw801_stock','God5959599');
    $con = mysql_connect('test.daddyprefer.com','remote','Jude*Q0010');
    if (!$con) {
        die('Could not connect to MySQL: ' . mysql_error());
    }
    mysql_select_db('stock', $con);
    mysql_query('SET NAMES UTF8');
    return $con;

}


function postlog($data,$data2=''){

    $val='';
    foreach($data as $key =>$value){
        $val .= '|||||  '.$key.":".$value;
    }

    $filename="/home/mwadmin/domains/efx881.com/public/log/post.log";
    $handle=fopen($filename,"a+");
    $str=fwrite($handle, date("Y/m/d h:i:sa")."\n");
    $str=fwrite($handle,$val."\n" );
    $str=fwrite($handle,$data2."\n");
    $str=fwrite($handle, "\n");

    fclose($handle);
}