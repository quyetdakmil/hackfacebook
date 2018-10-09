<?php

$connect = mysql_pconnect('localhost', 'tên user data', 'matkhau') or die('Cannot connect to Database');
mysql_select_db('tai khoan data', $connect) or die('DB_NAME not exists');
mysql_query("SET NAMES 'utf-8'", $connect);
$table =  'bot'; 