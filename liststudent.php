<?php
	session_start(); 
	if (!isset($_SESSION['user']))
	{
		echo "user".$_SESSION["user"];
		header("location:login.php"); //自动跳转到登录页.php
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生信息管理系统－分页浏览学生信息</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 36px
}
-->
</style>
<link href="./mystyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p align="center">
  <?php
if(filter_input(INPUT_GET,"page") && $_GET["page"]){
	$page=$_GET["page"];
}else $page=1;
require("config.inc.php");            //引用配置文件
$temp=($page-1)*$list_num;
$sql = "SELECT count( * ) as rownum from $table_name";
$result = mysql_query($sql) or die("查询出错".mysql_error());//发送SQL请求
$row = mysql_fetch_array($result);					//获得记录数
?>
  <span class="STYLE1">学生信息管理系统－浏览学生信息</span><span class="STYLE2">&nbsp;&nbsp;&nbsp;&nbsp;欢迎你，<?php echo $_SESSION["user"]; ?>
&nbsp;&nbsp;&nbsp;<a href="modifypassword.php">修改密码</a></span></p>
<p align="center">
  <?php
echo "目前共有".$row["rownum"]."条记录&nbsp;&nbsp;";			//输出记录数
$p_count=ceil($row["rownum"]/$list_num);					//总页数为总条数除以每页显示数
echo "共分".$p_count."页显示&nbsp;&nbsp;";			//输出页数
echo "当前显示第".$page."页";
echo "<p>";
if($row["rownum"]>0)									//如果记录数大于0输出记录内容
{
?>
<table width="912" height="76" border="0" align="center">
  <tr>
    <td><div align="center">学号</div></td>
    <td><div align="center">姓名</div></td>
    <td><div align="center">性别</div></td>
    <td><div align="center">出生日期</div></td>
    <td><div align="center">年级</div></td>
    <td><div align="center">班级</div></td>
    <td><div align="center">专业</div></td>
    <td><div align="center">宿舍</div></td>
    <td><div align="center">床号</div></td>
    <td><div align="center">家庭住址</div></td>
    <td><div align="center">电话</div></td>
    <td><div align="center">编辑</div></td>
    <td><div align="center">删除</div></td>
  </tr>
  <?php
  $sql="select * from $table_name limit $temp,$list_num";
  $result=mysql_query($sql) or die("查询出错".mysql_error());//发送SQL请求
    while($row=mysql_fetch_array($result))
  {
   ?>
  <tr>
    <td><div align="center">
        <?=$row["stuid"]?>
      </div></td>
    <td><div align="center">
        <?=$row["name"]?>
      </div></td>
    <td><div align="center">
        <?=$row["sex"]?>
      </div></td>
    <td><div align="center">
        <?=$row["birthday"]?>
      </div></td>
    <td><div align="center">
        <?=$row["classname"]?>
      </div></td>
    <td><div align="center">
        <?=$row["classid"]?>
      </div></td>
    <td><div align="center">
        <?=$row["major"]?>
      </div></td>
    <td><div align="center">
        <?=$row["room"]?>
      </div></td>
    <td><div align="center">
        <?=$row["bedid"]?>
      </div></td>
    <td><div align="center">
        <?=$row["homeaddress"]?>
      </div></td>
    <td><div align="center">
        <?=$row["tel"]?>
      </div></td>
       <td><div align="center"><a href='editstudent.php?stuid=<?=$row["stuid"]?>'>修改</a></div></td>
    <td><div align="center"><a href='deletestudent.php?stuid=<?=$row["stuid"]?>'>删除</a></div></td>
   </tr>
  <?php
   	}
  ?>
</table>
<?php
$prev_page=$page-1;						//定义上一页为该页减1
$next_page=$page+1;						//定义下一页为该页加1
echo "<p align=\"center\"> ";
if ($page<=1)							//如果当前页小于等于1只有显示
{
	echo "第一页 | ";
}
else									//如果当前页大于1显示指向第一页的连接
{
	echo "<a href='liststudent.php?page=1'>第一页</a> | ";
}
if ($prev_page<1)						//如果上一页小于1只显示文字
{
	echo "上一页 | ";
}
else									//如果大于1显示指向上一页的连接
{
	echo "<a href='liststudent.php?page=$prev_page'>上一页</a> | ";
}
if ($next_page>$p_count)				//如果下一页大于总页数只显示文字
{
	echo "下一页 | ";
}
else									//如果小于总页数则显示指向下一页的连接
{
	echo "<a href='liststudent.php?page=$next_page'>下一页</a> | ";
}
if ($page>=$p_count)					//如果当前页大于或者等于总页数只显示文字
{
	echo "最后一页</p>\n";
}
else									//如果当前页小于总页数显示最后页的连接
{
	echo "<a href='liststudent.php?page=$p_count'>最后一页</a></p>\n";
}
}
else									//如果没有记录时输出信息
{
	echo "<P align='center'>暂时还没有新生记录！</p>";
}?>
</p>
<p align="center">&nbsp;</p>
<p align="center"><a href="insertstudent.php">新生录入</a> <a href="querystudent.php">查询学生</a>　</p>
</body>
</html>
