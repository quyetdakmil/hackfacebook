<?php
set_time_limit(0);
//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//
if(isset($_POST)&&isset($_SESSION['id_user'])){
	$type = @$_POST['type'];
	$type_reaction = @$_POST['reaction'];
	$message = @$_POST['message'];
	$id = @$_POST['id'];
	$captcha = @$_POST['captcha'];
	$limit = @$_POST['limit'];
	$success = 0;
	if(!is_numeric($limit) OR ($limit > 100) OR ($limit < 0)) $limit = 30;
	if(@$_SESSION['_CAPTCHA']!=$captcha) die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bão<br>+ Hệ Thống Phát Hiện Bạn Mở Quá Nhiều Tab Bão.<br>+ Vui Lòng Chỉ Mở Một Tab Bão Thích Hợp.</p></div><script>thongbao("error", "Phát Hiện Flood Bão!", "Lỗi Bão")</script><meta http-equiv="refresh" content="5">');
	if($type=='boom-like'){
		$data = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/feed?fields=id&limit='.$limit.'&access_token='.$_SESSION['access_token']), true);
		foreach($data['data'] as $get){
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$get['id'].'/reactions?type=LIKE&method=post&access_token='.$_SESSION['access_token']), true);
			if(isset($curl['success'])) $success++;
		}
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Bão Like Và Bão Được ".$success." Like.', '".$date."', '".$time."')");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bão<br>+ Bão Like Cho ID: '.htmlentities($id).'<br>+ Số Like Vừa Bão Cho Bạn Bè Là: '.$success.' Like.</p></div><script>thongbao("success", "Bão Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='boom-reaction'){
		if($type_reaction=='LOVE'||$type_reaction=='WOW'||$type_reaction=='HAHA'||$type_reaction=='SAD'||$type_reaction=='ANGRY') $reaction = true;
		if(@$reaction!=true) die('<script>thongbao("error", "Bão Cảm Xúc Thất Bại Do Bạn Chưa Chọn Cảm Xúc Hoặc Cảm Xúc Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Bão")</script>');
		$data = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/feed?fields=id&limit='.$limit.'&access_token='.$_SESSION['access_token']), true);
		foreach($data['data'] as $get){
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$get['id'].'/reactions?type='.$type_reaction.'&method=post&access_token='.$_SESSION['access_token']), true);
			if(isset($curl['success'])) $success++;
		}
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Bão Cảm Xúc Và Bão Được ".$success." ".htmlentities($type_reaction).".', '".$date."', '".$time."')");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bão<br>+ Bão Cảm Xúc Cho ID: '.htmlentities($id).'<br>+ Cảm Xúc: '.htmlentities($type_reaction).'.<br>+ Số '.htmlentities($type_reaction).' Vừa Bão Cho Bạn Bè Là: '.$success.' '.htmlentities($type_reaction).'.</p></div><script>thongbao("success", "Bão Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='boom-comment'){
		$data = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/feed?fields=id&limit='.$limit.'&access_token='.$_SESSION['access_token']), true);
		foreach($data['data'] as $get){
			$array_message = explode("\n", $message);
			$msg = $array_message[array_rand($array_message)];
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$get['id'].'/comments?method=post&message='.urlencode($msg).'&access_token='.$_SESSION['access_token']), true);
			if(isset($curl['id'])) $success++;
		}
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Bão Bình Luận Và Bão Được ".$success." Bình Luận.', '".$date."', '".$time."')");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bão<br>+ Bão Bình Luận Cho ID: '.htmlentities($id).'<br>+ Số Bình Luận Vừa Bão Cho Bạn Bè Là: '.$success.' Bình Luận.</p></div><script>thongbao("success", "Bão Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
}
$work->closedb();
?>