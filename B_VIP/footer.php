</div></div></div></div>
<div class="row-fluid">
				<hr />
				<footer class="page-footer ">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5 class="white-text">About</h5>
            <p class="grey-text text-lighten-4">Chúng tôi là nhóm Bot Facebook. Được xây dựng trên nền Bootstrap. Nó sở hữu 1 tốc độ khá nhanh và chuyên nghiệp. Mọi ý kiến đóng góp và tài trợ chúng tôi đều đánh giá cao.</p>
          </div>
          <div class="col-md-4">
            <h5 class="white-text">Chat Room</h5>
            <p class="grey-text text-lighten-4">Chúng tôi có một phòng chat là nơi mà bạn có thể nói chuyện trực tiếp với chúng tôi. Hãy đến và thảo luận về các tính năng mới, mục tiêu trong tương lai, các vấn đề chung hoặc câu hỏi, hoặc bất cứ điều gì khác mà bạn có thể nghĩ đến.</p>
            <a class="btn btn-md blue lighten-3" target="_blank" href="http://chatwing.com/StarOfficial.info"><i class="fa fa-comments-o"></i> Chat</a>
          </div>
          <div class="col-md-2" style="overflow: hidden;">
            <h5 class="white-text">Stats</h5>
<p><!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="Website Statistics" ><script  type="text/javascript" >
try {Histats.start(1,3138818,4,438,112,75,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?3138818&101" alt="Website Statistics" border="0"></a></noscript>
<!-- Histats.com  END  --></p> 
<p><a href="http://www.dmca.com/Protection/Status.aspx?ID=5438ffd4-8966-4975-8fc3-c5a02ef8d77f" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="//images.dmca.com/Badges/dmca_protected_sml_120k.png?ID=5438ffd4-8966-4975-8fc3-c5a02ef8d77f"  alt="DMCA.com Protection Status" /></a></p>    
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2016 Bot Team Facebook, All rights reserved.
        <a class="grey-text text-lighten-4 pull-right" href="https://www.facebook.com/100010550383457">Made by Phạm Mạnh Cường</a>
        </div>
      </div>
    </footer>

<!-- POPUP USER + ID-->
<div class="modal" id="modal_get_user_info">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Kiểm tra thông tin người dùng</h4>
			</div>
			<div class="modal-body">
				<form id="get_user_info_form" method="POST" onsubmit="return false;">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control" id="get_user_info_input" placeholder="User Name or ID" required>
							<span class="input-group-btn">
								<button type="submit" id="get_user_info_submit" data-loading-text="Loading..." class="btn btn-default">GET</button>
							</span>
						</div>
					</div>
				</form>
				<div id="get_user_info_result" style="display:none;"></div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="modal" id="modal_get_id_stt">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Lấy ID Status, Ảnh, Video</h4>
			</div>
			<div class="modal-body">
				<form id="get_id_stt_form" method="POST" onsubmit="return false;">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-link"></span></span>
							<input type="text" class="form-control" id="get_id_stt_input" placeholder="Nhập Link Status/Ảnh cần lấy ID" required>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default">GET</button>
							</span>
						</div>
					</div>
				</form>
				<div id="get_id_stt_result" style="display:none;"></div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<!-- /Container -->

</body> </html>