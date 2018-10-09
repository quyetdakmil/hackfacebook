			<div class="row">
					<form method="POST" action="">
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-gg-circle"></i> AUTO XOÁ STATUS
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Xoá Status</b> Là Gì?<br>
									+ <b>Auto Xoá Status</b> Là Công Cụ Giúp Bạn Tự Động Xoá Các Bài Viết Bạn Đã Đăng.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Bài Viết"</b> Để Chọn ID Bài Viết.<br>
									Bước 2: Chọn Bài Viết Bạn Muốn Xoá Và Ấn Nút Kế Bên Mục Thời Gian Để Chọn. (Ấn Nút Chọn Tất Cả Để Chọn Tất Cả Bài Viết)<br>
									Bước 3: Ấn Nút <b>"Xoá Bài Viết"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<div id="hidetool">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary" onclick="display();">Xoá Bài Viết</button>
									</span></center>
								</div>
								<div id="showtool" style="display: none;">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i> Đang Xoá Bài Viết</button>
									</span></center>
								</div><br>
<?php
$array_id = @$_POST['id'];
$success = 0;
if(isset($array_id) AND is_array($array_id)){
	foreach($array_id as $id){
		$curl = json_decode($work->cURL('https://graph.facebook.com/'.$id.'/?method=delete&access_token='.$_SESSION['access_token']), true);
		if($curl=='true') $success++;
	}
?>
								<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Xoá Bài Viết<br>+ Xoá Bài Viết Thành Công.<br>+ Đã Xoá <?php echo $success; ?> Bài Viết.</p></div>
<?php
}
?>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							Danh Sách Bài Viết
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="checkbox">
									<label><input type="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);"> Chọn Tất Cả</label>
								</div>
<?php
$data_status = json_decode($work->cURL('https://graph.facebook.com/me/feed?method=GET&limit=500&fields=id,name,message,created_time,full_picture,from&access_token='.$_SESSION['access_token']), true);
$count_data_status = count($data_status['data']);
for($i=0;$i<$count_data_status;$i++){
	if(isset($data_status['data'][$i]['message'])) $message = ' ' . $data_status['data'][$i]['message'] . '<br> ';
	else $message = ' ';
	if(isset($data_status['data'][$i]['full_picture'])) $image = ' <img src="' . $data_status['data'][$i]['full_picture'] . '" class="img-responsive"><br> ';
	else $image = ' ';
?>
								<div class="checkbox">
									<label><input type="checkbox" value="<?php echo $data_status['data'][$i]['id']; ?>" name="id[]"><?php echo $message . $image; ?> Vào Lúc: <?php echo $data_status['data'][$i]['created_time']; ?> <a href="https://www.facebook.com/<?php echo $data_status['data'][$i]['id']; ?>" target="_blank">Xem Thêm Tại Đây</a></label>
								</div>
<?php
}
?>
							</div>
						</section>
					</div>
					</form>
				</div>