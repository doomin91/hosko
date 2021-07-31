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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>Q&A 게시판</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">상담관리</a></li>
				<li class="active">Q&A 게시판</li>
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
									<col width="15%"/>
									<col width="15%"/>
									<col width="45%"/>
									<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">이름</th>
									<th class="text-center">이메일</th>
									<th class="text-center">제목</th>
									<th class="text-center">등록일</th>
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)){
								foreach ($lists as $lt){
									$replyStr = "";
									for ($i=0; $i<$lt->QNA_DEPTH; $i++){
										$replyStr .= "<i class=\"fa fa-arrow-right\"></i>&nbsp;";
									}
						?>
								<tr>
									<td align="center"><?php echo $pagenum; ?></td>
									<td align="center"><?php echo $lt->QNA_USER_NAME; ?></td>
									<td align="center"><?php echo $lt->QNA_USER_EMAIL; ?></td>
									<td><?php echo $replyStr; ?><a href="/admin/consult/qnaView/<?php echo $lt->QNA_SEQ; ?>"><?php echo $lt->QNA_SUBJECT; ?></a></td>
									<td align="center"><?php echo $lt->QNA_REG_DATE; ?></td>
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
								<div class="col-md-12 text-center sm-center">
									<div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
										<?php  echo $pagination; ?>
									</div>
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

		$(document).on("click", "#saveMessage", function(){
			var manager_name = $("input[name=manager_name]").val();
			var user_seq = $("input[name=user_seq]").val();
			var user_name = $("input[name=user_name]").val();
			var user_company = $("input[name=user_company]").val();
			var call_message = $("textarea[name=call_message]").val();
			var consult_date = $("input[name=consult_date]").val();
			var interest = $("select[name=interest]").val();
			var lang_skill = $("select[name=lang_skill]").val();
			var clog_seq = $("input[name=clog_seq]").val();
			var clog_mode = $("input[name=clog_mode]").val();

			$.ajax({
				url:"/admin/user/userCallMsgProc",
				type:"post",
				data:{
					"manager_name" : manager_name,
					"user_seq" : user_seq,
					"user_name" : user_name,
					"user_company" : user_company,
					"call_message" : call_message,
					//"consult_date" : consult_year + "-" + numLneCheck(consult_month) + "-" + numLneCheck(consult_day),
					"consult_date" : consult_date,
					"interest" : interest,
					"lang_skill" : lang_skill,
					"clog_seq" : clog_seq,
					"clog_mode" : clog_mode
				},
				dataType:"json",
				success:function(resultMsg){
					console.log(resultMsg);

					if (resultMsg.code == "200"){
						alert(resultMsg.msg);
						document.location.reload();
					}else{
						alert(resultMsg.msg);
					}
				},
				error:function(e){
					console.log(e.responseText);
				}
			})
		});

		$(document).on("click", ".clogView", function(){
			var seq = $(this).data("seq");

			$.ajax({
				url:"/admin/user/getCallMsg",
				type:"post",
				data:{
					"clog_seq" : seq
				},
				dataType:"json",
				success:function(resultMsg){
					console.log(resultMsg);
					if (resultMsg.code == "200"){
						//alert(resultMsg.msg);
						//document.location.reload();
						var result = resultMsg.result;

						$("input[name=manager_name]").val(result.CLOG_MANAGER_NAME);
						$("input[name=user_name]").val(result.CLOG_USER_NAME);
						$("input[name=user_company]").val(result.CLOG_USER_COMPANY);
						$("input[name=consult_date]").val(result.CLOG_CONSULT_DATE);
						$("textarea[name=call_message]").val(result.CLOG_MESSAGE);
						$("select[name=interest]").val(result.CLOG_INTEREST);
						$("select[name=lang_skill]").val(result.CLOG_LANG_SKILL);
						$("input[name=clog_seq]").val(result.CLOG_SEQ);
						$("input[name=clog_mode]").val("modify");
						$("#modalMessage").modal("show");
					}else{
						alert(resultMsg.msg);
					}
				},
				error:function(e){
					console.log(e.responseText);
				}
			})
		})

		$(document).on("click", ".ocDel", function(){
			 var seq = $(this).data("seq");

			if (confirm("상담내역을 삭제하시겠습니까?")){
				$.ajax({
					url:"/admin/consult/onlineconsultDel",
					type:"post",
					data:{
						"clog_seq" : seq
					},
					dataType:"json",
					success:function(resultMsg){
						console.log(resultMsg);
						if (resultMsg.code == "200"){
							alert(resultMsg.msg);
							document.location.reload();
						}else{
							alert(resultMsg.msg);
						}
					},
					error:function(e){
						console.log(e.responseText);
					}
				})
			}
		});

		function numLneCheck(num){
			if (parseInt(num) < 10){
				num = "0"+num;
			}

			return num;
		}
	});
</script>
