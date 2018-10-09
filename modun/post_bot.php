<?php
//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//
if(isset($_POST)&&isset($_SESSION['id_user'])){
	$type = @$_POST['type'];
	$captcha = @$_POST['captcha'];
	$caidat = $work->secu(@$_POST['caidat']);
	$type_reaction = $work->secu(@$_POST['reaction']);
	$caidatcmt = $work->secu(@$_POST['caidatcmt']);
	$bieutuong = $work->secu(@$_POST['bieutuong']);
	$quangcao = $work->secu(@$_POST['quangcao']);
	if(isset($_POST['interact'])) $interact = base64_encode($_POST['interact']);
	if(isset($_POST['comment'])) $comment = base64_encode($_POST['comment']);
	if(isset($_POST['message'])) $message = base64_encode($_POST['message']);
	$show_interact = htmlentities(@$_POST['interact'], ENT_COMPAT | ENT_HTML401, "UTF-8"); // Bình Luận Tương Tác
	$show_comment = htmlentities(@$_POST['comment'], ENT_COMPAT | ENT_HTML401, "UTF-8"); // Bình Luận Comment
	$show_message = htmlentities(@$_POST['message'], ENT_COMPAT | ENT_HTML401, "UTF-8"); // Tin Nhắn Inbox
	if(@$bieutuong=='ON') $bieutuong = 'ON'; else $bieutuong = 'OFF';
	if(@$quangcao=='ON') $quangcao = 'ON'; else $quangcao = 'OFF';
	if(@$caidatcmt=='ON') $caidatcmt = 'ON'; else $caidatcmt = 'OFF';
	if(@$_SESSION['_CAPTCHA']!=$captcha) die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Hệ Thống Phát Hiện Bạn Mở Quá Nhiều Tab Bot.<br>+ Vui Lòng Chỉ Mở Một Tab Bot Thích Hợp.</p></div><script>thongbao("error", "Phát Hiện Flood Bot!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
	if($type=='bot-like'){ // Bot Like
		if($caidat=='ON'){
			if($work->number_row("SELECT * FROM `botlike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botlike` (`id_user`, `name`, `token`, `caidatcmt`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$caidatcmt."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Like Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Like Bình Luận: '.$caidatcmt.'.</p></div><script>thongbao("success", "Cài Đặt Bot Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Like Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Like Thất Bại Do Bạn Đã Cài Bot Like Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($work->number_row("SELECT * FROM `botlike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Like!</p></div><script>thongbao("error", "Cập Nhật Bot Like Thất Bại Do Bạn Chưa Cài Bot Like!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botlike` SET `token` = '".$_SESSION['access_token']."', `caidatcmt` = '".$caidatcmt."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Like Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Like Bình Luận: '.$caidatcmt.'.</p></div><script>thongbao("success", "Cập Nhật Bot Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botlike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Like!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Like Thất Bại Do Bạn Chưa Cài Bot Like!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botlike` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Like Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-exlike'){ // Bot Trao Đổi Like
		if($caidat=='ON'){
			if($work->number_row("SELECT * FROM `botexlike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botexlike` (`id_user`, `name`, `token`, `caidatcmt`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$caidatcmt."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trao Đổi Like Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Trao Đổi Like Bình Luận: '.$caidatcmt.'.</p></div><script>thongbao("success", "Cài Đặt Bot Trao Đổi Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trao Đổi Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Trao Đổi Like Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Trao Đổi Like Thất Bại Do Bạn Đã Cài Bot Trao Đổi Like Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($work->number_row("SELECT * FROM `botexlike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trao Đổi Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Like!</p></div><script>thongbao("error", "Cập Nhật Bot Trao Đổi Like Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Like!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botexlike` SET `token` = '".$_SESSION['access_token']."', `caidatcmt` = '".$caidatcmt."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trao Đổi Like Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Trao Đổi Like Bình Luận: '.$caidatcmt.'.</p></div><script>thongbao("success", "Cập Nhật Bot Trao Đổi Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botexlike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trao Đổi Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Like!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Trao Đổi Like Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Like!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botexlike` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trao Đổi Like Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Trao Đổi Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-reaction'){ // Bot Cảm Xúc
		if($caidat=='ON'){
			if($type_reaction=='LOVE'||$type_reaction=='WOW'||$type_reaction=='HAHA'||$type_reaction=='SAD'||$type_reaction=='ANGRY') $reaction = true;
			if(@$reaction!=true) die('<script>thongbao("error", "Cài Đặt Bot Cảm Xúc Thất Bại Do Bạn Chưa Chọn Cảm Xúc Hoặc Cảm Xúc Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Bot")</script>');
			if($work->number_row("SELECT * FROM `botreaction` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botreaction` (`id_user`, `name`, `token`, `camxuc`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$type_reaction."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Cảm Xúc: '.$type_reaction.'.</p></div><script>thongbao("success", "Cài Đặt Bot Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Cảm Xúc Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Cảm Xúc Thất Bại Do Bạn Đã Cài Bot Cảm Xúc Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($type_reaction=='LOVE'||$type_reaction=='WOW'||$type_reaction=='HAHA'||$type_reaction=='SAD'||$type_reaction=='ANGRY') $reaction = true;
			if(@$reaction!=true) die('<script>thongbao("error", "Cập Nhật Bot Cảm Xúc Thất Bại Do Bạn Chưa Chọn Cảm Xúc Hoặc Cảm Xúc Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Bot")</script>');
			if($work->number_row("SELECT * FROM `botreaction` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Cảm Xúc!</p></div><script>thongbao("error", "Cập Nhật Bot Cảm Xúc Thất Bại Do Bạn Chưa Cài Bot Cảm Xúc!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botreaction` SET `token` = '".$_SESSION['access_token']."', `camxuc` = '".$type_reaction."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Cảm Xúc: '.$type_reaction.'.</p></div><script>thongbao("success", "Cập Nhật Bot Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botreaction` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Cảm Xúc!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Cảm Xúc Thất Bại Do Bạn Chưa Cài Bot Cảm Xúc!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botreaction` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-exreaction'){ // Bot Trao Đổi Cảm Xúc
		if($caidat=='ON'){
			if($type_reaction=='LOVE'||$type_reaction=='WOW'||$type_reaction=='HAHA'||$type_reaction=='SAD'||$type_reaction=='ANGRY') $reaction = true;
			if(@$reaction!=true) die('<script>thongbao("error", "Cài Đặt Bot Trao Đổi Cảm Xúc Thất Bại Do Bạn Chưa Chọn Cảm Xúc Hoặc Cảm Xúc Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Bot")</script>');
			if($work->number_row("SELECT * FROM `botexreaction` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botexreaction` (`id_user`, `name`, `token`, `camxuc`, `caidatcmt`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$type_reaction."', '".$caidatcmt."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trao Đổi Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Cảm Xúc: '.$type_reaction.'.<br>+ Trao Đổi Cảm Xúc Bình Luận: '.$caidatcmt.'.</p></div><script>thongbao("success", "Cài Đặt Bot Trao Đổi Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trao Đổi Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Trao Đổi Cảm Xúc Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Trao Đổi Cảm Xúc Thất Bại Do Bạn Đã Cài Bot Trao Đổi Cảm Xúc Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($type_reaction=='LOVE'||$type_reaction=='WOW'||$type_reaction=='HAHA'||$type_reaction=='SAD'||$type_reaction=='ANGRY') $reaction = true;
			if(@$reaction!=true) die('<script>thongbao("error", "Cập Nhật Bot Cảm Xúc Thất Bại Do Bạn Chưa Chọn Cảm Xúc Hoặc Cảm Xúc Bạn Chọn Không Có Trong Danh Sách!", "Lỗi Bot")</script>');
			if($work->number_row("SELECT * FROM `botexreaction` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trao Đổi Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Cảm Xúc!</p></div><script>thongbao("error", "Cập Nhật Bot Trao Đổi Cảm Xúc Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Cảm Xúc!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botexreaction` SET `token` = '".$_SESSION['access_token']."', `camxuc` = '".$type_reaction."', `caidatcmt` = '".$caidatcmt."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trao Đổi Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Cảm Xúc: '.$type_reaction.'.<br>+ Trao Đổi Cảm Xúc Bình Luận: '.$caidatcmt.'.</p></div><script>thongbao("success", "Cập Nhật Bot Trao Đổi Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botexreaction` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trao Đổi Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Cảm Xúc!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Trao Đổi Cảm Xúc Thất Bại Do Bạn Chưa Cài Bot Trao Đổi Cảm Xúc!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botexreaction` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trao Đổi Cảm Xúc Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Trao Đổi Cảm Xúc Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-interact'){ // Bot Tương Tác
		if($caidat=='ON'){
			if($work->number_row("SELECT * FROM `botinteract` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botinteract` (`id_user`, `name`, `token`, `content`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$interact."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				if(@$_POST['interact']!='') die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung: '.$show_interact.'</p></div><script>thongbao("success", "Cài Đặt Bot Tương Tác Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
				else die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung(Rỗng): Sử Dụng Nội Dung Tương Tác Mặc Định.</p></div><script>thongbao("success", "Cài Đặt Bot Tương Tác Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Tương Tác Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Tương Tác Thất Bại Do Bạn Đã Cài Bot Tương Tác Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($work->number_row("SELECT * FROM `botinteract` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Tương Tác!</p></div><script>thongbao("error", "Cập Nhật Bot Tương Tác Thất Bại Do Bạn Chưa Cài Bot Tương Tác!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botinteract` SET `token` = '".$_SESSION['access_token']."', `content` = '".$interact."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				if(@$_POST['interact']!='') die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung: '.$show_interact.'</p></div><script>thongbao("success", "Cập Nhật Bot Tương Tác Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
				else die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung(Rỗng): Sử Dụng Nội Dung Tương Tác Mặc Định.</p></div><script>thongbao("success", "Cập Nhật Bot Tương Tác Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botinteract` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Tương Tác!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Tương Tác Thất Bại Do Bạn Chưa Cài Bot Tương Tác!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botinteract` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Tương Tác Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Tương Tác Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-comment'){ // Bot Bình Luận
		if($caidat=='ON'){
			if($work->number_row("SELECT * FROM `botcomment` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botcomment` (`id_user`, `name`, `token`, `bieutuong`, `quangcao`, `content`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$bieutuong."', '".$quangcao."', '".$comment."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				if(@$_POST['comment']!='') die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung: '.$show_comment.'<br>+ Biểu Tượng: '.$bieutuong.'<br>+ Quảng Cáo: '.$quangcao.'</p></div><script>thongbao("success", "Cài Đặt Bot Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
				else die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung(Rỗng): Sử Dụng Nội Dung Bình Luận Mặc Định.<br>+ Biểu Tượng: '.$bieutuong.'<br>+ Quảng Cáo: '.$quangcao.'</p></div><script>thongbao("success", "Cài Đặt Bot Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Bình Luận Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Bình Luận Thất Bại Do Bạn Đã Cài Bot Bình Luận Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($work->number_row("SELECT * FROM `botcomment` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Bình Luận!</p></div><script>thongbao("error", "Cập Nhật Bot Bình Luận Thất Bại Do Bạn Chưa Cài Bot Bình Luận!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botcomment` SET `token` = '".$_SESSION['access_token']."', `bieutuong` = '".$bieutuong."', `quangcao` = '".$quangcao."', `content` = '".$comment."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				if(@$_POST['comment']!='') die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung: '.$show_comment.'<br>+ Biểu Tượng: '.$bieutuong.'<br>+ Quảng Cáo: '.$quangcao.'</p></div><script>thongbao("success", "Cập Nhật Bot Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
				else die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung(Rỗng): Sử Dụng Nội Dung Bình Luận Mặc Định.<br>+ Biểu Tượng: '.$bieutuong.'<br>+ Quảng Cáo: '.$quangcao.'</p></div><script>thongbao("success", "Cập Nhật Bot Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botcomment` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Bình Luận!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Bình Luận Thất Bại Do Bạn Chưa Cài Bot Bình Luận!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botcomment` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Bình Luận Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Bình Luận Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-relike'){ // Bot Trả Like
		if($caidat=='ON'){
			if($work->number_row("SELECT * FROM `botrelike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botrelike` (`id_user`, `name`, `token`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trả Like Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Cài Đặt Bot Trả Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trả Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Trả Like Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Trả Like Thất Bại Do Bạn Đã Cài Bot Trả Like Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($work->number_row("SELECT * FROM `botrelike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trả Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trả Like!</p></div><script>thongbao("error", "Cập Nhật Bot Trả Like Thất Bại Do Bạn Chưa Cài Bot Trả Like!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botrelike` SET `token` = '".$_SESSION['access_token']."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trả Like Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Cập Nhật Bot Trả Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botrelike` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trả Like Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trả Like!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Trả Like Thất Bại Do Bạn Chưa Cài Bot Trả Like!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botrelike` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trả Like Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Trả Like Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
	else if($type=='bot-inbox'){ // Bot Trả Lời Tin Nhắn Tự Động
		if($caidat=='ON'){
			if($work->number_row("SELECT * FROM `botinbox` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
				@$work->query("INSERT INTO `botinbox` (`id_user`, `name`, `token`, `content`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."', '".$message."')");
				@$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'bot'");
				if(@$_POST['message']!='') die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung: '.$show_message.'</p></div><script>thongbao("success", "Cài Đặt Bot Trả Lời Tin Nhắn Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
				else die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung(Rỗng): Sử Dụng Nội Dung Trả Lời Tin Nhắn Mặc Định.</p></div><script>thongbao("success", "Cài Đặt Bot Trả Lời Tin Nhắn Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
			else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cài Đặt Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Đã Cài Bot Trả Lời Tin Nhắn Trước Đó!</p></div><script>thongbao("error", "Cài Đặt Bot Trả Lời Tin Nhắn Thất Bại Do Bạn Đã Cài Bot Trả Lời Tin Nhắn Trước Đó!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
		}
		else if($caidat=='UP'){
			if($work->number_row("SELECT * FROM `botinbox` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trả Lời Tin Nhắn!</p></div><script>thongbao("error", "Cập Nhật Bot Trả Lời Tin Nhắn Thất Bại Do Bạn Chưa Cài Bot Trả Lời Tin Nhắn!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("UPDATE `botinbox` SET `token` = '".$_SESSION['access_token']."', `content` = '".$message."' WHERE `id_user` = '".$_SESSION['id_user']."'");
				if(@$_POST['message']!='') die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung: '.$show_message.'</p></div><script>thongbao("success", "Cập Nhật Bot Trả Lời Tin Nhắn Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
				else die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Cập Nhật Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thành Công.<br>+ Nội Dung(Rỗng): Sử Dụng Nội Dung Trả Lời Tin Nhắn Mặc Định.</p></div><script>thongbao("success", "Cập Nhật Bot Trả Lời Tin Nhắn Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
		else if($caidat=='OFF'){
			if($work->number_row("SELECT * FROM `botinbox` WHERE `id_user` = '".$_SESSION['id_user']."'")==0)
				die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thất Bại Do Bạn Chưa Cài Bot Trả Lời Tin Nhắn!</p></div><script>thongbao("error", "Huỷ Cài Đặt Bot Trả Lời Tin Nhắn Thất Bại Do Bạn Chưa Cài Bot Trả Lời Tin Nhắn!", "Lỗi Bot")</script><meta http-equiv="refresh" content="5">');
			else{
				@$work->query("DELETE FROM `botinbox` WHERE `id_user` = '".$_SESSION['id_user']."'");
				die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Bot<br>+ Huỷ Cài Đặt Bot Trả Lời Tin Nhắn Cho ID: '.$_SESSION['id_user'].' Thành Công.</p></div><script>thongbao("success", "Huỷ Cài Đặt Bot Trả Lời Tin Nhắn Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
			}
		}
	}
}
$work->closedb();
?>