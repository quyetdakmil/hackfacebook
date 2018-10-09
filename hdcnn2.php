<?php
include 'config.php';
function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}

if(isset($_POST['idcnn']))
{
mysql_query("DELETE FROM cnn2 WHERE idcnn = '".$_POST['idcnn']."' AND thoigian ='".$_POST['tg']."' ");
mbalek('/index.php?act=botcnn2&i='.urlencode('Xóa thành công'));
}
if(isset($_POST['update'])){
mysql_query("UPDATE `cnn2` 

SET `token` ='".$_POST['token']."'

WHERE `id` = '".$_POST['id']."' ");
mbalek('/index.php?act=botcnn2&i='.urlencode('Cập nhật thành công !'));
}

?>