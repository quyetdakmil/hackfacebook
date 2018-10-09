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
	$("#vip").hide();
	$("#thongbao").show();
	}
</script>
<div class="col-sm-12 blog-main">

<div id="page-wrapper">
<div class="panel panel-primary">
<div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Bot Ex Like </h3>
                            </div>

	<div id="vip" class="panel-body">
		<form action="/exlike.php" method="post">	
<div class="tab-content">

  <label>        Tên Facebook</label>

<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span><textarea rows="1" type="text" name="name" class="form-control" value="" placeholder="Nhập Tên Facebook Vào Đây...!!!" autofocus="" required=""><? echo $_SESSION['name'];?></textarea>	



	</div>
	

                                            <label>        ID Facebook</label>



<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span><textarea rows="1" type="text" name="id" class="form-control" value="" placeholder="Nhập ID Facebook Vào Đây...!!!" autofocus="" required=""><? echo $_SESSION['id'];?></textarea>
			
</div>

<br/>


<span class="input-group-btn">
	<center>	<button type="submit" name="submit" onClick="done()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Gửi Yêu Cầu
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
<div class="alert alert-info" role="alert">
						<button type="button" class="close" data-dismiss="alert" 

aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<span class="glyphicon glyphicon-bullhorn"></span> <b>Chú Ý:</b><br/>
						<ul>
							<li>Số Lượng Like Nhận Được Khi Cài Bot Ex Tỉ Lệ Thuận Với Số Người Dùng! => Pr Web Đi ^-^ </li>
							<li>Góp Token Để Nhận Được Nhiều Like Hơn (200-250đ = 1 Token).</li>

						</ul>
					</div>
</div>
</div>