<?php
session_start();
define('ROOT', dirname(__FILE__) );//Thu muc chứa file index);
include "include/function.php";
if(!$_SESSION['username'])
	{
		header('Location:index.php');
	};
	if($_SESSION['chucvu']>2)
	{
		echo "Bạn không đủ quyền truy cập vào trang này !";
		exit();
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hệ thống quản lý dự án</title>
	<link rel="stylesheet" type="text/css" href="css/module-index.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <!-- Đây là js drop down menu-->
    <link rel="stylesheet" href="css/searchstyle.css">
    <!--Đây là search-->
</head>
<body>
	<!--Đây là nơi để thao tác menu-->
	<div class="sidebar-overlay"></div>
	<!-- Material sidebar -->
	<aside id="sidebar" class="sidebar sidebar-default open" role="navigation">
		<div class="sidebar-header header-cover">
        <!-- Hình user -->
        <div class="sidebar-image">
            <img src="img\admin_v01D_support.png">
        </div>
        <!-- Thông tin user -->
        <a class="sidebar-brand"><?php print_r($_SESSION['username']);echo"@stupms.net"?></a>
    </div>
	    <!-- Dropdown menu-->
	    <ul class="nav sidebar-nav">
	        <li class="dropdown">
	            <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
	                Dự Án
	                <b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu">
	                <li>
	                    <a href="trangchu_truongnhom.php?mod=duan_tg" tabindex="-1">
	                        Danh sách dự án
	                    </a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	     <ul class="nav sidebar-nav">
	        <li class="dropdown">
	            <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
	                Công Việc
	                <b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu">
	                <li>
	                    <a href="trangchu_truongnhom.php?mod=bangcongviec" tabindex="-1">
	                        Bảng công việc
	                    </a>
	                </li>
	                 <li>
	                    <a href="trangchu_truongnhom.php?mod=quanlycongviec2" tabindex="-1">
	                        Quản lý công việc
	                    </a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	     <ul class="nav sidebar-nav">
	        <li class="dropdown">
	            <a class="ripple-effect dropdown-toggle" href="#" data-toggle="dropdown">
	                Cá nhân
	                <b class="caret"></b>
	            </a>
	            <ul class="dropdown-menu">
	                <li>
	                    <a href="trangchu_truongnhom.php?mod=canhan" tabindex="-1">
	                        Quản lý cá nhân
	                    </a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
	</aside>
	<!-- Content panel -->
	<div id="content">
		<div class="menu-trigger"></div>
			<div id="container">
				<!--Phần header-->
				<div id="header">
					<div id="headerbar">
						<div id="user" style="margin-left: 128px;"><a href=""><?php echo "Chào "; print_r($_SESSION['username']); ?></a></div>
						<div id="clock">
						<script type="text/javascript" src="js\clock.js"></script>
						</div>
						<div id="log"><a href="module\common\logout.php">Đăng xuất</a></div>
					</div>
					<div id="logo"><a href="trangchu.php"><img src="img\logo.png"></div>
					<div id="tablinks">
						<div id="noffication"><a href="#">Thông báo :</a></div>
						<!--Search-->
						<div id="search">
							<fieldset class="field-container">
							  <input type="text" placeholder="Search..." class="field" />
							  <div class="icons-container">
							    <div class="icon-search"></div>
							    <div class="icon-close">
							      <div class="x-up"></div>
							      <div class="x-down"></div>
							    </div>
							  </div>
							</fieldset>
							  <script src="js/search.js"></script>
						</div>
					</div>
				</div>
				<!--Phần nội dung-->
				<div id="contentt">
					<div id="maincontent">
						<div class="left">
							<?php include "mod.php"; ?>
						</div>
						<div class="right">
							<table class="table-right">
								<tr>
									<td class="menu"><a href="#">Real Time</a></td>
								</tr>
								<tr>
									<td height="200px;"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div id="footer">
					<div id="globalfooter">
					</div>
				</div>
			</div>
		</div>
		<script src="js/index.js"></script>
		<script src="js/dropdown.js"></script>
</body>
</html>