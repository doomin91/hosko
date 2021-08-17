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
									<div><a href="/admin/group/group_write" class="btn btn-xs btn-default" ><i class="fa fa-plus" aria-hidden="true"></i> 분류등록</a></div>
								</div>

								<table class="table">
									<thead>
										<tr>
											<th>번호</th>
											<th>분류명</th>
											<th>기능</th>
										</tr>
									</head>
									<tbody>
										<?php foreach($group as $gp){?>
										<tr>
											<td><?php echo $gp->GP_SEQ;?></td>
											<td><?php echo $gp->GP_NAME;?></td>
											<td>
											<a href="/admin/group/group_modify/<?php echo $gp->GP_SEQ?>" class="btn btn-xs btn-default">수정</a> 
											<button class="btn btn-xs btn-default" onclick="groupDelete(<?php echo $gp->GP_SEQ?>);">삭제</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
									
								</table>
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

	function groupDelete(GROUP_SEQ){
		
		if(confirm("선택하신 그룹을 삭제하시겠습니까?")){
		$.ajax({
			url:"/admin/group/group_delete_proc/" + GROUP_SEQ,
			type:"post",
			dataType:"json",
			success:function(data){
				let msg = data["msg"];
				let code = data["code"];
				if(code == "200"){
					alert("삭제되었습니다.")
					location.reload();
				} else {
					alert(msg);
				}
			}
		})
		}
	}

	</script>