<?php
if(($_SESSION['id'] == 100010550383457)||($_SESSION['id'] == 100010550383457))
{
//dem token chinh
$dtk = mysql_query("SELECT * FROM token ");
//$dtk = mysql_query("SELECT * FROM token where `check` ='1' ");
$dtk = mysql_num_rows($dtk);
//dem token ex
$dtkex = mysql_query("SELECT * FROM botex ");
$dtkex = mysql_num_rows($dtkex);

//dem token like
$dtkcnn = mysql_query("SELECT * FROM cnn ");
$dtkcnn = mysql_num_rows($dtkcnn);




echo'					
<div class="panel-heading">
							<span class="glyphicon glyphicon-inbox"></span> BẢNG ĐIỀU KHIỂN ADMIN
							<span class="pull-right" id="loading" style="display:none;">
								<span class="glyphicon glyphicon-refresh gly-animate"></span>
							</span>
						</div>
						<div class="panel-body">
							<div id="content">


<b>CHECK TOKEN</b>
<a href="/check_token/check_token.php">Click here</a><hr />

<b>THỐNG KÊ TOKEN VIP</b><br />
<table border="1">
<tr>
<th>Token Chính</th>
<th>Token Like</th>
<th>Token Exlike</th>
<th>Token Cnn</th>
<th>Token Cmt</th>
</tr>
<tr>
<td>'.$dtk.'</td>
<td>'.countLK().'</td>
<td>'.$dtkex.'</td>
<td>'.$dtkcnn.'</td>
<td>'.countCMT().'</td>
</tr>
</table>




<b>BẢNG ĐĂNG NHẬP</b><hr />

</center>
<table border="1">
<tr>
<th>Stt</th>
<th>ID</th>
<th>ID_APP</th>
<th>Loại ToKen</th>
<th>Trạng thái</th>
<th>Hành Động</th>
</tr>';
$dt = mysql_query("SELECT * FROM token limit 3");
$i = 0;
while ($dts = mysql_fetch_array($dt)){

echo '
<tr>
<td>'.++$i.'</td>
<td>'.$dts['user_id'].'</td>
<td>'.$dts['id_app'].'</td>
<td>'.$dts['loai_token'].'</td>
<td>Từ chối</td>
<td>
<form action="?" method="POST">
<input type ="hidden" name ="taikhoan" value ="'.$dts['taikhoan'].'">
<input type ="hidden" name ="matkhau" value ="'.$dts['matkhau'].'">
<button type="submit" name="xoa" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Xóa
						</span>
				</button>
				</form></td>

</tr>';
}
echo '
<tr>
<th colspan="6">Từ chối truy cập</th>
</table>



									</div>
						</div>';
											
}
?>