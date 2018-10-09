				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-info-circle"></i> Thông Tin
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								+ Hệ thống Tự Động Nhận Dạng ID Người Dùng, Tự Động Tăng Like Trong Vòng 1-30P, Bạn Chỉ Việt Đăng Nội Dung Mới.<br>
								+ Hệ Thống Tự Động Một Cách Hoàn Toàn Giúp Bạn Yên Tâm Trong Việc Tương Tác Bạn Bè.<br> 
								+ Khi Bạn Trở Thành V.I.P, Bạn Sẽ Không Phải LIKE, THEO DÕI, BÌNH LUẬN, CHIA SẺ Cho Bất Cứ Ai.<br>
								+ Thông Tin Của Bạn Sẽ Được An Toàn, Sẽ Không Bị Xoá Tài Khoản Như Nếu Không Hoạt Động Như Các Member Khác.<br>
								+ Bạn Sẽ Không Cần Cập Nhật Token Hằng Ngày Vì Chúng Tôi Chỉ Cần ID Của Bạn.
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-cc-mastercard"></i> Mua VIP
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<label for="exampleInputName">Họ Tên Người Dùng</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
									<input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" disabled>
								</div><br>
								<label for="exampleInputID">ID Người Dùng</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
									<input type="text" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" disabled>
								</div><br>
								<label for="exampleInputVIP">Chọn Gói VIP</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
									<select id="package" class="form-control" onchange="vip_package();">
										<option value="0">Chưa Chọn</option>
										<option value="1">VIP Member</option>
										<option value="2">Medium Member</option>
										<option value="3">Super Member</option>
										<option value="4">Boss Member</option>
									</select>
								</div><br>
								<label for="exampleInputDay">Chọn Thời Hạn</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
									<select id="time" class="form-control" onchange="vip_package();">
										<option value="1">1 Ngày</option>
										<option value="3">3 Ngày</option>
										<option value="5">5 Ngày</option>
										<option value="7">1 Tuần</option>
										<option value="30">1 Tháng</option>
										<option value="60">2 Tháng</option>
										<option value="90">3 Tháng</option>
										<option value="120">4 Tháng</option>
										<option value="150">5 Tháng</option>
										<option value="180">6 Tháng</option>
										<option value="210">7 Tháng</option>
										<option value="240">8 Tháng</option>
										<option value="270">9 Tháng</option>
										<option value="300">10 Tháng</option>
										<option value="330">11 Tháng</option>
										<option value="365">12 Tháng</option>
									</select>
								</div><br>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="vip-buy" onclick="vip_buy();">Mua VIP</button></span></center>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-info-circle"></i> Bảng Giá
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div id="thongbao"></div>
								<h5><i class="fa fa-pagelines"></i> Tên Người Dùng: <b><?php echo $_SESSION['name']; ?></b></h5>
								<h5><i class="fa fa-info-circle"></i> ID Người Dùng: <b><?php echo $_SESSION['id_user']; ?></b></h5>
								<h5><i class="fa fa-usd"></i> Số Tiền Hiện Tại: <b><?php echo number_format($money); ?></b> Xu</h5>
								<h5><i class="fa fa-usd"></i> Số Tiền Cần: <b id="money-buy">0</b> Xu</h5>
								<h5><i class="fa fa-usd"></i> Số Tiền Còn Lại: <b id="money-conlai"><?php echo number_format($money); ?></b> Xu</h5>
								<hr>
								<ul>
									<li><h3>Thông Tin Gói VIP</h3></li>
									<li>
										<ul>
											<li>Tên Gói VIP: <b id="name-package">Rỗng</b></li>
											<li>Số Like: <b id="number-like">0</b> Like</li>
											<li>Thời Hạn: <b id="time-hethan">0</b> Ngày</li>
										</ul>
									</li>
								</ul>
								<div class="alert alert-warning fade in" style="margin-bottom:0px;"><strong>Cảnh Báo</strong> Để Tránh Việc Bị Xoá Khỏi Hệ Thống, Người Dùng VIP Không Nên Đăng Quá Nhiều Bài Viết Trong Ngày.</div>
							</div>
						</section>
					</div>
				</div>