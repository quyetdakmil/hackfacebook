<?php $_SESSION['_CAPTCHA'] = $work->captcha(20); ?>
				<div class="row">
					<div class="col-lg-5">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-thumbs-o-up"></i> Auto Like
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Like</b> Là Gì?<br>
									+ <b>Auto Like</b> Là Công Cụ Giúp Tăng Số Lượng Like Cho Bài Viết Của Bạn Hoặc Tăng Số Lượng Like Theo ID Bài Viết.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Tab Bài Viết"</b> Để Copy ID.<br>
									Bước 2: Chọn Bài Viết Bạn Muốn Tăng Like Và Ấn Nút <b>"Sao Chép ID"</b>.<br>
									Bước 3: Kéo Thanh Số Lượng Like Đến Mức Thích Hợp Và Ấn Nút <b>"Auto Like"</b> Để Bắt Đầu.<br>
									<i class="fa fa-lightbulb-o"></i> Lưu Ý<br>
									+ Bài Viết Mà Bạn Muốn Tăng Like Phải Đặt Ở Chế Độ Công Khai.<br>
									+ Với Những Bài Viết Bạn Gặp Khó Khăn Trong Lúc Lấy ID Thì Bạn Hãy Nhập Thẳng Đường Dẫn Bài Đó Vào.
									</p>
								</div><br>
								<label for="exampleInputID">ID - Link Bài Viết</label>
								<div class="input-prepend input-group">
									<span class="input-group-addon"><i class="fa fa-clone"></i></span>
									<input type="text" id="id" class="form-control" placeholder="Nhập ID, Link Bài Viết...">
									<input type="hidden" id="captcha-server" value="<?php echo $_SESSION['_CAPTCHA']; ?>">
								</div><br>
								<div class="form-group">
									<label for="name">Số Lượng Like</label>
									<center><div id="number" class="label label-info">30</div></center>
									<input class="form-control" type="range" name="number" min="1" max="100" id="limit" value="30" onchange="$('#number').html(this.value);">
								</div>
								<center><span class="input-group-btn"><button type="button" class="btn btn-primary" id="auto-like" onclick="auto_like();">Auto Like</button></span></center><br>
								<div id="thongbao"></div>
								<div id="countdown"></div>
							</div>
						</section>
					</div>
					<div class="col-lg-7">
						<section class="panel">
							<header class="panel-heading">
							Tab Bài Viết
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="tabs-container">
									<ul class="nav nav-tabs tab-border-top-success">
										<li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"><i class="fa fa-bullseye"></i> Tất Cả</a></li>
										<li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false" onclick="load_status();"><i class="fa fa-comments"></i> Status</a></li>
										<li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false" onclick="load_photos();"><i class="fa fa-image"></i> Photos</a></li>
										<li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false" onclick="load_videos();"><i class="fa fa-video-camera"></i> Videos</a></li>
										<li class=""><a data-toggle="tab" href="#tab-5" aria-expanded="false" onclick="load_links();"><i class="fa fa-link"></i> Links</a></li>
									</ul>
									<div class="tab-content">
										<div id="tab-1" class="tab-pane active">
											<div class="panel-body">
												<div id="load-all-post">
												</div>
											</div>
										</div>
										<div id="tab-2" class="tab-pane">
											<div class="panel-body">
												<div id="load-status">
												</div>
											</div>
										</div>
										<div id="tab-3" class="tab-pane">
											<div class="panel-body">
												<div id="load-photos">
												</div>
											</div>
										</div>
										<div id="tab-4" class="tab-pane">
											<div class="panel-body">
												<div id="load-videos">
												</div>
											</div>
										</div>
										<div id="tab-5" class="tab-pane">
											<div class="panel-body">
												<div id="load-links">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>