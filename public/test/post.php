<?php
function send_post($url, $post_data) {

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

    return $result;
}

//使用方法
$post_data = array(
    'username' => 'stclair2201',
    'password' => 'handan'
);
send_post('http://www.qianyunlai.com', $post_data);

$url  = "http://www.ooxx365.com/friend/getnewinfo.php";
$data = array("idcode"=>"1",
    "info"=>"明天天气怎么样？",
    "loc"=>"满洲里市");
$v = send_post($url, $data);
$v=json_decode($v);
print_r($v);