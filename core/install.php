<?php
//----------LOAD LIBRARY----------//
require_once '../core/define.php';
require_once '../core/autoload.php';
//--------------------------------//

$work->query("CREATE TABLE IF NOT EXISTS `thongke` (
`title` tinytext NOT NULL,
`value` int(11) NOT NULL,
PRIMARY KEY (`title`(30))
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `gioithieu` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`id_user_moi` varchar(32) NOT NULL,
`name_moi` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;");
$work->query("CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` varchar(32) NOT NULL,
`username` varchar(100) DEFAULT NULL,
`name` varchar(255) NOT NULL,
`email` varchar(100) DEFAULT NULL,
`birthday` varchar(32) DEFAULT NULL,
`sex` varchar(5) DEFAULT NULL,
`phone` varchar(15) DEFAULT NULL,
`money` int(11) NOT NULL,
`gioithieu` int(11) NOT NULL,
`date` varchar(20) NOT NULL,
`time` int(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;");
$work->query("CREATE TABLE IF NOT EXISTS `user_block` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`limit` varchar(32) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `user_vip` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`level` varchar(1) NOT NULL,
`date` varchar(20) NOT NULL,
`time` int(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;");
$work->query("CREATE TABLE IF NOT EXISTS `action` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`content` text NOT NULL,
`date` varchar(20) NOT NULL,
`time` int(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;");
$work->query("CREATE TABLE IF NOT EXISTS `token` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botlike` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
`caidatcmt` varchar(32) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botexlike` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
`caidatcmt` varchar(32) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botexreaction` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
`camxuc` varchar(32) NOT NULL,
`caidatcmt` varchar(32) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botreaction` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
`camxuc` varchar(32) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botrelike` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botcomment` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255)  NOT NULL,
`token` varchar(255) NOT NULL,
`bieutuong` varchar(32) NOT NULL,
`quangcao` varchar(32) NOT NULL,
`content` mediumtext DEFAULT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botinteract` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
`content` mediumtext DEFAULT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `botinbox` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`token` varchar(255) NOT NULL,
`content` mediumtext DEFAULT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `shoutbox` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`message` mediumtext NOT NULL,
`date` varchar(20) NOT NULL,
`time` int(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;");
$work->query("CREATE TABLE IF NOT EXISTS `shoutbox_log` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`content` text DEFAULT NULL,
`type` varchar(10) NOT NULL,
`date` varchar(20) NOT NULL,
`time` int(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1;");
$work->query("CREATE TABLE IF NOT EXISTS `online` (
`id_user` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`time` int(15) NOT NULL,
PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `setting` (
`title` tinytext NOT NULL,
`value` text NOT NULL,
PRIMARY KEY (`title`(30))
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");
$work->query("CREATE TABLE IF NOT EXISTS `vip` (
`loai` varchar(32) NOT NULL,
`name` varchar(255) NOT NULL,
`number_like` int(15) NOT NULL,
`price` int(12) NOT NULL,
PRIMARY KEY (`loai`(30))
) ENGINE=MyISAM DEFAULT CHARSET=UTF8;");

$query = @$work->fetch_array("SELECT * FROM `vip` WHERE `loai` = '1'");
if(!isset($query['loai'])){
	$work->query("INSERT INTO `vip` (`loai`, `name`, `number_like`, `price`) VALUES ('1', 'VIP Member', 40, 3000), ('2', 'Medium Member', 60, 5000), ('3', 'Super Member', 80, 7000), ('4', 'Boss Member', 100, 9000);");
}
$query = @$work->fetch_array("SELECT * FROM `thongke` WHERE `title` = 'auto'");
if(!isset($query['title'])){
	$work->query("INSERT INTO `thongke` (`title`, `value`) VALUES ('member',0),('auto',0),('bot',0),('view',0);");
}
$query = @$work->fetch_array("SELECT * FROM `setting` WHERE `title` = 'domain'");
if(!isset($query['title'])){
	$work->query("INSERT INTO `setting` (`title`, `value`) VALUES ('domain', '".$domain."'),('version', '".$version."'),('admin_id', '".$admin_id."'),('admin_name', '".$admin_name."'),('upcase_domain', '".$upcase_domain."');");
}
echo 'Xong';
$work->closedb();
?>