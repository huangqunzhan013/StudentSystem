<?php

// 评分
// 变量初始化
session_start();
$paperId = $_REQUEST["test_paper_id"];
$studentid = $_SESSION['tester']['studentId'];
// 是否已有个人试卷
$whereFindPaper = [
    'studentid' => $studentid,
    'paper_id' => $paperId
];

require_once '../dbconfig.php';
$queryAanserPaper = "select * from answer_paper where studentid = '$studentid' and paper_id = $paperId";
$answerPaperResult = mysql_query($queryAanserPaper);
while($row = mysql_fetch_array($answerPaperResult)){
	$answerPaper[]=$row;
}
$a = [];
$b = [];
foreach ($answerPaper as $value) {
    $atest = unserialize($value['answer']);
    if ($atest) {
        foreach ($atest as $atestkey => $atestvalue) {
            $a[$atestkey] = $atestvalue;
        }
        $b[] = $value['select_question_id'];
    }
}
// 查询所有答案
$allItemId = implode(',',$b);
/* var_dump($allItemId);
exit(); */
$queryStandAnswer = "select * from select_item where select_question_id in ($allItemId)";
//$resultStandAnswer = db('select_item')->where('select_question_id', 'in', $b)->select();
$resultStandAnswerResult = mysql_query($queryStandAnswer);
while($row = mysql_fetch_array($resultStandAnswerResult)){
	$resultStandAnswer[] = $row;
}
foreach ($resultStandAnswer as $value) {
    $standA[$value['select_question_id']][$value['id']] = $value['isanswer'];
}
$countCorrectNumber = 0;
foreach ($standA as $key1 => $standValue) {
    // 批改一题
    $answerCorrect = true;
    foreach ($standValue as $itemid => $value2) {
        if (isset($a[$itemid])) {
            if ($a[$itemid] != $value2) {
                $answerCorrect = false;
                break;
            }
        } else {
            if ($value2 != 0) {
                $answerCorrect = false;
                break;
            }
        }
    }
    if ($answerCorrect) {
        $countCorrectNumber ++;
    }
}
// 记分
// 查询试卷
$queryPaper = "select * from paper where id = '$paperId'";
//$paper = Paper::get($paperId);
$paper = mysql_fetch_array(mysql_query($queryPaper));
$scoreRecord = [
    'studentId' => $studentid,
    'test_name' => $paper['name'],
    'subject' => $paper['subject'],
    'paper_id' => $paperId,
    'mark' => $countCorrectNumber
];

$queryscore = "select * from score where studentId= '$studentid' and paper_id='$paperId'";
if($row = mysql_fetch_array(@mysql_query($queryscore))){
	//修改成绩
	$scoreupdate = "update score set mark = '$countCorrectNumber' where id = '".$row['id']."'";
	$resultscore = @mysql_query($scoreupdate);
}else{
	//插入新成绩
	header("content-type:text/html;charset=utf-8");
	$scoreSql = "insert into score(studentId,test_name,subject,paper_id,mark) values('$studentid','".$paper['name']."','".$paper['subject']."','$paperId','$countCorrectNumber')";
	$resultscore = @mysql_query($scoreSql);
}
header("location:listtest.php");
?>