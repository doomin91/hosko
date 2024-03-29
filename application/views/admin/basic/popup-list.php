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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>팝업관리</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">기본설정</a></li>
				<li class="active">팝업관리</li>
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
				<section class="tile color transparent-black">

				  <!-- tile body -->
				  	<div class="tile-body">

						<div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
							<table class="table datatable table-custom01 userTable">
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
										<th class="sort">제목</th>
										<th class="sort">시작일</th>
										<th class="sort">종료일</th>
										<th class="sort">좌표</th>
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
										<td><?php echo $lt->POP_TITLE; ?></td>
										<td><?php echo $lt->POP_START; ?></td>
										<td><?php echo $lt->POP_END; ?></td>
										<td><?php echo $lt->POP_LOCAT_X; ?>/<?php echo $lt->POP_LOCAT_Y; ?></td>
										<td>
											<button type="button" class="btn btn-default btn-xs popupModify" data-key="<?php echo $lt->POP_SEQ; ?>">수정</button>
											<button type="button" class="btn btn-danger btn-xs popupDelete" data-key="<?php echo $lt->POP_SEQ; ?>">삭제</button>
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
									<a href="/admin/basic/popupWrite" type="button" class="btn btn-primary"> 팝업 등록하기</a>
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
		$(document).on("click", ".popupModify", function(){
			var admin_seq = $(this).data("key");
			document.location.href="/admin/basic/popupModify/"+admin_seq;
		})

		$(document).on("click", ".popupDelete", function(){
			var popup_seq = $(this).data("key");

			if (confirm("팝업을 삭제하시겠습니까?")){
				$.ajax({
	                url:"/admin/basic/popupDeleteProc",
	                type:"post",
	                data:{
	                    "popup_seq" : popup_seq,
	                },
	                dataType:"json",
	                success:function(resultMsg){
	                    if (resultMsg.code == "200"){
	                        alert(resultMsg.msg);
	                        document.location.reload();
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
