<?php
session_start(); 
if($_SESSION['id'])
{
include'head.php';
include'bangnguoidung.php';
?>
<div class="panel panel-success">
<div class="panel-heading">Auto Like</div>
<div class="panel-body">
<div class="well well-sm">
<b><a href='index.php' size='+1'> Home <i class='fa fa-angle-double-left'></i><a href='autolike.php' size='+1'> Auto Like </a></b>
</div>
<span class="fcg">
<font size="+3" class="label label-success" color="red"><? echo $tongtoken; ?></font>
<br>Người dùng hoạt động<br>
<div class="lead" id="clock"></div>
<br>
</span>
<span class="label label-info">
Số like tối đa mỗi lần auto là:
<font class="badge" class="label label-danger"> 500</font>
</span>
<br><br>
<div id="auto_like" class="panel panel-success">
<div class="panel-heading">
Xin chào <b><? echo $_SESSION['name'];?></b>
</div>
<div class="panel-body">
Hệ thống Auto Like Cực Chất <br> <a href="http://fb.com/puaru">Nâng cấp VIP</a> để khỏi like cho người khác nhé. <br> chúc bạn online vui vẻ ha !
</div>
</div> <br>
Nhập id hoặc link ảnh/bài viết/video... hoặc <button class="btn btn-info" onclick="$('html, body').animate({scrollTop: $('#wall').offset().top}, 2000);">chọn ID trên tường bạn</button>	<br><br>
<form method="post" action="">
<input name="id_like" class="form-control" name ="id_like" id="id_like" placeholder="Nhập ID ảnh/bài viêt/video"/>
<br><br>
Số lượng
<br>
(Kéo thanh bên dưới để sửa số lượng):
<div id='limit_show'>
100
</div>
<br>
<input class="form-control input-sm" value="100" max="100" step=20 min=0 type="range" name ="limit" id="limit" onchange="$('#limit_show').html(document.getElementById('limit').value)">
<br><br>
<button id="like" class="btn btn-success">Tăng Like</button>

</form><br><br>
</div></div>
</div>
<?php } include 'foot.php'; 
if($_POST['id_like'] && $_SESSION['id']){
	
$idstt2=$_POST['id_like'];
$iduser=$_SESSION['id'];
$spam2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autolike` WHERE `iduser`='".$iduser."'"), 0);
if($spam2 == 0){
mysql_query("CREATE TABLE IF NOT EXISTS `autolike` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `iduser` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,
      `idlike` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysql_query(
         "INSERT INTO 
            autolike
         SET
            `iduser` = '" . mysql_real_escape_string($iduser) . "',
            `time` = '" . time() . "',
            `idlike` = '" . mysql_real_escape_string($idstt2) . "'
      ");
	$laytoken = mysql_query("SELECT * FROM `token` ORDER BY RAND() LIMIT 0,70");

	while ($getpu = mysql_fetch_array($laytoken)){
		$tokenlike= $getpu['access_token'];		
	auto('https://graph.facebook.com/'.$idstt2.'/likes?access_token='.$tokenlike.'&method=post');}
	die('<script>alert("Like Thành Công"); </script>');
 } else {	die('<script>alert("Like Không Thành Công - AntiSpam"); </script>'); }
}
?>
