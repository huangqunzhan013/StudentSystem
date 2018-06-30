<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="/huangqunzhan/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="/huangqunzhan/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="/huangqunzhan/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> 欢迎注册</h2>
               
                <h5>( 注册账号 )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>请输入注册信息</strong>  
                            </div>
                            <div class="panel-body">
                                <form action="registerdo.php" method='post'>
<br/>
                                        
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="studentId" class="form-control" placeholder="请输入学号" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="name" class="form-control" placeholder="请输入名字" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="className" class="form-control" placeholder="请输入班级" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="birthday" class="form-control" placeholder="请输入生日   eg:年-月-日" />
                                        </div>
                                         <div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> </i></span>
								<div align='left'>&nbsp;&nbsp;
									<input type="radio"  name='sex' value='男'/>男 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
										 name='sex' value='女'/>女
								</div>
								</div>
								 <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="nation" class="form-control" placeholder="请输入民族" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control" placeholder="请输入密码" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password1" class="form-control" placeholder="再次确认密码" />
                                        </div>
                                     
                                     <input type='submit' name='hh' value='立即注册' class="btn btn-success " />
                                 
                                    <hr />
                                      已经注册 ?  <a href="login.php" >点击登录</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="/huangqunzhan/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="/huangqunzhan/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="/huangqunzhan/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="/huangqunzhan/assets/js/custom.js"></script>
   
</body>
</html>

