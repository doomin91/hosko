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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>등급관리</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">회원관리</a></li>
				<li class="active">등급관리</li>
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
										<th class="sort">등급명</th>
										<th class="sort">등급레벨</th>
										<th class="sort">등급할인액</th>
										<th class="sort">회원보기</th>
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
										<td><?php echo $lt->LEVEL_NAME; ?></td>
										<td><?php echo $lt->LEVEL_RANK; ?></td>
										<td><?php echo $lt->LEVEL_DISCOUNT . $lt->LEVEL_DISCOUNT_UNIT; ?></td>
										<td><a href="/admin/user?user_level=<?php echo $lt->LEVEL_SEQ; ?>" type="button" class="btn btn-default btn-xs">회원보기</a></td>
										<td>
											<button type="button" class="btn btn-default btn-xs levelModify" data-key="<?php echo $lt->LEVEL_SEQ; ?>">수정</button>
											<button type="button" class="btn btn-danger btn-xs levelDelete" data-key="<?php echo $lt->LEVEL_SEQ; ?>">삭제</button>
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
								<a href="#modalAddLevel" role="button" class="btn btn-primary btn-sm" data-toggle="modal">등록하기</a>
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
	<div class="modal fade" id="modalAddLevel" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
					<h4 class="modal-title" id="modalConfirmLabel">등급추가</h4>
				</div>
				<div class="modal-body">
					<form name="saveForm" role="form">
					<input type="hidden" name="level_seq">
					<table class="table table-customdataTable ">
						<colgroup>
							<col width="30%"/>
							<col width="70%"/>
						</colgroup>
						<tbody>
							<tr>
								<th>등급명</th>
								<td><input type="text" class="form-control" id="level_name" name="level_name"></td>
							</tr>
							<tr>
								<th>등급명</th>
								<td>
									<select name="level_rank" id="level_rank">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</td>
							</tr>
							<tr>
								<th>할인타입</th>
								<td>
									<input type="radio" name="level_discount_unit" value="원" checked><label>원</label> (구매시 X원 할인 혜택을 드립니다.)<br>
									<input type="radio" name="level_discount_unit" value="%"><label>퍼센트</label> (구매시 X% 할인 혜택을 드립니다.)
								</td>
							</tr>
							<tr>
								<th>할인액</th>
								<td><input type="text" class="form-control" id="level_discount" name="level_discount"></td>
							</tr>
						</tbody>
					</table>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
					<button id="saveLevel" class="btn btn-green">저장하기</button>
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
		$(document).on("click", ".levelDelete", function(){
			var level_seq = $(this).data("key");

			if (confirm("회원등급을 삭제하시겠습니까?")){
				$.ajax({
					url:"/admin/user/LevelDeleteProc",
					type:"post",
					data:{
						"level_seq" : level_seq,
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

		$(document).on("click", "#saveLevel", function(){
			var level_name = $("input[name=level_name]").val();
			var level_rank = $("select[name=level_rank]").val();
			var level_discount = $("input[name=level_discount]").val();
			var level_discount_unit = $("input:radio[name=level_discount_unit]").val();
			var level_seq = $("input[name=level_seq]").val();

			$.ajax({
				url:"/admin/user/LevelSaveProc",
				type:"post",
				data:{
					"level_name" : level_name,
					"level_rank" : level_rank,
					"level_discount" : level_discount,
					"level_discount_unit" : level_discount_unit,
					"level_seq" : level_seq
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
		});

		$(document).on("click", ".levelModify", function(){
			var level_seq = $(this).data("key");

			$.ajax({
				url:"/admin/user/getlevelInho",
				type:"post",
				data:{
					"level_seq" : level_seq,
				},
				dataType:"json",
				success:function(resultMsg){
					if (resultMsg.code == "200"){
						console.log(resultMsg.result);
						var rs = resultMsg.result;
						$("input[name=level_name]").val(rs.LEVEL_NAME);
						$("input[name=level_discount]").val(rs.LEVEL_DISCOUNT);
						$("select[name=level_rank]").val(rs.LEVEL_RANK);
						$("input[name=level_seq]").val(rs.LEVEL_SEQ);
						$.each($("input:radio[name=level_discount_unit]"), function(){
							if ($(this).val() == rs.LEVEL_DISCOUNT_UNIT){
								$(this).prop("checked", true);
							}else{
								$(this).prop("checked", false);
							}
						})

						$("#modalAddLevel").modal("show");
					}else{
						alert(resultMsg.msg);
					}
				},
				error:function(e){
					console.log(e);
				}
			})
		});
	});
</script>
