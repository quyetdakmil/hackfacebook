<?php
session_start();
include('config.php');
//error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$yes = $_POST['yes'];
$ngay = $_POST['ngay'];
$setid=$_SESSION['id'];
$udata = mysql_fetch_array(mysql_query("SELECT * FROM `token` WHERE `user_id`='{$setid}'"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `token` WHERE `vip`='1'"), 0);

if($ngay==NULL){
header('location: index.php?info=4');
exit;
}


if(isset($_POST['yes'])){
// 12h
$ngay = $_POST['ngay'];
if ($ngay == 1) {
$tien = 5000;
$time = time()+43200;
}
// 2 ngay
if ($ngay == 2) {
$tien = 10000;
$time = time()+172800;
}
//7 ngay
if ($ngay == 3) {
$tien = 30000;
$time = time()+604800;
}
//15 ngay
if ($ngay == 4) {
$tien = 50000;
$time = time()+1296000;
}
// 30 ngay
if ($ngay == 5) {
$tien = 100000;
$time = time()+2592000;
}

if ($udata['taikhoan'] < $tien) {
header('location: index.php?info=9');
}elseif ($tong == '5') {
header('location: index.php?info=11');
}elseif ($udata['vip'] == '1') {
header('location: index.php?info=11');
}else{
mysql_query("UPDATE `token` SET `taikhoan` = `taikhoan` - '{$tien}', `time` ='{$time}', `vip`='1' WHERE `user_id`='".$idfb."'");
header('location: index.php?info=10');
}

}else{
header('location: index.php?info=4');
}



?>