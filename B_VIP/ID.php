<?php
include'config.php';
include'head.php';
?>
<?
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `vip` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `vip` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `vip`"), 0);
$res = mysql_query("SELECT * FROM `vip` LIMIT $tong");
echo'<center><font size="4" color="#CC0033">Số ID : '.$tong.'</font></center>';
while ($post = mysql_fetch_array($res)){
echo '<center><b>Thông tin của <font color="blue">'.$post['name'].'</font>: </b> </br><img src="https://graph.facebook.com/'.$post['idfb'].'/picture" alt="'.$post['idfb'].'"/></br> <b>ID:</b><font color="#CC33FF"> '.$post['idfb'].' </font></br><b>Ngày Đã Mua:</b><font color="green"> '.$post['time'].'</font></br><b>Hạn Sử Dụng:</b><font color="#CC00FF"> '.$post['han'].'</font></center>';

echo'<center><b>Kết Thúc Thông Tin Của <font color="#FF0099">'.$post['name'].' </font></b></br></br></center>';
}
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER,1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>
<?php
include'footer.php';
?>