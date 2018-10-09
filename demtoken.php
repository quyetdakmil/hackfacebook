<?php
function countLK(){
$x=opendir('KBOTFBNET_TOKEN/lkT');
while($y=readdir($x)){
if($y != '.' && $y != '..'){
$n[]=$y;
}
}
closedir($x);
return count($n);
}
function countLK2(){
$x=opendir('KBOTFBNET_TOKEN/lkT2');
while($y=readdir($x)){
if($y != '.' && $y != '..'){
$n[]=$y;
}
}
closedir($x);
return count($n);
}
function countCMT(){
$x=opendir('KBOTFBNET_TOKEN/cmT');
while($y=readdir($x)){
if($y != '.' && $y != '..'){
$n[]=$y;
}
}
closedir($x);
return count($n);
}
function countCMT2(){
$x=opendir('KBOTFBNET_TOKEN/cmT2');
while($y=readdir($x)){
if($y != '.' && $y != '..'){
$n[]=$y;
}
}
closedir($x);
return count($n);
}
?>