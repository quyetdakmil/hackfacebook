<?php

$access_token= htmlentities($_POST['access_token']); 
$soluong= htmlentities($_POST['soluong']); 
$message = htmlentities($_POST['noidung']); 

$me = json_decode(auto('https://graph.beta.facebook.com/me?access_token='.$access_token.'&fields=id'),true);
$dg = json_decode(auto('https://graph.beta.facebook.com/me/friends?access_token='.$access_token.'&method=GET&limit='.$soluong.''),true);

for($i=1;$i<=count($dg[data]);$i++){
if(!preg_match($dg[data][$i-1][id])){
auto('https://graph.beta.facebook.com/'.$dg[data][$i-1][id].'/feed?message='.urlencode($message).'&access_token='.$access_token.'&method=post').'<hr/>';
   }
}

mbalek('/index.php?act=AutoPostWall&i='.urlencode('Auto Post Wall Thành Công !!!'));

function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }

function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}
?> 