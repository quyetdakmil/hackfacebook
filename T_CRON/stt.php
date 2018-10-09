<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include'config.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `stt` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `stt` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `stt`"), 0);
$res = mysql_query("SELECT * FROM `stt` LIMIT $tong");
while ($post = mysql_fetch_array($res)){
$access_token = $post['access_token'];
$hari=date('w');
$tgl =date('d');
$bln =date('m');
$thn =date('Y');
switch($hari){
    case 0 : {$hari='Chủ Nhật';}break;
    case 1 : {$hari='Thứ Hai';}break;
    case 2 : {$hari='Thứ Ba';}break;
    case 3 : {$hari='Thứ Tư';}break;
    case 4 : {$hari='Thứ Năm';}break;
    case 5 : {$hari="Thứ Sáu";}break;
    case 6 : {$hari='Thứ 7';}break;
    default: {$hari='UnKnown';}break;
    }
switch($bln){
    case 1 : {$bln='Tháng 1';}break;
    case 2 : {$bln='Tháng 2';}break;
    case 3 : {$bln='Tháng 3';}break;
    case 4 : {$bln='Tháng 4';}break;
    case 5 : {$bln='Tháng 5';}break;
    case 6 : {$bln="Tháng 6";}break;
    case 7 : {$bln='Tháng 7';}break;
    case 8 : {$bln='Tháng 8';}break;
    case 9 : {$bln='Tháng 9';}break;
    case 10 : {$bln='Tháng 19';}break;
    case 11 : {$bln='Tháng 11';}break;
    case 12 : {$bln='Tháng 12';}break;
    default: {$bln='UnKnown';}break;
}

$jam=date('h:i');
$emoji="⭐";
$time="".$emoji." ".$jam.",".$hari.", Ngày ".$tgl." ".$bln." ".$thn." ".$emoji;
$slogan="#BOT_EX_NET";
$footer="".$time." \n ".$slogan."";
$tatmo = $post['tatmo'];
if($tatmo == 1){
$status = array(
'Tớ Ngốc Nên Cứ Mãi...  😞 

Chạy Theo  🚹 

Cậu... 🚺 

 ⭐ 

Tớ Ngốc Nên Cứ Mãi... 😔 

Chờ Cậu... 🚺 

⭐ 

⭐ 

Tớ Ngốc Nên Cứ Mãi...  😣 

Nhớ Cậu... 🚺 

⭐ 

⭐

Tớ Ngốc Nên Cứ Mãi...  😪 

Đau Vì Cậu... 🚺 

⭐ 

⭐

Tớ Ngốc Nên Cứ Mãi...  😰 

Yêu Cậu ... 🚺 

⭐

⭐ 

Nhưng Sao Cậu Vẫn Ko Thể Ở Bên Tớ Hả  ❔ 

⭐ 

⭐

⭐

🌟 
Tiền Ơi 💲  💰  💵  💴  😂 
'.$footer.'',
'___________________________________o88888o
 _________________________88o_____o88888888
 _______________________o888o___o8888888888
 _______o888ooo________o8888o_888888888888
 __ooo8888888888888___88888888888888888888
 ___*88888888888888o_88888888888888888888
 ___o8888888888888__88888888888888888888
 __o8888888888888__88888888888888888888
 ___88888888888*__888888888888888888*
 ______*88888*___888888888888888*
 _______888888__88888888888888*
 ______o88888888888888888888*
 ____o888888888888888888888888888888888888888oo
 ___8888888888888888888888888888888888888888888o
 _o8888888888888888888888888888888888888888888*
 888888888888888888888888888888888888888888**
 *8888888888888888888888888888888**
 _*88888888888*_88888
 __8888888888*___*8888
 __8888888888_____88888o
 __*888888888o_____88888o
 ___88888888888_____*8888o
 ___*888888888888o___*8888o
 ____*8888888888888o___*888o
 _____*88888888888888____8888
 _______8888888888888o____*888
 ________888888888888______*888o
 _________8888888888*_______*8888
 _________*8888888888oo______*888
 __________*8888888888888o
 ___________*88888888888888o
 ____________*888888888888888o
 ______________88888888___8888o
 _______________8888888_o88888
 _______________*8888888888*
 _________________8888888*
 __________________88888888888o
 ___________________88888888__*o
 ____________________8888888o
 _____________________8888888
 ______________________8888888
 ______________________*8888888
 ______________________888888888oo
 ______________________888__888888o
 _____________________o88___88888
 _____________________*_____8888
 __________________________o88
'.$footer.'',
            
            );
$message = $status[rand(0,count($status)-1)];
auto('https://graph.facebook.com/me/feed?access_token='.$access_token.'&message='.urlencode($message).'&method=post&subject=+');
  echo' Post : <font color="blue"><b>'.$message.'</font></b><br/>';
}}
function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }

?>
