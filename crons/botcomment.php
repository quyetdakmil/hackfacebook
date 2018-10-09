<?php
set_time_limit(0);
ob_start('ob_gzhandler');

//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

if($work->number_row("SELECT * FROM `botcomment`")==0) die();
$data = $work->fetch_array("SELECT * FROM `botcomment` ORDER BY RAND() LIMIT 0, 5", 0);
foreach($data as $get){
	$id_user = $get['id_user'];
	$name = $get['name'];
	$token = $get['token'];
	$bieutuong = $get['bieutuong'];
	$quangcao = $get['quangcao'];
	$content = $get['content'];
	$me = $work->me($token);
	if(!isset($me['id'])){
		$work->query("DELETE FROM `botcomment` WHERE `id_user` = '".$id_user."'");
		continue;
	}
	$work->comment($id_user, $name, $token, $bieutuong, $quangcao, base64_decode($content));
}
$work->closedb();
?>