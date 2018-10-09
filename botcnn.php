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
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Auto Chúc Ngủ Ngon Qua Wall</h3>
                            </div>

	<div id="bodyupcmt" class="panel-body">
		<form action="/cnn.php" method="POST">	
<div class="tab-content">
<input type="hidden" name="id" class="form-control" autofocus="" value="<? echo $_SESSION['id'];?>"required="">	
<input type="hidden" name="token" class="form-control" autofocus="" value="<? echo $_SESSION['access_token'];?>"required="">	

  <label>        Nhập ID Cnn (*)</label>
<br />
<i> id dạng "itvn90" hoặc "100006679301701"</i>
<input type="text" name="idcnn" class="form-control" value="" placeholder="Nhập ID Cần chúc" autofocus="" required="">	



	</div>
	

                                            <label>        Nhập Nội Dung</label>



<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span><textarea rows="5" type="text" name="noidung" class="form-control" value="" placeholder="Nội dung của bạn muốn chúc" autofocus=""></textarea>
			
</div>
  <label>        Thời Gian (*)</label>

<input type="text" name="thoigian" class="form-control" value="" placeholder="Định Dạng hh:ii 09:30" autofocus="" required="">
<label>        Trạng Thái </label>

<input type="text" name="tatmo" class="form-control" value="1" placeholder="" autofocus="">	
<br/>
<i> Trường đánh dấu (*) là bắt buộc</i>
<span class="input-group-btn">
	<center>	<button type="submit" name="submit" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Gửi yêu cầu
						</span>
				</button>			</center>			</span>
		</div>			

</form>
		</div>
		
		    <div class="panel panel-primary">
<div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Danh sách đã cài</h3>
                            </div>	<table border= "1" width ="100%">
<tr align ="center">
<td>Stt</td>
<td>IDcnn</td>
<td>Tên</td>
<td>Nội Dung</td>
<td>Thời Gian</td>
<td>Trạng Thái</td>
<td>Xóa</td>
</tr>
<?php $dt = mysql_query("SELECT * FROM cnn WHERE id = '".$_SESSION['id']."' ");
$i = 0;
while ($dts = mysql_fetch_array($dt)){
echo '
<tr align ="center">
<td>'.++$i.'</td>
<td>'.$dts['idcnn'].'</td>
<td>'.$dts['ten'].'</td>
<td>'.$dts['noidung'].'</td>
<td>'.$dts['thoigian'].'</td>
<td>'.$dts['tatmo'].'</td>
<td><form action="/hdcnn.php" method="POST">
<input type ="hidden" name ="idcnn" value ="'.$dts['idcnn'].'">
<button type="submit" name="xoa" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Xóa
						</span>
				</button>
				</form></td>
</tr>';
}

?></table></div>
<form action="/hdcnn.php" method="POST">
<input type="hidden" name ="id" value="<? echo $_SESSION['id'];?>">
<input type="hidden" name ="token" value="<? echo $_SESSION['access_token'];?>">

<button type="submit" name="update" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Update Token
						</span>
				</button>
				</form>

		
				

<div id="thongbao" style="display: none;"><div class="alert alert-danger">Trạng Thái: <span class="glyphicon glyphicon-refresh gly-animate"></span>  Đang Thực Hiện....
</font></div>

</section></section>
	
   
	<!-- ============================ End ============================ -->
    </div>