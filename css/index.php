<?php
include('config.php');
include 'head.php';
include 'demtoken.php';

if(isset($_GET['i'])){
echo '
<script>
alert("' . $_GET['i'] . '") 
</script>';
}
if($act=='reset') { session_destroy(); }
if(isset($_SESSION['id'])) {
include 'menu.php';
}else{
form();
}


function form(){
$js = '';
$babi = mysql_query ("SELECT name, COUNT(name) FROM bot");
$rober = mysql_fetch_array($babi);
$rec=$rober['COUNT(name)'];
print '
    <!-- Page content of course! -->
   <div class="content-wrapper">
			<div class="container-fluid">
			
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Auto</div>
													<div class="stat-panel-title text-uppercase">Auto Like - Auto Follow - Auto Comment - Auto Share</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Bot</div>
													<div class="stat-panel-title text-uppercase">Bot Like - Bot Comment - Bot Ex Like - Bot Tương Tác</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Boom</div>
													<div class="stat-panel-title text-uppercase">Boom Like - Boom Comment - Bão Like - Bão Comment</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">Vip</div>
													<div class="stat-panel-title text-uppercase">Mua VIP - Bảng giá VIP - Quản lý VIP - Like max VIP</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="panel panel-default">
		<div class="panel-body">
			<form action="login.php" method="post">
	<div class="form-group text-center">

		<div class="btn-group">
			<a target="_blank" href="/gettoken/bb.php" class="btn btn-danger btn-lg fb-popup"><i class="fa fa-facebook"></i>
				Lấy Token BB</a>
		</div>

				<div class="btn-group">
			<a target="_blank" href="/gettoken/htc.php" class="btn btn-success btn-lg fb-popup"><i class="fa fa-facebook"></i>
				Lấy Token HTC</a>
		</div>
		
		
		<div class="btn-group">
			<a target="_blank" href="/gettoken/ios.php" class="btn btn-primary btn-lg fb-popup"><i class="fa fa-facebook"></i>
				Lấy Token IOS</a>
		</div>

						
<!-- Login Access Token -->						
<!-- /Col-12 -->
		<form class="input-group" action="login.php" method="POST">
			<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
			<input type="text" class="form-control" name="access_token" class="fa fa-facebook" placeholder="ตัวอย่าง: https://www.facebook.com/connect/login_success.html#access_token=CAAAA...." data-bv-notempty="">
					      <span class="input-group-btn">
					       <button type="submit" name="submit" id="submit_btn" onclick="autoLike()" class="btn btn-success">
									<span id="btn-click">
										<span class="glyphicon glyphicon-send"></span> Đăng Nhập
									</span>
									<span id="btn-load" style="display:none;">
										<i class="fa fa-facebook"></i> Loading....
									</span>


									</button>
					      </span>					  
		</div>
<script type="text/javascript">
function autoLike()
	{
	$("#btn-click").hide();
	$("#btn-load").show();
	}
</script>	
	<div class="panel-footer"><center>
		<button class="btn btn-info">BƯỚC 1</button>
			<a target="_blank" href="gettoken/htc.php" class="btn btn-success">Click vào đây để lấy quyền Token.!</a>
			<a target="_blank" href="#" class="btn btn-info">Watch Video</a>
			<br><br>
			<button class="btn btn-info">BƯỚC 2</button>
			<a target="_blank" href="view-source:http://botviet.net/gettoken/htc.php" class="btn btn-success">Click vào đây để lấy Access Token!</a>
			<a target="_blank" href="#" class="btn btn-info">Watch Video</a><br><br>
		<b>*</b><i>Khi click đăng nhập, đồng nghĩa với việc bạn đã đồng ý với Chính sách về <a href="privacy-botviet.php"><span class="label label-danger"><b>quyền riêng tư</b></a></span> và <a href="terms-botviet.php"><span class="label label-danger"><b>Điều khoản sử dụng</b></a></span> của chúng tôi.</i>
<label>
Bước 1:
<a href="gettoken/ios.php" target="_blank">
<b>Click cài đặt Apps</b>
</a>
<br>Bước 2: <a href="gettoken/ios.php" target="_blank"><b>Click để nhận Access Token của bạn.!</b></a>
<br>Bước 3: Copy  (CTRL + C) mã "Access Token" trên thanh địa chỉ.<i class="fa fa-hand-o-left"></i><br>
</label></center>
	</div></div>
</form>	</div>
	</div>
	<?php
	include"chat2.php";
	?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Bot-Ex.Org V0.1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9457033891980444"
     data-ad-slot="9367150613"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		</center>
		</div>
</div>	
</div>
</div>


<br>

				<!-- /Danh sách -->
<div class="row">
	<div class="col-md-4">
		<div class="list-group list-log">
			<div class="list-group-item">
				<b>Like Gần Đây</b>
			</div>
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									   target="_blank">Đang tìm kiếm</a>
								</span>
								<span>
									<i class="fa fa-thumbs-up"></i>
									Đang tìm kiếm<b> thành viên</b>
								</span>
							</div>
						</div>
					</div>
				</div>
						
						
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									   target="_blank">Đang tìm kiếm</a>
								</span>
								<span>
									<i class="fa fa-thumbs-up"></i>
									Đang tìm kiếm<b> thành viên</b>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									   target="_blank">Đang tìm kiếm</a>
								</span>
								<span>
									<i class="fa fa-thumbs-up"></i>
									Đang tìm kiếm<b> thành viên</b>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									   target="_blank">Đang tìm kiếm</a>
								</span>
								<span>
									<i class="fa fa-thumbs-up"></i>
									Đang tìm kiếm<b> thành viên</b>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									   target="_blank">Đang tìm kiếm</a>
								</span>
								<span>
									<i class="fa fa-thumbs-up"></i>
									Đang tìm kiếm<b> thành viên</b>
								</span>
							</div>
						</div>
					</div>
				</div>
				
				
					</div>
	</div>

	  <div class="col-md-4">
		<div class="list-group list-log">
			<div class="list-group-item">
				<b>Thành Viên V.I.P</b>
			</div>
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									   target="_blank">Phạm Mạnh Cường</a>
								</span>
<img src="img/admin1.gif">
<span class="label label-danger">VIP Gold</span>            
							</div>
						</div>
					</div>
				</div>
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/1682512385342552" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/1682512385342552/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/1682512385342552"
									   target="_blank">Đang Cập Nhập</a>
								</span>
<img src="img/admin2.gif">
<span class="label label-success">VIP Sliver</span> 
							</div>
						</div>
					</div>
				</div>
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
	        	   target="_blank">Đang Cập Nhập</a>
								</span>
<img src="img/admin3.gif">
<span class="label label-info">VIP Bronze</span> 
							</div>
						</div>
					</div>
				</div>
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/1682512385342552" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/1682512385342552/picture?type=square"></a>

							<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/1682512385342552"
									  	        	   target="_blank">Đang Cập Nhập</a>
								</span>
<img src="img/admin4.gif">
<span class="label label-info">VIP Bronze</span> 
							</div>
						</div>
					</div>
				</div>
						
							<div class="list-group-item">
					<div class="row-fluid">
						<div class="media">
							<a class="pull-left" href="http://www.facebook.com/100010550383457" target="_blank">
								<img class="media-object"
								     src="http://graph.facebook.com/100010550383457/picture?type=square"></a>

	<div class="media-body">
								<span class="media-heading clearfix">
									<a href="http://www.facebook.com/100010550383457"
									  	        	   target="_blank">Đang Cập Nhập</a>
								</span>
<img src="img/admin5.gif">
<span class="label label-info">VIP Bronze</span> 
							</div>
						</div>
					</div>
				</div>
					</div>
	</div>
</div>
</div>
<!-- Thông kê thành viên đang hoạt động -->

';
 if($_GET['act']=='getInfo'){
echo'
</div>

';
}else{
 print'
</div>


'; 
}
print '</div>
';
}

include 'footer.php';

function getData($dir,$params=null){
    $param = array(
    'access_token' => getToken(),
    );
   if($params){ $arrayParams=array_merge($params,$param); }else{ $arrayParams =$param; }
   $url = getUrl('graph',$dir,$arrayParams);
   $result = json_decode(auto($url),true);
   if($result[data]){
      return $result[data];
      }else{
      return $result;
   }
}
function getUrl($domain,$dir,$uri=null){
    if($uri){
         foreach($uri as $key =>$value){
             $parsing[] = $key . '=' . $value;
                }
             $parse = '?' . implode('&',$parsing);
                }
     return 'https://' . $domain . '.facebook.com/' . $dir . $parse;
       }

function getToken(){
        return $_SESSION['access_token'];
        }

function auto($url){
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}
?>