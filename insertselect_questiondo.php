<?php
require_once 'base.php';
?>
<?php
header("content-type:text/html;charset='utf-8");
require_once 'dbconfig.php';
if (isset($_REQUEST['title'])) {
    if (isset($_REQUEST['title'])) {
        $answer[] = isset($_REQUEST['answer1']) ? 1 : 0;
        $answer[] = isset($_REQUEST['answer2']) ? 1 : 0;
        $answer[] = isset($_REQUEST['answer3']) ? 1 : 0;
        $answer[] = isset($_REQUEST['answer4']) ? 1 : 0;
        $totalItems = $answer[0] + $answer[1] + $answer[2] + $answer[3];
        if ($totalItems == 0) {
            echo "<javascript>alert('必须选择标准答案');</javascript>";
        } else {
            if ($totalItems == 1) {
                $type = '单';
            } else {
                $type = '多';
            }
            $subject = $_REQUEST['subject'];
            $title = $_REQUEST['title'];
            $sql = "INSERT INTO select_question(id, subject, type, title, memo) VALUES (null,'$subject','$type','$title',null)";
            $result = mysql_query($sql);
            if ($result) {
                $items[] = $_REQUEST['item1'];
                $items[] = $_REQUEST['item2'];
                $items[] = $_REQUEST['item3'];
                $items[] = $_REQUEST['item4'];
                $select_question_id=mysql_insert_id();
                for ($i = 0; $i < count($items); $i ++) {
                    $isanswer = $answer[$i];
                    $content = $items[$i];
                    $sql = "INSERT INTO select_item(id, select_question_id, isanswer, content, memo) VALUES (null,'$select_question_id','$isanswer','$content',null)";
                    $result2 = mysql_query($sql);
                }
                header("location:select_questions.php");
            }
        }
    }
}
?>
