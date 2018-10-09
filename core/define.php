<?php
ob_start();
session_start();
define('KEN', true);
define('IS_WIN', DIRECTORY_SEPARATOR == '\\');
define('ROOT', $_SERVER['DOCUMENT_ROOT']?
str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):
str_replace('\\','/',dirname(__FILE__)));
date_default_timezone_set("Asia/Ho_Chi_Minh");
?>