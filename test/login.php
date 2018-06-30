
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>考必赢在线学习系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="/huangqunzhan/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="/huangqunzhan/assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="/huangqunzhan/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> -->

</head>
<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /> <br />
				<h2>注册用户登录</h2>

				<h5>(授权访问 )</h5>
				<br />
			</div>
		</div>
		<div class="row ">

			<div
				class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> 请输入考生信息 </strong>
					</div>
					<div class="panel-body">
						<form role="form" method="post" action="logindo.php">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"></i></span>
								<input type="text" class="form-control" placeholder="在此输入学号 "
									name='studentId' />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" placeholder="在此输入密码"
									name='password' />
							</div>
							<div class="form-group">
								<label class="checkbox-inline"> <input type="checkbox" /> 记住密码
								</label> <span class="pull-right"> <a href="#">忘记密码 ? </a>
								</span>
							</div>
							<input type="submit" class="btn btn-primary " name="Submit"
								value="登录">
							<hr />
							未注册 ? <a href="register.php">点我 </a>
						</form>
					</div>

				</div>
			</div>


		</div>
	</div>
	
</body>
</html>


