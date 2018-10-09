				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-cc-paypal"></i> Nạp Tiền
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<center><img src="images/baokim.png" style="height: 50px;width: 190px;"></center>
								<center><img src="images/thecao.png" class="img-responsive"></center><br>
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Nạp Tiền</b> Bằng Thẻ Cào<br>
									+ Tiền Sau Khi Nạp Sẽ Được Cộng Vào Tài Khoản Của Bạn Tại <b><?php echo $upcase_domain; ?></b><br>
									+ Bạn Hoàn Toàn Yên Tâm Vì <b><?php echo $upcase_domain; ?></b> Liên Kết Trực Tiếp Với Cổng Thông Tin Thanh Toán Điện Tử <b>Bảo Kim</b><br>
									+ Vì Thế, Việc Nạp Tiền Trở Nên Nhanh, An Toàn Và Thuận Tiện Hơn.<br>
									+ Khi Bị Lỗi Nạp Thẻ, Vui Lòng Liên Hệ Trực Tiếp Admin <a href="https://www.facebook.com/<?php echo $admin_id; ?>" target="_blank">Tại Đây</a>
									</p>
								</div><br>
								<label for="exampleInputCard">Chọn Loại Thẻ Cào</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
									<select id="name-card" class="form-control">	
										<option value="VINA">VINAPHONE</option>
										<option value="MOBI">MOBIFONE</option>
										<option value="VIETEL">VIETTEL</option>
										<option value="VNM">VIETNAMOBILE</option>
										<option value="GATE">GATE</option>
									</select>
								</div><br>
								<label for="exampleInputSeri">Mã Seri</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="seri-code" class="form-control" placeholder="Nhập Mã Seri Của Thẻ...">
								</div><br>
								<label for="exampleInputPin">Mã Thẻ</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="pin-code" class="form-control" placeholder="Nhập Mã Thẻ...">
								</div><br>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="vip-recharge" onclick="vip_recharge();">Nạp Tiền</button></span></center><br>
								<div id="thongbao"></div>
							</div>
						</section>
					</div>
				</div>