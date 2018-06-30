<?php
require_once 'dbconfig.php';
header("content-type:text/html;charset=utf-8");

// 取表单数据
// $id = $_REQUEST['id'];
// $studentId = $_REQUEST['studentId'];
// $test_name = $_REQUEST['test_name'];
// $subject = $_REQUEST['subject'];
// $paper_id = $_REQUEST['paper_id'];
// $mark = $_REQUEST['mark'];

// sql语句中字符串数据类型都要加引号，数字字段随便
// $sql = "UPDATE score SET studentId='$studentId',test_name='$test_name',subject='$subject',paper_id='$paper_id',mark='$mark' WHERE id=''$id";
$id = $_REQUEST['id'];
$studentId = $_REQUEST['studentId'];
$test_name = $_REQUEST['test_name'];
$subject = $_REQUEST['subject'];
$paper_id = $_REQUEST['paper_id'];
$mark = $_REQUEST['mark'];
$sql = "UPDATE score SET studentId='$studentId',test_name='$test_name',subject='$subject',paper_id='$paper_id',mark='$mark' WHERE id=$id";
if (mysql_query($sql)) {
  //  echo "修改成功！！！<br/>";
   // echo "<a href='score.php'>返回</a>";
    echo "<script>alert('修改成功！');parent.location.href='score.php';</script>";
} else {
   // echo "修改失败！！！<br/>";
   // echo "<a href='score.php'>返回</a>";
    echo "<script>alert('修改失败！');parent.location.href='score.php';</script>";
}


