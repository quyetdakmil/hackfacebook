<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>
	<body>
	
<?php
$content='a \u0111ang l\u00e0m web';
$encode='\\\\u00e1|\\\\u00e0|\\\\u1ea3|\\\\u00e3|\\\\u1ea1|\\\\u0103|\\\\u1eaf|\\\\u1eb7|\\\\u1eb1|\\\\u1eb3|\\\\u1eb5|\\\\u00e2|\\\\u1ea5|\\\\u1ea7|\\\\u1ea9|\\\\u1eab|\\\\u1ead|\\\\u0111|\\\\u00e9|\\\\u00e8|\\\\u1ebb|\\\\u1ebd|\\\\u1eb9|\\\\u00ea|\\\\u1ebf|\\\\u1ec1|\\\\u1ec3|\\\\u1ec5|\\\\u1ec7|\\\\u00ed|\\\\u00ec|\\\\u1ec9|\\\\u0129|\\\\u1ecb|\\\\u00f3|\\\\u00f2|\\\\u1ecf|\\\\u00f5|\\\\u1ecd|\\\\u00f4|\\\\u1ed1|\\\\u1ed3|\\\\u1ed5|\\\\u1ed7|\\\\u1ed9|\\\\u01a1|\\\\u1edb|\\\\u1edd|\\\\u1edf|\\\\u1ee1|\\\\u1ee3|\\\\u00fa|\\\\u00f9|\\\\u1ee7|\\\\u0169|\\\\u1ee5|\\\\u01b0|\\\\u1ee9|\\\\u1eeb|\\\\u1eed|\\\\u1eef|\\\\u1ef1|\\\\u00fd|\\\\u1ef3|\\\\u1ef7|\\\\u1ef9|\\\\u1ef5|\\\\u00c1|\\\\u00c0|\\\\u1ea2|\\\\u00c3|\\\\u1ea0|\\\\u0102|\\\\u1eae|\\\\u1eb6|\\\\u1eb0|\\\\u1eb2|\\\\u1eb4|\\\\u00c2|\\\\u1ea4|\\\\u1ea6|\\\\u1ea8|\\\\u1eaa|\\\\u1eac|\\\\u0110|\\\\u00c9|\\\\u00c8|\\\\u1eba|\\\\u1ebc|\\\\u1eb8|\\\\u00ca|\\\\u1ebe|\\\\u1ec0|\\\\u1ec2|\\\\u1ec4|\\\\u1ec6|\\\\u00cd|\\\\u00cc|\\\\u1ec8|\\\\u0128|\\\\u1eca|\\\\u00d3|\\\\u00d2|\\\\u1ece|\\\\u00d5|\\\\u1ecc|\\\\u00d4|\\\\u1ed0|\\\\u1ed2|\\\\u1ed4|\\\\u1ed6|\\\\u1ed8|\\\\u01a0|\\\\u1eda|\\\\u1edc|\\\\u1ede|\\\\u1ee0|\\\\u1ee2|\\\\u00da|\\\\u00d9|\\\\u1ee6|\\\\u0168|\\\\u1ee4|\\\\u01af|\\\\u1ee8|\\\\u1eea|\\\\u1eec|\\\\u1eee|\\\\u1ef0|\\\\u00dd|\\\\u1ef2|\\\\u1ef6|\\\\u1ef8|\\\\u1ef4';
$encode_array=explode('|',$encode);
$decode='á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|đ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Đ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Í|Ì|Ỉ|Ĩ|Ị|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Ý|Ỳ|Ỷ|Ỹ|Ỵ';
$decode_array=explode('|',$decode);
foreach($encode_array as $k=>$v)
{
	if(preg_match('/'.$v.'/',$content)==1)
	{
		$content=preg_replace('/'.$v.'/',''.$decode_array[$k].'',$content);
	}
}
echo $content;
?>
	</body>
</html>