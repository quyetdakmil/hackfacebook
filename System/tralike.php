<meta charset="UTF-8">
<?php
include'config.php';
mysql_query("CREATE TABLE IF NOT EXISTS `log` (

      `id` int(11) NOT NULL AUTO_INCREMENT,

      `idstt` varchar(1024) NOT NULL,

      `idngta` varchar(1024) NOT NULL,
      `idsttngta` varchar(1024) NOT NULL,
      `ten` varchar(1024) NOT NULL,
	  `noidung` varchar(1024) NOT NULL,

      PRIMARY KEY (`id`)

      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

   ");
set_time_limit(0);
$res = mysql_query("SELECT * FROM tralike ORDER BY RAND() LIMIT 0,5");
while ($info = mysql_fetch_array($res)){ 
$token = $info['access_token'];
$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true);
if(!$userData[name]){
mysql_query("
DELETE FROM
tralike
WHERE
access_token='" . mysql_real_escape_string($token) . "'
");
}
$feed=json_decode(file_get_contents('https://graph.fb.me/me/feed?access_token='.$token.'&limit=1'),true); //Limit Id 1 Status
for($u=0;$u<count($feed[data]);$u++){ // Parse ID
$idstt = $feed[data][$u][id]; 
$sllike = $feed[data][$u][likes][count];  
} 
if($sllike > 300 || !$sllike){
mysql_query("
DELETE FROM
tralike
WHERE
access_token='" . mysql_real_escape_string($token) . "'
");
}
$idcmt = auto('https://graph.facebook.com/'.$idstt.'/likes?access_token='.$token.'&limit=200');
$arraycmtid = json_decode($idcmt, true);
for($i=0;$i<=count($arraycmtid[data]);$i++)
{

$idngta = auto('https://graph.facebook.com/'.$arraycmtid[data][$i-1][id].'/feed?fields=id,message,created_time,from,comments,type&access_token='.$token.'&offset=0&limit=1');
$infongta = json_decode($idngta, true);
for($o=1;$o<=count($infongta[data]);$o++){
$idsttngta= $infongta[data][$o-1][id];
$puarucheck= mysql_result(mysql_query("select count(*) from `log` where `idstt` ='".$idstt."' && `idngta` ='".$arraycmtid[data][$i-1][id]."' && `idsttngta` = '".$idsttngta."'"),0);
if($puarucheck == 0)
{
auto('https://graph.facebook.com/'.$idsttngta.'/likes?access_token='.$token.'&method=post');
echo ''.$i.' - '.$arraycmtid[data][$i-1][name].' - '.$idsttngta.' - Done! </br>';
mysql_query("INSERT INTO `log` (`idstt`, `idngta`,`idsttngta`,`ten`,`noidung`) VALUES ('".$idstt."', '".$arraycmtid[data][$i-1][id]."','".$idsttngta."','".$arraycmtid[data][$i-1][name]."','".$infongta[data][$o-1][message]."')");
}
}
}
}










//***Function***//
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>