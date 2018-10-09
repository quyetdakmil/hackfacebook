<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>DEL ID</title>
<?php
include'tokencoday.php';
?>

<?
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `vip` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `vip` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `vip`"), 0);
$res = mysql_query("SELECT * FROM `vip` LIMIT $tong");
echo'<center><font size="4" color="red">Số ID : '.$tong.'</font></center>';
while ($post = mysql_fetch_array($res)){
$timemua= $post['time'];
$idfb= $post['idfb'];
$idchinh= $post['id'];
if( $idchinh > 176){
if( time() > $timemua){
mysql_query("DELETE FROM `vip` WHERE `idfb` = $idfb ");
echo 'ID: '.$idchinh.' Hết hạn '.$post['idfb'].' </br> ';
$file = 'logdel/del'.$idfb.'.txt';
$file = fopen($file,'a+') or die("Lỗi");
$info= "$idfb || $idchinh ";
fwrite($file,"".$info." \r\n");
fclose($file);
}}}
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>