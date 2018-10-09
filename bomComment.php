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
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Auto Flood Comment</h3>
                            </div>

	<div id="bodyupcmt" class="panel-body">
		<form action="/upautofloodcomment.php" method="post">	
<div class="tab-content">

<input type="hidden" name="access_token" class="form-control" autofocus="" value="<? echo $_SESSION['access_token'];?>"required="">	

  <label>        Nhập ID Bài Viết Cần Flood Comment</label>

<input type="text" name="idpost" class="form-control" value="" placeholder="Nhập ID Bài Post" autofocus="" required="">	



	</div>
	

                                            <label>        Nhập Nội Dung Bình Luận</label>



<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-comment"></span></span><textarea rows="5" type="text" name="noidung" class="form-control" value="Hay" placeholder="Nhập Nội Dung Vào Đây!" autofocus="" required=""></textarea>
			
</div>
  <label>        Nhập Số Lượng Comment Cần Flood</label>

<input type="text" name="soluong" class="form-control" value="" placeholder="Nhập Số Lượng Cmt muốn Bão" autofocus="" required="">	
<br/>
<span class="input-group-btn">
	<center>	<button type="submit" name="submit" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Gửi yêu cầu
						</span>
				</button>			</center>			</span>
		</div>			

</form>
		</div>			

<div id="thongbao" style="display: none;"><div class="alert alert-danger">Trạng Thái: <span class="glyphicon glyphicon-refresh gly-animate"></span>  Đang Gửi Yêu Cầu...!
</font></div>

</section></section>
	
   
	<!-- ============================ End ============================ -->
    </div>
   </div>