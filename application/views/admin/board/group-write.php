    <!-- Bootstrap -->
	<html>
	<body>
	<style>
	body {
		overflow:hidden;
	}
	table {
		font-size:12px;
		text-align:center;
	}

	table th{
		text-align:center;
	}

	.tile-header div{
		display:inline-block;
		margin:5px;
	}
	</style>

    <link href="/static/admin/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Wrap all page content here -->
	<div id="wrap">

		<!-- Make page fluid -->
		<div class="row">


			<!-- Page content -->
			<div id="content" class="col-md-12">

			</div>
			<!-- /page header -->

			<!-- content main container -->
			<div class="main"> 

				<!-- row -->
				<div class="row" style="margin:0;">

					<!-- col 6 -->
					<div class="col-md-12">
						<!-- tile -->

						<section class="tile color transparent-black">

							<!-- tile body -->
							<div class="tile-body">
								<div class="tile-header">
									<div><h5><strong><i class="fa fa-angle-right" aria-hidden="true"></i> 게시판그룹관리</strong></h5></div>
								</div>
								<table class="table table-bordered">
										<tr>
											<th class="info" style="vertical-align:middle">그룹명</th>
											<td><input type="text" name="group_name" class="form-control"></td>
										</tr>
								</table>
							</div>
							<div class="tile-footer" style="text-align:center;">
								<button type="button" class="btn btn-primary" onclick="groupRegist();">확인</button>
								<a href="/admin/group/group_list" type="button" class="btn btn-default">목록</a>
							</div>

							<!-- /tile body -->

						</section>


					</div>
					<!-- /col 12 -->

				</div>
				<!-- /row -->

			</div>
			<!-- /content container -->

		</div>
		<!-- Page content end -->

	</div>
	<!-- Make page fluid-->

	</div>
	<!-- Wrap all page content end -->

	<?php
		include_once dirname(__DIR__)."/admin-footer.php";
	?>

	<script>

	function groupRegist(){
		if(!$("input[name=group_name]").val()){
			alert("그룹명을 입력해주세요.");
			$("input[name=group_name]").focus()
			return false;
		}
		
		$.ajax({
			url:"/admin/group/group_write_proc",
			type:"post",
			data:{
				"group_name" : $("input[name=group_name]").val()
			},
			dataType:"json",
			success:function(data){
				let msg = data["msg"];
				let code = data["code"];

				if(code == "200"){
					alert("등록되었습니다.")
					location.href = "/admin/group/group_list";
				} else {
					alert(msg);
				}
			}
		})
	}

	</script>