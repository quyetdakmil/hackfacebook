<?php
include'config.php';
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `poke` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `poke` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `poke`"), 0);
$res = mysql_query("SELECT * FROM `poke` LIMIT $tong");
while ($post = mysql_fetch_array($res)){
$access_token= $post['access_token'];
$tatmo= $post['tatmo'];
if($tatmo == 0 ){
$me = json_decode(auto('https://graph.facebook.com/me?access_token='.$access_token.''),true);
$home=json_decode(auto('https://graph.facebook.com/me/home?access_token='.$access_token.'&limit=30&fields=from'),true);
for($i=1;$i<=count($home[data]);$i++){
 if($home[data][$i-1][from][id] != $me[id]){
echo auto('https://graph.facebook.com/'.$home[data][$i-1][from][id].'/pokes?access_token='.$access_token.'&method=post').'<hr/>';
   }
}
}
}

function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }
?>