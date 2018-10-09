<?php
$_SESSION['_CAPTCHA'] = $work->captcha(20);
$cai = $work->number_row("SELECT * FROM `botinteract` WHERE `id_user` = '".$_SESSION['id_user']."'");
if($cai==0){
	$caidat = false;
	$trangthai = 'OFF';
}
else{
	$caidat = true;
	$trangthai = 'ON';
	$bot = $work->get_db('content', 'botinteract', 'id_user', $_SESSION['id_user']);
	$interact = htmlentities(base64_decode($bot['content']), ENT_COMPAT | ENT_HTML401, "UTF-8");
}
?>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-rocket"></i> Bot Tương Tác
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<?php if($caidat==false){ ?>
								<center><h2 class="admin">Hiện Tại Bạn Chưa Cài Bot Tương Tác</h2></center><br>
								<?php }else{ ?>
								<center><h2 class="bot">Hiện Tại Bạn Đã Cài Bot Tương Tác</h2></center><br>
								<?php } ?>
								<div class="box box-solid box-primary">
									<time style="float: left;color: #78CD51;">Bot Tương Tác: <a style="color: red;"><?php echo $trangthai; ?></a></time><br>
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Bot Tương Tác</b> Là Gì?<br>
									+ <b>Bot Tương Tác</b> Là Công Cụ Giúp Bạn Tự Động Bình Luận Tương Tác Bài Viết Mới Của Bạn Bè Mà Bạn Không Cần Phải Làm Gì Cả.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									<b>Bước 1:</b> Tại Phần Thiết Lập Bot Bạn Chọn Bật Bot Nếu Muốn Bot Hoạt Động, Chọn Cập Nhật Bot Nếu Muốn Làm Mới Bot (Chống Chết Token) Hoặc Chọn Tắt Bot Nếu Bạn Không Muốn Sử Dụng Nó Nữa. (Bạn Chỉ Có Thể Cập Nhật Hoặc Tắt Bot Khi Đã Bật Bot)<br>
									<b>Bước 2:</b> Tại Phần Thiết Lập Nội Dung Bạn Nhập Nội Dung Muốn Bình Luận Tương Tác (Mỗi Dòng 1 Bình Luận Nếu Bạn Muốn Nhiều Bình Luận Khác Nhau) Hoặc Bỏ Rỗng Nếu Muốn Sử Dụng Mẫu Tương Tác Mặc Định.<br>
									<b>Bước 3:</b> Cuối Cùng Ấn Vào Nút <b>"Thiết Lập"</b> Để Tiến Hành Cài Đặt.<br>
									<i class="fa fa-lightbulb-o"></i> Lưu Ý<br>
									+ Cập Nhật Bot Thường Xuyên Để Bot Hoạt Động Tốt.<br>
									+ Nếu Gặp Tình Trạng Bot Không Bình Luận Tương Tác Nữa Thì Có Thể Bot Của Bạn Đã Bị Chết Token. Bạn Cần Cài Mới Lại Bot Nếu Muốn Tiếp Tục Sử Dụng.
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
								<label for="exampleInputSelect">Thiết Lập Nội Dung</label>
								<textarea id="interact" class="form-control" placeholder="Nhập Nội Dung Bạn Muốn Bình Luận Tương Tác, Mỗi Dòng Một Bình Luận..."><?php echo @$interact; ?></textarea><br>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="bot-interact" onclick="bot_interact();">Thiết Lập</button></span></center><br>
								<div id="thongbao"></div>
							</div>
						</section>
					</div>
				</div>