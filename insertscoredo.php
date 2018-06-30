<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$studentId = $_REQUEST ['studentId'];
$test_name = $_REQUEST ['test_name'];
$subject = $_REQUEST ['subject'];
$paper_id = $_REQUEST['paper_id'];
$mark = $_REQUEST ['mark'];

// sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "INSERT INTO score(id, studentId, test_name, subject, paper_id, mark) VALUES (null,'$studentId','$test_name','$subject','$paper_id','$mark')";
if (mysql_query ( $sql )) {
//	echo "添加成功！！！<br/>";
//	echo "<a href='score.php'>返回</a>";
    echo "<script>alert('添加成功！');parent.location.href='score.php';</script>";
} else {
	//echo "添加失败！！！<br/>";
	//echo "<a href='score.php'>返回</a>";
    echo "<script>alert('添加失败！');parent.location.href='score.php';</script>";
}

