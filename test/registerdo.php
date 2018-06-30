<?php
require_once '../dbconfig.php';
header("content-type:text/html;charset=utf-8");
//取表单数据
$studentId = $_REQUEST['studentId'];
$name = $_REQUEST['name'];
$className = $_REQUEST['className'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
$nation = $_REQUEST['nation'];
$password = $_REQUEST['password'];
$password2 = sha1($password);
$password3 = sha1($_REQUEST[password1]);
if($password2!=$password3){
    echo "<script>alert('两次密码不一致！');</script>";
    echo "两次密码不一致！<br/>";
    echo "<a href='register.php'>返回</a>";
}else{


//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "INSERT INTO student(id, studentId, name, className, birthday, sex, nation, password) VALUES (null,'$studentId','$name','$className','$birthday','$sex','$nation','$password2')";
//exit($sql);

if(mysql_query($sql)){
//	echo "注册成功！！！<br/>";
//	echo "<a href='login.php'>去登录</a>";
    header("location:jump.php?code=1&url=login.php&msg=注册成功.");
}else{
	//echo "注册失败！！！<br/>";
	//echo "<a href='register.php'>重注册</a>";
    header("location:jump.php?code=0&url=login.php&msg=注册失败.");
}
}

