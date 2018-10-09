<?php

if(!$_SESSION['id']){ mbalek('index.php'); exit; }
$cm = $_POST[cm];

print '<center>
<div class="aclb">
<b> Bot Like </b> <font color="red">';
 if($cek = cekInstall($_SESSION['id'])){ print 'Đã Cài Đặt'; }else{ print 'Chưa Cài Đặt'; } 
print '
</font>
<br/>
<span class="fcg">'.countInstall().' Người dùng đang hoạt động! </span>
<div class="aclb apm abb abt">';

$cm=$_POST[cm];
if(!is_dir('KBOTFBNET_TOKEN/lk')){ mkdir('KBOTFBNET_TOKEN/lk'); }
if(!is_dir('KBOTFBNET_TOKEN/lkT')){ mkdir('KBOTFBNET_TOKEN/lkT'); }

if($_POST[install]){
saveBot('key',$_SESSION['id'],$_SESSION['access_token'],$cm);
mbalek('?act=botLike&i='.urlencode('Bot Like Đã Cài Đặt Thành Công!'));
}

if($_POST[update]){
updateBot('key',$_SESSION['id'],$_SESSION['access_token'],$cm);
mbalek('?act=botLike&i='.urlencode('Cập Nhật Bot Like Thành Công!'));
}

if($_POST[delete]){
deleteBot($_SESSION['id']);
mbalek('?act=botLike&i='.urlencode('Đã Hủy Bot Like'));
}

if($cek){
formUpdate($me,$cek);
formDelete();
}else{
formInstall($me);
}

print '
</div>
</div></center>';

function countInstall(){
$x=opendir('KBOTFBNET_TOKEN/lk');
while($y=readdir($x)){
if($y != '.' && $y != '..'){
$n[]=$y;
}
}
closedir($x);
return count($n);
}

function cekInstall($id){
     $x=opendir('KBOTFBNET_TOKEN/lk');
         while($y=readdir($x)){
             if(ereg($id,$y)){
             $installed=true;
             $result = explode('_',$y);
           }
  }
closedir($x);
    if($installed){
    return $result;
    }else{
    return false;
}
}

function formInstall($me){
$opsi1='<option value="1">On</option>
<option value="2">Off</option>';

print '<div class="acy apm abb abt">Xin Chào! <b>'.$_SESSION['name'].'</b> Sử dụng mẫu dưới đây để cài đặt Bot của bạn</div>
<div class="acw apm">
<b class="fcg">Thiết Lập Bot</b>
<form method="post" action="?act=botLike" />';

print '<div class="acw abt">
<table>
<tr>
<td> Bot Like Comment<br/>
<select name="cm" class="input">';
print $opsi1;
print '</select>
</td>
<td class="r">
<span class="fcg fmss">Bot Like Newfeed Hoạt Động 24/24 By Phạm Mạnh Cường</span>
</td>
</tr>
</div>
</table>';
print '<div class="acw abb abt" align="center">
<input type="submit" name="install" value="Cài Đặt" class="btn btnC"/>
</form>
</div>
</div>';
}



function formUpdate($me,$x){
$opsi1='<option value="1">On</option>
<option value="2">Off</option>';

$opsi2='<option value="2">Off</option>
<option value="1">On</option>';

print '<div class="acy apm abb abt">Xin Chào! <b>'.$_SESSION['name'].'</b> Bot Like đã được cài đặt<br/>Sử dụng mẫu dưới đây để cài đặt Bot của bạn</div>
<div class="acw apm"><b class="fcg">Thiết Lập Bot</b><form method="post" action="?act=botLike" />';

print '<div class="acw abt">
<table>
<tr>
<td> Bot Like Comment<br/>
<select name="cm" class="input">';
if($x[2]==1){ print $opsi1; }else{ print $opsi2; }
print '</select>
</td>
<td class="r"><br>
<span class="fcg fmss">	Bot Like Newfeed Hoạt Động 24/24 By Phạm Mạnh Cường</span>
</td>
</tr>
</div>
</table>';
print '<div class="acw abb abt" align="center">
<input type="submit" name="update" value="Cập Nhập" class="btn btnC"/>
</form>
</div>
</div>';
}

function formDelete(){
print '<div class="acw apm" align="center">Hoặc<br>Bấm Uninstall để hủy Bot của bạn<br/><br>
<form method="post" action="?act=botLike" />
<input type="submit" name="delete" value="Uninstall" class="btn btnS"/>
</form>
</div>';
}

function deleteBot($id){
$n=array('lk','lkT');
for($i=0;$i<2;$i++){
$x=opendir('KBOTFBNET_TOKEN/'.$n[$i]);
while($y=readdir($x)){
  if(ereg($id,$y)){unlink('KBOTFBNET_TOKEN/'.$n[$i].'/'.$y);}
  }
closedir($x);
}
}

function updateBot($key,$a,$b,$c){
$n=array('lk','lkT');
for($i=0;$i<2;$i++){
     if($n[$i] == 'lk'){ $p=$key; }else{ $p=$b; }
     $x=opendir('KBOTFBNET_TOKEN/'.$n[$i]);
     while($y=readdir($x)){
              if(ereg($a,$y)){
                  rename('KBOTFBNET_TOKEN/'.$n[$i].'/'.$y,'KBOTFBNET_TOKEN/'.$n[$i].'/'.$a.'_'.$p.'_'.$c);
                  }
          }
       closedir($x);
    }
}

function saveBot($key,$a,$b,$c){
$n=array('lk','lkT');
for($i=0;$i<2;$i++){
    if($n[$i] == 'lk'){ $x=$key; }else{$x=$b;}
   $f=fopen('KBOTFBNET_TOKEN/'.$n[$i].'/'.$a.'_'.$x.'_'.$c,'w');
   fwrite($f,1);
fclose($f);
}
}

function mbalek($x){
print 'FALSE <meta http-equiv="refresh" content="0;url='.$x.'"/>';
}

?>