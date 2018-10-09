<?php
session_start(); 
if($_SESSION['id'])
{
include'head.php';
include'bangnguoidung.php';
?>
<div class="panel panel-danger">
<div class="panel-heading">Bom Like</div>
<div class="panel-body">
<b><div class="well well-sm"><a href='index.php' size='+1'> Home </a><i class='fa fa-angle-double-left'></i><a href='index.php?act=Boom-Like' size='+1'> Boom Like </a></div></b>
<b> BOOM Like </b>
<div class="panel panel-danger">
<div class="panel-heading">Xin chào <b><? echo $_SESSION[name]; ?></b></div>
<div class="panel-body">Boom Like là hệ thống bão Like theo id, wall friend. Boom sẽ tự động Like tất cả status của friend :D</div>
</div>
</div><br><div class="acw abt">
<center><span class=" label label-danger">Hệ thống Bão Like Wall</span></center><center>
<br>Số lần Like( Max: 200 lần ): <br>
<form method="post" action=""> <input id="boom_like" class="form-control input-sm" onchange="document.getElementById('boom_like_set').value=document.getElementById('boom_like').value" min="0" max="200" type="range" value=50> <br><input onchange="document.getElementById('boom_like').value=document.getElementById('boom_like_set').value" id="boom_like_set" type="number" name="number" value="50"><br>
<br>ID Wall<br><input name="id" id="boom"> <br><br> <input class="btn btn-danger" type="submit"  value="Boom!" class="btn btn-3"/> <br> <div id="like"></div> </form><br>
</div></div></div>
<?php } include'foot.php'; 
if($_POST['id'] && $_SESSION[id])
{
$stat=json_decode(auto('https://graph.facebook.com/'.$_POST[id].'/feed?access_token='.$_SESSION[token].'&limit='.$_POST[number].''),true);
for($i=1;$i<=count($stat[data]);$i++)
{
set_time_limit(0);
auto('https://graph.facebook.com/'.$stat[data][$i-1][id].'/likes?access_token='.$_SESSION[token].'&method=post');
}
}	
?>