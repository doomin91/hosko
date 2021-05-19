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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>회원 통화내역</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">회원관리</a></li>
				<li class="active">회원 통화내역</li>
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
                  <div class="row" style="padding:15px">
                    <div class="col-lg-12 text-right">
                        <button id="writeMsg" type="button" class="btn btn-primary btn-sm"> 기록하기</button>
                        <a href="/admin/user/userWrite" type="button" class="btn btn-info btn-sm"> 회원정보 보기</a>
                    </div>
                  </div>
                  <div class="tile-body">
                    <div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
                      <table class="table datatable table-custom01 userTable">

							<colgroup>
									<col width="5%"/>
									<col width="10%"/>
									<col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
									<col width="5%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">날짜</th>
									<th class="text-center">상담자</th>
									<th class="text-center">회원명</th>
									<th class="text-center">학교명/직장명</th>
									<th class="text-center">회원번호</th>
									<th class="text-center">관심도</th>
									<th class="text-center">외국어</th>
									<th class="text-center">비고</th>
									<th class="text-center"> - </th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            if (!empty($LISTS)){

                            }else{
                                echo "<tr><td colspan=\"10\" align=\"center\"> 회원 통화내역이 없습니다. </td></tr>";
                            }
                            ?>
							</tbody>
							</table>

							<div class="row">
								<div class="col-md-4 sm-center">
									<div class="dataTables_info">
									
									</div>
								</div>
								<div class="col-md-4 text-center sm-center">
									<div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
										<!--
										<ul class="pagination" style="margin:0 !important">
											<li class="prev disabled"><a href="#">Previous</a></li>
											<li class="active"><a href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li class="next"><a href="#">Next</a></li>
										</ul>
										-->
										<?php // echo $pagination; ?>
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
					<form role="form">
					<table class="table datatable table-custom01 userTable">
                        <colgroup>
                            <col width="30%"/>
						    <col width="70%"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>상담자</td>
                                <td><input type="text" class="form-control" id="consult_name" name="consult_name" value="<?php echo $this->session->userdata("admin_name"); ?>"></td>
                            </tr>
                            <tr>
                                <th>회원명</td>
                                <td><input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_info->USER_NAME; ?>"></td>
                            </tr>
                            <tr>
                                <th>학교명/직장명</td>
                                <td><input type="text" class="form-control" id="user_company" name="user_company" value="<?php echo $user_info->USER_COMPANY; ?>"></td>
                            </tr>
                            <tr>
                                <th>상담시각</td>
                                <td><input type="text" class="form-control" id="call_date" name="call_date"></td>
                            </tr>
                            <tr>
                                <th>내용</td>
                                <td><textarea class="form-control" id="call_message" name="call_message"></textarea></td>
                            </tr>
                            <tr>
                                <th>관심도</td>
                                <td>
                                    <select name="">
                                        <option value="1">상</option>
                                        <option value="2">중</option>
                                        <option value="3">하</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>외국어 능력</td>
                                <td>
                                    <select name="">
                                        <option value="1">1점</option>
                                        <option value="2">2점</option>
                                        <option value="3">3점</option>
                                        <option value="4">4점</option>
                                        <option value="5">5점</option>
                                    </select>
                                </td>
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
	        color: "black"
	    });
		$(".datepicker").datepicker();

        $(document).on("click", "#writeMsg", function(){
            $("#modalMessage").modal("show");
        });
	}); 
</script>
