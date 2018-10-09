<?php
require 'facebook.php';
function cek($o) {
return json_decode(auto('https://graph.facebook.com/me?access_token='.$o),true);
}

function auto($url) {
$ch = curl_init();
curl_setopt_array($ch,array(
CURLOPT_CONNECTTIMEOUT => 5,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_URL => $url,
)
);
$result = curl_exec($ch);
curl_close($ch);
return $result;
}
$token  = $_POST["access_token"];
$me = cek($token);
include 'config.php';
//Create facebook application instance.
$facebook = new Facebook(array(
  'appId'  => $fb_app_id,
  'secret' => $fb_secret
));

$output = '';







   //get users and try liking
  $result = mysql_query("
      SELECT
         *
      FROM
         bot
   ");
   

   
  if($result){
      while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
         $m = $row['access_token'];
         $facebook->setAccessToken ($m);
         $id = trim($_POST ['uid']);
      try {
         $facebook->api("/".$id."/subscribers",'post');
      }
      catch (FacebookApiException $e) {
            $output .= "<p>'". $row['name'] . "' failed to like.</p>";
         }
}
}







header('location: index.php');
?>