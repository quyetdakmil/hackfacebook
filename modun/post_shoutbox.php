﻿<?php
//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

if(isset($_POST['message'])){
	if(isset($_SESSION['id_user'])){
		$id_user = $_SESSION['id_user'];
		$name = $_SESSION['name'];
		$message = $_POST['message'];
		$key_crap = array('đm','đéo','đụ','đis','địt','đjt','dit','djt','loz','lồn','buồi','lol','cặc','cẹc','cc','cl','fuck','f.u.c.k','bố','mẹ','bà',);
		$key_link = array('http','\/\/','goo\.gl','\.asia','\.com','\.tk','\.net','\.xyz','www\.','\.info','\.org','\.ga','\.top','\.vn','\.pro','\.online','\.club');
		$key_hack = array('<\/','\/>','script','hack');
		foreach($key_crap as $crap){
			if(preg_match('/' . $crap . '/',mb_strtolower($message,'utf8'))){
				$log_crap = true;
			}
		}
		foreach($key_link as $link){
			if(preg_match('/' . $link . '/',mb_strtolower($message,'utf8'))){
				$log_link = true;
			}
		}
		foreach($key_hack as $hack){
			if(preg_match('/' . $hack . '/',mb_strtolower($message,'utf8'))){
				$block_hack = true;
			}
		}
		if(isset($log_crap)){
		 	$work->query("INSERT INTO `shoutbox_log` (`id_user`, `name`, `content`, `type`, `date`, `time`) VALUES ('".$id_user."', '".$name."', 'Thành Viên: ".$name." || ID: ".$id_user." || Nói Bậy Với Nội Dung: ".$message." || Vào Lúc: ".$date."', 'allow', '".$date."', '".$time."')");
			echo '<script>thongbao("error", "Vui Lòng Không Nói Bậy Trong Shoutbox!", "Lỗi Gửi Tin");</script>';
		}
		else if(isset($log_link)){
			$work->query("INSERT INTO `shoutbox_log` (`id_user`, `name`, `content`, `type`, `date`, `time`) VALUES ('".$id_user."', '".$name."', 'Thành Viên: ".$name." || ID: ".$id_user." || Quảng Cáo Với Nội Dung: ".$message." || Vào Lúc: ".$date."', 'allow', '".$date."', '".$time."')");
			echo '<script>thongbao("error", "Vui Lòng Không Quảng Cáo Trong Shoutbox!", "Lỗi Gửi Tin");</script>';
		}
		else if(isset($block_hack)){
			$work->query("INSERT INTO `shoutbox_log` (`id_user`, `name`, `content`, `type`, `date`, `time`) VALUES ('".$id_user."', '".$name."', 'Thành Viên: ".$name." || ID: ".$id_user." || Vừa Định Tấn Công Hệ Thống Với Nội Dung: ".$message." || Vào Lúc: ".$date."', 'deny', '".$date."', '".$time."')");
			echo '<script>thongbao("error", "Cảnh Báo, Bạn Đã Bị Khoá Tài Khoản Tại '.$upcase_domain.'.", "Cảnh Báo");</script>';
			echo '<script>window.location.href = "'.$domain.'";</script>';
		}
		else if($_SESSION['id_user']==$admin_id && preg_match('/\/del shoutbox/',mb_strtolower($message,'utf8'))){
			$work->query("DELETE FROM `shoutbox`");
			$work->query("INSERT INTO `shoutbox` (`id_user`, `name`, `message`, `date`, `time`) VALUES ('".$admin_id."', 'BOT', '@".$admin_name." Vừa Xoá ShoutBox!', '".$date."', '".$time."')");
			echo '<script>thongbao("success", "Xoá Tin Nhắn Lưu Trữ Shoutbox Thành Công.", "Thông Báo");</script>';
		}
		else if($_SESSION['id_user']==$admin_id && preg_match('/\/del log/',mb_strtolower($message,'utf8'))){
			$work->query("DELETE FROM `shoutbox_log` WHERE `type` = 'allow'");
			$work->query("INSERT INTO `shoutbox` (`id_user`, `name`, `message`, `date`, `time`) VALUES ('".$admin_id."', 'BOT', '@".$admin_name." Vừa Xoá Log Nói Bậy, Quảng Cáo Trong ShoutBox!', '".$date."', '".$time."')");
			echo '<script>thongbao("success", "Xoá Log Trong Shoutbox Thành Công.", "Thông Báo");</script>';
		}
		else if($_SESSION['id_user']==$admin_id && preg_match('/\/unban_all/',mb_strtolower($message,'utf8'))){
			$work->query("DELETE FROM `shoutbox_log` WHERE `type` = 'deny'");
			$work->query("INSERT INTO `shoutbox` (`id_user`, `name`, `message`, `date`, `time`) VALUES ('".$admin_id."', 'BOT', '@".$admin_name." Vừa Gỡ Chặn Cho Tất Cả Các Thành Viên Bị Chặn Trong ShoutBox!', '".$date."', '".$time."')");
			echo '<script>thongbao("success", "Xoá Chặn Trong Shoutbox Thành Công.", "Thông Báo");</script>';
		}
		else if($_SESSION['id_user']==$admin_id && preg_match('/\/unban_/',mb_strtolower($message,'utf8'))){
			$explode = explode(' ',explode('_',$message));
			$id = $explode[0];
			$check = $work->number_row("SELECT * FROM `shoutbox_log` WHERE `id_user` = '".$id."' AND `type` = 'deny'");
			if($check!=0){
				$work->query("DELETE FROM `shoutbox_log` WHERE `id_user` = '".$id."' AND `type` = 'deny'");
				$work->query("INSERT INTO `shoutbox` (`id_user`, `name`, `message`, `date`, `time`) VALUES ('".$admin_id."', 'BOT', '@".$admin_name." Vừa Gỡ Chặn Cho Thành Viên @".$id." Bị Chặn Trong ShoutBox!', '".$date."', '".$time."')");
				echo '<script>thongbao("success", "Xoá Chặn ID '.$id.' Trong Shoutbox Thành Công.", "Thông Báo");</script>';
			}
			else echo '<script>thongbao("error", "Xoá Chặn ID '.$id.' Trong Shoutbox Thất Bại!", "Lỗi Gửi Tin");</script>';
		}
		else if($_SESSION['id_user']==$admin_id && preg_match('/\/ban_/',mb_strtolower($message,'utf8'))){
			$explode = explode('_',$message);
			$id = $explode[1];
			if(isset($explode[2])) $reason = $explode[2];
			else $reason = '(Rỗng)';
			$check = $work->number_row("SELECT * FROM `shoutbox_log` WHERE `id_user` = '".$id."' AND `type` = 'deny'");
			if($check==0){
				$work->query("INSERT INTO `shoutbox_log` (`id_user`, `name`, `content`, `type`, `date`, `time`) VALUES ('".$id."', 'BOT', '".$reason."', 'deny', '".$date."', '".$time."')");
				$work->query("INSERT INTO `shoutbox` (`id_user`, `name`, `message`, `date`, `time`) VALUES ('".$admin_id."', 'BOT', '@".$admin_name." Vừa Chặn Thành Viên @".$id." Trong ShoutBox Vì Lý Do ".$reason."!', '".$date."', '".$time."')");
				echo '<script>thongbao("success", "Chặn ID '.$id.' Trong Shoutbox Với Lý Do '.$reason.' Thành Công.", "Thông Báo");</script>';
			}
			else echo '<script>thongbao("error", "Thành Viên Có ID '.$id.' Đã Bị Chặn Trong Shoutbox Trước Khi Bạn Chặn!", "Lỗi Gửi Tin");</script>';
		}
		else{
			$work->query("INSERT INTO `shoutbox` (`id_user`, `name`, `message`, `date`, `time`) VALUES ('".$id_user."', '".$name."', '".$work->secu($message)."', '".$date."', '".$time."')");
			echo '<script>thongbao("success", "Gửi Tin Nhắn Thành Công.", "Thông Báo");</script>';
		}
	}
	else echo '<script>window.location.href = "'.$domain.'";</script>';
}
if($work->number_row("SELECT * FROM `shoutbox`")==0){
?>
												<div class="shoutbox-class">
												Không Có Tin Nhắn Nào!
												</div>
<?php
}
else{
	foreach($work->fetch_array("SELECT * FROM `shoutbox` ORDER BY `id` DESC LIMIT 30", 0) as $data){
		if($data['id_user']==$admin_id&&$data['name']==$admin_name) $data['name'] = '<font class="admin">'.$data['name'].' <i class="fa fa-check-square" aria-hidden="true" tille="Đã Xác Minh"></i></font>';
		else if($data['id_user']==$admin_id) $data['name'] = '<font class="bot">'.$data['name'].' <i class="fa fa-check-square" aria-hidden="true" tille="Đã Xác Minh"></i></font>';
		/* Chức Năng Đính Tag Shoutbox
		if(preg_match("/@(.*?) /", $data['message'], $string)){ // Trường Hợp @id Nằm Ngoài Đầu Và Có Tin Nhắn Kế Tiếp
			if($work->number_row("SELECT * FROM `user` WHERE `id_user` = '".$string[1]."'")!=0){
				$get_name = $work->get_db('*', 'user', 'id_user', $string[1]);
				$name = $get_name['name'];
				$name = '<a href="'.$domain.'/profile.ken?id='.$data['id_user'].'">'.$name.'</a>';
				$data['message'] = str_replace('@'.$string[1], $name, $data['message']);
			}
		}
		else{ // Trường Hợp Chỉ Có @id, Các Trường Hợp Khác Méo Biết Làm :3
			$id = str_replace('@', '', $data['message']);
			if($work->number_row("SELECT * FROM `user` WHERE `id_user` = '".$id."'")!=0){
				$get_name = $work->get_db('*', 'user', 'id_user', $id);
				$name = $get_name['name'];
				$name = '<a href="'.$domain.'/profile.ken?id='.$data['id_user'].'">'.$name.'</a>';
				$data['message'] = str_replace('@'.$id, $name, $data['message']);
			}
		}
		*/
?>
												<div class="shoutbox-class">
													<?php if($work->number_row("SELECT * FROM `online` WHERE `id_user` = '".$data['id_user']."'") != 0){ ?>
													<span style="background: rgb(66, 183, 42); border-radius: 50%; display: inline-block; height: 6px;width: 6px;"></span>
													<?php }else{ ?>
												
												<i class="fa fa-mobile"></i>
													<?php } ?>
													<a href="<?php echo $domain.'/profile.ken?id='.$data['id_user']; ?>" target="_blank" class="username"><?php echo $data['name']; ?></a> : <?php echo $data['message']; ?>
													<time><?php echo $data['date']; ?></time>
												</div>
<?php
	}
}
$work->closedb();
?>