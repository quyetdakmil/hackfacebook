<?php
defined('KEN') or die('Access Deny!');

//-----------------------LOAD LIBRARY-----------------------//
require_once ROOT . DIRECTORY_SEPARATOR . 'core/config.php';
require_once ROOT . DIRECTORY_SEPARATOR . 'core/work.php';
//----------------------------------------------------------//

$work = new Work;
$work->connectdb($db_host,$db_user,$db_pass,$db_name);
$time_process = $work->microtime_float();
$domain = @$work->get_db_setting('domain');
$version = @$work->get_db_setting('version');
$admin_id = @$work->get_db_setting('admin_id');
$admin_name = @$work->get_db_setting('admin_name');
$upcase_domain = @$work->get_db_setting('upcase_domain');
/*------Cấu Hình Mấy Cái Sau Nếu Không Có Database Table Setting------*/
!$domain && $domain = 'https://hotlike.net'; // Domain
!$version && $version = '1.0.01';
!$admin_id && $admin_id = '100006716972752'; // ID Admin
!$admin_name && $admin_name = 'Trung Hậu'; // Name Admin
!$upcase_domain && $upcase_domain = 'HOTLIKE.NET'; // Domain Viết Hoa
/*--------------------------------------------------------------------*/
$time = (int)$work->get_time_date('time');
$date = (string)$work->get_time_date('time_date');