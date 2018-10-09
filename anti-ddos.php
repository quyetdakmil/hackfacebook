<?php
// DDOS Coin Card Nhé Thanh Niên
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>Xác nhận truy cập - Firewall</title>
</head>
<?php 
 //------ DDOS ĐI --------------- 
 $level = 1; 
  //DDOS ĐI PRO HÃY THỂ HIỆN TÀI NĂNG CỦA MÌNH
  $yoursite = "bot-ex.org"; //DDOS ĐI NÀO
 $scheme = 1; 
 //DDOS ĐI PRO HÃY THỂ HIỆN TÀI NĂNG CỦA MÌNH
 $antidos = 1; 
 //DDOS ĐI PRO HÃY THỂ HIỆN TÀI NĂNG CỦA MÌNH 
 $determiner = "http://bot-ex.org/dieu-khien-1.txt"; 
 //DDOS ĐI PRO HÃY THỂ HIỆN TÀI NĂNG CỦA MÌNH
 $redirect = "<br><br></p><br> 
 </p> 
 <br><br><center><b>Xin vui lòng<br><br><p><a href='".$_SERVER['REQUEST_URI']."'[ Click vào đây ]</a><br>
 <br><p>để chuyển đến nội dung cần xem...!</b> 
 <br>
 <br><br></p><br> </p> 
 </center>"; 
  //DDOS ĐI PRO HÃY THỂ HIỆN TÀI NĂNG CỦA MÌNH
 function url_exists($url) { $a_url = parse_url($url); 
 if (!isset($a_url['port'])) $a_url['port'] = 80; 
 $errno = 0; 
 $errstr = ''; 
 $timeout = 30; 
 if(isset($a_url['host']) && $a_url['host']!=gethostbyname($a_url['host'])){ 
 $fid = fsockopen($a_url['host'], $a_url['port'], $errno, $errstr, $timeout); 
 if (!$fid) return false; 
 $page = isset($a_url['path']) ?$a_url['path']:''; 
 $page .= isset($a_url['query'])?'?'.$a_url['query']:''; 
 fputs($fid, 'HEAD '.$page.' HTTP/1.0'."\r\n".'Host: '.$a_url['host']."\r\n\r\n"); 
 $head = fread($fid, 4096); 
 fclose($fid); 
 return preg_match('#^HTTP/.*\s+[200|302]+\s#i', $head); 
 } else { 
 return false; 
 } 
 } 
 
 function on_off($file) { 
 $string = file_get_contents($file); 
 $fetch = strstr($string,"1"); 
 if ($fetch) { 
 return true; 
 } else { 
 return false; 
 } 
 } 
 
 function level_1() { 
 global $antidos, $redirect; 
 if($antidos){ 
 if(!$_SERVER['HTTP_REFERER']) { 
 echo $redirect; exit; 
 } 
 } 
 } 
 
 function level_2() { 
 global $antidos, $redirect, $yoursite; 
 if($antidos){ 
 if(strpos($_SERVER['HTTP_REFERER'], 'http://www.'.$yoursite) !== 0) { 
 if(strpos($_SERVER['HTTP_REFERER'], 'http://'.$yoursite) !== 0) { 
 echo $redirect; exit; 
 } 
 } 
 } 
 } 
 if($scheme == 1) { 
 if($level == 1) level_1(); 
 elseif($level == 2) level_2(); 
 else { 
 echo "Ban phai chon \$level = 1 hoac \$level = 2"; 
 exit; 
 }
 } 
 elseif($scheme == 2) { 
 if (!url_exists($determiner)) $antidos = 1; 
 else { 
 $antidos = on_off($determiner); 
 } 
 if($level == 1) level_1(); 
 elseif($level == 2) level_2(); 
 else { 
 echo "Ban phai chon \$level = 1 hoac \$level = 2"; 
 exit; 
 } 
 } else { 
 echo "Ban phai chon \$scheme = 1 hoac \$scheme = 2"; 
 exit; 
 } 
 ?>
?>