<?php
$_SESSION['_CAPTCHA'] = $work->captcha(20);
$cai = $work->number_row("SELECT * FROM `botexlike` WHERE `id_user` = '".$_SESSION['id_user']."'");
if($cai==0){
	$caidat = false;
	$trangthai = 'OFF';
	$likecmt = 'OFF';
}
else{
	$caidat = true;
	$trangthai = 'ON';
	$bot = $work->get_db('caidatcmt', 'botexlike', 'id_user', $_SESSION['id_user']);
	$likecmt = $bot['caidatcmt'];
}
?>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-rocket"></i> Bot Exchange Like
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<?php if($caidat==false){ ?>
								<center><h2 class="admin">Hiện Tại Bạn Chưa Cài Bot Exchange Like</h2></center><br>
								<?php }else{ ?>
								<center><h2 class="bot">Hiện Tại Bạn Đã Cài Bot Exchange Like</h2></center><br>
								<?php } ?>
								<div class="box box-solid box-primary">
									<time style="float: left;color: #78CD51;">Bot Exchange Like: <a style="color: red;"><?php echo $trangthai;?></a></time><br>
									<time style="float: left;color: #78CD51;">Exchange Like Bình Luận: <a style="color: red;"><?php echo $likecmt;?></a></time><br>
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Bot Exchange Like</b> Là Gì?<br>
									+ <b>Bot Exchange Like</b> Là Công Cụ Giúp Tăng Like Bài Viết Của Bạn Một Cách Tự Động Thông Qua Phương Thức Bạn Like Bài Viết Của Người Khác, Người Khác Sẽ Like Lại Cho Bạn.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									<b>Bước 1:</b> Tại Phần Thiết Lập Bot Bạn Chọn Bật Bot Nếu Muốn Bot Hoạt Động, Chọn Cập Nhật Bot Nếu Muốn Làm Mới Bot (Chống Chết Token) Hoặc Chọn Tắt Bot Nếu Bạn Không Muốn Sử Dụng Nó Nữa. (Bạn Chỉ Có Thể Cập Nhật Hoặc Tắt Bot Khi Đã Bật Bot)<br>
									<b>Bước 2:</b> Tại Phần Thiết Lập Comment Bạn Chọn Bật Ex Like Comment Nếu Bạn Muốn Bot Trao Đổi Like Cả Bình Luận Trong Bài Viết Của Mình Hoặc Tắt Ex Like Comment Nếu Bạn Không Muốn.<br>
									<b>Bước 3:</b> Cuối Cùng Ấn Vào Nút <b>"Thiết Lập"</b> Để Tiến Hành Cài Đặt.<br>
									<i class="fa fa-lightbulb-o"></i> Lưu Ý<br>
									+ Cập Nhật Bot Thường Xuyên Để Bot Hoạt Động Tốt.<br>
									+ Nếu Gặp Tình Trạng Không Nhận Được Like Nữa Thì Có Thể Bot Của Bạn Đã Bị Chết Token Hoặc Người Sử Dụng Bot Trao Đổi Like Không Nhiều.<br>
									+ Bạn Cần Cài Mới Lại Bot Hoặc Gửi Giới Thiệu Để Được Nhận Like Nhiều Do Nhiều Người Sử Dụng.
									</p>
								</div><br>
								<input type="hidden" id="captcha-server" value="<?php echo $_SESSION['_CAPTCHA']; ?>">
								<label for="exampleInputSelect">Thiết Lập Bot</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
									<select id="caidat" class="form-control">
										<?php if($caidat==false){ ?>
										<option value="ON">BẬT BOT (ON)</option>
										<?php }else{ ?>
										<option value="UP">CẬP NHẬT BOT (UP)</option>
										<option value="OFF">TẮT BOT (OFF)</option>
										<?php } ?>
									</select>
								</div><br>
								<label for="exampleInputSelect">Thiết Lập Comment</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-sliders"></i></span>
									<select id="caidatcmt" class="form-control">	
										<option value="ON">BẬT EX LIKE COMMENT (ON)</option>
										<option value="OFF">TẮT EX LIKE COMMENT (OFF)</option>
									</select>
								</div><br>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="bot-exlike" onclick="bot_exlike();">Thiết Lập</button></span></center><br>
								<div id="thongbao"></div>
							</div>
						</section>
					</div>
				</div>