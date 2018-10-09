<?php $_SESSION['_CAPTCHA'] = $work->captcha(20); ?>
				<div class="row">
					<div class="col-lg-5">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-send-o"></i> Bão Bình Luận
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Bão Bình Luận</b> Là Gì?<br>
									+ <b>Bão Bình Luận</b> Là Công Cụ Giúp Tự Động Bình Luận Cho Nhiều Bài Viết Của Bạn Bè.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Bạn Bè"</b> Để Copy ID.<br>
									Bước 2: Chọn Người Bạn Muốn Bão Bình Luận Và Ấn Nút <b>"Sao Chép ID"</b>.<br>
									Bước 3: Nhập Nội Dung Bạn Muốn Bão Bình Luận, Mỗi Dòng 1 Bình Luận Nếu Bạn Muốn Nhiều Bình Luận Khác Nhau.<br>
									Bước 4: Kéo Thanh Số Lượng Bình Luận Đến Mức Thích Hợp Và Ấn Nút <b>"Bão Bình Luận"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<label for="exampleInputID">ID Bạn Bè</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="id" class="form-control" placeholder="Nhập ID Bạn Bè...">
									<input type="hidden" id="captcha-server" value="<?php echo $_SESSION['_CAPTCHA']; ?>">
								</div><br>
								<label for="exampleInputContent">Nội Dung Comment</label>
								<textarea id="message" class="form-control" placeholder="Nhập Nội Dung Bạn Muốn Bão Bình Luận, Mỗi Dòng Một Bình Luận..."></textarea><br>
								<div class="form-group">
									<label for="name">Số Lượng Bình Luận</label>
									<center><div id="number" class="label label-info">30</div></center>
									<input class="form-control" type="range" name="number" min="1" max="100" id="limit" value="30" onchange="$('#number').html(this.value);">
								</div>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="boom-comment" onclick="boom_comment();">Bão Bình Luận</button></span></center><br>
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