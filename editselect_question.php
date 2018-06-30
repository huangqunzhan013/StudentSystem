<?php require_once 'base.php';?>
<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userName'])){
    header("location:login.php");
}
$userName=$_SESSION['userName'];
require_once 'dbconfig.php';
$id=$_REQUEST['id'];
$sql="select * from select_question where id='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$select_question_id=$row['id'];
$sql2="select * from select_item where select_question_id='$select_question_id'";
$result2=mysql_query($sql2);
while($items[]=mysql_fetch_array($result2)){
    
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
						<form role="form" action="editselect_questiondo.php"
							method='post'>
							<br /> <input type="hidden" name='id' value="<?=$row['id']?>" />
							<div class="form-group">
								<h4>
									<label>选&nbsp;择&nbsp;科&nbsp;目：</label><label
										class="checkbox-inline"> <input type="radio"
										name='subject' value='php' <?=$row['subject']== 'php'?'checked':''?>/>php
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='java' <?=$row['subject']== 'java'?'checked':''?>/>
										java
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='android'<?=$row['subject']=='android'?'checked':''?>/>
										android
									</label>
								</h4>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-question-circle fa-1x"> &nbsp;题&nbsp;&nbsp;目</i></span>
								<textarea name='title' class="form-control" rows="3"
									placeholder="在此输入问题描述"><?=$row['title']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id1' value="<?=$items[0]['id']?>" /> <span
									class="input-group-addon"><label><input
										type="checkbox" name='answer1' value='true'
										<?=$items[0]['isanswer']== '1'?'checked':''?>/> 选项一 </label></span>
								<textarea name='item1' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[0]['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id2' value="<?=$items[1]['id']?>" /> <span
									class="input-group-addon"><label><input
										type="checkbox" name='answer2' value='true'
									<?=$items[1]['isanswer']== '1'?'checked':''?>/> 选项二</label></span>
								<textarea name='item2' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[1]['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id3' value="<?=$items[2]['id']?>" /> <span
									class="input-group-addon"><label><input
										type="checkbox" name='answer3' value='true'
										<?=$items[2]['isanswer']== '1'?'checked':''?>/> 选项三</label></span>
								<textarea name='item3' class="form-control" rows="3"
									placeholder="在此输入选项 内容"><?=$items[2]['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<input type="hidden" name='id4' value="<?=$items[3]['id']?>" /> <span
									class="input-group-addon"><label><input
										type="checkbox" name='answer4' value='true'
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
