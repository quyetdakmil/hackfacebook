
<?php
require('connect.php');
?>

<meta charset="UTF-8" />
Token Live hiện tại: <b><?php echo mysql_num_rows(mysql_query("SELECT `id` FROM `$table`")); ?></b>
<center>
	<button id="check_token_live">
		<span id="btn-click">Kiểm tra</span>
		<span id="btn-load" style="display:none;">Đang kiểm tra ...</span>
	</button>
</center>
<br/><br/>
<div style="display:none;" id="check_token_live_load">
	Token Live: <b id="onload">0</b>
</div>
<div style="display:none;" id="check_token_live_load_die">
	Token DIE: <b id="onload-die">0</b>
</div>
<script src="jquery.min.js"></script>
<script src="check_token.js"></script>