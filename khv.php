<?php
include 'config.php';
echo'<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
   function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}
$id = $_POST['id'];
$idv = $_POST['idv'];
$thoigian = $_POST['ngayv']*86400;
$timevip = $thoigian+time();
if($_POST['ngayv'] >90)
{
mbalek('/index.php?act=khVIP&i='.urlencode('Vượt quá số ngày quy định'));
exit;
}

$admin = mysql_fetch_array(mysql_query("SELECT * FROM token WHERE `user_id` = '".$id."' "));

$check = mysql_fetch_array(mysql_query("SELECT * FROM token WHERE `user_id` = '".$idv."' "));

if($admin['admin'] != 0)
{
if($check['domain_login'] != $_SERVER['HTTP_HOST'])
{
mbalek('/index.php?act=khVIP&i='.urlencode('id ko thuộc quản lý của bạn'));
exit;
}
if(isset($_POST['xoa']))
{
mysql_query(

         "UPDATE 

            token

         SET

            
            `cai_VIP` = '0' ,
            
            `het_VIP` = '0'

         WHERE

            `user_id` = '" .$idv. "'

      ");
$hanhdong = 'Hủy VIP id: '.$idv.'. trên domain: '.$_SERVER['HTTP_HOST'];
      include 'luulog.php';
mbalek('/index.php?act=khVIP&i='.urlencode('Hủy VIP Thành Công !!!'));
exit;
}

if($admin['admin'] == 1)
{
mysql_query(

         "UPDATE 

            token

         SET

            
            `cai_VIP` = '".time()."' ,
            `VIP` = '1' ,
            `kh_VIP` = '".$_SESSION['name']."' ,
            `het_VIP` = '".$timevip."'

         WHERE

            `user_id` = '" .$idv. "'

      ");
      $hanhdong = 'Kích hoạt VIP id: '.$idv.' đến ngày: '.date('\N\g\à\y d - \T\h\á\n\g m', $timevip);
      include 'luulog.php';
mbalek('/index.php?act=khVIP&i='.urlencode('Kích Hoạt VIP Thành Công !!!'));
      }
      else
      {
mysql_query(

         "UPDATE 

            token

         SET

            
            `cai_VIP` = '".time()."' ,
            `VIP` = '1' ,
            `kh_VIP` = '".$_SESSION['name']."' ,
            `het_VIP` = '".$timevip."'

         WHERE

            `user_id` = '" .$idv. "' AND `domain_login` = '".$_SERVER['HTTP_HOST']."'

      ");
      $hanhdong = 'Kích hoạt VIP id: '.$idv.' đến ngày: '.date('\N\g\à\y d - \T\h\á\n\g m', $timevip).' trên domain: '.$_SERVER['HTTP_HOST'];
      include 'luulog.php';
mbalek('/index.php?act=khVIP&i='.urlencode('Kích Hoạt VIP Thành Công !!!'));
         
         
         
   }    
   }
else
{
mbalek('/index.php?act=khVIP&i='.urlencode('Bạn ko có quyền này'));
} 
         


?>