<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
}
$userName = $_SESSION ['userName'];

require_once 'dbconfig.php';
// 访问student
$query = "select * from student";
$result = mysql_query ( $query );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
	<div align='right'>用户名：<?=$userName?>&nbsp;&nbsp;<a href='newpassword.php'>修改密码</a>&nbsp;&nbsp;<a href='loginout.php'>退出登录</a>
	</div>
	<hr />
	<div align='center'>
		<h1 align='center'>学生信息</h1>
		<table width=80% border=1 cellspacing=0 cellpadding=5>
			<tr>
				<th>学号</th>
				<th>姓名</th>
				<th>班级</th>
				<th>生日</th>
				<th>性别</th>
				<th>民族</th>
				<th>操作</th>
			</tr>
<?php
while ( $row = mysql_fetch_array ( $result ) ) {
	echo "<tr>";
	echo "<td>" . $row ['studentId'] . "</td>";
	echo "<td>" . $row ['name'] . "</td>";
	echo "<td>" . $row ['className'] . "</td>";
	echo "<td>" . $row ['birthday'] . "</td>";
	echo "<td>" . $row ['sex'] . "</td>";
	echo "<td>" . $row ['nation'] . "</td>";
	echo "<td><a href='edit.php?id=".$row ['id']. "'>编辑</a>&nbsp;&nbsp;<a href='delete.php?id=".$row ['id']. "'>删除</a></td>"; 
	echo "</tr>";
}
?>
</table>
	</div>
</body>
</html>