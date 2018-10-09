<? session_start();
include 'inc/config.php';
include 'inc/functions.php';
if(trim($_POST['text'])){
	extract($_POST);
	$name = trim($name);
	if(!$name || $name != $_SESSION['user_login']) die('Access denied! Please login to chat room');
	$text = htmlspecialchars($text);
	if(in_array($name,$config['admin']) && $text == '/prune'){
		$fp = fopen('data/content.txt','w');
		$text = 'has been prune';
	}
	else 
		$fp = fopen('data/content.txt','a');
	$content = '*|*'.time().'*|*'.$name.'*|* '.$text.' *|*'.$upb.'*|*'.$upi.'*|*'.$upu.'*|*'.$upcolor.'*|*'.$upfont.'*|*'.$ip.'*|*';
	fwrite($fp,$content."\n");
	fclose($fp);	
}
$content =  file('data/content.txt');
$count = count($content);
$config['chatline'] = $config['chatline']>$count ? $count : $config['chatline'];
$tempalte = '<div><span class="time">[{$time}]</span> <b>{$name}</b>: {$bcolor}{$bfont}{$bb}{$bu}{$bi}{$text}{$ei}{$eu}{$eb}{$efont}{$ecolor}</div>';
for($i=$count-$config['chatline'];$i<=$count-1;$i++){
	$value = $content[$i];
	if(strlen($value)>5){
		$x = explode('*|*',$value);
		$time 		= date('d/m/Y',$x[1])==date('d/m/Y',time())?'Hôm nay '.date('h:i A',$x[1]):date('d/m/Y h:i A',$x[1]);
		$name 		= in_array($x[2],$config['admin'])? '<b style="color:red">'.$x[2].'</b>':$x[2];
		$text 		= preg_replace('#(http://.*?) #','<a target="_blank" href="$1">$1</a> ',$x[3]);
		$bb   		= $x[4] ? '<b>' : '';
		$eb   		= $x[4] ? '</b>' : '';
		$bi   		= $x[5] ? '<i>' : '';
		$ei   		= $x[5] ? '</i>' : '';
		$bu   		= $x[6] ? '<u>' : '';
		$eu   		= $x[6] ? '</u>' : '';
		$bcolor 	= $x[7] ? '<span style=\'color:'.$x[7].'\'>' : '';
		$ecolor 	= $x[7] ? '</span>' : '';
		$bfont 		= $x[8] ? '<span style=\'font-family:'.$x[8].'\'>' : '';
		$efont 		= $x[8] ? '</span>' : '';
		$ip 		= $x[9];
		eval('$scontent .= "'.addslashes($tempalte).'";');
	}
}
$scontent = stripslashes($scontent);
$scontent = $scontent ? fetch_emoticon($scontent) : 'Welcome to chat room';
echo $scontent;
?>
<br /><br />
