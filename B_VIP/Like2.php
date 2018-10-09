<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
require 'facebook.php';
include('config.php');
?>

<?
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `vip` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `vip` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `vip`"), 0);
$res = mysql_query("SELECT * FROM `vip` LIMIT $tong");
while ($post = mysql_fetch_array($res)){
$result = mysql_query("SELECT * FROM bot ORDER BY RAND() LIMIT 0,50");
if($result){
while($row = mysql_fetch_array($result))
  {
$access_token = $row[access_token];
$name_token = $row[name];


$idchinh= $post['id'];
$idface= $post['idfb'];
if(!$idface){
mysql_query("DELETE FROM `vip` WHERE `id` = $idchinh ");
}
//**Like**//
$khanh = auto('https://graph.facebook.com/'.$post['idfb'].'/feed?limit=1&access_token='.$access_token);
$arraykhanh = json_decode($khanh, true);
$khanhid = $arraykhanh[data][0][id];
$tachidkhanh = explode("_",$khanhid);
auto('https://graph.facebook.com/'.$khanhid.'/likes?method=post&access_token='.$access_token);
echo ''.$khanhid.'';
//**LikeEnd**//
echo ' '.$post['idfb'].' - '.$khanhid.' OK! '.$name_token.'</br> ';
}
}
}
function auto($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}
?>