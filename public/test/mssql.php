<?php
/**
 * Created by PhpStorm.
 * User: Godmail
 * Date: 2018/7/1
 * Time: 12:26
 */
ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);
echo '12';
//$conn=mssql_connect("58.221.81.66","sa","ntacf2011!");

////测试连接
//if($conn)
//{
//    echo "连接成功";
//}
//var_dump($conn);

$dsn = 'dblib:dbname=ntacfOA;host=58.221.81.66:1433';
$user = 'sa';
$password = 'ntacf2011!';
try {
    // echo 11;
    $dbh = new PDO($dsn, $user, $password);

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
var_dump($dbh);
$stmt=$dbh->prepare("select * from his_dispathpayroll");
$stmt->execute();
while ($row=$stmt->fetch()) {
    print_r($row);
}
unset($dbh); unset($stmt);
