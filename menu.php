<?php
if($act){
if($act == 'bomLike' ||
      $act == 'botLike' ||
      $act == 'botLike2' ||
      $act == 'botComment' ||
      $act == 'AutoPostWall' ||
      $act == 'bomWall' ||
      $act == 'botLikeGroup' ||
      $act == 'botStt' ||
      $act == 'botInboxRandom' ||
      $act == 'botInbox' ||
      $act == 'bomComment' ||
      $act == 'AutoPostGroup' ||
      $act == 'DelStt' ||
      $act == 'botPoke' ||
      $act == 'botCommentRandom' ||
      $act == 'AutoConfirm' ||
      $act == 'DeleteAllFriends' ||
      $act == 'UnLikeFanpage' ||
      $act == 'botSimsimi' ||
      $act == 'bomLike' ||
      $act == 'botExLike' ||
      $act == 'botComment2' ){
      include $act.'.php';
      }

print'
<div class="aclb fcg fsl abt">
';
if($act == menu){
print '
';
botMenu();
}else{
print '
<br><center><a class="btn btn-primary" href="?act=menu "> [+] Chức Năng Khác [+] </a><br><center>
</div>
';
}
}else{
botMenu();
}
function botMenu(){
print '
<div class="row">
				<div class="col-sm-12 blog-main">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-inbox"></span> TIN NHẮN HỆ THỐNG
							<span class="pull-right" id="loading" style="display:none;">
								<span class="glyphicon glyphicon-refresh gly-animate"></span>
							</span>
						</div>
						<div class="panel-body">
							<div id="content">
								<ul class="media-list">
									<li class="media">
										<div class="media-left">
<img src="https://graph.facebook.com/'.$_SESSION[id].'/picture" alt="Admin"/>
</div>
										<div class="media-body">
<b>
<img src="http://bot-ex.org/images/s10.gif"><span class="badge bg-info">'.$_SESSION[name].'</h4></b>
<p><b><img src="http://bot-ex.org/images/s9.gif"><span class="badge bg-info">Loại: Member </span><br>
                  <b><img src="http://bot-ex.org/images/s8.gif"><span class="badge bg-info">ID Facebook: '.$_SESSION[id].'
             
		<p><b><img src="http://bot-ex.org/images/s7.gif"><span class="badge bg-info">Tài khoản: 5.000 VND</h4><br>
		</p>
<div class="media-body">
                                      
<p> <a href="http://chatwing.com/StarOfficial.info" type="button" class="btn btn-primary btn-sm"><i class="fa fa-comments-o"></i> Chat Room</a> <td> <a href="../logout.php" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-log-out"></span> Đăng Xuất</a></p>
<a class="list-group-item" href="#" data-toggle="modal" data-target="#napthe"><i class="glyphicon glyphicon-usd"></i> Nạp tiền</a>

										</div>
									</li>
								</ul>
								<hr>
Chào mừng bạn đến với <b>Bot-Ex.Org</b>. <br>Đây là hệ thống Bot Facebook vip nhất hiện nay.<br>
Chúng tôi cam kết sẽ đảm bảo quyền riêng tư của bạn, không sử dụng Token với mục đích xấu.<br>
Mọi ý kiến đóng góp vui lòng gửi qua <a href="//fb.com/messages/100010550383457" target="_blank">Inbox</a> nhé!<br>
<span class="glyphicon glyphicon-star-empty"></span> Bán VIP Tương Tác. Vui Lòng Liên Hệ <a href="http://fb.com/100010550383457">Admin</a> Để Mua VIP. <br>
<span class="glyphicon glyphicon-home"></span> <b>Join</b>: <a href="https://www.facebook.com/groups/435670596612643/"> Bot-Ex Groups </a> + <a href="https://www.facebook.com/Bot-ExOrg-939548792800945"> Bot-Ex Page </a> 
<br>
<span class="glyphicon glyphicon-heart-empty"></span> <b>Slogan</b>: <a href="http://Bot-Ex.Org/" target="_blank">Bot-Ex.Org</a> Make Your Life Automactic <span class="glyphicon glyphicon-heart-empty"></span><br>
<br>
<center> <i class="fa fa-facebook-official fa-fw"></i><b>Chat Room</b><i class="fa fa-facebook-official fa-fw"></i><br>

</center>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Bot-Ex.Org V0.4 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9457033891980444"
     data-ad-slot="3306623817"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
							</div>
						</div>
					</div>
					<div id="get_user" style="display:none;"></div>
				</div>


<div class="row">
<div class="col-sm-12 blog-main">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<span class="glyphicon glyphicon-cog"></span> Menu Chức Năng
							<span class="pull-right" id="loading" style="display:none;">
								<span class="glyphicon glyphicon-refresh gly-animate"></span>
							</span>
						</div>
						<div class="panel-body">
<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-thumbs-up"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Like</div>
                                    </div>
                                </div>
                            </div>
                            <a href="K-Like.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					 <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-globe"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Ex Like</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botExLike">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-comment"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Comment</div>
                                    </div>
                                </div>
                            </div>
                            <a href="K-Cmt.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-signal"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Subscribe</div>
                                    </div>
                                </div>
                            </div>
                            <a href="K-Sub.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
				<div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-link"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Inbox CNN</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botcnn2">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-screenshot"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Bảo Trì</div>
                                        <div>Auto Share</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>




                    







                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-leaf"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Like 1</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botLike">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-fire"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Like 2</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botLike2">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-eye-open"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Comment 1</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botComment">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-picture"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Comment 2</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botComment2">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-star"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bom Like</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=bomLike">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-certificate"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bom Wall</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=bomWall">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-retweet"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Chấp Nhận Kết Bạn</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=AutoConfirm">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-bullhorn"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Auto Poke</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botPoke">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>




                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-trash"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Xóa Status</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=DelStt">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-euro"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto UnLike FanPage</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=UnLikeFanpage">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-bell"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto UnFiends</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=DeleteAllFriends">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>






                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-asterisk"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Like Group</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botLikeGroup">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-plus"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bom Comment Stt</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=bomComment">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-volume-up"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Inbox Mặc Định</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botInbox">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-eye-open"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Inbox Random</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botInboxRandom">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>






                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-tree-conifer"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Auto Update Stt</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botStt">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-tower"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Token Checker</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./StarOfficial.info_CHECKTOKEN">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-qrcode"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Comment Random</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=botCommentRandom">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-envelope"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Bot Simsimi</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-heart"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Lọc Acc Trùng</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../tools/loc-acc.html">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-barcode"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Lọc Access Token</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../tools/loc-token.html">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>








                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-user"></span>    
                                </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Post Wall</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=AutoPostWall">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-globe"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">FREE</div>
                                        <div>Auto Post Group</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?act=AutoPostGroup">
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<span style="font-size:40px" class="glyphicon glyphicon-remove-sign"></span>    
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">UPDATING</div>
                                        <div>Auto Thoát Nhóm</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<i style="font-size:40px" class="fa fa-user-times"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">UPDATING</div>
                                        <div>Xóa Inbox Hàng Loạt</div>
                                    </div>
                                </div>
                            </div>
                                <div class="panel-footer">
                                    <span class="pull-left">Sử Dụng</span>
                                    <span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


</div>     <!-- row END-->
</div>
</div>
</div>
</div>

'; }
echo'
</div>
'; 
?>