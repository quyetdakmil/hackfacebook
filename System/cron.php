<?php
include'config.php';
$tong1 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autolike`"), 0);
$tong2 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autosub`"), 0);
$tong3 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autocmt`"), 0);
$tong4 = mysql_result(mysql_query("SELECT COUNT(*) FROM `autoshare`"), 0);



$layid = mysql_query("SELECT * FROM `autolike` LIMIT $tong1");
	while ($getpu = mysql_fetch_array($layid)){
		$id= $getpu['id'];
		$timecu= $getpu['time'] + 60 * 15;
		if($timecu < time()){
			mysql_query("
            DELETE FROM
               autolike
            WHERE
               id='" . mysql_real_escape_string($id) . "' 
         ");
		}
	}
	$layid2 = mysql_query("SELECT * FROM `autosub` LIMIT $tong2");
	while ($getpu2 = mysql_fetch_array($layid2)){
		$id= $getpu2['id'];
		$timecu= $getpu2['time'] + 60 * 15;
		if($timecu < time()){
			mysql_query("
            DELETE FROM
               autosub
            WHERE
               id='" . mysql_real_escape_string($id) . "' 
         ");
		}
	}
		$layid3 = mysql_query("SELECT * FROM `autocmt` LIMIT $tong3");
	while ($getpu3 = mysql_fetch_array($layid3)){
		$id= $getpu3['id'];
		$timecu= $getpu3['time'] + 60 * 15;
		if($timecu < time()){
			mysql_query("
            DELETE FROM
               autocmt
            WHERE
               id='" . mysql_real_escape_string($id) . "' 
         ");
		}
	}
		$layid4 = mysql_query("SELECT * FROM `autoshare` LIMIT $tong4");
	while ($getpu4 = mysql_fetch_array($layid4)){
		$id= $getpu4['id'];
		$timecu= $getpu4['time'] + 60 * 15;
		if($timecu < time()){
			mysql_query("
            DELETE FROM
               autoshare
            WHERE
               id='" . mysql_real_escape_string($id) . "' 
         ");
		}
	}
	?>