<?php
// 表单处理
session_start();
$answer ['studentid'] = $_SESSION['tester']['studentId'];
$answer ['paper_id'] = $_REQUEST['paperId'];
$answer ['select_question_id'] = $_REQUEST['selectQuestionId'];
$select_status = $_REQUEST['selectStatus'] == 'true' ? 1 : 0; 

require_once '../dbconfig.php';
$query = "select * from answer_paper where studentid='".$answer ['studentid']."' and paper_id='".$answer ['paper_id']."' and select_question_id='".$answer ['select_question_id']."'";
$oldAnswerPaper = mysql_fetch_array(mysql_query($query));
$oldAnswer = unserialize ( $oldAnswerPaper ['answer'] );
if ('单' == $_REQUEST['type']) {
	if (is_array ( $oldAnswer )) {
		foreach ( $oldAnswer as $key => $value ) {
			$oldAnswer [$key] = 0;
		}
	}
	$oldAnswer [$_REQUEST['itemid']] = 1;
} else {
	$oldAnswer [$_REQUEST['itemid']] = $select_status;
}
$answer ['answer'] = serialize ( $oldAnswer );
$myAswer = serialize ( $oldAnswer );
$saveSql = "update answer_paper set answer='$myAswer' where studentid='".$answer ['studentid']."' and paper_id='".$answer ['paper_id']."' and select_question_id='".$answer ['select_question_id']."'";
$answerPaper = mysql_query($saveSql);
$data = [ 
		'selectQuestionId' => $_REQUEST['selectQuestionId']
];
echo json_encode($data);
?>