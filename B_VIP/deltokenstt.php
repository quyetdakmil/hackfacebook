<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8" />
  <title>Del Token STT</title><center>
<?
include('config.php');
//count member
$babi = mysql_query ("SELECT name, COUNT(name) FROM stt");
$rober = mysql_fetch_array($babi);
$rec=$rober['COUNT(name)'];
?>
<font size="4" color="red">Token STT Hiện Tại Bây Giờ Là : <?php echo $rec; ?></font></div></div>
<?php
include'config.php';
$items = mysql_query("SELECT * FROM stt");
$thispage = $PHP_SELF;
$num = mysql_num_rows($items);
$per_page = 500 ;
$start = @$_GET['start'];
if(empty($start)) $start = 0;
?>
<center>
<?php
if($start+$per_page<$num){
?>
<?php
}

$result = mysql_query("SELECT * FROM stt ORDER BY id LIMIT $start,$per_page");
if($result){
while($row = mysql_fetch_array($result))
{
$token = $row[access_token];
$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true);print($userData[name]).'<br/>';
if(!$userData[name]){
mysql_query("
DELETE FROM
stt
WHERE
access_token='" . mysql_real_escape_string($token) . "'
");
}
}
}
?>