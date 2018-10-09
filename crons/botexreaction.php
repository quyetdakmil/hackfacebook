<?php
set_time_limit(0);
ob_start('ob_gzhandler');

//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

if($work->number_row("SELECT * FROM `botexreaction`")==0) die();
$data = $work->fetch_array("SELECT * FROM `botexreaction` ORDER BY RAND() LIMIT 0, 5", 0);
foreach($data as $get){
	$id_user = $get['id_user'];
	$token = $get['token'];
	$type = $get['camxuc'];
	$me = $work->me($token);
	if(!isset($me['id'])){
		$work->query("DELETE FROM `botexreaction` WHERE `id_user` = '".$id_user."'");
		continue;
	}
	$feed = json_decode($work->cURL('https://graph.facebook.com/' . $id_user . '/feed?limit=1&access_token=' . $token), true);
	$id_stt = @$feed['data'][0]['id'];
	$data_like = $work->fetch_array("SELECT * FROM `botexreaction` ORDER BY RAND() LIMIT 0, 50", 0);
	foreach($data_like as $get_like){
		$token_like = $get_like['token'];
		echo $work->cURL('https://graph.facebook.com/' . $id_stt . '/reactions?method=post&type=' . $type . '&access_token=' . $token_like) . ' ';
	}
}
$work->closedb();
?>