<?php
//coder by itvn90
//coder là dam mê mặc dù hơi ngu Biểu tượng cảm xúc colonthree
//lấy giờ của sever
$hsv = date('H');
$isv = date('i');
//set múi giờ việt nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
//lấy giờ hiện tại
$hht = date('H');
$iht = date('i');
//tìm độ sai lệch múi giờ
if($hsv > $hht){
$sl = $hsv - $hht;
}
else{
$sl = $hht - $hsv;
}
//cân bằng thời gian sever và giờ việt nam
$hsv = $hsv + $sl;
if($hsv>23)
{
$hsv = abs($hsv-24);
}
$dem = strlen($hsv);
if($dem == 1){
$hsv = '0'.$hsv;
}
//lấy giờ
$hsv = $hsv.':'.$isv;
$hht = $hht.':'.$iht;
//kiểm tra kết quả
print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
print 'Giờ sv đã cân bằng: '.$hsv.'<br>Giờ việt nam hiện tại: '.$hht;
?>