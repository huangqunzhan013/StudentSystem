<?php
session_start();
if(!isset($_POST['studentId'])){
    header("location:login.php");
}
if (isset($_POST['studentId'])) {
    if (isset($_SESSION['tester'])) {
        session_destroy();
    }
    $studentId = $_POST['studentId'];
    $password = $_POST['password'];
    // 计算摘要
    $password2 = sha1($password);
    include_once '../dbconfig.php';
    // 根据用户名和密码去查询帐号表
    $query = "select * from student where studentId ='$studentId' and password = '$password2'";
    $result = @mysql_query($query);
    // 有满足条件的记录
    if ($row = mysql_fetch_array($result)) {
        // 使用 authority 保存用户和权限信息
        $tester = array(
            'studentId' => $studentId,
            'userName' => $row['name'],
            'role' => 'student'
        );
        $_SESSION['tester'] = $tester;
      //  header("location:index.php");
        header("location:jump.php?code=1&url=index.php&msg=登录成功.");
    } else {
      //  echo "<script>alert('用户名或密码错误!');</script>";
      //  echo "用户名或密码错误！<br/>";
      //  echo "<a href='login.php'>重新登陆</a>";
        header("location:jump.php?code=0&url=login.php&msg=账号或密码错误.");
        
    }
}
?>
