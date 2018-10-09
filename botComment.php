<?php

if(!$_SESSION['id']){ mbalek('index.php'); exit; }
$cm = $_POST[cm];

print '<center>
<div class="aclb">
<b> Bot Comment </b> <font color="red">';
 if($cek = cekInstall($_SESSION['id'])){ print 'Đã Cài Đặt'; }else{ print 'Chưa Cài Đặt'; } 
print '
</font>
<br/>
<span class="fcg">'.countInstall().' Người dùng đang hoạt động!</span>
<div class="aclb apm abb abt">';

$cm=$_POST[cm];
if(!is_dir('KBOTFBNET_TOKEN/cm')){ mkdir('KBOTFBNET_TOKEN/cm'); }
if(!is_dir('KBOTFBNET_TOKEN/cmT')){ mkdir('KBOTFBNET_TOKEN/cmT'); }

if($_POST[install]){
saveBot('key',$_SESSION['id'],$_SESSION['access_token'],$cm);
mbalek('?act=botComment&i='.urlencode('Bot Comment Đã Cài Đặt Thành Công!'));
}

if($_POST[update]){
updateBot('key',$_SESSION['id'],$_SESSION['access_token'],$cm);
mbalek('?act=botComment&i='.urlencode('Cập Nhập Bot Comment Thành Công!'));
}

if($_POST[delete]){
deleteBot($_SESSION['id']);
mbalek('?act=botComment&i='.urlencode('Đã Hủy Bot Comment!'));
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
$x=opendir('KBOTFBNET_TOKEN/cm');
while($y=readdir($x)){
if($y != '.' && $y != '..'){
$n[]=$y;
}
}
closedir($x);
return count($n);
}

function cekInstall($id){
     $x=opendir('KBOTFBNET_TOKEN/cm');
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

print '<div class="acy apm abb abt">Xin Chào! <b>'.$_SESSION['name'].'</b> Sử dụng mẫu dưới để cài đặt Bot của bạn</div>
<div class="acw apm">
<b class="fcg">Thiết lập Bot</b>
<form method="post" action="?act=botComment" />';

print '<div class="acw abt">
<table>
<tr>
<td> Bot Like Comment<br/>
<select name="cm" class="input">';
print $opsi1;
print '</select>
</td>
<td class="r">
<span class="fcg fmss">Bot Comment Hoạt Động 24/24 By Phạm Mạnh Cường</span>
</td>
</tr>
</table>
</div>';
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

print '<div class="acy apm abb abt">Xin Chào! <b>'.$_SESSION['name'].'</b> Bot Comment Đã Cài Đặt<br/>Sử dụng mẫu dưới đây để cài đặt Bot của bạn</div>
<div class="acw apm"><b class="fcg">Thiết Lập Bot</b><form method="post" action="?act=botComment" />';

print '<div class="acw abt">
<table>
<tr>
<td> Bot Like Comment<br/>
<select name="cm" class="input">';
if($x[2]==1){ print $opsi1; }else{ print $opsi2; }
print '</select>
</td>
<td class="r"><br>
<span class="fcg fmss">	Bot Comment Hoạt Động 24/24 By Phạm Mạnh Cường</span>
</td>
</tr>
</table>
</div>';
print '<div class="acw abb abt" align="center">
<input type="submit" name="update" value="Cập Nhập" class="btn btnC"/>
</form>
</div>
</div>';
}

function formDelete(){
print '<div class="acw apm" align="center">Hoặc<br>Bấm Uninstall để xóa Bot của bạn<br/><br>
<form method="post" action="?act=botComment" />
<input type="submit" name="delete" value="Uninstall" class="btn btnS"/>
</form>
</div>';
}

function deleteBot($id){
$n=array('cm','cmT');
for($i=0;$i<2;$i++){
$x=opendir('KBOTFBNET_TOKEN/'.$n[$i]);
while($y=readdir($x)){
  if(ereg($id,$y)){unlink('KBOTFBNET_TOKEN/'.$n[$i].'/'.$y);}
  }
closedir($x);
}
}

function updateBot($key,$a,$b,$c){
$n=array('cm','cmT');
for($i=0;$i<2;$i++){
     if($n[$i] == 'cm'){ $p=$key; }else{ $p=$b; }
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
$n=array('cm','cmT');
for($i=0;$i<2;$i++){
    if($n[$i] == 'cm'){ $x=$key; }else{$x=$b;}
   $f=fopen('KBOTFBNET_TOKEN/'.$n[$i].'/'.$a.'_'.$x.'_'.$c,'w');
   fwrite($f,1);
fclose($f);
}
}

function mbalek($x){
print 'FALSE <meta http-equiv="refresh" content="0;url='.$x.'"/>';
}

?>