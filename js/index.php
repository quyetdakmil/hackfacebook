<?php
session_start();
include"config.php";
include"head.php";
?>

    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-hashtag"></i> <span>Bot-Ex.Org</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="/"><i class="fa fa-home"></i> Trang Chủ</a>
                </li>
                <li><a><i class="fa fa-star-o"></i> Hệ Thống Auto <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="Auto-@like.php">Auto Like</a>
                    </li>
                    <li><a href="Auto-@like-page.php">Auto Like Page</a>
                    </li>
                    <li><a href="Auto-@comment.php">Auto Comment </a>
                    </li>
                    <li><a href="Auto-@add-friend.php">Auto Add Friend </a>
                    </li>
                    <li><a href="Auto-@sub.php">Auto Sub </a>
                    </li>
                    <li><a href="Auto-@share.php">Auto Share </a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-thumbs-o-up"></i> Hệ Thống Bot <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="Bot-@like.php">Bot Like</a>
                    </li>
                    <li><a href="Bot-@comment.php">Bot Comment</a>
                    </li>
                    <li><a href="Bot-@tra-like.php">Bot Trả Like</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bomb"></i> Hệ Thống Boom <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="Boom-@like.php">Bão Like</a>
                    </li>
                    <li><a href="Boom-@comment.php">Bão Comment </a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-life-ring"></i> Khu Vực Hỗ trợ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="#">Hướng Dẫn Cơ Bản</a>
                    </li>
                    <li><a href="#">Room Hỗ Trợ</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Khu Vực Khác</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-bug"></i> Chính Sách Riêng Tư <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="e_commerce.html">Chính sách về quyền riêng tư</a>
                    </li>
                    <li><a href="projects.html">Điều khoản sử dụng</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-windows"></i> Ứng Dụng <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="#">404 Error</a>
                    </li>
                    <li><a href="#">500 Error</a>
                    </li>
                    <li><a href="#">Plain Page</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                </li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
<?php
if($_SESSION['id'])
{
?>
          <div class="sidebar-footer hidden-small">
            <a href="https://www.facebook.com/<?php echo $_SESSION['id']; ?>" target="_blank" title="Profile">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </a>
            <a href="" title="Settings">
              <span class="glyphicon glyphicon-cog" target="_blank" aria-hidden="true"></span>
            </a>
            <a href="Mua-@vip.php" title="Vip">
			  <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
            </a>
            <a href="Dang-@xuat.php" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
<?php
}else{
?>
          <div class="sidebar-footer hidden-small">
            <a href="#" target="_blank" title="Profile">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </a>
            <a href="#" title="Settings">
              <span class="glyphicon glyphicon-cog" target="_blank" aria-hidden="true"></span>
            </a>
            <a href="Mua-@vip.php" title="Vip">
			  <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
            </a>
            <a href="Dang-@xuat.php" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
<?php
}
?>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
<?php
if($_SESSION['id'])
{
?>
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="https://graph.facebook.com/<?php echo $_SESSION['id']; ?>/picture" alt="<?php echo $_SESSION['name']; ?>"><?php echo $_SESSION['name']; ?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="https://www.facebook.com/<?php echo $_SESSION['id']; ?>/" target="_blank">  Trang Cá Nhân</a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/settings" target="_blank">Settings</a>
                  </li>
                  <li>
                    <a href="Mua-@vip.php">
                      <span class="badge bg-red pull-right">x50%</span>
                      <span>Mua Vip</span>
                    </a>
                  </li>
                  <li><a href="Dang-@xuat.php"><i class="fa fa-sign-out pull-right"></i> Đăng Xuất</a>
                  </li>
                </ul>
              </li>
<?php
}else{
?>
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="public/img/user.png" alt="Anonymouse"/>Bạn Chưa Đăng Nhập
                </a>
              </li>
<?php
}
?>

              <!--<li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="public/img/user.png" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>Dypomax</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="public/img/user.png" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>Dypomax</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                    </a>
                  </li>
                </ul>
              </li>-->

            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">

        <br />
        <div class="">

          <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                </div>
                <div class="count">Bot-Ex</div>

                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i>
                </div>
                <div class="count">Bot-Ex</div>

                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i>
                </div>
                <div class="count">Bot-Ex</div>

                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div>
          </div>

		  
          <div class="row">
		  
			<!--BEGIN FORM-LOGIN -->
<?php
if($_SESSION['id'])
{
?>
            <div class="col-md-9">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Menu Chức Năng</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
					<div class="panel-body">
						<div class="tab-content">
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Auto-@like.php'>Auto Like</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Auto-@like.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Auto-@like-page.php'>Auto Like Page</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Auto-@like-page.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Auto-@comment.php'>Auto Comment</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=red size=+1>Bảo trì <i class="fa fa-exclamation-triangle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Auto-@comment.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Auto-@add-friend.php'>Auto Add Friend</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=red size=+1>Bảo trì <i class="fa fa-exclamation-triangle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Auto-@add-friend.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Auto-@Sub.php'>Auto Sub</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Auto-@sub.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Auto-@share.php'>Auto Share</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Auto-@share.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Bot-@like.php'>Bot Like</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Bot-@like.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Bot-@comment.php'>Bot Comment</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Bot-@comment.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Bot-@tra-like.php'>Bot Trả Like</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=green size=+1>Hoạt động <i class="fa fa-check-circle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Bot-@tra-like.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Boom-@like.php'>Bão Like</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=red size=+1>Bảo trì <i class="fa fa-exclamation-triangle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Boom-@like.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->
							<div class="col-md-4">
							<center>
							<div class="panel panel-primary">
							<div class="panel-heading">
							<h3 class='panel-title'><a style='color:white;text-align:center;' href='Boom-@comment.php'>Bão Comment</a></h3>
							</div>
							<div class='panel-body'>
							Tình trạng: <font color=blue size=+1>Không cài</font><br>
							Hệ thống: <font color=red size=+1>Bảo trì <i class="fa fa-exclamation-triangle"></i></font><br>
							<hr>
							<div class='row'>
							<div class='col-sm-6'><a class='btn btn-info' data-toggle='modal' data-target='#showtip' onclick='modaltip(7)'>Thông tin</a></div>
							<div class='col-sm-6'><a href='Boom-@comment.php' class='btn btn-success'>Sử dụng</a></div>
							</div>
							</div>
							</div>
							</center>
							</div><!--/postpage-->

						</div>
					</div>
                </div>
				
                </div>
              </div>
            </div>
<?php
}else{
?>
            <div class="col-md-9">
			<form role="form" action="login.php" method="post" class="login-form">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Đăng Nhập Hệ Thống</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
					<div class="form-group">
					  <label class="sr-only" for="token">Token:</label>
					  <input name="token" type="text" class="form-control" placeholder="Dán mã token vào đây : https://www.facebook.com/connect/login_success.html#access_token=CAACW5Fg5N2IBAM5gCcs9ULDX2I3pT7AguEq81vraQOmCj6LsXTNMUgBSpsmiDiXtLqiecjAocjpzte0hARY28aRyTTfgnLxnXQDGfSIN4EyeL2XCgBJqdbha4sRVdEwrOJMIdQ85LG2TKY6OUsgH9AkmpdhwRcSdYmmKnPaYN004sXNuEihahNHSLxt5mqQUQ3ENeBukdxQZCeZAwoWLZBsghTDS0ZD&expires_in=0 " id="token" >
					</div>
					<div class="col-md-4 col-md-offset-4">
						<center><br><div class="g-recaptcha" data-sitekey="<?php echo $site_key?>"></div><br></center>
					</div>


                    <div class="col-md-6 col-md-offset-3">
					<div class="row text-center">
                      <div class="row" style="text-align: center;">
                        <div class="col-sm-12">
							<p><button type="submit" class="btn btn-block btn-success" name="login">Đăng Nhập</button></p>

							<a href="<?php echo $token_url?>" target="_blank">
                            <button type="button" class="btn btn-info">Cài Token</button>
							</a>

							<a href="<?php echo $token_url?>" target="_blank">
                            <button type="button" class="btn btn-danger">Lấy Token</button>
							</a>

							<a data-toggle="modal" data-target="#huongdan">
                            <button type="button" class="btn btn-warning">Hướng Dẫn</button>
							</a>
							<br><br>
							
							<a href="http://fb.com/VIP.Handsome" target="_blank">
							<button type="button" class="btn btn-inverse"><i class="fa fa-sign-in"></i> Liên Hệ Admin</button>
							</a><hr>
<body>
	<div class="wrap">
		<div class="player">
			<div class="thong-tin-bai-hat">
					<h3 class="tenbaihat">Tên Bài Hát</h3>
			
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
			</form>
            </div>

<?php
}
?>
			<!--END FORM-LOGIN -->


			<!--BEGIN NEW-USER -->
			<div class="col-md-3">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Thành Viên Sử Dụng Gần Đây</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
<?php
$infotv = mysql_query("SELECT * FROM `token` order by id desc LIMIT 0,8");
while ($getinfo = mysql_fetch_array($infotv)){
$nametv= $getinfo['name'];
$idtv= $getinfo['user_id'];
?>
                  <article class="media event">
					<a href="https://facebook.com/<?php echo $idtv; ?>" target="_blank" rel="nofollow" class="user-profile pull-left" >
						<img src="https://graph.facebook.com/<?php echo $idtv; ?>/picture" alt="<?php echo $nametv; ?>"/>
				    </a>
                    <div class="media-body">
                    <a href="https://facebook.com/<?php echo $idtv; ?>" target="_blank" rel="nofollow" class="title" ><?php echo $nametv; ?></a>
                    </div>
                  </article>
<?php
}
?>  
               </div>
              </div>
            </div>
			<!--END NEW-USER -->
	
	
            <div class="col-md-9">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Làm thế nào để sử dụng ??</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<table class="table table-responsive">
					<thead>
					<tr>
					<th>#</th>
					<th>Auto-bot yêu cầu</th>
					<th>Thao tác</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					<td>1. </td>
					<td><strong><a title="Auto Like, Hack Like, Hack Sub" href="index.php">Auto Like , Auto Follow</a> </strong></td>
					<td><p class="text-danger">Lưu ý: Bạn nên trên 18 tuổi, nếu không hãy <a href="https://www.facebook.com/me/about?section=contact-info&pnref=about" target="_blank"> thay đổi năm sinh </a> thành trên 18 tuổi. Nếu không sẽ không bật theo giõi được</p> Đầu tiên, bạn click vào <a href="https://www.facebook.com/settings?tab=followers" target="_blank">đây</a> để thay đổi thiết lập người theo giõi. Trong phần: "<b>Ai có thể theo dõi tôi</b>" bạn chọn và sửa thành <kbd><i class="fa fa-globe"></i> Tất cả mọi người <i class="fa fa-caret-down"></i></kbd> hoặc <kbd><i class="fa fa-globe"></i> Everyone <i class="fa fa-caret-down"></i></kbd><br> Tiếp theo phần: "<b>Bình luận của người theo dõi</b>" bạn chọn và sửa thành: <kbd> Tất cả mọi người <i class="fa fa-caret-down"></i></kbd> hoặc <kbd> Everyone <i class="fa fa-caret-down"></i></kbd></td>
					</tr>
					<tr>
					<td>2.</td>
					<td>
					<strong><a title="Auto Like, Hack Like" href="index.php">Auto Like, Hack Like, Auto comment</a></strong>
					<br><br>
					<strong><a title="Bot Like, Bot Ex Like" href="index.php">Bot Ex Like,Bot Ex Like Comment, Bot Call</a> <br><br></strong>
					</td>
					<td>Sau khi thay đổi thành công thiết lập người theo giỏi. Bạn click vào <a href="https://www.facebook.com/settings?tab=privacy&section=composer&view" target="_blank"> đây </a> để thiết lập công khai bài viết. Trong phần: "<b>Ai có thể xem nội dung của tôi?</b>" bạn chọn <kbd><i class="fa fa-globe"></i> Mọi người</kbd> <br></td>
					</tr>
					<tr>
					<td>3.</td>
					<td>
					<strong><a title="Auto Like, Hack Like, Hack Sub" href="index.php">All Auto-bot</a></strong>
					</td>
					<td>
					<div class="input-group input-group-lg">
					Click <a target="_blank" href="<?php echo $token_url; ?>">Cài đặt</a> để cài đặt ứng dụng lấy mã access_token. Cài đặt ứng dụng bằng cách click 3 lần <a>Ok</a> <br/><a>Bạn chỉ cần cài đặt 1 lần. Sau này không cần cài đặt nữa, chỉ cần làm tiếp bước tiếp theo :-</a>) <br>	Sau đó, Click <a target="_blank" href="<?php echo $token_url; ?>">Lấy token</a> và copy url/link từ thanh địa chỉ.<br/>	Cuối cùng, dán url/link Go! bên dưới rồi bấm <span>Go!</span>
					</div>
					</td>
					</tr>
					</tbody>
					</table>
                </div>
              </div>
            </div>
			
          </div>
            
		  
        </div>
<?php
include"foot.php";
?>