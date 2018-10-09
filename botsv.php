<?php
session_start(); 
if($_SESSION['id'])
{
include'head.php';
include'bangnguoidung.php';
$dem = mysql_result(mysql_query("select count(*) from `botsv` where `user_id`='".$_SESSION['id']."' "),0);
$tonguser = mysql_result(mysql_query("select count(*) from `botsv`"),0);
?>
<div class="panel panel-info">
<div class="panel-heading">Bot Sao Vàng</div>
<div class="panel-body">
<b><div class="well well-sm"><a href='index.php' size='+1'> Home </a><i class='fa fa-angle-double-left'></i><a href='index.php?act=Bot-Like-Comment' size='+1'> Bot Like</a></b></div>
<b><span class="label label-info"> Trạng thái: <font class="badge" class="label label-danger"> <?php if($dem == 0) {echo 'Chưa Cài Đặt';}else{echo'Đã Cài Đặt';} ?>
</font></span></b>
<br/><br>
<span class="fcg"><font size="+3" class="label label-success" color="red">
<? echo $tonguser;?></font> <br>Người dùng hoạt động</span><br><br>
<div class="panel panel-primary">
<div class="panel-heading">Xin chào <b><? echo $_SESSION['name'];?></b></div>
<div class="panel-body">Sử dụng mẫu dưới đây để cài đặt Bot Sao Vàng</div>
</div>
</div>
<form method="post" action=""/><div class="acw abt">
<center><span class="label label-primary"> Bot Sao Vàng </span></center><br><center>
<select name="online" class="input"><option value="1"> Bật</option>
<option value="2"> Tắt</option></select></center>
</div><div class="acw abb abt" align="center"><br>
<input type="submit" name="Cài đặt" value="Cài đặt" class="btn btn-primary"/>
<br><br>
</form>
<br>
<div class="alert alert-warning">
<b>Chú ý: </b> Bot Sao Vàng sẽ hoạt động sau 5-10p sau khi cài, vui lòng đăng nhập để cập nhật token nếu bot không hoạt động.
</div>
</div>
</div>
</div>
<?php } include'foot.php'; 
if($_POST['online'] == 1 && $_SESSION['id'])
{
	mysql_query("CREATE TABLE IF NOT EXISTS `botsv` (
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
         botsv
      WHERE
         user_id = '" . mysql_real_escape_string($_SESSION['id']) . "'
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               botsv
            WHERE
               user_id='" . mysql_real_escape_string($_SESSION['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            botsv
         SET
            `user_id` = '" . mysql_real_escape_string($_SESSION['id']) . "',
            `name` = '" . mysql_real_escape_string($_SESSION['name']) . "',
            `access_token` = '" . mysql_real_escape_string($_SESSION['token']) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            botsv
         SET
            `access_token` = '" . mysql_real_escape_string($_SESSION['token']) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
   ?>
   <meta http-equiv=refresh content="0; URL=botsv.php">
   <?
} else if( $_POST['online'] == 2 && $_SESSION['id'] ) { mysql_query("
            DELETE FROM
               botsv
            WHERE
               user_id='" . mysql_real_escape_string($_SESSION['id']) . "' 
         ");}
?>