<?php
$access_token= $_GET['access_token'];
$limit= $_GET['soluong'];


function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}


$stat=json_decode(auto('https://graph.beta.facebook.com/me/feed?fields=id,from&limit='.$limit.'&access_token='.$access_token),true);
for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){
auto('https://graph.beta.facebook.com/'.$stat[data][$i-1][id].'?access_token='.$access_token.'&method=delete');
}
}

mbalek('/index.php?act=deleteST&i='.urlencode('Delete Stt Thидnh C?ng !!!'));

function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}

?>