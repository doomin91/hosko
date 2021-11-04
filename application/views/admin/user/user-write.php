<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>
<script src="/ckeditor/ckeditor.js"></script>
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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>회원정보 수정 </b></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="index.html">회원관리</a></li>
				<li class="active">회원정보 수정하기</li>
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
						<form name="editForm" id="editForm" enctype="multipart/form-data">
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="15%"/>
								<col width="35%"/>
								<col width="15%"/>
								<col width="35%"/>
							</colgroup>
							<tbody>
								<tr>
									<th>아이디</th>
									<td><input type="text" class="" name="user_id" value=""></td>
									<th>비밀번호</th>
									<td><input type="password" class="" name="user_pass" value=""></td>
								</tr>
								<tr>
									<th>이름</th>
									<td><input type="text" class="" name="user_name" value=""></td>
									<th>영문명</th>
									<td><input type="text" class="" name="user_eng_name" value=""></td>
								</tr>
								<tr>
									<th>회원등급</th>
									<td>
										<select name="user_lavel" class="">
											<option value="">회원등급</option>
											<option value="6">탈퇴회원</option>
											<option value="8">파기회원</option>
											<option value="7">환불회원</option>
											<option value="9">일반회원</option>
											<option value="2">합격회원</option>
											<option value="3">특별회원</option>
											<option value="4">응시회원</option>
											<option value="10">관심회원</option>
											<option value="5">정회원</option>
										</select>
									</td>
									<th>성별</th>
									<td>
										<input type="radio" name="user_sex" value="M" checked><label> 남</label>
										<input type="radio" name="user_sex" value="F"><label> 여</label>
									</td>
								</tr>
								<tr>
									<th>회원사진</th>
									<td colspan="3">
										<input type="file" class="" name="user_profile" id="user_profile">
									</td>
								</tr>
								<tr>
									<th>전화번호</th>
									<td>
										<input type="text" name="tel1" value="">
										-
										<input type="text" name="tel2" value="">
										-
										<input type="text" name="tel3" value="">
									</td>
									<th>휴대폰</th>
									<td>
										<input type="text" name="hp1" value="">
										-
										<input type="text" name="hp2" value="">
										-
										<input type="text" name="hp3" value="">
									</td>
								</tr>
								<tr>
									<th>주소</th>
									<td colspan="3">
										<input type="text" name="zipcode" id="zipcode" value=""><button class="btn btn-default btn-sm" type="button" id="searchZip">우편번호 검색</button><br>
										<input type="text" name="addr1" id="addr1" size="150" value=""><br>
										<input type="text" name="addr2" id="addr2" size="150" value="">
									</td>
								</tr>
								<tr>
									<th>이메일</th>
									<td><input type="text" name="user_email" value="" size="50"></td>
									<th>Skype ID</th>
									<td><input type="text" name="user_skype_id" value="" size="50"></td>
								</tr>
								<tr>
									<th>이메일 수신</th>
									<td>
										<input type="radio" name="user_email_flag" value="Y"><label> 예</label>
										<input type="radio" name="user_email_flag" value="N" checked><label> 아니오</label>
									</td>
									<th>SMS 수신</th>
									<td>
										<input type="radio" name="user_sms_flag" value="Y"><label> 예</label>
										<input type="radio" name="user_sms_flag" value="N" checked><label> 아니오</label>
									</td>
								</tr>
								<tr>
									<th>생년월일</th>
									<td colspan="3"><input type="text" name="user_birthday" value="" class="datepicker"></td>
								</tr>
								<tr>
									<th>학교명/직장명</th>
									<td colspan="3"><input type="text" name="user_company" value=""></td>
								</tr>
								<tr>
									<th>학과</th>
									<td>
										<select name="user_department">
											<option value="">학과선택</option>
											<option value="1">호텔/관광</option>
											<option value="3">조리</option>
											<option value="4">기타/외국어</option>
										</select>
									<th>전공/부서</th>
									<td><input type="text" name="user_major" value=""></td>
								</tr>
								<tr>
									<th>희망국가</th>
									<td>
										<select name="user_hope_nation">
											<option value="">선택</option>
											<option value="1">미국</option>
											<option value="2">괌</option>
											<option value="3">일본</option>
											<option value="9">싱가포르</option>
											<option value="5">중국</option>
											<option value="4">호주</option>
											<option value="6">유럽</option>
											<option value="7">중동</option>
											<option value="8">기타</option>
										</select>
									</td>
									<th>지원부서</th>
									<td><input type="text" name="user_hope_part" value=""></td>
								</tr>
								<tr>
									<th>회화능력</th>
									<td colspan="3">
										<span class="langLabel">영어</span>
										<input type="radio" name="user_skill_eng" value="5"><label>&nbsp;5점</label>
										<input type="radio" name="user_skill_eng" value="4"><label>&nbsp;4점</label>
										<input type="radio" name="user_skill_eng" value="3"><label>&nbsp;3점</label>
										<input type="radio" name="user_skill_eng" value="2"><label>&nbsp;2점</label>
										<input type="radio" name="user_skill_eng" value="1" checked><label>&nbsp;1점</label><br>
										<span class="langLabel">일본어</span>
										<input type="radio" name="user_skill_jp" value="5"><label>&nbsp;5점</label>
										<input type="radio" name="user_skill_jp" value="4"><label>&nbsp;4점</label>
										<input type="radio" name="user_skill_jp" value="3"><label>&nbsp;3점</label>
										<input type="radio" name="user_skill_jp" value="2"><label>&nbsp;2점</label>
										<input type="radio" name="user_skill_jp" value="1" checked><label>&nbsp;1점</label><br>
										<span class="langLabel">중국어</span>
										<input type="radio" name="user_skill_ch" value="5"><label>&nbsp;5점</label>
										<input type="radio" name="user_skill_ch" value="4"><label>&nbsp;4점</label>
										<input type="radio" name="user_skill_ch" value="3"><label>&nbsp;3점</label>
										<input type="radio" name="user_skill_ch" value="2"><label>&nbsp;2점</label>
										<input type="radio" name="user_skill_ch" value="1" checked><label>&nbsp;1점</label>
									</td>
								</tr>
								<tr>
									<th>해외연수경험 - 국가</th>
									<td>
										<select name="user_study_nation">
											<option value="">선택</option>
											<option value="1">미국</option>
											<option value="2">괌</option>
											<option value="3">일본</option>
											<option value="4">호주</option>
											<option value="5">아시아</option>
											<option value="6">유럽</option>
											<option value="7">서남아시아</option>
											<option value="8">기타</option>
										</select>
									</td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_study_term" name="0" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_study_term" name="1"><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_study_term" name="2"><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_study_term" name="3"><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>해외어학연수경험 - 국가</th>
									<td>
										<select name="user_lan_study_nation">
											<option value="">국가</option>
											<option value="1">미국</option>
											<option value="2">괌</option>
											<option value="3">일본</option>
											<option value="4">호주</option>
											<option value="5">아시아</option>
											<option value="6">유럽</option>
											<option value="7">서남아시아</option>
											<option value="8">기타</option>
										</select>
									</td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_lan_study_term" name="0" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_lan_study_term" name="1"><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_lan_study_term" name="2"><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_lan_study_term" name="3"><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>국내외 근무경력1 회사명</th>
									<td><input type="text" name="user_work_company" value=""></td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_work_term" value="0" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_work_term" value="1"><label>&nbsp;3개월 미만</label>
										<input type="radio" name="user_work_term" value="2"><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_work_term" value="3"><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_work_term" value="4"><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>국내외 근무경력2 회사명</th>
									<td><input type="text" name="user_work_company_2" value=""></td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_work_term_2" value="0" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_work_term_2" value="1"><label>&nbsp;3개월 미만</label>
										<input type="radio" name="user_work_term_2" value="2"><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_work_term_2" value="3"><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_work_term_2" value="4"><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>국내외 근무경력3 회사명</th>
									<td><input type="text" name="user_work_company3" value=""></td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_work_term_3" value="0" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_work_term_3" value="1"><label>&nbsp;3개월 미만</label>
										<input type="radio" name="user_work_term_3" value="2"><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_work_term_3" value="3"><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_work_term_3" value="4"><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>자격증</th>
									<td colspan="3">
										<input type="radio" name="user_certi_flag" value="N" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_certi_flag" value="Y"><label>&nbsp;있음</label>
										<input type="text" name="user_certificate_name" value="">
									</td>
								</tr>
								<tr>
									<th>여권 소지여부</th>
									<td>
										<input type="radio" name="user_passport_flag" value="N" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_passport_flag" value="Y"><label>&nbsp;있음</label>
									</td>
									<th>워킹홀리데이 비자 소지 여부</th>
									<td>
										<input type="radio" name="user_visa_flag" value="N" checked><label>&nbsp;없음</label>
										<input type="radio" name="user_visa_flag" value="Y"><label>&nbsp;있음</label>
									</td>
								</tr>
								<tr>
									<th>이력서 등록</th>
									<td colspan="3">
										<input type="file" name="user_profile_doc" id="user_profile_doc">
									</td>
								</tr>
								<tr>
									<th>추천경로</th>
									<td colspan="3">
										<!--
										<input type="checkbox" name="user_join_route" value="1"><label>&nbsp;신문광고</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="2"><label>&nbsp;SNS매체</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="3"><label>&nbsp;온라인검색</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="4"><label>&nbsp;학교설명회/박람회</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="5"><label>&nbsp;광고홍보물</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="6"><label>&nbsp;친구/친척소개</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="7"><label>&nbsp;교수님/선배소개</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="8"><label>&nbsp;업체소개</label>&nbsp;
										-->
										<input type="checkbox" name="user_join_route" value="4"><label>&nbsp;학교 취업처</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="7"><label>&nbsp;교수님</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="10"><label>&nbsp;학과 공지 혹은 학과 게시판</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="6"><label>&nbsp;친구, 동기, 선후배등 지인</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="3"><label>&nbsp;온라인 검색</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="11"><label>&nbsp;네이버 카페</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="12"><label>&nbsp;네이버 블로그</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="2"><label>&nbsp;페이스북/인스타그램</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="5"><label>&nbsp;홍보 이메일</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="9"><label>&nbsp;기타</label>&nbsp;
										<input type="text" name="user_join_route_str">
									</td>
								</tr>
								<tr>
									<th>출국국가</th>
									<td>
										<select name="user_leave_country">
											<option value="">출국국가</option>
											<option value="미국">미국</option>
											<option value="괌">괌</option>
											<option value="일본">일본</option>
											<option value="싱가포르">싱가포르</option>
											<option value="중국">중국</option>
											<option value="호주">호주</option>
											<option value="유럽">유럽</option>
											<option value="중동">중동</option>
											<option value="기타">기타</option>
										</select>
									</td>
									<th>출국호텔</th>
									<td>
										<input type="text" name="user_leave_hotel" value="">
									</td>
								</tr>
								<tr>
									<th>담당자</th>
									<td>
										<input type="text" name="user_manager_name" value="">
									</td>
									<th>추천인</th>
									<td>
										<input type="text" name="user_recomm_id" value="">
									</td>
								</tr>
								<tr>
									<th>관리자 메모</th>
									<td colspan="3">
										<textarea name="user_memo"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
						</form>

						<div class="row form-footer">
							<div class="col-sm-offset-2 col-sm-10 text-right">

								<button id="cancelBtn" data-seq="" class="btn btn-danger btn-sm">취소하기</button>
								<button id="saveBtn" data-seq="" class="btn btn-primary btn-sm">등록하기</button>

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

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
	<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" alt="닫기 버튼">
</div>
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

	$(document).on("click", "#saveBtn", function(){
		//var formData = $("#editForm").serialize();

		if ($("input[name=user_id]").val() == ""){
			alert("아이디를 입력하세요");
			$("input[name=user_id]").focus();
			return false;
		}

		if ($("input[name=user_pass]").val() == ""){
			alert("비밀번호를 입력하세요");
			$("input[name=user_pass]").focus();
			return false;
		}

		if ($("input[name=user_name]").val() == ""){
			alert("이름을 입력하세요");
			$("input[name=user_name]").focus();
			return false;
		}

		var formData = new FormData();
		formData.append("user_id", $("input[name=user_id]").val());
		formData.append("user_pass", $("input[name=user_pass]").val());
		formData.append("user_name", $("input[name=user_name]").val());
		formData.append("user_eng_name", $("input[name=user_eng_name]").val());
		formData.append("user_level", $("select[name=user_level]").val());
		formData.append("user_sex", $("input:radio[name=user_sex]").val());
		formData.append("user_tel", $("input[name=tel1]").val()+"-"+$("input[name=tel2]").val()+"-"+$("input[name=tel3]").val());
		formData.append("user_hp", $("input[name=hp1]").val()+"-"+$("input[name=hp2]").val()+"-"+$("input[name=hp3]").val());
		formData.append("user_zipcode", $("input[name=zipcode]").val());
		formData.append("user_addr1", $("input[name=addr1]").val());
		formData.append("user_addr2", $("input[name=addr2]").val());
		formData.append("user_email", $("input[name=user_email]").val());
		formData.append("user_skype_id", $("input[name=user_skype_id]").val());
		formData.append("user_email_flag", $("input:radio[name=user_email_flag]").val());
		formData.append("user_sms_flag", $("input:radio[name=user_sms_flag]").val());
		formData.append("user_birthday", $("input[name=user_birthday]").val());
		formData.append("user_company", $("input[name=user_company]").val());
		formData.append("user_department", $("select[name=user_department]").val());
		formData.append("user_major", $("input[name=user_major]").val());
		formData.append("user_hope_nation", $("select[name=user_hope_nation]").val());
		formData.append("user_hope_part", $("input[name=user_hope_part]").val());
		formData.append("user_skill_eng", $("input:radio[name=user_skill_eng]").val());
		formData.append("user_skill_jp", $("input:radio[name=user_skill_jp]").val());
		formData.append("user_skill_ch", $("input:radio[name=user_skill_ch]").val());
		formData.append("user_study_nation", $("select[name=user_study_nation]").val());
		formData.append("user_study_term", $("input:radio[name=user_study_term]").val());
		formData.append("user_lan_study_nation", $("select[name=user_lan_study_nation]").val());
		formData.append("user_lan_study_term", $("input:radio[name=user_lan_study_term]").val());
		formData.append("user_work_company", $("input[name=user_work_company]").val());
		formData.append("user_work_term", $("input:radio[name=user_work_term]").val());
		formData.append("user_work_company_2", $("input[name=user_work_company_2]").val());
		formData.append("user_work_term_2", $("input:radio[name=user_work_term_2]").val());
		formData.append("user_work_company_3", $("input[name=user_work_company_3]").val());
		formData.append("user_work_term_3", $("input:radio[name=user_work_term_3]").val());
		formData.append("user_certi_flag", $("input:radio[name=user_certi_flag]").val());
		formData.append("user_certificate_name", $("input[name=user_certificate_name]").val());
		formData.append("user_passport_flag", $("input:radio[name=user_passport_flag]").val());
		formData.append("user_visa_flag", $("input:radio[name=user_visa_flag]").val());
		formData.append("user_join_route", $("input:checkbox[name=user_join_route]").val());
		formData.append("user_join_route_str", $("input[name=user_join_route_str]").val());
		formData.append("user_leave_country", $("select[name=user_leave_country]").val());
		formData.append("user_leave_hotel", $("input[name=user_leave_hotel]").val());
		formData.append("user_manager_name", $("input[name=user_manager_name]").val());
		formData.append("user_recomm_id", $("input[name=user_recomm_id]").val());
		formData.append("user_memo", $("textarea[name=user_memo]").val());

		formData.append("user_profile", $("#user_profile").prop('files')[0]);
		formData.append("user_profile_doc", $("input[name=user_profile_doc]").prop('files')[0]);

		console.log(formData);

		$.ajax({
			url:"/admin/User/userWriteProc",
			type:"post",
			dataType:"json",
			data : formData,
			contentType: false,
			processData: false,
			success:function(data){
				console.log(data);
				if (data.code == "200"){
					alert(data.msg);
					//$("#modalDomain").modal("hide");
					document.location.href="/admin/user";
				}else{
					alert(data.msg);
				}
			}, error:function(e){
				console.log(e);
			}
		})
	});


	$(document).on("click", "#searchZip", function(){
		sample2_execDaumPostcode();
	});

	$(document).on("click", "#btnCloseLayer", function(){
		console.log("asdfasdfsadf");
		closeDaumPostcode();
	});

	// 우편번호 찾기 화면을 넣을 element
	var element_layer = document.getElementById('layer');

	function closeDaumPostcode() {
		// iframe을 넣은 element를 안보이게 한다.
		element_layer.style.display = 'none';
	}

	function sample2_execDaumPostcode() {
		var addr = ''; // 주소 변수
		var extraAddr = ''; // 참고항목 변수

		new daum.Postcode({
			oncomplete: function(data) {
				// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

				// 각 주소의 노출 규칙에 따라 주소를 조합한다.
				// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.


				//사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
				if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
					addr = data.roadAddress;
				} else { // 사용자가 지번 주소를 선택했을 경우(J)
					addr = data.jibunAddress;
				}

				// 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
				if(data.userSelectedType === 'R'){
					// 법정동명이 있을 경우 추가한다. (법정리는 제외)
					// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
					if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
						extraAddr += data.bname;
					}
					// 건물명이 있고, 공동주택일 경우 추가한다.
					if(data.buildingName !== '' && data.apartment === 'Y'){
						extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
					}
					// 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
					if(extraAddr !== ''){
						extraAddr = ' (' + extraAddr + ')';
					}
					// 조합된 참고항목을 해당 필드에 넣는다.
					//document.getElementById("sample2_extraAddress").value = extraAddr;

				} else {
					//document.getElementById("sample2_extraAddress").value = '';
				}

				// 우편번호와 주소 정보를 해당 필드에 넣는다.
				document.getElementById('zipcode').value = data.zonecode;
				document.getElementById("addr1").value = addr+extraAddr;
				// 커서를 상세주소 필드로 이동한다.
				document.getElementById("addr2").focus();

				// iframe을 넣은 element를 안보이게 한다.
				// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
				element_layer.style.display = 'none';
			},
			width : '100%',
			height : '100%',
			maxSuggestItems : 5
		}).embed(element_layer);

		// iframe을 넣은 element를 보이게 한다.
		element_layer.style.display = 'block';

		// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
		initLayerPosition();
	}

	// 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
	// resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
	// 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
	function initLayerPosition(){
		var width = 500; //우편번호서비스가 들어갈 element의 width
		var height = 400; //우편번호서비스가 들어갈 element의 height
		var borderWidth = 2; //샘플에서 사용하는 border의 두께

		// 위에서 선언한 값들을 실제 element에 넣는다.
		element_layer.style.width = width + 'px';
		element_layer.style.height = height + 'px';
		element_layer.style.border = borderWidth + 'px solid';
		// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
		element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
		element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
	}
});
</script>
