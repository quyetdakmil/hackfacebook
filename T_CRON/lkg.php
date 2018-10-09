<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

$access_token= $post['access_token'];

if(file_exists('log.txt')){ $log=json_encode(file('log.txt')); }else{ $log=''; }
$idgrup = $_POST['idgrup'];
$ceng= array(''.$idgrup.'');
$chibi=count($ceng) - 1;
$maho=rand(0,$chibi);
$grup = $ceng[$maho];
$stat=json_decode(auto('https://graph.beta.facebook.com/'.$grup.'/feed?fields=id,message,from,comments,type&access_token='.$access_token.'&offset=0&limit=50'),true);
for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){
$x=$stat[data][$i-1][id]."n";
$y=fopen('log.txt','a');
fwrite($y,$x);
fclose($y);
auto('https://graph.beta.facebook.com/'.$stat[data][$i-1][id].'/likes?method=post&access_token='.$access_token);
echo '<span style="color:#3b5998">'.$stat[data][$i-1][from][name].'</span> <span style="color:red">[Success]</span><hr/>';
}
else
{
  if(file_exists('wew')){ $log=json_encode(file('wew')); }else{ $log=''; }
  $wew=json_decode(auto('https://graph.beta.facebook.com/'.$stat[data][$i-1][id].'/comments?fields=id&access_token='.$access_token),true);
  for($e=1;$e<=count($wew[data]);$e++)
  {
  if(!ereg($wew[data][$e-1][id],$log)){
  $x=$wew[data][$e-1][id]."\n";
  $y=fopen('wew','a');
  fwrite($y,$x);
  fclose($y);
  auto('https://graph.beta.facebook.com/'.$wew[data][$e-1][id].'/likes?method=post&access_token='.$access_token);
  echo '<span style="color:#0E0101">Komen id ke > '.$e.' | like sukses</span></br>';
  }
  else
  {
 echo('Cài Đặt Bot Like Group Thành Công !!! ');
  }
  }
}
}

mbalek('/index.php?act=botLikeGroup&i='.urlencode('Cài Đặt Bot Like Group Thành Công !!!'));

function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}
?>