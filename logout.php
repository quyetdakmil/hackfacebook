<?php
//----------LOAD LIBRARY----------//
require_once 'core/define.php';
require_once 'core/autoload.php';
//--------------------------------//
session_destroy();
header('LOCATION: '.$domain);
?>