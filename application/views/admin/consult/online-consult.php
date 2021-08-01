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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>온라인 상담</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">상담관리</a></li>
				<li class="active">온라인 상담</li>
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
									<col width="5%"/>
									<col width="5%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="25%"/>
									<col width="10%"/>
									<col width="5%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">이름</th>
									<th class="text-center">아이디</th>
									<th class="text-center">연락처</th>
									<th class="text-center">핸드폰</th>
									<th class="text-center">내용</th>
									<th class="text-center">접수일</th>
									<th class="text-center">상태</th>
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)){
								foreach ($lists as $lt){
									if ($lt->OC_ANSWER_FLAG == "W"){
										$answer_flag = "답변대기";
									}else if ($lt->OC_ANSWER_FLAG == "Y"){
										$answer_flag = "답변완료";
									}
						?>
								<tr>
									<td><?php echo $pagenum; ?></td>
									<td><?php echo $lt->USER_NAME; ?></td>
									<td><?php echo $lt->USER_ID; ?></td>
									<td><?php echo $lt->USER_TEL; ?></td>
									<td><?php echo $lt->USER_HP; ?></td>
									<td><a href="/admin/consult/onlineConsultView/<?php echo $lt->OC_SEQ; ?>"><?php echo $lt->OC_SUBJECT; ?></a></td>
									<td><?php echo $answer_flag; ?></td>
									<td><?php echo substr($lt->OC_REG_DATE, 0, 10); ?></td>
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

	<!-- 모달 팝업 -->
	<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
					<h3 class="modal-title" id="modalConfirmLabel">회원 통화내역 저장</h3>
				</div>
				<div class="modal-body">
					<form role="wform" id="wform">

					<table class="table datatable table-custom01 userTable">
						<colgroup>
							<col width="15%"/>
							<col width="35%"/>
							<col width="15%"/>
							<col width="35%"/>
						</colgroup>
						<tbody>
							<tr>
								<th>상담자</td>
								<td></td>
								<th>아이디</td>
								<td></td>
							</tr>
							<tr>
								<th>연락처</td>
								<td></td>
								<th>핸드폰</td>
								<td></td>
							</tr>
							<tr>
								<th>접수일</td>
								<td></td>
								<th>상태</td>
								<td></td>
							</tr>
							<tr>
								<th>상담내용</td>
								<td colspan="3"></td>
							</tr>
							<tr>
								<th>답변</td>
								<td colspan="3"></td>
							</tr>
						</tbody>
					</table>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
					<button id="saveMessage" class="btn btn-green">저장하기</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

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

		$(document).on("click", ".clogDel", function(){
			 var seq = $(this).data("seq");

			if (confirm("통화내역을 삭제하시겠습니까?")){
				$.ajax({
					url:"/admin/user/deleteCallMsg",
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
