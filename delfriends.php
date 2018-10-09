<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<ol>
<?php
function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}

$access_token =  htmlentities($_POST['access_token']); 

$stat=json_decode(auto('https://graph.facebook.com/me/friends?access_token='.$access_token),true);
for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){

auto('https://graph.facebook.com/me/friends?uid='.$stat[data][$i-1][id].'&method=delete&access_token='.$access_token);
echo '<li><font color="red">Name : </font><input style="width:15%" placeholder="By : Phạm Mạnh Cường" value="'.$stat[data][$i-1][name].'"></input><font color="blue"> ID Friends : </font><input style="width:10%" placeholder="By : Vũ Nguyễn Khánh" value="'.$stat[data][$i-1][id].'"></input><font color="green"> Delete Friends : </font>Success<hr/></li>';
}
}
?>