<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include'config.php';
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `simsimi` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `simsimi` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `simsimi`"), 0);
$res = mysql_query("SELECT * FROM `token` LIMIT $tong");
while ($post = mysql_fetch_array($res)){
$tatmo= $post['tatmo'];
if($tatmo == 0 ){
$aye = 'http://www.simsimi.com/';
$graph = 'https://graph.facebook.com/';
$access_token = $post['access_token'];
$cyme = json_decode(cURL($graph.'me?access_token='.trim($access_token)));
$ane = json_decode(cURL($graph.'me/inbox?access_token='.trim($access_token).'&fields=unseen,unread,comments.limit(1)'));


foreach($ane->data as $anenl){
	if($anenl->unseen == 0 && $anenl->unread == 0 || $anenl->comments->data[0]->from->id == $cyme->id) continue;
	$anedoi = $anenl->comments->data[0]->message;
	$eya = $aye.'func/reqN?lc=vn&ft=0.0&req='.urlencode($anedoi).'&fl=http%3A%2F%2Fwww.simsimi.com%2Ftalk.htm&reqType=';
	$ayme = json_decode(cURL($eya, 3));
	if($ayme->msg == 'OK'){
		$cymes = str_replace(array('sim', 'simi', 'simsimi','SimSimi','Simi'), $cyme->name,$ayme->sentence_resp);
	}else{
		$cymes = 'What did you say?';
	}
	$anethietchu = cURL($graph.trim($anenl->comments->data[0]->from->id).'/inbox?subject=+SonicQ12&message='.urlencode($cymes.' :v').'&method=POST&access_token='.trim($access_token));
}
function cURL($url = '', $type = 1, $ref = 'google.com', $postArray = null, $randC = ''){
	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_SSL_VERIFYPEER => false
	);
	$options[CURLOPT_COOKIE] = 'simsimi_uid='.rand(0,9999999).'; isFirst=1; isFirst=1; selected_nc=vn; selected_nc=vn; selected_nc_name=tieng%20viet; selected_nc_name=tieng%20viet;';
	if($postArray){
		$options[CURLOPT_POST] = true;
		$options[CURLOPT_POSTFIELDS] = $postArray;
	}
	$options[CURLOPT_REFERER] = $ref;
	$sc = curl_init();
	curl_setopt_array($sc, $options);
	$result = curl_exec($sc);
	curl_close($sc);
	return $result;
}
}
}
?>