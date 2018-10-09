<?php
$access_token= $_GET['access_token'];
$limit= $_GET['soluong'];
$id= $_GET['idpost'];

$stat=json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,from,comments,type&access_token='.$access_token.'&offset=0&limit='.$limit.''),true); 

for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){
$x=$stat[data][$i-1][id]."\n";

$message= $_GET['noidung'];

auto('https://graph.facebook.com/'.$id.'/feed?message='.urlencode($message).'&access_token='.$access_token.'&method=post').'ass';
}
}

mbalek('/index.php?act=bomWall&i='.urlencode('Boom Wall Thành Công !!!'));


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