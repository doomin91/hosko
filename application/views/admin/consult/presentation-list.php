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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>설명회 관리</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">상담관리</a></li>
				<li class="active">설명회 관리</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<!-- row -->
			<div class="row">

				<!-- col 6 -->
				<div class="col-md-12">
				<!-- tile -->


				<section class="tile color transparent-black">
				  <!-- tile body -->
				  <div class="tile-body">
					<div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
					  <table class="table datatable table-custom01 userTable">

							<colgroup>
									<col width="5%"/>
                                    <col width="55%"/>
									<col width="15%"/>
									<col width="10%"/>
									<col width="5%"/>
									<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">제목</th>
                                    <th class="text-center">작성자</th>
                                    <th class="text-center">진행상황</th>
                                    <th class="text-center">조회</th>
									<th class="text-center">등록일</th>
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)){
								foreach ($lists as $lt){
						?>
								<tr>
									<td align="center"><?php echo $pagenum; ?></td>
									<td><a href="/admin/consult/presentationView/<?php echo $lt->PT_SEQ; ?>"><?php echo $lt->PT_SUBJECT; ?></a></td>
									<td align="center"><?php echo $lt->ADMIN_NAME; ?></td>
									<td align="center"><?php echo $lt->PT_STATUS; ?></a></td>
									<td align="center"><?php echo $lt->PT_READ_CNT; ?></td>
                                    <td align="center"><?php echo $lt->PT_REG_DATE; ?></td>
								</tr>
						<?php
									$pagenum--;
								}
							}else{
								echo "<tr><td colspan=\"9\" align=\"center\">등록된 상담건이 없습니다.</td></tr>";
							}
						?>
							</tbody>
							</table>
							<div class="row">
                                <div class="col-md-4 text-center sm-center">
                                </div>
								<div class="col-md-4 text-center sm-center">
									<div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
										<?php  echo $pagination; ?>
									</div>
								</div>
                                <div class="col-md-4 text-right sm-right">
                                    <a href="/admin/consult/presentationWrite" class="btn btn-primary">설명회 등록</a>
                                </div>
							</div>
						</div>
					</div>
					<!-- /tile body -->

				</section>
				<!-- /tile -->

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
</body>
</html>
<script type="text/javascript">
	$(function(){
		$.datepicker.setDefaults({
			dateFormat: 'yy-mm-dd',
			prevText: '이전 달',
			nextText: '다음 달',
			monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
			monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
			dayNames: ['일', '월', '화', '수', '목', '금', '토'],
			dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
			dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
			showMonthAfterYear: true,
			yearSuffix: '년',
			color: "black",
			zindex: "20000"
		});
		$(".datepicker").datepicker();
		console.log("ASDFASDFASDF");
		$(document).on("click", "#writeMsg", function(){
			$('#wform')[0].reset();
			$("#modalMessage").modal("show");
		});

		
	});
</script>
