<?php
$_SESSION['_CAPTCHA'] = $work->captcha(20);
$cai = $work->number_row("SELECT * FROM `botreaction` WHERE `id_user` = '".$_SESSION['id_user']."'");
if($cai==0){
	$caidat = false;
	$trangthai = 'OFF';
	$loaicamxuc = 'NONE';
}
else{
	$caidat = true;
	$trangthai = 'ON';
	$bot = $work->get_db('*', 'botreaction', 'id_user', $_SESSION['id_user']);
	$loaicamxuc = $bot['camxuc'];
}
?>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-rocket"></i> Bot Cảm Xúc
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<?php if($caidat==false){ ?>
								<center><h2 class="admin">Hiện Tại Bạn Chưa Cài Bot Cảm Xúc</h2></center><br>
								<?php }else{ ?>
								<center><h2 class="bot">Hiện Tại Bạn Đã Cài Bot Cảm Xúc</h2></center><br>
								<?php } ?>
								<div class="box box-solid box-primary">
									<time style="float: left;color: #78CD51;">Bot Cảm Xúc: <a style="color: red;"><?php echo $trangthai; ?></a></time><br>
									<time style="float: left;color: #78CD51;">Loại Cảm Xúc: <a style="color: red;"><?php echo $loaicamxuc; ?></a></time><br>
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Bot Cảm Xúc</b> Là Gì?<br>
									+ <b>Bot Cảm Xúc</b> Là Công Cụ Giúp Bạn Tự Động Cảm Xúc Bài Viết Mới Của Bạn Bè Mà Bạn Không Cần Phải Làm Gì Cả.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									<b>Bước 1:</b> Tại Phần Thiết Lập Bot Bạn Chọn Bật Bot Nếu Muốn Bot Hoạt Động, Chọn Cập Nhật Bot Nếu Muốn Làm Mới Bot (Chống Chết Token) Hoặc Chọn Tắt Bot Nếu Bạn Không Muốn Sử Dụng Nó Nữa. (Bạn Chỉ Có Thể Cập Nhật Hoặc Tắt Bot Khi Đã Bật Bot)<br>
									<b>Bước 2:</b> Tại Phần Thiết Lập Cảm Xúc Chọn Loại Cảm Xúc Bạn Muốn Sử Dụng.<br>
									<b>Bước 3:</b> Cuối Cùng Ấn Vào Nút <b>"Thiết Lập"</b> Để Tiến Hành Cài Đặt.<br>
									<i class="fa fa-lightbulb-o"></i> Lưu Ý<br>
									+ Cập Nhật Bot Thường Xuyên Để Bot Hoạt Động Tốt.<br>
									+ Nếu Gặp Tình Trạng Bot Không Thả Cảm Xúc Nữa Thì Có Thể Bot Của Bạn Đã Bị Chết Token. Bạn Cần Cài Mới Lại Bot Nếu Muốn Tiếp Tục Sử Dụng.
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
								<label for="exampleInputSelect">Thiết Lập Cảm Xúc</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-sliders"></i></span>
									<select id="reaction" class="form-control">	
										<option value="LOVE">Cảm Xúc LOVE</option>
										<option value="WOW">Cảm Xúc WOW</option>
										<option value="HAHA">Cảm Xúc HAHA</option>
										<option value="SAD">Cảm Xúc SAD</option>
										<option value="ANGRY">Cảm Xúc ANGRY</option>
									</select>
								</div><br>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="bot-reaction" onclick="bot_reaction();">Thiết Lập</button></span></center><br>
								<div id="thongbao"></div>
							</div>
						</section>
					</div>
				</div>