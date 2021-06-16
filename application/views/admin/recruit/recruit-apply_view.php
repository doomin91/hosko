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
                                        <td class="col-sm-10">
                                            <div class="col-sm-3">
                                            <input type="text" class="form-control common_select wid100p" name="apply_price" id="apply_price" value="<?php echo $APPLY_INFO->APP_PRICE?>">
                                            </div>
                                            <div class="col-sm-2 common_input" style="line-height:3; margin-left:-20px;">
                                            원
                                            </div>
                                            
                                        </td>
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
                                                <option value="0" <?php if($APPLY_INFO->REC_STATUS==1) echo "selected"?>>온라인상담</option>
                                                <option value="1" <?php if($APPLY_INFO->REC_STATUS==2) echo "selected"?>>지원</option>
                                                <option value="2" <?php if($APPLY_INFO->REC_STATUS==3) echo "selected"?>>지원서류제출</option>
                                                <option value="3" <?php if($APPLY_INFO->REC_STATUS==4) echo "selected"?>>비용입금</option>
                                                <option value="4" <?php if($APPLY_INFO->REC_STATUS==5) echo "selected"?>>서류전형</option>
                                                <option value="5" <?php if($APPLY_INFO->REC_STATUS==6) echo "selected"?>>인터뷰준비</option>
                                                <option value="6" <?php if($APPLY_INFO->REC_STATUS==7) echo "selected"?>>인터뷰</option>
                                                <option value="7" <?php if($APPLY_INFO->REC_STATUS==8) echo "selected"?>>합격공지</option>
                                                <option value="8" <?php if($APPLY_INFO->REC_STATUS==9) echo "selected"?>>출국준비</option>
                                                <option value="9" <?php if($APPLY_INFO->REC_STATUS==10) echo "selected"?>>소양교육</option>
                                                <option value="10" <?php if($APPLY_INFO->REC_STATUS==11) echo "selected"?>>출국</option>
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
                                        <td class="col-sm-10">
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control common_select wid100p" name="apply_uni" id="apply_uni" value="<?php echo  $APPLY_INFO->APP_UNIVERSITY?>">
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Major</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control common_select wid100p" name="apply_major" id="apply_major" value="<?php echo  $APPLY_INFO->APP_MAJOR?>">
                                            </div>
                                            <div class="col-sm-1">
                                                <input type="text" class="form-control common_select wid100p" name="apply_grade" id="apply_grade" value="<?php echo  $APPLY_INFO->APP_GRADE?>">
                                            </div>
                                            <div class="col-sm-3">
                                                <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" <?php if($APPLY_INFO->APP_GRADE_TYPE == 1) echo "checked"?>> 재학 </label>
                                                <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2" <?php if($APPLY_INFO->APP_GRADE_TYPE == 2) echo "checked"?>> 휴학 </label>
                                                <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3" <?php if($APPLY_INFO->APP_GRADE_TYPE == 3) echo "checked"?>> 졸업 </label>
                                            </div>
                                        </td>
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
                                        
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control common_select wid100p" name="apply_department" id="apply_department" value="<?php echo  $APPLY_INFO->APP_COMP_DEPARTMENT?>">
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Date you wish to begin<br>yourdesired program</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control common_select wid100p" name="apply_start_date" id="apply_start_date" value="<?php echo  $APPLY_INFO->APP_START_DATE?>">
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">(Language Skill) English</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                English: 
                                                <label for="apply_eng_skill_1"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_1" value="1"<?php if($APPLY_INFO->APP_ENG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                <label for="apply_eng_skill_2"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_2" value="2" <?php if($APPLY_INFO->APP_ENG_SKILL == 2) echo "checked"?>> Fair</label>
                                                <label for="apply_eng_skill_3"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_3" value="3" <?php if($APPLY_INFO->APP_ENG_SKILL == 3) echo "checked"?>> Poor</label>
                                            <br>
                                                기타외국어:
                                                <label for="apply_another_skill_1"><input type="radio" name="apply_another_skill" id="apply_another_skill_1" value="1"<?php if($APPLY_INFO->APP_ETC_LANG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                <label for="apply_another_skill_2"><input type="radio" name="apply_another_skill" id="apply_another_skill_2" value="2" <?php if($APPLY_INFO->APP_ETC_LANG_SKILL == 2) echo "checked"?>> Fair</label>
                                                <label for="apply_another_skill_3"><input type="radio" name="apply_another_skill" id="apply_another_skill_3" value="3" <?php if($APPLY_INFO->APP_ETC_LANG_SKILL == 3) echo "checked"?>> Poor</label>
                                                <input type="text" class="form-control common_select wid100p" name="apply_another_skill_name" id="apply_another_skill_name" value="<?php echo  $APPLY_INFO->APP_ETC_LANG_NAME?>">
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">TOEIC Score</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control common_select wid100p" name="apply_toeic_score" id="apply_toeic_score" value="<?php echo  $APPLY_INFO->APP_TOEIC_SCORE?>">
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">TOEFL Score</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control common_select wid100p" name="apply_toefl_score" id="apply_toefl_score" value="<?php echo  $APPLY_INFO->APP_TOEFL_SCORE?>">
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">경력사항</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <textarea class="form-control common_textarea wid100p" name="apply_career" id="apply_career"><?php echo  $APPLY_INFO->APP_CAREER?></textarea>
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">여권보유여부</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <label for="apply_passport_flag_y"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_y" value="Y" <?php if($APPLY_INFO->APP_PASSPORT_FLAG == 'Y') echo "checked"?>> YES</label>
                                                <label for="apply_passport_flag_n"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_n" value="N" <?php if($APPLY_INFO->APP_PASSPORT_FLAG == 'N') echo "checked"?>> NO</label>
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">미국비자발급거절여뷰</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <label for="apply_visa_flag_y"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_y" value="Y" <?php if($APPLY_INFO->APP_VISA_FLAG == 'Y') echo "checked"?>> YES</label>
                                                <label for="apply_visa_flag_n"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_n" value="N" <?php if($APPLY_INFO->APP_VISA_FLAG == 'N') echo "checked"?>> NO</label>
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">Self Introduction and goal<br>and motivation</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <textarea class="form-control common_textarea wid100p" name="apply_self_introduce" id="apply_self_introduce"><?php echo  $APPLY_INFO->APP_INTRODUCE?></textarea>
                                                <!-- <input type="textarea" class="form-control common_textarea wid100p" name="apply_self_introduce" id="apply_self_introduce" value="<?php echo  $APPLY_INFO->APP_INTRODUCE?>"> -->
                                            </div>
                                        </td>
									</tr>
									<tr>
                                        <th class="col-sm-2">관리자 메모</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-5">
                                                <textarea type="textarea" class="form-control common_textarea wid100p" name="apply_admin_memo" id="apply_admin_memo"><?php echo  $APPLY_INFO->APP_ADMIN_MEMO?></textarea>
                                                <!-- <input type="textarea" class="form-control common_textarea wid100p" name="apply_admin_memo" id="apply_admin_memo" value="<?php echo  $APPLY_INFO->APP_ADMIN_MEMO?>"> -->
                                            </div>
                                        </td>
									</tr>

								</tbody>
							</table>

                            
                            
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->

            <!-- row -->
            <div class="row" style="margin-bottom: 20px; ">
                <div class="col-md-4 text-left">
                    <input type="button" data-seq="<?php echo $APPLY_INFO->APP_SEQ; ?>" id="apply_view_print" class="btn btn-default" value="인쇄하기">
                </div>
                <div class="col-md-8 text-right">
                    <input type="button" class="btn btn-primary" data-seq="<?php echo $APPLY_INFO->APP_SEQ; ?>" id="apply_save" value="확인">
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
            $("#apply_save").on("click", function(){
                var APP_SEQ = $(this).data("seq");
                var APP_STATUS = $(".apply_status_option option:selected").val();
                var APP_PRICE = $("input[name=apply_price]").val();
                var APP_UNIVERSITY = $("input[name=apply_uni]").val();
                var APP_MAJOR = $("input[name=apply_major]").val();
                var APP_GRADE = $("input[name=apply_grade]").val();
                var APP_GRADE_TYPE = $("input[name=apply_uni_status]:checked").val();

                var APP_COMP_DEPARTMENT = $("input[name=apply_department]").val();
                var APP_START_DATE = $("input[name=apply_start_date]").val();

                var APP_ENG_SKILL = $("input[name=apply_eng_skill]:checked").val();
                var APP_ETC_LANG_SKILL = $("input[name=apply_another_skill]:checked").val();
                var APP_CAREER = $("#apply_career").val();

                var APP_ETC_LANG_NAME = $("input[name=apply_another_skill_name]").val();
                var APP_TOEIC_SCORE = $("input[name=apply_toeic_score]").val();
                var APP_TOEFL_SCORE = $("input[name=apply_toefl_score]").val();

                var APP_PASSPORT_FLAG = $("input[name=apply_passport_flag]:checked").val();

                var APP_VISA_FLAG = $("input[name=apply_visa_flag]:checked").val();
                var APP_INTRODUCE = $("#apply_self_introduce").val();
                var APP_ADMIN_MEMO = $("#apply_admin_memo").val();
                
                // console.log(APPLY_SEQ);
                // console.log(APP_PRICE);
                // console.log(APP_UNIVERSITY);
                // console.log(APP_MAJOR);
                // console.log(APP_GRADE);
                // console.log(APP_GRADE_TYPE);
                // console.log(APP_COMP_DEPARTMENT);
                // console.log(APP_START_DATE);
                // console.log(APP_ENG_SKILL);
                // console.log(APP_ETC_LANG_SKILL);
                // console.log(APP_ETC_LANG_NAME);
                // console.log(APP_TOEIC_SCORE);
                // console.log(APP_TOEFL_SCORE);
                // console.log(APP_PASSPORT_FLAG);
                // console.log(APP_VISA_FLAG);
                // console.log(APP_INTRODUCE);
                // console.log(APP_ADMIN_MEMO);

                if(confirm("저장하시겠습니까?")){
                    $.ajax({
                        type : "POST",
                        url : "/admin/recruit/recruit_apply_save",
                        dataType : "JSON",
                        data : {
                            "APP_SEQ" : APP_SEQ,
                            "APP_STATUS" : APP_STATUS,
                            "APP_PRICE" : APP_PRICE,
                            "APP_UNIVERSITY" : APP_UNIVERSITY,
                            "APP_MAJOR" : APP_MAJOR,
                            "APP_GRADE" : APP_GRADE,
                            "APP_GRADE_TYPE" : APP_GRADE_TYPE,
                            "APP_COMP_DEPARTMENT" : APP_COMP_DEPARTMENT,
                            "APP_START_DATE" : APP_START_DATE,
                            "APP_ENG_SKILL" : APP_ENG_SKILL,
                            "APP_ETC_LANG_SKILL" : APP_ETC_LANG_SKILL,
                            "APP_ETC_LANG_NAME" : APP_ETC_LANG_NAME,
                            "APP_CAREER" : APP_CAREER,
                            "APP_TOEIC_SCORE" : APP_TOEIC_SCORE,
                            "APP_TOEFL_SCORE" : APP_TOEFL_SCORE,
                            "APP_PASSPORT_FLAG" : APP_PASSPORT_FLAG,
                            "APP_VISA_FLAG" : APP_VISA_FLAG,
                            "APP_INTRODUCE" : APP_INTRODUCE,
                            "APP_ADMIN_MEMO" : APP_ADMIN_MEMO
                        },
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("저장되었습니다.");
                                alert("저장되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(request,status,error){
                            console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                            // alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                        }
                    });
                }
            });

            $("#apply_view_print").on("click", function(){
                var seq = $(this).data("seq");
                var url = "/admin/recruit/recruit_apply_view_print/"+seq;
                var name = "PopPrint";
                var option = "width=720,height=800,top=100,left=200,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,";

                window.open(url, name, option);
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

        .common_select, .common_input{
            min-height: 30px;
            font-size: 12px !important;
        }
        
        .common_textarea{
            min-height: 100px;
        }
        
    </style>
</body>
</html>


