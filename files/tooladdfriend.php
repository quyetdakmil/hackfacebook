			<div class="row">
					<form method="POST" action="">
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							<i class="fa fa-gg-circle"></i> AUTO ĐỒNG Ý KẾT BẠN
							<span class="tools pull-right">
								<a class="fa fa-chevron-down"></a>
								<a class="fa fa-times"></a>
							</span>
							</header>
							<div class="panel-body">
								<div class="box box-solid box-primary">
									<p align="left">
									<i class="fa fa-lightbulb-o"></i> <b>Auto Đồng Ý Kết Bạn</b> Là Gì?<br>
									+ <b>Auto Đồng Ý Kết Bạn</b> Là Công Cụ Giúp Bạn Tự Động Đồng Ý Kết Bạn Với Những Người Đã Gửi Lời Mời Kết Bạn Với Bạn.<br>
									<i class="fa fa-lightbulb-o"></i> Vậy Tôi Phải Làm Như Thế Nào Để Sử Dụng Nó?<br>
									Bước 1: Sử Dụng Mục Bên <b>"Danh Sách Kết Bạn"</b> Để Chọn ID Người Cần Kết Bạn.<br>
									Bước 2: Chọn Người Bạn Muốn Kết Bạn Và Ấn Nút Kế Bên Mục Tên Để Chọn. (Ấn Nút Chọn Tất Cả Để Chọn Tất Cả Người Kết Bạn)<br>
									Bước 3: Ấn Nút <b>"Xác Nhận"</b> Để Bắt Đầu.
									</p>
								</div><br>
								<div id="hidetool">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary" onclick="display();">Xác Nhận</button>
									</span></center>
								</div>
								<div id="showtool" style="display: none;">
									<center><span class="input-group-btn">
										<button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin"></i> Đang Xác Nhận</button>
									</span></center>
								</div><br>
<?php
$array_id = @$_POST['id'];
$success = 0;
if(isset($array_id) AND is_array($array_id)){
	foreach($array_id as $id){
		$curl = json_decode($work->cURL('https://graph.facebook.com/me/friends/'.$id.'/?method=post&access_token='.$_SESSION['access_token']), true);
		if($curl=='true') $success++;
	}
?>
								<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Đồng Ý Kết Bạn<br>+ Đồng Ý Kết Bạn Thành Công.<br>+ Đã Đồng Ý Kết Bạn Với <?php echo $success; ?> Lời Mời.</p></div>
<?php
}
?>
							</div>
						</section>
					</div>
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading">
							Danh Sách Kết Bạn
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
$data_friend = json_decode($work->cURL('https://graph.facebook.com/me/friendrequests?method=GET&limit=500&access_token='.$_SESSION['access_token']), true);
$count_data_friend = count($data_friend['data']);
for($i=0;$i<$count_data_friend;$i++){
?>
								<div class="checkbox">
									<label><input type="checkbox" value="<?php echo $data_friend['data'][$i]['from']['id']; ?>" name="id[]"><a href="https://www.facebook.com/<?php echo $data_friend['data'][$i]['from']['id']; ?>" target="_blank"><?php echo $data_friend['data'][$i]['from']['name']; ?></a> (Gửi Vào Lúc <?php echo $data_friend['data'][$i]['created_time']; ?>)</label>
								</div>
<?php
}
?>
							</div>
						</section>
					</div>
					</form>
				</div>