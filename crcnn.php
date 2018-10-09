<?php
echo date('h:i');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timen = date('H:i');
echo $timen;
include 'config.php';
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }

$dt = mysql_query("SELECT * FROM cnn where thoigian = '".$timen."' ");
while ($dts = mysql_fetch_array($dt)){


echo auto('https://graph.facebook.com/'.$dts['idcnn'].'/feed?message='.urlencode($dts['noidung']).'&access_token='.$dts['token'].'&method=post');

}

?>