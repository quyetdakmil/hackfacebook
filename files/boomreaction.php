<?php $_SESSION['_CAPTCHA'] = $work->captcha(20); ?>
				<div class="row">
					<div class="col-lg-5">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-send-o"></i> Bão Cảm Xúc
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Bão Cảm Xúc</b> Là Gì?<br>
									+ <b>Bão Cảm Xúc</b> Là Công Cụ Giúp Tự Động Thả Cảm Xúc Cho Nhiều Bài Viết Của Bạn Bè.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Bạn Bè"</b> Để Copy ID.<br>
									Bước 2: Chọn Người Bạn Muốn Bão Cảm Xúc Và Ấn Nút <b>"Sao Chép ID"</b>.<br>
									Bước 3: Tại Phần Chọn Cảm Xúc Chọn Loại Cảm Xúc Bạn Muốn Sử Dụng.<br>
									Bước 4: Kéo Thanh Số Lượng Cảm Xúc Đến Mức Thích Hợp Và Ấn Nút <b>"Bão Cảm Xúc"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<label for="exampleInputID">ID - Link Bài Viết</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="id" class="form-control" placeholder="Nhập ID Bạn Bè...">
									<input type="hidden" id="captcha-server" value="<?php echo $_SESSION['_CAPTCHA']; ?>">
								</div><br>
								<label for="exampleInputID">Chọn Cảm Xúc</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-dot-circle-o"></i></span>
									<select id="reaction" class="form-control">	
										<option value="LOVE">Cảm Xúc LOVE</option>
										<option value="WOW">Cảm Xúc WOW</option>
										<option value="HAHA">Cảm Xúc HAHA</option>
										<option value="SAD">Cảm Xúc SAD</option>
										<option value="ANGRY">Cảm Xúc ANGRY</option>
									</select>  
								</div><br>
								<div class="form-group">
									<label for="name">Số Lượng Cảm Xúc</label>
									<center><div id="number" class="label label-info">30</div></center>
									<input class="form-control" type="range" name="number" min="1" max="100" id="limit" value="30" onchange="$('#number').html(this.value);">
								</div>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="boom-reaction" onclick="boom_reaction();">Bão Cảm Xúc</button></span></center><br>
								<div id="thongbao"></div>
							</div>
						</section>
					</div>
					<div class="col-lg-7">
						<section class="panel">
							<header class="panel-heading">
							Danh Sách Bạn Bè
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
									<tbody id="load-friends">
										<tr><td colspan="4"><button class="btn btn-space btn-info btn-block" onclick="load_friends();">TẢI DANH SÁCH BẠN BÈ</button></td></tr>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>