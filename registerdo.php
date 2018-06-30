<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");
//取表单数据
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = sha1($password);
$password3 = sha1($_POST[password1]);
if($password2!=$password3){
    echo "<script>alert('两次密码不一致！');</script>";
    echo "两次密码不一致！<br/>";
    echo "<a href='register.php'>返回</a>";
}else{


//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "INSERT INTO user(id, username, password, status) VALUES (null,'$username','$password2',1)";
//exit($sql);

if(mysql_query($sql)){
	//echo "注册成功！！！<br/>";
	//echo "<a href='login.php'>去登录</a>";
	header("location:jump.php?code=1&url=login.php&msg=注册成功.");
}else{
	//echo "注册失败！！！<br/>";
	//echo "<a href='register.php'>重注册</a>";
    header("location:jump.php?code=0&url=register.php&msg=注册失败.");
}
}


