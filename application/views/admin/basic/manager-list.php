<?php
	include_once dirname(__DIR__)."/admin-header.php";
?>
<body class="bg-1">

	<!-- Preloader -->
	<div class="mask"><div id="loader"></div></div>
	<!--/Preloader -->

	<!-- Wrap all page content here -->
	<div id="wrap">

	  <!-- Make page fluid -->
		<div class="row">

		<!-- Fixed navbar -->
		<?php
			include_once dirname(__DIR__)."/admin-top.php";
		?>
		<!-- Fixed navbar end -->

		<!-- Page content -->
		<div id="content" class="col-md-12">

		  <!-- page header -->
		  <div class="pageheader">
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>관리자 목록</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">기본설정</a></li>
				<li class="active">관리자 설정</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">

			<!-- col 12 -->
			<div class="col-md-12">

				<!-- tile -->
				<section class="tile transparent">

				  <!-- tile body -->
					<div class="tile-body color transparent-black rounded-corners">

						<div class="table-responsive dataTables_wrapper form-inline" role="grid" id="basicDataTable_wrapper">
							<table class="table table-customdataTable ">
								<colgroup>
									<col width="5%"/>
									<col width="40%"/>
									<col width="15%"/>
									<col width="15%"/>
									<col width="15%"/>
									<col width="10%"/>
								</colgroup>
								<thead>
									<tr>
										<th class="sort-numeric">#</th>
										<th class="sort">아이디</th>
										<th class="sort">성명</th>
										<th class="sort">마지막 접속</th>
										<th class="sort">등록일</th>
										<th class="sort">기능</th>
									</tr>
								</thead>
								<tbody id="manageList">
								<?php
								if (!empty($lists)){
									foreach ($lists as $lt){
								?>
									<tr>
										<td><?php echo $pagenum; ?></td>
										<td><?php echo $lt->ADMIN_ID; ?></td>
										<td><?php echo $lt->ADMIN_NAME; ?></td>
										<td><?php echo $lt->ADMIN_LAST_LOGIN; ?></td>
										<td><?php echo $lt->ADMIN_REG_DATE; ?></td>
										<td>
											<button type="button" class="btn btn-default btn-xs managerModify" data-key="<?php echo $lt->ADMIN_SEQ; ?>">수정</button>
											<button type="button" class="btn btn-danger btn-xs managerDelete" data-key="<?php echo $lt->ADMIN_SEQ; ?>">삭제</button>
										</td>
									</tr>
								<?php
										$pagenum--;
									}
								}else{
									echo "<tr></tr>";
								}
								?>
								</tbody>
							</table>
							<div class="row">
							<div class="col-md-4 sm-center">
								<div class="dataTables_info">
								<?php if ($listCount > 0) :
									$end = ($start+$limit)-1;
									if ($end > $listCount) $end = $listCount;
								?>
									Showing <?php echo $start; ?> to <?php echo $end; ?> of <?php echo $listCount; ?> entries
								<?php endif; ?>
								</div>
							</div>
							<div class="col-md-4 text-center sm-center">
								<div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
									<?php echo $pagination; ?>
								</div>
							</div>
							<div class="col-md-4 text-right">
								<a href="/admin/basic/managerWrite" type="button" class="btn btn-primary"> 관리자 등록하기</a>
								</div>
							</div>
						</div>

					</div>
					<!-- /tile body -->

				</section>
				<!-- /tile -->

			</div>

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

</body>
</html>
<script type="text/javascript">
	$(function(){
		$(document).on("click", ".managerModify", function(){
			var admin_seq = $(this).data("key");
			document.location.href="/admin/basic/managerModify/"+admin_seq;
		})

		$(document).on("click", ".managerDelete", function(){
			var admin_seq = $(this).data("key");

			if (confirm("관리자를 삭제하시겠습니까?")){
				$.ajax({
	                url:"/admin/basic/managerDeleteProc",
	                type:"post",
	                data:{
	                    "admin_seq" : admin_seq,
	                },
	                dataType:"json",
	                success:function(resultMsg){
	                    if (resultMsg.code == "200"){
	                        alert(resultMsg.msg);
	                        document.location.href="/admin/basic/managers";
	                    }else{
	                        alert(resultMsg.msg);
	                    }
	                },
	                error:function(e){
	                    console.log(e);
	                }
	            })
			}
		})
	});
</script>
