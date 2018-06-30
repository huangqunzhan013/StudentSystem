<?php
	header("Content-type:text/html;charset=utf-8");
	@mysql_connect("localhost","root","") or die("服务器连接失败");
	mysql_select_db("huangqunzhan") or die("数据库不存在");
	mysql_query("set names utf8");
?>