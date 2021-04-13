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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>수속신청현황</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">수속신청현황</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTable">
								<tbody>
									<tr>
										<th class="col-sm-2">진행상태</th>
										<td class="col-sm-10">
                                            <span class="status_condition active">전체</span>
                                            <span class="status_condition">온라인상담</span>
                                            <span class="status_condition">지원</span>
                                            <span class="status_condition">지원서류제출</span>
                                            <span class="status_condition">비용입금</span>
                                            <span class="status_condition">서류전형</span>
                                            <span class="status_condition">인터뷰준비</span>
                                            <span class="status_condition">인터뷰</span>
                                            <span class="status_condition">합격공지</span>
                                            <span class="status_condition">출국준비</span>
                                            <span class="status_condition">소양교육</span>
                                            <span class="status_condition">출국</span>
                                        </td>
									</tr>
									<tr>
										<th class="col-sm-2">기간</th>
										<td class="col-sm-10">
                                            <input type="text" id="apply_start_date" name="apply_start_date" class="date_field" value="">
                                            ~
                                            <input type="text" id="apply_end_date" name="apply_end_date" class="date_field" value="">
                                                
                                            <span class="date_condition today">오늘</span>
                                            <span class="date_condition yesterday">어제</span>
                                            <span class="date_condition week">1주일</span>
                                            <span class="date_condition month">1개월</span>
                                            <span id="test" class="test">1개월테스트</span>
										</td>
									</tr>
									<tr>
                                        <th class="col-sm-2">조건검색</th>
										<td class="col-sm-10">
                                            <select class="apply_search_option">
                                                <option>글자1</option>
                                                <option>글자2</option>
                                                <option>글자3</option>
                                                <option>글자4</option>
                                            </select>
                                            <input type="text" id="apply_search_text" name="apply_search_text" placeholder="검색어를 입력해주세요" value="">

                                            <input type="button" class="btn btn-success" id="apply_search" value="검색"></input>
                                            
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>

			<!-- row -->
			<div class="row">

				<!-- col 6 -->
				<div class="col-md-12">
				<!-- tile -->
				<section class="tile transparent">

					<!-- tile body -->
					<div class="tile-body color transparent-black rounded-corners">

						<div class="table-responsive dataTables_wrapper form-inline" role="grid" id="basicDataTable_wrapper">
							<div class="row">
								<div class="col-md-10">총 주문수 : 100 &nbsp&nbsp&nbsp 검색 주문수 : 100</div>
                                <div class="col-md-2 text-right">
									<input type="button" id="apply_excel_save" class="btn btn-default" value="+ 엑셀파일저장">
								</div>
							</div>

							<table class="table table-custom dataTable">
							<colgroup>
									<col width="5%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="20%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="15%"/>
									<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox"></th>
									<th class="text-center">성명</th>
									<th class="text-center">아이디</th>
									<th class="text-center">지원프로그램</th>
									<th class="text-center">금액</th>
									<th class="text-center">지원일</th>
									<th class="text-center">상태</th>
									<th class="text-center">기능</th>
									
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)) :
								foreach ($lists as $list) :
									
						?>
								<tr>
									<td class="text-center"><input type="checkbox" value=<?php echo $list->APP_SEQ?>></td>
									<td class="text-center"><?php echo $list->USER_NAME ?></td>
                                    <td class="text-center"><?php echo $list->USER_NAME ?></td>
                                    <td class="text-center"><?php echo $list->REC_TITLE ?></td>
                                    <td class="text-center"><?php echo "1000000원" ?></td>
                                    <td class="text-center"><?php echo $list->APP_REG_DATE ?></td>
                                    <td class="text-center">
										<select class="apply_search_option">
											<option>온라인상담</option>
											<option>지원</option>
											<option>지원서류제출</option>
											<option>비용입금</option>
										</select>

										<input type="button" class="btn btn-success" id="apply_status_save" value="적용"></input>
									</td>
                                    <td class="text-center"><input type="button" data-app_seq="<?php echo $list->APP_SEQ?>" value="상세보기"></td>
								</tr>
						<?php
								$pagenum--;
								endforeach;
							else :
								echo "<tr><td colspan=\"14\" class=\"text-center\"> * 신청서가 없습니다. </td></td>";
							endif;
						?>
							</tbody>
							</table>

							<div class="row">
                                <div class="col-md-4 text-left">
                                    <input type="button" id="selected_apply_del" class="btn btn-default" value="- 선택삭제">
                                    <input type="button" id="selected_apply_save" class="btn btn-default" value="+ 선택일괄적용">
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
										<?php echo $pagination; ?>
									</div>
								</div>
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

    <script>
        $(function(){

            $('#apply_start_date').datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                closeText:'취소',
                //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
                showButtonPanel:true,
                beforeShow: function(input) {
                    var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                    setTimeout(function(){
                        $('#ui-datepicker-div').css({'top':i_offset.top, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                    })
                },
                onClose: function( selectedDate ) {    
                    // 시작일(fromDate) datepicker가 닫힐때
                    // 종료일(toDate)의 선택할수있는 최소 날짜(minDate)를 선택한 시작일로 지정
                    $("#p_end_date").datepicker( "option", "minDate", selectedDate );
                }                
            });

            //종료일
            $('#apply_end_date').datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                closeText:'취소',
                //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
                showButtonPanel:true,
                beforeShow: function(input) {
                    var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                    setTimeout(function(){
                        $('#ui-datepicker-div').css({'top':i_offset.top, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                    })
                },
                onClose: function( selectedDate ) {
                    // 종료일(toDate) datepicker가 닫힐때
                    // 시작일(fromDate)의 선택할수있는 최대 날짜(maxDate)를 선택한 종료일로 지정 
                    $("#p_start_date").datepicker( "option", "maxDate", selectedDate );
                }                
            });

            $(".applyTable").on("click", ".status_condition", function(){
                var row = $(this).closest("td");
                console.log(row);

                $(row).find(".status_condition.active").removeClass("active");

                $(this).addClass("active");
            });

            $("#test").on("click", function(){
                alert("test");
            });

            $(".test").on("click", function(){
                alert("test");
            });

            $(".applyTable").on("click", ".date_condition", function(){
                // var row = $(this).closest("td");
                console.log("test");

                // $(row).find(".status_condition.active").removeClass("active");

                // $(this).addClass("active");
            });

            $("#apply_search_text").on("keypress", function(e){
                var key = e.which;
                
                if (key == 13){
                    $("#apply_search").click();
                }
            });

            $("#apply_search").on("click", function(){
                var row = $(this).closest("td");
                var input = $(row).find("#apply_search_text").val();

                if(input == ""){
                    alert("검색어를 입력해주세요");
                }
            });

            $("#apply_excel_save").on("click", function(){
                alert("엑셀 따운");
            });

        });
    </script>
    <style>
        .ui-datepicker-month, .ui-datepicker-year{
            color: black;
        }
        .ui-state-default {
            color: black !important;
        }

        .applyTable .date_field{
            border-radius:5px; 
            margin-left: 5px;
            margin-right: 5px;
            padding: 8px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

        .apply_search_option{
            border-radius:5px; 
            margin-right: 5px;
            width: 15%;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

        #apply_search_text{
            border-radius:5px; 
            margin-right: 5px;
            width: 20%;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

        #apply_search{
            padding: 4px 10px;
        }

        .applyTable .status_condition, .date_condition{
            margin-right:3px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 2px 6px;
            box-sizing: border-box;
            background: grey;
            cursor: pointer;
        }

        .applyTable .status_condition.active{
            background: rgb(60,180,180);
        }

        #apply_excel_save, #selected_apply_del, #selected_apply_save{
            font-size: 10px;
            padding: 5px 10px;
        }

        
    </style>
</body>
</html>


