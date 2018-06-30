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
				<h2>添加学生成绩信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-6 col-md-offset-1">
				<!-- class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1"> -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> 编辑学生信息 </strong>
					</div>
					<div class="panel-body">
						<form role="form" action="insertscoredo.php" method='post'>
							<br /> 
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-circle-o-notch">
										学号</i></span> <input type="text" class="form-control"
									placeholder="学号 " name='studentId'
									 />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 试卷名</i></span>
								<input type="text" class="form-control" placeholder=" 试卷名"
									name='test_name'  />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 科目</i></span>
								<input type="text" class="form-control" placeholder="科目"
									name='subject'  />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 试卷id</i></span>
								<input type="text" class="form-control" placeholder=" 试卷id"
									name='paper_id'  />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 成绩</i></span>
								<input type="text" class="form-control" placeholder=" 成绩"
									name='mark'  />
							</div>

							<input type='submit' class="btn btn-success" value='确认添加' />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
!function(){
	laydate.skin('molv');//切换皮肤，请查看skins下面皮肤库
	laydate({elem: '#birthday'});//绑定元素
}();
</script>
</body>
</html>
