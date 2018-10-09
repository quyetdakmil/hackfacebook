<?php
set_time_limit(0);
ob_start('ob_gzhandler');

//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

if($work->number_row("SELECT * FROM `botrelike`")==0) die();
$data = $work->fetch_array("SELECT * FROM `botrelike` ORDER BY RAND() LIMIT 0, 5", 0);
foreach($data as $get){
	$id_user = $get['id_user'];
	$name = $get['name'];
	$token = $get['token'];
	$me = $work->me($token);
	if(!isset($me['id'])){
		$work->query("DELETE FROM `botrelike` WHERE `id_user` = '".$id_user."'");
		continue;
	}
	$feed = json_decode($work->cURL('https://graph.facebook.com/me/feed?limit=1&access_token='.$token), true);
	$id_stt = @$feed['data'][0]['id'];
	$get_like = json_decode($work->cURL('https://graph.facebook.com/'.$id_stt.'/likes?limit=10&access_token='.$token), true);
	foreach($get_like['data'] as $user_like){
		$post = json_decode($work->cURL('https://graph.facebook.com/'.$user_like['id'].'/feed?fields=id&access_token='.$token.'&offset=0&limit=1'), true);
		if($work->getData($id_user, $post['data'][0], 'relike')&&$id_user!=$user_like['id']){
			echo $work->cURL('https://graph.facebook.com/'.$post['data'][0]['id'].'/likes?access_token='.$token.'&method=post') . ' ';
		}
	}
}
$work->closedb();
?>