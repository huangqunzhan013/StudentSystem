<?php
// 获取用户名
session_start();
if (! isset($_SESSION['tester'])) {
    header("location:login.php");
}
    $userName = $_SESSION['tester']['userName'];
    $userName = $_SESSION['tester']['userName'];
    $studentid = $_SESSION['tester']['studentId'];
// 传递模板参数
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>考必赢在线学习系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="/huangqunzhan/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="/huangqunzhan/assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="/huangqunzhan/assets/js/morris/morris-0.4.3.min.css"
	rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="/huangqunzhan/assets/css/custom.css" rel="stylesheet" />
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
				<a class="navbar-brand" href="index.html">考必赢在线学习</a>
			</div>
		</nav>
		<div id="board-wrapper">
			<div class="row">
				<div class="col-md-12" align='center'>
					<h2>考必赢在线学习系统</h2>
				</div>
			</div>
			<!-- /. ROW  -->
			<hr />
			<div id="page-inner">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-6">
						<a href="listtest.php">
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-green set-icon"> <i
									class="fa fa-ra"></i>
								</span>
								<div class="text-box">
									<p class="main-text">在线考试</p>
									<p class="text-muted">在线考试</p>
								</div>
							</div>
						</a>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<a href="/huangqunzhan/login.php">
							<div class="panel panel-back noti-box">
								<span class="icon-box bg-color-blue set-icon"> <i
									class="fa fa-gear"></i>
								</span>
								<div class="text-box">
									<p class="main-text">后台登录</p>
									<p class="text-muted">后台管理</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<div id="foot-wrapper" align='center'>
			版权所有@2017，考必赢云教育技术网，技术支持：胡泽军<br /> 逢考必赢网，网址：<a
				href='www.betgod.win:8080/huzejun'>www.betgod.win:8080/huzejun</a> <br />
			<br />
		</div>
	</div>
</body>
</html>
