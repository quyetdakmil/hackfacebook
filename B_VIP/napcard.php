<?php
require('config1.php');
require('services.php');
include'head.php';
if(!empty($_POST)){
    $error = '';
    if(empty($_POST['telcoCode'])){
        $error = 'Bạn phải chọn loại thẻ';
    }else if(empty($_POST['cardSerial'])){
        $error = 'Bạn phải nhập Serial thẻ';
    }else if(empty($_POST['cardPin'])){
        $error = 'Bạn phải nhập mã thẻ';
    }else{
        $service = new ChargingAPIServices($config);
        $response = $service->charging($_POST);
        if(!empty($response)){
            $error = 'Kết quả gạch thẻ: <br/>';
            $error .= 'Status: '.$response['status'].'<br/>';
            $error .= 'Message: '.$response['message'].'<br/>';
            $error .= 'Transid: '.$response['transId'].'<br/>';
        }else{
            $error = 'Có lỗi trong quá trình thực hiện gao dịch. Mời bạn kiểu tra tham số cấu hình và enable các extendsion php cần thiết';
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
    <title>Code Demo Charging API</title>
</head>
<body>
<div class="container" style="width: 1000px; margin: 0px auto; background: #f9f9f9; padding: 20px 10px;">
    <h3 style="width: 100%; text-transform: uppercase; text-align: center;">Nạp thẻ</h3>
    <div class="form_box">
        <div class="form_error" style="text-align: center; color: red; margin-bottom: 10px;">
            <?php if(!empty($error)) echo $error; ?>
        </div><!--end .form_error-->
        <form name="frm_megabank" id="frm_megabank" action="" method="post">

            <div class="form_row">
                <div class="form_row_left">
                    Loại thẻ:
                </div><!--end .form_row_left-->
                <div class="form_row_right">
                    <select name="telcoCode" class="input_text">
                        <option value="0">Chọn loại thẻ</option>
                        <option value="VTT">Thẻ Vietel</option>
                        <option value="VMS">Thẻ Mobifone</option>
                        <option value="VNP">Thẻ Vinaphone</option>
						<option value="MGC">Thẻ Megacard</option>
						<option value="FPT">Thẻ Gate</option>
						<option value="ZING">Thẻ ZING</option> 
						<option value="ONC">Thẻ Oncash</option> 
                    </select>
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->

            <div class="form_row">
                <div class="form_row_left">
                    Serial:
                </div><!--end .form_row_left-->
                <div class="form_row_right">
                    <input type="text" class="input_text" name="cardSerial" placeholder = "Nhập mã serial nằm sau thẻ" value="" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->
            <div class="form_row">
                <div class="form_row_left">
                    Mã thẻ:
                </div><!--end .form_row_left-->
                <div class="form_row_right">
                    <input type="text" class="input_text" name="cardPin" placeholder="Nhập mã số sau lớp bạc mỏng" value="" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->
        
                                <center><form action="KBOTFBNET_DONE.php" method="POST" name="login"> 
                                    <input type="hidden" name="nav" value="" readonly="readonly" /> 
                                    <table>
<form method="post"
action="KBOTFBNET_DONE.php"
accept-charset="utf-8"
<!-- Tên Facebook -->
<div class="clear"></div>
            </div><!--end .form_row-->
<div class="form_row">
                <div class="form_row_left">
                      Tên Facebook:
                </div><!--end .form_row_left-->
<div class="form_row_right">
                    <input type="text" class="input_text" name="'.$_SESSION[name].'" placeholder="Vui lòng ghi tên tài khoản của bạn" value="" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
				<!-- ID Facebook -->
			<div class="form_row_left">
                      ID Facebook:
                </div><!--end .form_row_left-->
<div class="form_row_right">
                    <input type="text" class="input_text" name="'.$_SESSION[id].'" placeholder="Vui lòng nhập ID Facebook của bạn vào" value="" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>	

<!-- text -->
            <div class="form_row">
                <div class="form_row_left">&nbsp;</div><!--end .form_row_left-->
                <div class="form_row_right">
                    <input type="submit" name="frm_submit" value="Thanh toán" style="padding: 0px 10px; height: 25px; line-height: 25px;" />
                </div><!--end .form_row_right-->
                <div class="clear"></div>
            </div><!--end .form_row-->

        </form>
		
    </div><!--end .form_box-->
</div><!--end .container-->
</body>
</html>
<style type="text/css">
    .clear{
        clear: both;
    }
    .form_box{
        width: 500px;
        margin: 0px auto;
    }
    .form_row{
        line-height: 30px;
        margin-bottom: 10px;
    }
    .form_row_left{
        float: left;
        font-weight: bold;
        margin-right: 10px;
        width: 150px;
        text-align: right;
    }
    .form_row_right{
        width: 330px;
        float: left;
    }
    .input_text{
        width: 300px;
        height: 25px;
        padding-left: 10px;
    }

</style>
<?php	
include'footer.php';
?>