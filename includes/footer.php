<?php defined('KEN') or die('Access Deny!');?>
			<!-- END CODE -->
			</section>
		</section>
		<footer class="site-footer">
			<div class="text-center">
				<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
				<center><small><?php echo $upcase_domain; ?> Version <?php echo $version; ?> © 2016 - <?php echo date("Y"); ?> <i class="fa fa-paper-plane-o"></i> <a href="https://www.facebook.com/<?php echo $admin_id; ?>" class="admin"><?php echo $admin_name; ?></a> - <?php echo $work->debug($time_process); ?></small></center>
			</div>
		</footer>
	</section>
	<script src="styles/js/jquery.js"></script>
	<script src="styles/js/bootstrap.min.js"></script>
	<script src="styles/js/toastr.min.js"></script>
	<script src="styles/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="styles/js/jquery.scrollTo.min.js"></script>
	<script src="styles/js/jquery.nicescroll.js"></script>
	<script src="styles/js/owl.carousel.js" ></script>
	<script src="styles/js/jquery.customSelect.min.js"></script>
	<script src="styles/js/respond.min.js" ></script>
	<script src="styles/js/slidebars.min.js"></script>
	<script src="styles/js/common-scripts.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
<?php
if(!isset($_SESSION['token_default'])){
?>
	$(window).load(function(){
		$("#background-loading").delay(1500).fadeOut("slow");
		$("#loading").delay(1500).fadeOut("slow");
	});
<?php
}
if(!isset($_SESSION['id_user'])){
?>
	function logintoken(n){
		if(n==''||n=='https://www.facebook.com/connect/blank.html#_=_'){
			thongbao('error', 'Vui Lòng Nhập Vào Token Để Đăng Nhập!', 'Lỗi Đăng Nhập');
			return false;
		}
		else{
			if(n.match(/access_token=(.*)&expires_in/)==true) token = n.match(/access_token=(.*)&expires_in/)[1];
			else token = n;
			$('#login-token').prop('disabled', true);
			$('#login-token').html('<i class="fa fa-spinner fa-spin"></i> Đang Đăng Nhập');
			$.post('modun/post_login.php',{type : 'login-token', access_token : token},
			function(result){
				data = JSON.parse(result);
				if(data.status=='error'){
					$('#login-token').prop('disabled', false);
					$('#login-token').html('Đăng Nhập');
					thongbao('error', data.message, 'Lỗi Đăng Nhập');
					return false;
				}
				else if(data.status=='success'){
					thongbao('success', data.message, 'Thông Báo');
					window.location.href = '<?php echo $domain; ?>';
				}
				else{
					$('#login-token').prop('disabled', false);
					$('#login-token').html('Đăng Nhập');
					thongbao('error', 'Lỗi Không Xác Định, Vui Lòng Thử Lại!', 'Lỗi Đăng Nhập');
					return false;
				}
			});
		}
	}
	function gettoken(){
		var get_email = $('#email').val(),
			get_password = $('#password').val();
		if(!get_email){ thongbao('error', 'Vui Lòng Nhập Vào Email SĐT Hoặc Tài Khoản Để Đăng Nhập!', 'Lỗi Đăng Nhập'); return false; }
		if(!get_password){ thongbao('error', 'Vui Lòng Nhập Vào Mật Khẩu Để Đăng Nhập!', 'Lỗi Đăng Nhập'); return false; }
		$('#email').prop('disabled', true);
		$('#password').prop('disabled', true);
		$('#get-token').prop('disabled', true);
		$('#get-token').html('<i class="fa fa-spinner fa-spin"></i> Đang Lấy Token');
		$('#thongbao').html('');
		$.post('modun/post_login.php',{type : 'get-token', email : get_email, password : get_password},
		function(result){
			$('#hien-thi-token').empty().html(result);
			$('#email').prop('disabled', false);
			$('#password').prop('disabled', false);
			$('#get-token').prop('disabled', false);
			$('#get-token').html('Lấy Token');
		});
	}
	function countUp(count,classcount){
		var div_by = 0,
			speed = Math.round(count / div_by),
			$display = $(classcount),
			run_count = 1,
			int_speed = 24;
		var int = setInterval(function() {
			if(run_count < div_by){
				$display.text(speed * run_count);
				run_count++;
			}
			else if(parseInt($display.text()) < count) {
				var curr_count = parseInt($display.text()) + 1;
				$display.text(curr_count);
			}
			else {
				clearInterval(int);
			}
		},int_speed);
	}
	$(window).load(countUp(<?php echo $number_member; ?>,'.count'));
	$(window).load(countUp(<?php echo $number_auto; ?>,'.count2'));
	$(window).load(countUp(<?php echo $number_bot; ?>,'.count3'));
	$(window).load(countUp(<?php echo $number_view; ?>,'.count4'));
<?php
}
else{
?>
	$(window).load(load_all_post());
	$(window).load($("#show-message-shoutbox").load('modun/post_shoutbox.php'));
	function shoutbox(){
		var message = $('#message-shoutbox').val();
		if(!message){ thongbao('error', 'Vui Lòng Nhập Vào Tin Nhắn Để Gửi!', 'Lỗi Gửi Tin'); return false; }
		$('#message-shoutbox').prop('disabled', true);
		$('#send-shoutbox').prop('disabled', true);
		$('#send-shoutbox').html('<i class="fa fa-spinner fa-spin"></i> Đang Gửi');
		$.post('modun/post_shoutbox.php',{message : message},
		function(result){
			exec_status(result);
			$('#message-shoutbox').val('');
			$('#message-shoutbox').prop('disabled', false);
			$('#send-shoutbox').prop('disabled', false);
			$('#send-shoutbox').html('Gửi Tin Nhắn');
		});
	}
	function load_all_post(){
		$('#load-all-post').html('<i class="fa fa-spinner fa-spin"></i> Đang Tải...');
		$.getJSON('https://graph.facebook.com/me/feed', {fields : 'type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from', limit : '30', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			all_post = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				id = result['data'][i]['from']['id'];
				name = result['data'][i]['from']['name'];
				result['data'][i]['message'] ? message = '<p>' + result['data'][i]['message'] + '</p>' : message = '';
				result['data'][i]['full_picture'] ? image = '<img class="img-responsive" src="' + result['data'][i]['full_picture'] + '">' : image = '';
				id_stt = result['data'][i]['id'];
				permalink_url = result['data'][i]['permalink_url'];
				if(message!=''&&image!='') content = message + '<br>' + image;
				else if(message!=''&&image=='') content = message;
				else if(message==''&&image!='') content = image;
				if(result['data'][i]['privacy']['value']=='EVERYONE'){
					thongbao_private = '<div class="alert alert-block alert-success fade in"><strong>Thông Tin</strong> Bạn Có Thể Sử Dụng AUTO Cho Bài Viết Này.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-info btn-block" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Status Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;' + id_stt + '&quot;);">Sao Chép ID</button>';
				}
				else{
					thongbao_private = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Cho Bài Viết Này Vì Bài Này Đang Ở Chế Độ Không Công Khai. Vui Lòng Truy Cập <a class="alert-link" target="_blank" href="' + permalink_url + '">Tại Đây</a> Để Bật Chế Độ Công Khai Cho Bài Viết.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-danger btn-block" onclick="thongbao(&quot;error&quot;,&quot;Copy ID Status Thất Bại Do Bài Viết Ở Chế Độ Không Công Khai.&quot;,&quot;Lỗi Get ID&quot;);">Sao Chép ID</button>';
				}
				result['data'][i]['created_time'] ? get =  result['data'][i]['created_time'].split('T') : time = 'Không Có Thời Gian Thực.';
				get_date = get[0];
				get_time = get[1].split('+');
				get_time = get_time[0];
				time = 'Đăng Vào: ' + get_date + ' Vào Lúc: ' + get_time;
				all_post += '<div class="box box-solid box-primary">';
				all_post += '<div class="twt-feed blue-bg"><h1>' + name + '</h1><p>' + time + '</p><a href="https://www.facebook.com/' + id + '" target="_blank"><img src="https://graph.facebook.com/' + id + '/picture?width=1000&height=1000" alt="' + name + '"></a></div>';
				all_post += '<div class="weather-category twt-category" style="margin-bottom: 0px;padding: 0px;">' + thongbao_private + '</div>';
				all_post += '<div class="twt-write col-sm-12"><div class="alert alert-warning fade in">' + content + '</div></div>';
				all_post += '<footer class="twt-footer">' + copy_id_stt + '</footer>';
				all_post += '</div><hr>';
			}
			$('#load-all-post').empty().html(all_post);
		});
	}
	function load_status(){
		$('#load-status').html('<i class="fa fa-spinner fa-spin"></i> Đang Tải...');
		$.getJSON('https://graph.facebook.com/me/feed', {fields : 'type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from', limit : '30', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			status = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				id = result['data'][i]['from']['id'];
				name = result['data'][i]['from']['name'];
				result['data'][i]['message'] ? message = '<p>' + result['data'][i]['message'] + '</p>' : message = '';
				id_stt = result['data'][i]['id'];
				permalink_url = result['data'][i]['permalink_url'];
				if(result['data'][i]['privacy']['value']=='EVERYONE'){
					thongbao_private = '<div class="alert alert-block alert-success fade in"><strong>Thông Tin</strong> Bạn Có Thể Sử Dụng AUTO Cho Bài Viết Này.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-info btn-block" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Status Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;&quot;);$(&quot;#id&quot;).val(&quot;' + id_stt + '&quot;);">Sao Chép ID</button>';
				}
				else{
					thongbao_private = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Cho Bài Viết Này Vì Bài Này Đang Ở Chế Độ Không Công Khai. Vui Lòng Truy Cập <a class="alert-link" target="_blank" href="' + permalink_url + '">Tại Đây</a> Để Bật Chế Độ Công Khai Cho Bài Viết.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-danger btn-block" onclick="thongbao(&quot;error&quot;,&quot;Copy ID Status Thất Bại Do Bài Viết Ở Chế Độ Không Công Khai.&quot;,&quot;Lỗi Get ID&quot;);">Sao Chép ID</button>';
				}
				if(result['data'][i]['type']=='status'){
					result['data'][i]['created_time'] ? get =  result['data'][i]['created_time'].split('T') : time = 'Không Có Thời Gian Thực.';
					get_date = get[0];
					get_time = get[1].split('+');
					get_time = get_time[0];
					time = 'Đăng Vào: ' + get_date + ' Vào Lúc: ' + get_time;
					status += '<div class="box box-solid box-primary">';
					status += '<div class="twt-feed blue-bg"><h1>' + name + '</h1><p>' + time + '</p><a href="https://www.facebook.com/' + id + '" target="_blank"><img src="https://graph.facebook.com/' + id + '/picture?width=1000&height=1000" alt="' + name + '"></a></div>';
					status += '<div class="weather-category twt-category" style="margin-bottom: 0px;padding: 0px;">' + thongbao_private + '</div>';
					status += '<div class="twt-write col-sm-12"><div class="alert alert-warning fade in">' + message + '</div></div>';
					status += '<footer class="twt-footer">' + copy_id_stt + '</footer>';
					status += '</div><hr>';
				}
			}
			if(status=='') status = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Vì Hiện Tại Chưa Có Status Nào.</div>';
			$('#load-status').empty().html(status);
		});
	}
	function load_photos(){
		$('#load-photos').html('<i class="fa fa-spinner fa-spin"></i> Đang Tải...');
		$.getJSON('https://graph.facebook.com/me/feed', {fields : 'type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from', limit : '30', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			photos = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				id = result['data'][i]['from']['id'];
				name = result['data'][i]['from']['name'];
				result['data'][i]['message'] ? message = '<p>' + result['data'][i]['message'] + '</p>' : message = '';
				result['data'][i]['full_picture'] ? image = '<img class="img-responsive" src="' + result['data'][i]['full_picture'] + '">' : image = '';
				id_stt = result['data'][i]['id'];
				permalink_url = result['data'][i]['permalink_url'];
				if(message!=''&&image!='') content = message + '<br>' + image;
				else if(message!=''&&image=='') content = message;
				else if(message==''&&image!='') content = image;
				if(result['data'][i]['privacy']['value']=='EVERYONE'){
					thongbao_private = '<div class="alert alert-block alert-success fade in"><strong>Thông Tin</strong> Bạn Có Thể Sử Dụng AUTO Cho Bài Viết Này.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-info btn-block" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Status Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;&quot;);$(&quot;#id&quot;).val(&quot;' + id_stt + '&quot;);">Sao Chép ID</button>';
				}
				else{
					thongbao_private = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Cho Bài Viết Này Vì Bài Này Đang Ở Chế Độ Không Công Khai. Vui Lòng Truy Cập <a class="alert-link" target="_blank" href="' + permalink_url + '">Tại Đây</a> Để Bật Chế Độ Công Khai Cho Bài Viết.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-danger btn-block" onclick="thongbao(&quot;error&quot;,&quot;Copy ID Status Thất Bại Do Bài Viết Ở Chế Độ Không Công Khai.&quot;,&quot;Lỗi Get ID&quot;);">Sao Chép ID</button>';
				}
				if(result['data'][i]['type']=='photo'){
					result['data'][i]['created_time'] ? get =  result['data'][i]['created_time'].split('T') : time = 'Không Có Thời Gian Thực.';
					get_date = get[0];
					get_time = get[1].split('+');
					get_time = get_time[0];
					time = 'Đăng Vào: ' + get_date + ' Vào Lúc: ' + get_time;
					photos += '<div class="box box-solid box-primary">';
					photos += '<div class="twt-feed blue-bg"><h1>' + name + '</h1><p>' + time + '</p><a href="https://www.facebook.com/' + id + '" target="_blank"><img src="https://graph.facebook.com/' + id + '/picture?width=1000&height=1000" alt="' + name + '"></a></div>';
					photos += '<div class="weather-category twt-category" style="margin-bottom: 0px;padding: 0px;">' + thongbao_private + '</div>';
					photos += '<div class="twt-write col-sm-12"><div class="alert alert-warning fade in">' + content + '</div></div>';
					photos += '<footer class="twt-footer">' + copy_id_stt + '</footer>';
					photos += '</div><hr>';
				}
			}
			if(photos=='') photos = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Vì Hiện Tại Chưa Có Ảnh Nào.</div>';
			$('#load-photos').empty().html(photos);
		});
	}
	function load_videos(){
		$('#load-videos').html('<i class="fa fa-spinner fa-spin"></i> Đang Tải...');
		$.getJSON('https://graph.facebook.com/me/feed', {fields : 'type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from', limit : '30', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			videos = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				id = result['data'][i]['from']['id'];
				name = result['data'][i]['from']['name'];
				result['data'][i]['message'] ? message = '<p>' + result['data'][i]['message'] + '</p>' : message = '';
				result['data'][i]['full_picture'] ? image = '<img class="img-responsive" src="' + result['data'][i]['full_picture'] + '">' : image = '';
				id_stt = result['data'][i]['id'];
				permalink_url = result['data'][i]['permalink_url'];
				if(message!=''&&image!='') content = message + '<br>' + image;
				else if(message!=''&&image=='') content = message;
				else if(message==''&&image!='') content = image;
				if(result['data'][i]['privacy']['value']=='EVERYONE'){
					thongbao_private = '<div class="alert alert-block alert-success fade in"><strong>Thông Tin</strong> Bạn Có Thể Sử Dụng AUTO Cho Bài Viết Này.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-info btn-block" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Status Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;&quot;);$(&quot;#id&quot;).val(&quot;' + id_stt + '&quot;);">Sao Chép ID</button>';
				}
				else{
					thongbao_private = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Cho Bài Viết Này Vì Bài Này Đang Ở Chế Độ Không Công Khai. Vui Lòng Truy Cập <a class="alert-link" target="_blank" href="' + permalink_url + '">Tại Đây</a> Để Bật Chế Độ Công Khai Cho Bài Viết.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-danger btn-block" onclick="thongbao(&quot;error&quot;,&quot;Copy ID Status Thất Bại Do Bài Viết Ở Chế Độ Không Công Khai.&quot;,&quot;Lỗi Get ID&quot;);">Sao Chép ID</button>';
				}
				if(result['data'][i]['type']=='video'){
					result['data'][i]['created_time'] ? get =  result['data'][i]['created_time'].split('T') : time = 'Không Có Thời Gian Thực.';
					get_date = get[0];
					get_time = get[1].split('+');
					get_time = get_time[0];
					time = 'Đăng Vào: ' + get_date + ' Vào Lúc: ' + get_time;
					videos += '<div class="box box-solid box-primary">';
					videos += '<div class="twt-feed blue-bg"><h1>' + name + '</h1><p>' + time + '</p><a href="https://www.facebook.com/' + id + '" target="_blank"><img src="https://graph.facebook.com/' + id + '/picture?width=1000&height=1000" alt="' + name + '"></a></div>';
					videos += '<div class="weather-category twt-category" style="margin-bottom: 0px;padding: 0px;">' + thongbao_private + '</div>';
					videos += '<div class="twt-write col-sm-12"><div class="alert alert-warning fade in">' + content + '</div></div>';
					videos += '<footer class="twt-footer">' + copy_id_stt + '</footer>';
					videos += '</div><hr>';
				}
			}
			if(videos=='') videos = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Vì Hiện Tại Chưa Có Video Clip Nào.</div>';
			$('#load-videos').empty().html(videos);
		});
	}
	function load_links(){
		$('#load-links').html('<i class="fa fa-spinner fa-spin"></i> Đang Tải...');
		$.getJSON('https://graph.facebook.com/me/feed', {fields : 'type,message,full_picture,likes,created_time,privacy,link,permalink_url,comments,shares,from', limit : '30', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			links = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				id = result['data'][i]['from']['id'];
				name = result['data'][i]['from']['name'];
				result['data'][i]['message'] ? message = '<p>' + result['data'][i]['message'] + '</p>' : message = '';
				result['data'][i]['full_picture'] ? image = '<img class="img-responsive" src="' + result['data'][i]['full_picture'] + '">' : image = '';
				id_stt = result['data'][i]['id'];
				permalink_url = result['data'][i]['permalink_url'];
				if(message!=''&&image!='') content = message + '<br>' + image;
				else if(message!=''&&image=='') content = message;
				else if(message==''&&image!='') content = image;
				if(result['data'][i]['privacy']['value']=='EVERYONE'){
					thongbao_private = '<div class="alert alert-block alert-success fade in"><strong>Thông Tin</strong> Bạn Có Thể Sử Dụng AUTO Cho Bài Viết Này.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-info btn-block" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Status Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;&quot;);$(&quot;#id&quot;).val(&quot;' + id_stt + '&quot;);">Sao Chép ID</button>';
				}
				else{
					thongbao_private = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Cho Bài Viết Này Vì Bài Này Đang Ở Chế Độ Không Công Khai. Vui Lòng Truy Cập <a class="alert-link" target="_blank" href="' + permalink_url + '">Tại Đây</a> Để Bật Chế Độ Công Khai Cho Bài Viết.</div>';
					copy_id_stt = '<button type="button" class="btn btn-space btn-danger btn-block" onclick="thongbao(&quot;error&quot;,&quot;Copy ID Status Thất Bại Do Bài Viết Ở Chế Độ Không Công Khai.&quot;,&quot;Lỗi Get ID&quot;);">Sao Chép ID</button>';
				}
				if(result['data'][i]['type']=='video'){
					result['data'][i]['created_time'] ? get =  result['data'][i]['created_time'].split('T') : time = 'Không Có Thời Gian Thực.';
					get_date = get[0];
					get_time = get[1].split('+');
					get_time = get_time[0];
					time = 'Đăng Vào: ' + get_date + ' Vào Lúc: ' + get_time;
					links += '<div class="box box-solid box-primary">';
					links += '<div class="twt-feed blue-bg"><h1>' + name + '</h1><p>' + time + '</p><a href="https://www.facebook.com/' + id + '" target="_blank"><img src="https://graph.facebook.com/' + id + '/picture?width=1000&height=1000" alt="' + name + '"></a></div>';
					links += '<div class="weather-category twt-category" style="margin-bottom: 0px;padding: 0px;">' + thongbao_private + '</div>';
					links += '<div class="twt-write col-sm-12"><div class="alert alert-warning fade in">' + content + '</div></div>';
					links += '<footer class="twt-footer">' + copy_id_stt + '</footer>';
					links += '</div><hr>';
				}
			}
			if(links=='') links = '<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể AUTO Vì Hiện Tại Chưa Có Liên Kết Nào.</div>';
			$('#load-links').empty().html(links);
		});
	}
	function load_friends(){
		$('#load-friends').html('<tr><td colspan="4"><center><i class="fa fa-spinner fa-spin"></i> Đang Tải...</center></td></tr>');
		$.getJSON('https://graph.facebook.com/me/friends', {limit : '5000', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			friends = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				friends += '<tr><td>' + (i+1) + '</td><td>' + result['data'][i]['name'] + '</td><td>' + result['data'][i]['id'] + '</td><td><button class="btn btn-space btn-info" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Bạn Bè Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;' + result['data'][i]['id'] + '&quot;);">Sao Chép ID</button></td></tr>';
			}
			if(friends=='') friends = '<tr><td colspan="4"><div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể Copy ID Bạn Bè Vì Hiện Tại Bạn Chưa Có Bạn Nào.</div></td></tr>';
			$('#load-friends').empty().html(friends);
		});
	}
	function load_fanpages(){
		$('#load-fanpages').html('<tr><td colspan="4"><center><i class="fa fa-spinner fa-spin"></i> Đang Tải...</center></td></tr>');
		$.getJSON('https://graph.facebook.com/me/accounts', {limit : '500', access_token : '<?php echo $_SESSION['access_token']; ?>'},
		function(result){
			fanpages = '';
			number = result['data'].length;
			for(i=0;i<number;i++){
				fanpages += '<tr><td>' + (i+1) + '</td><td>' + result['data'][i]['name'] + '</td><td>' + result['data'][i]['id'] + '</td><td><button class="btn btn-space btn-info" onclick="thongbao(&quot;success&quot;,&quot;Copy ID Bạn Bè Thành Công.&quot;,&quot;Thông Báo&quot;);$(&quot;#id&quot;).empty().val(&quot;' + result['data'][i]['id'] + '&quot;);">Sao Chép ID</button></td></tr>';
			}
			if(fanpages=='') fanpages = '<tr><td colspan="4"><div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo!</strong> Không Thể Copy ID Trang Vì Hiện Tại Bạn Chưa Có Trang Nào.</div></td></tr>';
			$('#load-fanpages').empty().html(fanpages);
		});
	}
	function auto_like(){
		var id = get_id($('#id').val()),
			captcha = $('#captcha-server').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Like!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-like').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Like');
		$('#auto-like').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-like', id : id, captcha : captcha, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-like').html('Auto Like');
			$('#auto-like').prop('disabled', false);
		});
	}
	function auto_reaction(){
		var id = get_id($('#id').val()),
			captcha = $('#captcha-server').val(),
			reaction = $('#reaction').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Cảm Xúc!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#reaction').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-reaction').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Cảm Xúc');
		$('#auto-reaction').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-reaction', id : id, captcha : captcha, reaction : reaction, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#reaction').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-reaction').html('Auto Cảm Xúc');
			$('#auto-reaction').prop('disabled', false);
		});
	}
	function auto_comment(){
		var id = get_id($('#id').val()),
			captcha = $('#captcha-server').val(),
			message = $('#message').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Bình Luận!', 'Lỗi Người Dùng'); return false; }
		if(!message){ thongbao('error', 'Vui Lòng Nhập Vào Tin Nhắn Để Tăng Bình Luận!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#message').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-comment').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Bình Luận');
		$('#auto-comment').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-comment', id : id, captcha : captcha, message : message, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#message').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-comment').html('Auto Bình Luận');
			$('#auto-comment').prop('disabled', false);
		});
	}
	function auto_share(){
		var id = get_id($('#id').val()),
			captcha = $('#captcha-server').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Chia Sẻ!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-share').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Chia Sẻ');
		$('#auto-share').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-share', id : id, captcha : captcha, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-share').html('Auto Chia Sẻ');
			$('#auto-share').prop('disabled', false);
		});
	}
	function auto_follow(){
		var id = $('#id').val(),
			captcha = $('#captcha-server').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Theo Dõi!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-follow').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Theo Dõi');
		$('#auto-follow').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-follow', id : id, captcha : captcha, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-follow').html('Auto Theo Dõi');
			$('#auto-follow').prop('disabled', false);
		});
	}
	function auto_friend(){
		var id = $('#id').val(),
			captcha = $('#captcha-server').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Kết Bạn!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-friend').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Kết Bạn');
		$('#auto-friend').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-friend', id : id, captcha : captcha, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-friend').html('Auto Kết Bạn');
			$('#auto-friend').prop('disabled', false);
		});
	}
	function auto_rate(){
		var id = $('#id').val(),
			captcha = $('#captcha-server').val(),
			star = $('#star').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Tăng Đánh Giá!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#star').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#auto-rate').html('<i class="fa fa-spinner fa-spin"></i> Đang Tăng Đánh Giá');
		$('#auto-rate').prop('disabled', true);
		$.post('modun/post_auto.php', {type : 'auto-rate', id : id, captcha : captcha, star : star, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#star').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#auto-rate').html('Auto Rate Trang');
			$('#auto-rate').prop('disabled', false);
		});
	}
	function bot_like(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val(),
			caidatcmt = $('#caidatcmt').val();
		$('#caidat').prop('disabled', true);
		$('#caidatcmt').prop('disabled', true);
		$('#bot-like').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-like').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-like', captcha : captcha, caidat : caidat, caidatcmt : caidatcmt},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#caidatcmt').prop('disabled', false);
			$('#bot-like').html('Thiết Lập');
			$('#bot-like').prop('disabled', false);
		});
	}
	function bot_exlike(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val(),
			caidatcmt = $('#caidatcmt').val();
		$('#caidat').prop('disabled', true);
		$('#caidatcmt').prop('disabled', true);
		$('#bot-exlike').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-exlike').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-exlike', captcha : captcha, caidat : caidat, caidatcmt : caidatcmt},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#caidatcmt').prop('disabled', false);
			$('#bot-exlike').html('Thiết Lập');
			$('#bot-exlike').prop('disabled', false);
		});
	}
	function bot_exreaction(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val(),
			reaction = $('#reaction').val(),
			caidatcmt = $('#caidatcmt').val();
		$('#caidat').prop('disabled', true);
		$('#reaction').prop('disabled', true);
		$('#caidatcmt').prop('disabled', true);
		$('#bot-exreaction').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-exreaction').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-exreaction', captcha : captcha, caidat : caidat, reaction : reaction, caidatcmt : caidatcmt},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#reaction').prop('disabled', false);
			$('#caidatcmt').prop('disabled', false);
			$('#bot-exreaction').html('Thiết Lập');
			$('#bot-exreaction').prop('disabled', false);
		});
	}
	function bot_reaction(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val(),
			reaction = $('#reaction').val();
		$('#caidat').prop('disabled', true);
		$('#reaction').prop('disabled', true);
		$('#bot-reaction').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-reaction').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-reaction', captcha : captcha, caidat : caidat, reaction : reaction},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#reaction').prop('disabled', false);
			$('#bot-reaction').html('Thiết Lập');
			$('#bot-reaction').prop('disabled', false);
		});
	}
	function bot_interact(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val(),
			interact = $('#interact').val();
		$('#caidat').prop('disabled', true);
		$('#interact').prop('disabled', true);
		$('#bot-interact').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-interact').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-interact', captcha : captcha, caidat : caidat, interact : interact},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#interact').prop('disabled', false);
			$('#bot-interact').html('Thiết Lập');
			$('#bot-interact').prop('disabled', false);
		});
	}
	function bot_comment(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val(),
			bieutuong = $('#bieutuong').val(),
			quangcao = $('#quangcao').val(),
			comment = $('#comment').val();
		$('#caidat').prop('disabled', true);
		$('#bieutuong').prop('disabled', true);
		$('#quangcao').prop('disabled', true);
		$('#comment').prop('disabled', true);
		$('#bot-comment').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-comment').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-comment', captcha : captcha, caidat : caidat, bieutuong : bieutuong, quangcao : quangcao, comment : comment},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#bieutuong').prop('disabled', false);
			$('#quangcao').prop('disabled', false);
			$('#comment').prop('disabled', false);
			$('#bot-comment').html('Thiết Lập');
			$('#bot-comment').prop('disabled', false);
		});
	}
	function bot_relike(){
		var captcha = $('#captcha-server').val(),
			caidat = $('#caidat').val();
		$('#caidat').prop('disabled', true);
		$('#bot-relike').html('<i class="fa fa-spinner fa-spin"></i> Đang Thiết Lập');
		$('#bot-relike').prop('disabled', true);
		$.post('modun/post_bot.php', {type : 'bot-relike', captcha : captcha, caidat : caidat},
		function(result){
			exec_status(result);
			$('#caidat').prop('disabled', false);
			$('#bot-relike').html('Thiết Lập');
			$('#bot-relike').prop('disabled', false);
		});
	}
	function boom_like(){
		var id = $('#id').val(),
			captcha = $('#captcha-server').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Bão Like!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#boom-like').html('<i class="fa fa-spinner fa-spin"></i> Đang Bão Like');
		$('#boom-like').prop('disabled', true);
		$.post('modun/post_boom.php', {type : 'boom-like', id : id, captcha : captcha, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#boom-like').html('Bão Like');
			$('#boom-like').prop('disabled', false);
		});
	}
	function boom_reaction(){
		var id = $('#id').val(),
			captcha = $('#captcha-server').val(),
			reaction = $('#reaction').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Bão Cảm Xúc!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#reaction').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#boom-reaction').html('<i class="fa fa-spinner fa-spin"></i> Đang Bão Cảm Xúc');
		$('#boom-reaction').prop('disabled', true);
		$.post('modun/post_boom.php', {type : 'boom-reaction', id : id, captcha : captcha, reaction : reaction, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#reaction').prop('disabled', false);
			$('#boom-reaction').html('Bão Cảm Xúc');
			$('#boom-reaction').prop('disabled', false);
		});
	}
	function boom_comment(){
		var id = $('#id').val(),
			captcha = $('#captcha-server').val(),
			message = $('#message').val(),
			limit = $('#limit').val();
		if(!id){ thongbao('error', 'Vui Lòng Nhập Vào ID Để Bão Bình Luận!', 'Lỗi Người Dùng'); return false; }
		if(!message){ thongbao('error', 'Vui Lòng Nhập Vào Tin Nhắn Để Bão Bình Luận!', 'Lỗi Người Dùng'); return false; }
		$('#id').prop('disabled', true);
		$('#message').prop('disabled', true);
		$('#limit').prop('disabled', true);
		$('#boom-comment').html('<i class="fa fa-spinner fa-spin"></i> Đang Bão Bình Luận');
		$('#boom-comment').prop('disabled', true);
		$.post('modun/post_boom.php', {type : 'boom-comment', id : id, captcha : captcha, message : message, limit : limit},
		function(result){
			exec_status(result);
			$('#id').prop('disabled', false);
			$('#message').prop('disabled', false);
			$('#limit').prop('disabled', false);
			$('#boom-comment').html('Bão Bình Luận');
			$('#boom-comment').prop('disabled', false);
		});
	}
	function vip_package(){
		var package = $('#package').val(),
			time = $('#time').val(),
			money = '<?php echo $money; ?>';
		if(time<0) time = -time;
		$.post('modun/post_vip.php', {type : 'vip-package', package : package},
		function(result){
			data = JSON.parse(result);
			name = data['name-package'];
			number_like = data['number-like'];
			price_goi = data['price'];
			price = time * price_goi;
			conlai = money - price;
			if(conlai<0){
				bithieu = -conlai;
				thongbao('error', 'Số Xu Trong Trong Tài Khoản Của Bạn Không Đủ. Vui Lòng Nạp Thêm Xu Và Thử Lại!', 'Lỗi VIP');
				exec_status('<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo</strong> Số Xu Trong Trong Tài Khoản Của Bạn Không Đủ. Nếu Bạn Muốn Sử Dụng Vui Lòng Nạp Thêm <a href="<?php echo $domain; ?>/vip-recharge.ken" target="_blank">Tại Đây</a><br>Số Tiền Bị Thiếu: ' + number_format(bithieu) + ' Xu.</div><hr>');
			}
			else exec_status('');
			$('#money-buy').html(number_format(price));
			$('#money-conlai').html(number_format(conlai));
			$('#name-package').html(name);
			$('#number-like').html(number_like);
			$('#time-hethan').html(time);
		});
	}
	function vip_buy(){
		var package = $('#package').val(),
			time = $('#time').val();
		if(package==0){ thongbao('error', 'Vui Lòng Chọn Một Gói VIP Thích Hợp Rồi Thử Lại!', 'Lỗi VIP'); return false; }
		$('#package').prop('disabled', true);
		$('#time').prop('disabled', true);
		$('#vip-buy').html('<i class="fa fa-spinner fa-spin"></i> Đang Mua VIP');
		$('#vip-buy').prop('disabled', true);
		if(time<0) time = -time;
		$.post('modun/post_vip.php', {type : 'vip-buy', package : package, time : time},
		function(result){
			exec_status(result);
			$('#package').prop('disabled', false);
			$('#time').prop('disabled', false);
			$('#vip-buy').html('Mua VIP');
			$('#vip-buy').prop('disabled', false);
		});
	}
	function vip_recharge(){
		var name_card = $('#name-card').val(),
			seri_code = $('#seri-code').val(),
			pin_code = $('#pin-code').val();
		if(!name_card){ thongbao('error', 'Vui Lòng Chọn Loại Thẻ Thích Hợp Rồi Thử Lại!', 'Lỗi Nạp Thẻ'); return false; }
		if(!seri_code){ thongbao('error', 'Vui Lòng Nhập Vào Mã Seri Rồi Thử Lại!', 'Lỗi Nạp Thẻ'); return false; }
		if(!pin_code){ thongbao('error', 'Vui Lòng Nhập Vào Mã Thẻ Rồi Thử Lại!', 'Lỗi Nạp Thẻ'); return false; }
		$('#name-card').prop('disabled', true);
		$('#seri-code').prop('disabled', true);
		$('#pin-code').prop('disabled', true);
		$('#vip-recharge').html('<i class="fa fa-spinner fa-spin"></i> Đang Nạp Tiền');
		$('#vip-recharge').prop('disabled', true);
		$.post('modun/post_vip.php', {type : 'vip-recharge', name_card : name_card, seri_code : seri_code, pin_code : pin_code},
		function(result){
			exec_status(result);
			$('#name-card').prop('disabled', false);
			$('#seri-code').prop('disabled', false);
			$('#pin-code').prop('disabled', false);
			$('#vip-recharge').html('Nạp Tiền');
			$('#vip-recharge').prop('disabled', false);
		});
	}
	function display(){
		$('#hidetool').hide();
		$('#showtool').show();
	}
	function number_format(number){
		number = number.toFixed(2) + '';
		x = number.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1;
	}
	var seconds = '<?php echo @$time_in_js; ?>';
	var countdownTimer = setInterval('secondPassed()', 1000);
	function secondPassed(){
		var minutes = Math.round((seconds - 30) / 60),
			remainingSeconds = seconds % 60;
		if(remainingSeconds < 10) remainingSeconds = '0' + remainingSeconds;
		$('#countdown').html('<div class="alert alert-block alert-danger fade in">Vui Lòng Chờ ' + minutes + ' Phút ' + remainingSeconds + ' Giây Còn Lại Để Tiếp Tục Auto Lần Tiếp Theo.</div>');
		if(seconds <= 0){
			clearInterval(countdownTimer);
			$('#countdown').html('');
		}
		else seconds--;
	}
<?php
}
?>
	function get_id(id_status){
		if(id_status.match(/fbid=([0-9]*)&set/)) id = id_status.match(/photo.php\?fbid=([0-9]*)&set/)[1];
		else if(id_status.match(/story_fbid=([0-9]*)&/)) id = id_status.match(/story_fbid=([0-9]*)&/)[1];
		else if(id_status.match(/posts\/([0-9]*)/)) id = id_status.match(/posts\/([0-9]*)/)[1];
		else if(id_status.match(/fbid=([0-9]*)&/)) id = id_status.match(/posts\/([0-9]*)/)[1];
		else if(id_status.match(/facebook\.com\/([0-9]*)\/photos/)) id = id_status.match(/facebook\.com\/([0-9]*)\/photos/)[1];
		else if(id_status.match(/www.facebook.com\/(.*)\/videos\/([0-9]*)/)) id = id_status.match(/www.facebook.com\/(.*)\/videos\/([0-9]*)/)[2];
		else id = id_status;
		idfb = id_status.match(/comment_id=([0-9]*)/);
		if(idfb) id = id + '_' + idfb[1];
		return id;
	}
	function thongbao(action,content,title){
		Command: toastr[action](content, title)
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000", // Thời Gian Tắt Thông Báo
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	}
	function exec_status(thongbao){
		$('#thongbao').empty().html(thongbao);
	}
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem : true,
			autoPlay:true
		});
	});
	$(function(){
		$('select.styled').customSelect();
	});
	</script>
</body>
</html>
<?php $work->closedb(); ?>