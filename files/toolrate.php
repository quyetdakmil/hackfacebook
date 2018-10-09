<?php $_SESSION['_CAPTCHA'] = $work->captcha(20); ?>
				<div class="row">
					<div class="col-lg-5">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-gg-circle"></i> Auto Rate Trang
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Rate Trang</b> Là Gì?<br>
									+ <b>Auto Rate Trang</b> Là Công Cụ Giúp Tăng Số Lượng Đánh Giá Sao Cho Trang Cá Nhân Hoặc Tăng Số Lượng Đánh Giá Sao Theo ID Trang.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Trang"</b> Để Copy ID.<br>
									Bước 2: Chọn Trang Bạn Muốn Tăng Đánh Giá Sao Và Ấn Nút <b>"Sao Chép ID"</b>.<br>
									Bước 3: Tại Phần Chọn Sao Chọn Loại Sao Bạn Muốn Sử Dụng.<br>
									Bước 4: Kéo Thanh Số Lượng Sao Đến Mức Thích Hợp Và Ấn Nút <b>"Auto Rate Trang"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<label for="exampleInputID">ID Trang</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="id" class="form-control" placeholder="Nhập ID Trang...">
									<input type="hidden" id="captcha-server" value="<?php echo $_SESSION['_CAPTCHA']; ?>">
								</div><br>
								<label for="exampleInputID">Chọn Sao</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
									<select id="star" class="form-control">	
										<option value="1">1 Sao</option>
										<option value="2">2 Sao</option>
										<option value="3">3 Sao</option>
										<option value="4">4 Sao</option>
										<option value="5" selected>5 Sao</option>
									</select>  
								</div><br>
								<div class="form-group">
									<label for="name">Số Lượng Sao</label>
									<center><div id="number" class="label label-info">30</div></center>
									<input class="form-control" type="range" name="number" min="1" max="30" id="limit" value="30" onchange="$('#number').html(this.value);">
								</div>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="auto-rate" onclick="auto_rate();">Auto Rate Trang</button></span></center><br>
								<div id="thongbao"></div>
								<div id="countdown"></div>
							</div>
						</section>
					</div>
					<div class="col-lg-7">
						<section class="panel">
							<header class="panel-heading">
							Danh Sách Trang
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<table class="table">
									<thead>
										<tr>
											<th>STT</th>
											<th>Tên</th>
											<th>ID Profile</th>
											<th>Thao Tác</th>
										</tr>
									</thead>
									<tbody id="load-fanpages">
										<tr><td colspan="4"><button class="btn btn-space btn-info btn-block" onclick="load_fanpages();">TẢI DANH SÁCH TRANG</button></td></tr>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>