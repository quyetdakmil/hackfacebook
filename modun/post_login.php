<?php
//---------LOAD LIBRARY---------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//------------------------------//
if(isset($_POST)){
	$type = @$_POST['type'];
	if($type=='login-token'){
		$token = $_POST['access_token'];
		$me = $work->me($token);
		$app = $work->app($token);
		if(isset($me['id'])){
			if(preg_match('/@tfbnw.net/',$me['email'])||preg_match('/CAAC/',$token)){
				$status = array(
					'status' => 'error',
					'message' => 'Vui Lòng Không Sử Dụng Token Ảo Để Đăng Nhập!'
				);
			}
			else if($app['id']!='6628568379'){
				$status = array(
					'status' => 'error',
					'message' => 'Vui Lòng Sử Dụng Token IPHONE Để Đăng Nhập!'
				);
			}
			else{
				$_SESSION['token_default'] = $token;
				$status = array(
					'status' => 'success',
					'message' => 'Đăng Nhập Thành Công, Hệ Thống Đang Chuyển Hướng.'
				);
			}
		}
		else{
			$status = array(
				'status' => 'error',
				'message' => 'Token Đã Chết, Vui Lòng Lấy Lại Token Để Đăng Nhập!'
			);
		}
		echo json_encode($status);
	}
	else if($type=='get-token'){
		$data = array(
			"api_key" => "3e7c78e35a76a9299309885393b02d97",
			"email" => @$_POST['email'],
			"format" => "JSON",
			"locale" => "vi_VN",
			"method" => "auth.login",
			"password" => @$_POST['password'],
			"return_ssl_resources" => "0",
			"v" => "1.0"
		);
		$work->sign_creator($data);
		echo '<iframe width="100%" height="100%" src="https://api.facebook.com/restserver.php?'.http_build_query($data).'"></iframe>';
	}
}
?>