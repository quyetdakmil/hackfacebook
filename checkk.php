<?php
$token ='CAAAAAIZAgwGsBAHSGaCn7jqQ15LiXlDmf02P2niM1ZAyaALHUz1CQNEbm9tRfhnbZA0cN2ku1E6MfkB5CZCujOCSYYXAG5ZBRZBVu8GkMDemmsQzyhHFESGZCS3cHeKyevBeLLPmPIZC9VQnAQr3chQSu9JyUkCptbba8CMpy0aOoCZCskZA5bWx5AZCmSzx2P3mCEZD';

$getpost = 'https://graph.facebook.com/itvn90/feed?limit=1&access_token='.$token;

$get = auto($getpost);

$array = json_decode($get, true);


$postid = $array[data][0][id];
echo $postid;
$com = 'https://graph.facebook.com/'.$postid.'/likes?method=post&access_token='.$token;
$ren = auto($com);

echo $ren;
exit;
auto($com);
auto('https://graph.facebook.com/278757465628936/likes?method=post&access_token='.$token);

//pp feri

jaloka($token);

gilang($token);

mayada($token);

function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }