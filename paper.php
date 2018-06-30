<?php
require_once 'base.php';
require_once 'dbconfig.php';
// 访问student
$query = "select * from paper";
$result = mysql_query ( $query );
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>试卷管理</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class='btn btn-primary btn-sm shiny' href='insertpaper.php'><i
							class='fa fa-edit'>&nbsp;生成试卷</i></a>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								<thead>
									<tr>
										<th>试卷名称</th>
										<th>科目</th>
										<th>总题量</th>
										<th>内容</th>
										<th>备注</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>

									<?php
								$lineno = 0;
								while ( $row = mysql_fetch_array ( $result ) ) {
									$lineno ++;
									$linestyle = $lineno % 2 == 1 ? "odd gradeX" : "even gradeC";
									echo "<tr class='" . $linestyle . "'>";
									echo "<td>" . $row ['name'] . "</td>";
									echo "<td>" . $row ['subject'] . "</td>";
									echo "<td>" . $row ['total'] . "</td>";
									echo "<td>" . $row ['content'] . "</td>";
									echo "<td>" . $row ['memo'] . "</td>";
									echo "<td>&nbsp;&nbsp;<a class='btn btn-primary btn-sm shiny' href='deletepaper.php?id=" . $row ['id'] . "'><i class='fa fa-trash-o' fa-1x'></i>&nbsp;&nbsp;删除</a></td>";
									echo "</tr>";
								}
								?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
				<!--End Advanced Tables -->
			</div>
		</div>
	</div>
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="__STUDENT__/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="__STUDENT__/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="__STUDENT__/assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="__STUDENT__/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="__STUDENT__/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function() {
		$('#dataTables-example').dataTable();
	});
</script>
<!-- CUSTOM SCRIPTS -->
<script src="__STUDENT__/assets/js/custom.js"></script>
</body>
</html>