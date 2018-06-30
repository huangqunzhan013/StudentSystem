<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$name = $_REQUEST ['name'];
$subject = $_REQUEST ['subject'];
$total = $_REQUEST ['total'];
$memo = $_REQUEST ['memo'];

// sql语句中字符串数据类型都要加引号，数字字段随便
 $sql = "INSERT INTO paper(id, name, subject, total, content, memo) VALUES (null,'$name','$subject','$total','','$memo')";
if (mysql_query ( $sql )) {
//	echo "添加成功！！！<br/>";
//	echo "<a href='paper.php'>返回</a>";
    echo "<script>alert('添加成功！');parent.location.href='paper.php';</script>";
} else {
	//echo "添加失败！！！<br/>";
//	echo "<a href='paper.php'>返回</a>";
    echo "<script>alert('添加失败！');parent.location.href='paper.php';</script>";
} 


