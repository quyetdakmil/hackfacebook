

<?php


    $token = $_POST['access_token'];      
    $postID = $_POST['idpost'];       
    $jumlah = $_POST['soluong'];                
    $message = $_POST['noidung'];          
    for($a=0; $a<$jumlah; $a++){
            $stat = curl("https://graph.beta.facebook.com/".$postID."/comments?access_token=".$token."&method=post&message=".$message);
            $dec = json_decode($stat);
            if(isset($dec->id))echo '';
            else echo "error\n";
    }

mbalek('/index.php?act=bomComment&i='.urlencode('Boom Comment Thành Công !!!'));

    function curl($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $exec = curl_exec($ch);
            curl_close($ch);
            return $exec;
    }
function mbalek($x){
print '<meta http-equiv="refresh" content="0;url='.$x.'"/>';
}
    ?>