

<?php
include 'config.php';
$sql = 'SELECT * FROM botcomment';
$result = mysql_query("SELECT * FROM botcomment");
if($result){
while ($row = mysql_fetch_array($result)){
$access_token = $row[access_token];
$comment= $row[noidung];
$tatmo= $post['tatmo'];
if($tatmo == 0 ){
$stat = json_decode(get_html('https://graph.facebook.com/me/home?fields=id&access_token='.$access_token.'&offset=1&limit=5'),true);
for($i=1;$i<=count($stat[data]);$i++){
if(!ereg($stat[data][$i-1][id],$log)){

get_html('https://graph.facebook.com/'.$stat[data][$i-1][id].'/comments?method=POST&message='.urlencode(($comment.' 
 💟 Auto Comment Tại 👉 Bot-Ex .Org 👈 💟 ')).'&access_token='.$access_token);
}
}
}
}
}
echo $access_token;
echo '<br>';
echo $comment;

function get_html($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>