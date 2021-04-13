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
				<div class="col-md-6">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">지원프로그램</th>
                                        <td class="col-sm-10"><?php echo $APPLY_INFO->REC_TITLE?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">가격</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->REC_PAY?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
                <div class="col-md-6">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">지원일자</th>
                                        <td class="col-sm-10"><?php echo $APPLY_INFO->APP_REG_DATE?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">상태</th>
                                        <td class="col-sm-10">
                                            <select class="apply_status_option">
                                                <option <?php if($APPLY_INFO->REC_STATUS==1) echo "selected"?>>온라인상담</option>
                                                <option <?php if($APPLY_INFO->REC_STATUS==2) echo "selected"?>>지원</option>
                                                <option <?php if($APPLY_INFO->REC_STATUS==3) echo "selected"?>>지원서류제출</option>
                                                <option <?php if($APPLY_INFO->REC_STATUS==4) echo "selected"?>>비용입금</option>
                                            </select>
                                        </td>
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
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">이름(아이디)</th>
                                        <td class="col-sm-10"><?php echo $APPLY_INFO->USER_NAME."(".$APPLY_INFO->USER_ID.")"?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">주민번호</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_BIRTHDAY?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">전화번호</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_TEL?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">핸드폰번호</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_HP?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">이메일</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_EMAIL?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">주소</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_ADDR1." ".$APPLY_INFO->USER_ADDR1?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">사진</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_PROFILE_IMG?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">University</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_UNIVERSITY?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Major</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_MAJOR?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">졸업년도</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_GRADE_YEAR?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">회사명</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_COMP_NAME?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">재직기간</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_WORK_START_YEAR.".".$APPLY_INFO->APP_WORK_START_MONTH." ~ ".$APPLY_INFO->APP_WORK_END_YEAR.".".$APPLY_INFO->APP_WORK_END_MONTH ?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">부서명</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_COMP_DEPARTMENT?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Date you wish to begin<br>yourdesired program</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_START_DATE?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">(Language Skill) English</th>
                                        <td class="col-sm-10">
                                        <?php 
                                            if($APPLY_INFO->APP_ENG_SKILL == 1){
                                                echo "상";
                                            }else if($APPLY_INFO->APP_ENG_SKILL == 2){
                                                echo "중";
                                            }else{
                                                echo "하";
                                            }
                                        ?>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">TOEIC Score</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_TOEIC_SCORE?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">TOEFL Score</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_TOEFL_SCORE?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">경력사항</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_CAREER?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">여권보유여부</th>
                                        <td class="col-sm-10"><?php ($APPLY_INFO->APP_PASSPORT_FLAG == 'Y') ? print_r("YES") : print_r("NO") ?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">미국비자발급거절여뷰</th>
                                        <td class="col-sm-10"><?php $APPLY_INFO->APP_VISA_FLAG == 'Y' ? print_r("YES") : print_r("NO")  ?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Self Introduction and goal<br>and motivation</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_INTRODUCE?></td>
									</tr>
									<tr>
                                        <th class="col-sm-2">관리자 메모</th>
                                        <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_ADMIN_MEMO?></td>
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
                    <a href ="/admin/recruit" class="btn btn-default">목록</a>
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


