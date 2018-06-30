 <?php
session_start();
if(!isset($_SESSION['tester'])){
    header("location:login.php");
}
// 获取用户名
$userName = $_SESSION['tester']['userName'];
$userName = $_SESSION['tester']['userName'];
$studentid = $_SESSION['tester']['studentId'];

require_once '../dbconfig.php';
// 查询试卷表,如果该生有成绩，就查询出来
$query = "select paper.id,name,paper.subject,total,content,mark from paper left outer join score on score.paper_id = paper.id and score.studentId ='$studentid'";
$result = @mysql_query($query);
while ($testRow = @mysql_fetch_array($result)) {
    $papers[] = $testRow;
}
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
<!-- GOOGLE FONTS-->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' /> -->
<script type="text/javascript" src="js/laydate.js"></script>
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
				<a class="navbar-brand" href="index.html">在线练习系统</a>
			</div>
			<div
				style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				考生名：
				<?=$userName?>&nbsp;&nbsp;<a href="index.php"
					class="btn btn-danger square-btn-adjust">首页</a> &nbsp;&nbsp;<a
					href="login.php"
					class="btn btn-danger square-btn-adjust">退出登录</a>
			</div>
		</nav>
		<!-- /. NAV SIDE  -->
		<div id="board-wrapper">
			<div id="page-inner">
				<div class="row">
					<div class="col-md-12">
						<h2>我的考试</h2>
					</div>
				</div>
				<!-- /. ROW  -->
				<hr />
				<div class="row">
					<div class="col-md-12">
						<!-- Advanced Tables -->
						<div class="panel panel-default">
							<div class="panel-heading"></div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover"
										id="dataTables-example">
										<thead>
											<tr>
												<th>序号</th>
												<th>考试编号</th>
												<th>考试名称</th>
												<th>科目</th>
												<th>成绩</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
									<?php
        $lineno = 0;
        foreach ($papers as $row) {
            $lineno ++;
            $linestyle = $lineno % 2 == 1 ? "odd gradeX" : "even gradeC";
            echo "<tr class='" . $linestyle . "'>";
            echo "<td>" . $lineno . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . ($row['mark'] == '' ? '<font color=red><b>待考</b></font>' : $row['mark']) . "</td>";
            $url = "edit.php?id=" . $row['id'];
            $testurl = "test.php?test_paper_id=" . $row['id'];
            if ($row['mark'] == '') {
                echo "<td>&nbsp;<a class='btn btn-danger btn-sm shiny' href='" . $testurl . "'><i class='fa fa-edit'>&nbsp;现在考试</i></a></td>";
            } else {
                echo "<td></td>";
            }
            echo "</tr>";
        }
        ?>
								</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="foot-wrapper" align='center'>
		版权所有@2017，考必赢云教育技术网，技术支持：胡泽军<br /> 逢考必赢网，网址：<a
			href='www.betgod.win:8080/huzejun'>www.betgod.win:8080/huzejun</a> <br />
		<br />
	</div>
	</div>
	</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="/huangqunzhan/assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="/huangqunzhan/assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="/huangqunzhan/assets/js/jquery.metisMenu.js"></script>
	<!-- DATA TABLE SCRIPTS -->
	<script src="/huangqunzhan/assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="/huangqunzhan/assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables-example').dataTable();
	});
</script>
	<!-- CUSTOM SCRIPTS -->
	<script src="/huangqunzhan/assets/js/custom.js"></script>
</body>
</html>