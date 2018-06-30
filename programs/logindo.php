<?php
header("content-type:text/html;charset=utf-8");
	require_once('../conn.php');
	require_once('../init.inc.php');
if(!isset($_SESSION)){
	session_start();
}
if(isset($_SESSION['userName'])){
	$smarty->display('index.html');
}else if(!isset($_REQUEST['username'])){
	echo "<script>alert('请先登录')</script>";
	$smarty->display('login.html');
}else {
	
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$sql="select * from user where username='$username' and password='$password'";
	$result=mysql_query($sql);
	if($row=mysql_fetch_array($result)){
		$_SESSION['userName']=$username;
		echo "<script>alert('登录成功')</script>";
		header("location:index.html");
	}else{
		echo "<script>alert('用户名或密码错误!');</script>";
		$smarty->display('login.html');
	}
}
?>