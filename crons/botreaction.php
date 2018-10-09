<?php
set_time_limit(0);
ob_start('ob_gzhandler');

//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

if($work->number_row("SELECT * FROM `botreaction`")==0) die();
$data = $work->fetch_array("SELECT * FROM `botreaction` ORDER BY RAND() LIMIT 0, 5", 0);
foreach($data as $get){
	$id_user = $get['id_user'];
	$token = $get['token'];
	$type = $get['camxuc'];
	$me = $work->me($token);
	if(!isset($me['id'])){
		$work->query("DELETE FROM `botreaction` WHERE `id_user` = '".$id_user."'");
		continue;
	}
	$work->reaction($id_user, $token, $type);
}
$work->closedb();
?>