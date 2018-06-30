<?php
require_once 'base.php';
require_once 'dbconfig.php';
// 访问student
$query = "select * from score";
$result = mysql_query ( $query );
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>学生信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class='btn btn-primary btn-sm shiny' href='insertscore.php'>新增</a>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover"
								id="dataTables-example">
								<thead>
									<tr>
										<th>学号</th>
										<th>试卷名</th>
										<th>科目</th>
										<th>试卷id</th>
										<th>成绩</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$lineno = 0;
								while ( $row = mysql_fetch_array ( $result ) ) {
									$lineno ++;
									$rowstyle = $lineno % 2 == 1 ? "odd gradeX" : 'even gradeC';
									echo "<tr class=" . $rowstyle . ">";
									echo "<td>" . $row ['studentId'] . "</td>";
									echo "<td>" . $row ['test_name'] . "</td>";
									echo "<td>" . $row ['subject'] . "</td>";
									echo "<td>" . $row ['paper_id'] . "</td>";
									echo "<td>" . $row ['mark'] . "</td>";
									echo "<td><a class='btn btn-primary btn-sm shiny' href='editscore.php?id=" . $row ['id'] . "'><i class='fa fa-edit fa-1x'></i>&nbsp;&nbsp;编辑</a>&nbsp;&nbsp;<a class='btn btn-danger btn-sm shiny' href='deletescore.php?id=" . $row ['id'] . "'><i class='fa fa-trash-o' fa-1x'></i>&nbsp;&nbsp;删除</a></td>";
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
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>
