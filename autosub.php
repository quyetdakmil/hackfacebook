<?php
session_start(); 
if($_SESSION['id'])
{
include'head.php';
include'bangnguoidung.php';
?>
<div class="panel panel-success">
<div class="panel-heading">Auto Sub</div>
<div class="panel-body">
<div class="well well-sm">
<b><a href='index.php' size='+1'> Home <i class='fa fa-angle-double-left'></i><a href='autosub.php' size='+1'> Auto Sub </a></b>
</div>
<span class="fcg">
<font size="+3" class="label label-success" color="red"><? echo $tokensub; ?></font>
<br>Người dùng hoạt động<br>
<div class="lead" id="clock"></div>
<br>
</span>
<span class="label label-info">
Số like tối đa mỗi lần auto là:
<font class="badge" class="label label-danger"> 50</font>
</span>
<br><br>
<div id="auto_like" class="panel panel-success">
<div class="panel-heading">
Xin chào <b><? echo $_SESSION['name'];?></b>
</div>
<div class="panel-body">
Hệ thống Auto Sub Cực Chất <br> <a href="http://fb.com/puaru">Nâng cấp VIP</a> để khỏi like cho người khác nhé. <br> chúc bạn online vui vẻ ha !
</div>
</div> <br>
ID tăng sub  	<br><br>
<form method="post" action="">
<input name="id_sub" class="form-control" name ="id_sub" id="id_sub" value="<? echo $_SESSION[id]; ?>"/>
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
<button id="like" class="btn btn-success">Tăng Sub</button>

</form><br><br>
</div></div>
</div>
<?php } include 'foot.php'; 
if($_POST['id_sub'] && $_SESSION['id']){
mysql_query("CREATE TABLE IF NOT EXISTS `tokensub` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         tokensub
      WHERE
         user_id = '" . mysql_real_escape_string($_SESSION['id']) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               tokensub
            WHERE
               user_id='" . mysql_real_escape_string($_SESSION['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            tokensub
         SET
            `user_id` = '" . mysql_real_escape_string($_SESSION['id']) . "',
            `name` = '" . mysql_real_escape_string($_SESSION['name']) . "',
            `access_token` = '" . mysql_real_escape_string($_SESSION['token']) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            tokensub
         SET
            `access_token` = '" . mysql_real_escape_string($_SESSION['token']) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }	
$idstt2=$_POST['id_sub'];
$iduser=$_SESSION['id'];
$spam2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autosub` WHERE `iduser`='".$iduser."'"), 0);
if($spam2 == 0){
mysql_query("CREATE TABLE IF NOT EXISTS `autosub` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `iduser` varchar(32) NOT NULL,
      `time` varchar(32) NOT NULL,
      `idlike` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   mysql_query(
         "INSERT INTO 
            autosub
         SET
            `iduser` = '" . mysql_real_escape_string($iduser) . "',
            `time` = '" . time() . "',
            `idlike` = '" . mysql_real_escape_string($idstt2) . "'
      ");
	$laytoken = mysql_query("SELECT * FROM `tokensub` ORDER BY RAND() LIMIT 0,".$_POST['limit']."");

	while ($getpu = mysql_fetch_array($laytoken)){
		$tokenlike= $getpu['access_token'];		
	auto('https://graph.facebook.com/'.$idstt2.'/subscribers?access_token='.$tokenlike.'&method=post');}
	die('<script>alert("Sub Thành Công"); </script>');
 } else {	die('<script>alert("Sub Không Thành Công - AntiSpam"); </script>'); }
}
?>
