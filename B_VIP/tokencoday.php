<?php
include 'config.php';
$result = mysql_query("SELECT * FROM Likers");
if($result){
while($row = mysql_fetch_array($result))
  {
$access_token = $row[access_token];
echo $access_token;
echo '<br>';
}
}
?>