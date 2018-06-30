<?php

require_once 'base.php';
?>
<?php
header("content-type:text/html;charset='utf-8'");
require_once 'dbconfig.php';
if (isset ( $_REQUEST ['title'] )) {
	// 处理表单数据
	if (isset ( $_REQUEST ['title'] )) {
		$answer [] = isset ( $_REQUEST ['answer1'] ) ? 1 : 0;
		$answer [] = isset ( $_REQUEST ['answer2'] ) ? 1 : 0;
		$answer [] = isset ( $_REQUEST ['answer3'] ) ? 1 : 0;
		$answer [] = isset ( $_REQUEST ['answer4'] ) ? 1 : 0;
		$totalItems = $answer [0] + $answer [1] + $answer [2] + $answer [3];
		
		// 没有选择项
		if ($totalItems == 0) {
			echo "<javascript>alert('必须选择标准答案');</javascript>";
		} else {
			if ($totalItems == 1) {
				$type = '单';
			} else {
				$type = '多';
			}
			// 插入题干
			$subject = $_REQUEST ['subject'];
			$title = $_REQUEST ['title'];
			$select_question_id = $_REQUEST ['id'];
			$sql = "update select_question set subject='$subject',type='$type',title='$title' where id = $select_question_id";
			$result = mysql_query ( $sql );
			if ($result) {
				// 保存四个选项内容
				$items [] = $_REQUEST ['item1'];
				$items [] = $_REQUEST ['item2'];
				$items [] = $_REQUEST ['item3'];
				$items [] = $_REQUEST ['item4'];
				// 取出隐藏的选项id
				$id [0] = $_REQUEST ['id1'];
				$id [1] = $_REQUEST ['id2'];
				$id [2] = $_REQUEST ['id3'];
				$id [3] = $_REQUEST ['id4'];
				for($i = 0; $i < count ( $items ); $i ++) {
					$isanswer = $answer [$i];
					$content = $items [$i];
					$itemId = $id[$i];
					$sql = "update select_item set select_question_id = '$select_question_id',isanswer = '$isanswer' ,content= '$content'  where id = $itemId";
					mysql_query ( $sql );
				}
				header("location:question.php");
			}
		}
	}
}
$id = $_REQUEST ['id'];
// 查询题干
$sql = "select * from select_question";
$result = mysql_query ( $sql );
$data = mysql_fetch_array ( $result );
// 查选项
$select_question_id = $data ['id'];
$sql2 = "select * from select_item where select_question_id='$select_question_id'";
$result2 = mysql_query ( $sql2 );
while ( $items [] = mysql_fetch_array ( $result2 ) ) {
}
?>

<!-- /. NAV SIDE  -->
  <div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>编辑选择题</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div
				class="col-md-10 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>编辑选择题 ，并选中标准答案（单选选一项，多选选多项）</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="editQuestion.php" method='post'>
							<br /> <input type="hidden" name='id' value="<?=$data['id']?>" />
							<div class="form-group">
								<h4>
									<label>选&nbsp;择&nbsp;科&nbsp;目：</label><label
										class="checkbox-inline"> <input type="radio" name='subject'
										value='php' <?=$data['subject']== 'php'?'checked':''?> />php
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='java'
										<?=$data['subject']== 'java'?'checked':''?> /> java
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='android'
										<?=$data['subject']== 'android'?'checked':''?> /> android
									</label>
								</h4>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-question-circle fa-1x"> &nbsp;题&nbsp;&nbsp;目</i></span>
								<textarea name='title' class="form-control" rows="3"
									placeholder="在此输入问题描述"><?=$data['title']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id1' value="<?=$items[0]['id']?>" /> <span
									class="input-group-addon"><label><input type="checkbox"
										name='answer1' value='true'
										<?=$items[0]['isanswer']== '1'?'checked':''?> /> 选项一 </label></span>
								<textarea name='item1' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[0]['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id2' value="<?=$items[1]['id']?>" /> <span
									class="input-group-addon"><label><input type="checkbox"
										name='answer2' value='true'
										<?=$items[1]['isanswer']== '1'?'checked':''?> /> 选项二</label></span>
								<textarea name='item2' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[1]['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id3' value="<?=$items[2]['id']?>" /> <span
									class="input-group-addon"><label><input type="checkbox"
										name='answer3' value='true'
										<?=$items[2]['isanswer']== '1'?'checked':''?> /> 选项三</label></span>
								<textarea name='item3' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[2]['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id4' value="<?=$items[3]['id']?>" /> <span
									class="input-group-addon"><label><input type="checkbox"
										name='answer4' value='true'
										<?=$items[3]['isanswer']== '1'?'checked':''?> /> 选项四</label></span>
								<textarea name='item4' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[3]['content']?></textarea>
							</div>
							<input type='submit' class="btn btn-success col-md-offset-6"
								value='保&nbsp;&nbsp;存' />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	!function() {
		laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
		laydate({
			elem : '#birthday'
		});//绑定元素
	}();
</script>
</body>
</html>
