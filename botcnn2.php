<?php
echo'<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
include'config.php';
   mysql_query("CREATE TABLE IF NOT EXISTS `cnn2` (
      `stt` int(32) NOT NULL AUTO_INCREMENT,
      `id` varchar(32) NOT NULL,
      `idcnn` varchar(32) NOT NULL,
      `ten` varchar(255) NOT NULL,
      `noidung` varchar(255) NOT NULL,
      `token` varchar(255) NOT NULL,
      `thoigian` varchar(255) NOT NULL,
      `tatmo` INT( 11 ) NOT NULL DEFAULT '1',
      PRIMARY KEY (`stt`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}

   
$token = $_POST['token'];
$id = $_POST['id'];
$idcnn = $_POST['idcnn'];
$noidung = $_POST['noidung'];
$thoigian = $_POST['thoigian'];
$tatmo = $_POST['tatmo'];

$show = auto('https://graph.facebook.com/'.$idcnn.'?access_token='.$token);
$showid = json_decode($show, true);
if (!isset($showid['id'])){
mbalek('/index.php?act=botcnn2&i='.urlencode('ID Facebook Của Bạn Không Hợp Lệ'));
exit;}

if(empty($noidung))
{
$noidung = 'Chúc '.addslashes($showid['name']).' các bạn ngủ ngon, mơ đẹp. Bot-Ex .Org - Admin: Phạm Mạnh Cường <3';
}

$data = mysql_query("SELECT * FROM cnn2 WHERE id = '".$id."' AND idcnn = '".$idcnn."' ");
if(mysql_num_rows($data) >= 10){
mbalek('/index.php?act=botcnn2&i='.urlencode('Giới hạn của một id Facebook của bạn có thể chúc được 10 lần.'));
exit;}

 mysql_query(
         "INSERT INTO
         cnn2
         SET
         `id` = '".$id."',
         `idcnn` = '".$idcnn."',
         `ten` = '".addslashes($showid['name'])."',
         `noidung` = '".$noidung."',
         `token`= '".$token."',
         `thoigian` = '".$thoigian."',
         `tatmo` = '".$tatmo."' ");
         
mbalek('/index.php?act=botcnn2&i='.urlencode('Auto thành công !!!'));
         
         
         
         
         


?>