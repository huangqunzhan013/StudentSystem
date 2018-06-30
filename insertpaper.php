<?php require_once 'base.php';?>
<?php

if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
}
$userName = $_SESSION ['userName'];

require_once 'dbconfig.php';

?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>生成试卷（组卷）</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div
				class="col-md-10 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>录入试卷参数</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="insertpaperdo.php"
							method='post'>
							<br />
							<div class="form-group">
								<h4>
									<label>选&nbsp;择&nbsp;科&nbsp;目：</label><label
										class="checkbox-inline"> <input type="radio"
										name='subject' value='php' checked />php
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='java' /> java
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='android' /> android
									</label>
								</h4>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-question-circle fa-1x"> &nbsp;试卷名称</i></span>
								<textarea name='name' class="form-control" rows="3"
									placeholder="在此输入问题描述"></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-gears fa-1x"> 题目数量</i></span> <input
									type="text" class="col-md-3"
									placeholder="在此输入题目数量" name='total'>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-pencil fa-1x"> &nbsp;&nbsp;备&nbsp;&nbsp;&nbsp;&nbsp;注&nbsp;&nbsp;&nbsp;</i></span>
								<textarea name='memo' class="form-control" rows="3"
									placeholder="在此输入备注"></textarea>
							</div>
							<input type='submit' class="btn btn-success col-md-offset-6"
								value='&nbsp;保&nbsp;存&nbsp;' />
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
