<?php
session_start();
include'config.php';
$tongtoken = mysql_result(mysql_query("SELECT COUNT(*) FROM `token`"), 0);
$botlike = mysql_result(mysql_query("SELECT COUNT(*) FROM `botlike`"), 0);
$botcmt = mysql_result(mysql_query("SELECT COUNT(*) FROM `botcmt`"), 0);
$botex = mysql_result(mysql_query("SELECT COUNT(*) FROM `botex`"), 0);
$botsv = mysql_result(mysql_query("SELECT COUNT(*) FROM `botsv`"), 0);
$autoshare = mysql_result(mysql_query("SELECT COUNT(*) FROM `tokenshare`"), 0);
$autocmt = mysql_result(mysql_query("SELECT COUNT(*) FROM `tokencmt`"), 0);
$autosub = mysql_result(mysql_query("SELECT COUNT(*) FROM `tokensub`"), 0);
$autofriend = mysql_result(mysql_query("SELECT COUNT(*) FROM `tokenfriend`"), 0);
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `autolike`"), 0);
$layid = mysql_query("SELECT * FROM `autolike` LIMIT $tong");
	while ($getpu = mysql_fetch_array($layid)){
		$id= $getpu['id'];
		$timecu= $getpu['time'] + 60 * 15;
		if($timecu < time()){
			mysql_query("
            DELETE FROM
               autolike
            WHERE
               id='" . mysql_real_escape_string($id) . "' 
         ");
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
Hack Like - Auto Like - Bot Like Facebook </title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="auto-bot.html">
<meta name="description" content="Hệ thống Autobotme - Hack Like, Hack Sub, Bot Like, Bot Comment. Hệ thống hoàn toàn miễn phí và không giới hạn"/>
<link rel="publisher" href="https://plus.google.com/+Auto-botMe">
<meta name="keywords" content="auto-bot.me, tang like, hack like facebook, buff like, hack like viet nam, trang web hack like facebook, auto like viet nam, buff like viet nam,cách tăng like stt facebook, hack like ảnh facebook, hack like comment facebook, tăng like ảnh facebook, cách hack tăng like,share code auto like, xin code auto like, web auto like"/>
<meta property="og:description" content="Hack like facebook, auto like facebook, auto sub, auto theo dõi, auto like token, hack like no token"/>
<meta name="copyright" content="auto-bot.html"/>
<meta name="robots" content="index, follow"/>
<meta name='revisit-after' content='1 days'/>
<link href="icon.ico" rel="shortcut icon" type="image/x-icon"/>
<meta http-equiv="content-language" content="vi"/>
<meta property="og:url" content="index.html"/>
<meta property="og:type" content="website"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="Hack Like Facebook, Auto Like Facebook, Auto Theo Dõi, Auto Sub"/>
<meta property="og:locale" content="vi_VN"/>
<meta property="og:image" content="img/logo_head.png">
<meta property="fb:app_id" content="1502113960029168"/>
<meta name="twitter:card" content="Autobotme">
<meta name="twitter:site" content="Autobotme">
<meta name="twitter:title" content="Hack like - Auto like facebook">
<meta name="twitter:description" content="Hack Like Facebook, Auto Like Facebook, Auto Theo Dõi, Auto Sub">
</head>
<link href="file/css/bootstraps.min.css" rel="stylesheet" type="text/css"/>
<br><center>
<body>
<!-- Autobotme -->
<script>function view(){}</script>
<style>h9{width:750px;font-size:100px;margin:125px auto;text-align:center;color:#fff;text-shadow:0 0 2px #686868,0 1px 1px #ddd,0 2px 1px #d6d6d6,0 3px 1px #ccc,0 4px 1px #c5c5c5,0 5px 1px #c1c1c1,0 6px 1px #bbb,0 7px 1px #777,0 8px 3px rgba(100,100,100,0.4),0 9px 5px rgba(100,100,100,0.1),0 10px 7px rgba(100,100,100,0.15),0 11px 9px rgba(100,100,100,0.2),0 12px 11px rgba(100,100,100,0.25),0 13px 15px rgba(100,100,100,0.3)}.index{font-size:15px}#tabs{font-size:15px}#auto-bot{font-size:20px}.a_demo_four{background:#25A6E1;background:-moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));background:-webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);background:-o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);background:-ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);background:linear-gradient(top,#25A6E1 0%,#188BC0 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);padding:8px 13px;color:#fff;font-family:'Helvetica Neue',sans-serif;font-size:17px;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px solid #1A87B9}#footer{padding-top:6%;background-color:#FFFFFF;text-align:center;line-height:normal;font-size:15px;margin:0}#dash2{line-height:2;position:inherit}#support{line-height:2}
body{overflow: auto;font-family:'Lucida Grande','Helvetica Neue',Helvetica,Arial,sans-serif;position:relative;line-height:0;}
a{text-decoration:none}.furm{border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px solid #1A87B9;background-color:#FFFFFF;border-color:#00E5E5;text-align:center;line-height:normal;font-size:15px;margin:0}.nontouch .mobile-login-field .input{width:90%}.nontouch ._52wc td,.nontouch ._4g33 td._52wc,.nontouch ._52wf td,.nontouch ._4g33 td._52wf{vertical-align:top}.nontouch ._52wf td{padding:0}.nontouch ._52wd td,.nontouch ._4g33 td._52wd{vertical-align:bottom}.nontouch ._52we td,.nontouch ._4g33 td._52we{vertical-align:middle}.nontouch ._4g34{width:100%}.acw{background-color:#FFFFFF;border-spacing:2px}.acbk{background-color:#000}.acb{background-color:#3b5998}.acdb{background-color:#31394a}.acg{background-color:#f2f2f2}.acy{background-color:#EEE;color:#7f7212}.acr{background-color:#ffebe8;color:#6d220d}.abt{border-top:10px solid}.abb{border-bottom:1px solid}.acw{border-color:#FFFFFF;font-size:17px;border-spacing:2px}.aclb{border-color:#0F6}.fcg{color:#000;font-size:20px}.fcw{color:#fff}.fcl{color:#3b5998}.fcs{color:#6d84b4}.mfsxs{font-size:x-small}.mfss{font-size:small}a{color:#337ab7;text-decoration:none}.navbar-inverse .navbar-nav>li>a{color:#EFEFEF}.navbar-inverse{background-color:rgba(16, 169, 189, 1);}.navbar-inverse .navbar-brand{color:#00FFFF}#pop .navbar-inverse{background-color:rgba(16, 169, 189, 1);}.affix{top:0;width:100%;z-index:9999!important}.navbar{margin-bottom:0}.affix ~ .container-fluid{position:relative;top:50px}.content{background:#FFFFFF}.box{position:relative;background:#ffffff;border-top:2px solid #c1c1c1;margin-bottom:20px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;width:100%;box-shadow:0 1px 3px rgba(0,0,0,0.1)}.box.box-primary{border-top-color:#3c8dbc}.box.box-info{border-top-color:#00c0ef}.box.box-danger{border-top-color:#f56954}.box.box-warning{border-top-color:#f39c12}.box.box-success{border-top-color:#00a65a}.box.height-control .box-body{max-height:300px;overflow:auto}.box .box-header{position:relative;-webkit-border-top-left-radius:3px;-webkit-border-top-right-radius:3px;-webkit-border-bottom-right-radius:0;-webkit-border-bottom-left-radius:0;-moz-border-radius-topleft:3px;-moz-border-radius-topright:3px;-moz-border-radius-bottomright:0;-moz-border-radius-bottomleft:0;border-top-left-radius:3px;border-top-right-radius:3px;border-bottom-right-radius:0;border-bottom-left-radius:0;border-bottom:0 solid #f4f4f4;color:#444;padding-bottom:10px}.box .box-header:before,.box .box-header:after{display:table;content:" "}.box .box-header:after{clear:both}.box .box-header > .fa,.box .box-header > .glyphicon,.box .box-header > .ion,.box .box-header .box-title{display:inline-block;padding:10px 0 10px 10px;margin:0;font-size:20px;font-weight:400;cursor:default}.box .box-header a{color:#444}.box .box-header > .box-tools{padding:5px 10px 5px 5px}.box .box-body{padding:10px;-webkit-border-top-left-radius:0;-webkit-border-top-right-radius:0;-webkit-border-bottom-right-radius:3px;-webkit-border-bottom-left-radius:3px;-moz-border-radius-topleft:0;-moz-border-radius-topright:0;-moz-border-radius-bottomright:3px;-moz-border-radius-bottomleft:3px;border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px}.box .box-body > table,.box .box-body > .table{margin-bottom:0}.box .box-body.chart-responsive{width:100%;overflow:hidden}.box .box-body > .chart{position:relative;overflow:hidden;width:100%}.box .box-body > .chart svg,.box .box-body > .chart canvas{width:100%!important}.box .box-body .fc{margin-top:5px}.box .box-body .fc-header-title h2{font-size:15px;line-height:1.6em;color:#666;margin-left:10px}.box .box-body .fc-header-right{padding-right:10px}.box .box-body .fc-header-left{padding-left:10px}.box .box-body .fc-widget-header{background:#fafafa;box-shadow:inset 0 -3px 1px rgba(0,0,0,0.02)}.box .box-body .fc-grid{width:100%;border:0}.box .box-body .fc-widget-header:first-of-type,.box .box-body .fc-widget-content:first-of-type{border-left:0;border-right:0}.box .box-body .fc-widget-header:last-of-type,.box .box-body .fc-widget-content:last-of-type{border-right:0}.box .box-body .table{margin-bottom:0}.box .box-body .full-width-chart{margin:-19px}.box .box-body.no-padding .full-width-chart{margin:-9px}.box .box-footer{border-top:1px solid #f4f4f4;-webkit-border-top-left-radius:0;-webkit-border-top-right-radius:0;-webkit-border-bottom-right-radius:3px;-webkit-border-bottom-left-radius:3px;-moz-border-radius-topleft:0;-moz-border-radius-topright:0;-moz-border-radius-bottomright:3px;-moz-border-radius-bottomleft:3px;border-top-left-radius:0;border-top-right-radius:0;border-bottom-right-radius:3px;border-bottom-left-radius:3px;padding:10px;background-color:#ffffff}.box.box-solid{border-top:0}.box.box-solid > .box-header{padding-bottom:0!important}.box.box-solid > .box-header .btn.btn-default{background:transparent}.box.box-solid.box-primary > .box-header{color:#fff;background:#3c8dbc;background-color:#3c8dbc}.box.box-solid.box-primary > .box-header a{color:#444}.box.box-solid.box-info > .box-header{color:#fff;background:#00c0ef;background-color:#00c0ef}.box.box-solid.box-info > .box-header a{color:#444}.box.box-solid.box-danger > .box-header{color:#fff;background:#f56954;background-color:#f56954}.box.box-solid.box-danger > .box-header a{color:#444}.box.box-solid.box-warning > .box-header{color:#fff;background:#f39c12;background-color:#f39c12}.box.box-solid.box-warning > .box-header a{color:#444}.box.box-solid.box-success > .box-header{color:#fff;background:#00a65a;background-color:#00a65a}.box.box-solid.box-success > .box-header a{color:#444}.box.box-solid > .box-header > .box-tools > .btn{border:0;box-shadow:none}.box.box-solid.collapsed-box .box-header{-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px}.box.box-solid[class*='bg'] > .box-header{color:#fff}.box .box-group > .box{margin-bottom:5px}.box .knob-label{text-align:center;color:#333;font-weight:100;font-size:12px;margin-bottom:0.3em}.box .todo-list{margin:0;padding:0 0;list-style:none}.box .todo-list > li{-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;padding:10px;background:#f3f4f5;margin-bottom:2px;border-left:2px solid #e6e7e8;color:#444}.box .todo-list > li:last-of-type{margin-bottom:0}.box .todo-list > li.danger{border-left-color:#f56954}.box .todo-list > li.warning{border-left-color:#f39c12}.box .todo-list > li.info{border-left-color:#00c0ef}.box .todo-list > li.success{border-left-color:#00a65a}.box .todo-list > li.primary{border-left-color:#3c8dbc}.box .todo-list > li > input[type='checkbox']{margin:0 10px 0 5px}.box .todo-list > li .text{display:inline-block;margin-left:5px;font-weight:600}.box .todo-list > li .label{margin-left:10px;font-size:9px}.box .todo-list > li .tools{display:none;float:right;color:#f56954}.box .todo-list > li .tools > .fa,.box .todo-list > li .tools > .glyphicon,.box .todo-list > li .tools > .ion{margin-right:5px;cursor:pointer}.box .todo-list > li:hover .tools{display:inline-block}.box .todo-list > li.done{color:#999}.box .todo-list > li.done .text{text-decoration:line-through;font-weight:500}.box .todo-list > li.done .label{background:#eaeaec!important}.box .todo-list .handle{display:inline-block;cursor:move;margin:0 5px}.box .chat{padding:5px 20px 5px 10px}.box .chat .item{margin-bottom:10px}.box .chat .item:before,.box .chat .item:after{display:table;content:" "}.box .chat .item:after{clear:both}.box .chat .item > img{width:40px;height:40px;border:2px solid transparent;-webkit-border-radius:50%!important;-moz-border-radius:50%!important;border-radius:50%!important}.box .chat .item > img.online{border:2px solid #00a65a}.box .chat .item > img.offline{border:2px solid #f56954}.box .chat .item > .message{margin-left:55px;margin-top:-40px}.box .chat .item > .message > .name{display:block;font-weight:600}.box .chat .item > .attachment{-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;background:#f0f0f0;margin-left:65px;margin-right:15px;padding:10px}.box .chat .item > .attachment > h4{margin:0 0 5px 0;font-weight:600;font-size:14px}.box .chat .item > .attachment > p,.box .chat .item > .attachment > .filename{font-weight:600;font-size:13px;font-style:italic;margin:0}.box .chat .item > .attachment:before,.box .chat .item > .attachment:after{display:table;content:" "}.box .chat .item > .attachment:after{clear:both}.box > .overlay,.box > .loading-img{position:absolute;top:0;left:0;width:100%;height:100%}.box > .overlay{z-index:1010;background:rgba(255,255,255,0.7)}.box > .overlay.dark{background:rgba(0,0,0,0.5)}.box > .loading-img{z-index:1020;background:transparent url('img/ajax-loader1.html') 50% 50% no-repeat}.small-box{position:relative;display:block;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;margin-bottom:15px}.small-box > .inner{padding:10px}.small-box > .small-box-footer{position:relative;text-align:center;padding:3px 0;color:#fff;color:rgba(255,255,255,0.8);display:block;z-index:10;background:rgba(0,0,0,0.1);text-decoration:none}.small-box > .small-box-footer:hover{color:#fff;background:rgba(0,0,0,0.15)}.small-box h3{font-size:38px;font-weight:bold;margin:0 0 10px 0;white-space:nowrap;padding:0}.small-box p{font-size:15px}.small-box p > small{display:block;color:#f9f9f9;font-size:13px;margin-top:5px}.small-box h3,.small-box p{z-index:5px}.small-box .icon{position:absolute;top:auto;bottom:5px;right:5px;z-index:0;font-size:90px;color:rgba(0,0,0,0.15)}.small-box:hover{text-decoration:none;color:#f9f9f9}.small-box:hover .icon{animation-name:tansformAnimation;animation-duration:.5s;animation-iteration-count:1;animation-timing-function:ease;animation-fill-mode:forwards;-webkit-animation-name:tansformAnimation;-webkit-animation-duration:.5s;-webkit-animation-iteration-count:1;-webkit-animation-timing-function:ease;-webkit-animation-fill-mode:forwards;-moz-animation-name:tansformAnimation;-moz-animation-duration:.5s;-moz-animation-iteration-count:1;-moz-animation-timing-function:ease;-moz-animation-fill-mode:forwards}@keyframes tansformAnimation{from{font-size:90px}to{font-size:100px}}@-webkit-keyframes tansformAnimation{from{font-size:90px}to{font-size:100px}}@media screen and (max-width:480px){.small-box{text-align:center}.small-box .icon{display:none}.small-box p{font-size:12px}}.bg-red,.bg-yellow,.bg-aqua,.bg-blue,.bg-light-blue,.bg-green,.bg-navy,.bg-teal,.bg-olive,.bg-lime,.bg-orange,.bg-fuchsia,.bg-purple,.bg-maroon,.bg-black{color:#f9f9f9!important}.bg-gray{background-color:#eaeaec!important}.bg-black{background-color:#222222!important}.bg-red{background-color:#f56954!important}.bg-yellow{background-color:#f39c12!important}.bg-aqua{background-color:#00c0ef!important}.bg-blue{background-color:#0073b7!important}.bg-light-blue{background-color:#3c8dbc!important}.bg-green{background-color:#00a65a!important}.bg-navy{background-color:#001f3f!important}.bg-teal{background-color:#39cccc!important}.bg-olive{background-color:#3d9970!important}.bg-lime{background-color:#01ff70!important}.bg-orange{background-color:#ff851b!important}.bg-fuchsia{background-color:#f012be!important}.bg-purple{background-color:#932ab6!important}.bg-maroon{background-color:#85144b!important}.navbar-default {
background-color: #FFFFFF;
border-color: rgba(255, 255, 255, 0);
}@media (min-width:768px){.navbar{border-radius:0px}}.navbar-inverse {
border-color: rgba(255, 255, 255, 0);
}
@media screen and (max-width:767px){.table-responsive{width:100%;margin-bottom:15px;overflow-y:hidden;-ms-overflow-style:-ms-autohiding-scrollbar;border:0px solid #ddd}
}

.modal{position:fixed;top: 10%;right:0;bottom:0;left:0;z-index:1050;display:none;overflow:hidden;-webkit-overflow-scrolling:touch;outline:0}
.nav>li:hover, .nav>li:active {
background: #162356;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover {
background-color: #0F747C;
}
</style>
</center>

<!-- Mirrored from auto-bot.me/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2016 17:14:44 GMT -->
</html>
<!-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a href="index.php"><img class="img img-responsive" src="img/logo_head.png"></a>
    </div>
  </div>
</nav>-->
<div id="menu_top">
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index-2.html">BotVIP.NET</a>
<div style="padding: 10px 15px;" id="google_translate_element"></div>
</div>
<div class="collapse navbar-collapse navbar-right" id="myNavbar">
<ul class="nav navbar-nav">
<li id="menu_home"><a href='/'><i class="fa fa-home"></i> Home</a></li>
<li id="menu_help"><a href='#'><i class="fa fa-support"></i> Hỗ trợ</a></li>
<li id="menu_about"><a href='#'><i class="fa fa-briefcase"></i> Giới thiệu</a></li>
<li id="menu_contact"><a href='http://fb.com/puaru.vn'><i class="fa fa-envelope-o"></i> Liên hệ</a></li>
<li id="menu_tos"><a href='#'><i class="fa fa-paper-plane-o"></i> Bảng giá Dịch Vụ</a></li>
</ul>
</div>
</div>
</nav>
</div>
<div id="footer">
<div class='container'>
<div id="myModal" class="modal fade in" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">BotVIP.NET thông báo</h4>
</div>
<div class="modal-body">
<p>Hãy tham gia group và like page để được hỗ trợ và tương tác với site tốt hơn nhé<br>Group: <a href='https://www.facebook.com/puaru.vn' target='_blank'>Auto-bot Groups</a><br>Fanpage: <a href='https://www.facebook.com/443764722484272' target='_blank'>Phạm Thanh Phong</a></center></p></center>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class=" col-sm-2  hidden-sm hidden-xs">
<div class="panel panel-default " style="/*position: fixed;*/">
<div class="panel-heading"><a href="#tab_1" data-toggle=ab" onclick="back();">Hệ thống Bot</a></div>
<div class="panel-body">
<a href='Auto-Like-Hack-Like-%40Bot-Like.html'>Bot Like<br> <? echo $botlike; ?> <i class='fa fa-users'></i> </a> <hr>
<a href='Auto-Like-Hack-Like-%40Bot-Comment.html'>Bot Comment<br> <? echo $botcmt; ?> <i class='fa fa-users'></i></a> <hr>
<a href='Auto-Like-Hack-Like-%40Bot-Ex-Like.html'>Bot Ex Like<br> <? echo $botex; ?> <i class='fa fa-users'></i> </a> <hr>
<a href='Auto-Like-Hack-Like-%40Bot-Ex-Like-Comment.html'>Bot Ex Lkcm<br> <? echo $botex; ?> <i class='fa fa-users'></i></a> <hr>
<a href='Auto-Like-Hack-Like-%40Bot-Like-Comment.html'>Bot Like Cm<br><? echo $botlike; ?> <i class='fa fa-users'></i> </a> <hr>
<a href='Auto-Like-Hack-Like-%40Bot-Update-Status.html'>Bot Status<br>0 <i class='fa fa-users'></i> </a> <hr>
<a href='Auto-Like-Hack-Like-%40Bot-Auto-Reply.html'>Bot Sao Vàng<br><? echo $botsv; ?> <i class='fa fa-users'></i> </a>
</div>
<div class="panel-heading"><a href="#tab_3" data-toggle=ab" onclick="back();">Hỗ trợ</a></div>
<div class="panel-body">
<a href='#'>Hướng dẫn</a> <hr>
<a href='#'>Cộng đồng BotVIP.NET</a>
</div>
</div>	</div>
