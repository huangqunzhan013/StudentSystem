<?php
session_start ();
// 变量初始化
if(!isset($_SESSION ['tester'])){
	header("location:login.php");
}

$paperId = $_REQUEST ["test_paper_id"];
$studentid = $_SESSION ['tester'] ['studentId'];
// 是否已有个人试卷
$whereFindPaper = [ 
		'studentid' => $studentid,
		'paper_id' => $paperId 
];
require_once '../dbconfig.php';
$query = "select * from answer_paper where studentid='$studentid' and paper_id='$paperId'";
$resultPaper = @mysql_query ( $query );
if (! mysql_fetch_array ( $resultPaper )) {
	// ======================================================
	// 创建试卷
	// ======================================================
	$studentid = $_SESSION ['tester'] ['studentId'];
	// 将试卷的内容写入答题卷
	$sql = "select * from paper where id = '$paperId'";
	$paper = mysql_fetch_array ( mysql_query ( $sql ) );
	// 查询选择题内容
	$content = $paper ['content'];
	$questionNo = explode ( ',', $content );
	$answerNull = serialize ( [ 
			'a' => 0 
	] );
	// 写入空卷
	foreach ( $questionNo as $no ) {
		/*
		 * $data = [ 'studentid' => $studentid, 'paper_id' => $paperId,
		 * 'select_question_id' => $no, 'answer' => "" ];
		 */
		$sqlinert = "insert into answer_paper(studentid,paper_id,select_question_id,answer) values('$studentid','$paperId','$no','')";
		@mysql_query ( $sqlinert );
	}
}
// ======================================================
// 开始考试
// ======================================================
// 查询试卷
$queryPaper = "select * from paper where id='$paperId'";
$paper = mysql_fetch_array ( mysql_query ( $queryPaper ) );
$paperName = $paper ['name'];
$content = $paper ['content'];
$questionNo = explode ( ',', $content );
// 查询题目及选项状态
$query = "select select_question_id,type,title,answer 
        from select_question,answer_paper where answer_paper.studentid= '$studentid' and select_question.id = answer_paper.select_question_id 
        and answer_paper.paper_id= '$paperId' and select_question.id in($content)";
$result = mysql_query ( $query );
while ( $rowQuestion = mysql_fetch_array ( $result ) ) {
	$resultQuestion [] = $rowQuestion;
}
// 在选项表中查询选项内容
for($i = 0; $i < count ( $resultQuestion ); $i ++) {
	$resultQuestion [$i] ['answer'] = unserialize ( $resultQuestion [$i] ['answer'] );
	$select_question_id = $resultQuestion [$i] ['select_question_id'];
	$sqlitems = "select id,select_item.content from select_item where select_question_id ='$select_question_id'";
	$resultItems = mysql_query ( $sqlitems );
	$resultItemsArray = null;
	while ( $rowItems = mysql_fetch_array ( $resultItems ) ) {
		$resultItemsArray [] = $rowItems;
	}
	$resultQuestion [$i] ['items'] = $resultItemsArray;
}

// 传递参数
$selectQuestion = $resultQuestion;
// $this->assign("selectQuestion", $result);
// 获取用户名
$userName = $_SESSION ['tester'] ['userName'];
// $this->assign('userName', $userName);
// $this->assign('paperId', $paperId);
// $this->assign('paperName', $paperName);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>在线考试系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="/huangqunzhan/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="/huangqunzhan/assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="/huangqunzhan/assets/js/morris/morris-0.4.3.min.css"
	rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="/huangqunzhan/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
 <script type="text/javascript" src="/huangqunzhan/js/jquery.min.js"></script> 
<script type="text/javascript" src="/huangqunzhan/js/laydate.js"></script>

<script language="javascript">
	function ajaxsubmit(itemid,type) {
		var selectItem = document.getElementById(itemid);
		var selectStatus = selectItem.checked;
		var selectQuestionId = selectItem.value;
		var paperId = document.getElementById('paperId').value;
		var data = {
			"paperId":paperId,
			"type":type,
			"itemid" : itemid,
			"selectQuestionId":selectQuestionId,
			"selectStatus" : selectStatus
		};
		var targetAddress = "insertOperate.php?"+Math.random();
		$.ajax({
			url :targetAddress, //后台处理程序  
			type : 'post', //数据传送方式  
			dataType : 'json', //接受数据格式  
			data : data, //要传送的数据  
			success : update_page
		//回传函数(这里是函数名字)
		});
	}
	//回传函数实体，参数为XMLhttpRequest.responseText 
	function update_page(json) { 
 		var str = "<i class='fa fa-check'></i>";
		var selectQuestionId = json.selectQuestionId;
		document.getElementById("sign" + selectQuestionId).innerHTML = str;
	}
</script>
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">在线考试系统</a>
			</div>
			<div
				style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				学号： <?php echo $_SESSION['tester']['studentId'];?> 姓名:
				<?php echo $_SESSION['tester']['userName'];?> &nbsp;&nbsp;<a
					href="gameOver.php?test_paper_id=<?=$paperId?>"
					class="btn btn-danger square-btn-adjust">交&nbsp;卷</a>
			</div>
		</nav>

		<!-- /. NAV SIDE  -->
		<div id="page-inner">
			<div class="row">
				<div class="col-md-11" align='center'>
					<h2><?=$paperName?></h2>
				</div>
			</div>
			<!-- --------------------------------------------------------------------------- -->
			<input type='hidden' name='paperId' id='paperId'
				value='<?=$paperId?>' />
			<!--试题内容行-->
			<?php foreach($selectQuestion as $row=>$vo){ ?>
			<hr />
			<div class="row">
				<div class="col-md-12 col-sm-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<table border=0 cellpadding='10' cellspacing='10'>
								<tr>
									<td width='30'><div id='sign<?=$vo['select_question_id']?>'>
											<i class="fa fa-tag"></i>
										</div></td>
									<td width='20'><?=$row+1?>、</td>
									<td><?=$vo['title']?></td>
								</tr>
							</table>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<form action="#">
									<?php foreach($vo['items'] as  $index=>$item){?>
									<div class="checkbox">
										<label> <input
											type="<?php echo $vo['type']=='单'?'radio':'checkbox';?>"
											name='<?php echo $vo['select_question_id'];?>'
											id='<?php echo $item['id'];?>'
											value='<?php echo $vo['select_question_id'];?>'
											onchange="ajaxsubmit(<?=$item['id']?>,'<?=$vo['type']?>')"
											<?php
												$id = $item ['id'];
												// $answerid = $answer[$id];
												if (isset ( $vo ['answer'] [$id] ) && $vo ['answer'] [$id] == '1') {
													echo "checked";
												}
												?> />
											<?=$index==0?'A':($index==1?'B':($index==2?'C':'D'))?>、<?=$item['content']?>
										</label>
									</div>
									<?php }?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
			<!--试题内容行-->
			<!-- -------------------------------------------------------------------------- -->
		</div>
	</div>
</body>
</html>
