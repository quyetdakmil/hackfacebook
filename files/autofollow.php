<?php $_SESSION['_CAPTCHA'] = $work->captcha(20); ?>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-thumbs-o-up"></i> Auto Theo Dõi
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Theo Dõi</b> Là Gì?<br>
									+ <b>Auto Theo Dõi</b> Là Công Cụ Giúp Tăng Số Lượng Theo Dõi Cho Bạn Hoặc Tăng Số Lượng Theo Dõi Theo ID Người Dùng.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Nhập ID Bạn Muốn Tăng Theo Dõi, Hoặc Không Cần Nhập Nếu Bạn Muốn Tăng Theo Dõi Cho Mình.<br>
									Bước 2: Kéo Thanh Số Lượng Theo Dõi Đến Mức Thích Hợp Và Ấn Nút <b>"Auto Theo Dõi"</b> Để Bắt Đầu.<br>
									<i class="fa fa-lightbulb-o"></i> Lưu Ý<br>
									+ Để Auto Theo Dõi Hoạt Động, Bạn Phải Đủ 18 Tuổi. Nếu Chưa Đủ 18 Tuổi, Vui Lòng Cài Đặt Tuổi <a href="https://www.facebook.com/<?php echo $_SESSION['id_user']; ?>/about?section=contact_basic" target="_blank">Tại Đây</a><br>
									+ Bạn Phải Bật Người Theo Dõi. Nếu Chưa Bật, Vui Lòng Bật <a href="https://www.facebook.com/settings?tab=followers" target="_blank">Tại Đây</a><br>
									+ Nếu Bạn Gặp Khó Khăn Trong Việc Lấy ID Thì Hãy Liên Hệ Trực Tiếp Mình Để Được Hỗ Trợ. Liên Hệ <a href="https://www.facebook.com/<?php echo $admin_id; ?>" target="_blank">Tại Đây</a>
									</p>
								</div><br>
								<label for="exampleInputID">ID Tăng Theo Dõi</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="id" class="form-control" value="<?php echo $_SESSION['id_user'] ?>" placeholder="Nhập ID Bạn Muốn Tăng Theo Dõi...">
									<input type="hidden" id="captcha-server" value="<?php echo $_SESSION['_CAPTCHA']; ?>">
								</div><br>
								<div class="form-group">
									<label for="name">Số Lượng Theo Dõi</label>
									<center><div id="number" class="label label-info">30</div></center>
									<input class="form-control" type="range" name="number" min="1" max="30" id="limit" value="30" onchange="$('#number').html(this.value);">
								</div>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="auto-follow" onclick="auto_follow();">Auto Theo Dõi</button></span></center><br>
								<div id="thongbao"></div>
								<div id="countdown"></div>
							</div>
						</section>
					</div>
				</div>