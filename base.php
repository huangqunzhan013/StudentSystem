<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
}
$userName = $_SESSION ['userName'];
// 计算当前菜单名
//$menu = $_GET ['m'];
// 计算当前文件名
$url = $_SERVER ['PHP_SELF'];
$start = strrpos ( $url, '/' );
$end = strrpos ( $url, '.' );
$menuName = substr ( $url, $start + 1, $end - $start - 1 );
?>

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>学生管理系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' />
<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">学生信息管理</a>
			</div>
			<div
				style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> 用户名：<?=$userName?>&nbsp;&nbsp;<a
				class='btn btn-primary btn-sm shiny'	href='newpassword.php'>修改密码</a>&nbsp;<a href="loginout.php"
					class='btn btn-danger btn-sm shiny'>退出</a>
			</div>
		</nav>
		<!-- /. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li class="text-center"><img src="assets/img/find_user.png"
						class="user-image img-responsive" /></li>

						<li><a <?="student"==$menuName ? "class='active-menu'":''?>
						href="student.php"><i class="fa fa-user fa-3x"></i>学生信息</a></li>
					<li><a <?="score"==$menuName ? "class='active-menu'":''?>
						href="score.php"><i class="fa fa-search fa-3x"></i>学生成绩信息</a></li>
					<li><a <?="select_questions"==$menuName ? "class='active-menu'":''?>
						href="select_questions.php"><i class="fa fa-desktop fa-3x"></i> 选择题 </a></li>
					<li><a <?="paper"==$menuName ? "class='active-menu'":''?> href="paper.php"><i class="fa fa-qrcode fa-3x"></i>
							试卷管理</a></li>
					

			<!--  		<li><a <?="Dropdown"==$menuName ? "class='active-menu'":''?> href="#"><i
							class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span
							class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="#">Second Level Link</a></li>
							<li><a href="#">Second Level Link</a></li>
							<li><a href="#">Second Level Link<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li><a href="#">Third Level Link</a></li>
									<li><a href="#">Third Level Link</a></li>
									<li><a href="#">Third Level Link</a></li>

								</ul></li>
						</ul></li>-->
				
				</ul>

			</div>
		</nav>