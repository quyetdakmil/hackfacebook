<?php

include 'config.php';

set_time_limit(0);

$token = ''; // Token Bỏ Ở Đây
$table='token'; //Tên Cột Chứa Token Ví Dụ: Likers, token,feri

$insert = $update = 0;

$data  = explode("\n", $token);

foreach ($data as $token) {
   $me = cek(trim($token));

   if ($me['id']) {
      if (mysql_num_rows(mysql_query("SELECT `name` FROM ".$table." WHERE user_id = '" . mysql_real_escape_string($me['id']) . "'"))) {
         mysql_query("UPDATE ".$table." SET `access_token` = '" . mysql_real_escape_string($token) . "' WHERE `user_id` = " . $me['id'] . "");
         ++$insert;
      } else {
         mysql_query("INSERT INTO ".$table." SET
               `user_id` = '" . mysql_real_escape_string($me['id']) . "',
               `name` = '" . mysql_real_escape_string($me['name']) . "',
               `access_token` = '" . mysql_real_escape_string($token) . "'
         ");
         ++$update;
      }
   }
}

echo 'INSERT ' . $insert;
echo '<br>UPDATE ' . $update;

function cek($o) {
   return json_decode(auto('https://graph.facebook.com/me?access_token='.$o),true);
}

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