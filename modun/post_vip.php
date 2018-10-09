<?php
//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

$url = 'https://www.baokim.vn/the-cao/restFul/send';
$merchant_id = '28996';
$api_username = 'test-tienichrhcloudcom';
$api_password = 'aHvZJTwYHccpgTYdS6RP';
$transaction_id = time();
$secure_code = '016469641e5a2bbb';
$file_card_true = 'cardtrue.log';
$file_card_false = 'cardfalse.log';

if(isset($_POST)&&isset($_SESSION['id_user'])){
	$package = @$_POST['package'];
	$time_vip = @$_POST['time'];
	$name_card = @$_POST['name_card'];
	$seri_code = @$_POST['seri_code'];
	$pin_code = @$_POST['pin_code'];
	$type = @$_POST['type'];
	if($type=='vip-package'){
		$vip = @$work->get_db('*', 'vip', 'loai', $package);
		switch($package){
			case '1' :
			$array = array(
				'name-package' => $vip['name'],
				'number-like'  => $vip['number_like'],
				'price'        => $vip['price']
			);
			break;
			case '2' :
			$array = array(
				'name-package' => $vip['name'],
				'number-like'  => $vip['number_like'],
				'price'        => $vip['price']
			);
			break;
			case '3' :
			$array = array(
				'name-package' => $vip['name'],
				'number-like'  => $vip['number_like'],
				'price'        => $vip['price']
			);
			break;
			case '4' :
			$array = array(
				'name-package' => $vip['name'],
				'number-like'  => $vip['number_like'],
				'price'        => $vip['price']
			);
			break;
			default :
			$array = array(
				'name-package' => 'Rỗng',
				'number-like'  => 0,
				'price'        => 0
			);
			break;
		}
		die(json_encode($array));
	}
	else if($type=='vip-buy'){
		if($package=='1'||$package=='2'||$package=='3'||$package=='4') $check_package = true;
		if(@$check_package!=true) die('<script>thongbao("error", "Gói VIP Không Hợp Lệ! Vui Lòng Thử Lại", "Lỗi VIP")</script>');
		if($time_vip=='1'||$time_vip=='3'||$time_vip=='5'||$time_vip=='7'||$time_vip=='30'||$time_vip=='60'||
		$time_vip=='90'||$time_vip=='120'||$time_vip=='150'||$time_vip=='180'||$time_vip=='210'||
		$time_vip=='240'||$time_vip=='270'||$time_vip=='300'||$time_vip=='330'||$time_vip=='365') $check_time_vip = true;
		if(@$check_time_vip!=true) die('<script>thongbao("error", "Thời Hạn VIP Không Hợp Lệ! Vui Lòng Thử Lại", "Lỗi VIP")</script>');
		$data = $work->get_db('money', 'user', 'id_user', $_SESSION['id_user']);
		$money = $data['money'];
		$vip = @$work->get_db('*', 'vip', 'loai', $package);
		$name_vip = $vip['name'];
		$price_vip = (int)$vip['price'];
		$time_vip = (int)$time_vip;
		$price_total = $price_vip * $time_vip;
		$conlai = $money - $price_total;
		if($conlai<0){
			$bithieu = -$conlai;
			die('<div class="alert alert-block alert-danger fade in"><strong>Cảnh Báo</strong> Số Xu Trong Trong Tài Khoản Của Bạn Không Đủ. Nếu Bạn Muốn Sử Dụng Vui Lòng Nạp Thêm <a href="'.$domain.'/vip-recharge.ken" target="_blank">Tại Đây</a><br>Số Tiền Bị Thiếu: ' . number_format($bithieu) . ' Xu.</div><hr><script>thongbao("error", "Số Xu Trong Trong Tài Khoản Của Bạn Không Đủ. Vui Lòng Nạp Thêm Xu Và Thử Lại!", "Lỗi VIP");</script>');
		}
		$time_use_vip = $time + 86400 * $time_vip;
		if($work->number_row("SELECT * FROM `user_vip` WHERE `id_user` = '".$_SESSION['id_user']."'")==0){
			@$work->query("INSERT INTO `user_vip` (`id_user`, `name`, `level`, `date`, `time`) VALUES ('".$_SESSION['id_user']."', '".$_SESSION['name']."', '".$package."', '".$date."', '".$time_use_vip."')");
			@$work->query("UPDATE `user` SET `money` = `money` - ".$price_vip." WHERE `id_user` = '".$_SESSION['id_user']."'");
			die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo VIP<br>+ Mua Gói VIP Thành Công.<br>+ Tên Gói: '.$name_vip.'.<br>+ Tên Người Dùng: '.$_SESSION['name'].'.<br>+ ID Người Dùng: '.$_SESSION['id_user'].'.<br>+ Thời Hạn: '.$time_vip.' Ngày.</p></div><script>thongbao("success", "Mua Gói VIP Thành Công.", "Thông Báo")</script><meta http-equiv="refresh" content="5">');
		}
		else die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo VIP<br>+ ID Của Bạn Đã Có Trên Hệ Thống VIP.<br>+ Nếu Bạn Muốn Nâng Cấp Gói VIP Đang Sử Dụng, Vui Lòng Liên Hệ Admin <a href="https://www.facebook.com/'.$admin_id.'" target="_blank">Tại Đây</a></p></div><script>thongbao("error", "ID Của Bạn Đã Có Trên Hệ Thống VIP. Vui Lòng Liên Hệ Admin Để Được Hỗ Trợ!", "Lỗi VIP");</script><hr><meta http-equiv="refresh" content="5">');
	}
	else if($type=='vip-recharge'){
		if($name_card=='VINA'||$name_card=='MOBI'||$name_card=='VIETEL'||$name_card=='VNM'||$name_card=='GATE') $check_name_card = true;
		if(@$check_name_card!=true) die('<script>thongbao("error", "Lỗi Thẻ Không Được Chấp Nhận, Vui Lòng Chọn Loại Thẻ Thích Hợp Rồi Thử Lại!", "Lỗi Nạp Thẻ");</script>');
		if($name_card=='VINA') $name_card_text = 'VinaPhone';
		else if($name_card=='MOBI') $name_card_text = 'MobiFone';
		else if($name_card=='VIETEL') $name_card_text = 'Viettel';
		else if($name_card=='VNM') $name_card_text = 'Vietnamobile';
		else if($name_card=='GATE') $name_card_text = 'Gate';
		$array = array(
			'merchant_id'    => $merchant_id,
			'api_username'   => $api_username,
			'api_password'   => $api_password,
			'transaction_id' => $transaction_id,
			'card_id'        => $name_card,
			'pin_field'      => $pin_code,
			'seri_field'     => $seri_code,
			'algo_mode'      => 'hmac'
		);
		ksort($array);
		$data_sign = hash_hmac('SHA1', implode('',$array), $secure_code);
		$array['data_sign'] = $data_sign;
		$curl = curl_init($url);
	    curl_setopt_array($curl, array(
			CURLOPT_POST           => true,
			CURLOPT_HEADER         => false,
			CURLINFO_HEADER_OUT    => true,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTPAUTH       => CURLAUTH_DIGEST|CURLAUTH_BASIC,
			CURLOPT_POSTFIELDS     => http_build_query($array)
	    ));
		$data = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$result = json_decode($data, true);
		if($status==200){
			$money_recharge = $result['amount'];
			switch($money_recharge){
				case 10000 : $money = 10000; break;
				case 20000 : $money = 20000; break;
				case 30000 : $money = 30000; break;
				case 50000 : $money = 50000; break;
				case 100000 : $money = 100000; break;
				case 200000 : $money = 200000; break;
				case 300000 : $money = 300000; break;
				case 500000 : $money = 500000; break;
				case 1000000 : $money = 1000000; break;
			}
			$work->query("UPDATE `user` SET `money` = `money` + $money WHERE `id_user` = '".$_SESSION['id_user']."'");
			$write = 'Tài Khoản: ' . $_SESSION['name'] . ' ID: ' . $_SESSION['id_user'] . ' Vừa Nạp Thành Công ' . number_format($money) . ' ' . $name_card_text . ' Vào Lúc: ' . $date;
			$file = @fopen($file_card_true, 'a');
			@fwrite($file, $write);
			@fwrite($file, "\r\n");
			@fclose($file);
			$data_money = $work->get_db('money', 'user', 'id_user', $_SESSION['id_user']);
			$money_user = $data_money['money'];
			die('<div class="alert alert-block alert-info fade in"><p align="left"><i class="fa fa-lightbulb-o"></i> Thông Báo Nạp Thẻ<br>+ Nạp Thẻ Thành Công.<br>+ Tên Tài Khoản: '.$_SESSION['name'].'<br>+ ID: '.$_SESSION['id_user'].'<br>+ Loại Thẻ: '.$name_card_text.'<br>+ Số Tiền: '.$money.'<br>+ Hiện Tại Có: '.$money_user.'</p></div><script>thongbao("success", "Nạp Thẻ Thành Công.", "Thông Báo")</script>');
		}
		else{
			$write = 'Tài Khoản: ' . $_SESSION['name'] . ' ID: ' . $_SESSION['id_user'] . ' Vừa Nạp Thất Bại Loại Thẻ: ' . $name_card_text . ' Mã Seri: ' . $seri_code . ' Mã Thẻ: ' . $seri_code . ' Mã Lỗi: ' . $status . ' Lỗi: ' . $result['errorMessage'] . ' Vào Lúc: ' . $date;
			$file = @fopen($file_card_false, 'a');
			@fwrite($file, $write);
			@fwrite($file, "\r\n");
			@fclose($file);
			die('<div class="alert alert-block alert-danger fade in"><p align="left"><i class="fa fa-recycle"></i> Thông Báo Nạp Thẻ<br>+ Nạp Thẻ Thất Bại.<br>+ Tên Tài Khoản: '.$_SESSION['name'].'<br>+ ID: '.$_SESSION['id_user'].'<br>+ Loại Thẻ: '.$name_card_text.'<br>+ Mã Seri: '.$seri_code.'<br>+ Mã Thẻ: '.$pin_code.'<br>+ Mã Lỗi: '.$status.'<br>+ '.$result['errorMessage'].'</p></div><script>thongbao("error", "Nạp Thẻ Thất Bại!", "Lỗi Nạp Thẻ");</script>');
		}
	}
}
$work->closedb();
?>