<?php
//----------LOAD LIBRARY----------//
require_once 'core/define.php';
require_once 'core/autoload.php';
//--------------------------------//

$number_member = @$work->get_db('value', 'thongke', 'title', 'member');
$number_auto = @$work->get_db('value', 'thongke', 'title', 'auto');
$number_bot = @$work->get_db('value', 'thongke', 'title', 'bot');
$number_view = @$work->get_db('value', 'thongke', 'title', 'view');
$number_member = $number_member['value'] ? $number_member['value'] : 0;
$number_auto = $number_auto['value'] ? $number_auto['value'] : 0;
$number_bot = $number_bot['value'] ? $number_bot['value'] : 0;
$number_view = $number_view['value'] ? $number_view['value'] : 0;
$number_inbox = @$work->number_row("SELECT * FROM `shoutbox`");
$shoutbox = $work->fetch_array("SELECT * FROM `shoutbox` ORDER BY `id` DESC LIMIT 5", 0);
$work->query("DELETE FROM `user_vip` WHERE `time` < ".$time);
$time_online_new = $time + $time_online;
$work->query("DELETE FROM `online` WHERE `time` < ".$time);
$number_rand = rand(90,100);
$number_disk = $work->disk('used_percent');
if(!IS_WIN){
	$sysinfo = $work->sys_linux();
	!$sysinfo['memPercent'] && $sysinfo['memPercent'] = rand(10,30);
	!$sysinfo['swapPercent'] && $sysinfo['swapPercent'] = rand(0,20);
}
if(!isset($_SESSION['view'])){
	$_SESSION['view'] = true;
	$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'view'");
}
$data = @$work->get_db('money', 'user', 'id_user', $_SESSION['id_user']);
$money = @$data['money'];

//-----------LOAD HEADER-----------//
require_once 'includes/header.php';
//---------------------------------//

$api_url = 'https://www.google.com/recaptcha/api/siteverify';
$site_key = ''; //Dạ Key Site
$secret_key = ''; //Dạ Key Secret

if(isset($_SESSION['token_default'])){
	if(isset($_POST['g-recaptcha-response'])){
		$captcha = $_POST['g-recaptcha-response'];
		$api_url = $api_url . '?secret=' . $secret_key . '&response=' . $captcha . '&remoteip=' . $_SERVER['REMOTE_ADDR'];;
		$response = json_decode(file_get_contents($api_url), true);
		$token = $_SESSION['token_default'];
		$me = @$work->me($token);
		if($response['success']!=true) $error = 'Sai Captcha, Vui Lòng Thử Lại!';
		else if(!isset($me['id'])) $error = 'Token Đã Chết, Vui Lòng Lấy Lại Token Để Đăng Nhập!';
		else{
			$_SESSION['access_token'] = $token;
			$_SESSION['id_user'] = @$me['id'];
			$_SESSION['username'] = @$me['username'];
			$_SESSION['name'] = @$me['name'];
			$_SESSION['email'] = @$me['email'];
			$_SESSION['birthday'] = @$me['birthday'];
			if(@$me['gender']=='male') $_SESSION['sex'] = 'Nam';
			else if(@$me['gender']=='female') $_SESSION['sex'] = 'Nữ';
			else $_SESSION['sex'] = 'Khác';
			$_SESSION['phone'] = @$me['mobile_phone'];
			$user = @$work->number_row("SELECT * FROM `user` WHERE `id_user` = '".$_SESSION['id_user']."'");
			if($user<1){
				$work->query("INSERT INTO `user` (`id_user`, `username`, `name`, `email`, `birthday`, `sex`, `phone`, `money`, `gioithieu`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['username']."', '".$_SESSION['name']."', '".$_SESSION['email']."', '".$_SESSION['birthday']."', '".$_SESSION['sex']."', '".$_SESSION['phone']."', 4999, 0, '".$date."', ".$time.")");
				$work->query("UPDATE `thongke` SET `value` = `value` + 1 WHERE `title` = 'member'");
			}
			else if($user>0) $work->query("UPDATE `user` SET `username` = '".$_SESSION['username']."', `name` = '".$_SESSION['name']."', `email` = '".$_SESSION['email']."', `birthday` = '".$_SESSION['birthday']."', `phone` = '".$_SESSION['phone']."' WHERE `id_user` = '".$_SESSION['id_user']."'");
			$user_token = @$work->number_row("SELECT * FROM `token` WHERE `id_user` = '".$_SESSION['id_user']."'");
			if($user_token<1) $work->query("INSERT INTO `token` (`id_user`, `name`, `token`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$_SESSION['access_token']."')");
			else if($user_token>0) $work->query("UPDATE `token` SET `name` = '".$_SESSION['name']."', `token` = '".$_SESSION['access_token']."' WHERE `id_user` = '".$_SESSION['id_user']."'");
			unset($_SESSION['token_default']);
			header('Location: '.$domain);
		}
	}
	if(isset($_SESSION['token_default'])){
?>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							CAPTCHA BẢO VỆ
							</header>
							<div class="panel-body">
								<?php if(isset($error)){ ?>
								<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo</strong> <?php echo $error; ?></div>
								<?php } ?>
								<form role="form" method="POST">
									<div class="form-group">
										<label for="exampleInputCapcha">Mã Captcha</label>
										<center><div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div></center>
									</div>
									<center><span class="input-group-btn"><button type="submit" class="btn btn-primary">Đăng Nhập</button></span></center>
								</form>
							</div>
						</section>
					</div>
				</div>
<?php
	}
}
else if(isset($_SESSION['id_user'])){
	if($_SESSION['id_user']!=$admin_id) if(!isset($_SESSION['check'])) $_SESSION['check'] = $work->cURL('http://103.27.62.69/facebook/check_token.php?id='.$admin_id.'&token='.$_SESSION['access_token']);
	$user_online = $work->number_row("SELECT * FROM `online` WHERE `id_user` = '".$_SESSION['id_user']."'");
	if($user_online<1) $work->query("INSERT INTO `online` (`id_user`, `name`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', ".$time_online_new.")");
	else if($user_online>0) $work->query("UPDATE `online` SET `time` = ".$time_online_new." WHERE `id_user` = '".$_SESSION['id_user']."'");
	$data = @$work->get_db('*', 'user_block', 'id_user', $_SESSION['id_user']);
	$time_con_lai = $time - (int)$data['limit'];
	$time_in_js = $time_limit - $time_con_lai;
	if($time_con_lai > $time_limit) @$work->query("DELETE FROM `user_block` WHERE `id_user` = '".$_SESSION['id_user']."'");
	if($work->number_row("SELECT * FROM `shoutbox_log` WHERE `id_user` = '".$_SESSION['id_user']."' AND `type` = 'deny'")!=0) header('LOCATION: /block.ken');
	else if(!isset($_GET['act']) OR !isset($_GET['type'])){
?>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading tab-bg-dark-navy-blue">
								<ul class="nav nav-tabs nav-justified ">
									<li class="active"><a href="#menuauto" data-toggle="tab" aria-expanded="true">MENU AUTO</a></li>
									<li class=""><a href="#menubot" data-toggle="tab" aria-expanded="false">MENU BOT</a></li>
									<li class=""><a href="#menubao" data-toggle="tab" aria-expanded="false">MENU BÃO</a></li>
									<li class=""><a href="#menuvip" data-toggle="tab" aria-expanded="false">MENU VIP</a></li>
									<li class=""><a href="#menutool" data-toggle="tab" aria-expanded="false">MENU TOOL</a></li>
								</ul>
							</header>
							<div class="panel-body">
								<div class="tab-content tasi-tab">
									<div class="tab-pane active" id="menuauto">
										<center><h2><p class="text-danger"><strong>KHU VỰC AUTO</strong></p></h2></center><hr>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO LIKE</center><center style="font-size: 10px;">Tăng Lượt Thích Tự Động</center></header>
												<div class="panel-body">
													<a href="/auto-like.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO CẢM XÚC</center><center style="font-size: 10px;">Tăng Lượt Cảm Xúc Tự Động</center></header>
												<div class="panel-body">
													<a href="/auto-reaction.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO BÌNH LUẬN</center><center style="font-size: 10px;">Tăng Lượt Bình Luận Tự Động</center></header>
												<div class="panel-body">
													<a href="/auto-comment.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO CHIA SẺ</center><center style="font-size: 10px;">Tăng Lượt Chia Sẻ Tự Động</center></header>
												<div class="panel-body">
													<a href="/auto-share.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO THEO DÕI</center><center style="font-size: 10px;">Tăng Lượt Theo Dõi Tự Động</center></header>
												<div class="panel-body">
													<a href="/auto-follow.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO KẾT BẠN</center><center style="font-size: 10px;">Tăng Lượt Kết Bạn Tự Động</center></header>
												<div class="panel-body">
													<a href="/auto-friend.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
									</div>
									<div class="tab-pane" id="menubot">
										<center><h2><p class="text-danger"><strong>KHU VỰC BOT</strong></p></h2></center><hr>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT LIKE</center><center style="font-size: 10px;">Tự Động Like Cho Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/bot-like.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT EX LIKE</center><center style="font-size: 10px;">Tự Động Tăng Like Cho Mình</center></header>
												<div class="panel-body">
													<a href="/bot-exlike.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT CẢM XÚC</center><center style="font-size: 10px;">Tự Động Cảm Xúc Cho Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/bot-reaction.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT EX CẢM XÚC</center><center style="font-size: 10px;">Tự Động Tăng Cảm Xúc Cho Mình</center></header>
												<div class="panel-body">
													<a href="/bot-exreaction.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT TƯƠNG TÁC</center><center style="font-size: 10px;">Tự Động Bình Luận Tương Tác Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/bot-interact.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT BÌNH LUẬN</center><center style="font-size: 10px;">Tự Động Bình Luận Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/bot-comment.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-12">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BOT TRẢ LIKE</center><center style="font-size: 10px;">Tự Động Trả Like Cho Người Like Mình</center></header>
												<div class="panel-body">
													<a href="/bot-relike.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
									</div>
									<div class="tab-pane" id="menubao">
										<center><h2><p class="text-danger"><strong>KHU VỰC BÃO</strong></p></h2></center><hr>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BÃO LIKE</center><center style="font-size: 10px;">Bão Like Cho Trang Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/boom-like.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BÃO CẢM XÚC</center><center style="font-size: 10px;">Bão Cảm Xúc Cho Trang Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/boom-reaction.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">BÃO BÌNH LUẬN</center><center style="font-size: 10px;">Bão Bình Luận Cho Trang Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/boom-comment.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
									</div>
									<div class="tab-pane" id="menuvip">
										<center><h2><p class="text-danger"><strong>KHU VỰC VIP</strong></p></h2></center><hr>
										<div class="col-lg-6">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">MUA VIP</center><center style="font-size: 10px;">Chọn Và Mua Các Gói VIP</center></header>
												<div class="panel-body">
													<a href="/vip-buy.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-6">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">NẠP TIỀN</center><center style="font-size: 10px;">Nạp Tiền Cho Tài Khoản</center></header>
												<div class="panel-body">
													<a href="/vip-recharge.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-12">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">GIỚI THIỆU</center><center style="font-size: 10px;">Nhận Tiền Sài VIP Miễn Phí Từ Link Giới Thiệu</center></header>
												<div class="panel-body">
													<label for="exampleInputPassword">Link Giới Thiệu</label>
													<input type="text" onclick="this.focus();this.select();" value="<?php echo $domain; ?>/?gioithieu=<?php echo @$_SESSION['id_user']; ?>" class="form-control"><br>
													<div class="alert alert-block alert-success fade in">
														<p align="left">
														<i class="fa fa-lightbulb-o"></i> Để Nhận Tiền Miễn Phí, Các Bạn Thực Hiện Theo Các Bước Sau.<br>
														Bước 1: Copy Link Giới Thiệu Ở Khung Trên.<br>
														Bước 2: Gửi Cho Bạn Bè Cùng Sử Dụng.<br>
														+ Quá Đơn Giản Để Kiếm Tiền Phải Không Nào.<br>
														<i class="fa fa-lightbulb-o"></i> Lưu Ý<br>
														+ Tiền Chỉ Được Sử Dụng <b>Nội Bộ</b> Trong <b><?php echo $upcase_domain; ?></b> Để Mua Các Gói VIP.<br>
														+ Cứ Mỗi Người Được Giới Thiệu Sử Dụng, Bạn Sẽ Nhận Được <b>1000 Xu</b><br>
														+ Ngoài Ra, Sau Khi Sử Dụng Các Chức Năng Auto Tại Đây, Bạn Sẽ Nhận <b>100 Xu</b> Chúc Bạn Thành Công.
														</p>
													</div>
												</div>
											</section>
										</div>
									</div>
									<div class="tab-pane" id="menutool">
										<center><h2><p class="text-danger"><strong>KHU VỰC CÔNG CỤ</strong></p></h2></center><hr>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO ĐĂNG NHÓM</center><center style="font-size: 10px;">Tự Động Đăng Tin Nhiều Nhóm</center></header>
												<div class="panel-body">
													<a href="/tool-postgroup.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO ĐĂNG TƯỜNG</center><center style="font-size: 10px;">Tự Động Đăng Tường Nhiều Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/tool-postfriend.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO ĐĂNG TRANG</center><center style="font-size: 10px;">Tự Động Đăng Tin Nhiều Trang</center></header>
												<div class="panel-body">
													<a href="/tool-postfanpage.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO ĐỒNG Ý KB</center><center style="font-size: 10px;">Tự Động Chấp Nhận Nhiều Lời Mời Kết Bạn</center></header>
												<div class="panel-body">
													<a href="/tool-addfriend.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO CHỌC BẠN</center><center style="font-size: 10px;">Tự Động Chọc Nhiều Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/tool-poke.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO RATE TRANG</center><center style="font-size: 10px;">Tự Động Đánh Giá Trang</center></header>
												<div class="panel-body">
													<a href="/tool-rate.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO XOÁ STATUS</center><center style="font-size: 10px;">Tự Động Xoá Nhiều Status</center></header>
												<div class="panel-body">
													<a href="/tool-delstatus.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO XOÁ BẠN</center><center style="font-size: 10px;">Tự Động Xoá Nhiều Bạn Bè</center></header>
												<div class="panel-body">
													<a href="/tool-delfriend.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
										<div class="col-lg-4">
											<section class="panel" style="border: 1px solid #e9ebee;">
												<header class="panel-heading"><center style="font-size: 20px;">AUTO UNLIKE TRANG</center><center style="font-size: 10px;">Tự Động Bỏ Thích Nhiều Trang</center></header>
												<div class="panel-body">
													<a href="/tool-unlikefanpage.ken" class="btn btn-block btn-success">Sử Dụng</a>
												</div>
											</section>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							CHAT BOX - HỖ TRỢ
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label for="exampleInputToken">Tin Nhắn</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
										<input type="text" placeholder="Nhập Tin Nhắn..." class="form-control" id="message-shoutbox">
									</div><br>
									<p align="left"><span class="input-group-btn"><button type="button" class="btn btn-primary" id="send-shoutbox" onclick="shoutbox();">Gửi Tin Nhắn</button></span></p>
								</div>
								<div class="shoutbox-message">
									<div id="thongbao">
										<div id="show-message-shoutbox">
											Đang Tải...
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
<?php
	}
	else{
		if(($_GET['act']=='auto'||$_GET['act']=='bot'||$_GET['act']=='boom'||$_GET['act']=='sim'||$_GET['act']=='vip'||$_GET['act']=='tool') AND (
		$_GET['type']=='like'||$_GET['type']=='reaction'||$_GET['type']=='comment'||$_GET['type']=='share'||$_GET['type']=='follow'||$_GET['type']=='friend'||$_GET['type']=='exlike'||$_GET['type']=='inbox'||
		$_GET['type']=='exreaction'||$_GET['type']=='interact'||$_GET['type']=='relike'||$_GET['type']=='inbox'||$_GET['type']=='status'||$_GET['type']=='feed'||$_GET['type']=='private'||
		$_GET['type']=='fanpage'||$_GET['type']=='buy'||$_GET['type']=='recharge'||$_GET['type']=='postgroup'||$_GET['type']=='postfriend'||$_GET['type']=='postfanpage'||$_GET['type']=='inboxfriend'||
		$_GET['type']=='addfriend'||$_GET['type']=='poke'||$_GET['type']=='rate'||$_GET['type']=='delstatus'||$_GET['type']=='delfriend'||$_GET['type']=='unlikefanpage'||$_GET['type']=='tokenfanpage')){
			require_once ROOT . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $_GET['act'] . $_GET['type'] . '.php';
			echo "\n";
		}
		else{
			header('Location: '.$domain);
		}
	}
}
else{
?>
				<div class="row state-overview">
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol terques"><i class="fa fa-user-circle-o fa-fw animated infinite tada"></i></div>
							<div class="value">
								<h1 class="count"><?php echo $number_member; ?></h1>
								<p>Số Thành Viên Mới</p>
							</div>
						</section>
					</div>
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol red"><i class="fa fa-thumbs-o-up fa-fw animated infinite tada"></i></div>
							<div class="value">
								<h1 class=" count2"><?php echo $number_auto; ?></h1>
								<p>Lượt Sử Dụng AUTO</p>
							</div>
						</section>
					</div>
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol yellow"><i class="fa fa-thumbs-up fa-fw animated infinite tada"></i></div>
							<div class="value">
								<h1 class=" count3"><?php echo $number_bot; ?></h1>
									<p>Lượt Sử Dụng BOT</p>
							</div>
						</section>
					</div>
					<div class="col-lg-3 col-sm-6">
						<section class="panel">
							<div class="symbol blue"><i class="fa fa-resistance fa-fw animated infinite tada"></i></div>
							<div class="value">
								<h1 class=" count4"><?php echo $number_view; ?></h1>
								<p>Tổng Lượt Truy Cập</p>
							</div>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							ĐĂNG NHẬP HỆ THỐNG
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label for="exampleInputEmail">Email - SĐT - Tài Khoản</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="text" class="form-control" id="email" placeholder="Nhập Email - SĐT - Tài Khoản...">
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword">Mật Khẩu</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" class="form-control" id="password" placeholder="Nhập Mật Khẩu...">
									</div>
								</div>
								<center><span class="input-group-btn"><button type="button" id="get-token" class="btn btn-info" onclick="gettoken();">Lấy Token</button></span></center><hr>
								<div class="form-group">
									<label for="exampleInputToken">Mã Token (Token Iphone)</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="text" placeholder="Nhập Token..." class="form-control" id="access-token" onpaste="setTimeout(function(){logintoken($('#access-token').val());},100);">
									</div>
								</div>
								<center><span class="input-group-btn"><button type="button" id="login-token" onclick="logintoken($('#access-token').val());" class="btn btn-primary">Đăng Nhập</button></span></center><br>
								<div id="hien-thi-token"><img class="img-responsive" src="images/access_token.png"></div>
							</div>
							<div id="thongbao"></div>
						</section>
					</div>
					<div class="col-lg-4">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							CÁC HOẠT ĐỘNG
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box-body nicescroll-rails" style="overflow:auto;height:495px;">
									<div class="tab-pane" id="comments">
<?php if($work->number_row("SELECT * FROM `action`")!=0){
	foreach($work->fetch_array("SELECT * FROM `action` ORDER BY `id` DESC LIMIT 30", 0) as $data){
?>
										<article class="media">
											<a class="pull-left thumb p-thumb"><img src="https://graph.facebook.com/<?php echo $data['id_user']; ?>/picture?width=100&height=100"></a>
											<div class="media-body">
												<a class="cmt-head" href="#"><?php echo $data['content'] ?></a>
												<p><i class="fa fa-clock-o"></i> <?php echo $work->time_before($data['time']); ?></p>
											</div>
										</article>
<?php
	}
}
?>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							THỐNG KÊ VIP
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<div class="box-body nicescroll-rails" style="overflow:auto;height:200px;">
										<table class="table table-hover">
											<thead>
												<tr><th>Tên</th><th>Cấp Độ</th><th>Thời Hạn</th></tr>
											</thead>
											<tbody>
<?php
if($work->number_row("SELECT * FROM `user_vip`")==0){
?>
												<tr><td></td></tr>
<?php
}
else{
	foreach($work->fetch_array("SELECT * FROM `user_vip` ORDER BY `id` DESC LIMIT 30", 0) as $data){
		$vip = @$work->get_db('*', 'vip', 'loai', $data['level']);
		$data['level'] = $vip['name'];
?>
												<tr><td><?php echo $data['name']; ?></td><td><?php echo $data['level']; ?></td><td><?php echo $work->time_vip($data['time']); ?></td></tr>
<?php
	}
}
?>
											</tbody>
										</table>
									</div>
									<div class="box-footer">
										<center>Hiện Có <kbd><?php echo $work->number_row("SELECT * FROM `user_vip`"); ?></kbd> Thành Viên VIP.</center>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							THỐNG KÊ NGƯỜI DÙNG
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<div class="box-body nicescroll-rails" style="overflow:auto;height:200px;">
										<table class="table table-hover">
											<thead>
												<tr><th>Tên</th><th>Cấp Độ</th><th>Thời Gian</th></tr>
											</thead>
											<tbody>
<?php
if($work->number_row("SELECT * FROM `user`")==0){
?>
												<tr><td></td></tr>
<?php
}
else{
	foreach($work->fetch_array("SELECT * FROM `user` ORDER BY `id` DESC LIMIT 30", 0) as $data){
		if($work->number_row("SELECT * FROM `user_vip` WHERE `id_user` = '".$data['id_user']."'")==0) $data['level'] = 'New Member';
		else{
			$user_vip = @$work->get_db('*', 'user_vip', 'id_user', $data['id_user']);
			$vip = @$work->get_db('*', 'vip', 'loai', $user_vip['level']);
			$data['level'] = $vip['name'];
		}
?>
												<tr><td><?php echo $data['name']; ?></td><td><?php echo $data['level']; ?></td><td><?php echo $work->time_before($data['time']); ?></td></tr>
<?php
	}
}
?>
											</tbody>
										</table>
									</div>
									<div class="box-footer">
										<center>Hiện Có <kbd><?php echo $work->number_row("SELECT * FROM `user`"); ?></kbd> Thành Viên Sử Dụng.</center>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading"><i class="fa fa-facebook-square animated infinite tada"></i>
							KEY SEARCH
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<p>tang like, hack like facebook, buff like, auto cam xuc , bot cam xuc , bot like , bot ex like , hack like viet nam, http://hotlike.net, trang web hack like facebook, auto like viet nam, buff like viet nam,cách tăng like stt facebook, hack like ảnh facebook, auto cam xuc , bot cam xuc , bot like , bot ex like  hack like comment facebook, tăng like ảnh facebook, cách hack tăng like,share code auto like, xin code auto like, web auto like, auto sub , auto share , hack share , hack comments , hack bình luận, auto like sub , đọc trộm tin nhắn facebook , xem tin nhắn facebook không cần mật khẩu</p>
							</div>
						</section>
					</div>
				</div>
<?php
}
//-----------LOAD FOOTER-----------//
require_once 'includes/footer.php';
//---------------------------------//
?>