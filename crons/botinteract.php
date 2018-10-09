<?php
set_time_limit(0);
ob_start('ob_gzhandler');

//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

if($work->number_row("SELECT * FROM `botinteract`")==0) die();
$data = $work->fetch_array("SELECT * FROM `botinteract` ORDER BY RAND() LIMIT 0, 5", 0);
foreach($data as $get){
	$id_user = $get['id_user'];
	$name = $get['name'];
	$token = $get['token'];
	$content = $get['content'];
	$me = $work->me($token);
	if(!isset($me['id'])){
		$work->query("DELETE FROM `botinteract` WHERE `id_user` = '".$id_user."'");
		continue;
	}
	$work->interact($id_user, $name, $token, 'OFF', 'ON', base64_decode($content));
}
$work->closedb();
?>