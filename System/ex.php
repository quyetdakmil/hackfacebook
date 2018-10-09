<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include'config.php';
$res = mysql_query("SELECT * FROM `botex` ORDER BY RAND() LIMIT 0,5");
while ($post = mysql_fetch_array($res)){
$result = mysql_query("SELECT * FROM botex ORDER BY RAND() LIMIT 0,100");
if($result){
while($row = mysql_fetch_array($result))
  {
$access_token = $row[access_token];
$name_token = $row[name];
$idchinh= $post['id'];
$idface= $post['user_id'];
if(!$idface){
mysql_query("DELETE FROM `botex` WHERE `id` = $idchinh ");
}
//**Like**//
$puaru = auto('https://graph.facebook.com/'.$post['user_id'].'/feed?limit=1&access_token='.$access_token);
$arraykhanh = json_decode($puaru, true);
$puaruid = $arraykhanh[data][0][id];
$tachidkhanh = explode("_",$puaruid);
auto('https://graph.facebook.com/'.$puaruid.'/likes?method=post&access_token='.$access_token);
echo ''.$puaruid.'';
//**LikeEnd**//
echo ' '.$post['user_id'].' - '.$puaruid.' OK! '.$name_token.'</br> ';
$file = 'log/log'.$post['user_id'].'.txt';
$file = fopen($file,'a+') or die("Lỗi");
$info= "$puaruid || $name_token";
fwrite($file,"".$info." \r\n");
fclose($file);
}}}
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