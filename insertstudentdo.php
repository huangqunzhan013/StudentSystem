<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$studentId = $_REQUEST ['studentId'];
$name = $_REQUEST ['name'];
$className = $_REQUEST ['className'];
$birthday = $_REQUEST ['birthday'];
$sex = $_REQUEST ['sex'];
$nation = $_REQUEST ['nation'];

// // sql语句中字符串数据类型都要加引号，数字字段随便
 $sss="INSERT INTO student(id, studentId, name, className, birthday, sex, nation) VALUES (null,'$studentId','$name','$className','$birthday','$sex','$nation')";
// $sql = "insert into student (studentId,name,className,birthday,sex,nation) values ('$studentId','$name','$className','$birthday','$sex','$nation')";
 if (mysql_query ( $sss )) {
 	//echo "添加成功！！！<br/>";
 //	echo "<a href='index.php'>返回</a>";
     echo "<script>alert('添加成功！');parent.location.href='index.php';</script>";
 } else {
 //	echo "添加失败！！！<br/>";
 	//echo "<a href='index.php'>返回</a>";
     echo "<script>alert('添加失败！');parent.location.href='index.php';</script>";
 }


