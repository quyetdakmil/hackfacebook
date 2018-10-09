<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include'config.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time=date('H:i');
$int=intval($_GET['id']);
$sql=mysql_query("SELECT `id` FROM `inbox` WHERE `id`='$int' ");
$row=mysql_fetch_assoc($sql);
$post = mysql_fetch_array(mysql_query("select * from `inbox` WHERE  `id` = '$int' LIMIT 1"));
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `inbox`"), 0);
$res = mysql_query("SELECT * FROM `inbox` LIMIT $tong");
while ($post = mysql_fetch_array($res)){
$tokenib= $post['access_token'];
$noidung = $post['noidung'];
$slib= $post['soib'];
$tatmo= $post['tatmo'];
if($tatmo == 0 ){
$me=json_decode(auto('https://graph.facebook.com/me?access_token='.$tokenib),true);
$in=json_decode(auto('https://graph.facebook.com/me/inbox?access_token='.$tokenib.'&fields=id,to,unread,unseen'),true);
for($i=1;$i<=count($in[data]);$i++){
   if($in[data][$i-1][to][data][0][id] == $me[id]){
       $from=$in[data][$i-1][to][data][1];
       }else{
       $from=$in[data][$i-1][to][data][0];
       }
   echo $in[data][$i-1][id].'=>'.$from[name];
   if(($in[data][$i-1][unseen] >= '0' ) && ($in[data][$i-1][unread] >= $slib)){
         $minggu = explode(' ',$from[name]);
         $nama = $minggu[0];
         $arr_mess = array(
            ' '.$noidung.'

💟 Bây Giờ Là: '.$time.' 👌
📬 By: '.$me[name].' ✌ 
🎵 Web Bot Facebook ➡ K-BotFb .Net ⬅ '
            ,);
         $message = $arr_mess[rand(0,count($arr_mess)-1)];
         auto('https://graph.facebook.com/'.$from[id].'/inbox?access_token='.$tokenib.'&message='.urlencode($message).'&method=post&subject=+');
         echo' Trả Lời : <font color="blue"><b>'.$message.'</font></b><br/>';
echo' PM : <font color="blue"><b>'.$message.'</font></b><br/>';
         }
    echo'<hr color="red">';
   }
 echo'<hr color="blue">';
}
}



function auto($url){
   $ch=curl_init();
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   curl_setopt($ch,CURLOPT_URL,$url);
   $cx=curl_exec($ch);
  curl_close($ch);
  return($cx);
  }
?>