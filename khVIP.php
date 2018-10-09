<?php
include'head.php';
include'config.php';
?>
<script>
var seconds = ;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = "<h3>--> Next Submit: Wait  " + minutes + ":" + remainingSeconds + "  Seconds <--</h3>";
    if (seconds <= 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "<h3>--> Next Submit: READY....! <--</h3>";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
<script type="text/javascript">
function done()
	{
	$("#bodyupcmt").hide();
	$("#thongbao").show();
	}
</script>
<div class="col-sm-12 blog-main">

<div id="page-wrapper">
<div class="panel panel-primary">
<div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> KÍCH HOẠT VIP</h3>
                            </div>

	<div id="bodyupcmt" class="panel-body">
		<form action="/khv.php" method="POST">	
<div class="tab-content">
<input type="hidden" name="id" class="form-control" autofocus="" value="<? echo $_SESSION['id'];?>"required="">		

  <label>Nhập ID</label>
<br />
<i> id dạng "100006679301701"</i>
<input type="text" name="idv" class="form-control" value="" placeholder="ID kích hoạt VIP" autofocus="" required="">	



	</div>
	

                                            <label>Ngày VIP</label>


<br />
<i> Ngày bằng số <= 90</i>
<input type="text" name="ngayv" class="form-control" value="" placeholder="Định Dạng Số" autofocus="" required="">
<span class="input-group-btn">
	<center>	<button type="submit" name="submit" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> KÍCH HOẠT
						</span>
				</button>			</center>			</span>
		</div>			

</form>
		</div>
		
		    <div class="panel panel-primary">
<div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Danh sách VIP</h3>
                            </div>	<table border= "1" width ="100%">
<tr align ="center">
<th>Stt</th>
<th>ID</th>
<th>Tên</th>
<th>Ngày KH</th>
<th>Người KH</th>
<th>Ngày Còn Lại</th>
<th>Trạng Thái</th>
<th>Xóa VIP</th>
</tr>
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$dt = mysql_query("SELECT * FROM token WHERE `het_VIP` > '".time()."' AND `domain_login` ='".$_SERVER['HTTP_HOST']."' order by cai_VIP DESC ");
$i = 0;
$thang = '2600640';
while ($dts = mysql_fetch_array($dt)){
echo '
<tr align ="center">
<td>'.++$i.'</td>
<td>'.$dts['user_id'].'</td>
<td>'.$dts['name'].'</td>
<td>'.date("d-m-Y [H:i]", $dts['cai_VIP']).'</td>
<td>'.$dts['kh_VIP'].'</td>
<td>';
$timevip = $dts['het_VIP'] - time();
echo round($timevip / 2600640 ).' Tháng '.date('d \N\g\à\y\ - h:i:s', $timevip).'</td>';
$token = '<font color="blue">Hoạt Động</font>';
if($dts['die'] == 4)
{
$token = '<font color="red">Token Chết</font>';
}
echo '<td>'.$token.'</td>
<td><form action="/khv.php" method="POST">
<input type="hidden" name="id" class="form-control" autofocus="" value="'.$_SESSION['id'].'"required="">	
<input type ="hidden" name ="idv" value ="'.$dts['user_id'].'">
<button type="submit" name="xoa" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Xóa
						</span>
				</button>
				</form></td>
</tr>';
}

?></table></div>

		
				

<div id="thongbao" style="display: none;"><div class="alert alert-danger">Trạng Thái: <span class="glyphicon glyphicon-refresh gly-animate"></span>  Đang Thực Hiện....
</font></div>

</section></section>
	
   
	<!-- ============================ End ============================ -->
    </div>