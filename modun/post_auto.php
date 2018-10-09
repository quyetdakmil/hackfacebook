<?php
set_time_limit(0);
//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//
if(isset($_POST)&&isset($_SESSION['id_user'])){
	$type = @$_POST['type'];
	$type_reaction = @$_POST['reaction'];
	$star = @$_POST['star'];
	$message = @$_POST['message'];
	$id = @$_POST['id'];
	$captcha = @$_POST['captcha'];
	$limit = @$_POST['limit'];
	$xu = 100;
	$success = 0;
	$faild = 0;
	if(!is_numeric($limit) OR ($limit > 100) OR ($limit < 0)) $limit = 30;
	if(@$_SESSION['_CAPTCHA']!=$captcha) die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Auto<br>+ Hệ Thống Phát Hiện Bạn Mở Quá Nhiều Tab Auto.<br>+ Vui Lòng Chỉ Mở Một Tab Auto Thích Hợp.</p></div><script>thongbao("error", "Phát Hiện Flood Auto!", "Lỗi Auto")</script><meta http-equiv="refresh" content="5">');
	$data = @$work->get_db('*', 'user_block', 'id_user', $_SESSION['id_user']);
	$time_con_lai = $time - (int)($data['limit']);
	if($time_con_lai > $time_limit) @$work->query("DELETE FROM `user_block` WHERE `id_user` = '".$_SESSION['id_user']."'");
	else die('<script>thongbao("error", "Bạn Vừa Mới Sử Dụng Chức Năng Auto, Vui Lòng Đợi Đến Hết Thời Gian Chờ!", "Lỗi Auto")</script>');
	if($type=='auto-like'){
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/reactions?type=LIKE&method=post&access_token='.$data['token']), true);
			if(isset($curl['success'])) $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Like Và Nhận Được ".$success." Like Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Like Cho ID: '.htmlentities($id).'<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số Like Vừa Nhận Được Là: '.$success.' Like.<br>+ Số Like Thất Bại Là: '.$faild.' Like.<br>+ Trong Tổng: '.$limit.' Like.</p></div><script>thongbao("success", "Auto Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='auto-reaction'){
		if($type_reaction=='LOVE'||$type_reaction=='WOW'||$type_reaction=='HAHA'||$type_reaction=='SAD'||$type_reaction=='ANGRY') $reaction = true;
		if(@$reaction!=true) die('<script>thongbao("error", "Auto Cảm Xúc Thất Bại Do Bạn Chưa Chọn Cảm Xúc Hoặc Cảm Xúc Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Auto")</script>');
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/reactions?type='.$type_reaction.'&method=post&access_token='.$data['token']), true);
			if(isset($curl['success'])) $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Cảm Xúc Và Nhận Được ".$success." ".htmlentities($type_reaction)." Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Cảm Xúc Cho ID: '.htmlentities($id).'<br>+ Cảm Xúc: '.htmlentities($type_reaction).'.<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số '.htmlentities($type_reaction).' Vừa Nhận Được Là: '.$success.' '.htmlentities($type_reaction).'.<br>+ Số '.htmlentities($type_reaction).' Thất Bại Là: '.$faild.' '.htmlentities($type_reaction).'.<br>+ Trong Tổng: '.$limit.' '.htmlentities($type_reaction).'.</p></div><script>thongbao("success", "Auto Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='auto-comment'){
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$array_message = explode("\n", $message);
			$msg = $array_message[array_rand($array_message)];
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/comments?method=post&message='.urlencode($msg).'&access_token='.$data['token']), true);
			if(isset($curl['id'])) $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Bình Luận Và Nhận Được ".$success." Bình Luận Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Bình Luận Cho ID: '.htmlentities($id).'<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số Bình Luận Vừa Nhận Được Là: '.$success.' Bình Luận.<br>+ Số Bình Luận Thất Bại Là: '.$faild.' Bình Luận.<br>+ Trong Tổng: '.$limit.' Bình Luận.</p></div><script>thongbao("success", "Auto Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='auto-share'){
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$curl = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/sharedposts?method=post&access_token='.$data['token']), true);
			if(isset($curl['id'])) $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Share Và Nhận Được ".$success." Share Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Chia Sẻ Cho ID: '.htmlentities($id).'<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số Share Vừa Nhận Được Là: '.$success.' Share.<br>+ Số Share Thất Bại Là: '.$faild.' Share.<br>+ Trong Tổng: '.$limit.' Share.</p></div><script>thongbao("success", "Auto Share Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='auto-follow'){
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$curl = $work->cURL('https://graph.facebook.com/'.$id.'/subscribers?method=post&access_token='.$data['token']);
			if($curl=='true') $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Theo Dõi Và Nhận Được ".$success." Theo Dõi Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Theo Dõi Cho ID: '.htmlentities($id).'<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số Theo Dõi Vừa Nhận Được Là: '.$success.' Theo Dõi.<br>+ Số Theo Dõi Thất Bại Là: '.$faild.' Theo Dõi.<br>+ Trong Tổng: '.$limit.' Theo Dõi.</p></div><script>thongbao("success", "Auto Theo Dõi Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='auto-friend'){
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$curl = $work->cURL('https://graph.facebook.com/me/friends?uid='.$id.'&method=post&access_token='.$data['token']);
			if($curl=='true') $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Kết Bạn Và Nhận Được ".$success." Kết Bạn Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Kết Bạn Cho ID: '.htmlentities($id).'<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số Kết Bạn Vừa Nhận Được Là: '.$success.' Kết Bạn.<br>+ Số Kết Bạn Thất Bại Là: '.$faild.' Kết Bạn.<br>+ Trong Tổng: '.$limit.' Kết Bạn.</p></div><script>thongbao("success", "Auto Kết Bạn Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
	else if($type=='auto-rate'){
		if($star=='1'||$star=='2'||$star=='3'||$star=='4'||$star=='5') $check_star = true;
		if(@$check_star!=true) die('<script>thongbao("error", "Auto Rate Trang Thất Bại Do Bạn Chưa Chọn Loại Sao Hặc Loại Sao Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Auto")</script>');
		foreach($work->fetch_array("SELECT * FROM `token` ORDER BY RAND() LIMIT $limit", 0) as $data){
			$curl = $work->cURL('https://graph.facebook.com/'.$id.'/ratings?method=post&access_token='.$data['token']);
			if($curl=='true') $success++;
			else $faild++;
		}
		@$work->query("INSERT INTO `user_block` (`id_user`, `name`, `limit`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".(string)$time."')");
		@$work->query("INSERT INTO `action` (`id_user`, `name`, `content`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['name']." Vừa Sử Dụng Chức Năng Auto Rate Trang Và Nhận Được ".$success." Lần Rate Cùng ".$xu." Xu.', '".$date."', '".$time."')");
		@$work->query("UPDATE `user` SET `money` = `money` + ".$xu." WHERE `id_user` = '".$_SESSION['id_user']."'");
		@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'auto'");
		die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Auto<br>+ Auto Rate Trang Cho ID: '.htmlentities($id).'<br>+ Bạn Vừa Được Tặng: '.$xu.' Xu.<br>+ Số Đánh Giá Vừa Nhận Được Là: '.$success.' Đánh Giá.<br>+ Số Đánh Giá Thất Bại Là: '.$faild.' Đánh Giá.<br>+ Trong Tổng: '.$limit.' Đánh Giá.</p></div><script>thongbao("success", "Auto Rate Trang Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
	}
}
$work->closedb();
?>