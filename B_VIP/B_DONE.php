 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'config.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$setid=$_POST['id'];
$han=$_POST['han'];
$name=$_POST['name'];
$time=date('H:i:s Y-m-d');


mysql_query("CREATE TABLE IF NOT EXISTS `vip` (

      `id` int(11) NOT NULL AUTO_INCREMENT,

      `name` varchar(32) NOT NULL,

      `idfb` varchar(1024) NOT NULL,

      `time` varchar(1024) NOT NULL,

      `han` varchar(1024) NOT NULL,

      PRIMARY KEY (`id`)

      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

   ");
mysql_query("INSERT INTO `vip` (`name`,`idfb`,`time`,`han`) VALUES
('".$name."','".$setid."','".$time."','".$han." Ngày')");
echo' '.$name.' - '.$setid.' - '.$time.' - '.$han.'';

function auto($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}

?>