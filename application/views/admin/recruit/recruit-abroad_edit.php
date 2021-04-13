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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>유학상세보기</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">유학목록</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>기본정보</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">컨텐츠분류</th>
                                        <td class="col-sm-3"><?php echo $ABROAD_INFO->REC_CONTENTS_CATEGORY?>&nbsp<?php echo $ABROAD_INFO->REC_CONTENTS_SUB1_CATEGORY?>&nbsp<?php echo $ABROAD_INFO->REC_CONTENTS_SUB2_CATEGORY?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">컨텐츠명</th>
                                        <td class="col-sm-10"><?php echo  $ABROAD_INFO->REC_TITLE?></td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">마감</th>
                                        <td class="col-sm-10"><?php echo  $ABROAD_INFO->REC_STATUS == 0 ? print_r("마감") : print_r("모집중") ?></td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">모집수</th>
                                        <td class="col-sm-10"><?php echo  $ABROAD_INFO->REC_COUNT?></td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">담당</th>
                                        <td class="col-sm-10"><?php echo  $ABROAD_INFO->ADMIN_USER_NAME?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>컨텐츠정보</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
                                    <tr>
										<th class="col-sm-3" rowspan="12">컨텐츠 정보</th>
                                        <td class="col-sm-1">국가/도시</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_COUNTRY ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">유학분류</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_TYPE ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">기간</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_PERIOD_START." ~ ".$ABROAD_INFO->REC_PERIOD_END ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">채용분야</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_CATEGORY ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">채용마감</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_DEADLINE ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">면접방식</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_INTERVIEW_TYPE ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">면접일자</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_INTERVIEW_DATE ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">자격요건</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_CONDITION ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">급여</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_CONDITION ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">숙소</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_LODGIN ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">복지</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_WELFARE ?></td>
									</tr>
									<tr>
                                        <td class="col-sm-1">비자</td>
                                        <td class="col-sm-8"><?php echo $ABROAD_INFO->REC_VISA ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>컨텐츠설명</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">원본 이미지</th>
                                        <td class="col-sm-10"><?php echo $ABROAD_INFO->REC_THUMBNAIL?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
                        <!-- tile header -->
                        <div class="header-text">
                            <p class="apply_detail_view"><strong>컨텐츠설명</strong></p>
                        </div>
                        <!-- tile body -->
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-12 text-center">상세설명</th>
									</tr>
                                    <tr>
                                        <td class="col-sm-12 text-center"><?php echo $ABROAD_INFO->REC_CONTENTS?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row">
                <div class="col-md-4 text-left">
                    <input type="button" id="apply_view_print" class="btn btn-default" value="인쇄하기">
                </div>
                <div class="col-md-8 text-right">
                    <a href ="/admin/recruit/recruit_abroad_list" class="btn btn-default">목록</a>
                </div>
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
            $("#apply_view_print").on("click", function(){
                alert("인쇄하기");
            })

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

        });
    </script>
    <style>
        .applyTopViewTable{
            height: 90px;
        }
        .apply_status_option{
            border-radius:5px; 
            margin-right: 5px;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }
        
    </style>
</body>
</html>