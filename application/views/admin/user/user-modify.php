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
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="15%"/>
								<col width="35%"/>
								<col width="15%"/>
								<col width="35%"/>
							</colgroup>
							<tbody>
								<tr>
									<th>가입일</th>
									<td><?php echo $info->USER_REG_DATE; ?></td>
									<th>마지막 로그인</th>
									<td><?php echo $info->USER_LAST_LOGIN; ?></td>
								</tr>
								<tr>
									<th>아이디</th>
									<td><?php echo $info->USER_ID; ?></td>
									<th>이름</th>
									<td><?php echo $info->USER_NAME; ?></td>
								</tr>
								<tr>
									<th>로그인 횟수</th>
									<td><?php echo $info->USER_LOGIN_CNT; ?></td>
									<th>회원등급</th>
									<td>
										<select name="" class="">
											<option value="">회원등급</option>
											<option value="6" <?php if ($info->USER_LEVEL == "6") echo "selected"; ?>>탈퇴회원</option>
											<option value="8" <?php if ($info->USER_LEVEL == "8") echo "selected"; ?>>파기회원</option>
											<option value="7" <?php if ($info->USER_LEVEL == "7") echo "selected"; ?>>환불회원</option>
											<option value="9" <?php if ($info->USER_LEVEL == "9") echo "selected"; ?>>일반회원</option>
											<option value="2" <?php if ($info->USER_LEVEL == "2") echo "selected"; ?>>합격회원</option>
											<option value="3" <?php if ($info->USER_LEVEL == "3") echo "selected"; ?>>특별회원</option>
											<option value="4" <?php if ($info->USER_LEVEL == "4") echo "selected"; ?>>응시회원</option>
											<option value="10" <?php if ($info->USER_LEVEL == "10") echo "selected"; ?>>관심회원</option>
											<option value="5" <?php if ($info->USER_LEVEL == "5") echo "selected"; ?>>정회원</option>
										</select>
									</td>
								</tr>
								<tr>
									<th>영문명</th>
									<td><input type="text" class="" name="user_eng_name" value="<?php echo $info->USER_ENG_NAME; ?>"></td>
									<th>성별</th>
									<td>
										<input type="radio" name="user_sex" value="M" <?php if ($info->USER_SEX == "M") echo "checked"; ?>><label> 남</label>
										<input type="radio" name="user_sex" value="F" <?php if ($info->USER_SEX == "F") echo "checked"; ?>><label> 여</label>
									</td>
								</tr>
								<tr>
									<th>회원사진</th>
									<td colspan="3">
										<input type="file" class="" name="user_profile">
									</td>
								</tr>
								<tr>
									<th>전화번호</th>
									<td>
										<?php
											$user_tel = explode("-", $info->USER_TEL);
										?>
										<input type="text" name="tel1" value="<?php echo isset($user_tel[0]) ? $user_tel[0] : ""; ?>">
										-
										<input type="text" name="tel2" value="<?php echo isset($user_tel[1]) ? $user_tel[1] : ""; ?>">
										-
										<input type="text" name="tel3" value="<?php echo isset($user_tel[2]) ? $user_tel[2] : ""; ?>">
									</td>
									<th>휴대폰</th>
									<td>
										<?php
											$user_hp = explode("-", $info->USER_HP);
										?>
										<input type="text" name="hp1" value="<?php echo isset($user_hp[0]) ? $user_hp[0] : ""; ?>">
										-
										<input type="text" name="hp2" value="<?php echo isset($user_hp[1]) ? $user_hp[1] : ""; ?>">
										-
										<input type="text" name="hp3" value="<?php echo isset($user_hp[2]) ? $user_hp[2] : ""; ?>">
									</td>
								</tr>
								<tr>
									<th>주소</th>
									<td colspan="3">
										<input type="text" name="zipcoide" value="<?php echo $info->USER_ZIPCODE; ?>"><button class="btn btn-default btn-sm">우편번호 검색</button><br>
										<input type="text" name="addr1" size="150" value="<?php echo $info->USER_ADDR1; ?>"><br>
										<input type="text" name="addr2" size="150" value="<?php echo $info->USER_ADDR2; ?>">
									</td>
								</tr>
								<tr>
									<th>이메일</th>
									<td><input type="text" name="user_email" value="<?php echo $info->USER_EMAIL; ?>"></td>
									<th>Skype ID</th>
									<td><input type="text" name="user_skype_id" value="<?php echo $info->USER_SKYPE_ID; ?>"></td>
								</tr>
								<tr>
									<th>이메일 수신</th>
									<td>
										<input type="radio" name="user_email_flag" value="Y" <?php if ($info->USER_EMAIL_FLAG == "Y") echo "checked"; ?>><label> 예</label>
										<input type="radio" name="user_email_flag" value="N" <?php if ($info->USER_EMAIL_FLAG == "N") echo "checked"; ?>><label> 아니오</label>
									</td>
									<th>SMS 수신</th>
									<td>
										<input type="radio" name="user_sms_flag" value="Y" <?php if ($info->USER_SMS_FLAG == "Y") echo "checked"; ?>><label> 예</label>
										<input type="radio" name="user_sms_flag" value="N" <?php if ($info->USER_SMS_FLAG == "N") echo "checked"; ?>><label> 아니오</label>
									</td>
								</tr>
								<tr>
									<th>생년월일</th>
									<td colspan="3"><input type="text" name="user_birthday" value="<?php echo $info->USER_BIRTHDAY; ?>"></td>
								</tr>
								<tr>
									<th>학교명/직장명</th>
									<td colspan="3"><input type="text" name="user_company" value="<?php echo $info->USER_COMPANY; ?>"></td>
								</tr>
								<tr>
									<th>학과</th>
									<td>
										<select name="user_department">
											<option value="">학과선택</option>
											<option value="1" <?php if ($info->USER_DEPARTMENT == "1") echo "selected"; ?>>호텔/관광</option>
											<option value="3" <?php if ($info->USER_DEPARTMENT == "3") echo "selected"; ?>>조리</option>
											<option value="4" <?php if ($info->USER_DEPARTMENT == "4") echo "selected"; ?>>기타/외국어</option>
										</select>
									<th>전공/부서</th>
									<td><input type="text" name="user_major" value="<?php echo $info->USER_MAJOR; ?>"></td>
								</tr>
								<tr>
									<th>희망국가</th>
									<td>
										<select name="user_hope_nation">
											<option value="">선택</option>
											<option value="1" <?php if ($info->USER_HOPE_NATION == "1") echo "selected"; ?>>미국</option>
											<option value="2" <?php if ($info->USER_HOPE_NATION == "2") echo "selected"; ?>>괌</option>
											<option value="3" <?php if ($info->USER_HOPE_NATION == "3") echo "selected"; ?>>일본</option>
											<option value="9" <?php if ($info->USER_HOPE_NATION == "9") echo "selected"; ?>>싱가포르</option>
											<option value="5" <?php if ($info->USER_HOPE_NATION == "5") echo "selected"; ?>>중국</option>
											<option value="4" <?php if ($info->USER_HOPE_NATION == "4") echo "selected"; ?>>호주</option>
											<option value="6" <?php if ($info->USER_HOPE_NATION == "6") echo "selected"; ?>>유럽</option>
											<option value="7" <?php if ($info->USER_HOPE_NATION == "7") echo "selected"; ?>>중동</option>
											<option value="8" <?php if ($info->USER_HOPE_NATION == "8") echo "selected"; ?>>기타</option>
										</select>
									</td>
									<th>지원부서</th>
									<td><input type="text" name="user_hope_part" value="<?php echo $info->USER_HOPE_PART; ?>"></td>
								</tr>
								<tr>
									<th>회화능력</th>
									<td colspan="3">
										<span class="langLabel">영어</span>
										<input type="radio" name="user_skill_eng" value="5" <?php if ($info->USER_SKILL_ENG == "5") echo "checked"; ?>><label>&nbsp;5점</label>
										<input type="radio" name="user_skill_eng" value="4" <?php if ($info->USER_SKILL_ENG == "4") echo "checked"; ?>><label>&nbsp;4점</label>
										<input type="radio" name="user_skill_eng" value="3" <?php if ($info->USER_SKILL_ENG == "3") echo "checked"; ?>><label>&nbsp;3점</label>
										<input type="radio" name="user_skill_eng" value="2" <?php if ($info->USER_SKILL_ENG == "2") echo "checked"; ?>><label>&nbsp;2점</label>
										<input type="radio" name="user_skill_eng" value="1" <?php if ($info->USER_SKILL_ENG == "1") echo "checked"; ?>><label>&nbsp;1점</label><br>
										<span class="langLabel">일본어</span>
										<input type="radio" name="user_skill_jp" value="5" <?php if ($info->USER_SKILL_JP == "5") echo "checked"; ?>><label>&nbsp;5점</label>
										<input type="radio" name="user_skill_jp" value="4" <?php if ($info->USER_SKILL_JP == "4") echo "checked"; ?>><label>&nbsp;4점</label>
										<input type="radio" name="user_skill_jp" value="3" <?php if ($info->USER_SKILL_JP == "3") echo "checked"; ?>><label>&nbsp;3점</label>
										<input type="radio" name="user_skill_jp" value="2" <?php if ($info->USER_SKILL_JP == "2") echo "checked"; ?>><label>&nbsp;2점</label>
										<input type="radio" name="user_skill_jp" value="1" <?php if ($info->USER_SKILL_JP == "1") echo "checked"; ?>><label>&nbsp;1점</label><br>
										<span class="langLabel">중국어</span>
										<input type="radio" name="user_skill_ch" value="5" <?php if ($info->USER_SKILL_CH == "5") echo "checked"; ?>><label>&nbsp;5점</label>
										<input type="radio" name="user_skill_ch" value="4" <?php if ($info->USER_SKILL_CH == "4") echo "checked"; ?>><label>&nbsp;4점</label>
										<input type="radio" name="user_skill_ch" value="3" <?php if ($info->USER_SKILL_CH == "3") echo "checked"; ?>><label>&nbsp;3점</label>
										<input type="radio" name="user_skill_ch" value="2" <?php if ($info->USER_SKILL_CH == "2") echo "checked"; ?>><label>&nbsp;2점</label>
										<input type="radio" name="user_skill_ch" value="1" <?php if ($info->USER_SKILL_CH == "1") echo "checked"; ?>><label>&nbsp;1점</label>
									</td>
								</tr>
								<tr>
									<th>해외연수경험 - 국가</th>
									<td>
										<select name="user_study_nation">
											<option value="">선택</option>
											<option value="1" <?php if ($info->USER_STUDY_NATION == "1") echo "selected"; ?>>미국</option>
											<option value="2" <?php if ($info->USER_STUDY_NATION == "2") echo "selected"; ?>>괌</option>
											<option value="3" <?php if ($info->USER_STUDY_NATION == "3") echo "selected"; ?>>일본</option>
											<option value="4" <?php if ($info->USER_STUDY_NATION == "4") echo "selected"; ?>>호주</option>
											<option value="5" <?php if ($info->USER_STUDY_NATION == "5") echo "selected"; ?>>아시아</option>
											<option value="6" <?php if ($info->USER_STUDY_NATION == "6") echo "selected"; ?>>유럽</option>
											<option value="7" <?php if ($info->USER_STUDY_NATION == "7") echo "selected"; ?>>서남아시아</option>
											<option value="8" <?php if ($info->USER_STUDY_NATION == "8") echo "selected"; ?>>기타</option>
										</select>
									</td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_study_term" name="0" <?php if ($info->USER_STUDY_TERM == "0") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_study_term" name="1" <?php if ($info->USER_STUDY_TERM == "1") echo "checked"; ?>><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_study_term" name="2" <?php if ($info->USER_STUDY_TERM == "2") echo "checked"; ?>><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_study_term" name="3" <?php if ($info->USER_STUDY_TERM == "3") echo "checked"; ?>><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>해외어학연수경험 - 국가</th>
									<td>
										<select name="user_lan_study_nation">
											<option value="">국가</option>
											<option value="1" <?php if ($info->USER_LAN_STUDY_NATION == "1") echo "selected"; ?>>미국</option>
											<option value="2" <?php if ($info->USER_LAN_STUDY_NATION == "2") echo "selected"; ?>>괌</option>
											<option value="3" <?php if ($info->USER_LAN_STUDY_NATION == "3") echo "selected"; ?>>일본</option>
											<option value="4" <?php if ($info->USER_LAN_STUDY_NATION == "4") echo "selected"; ?>>호주</option>
											<option value="5" <?php if ($info->USER_LAN_STUDY_NATION == "5") echo "selected"; ?>>아시아</option>
											<option value="6" <?php if ($info->USER_LAN_STUDY_NATION == "6") echo "selected"; ?>>유럽</option>
											<option value="7" <?php if ($info->USER_LAN_STUDY_NATION == "7") echo "selected"; ?>>서남아시아</option>
											<option value="8" <?php if ($info->USER_LAN_STUDY_NATION == "8") echo "selected"; ?>>기타</option>
										</select>
									</td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_lan_study_term" name="0" <?php if ($info->USER_LAN_STUDY_TERM == "0") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_lan_study_term" name="1" <?php if ($info->USER_LAN_STUDY_TERM == "1") echo "checked"; ?>><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_lan_study_term" name="2" <?php if ($info->USER_LAN_STUDY_TERM == "2") echo "checked"; ?>><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_lan_study_term" name="3" <?php if ($info->USER_LAN_STUDY_TERM == "3") echo "checked"; ?>><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>국내외 근무경력1 회사명</th>
									<td><input type="text" name="user_work_company" value="<?php echo $info->USER_WORK_COMPANY; ?>"></td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_work_term" value="0" <?php if ($info->USER_WORK_TERM == "0") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_work_term" value="1" <?php if ($info->USER_WORK_TERM == "1") echo "checked"; ?>><label>&nbsp;3개월 미만</label>
										<input type="radio" name="user_work_term" value="2" <?php if ($info->USER_WORK_TERM == "2") echo "checked"; ?>><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_work_term" value="3" <?php if ($info->USER_WORK_TERM == "3") echo "checked"; ?>><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_work_term" value="4" <?php if ($info->USER_WORK_TERM == "4") echo "checked"; ?>><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>국내외 근무경력2 회사명</th>
									<td><input type="text" name="user_work_company2" value="<?php echo $info->USER_WORK_COMPANY_2; ?>"></td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_work_term2" value="0" <?php if ($info->USER_WORK_TERM_2 == "0") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_work_term2" value="1" <?php if ($info->USER_WORK_TERM_2 == "1") echo "checked"; ?>><label>&nbsp;3개월 미만</label>
										<input type="radio" name="user_work_term2" value="2" <?php if ($info->USER_WORK_TERM_2 == "2") echo "checked"; ?>><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_work_term2" value="3" <?php if ($info->USER_WORK_TERM_2 == "3") echo "checked"; ?>><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_work_term2" value="4" <?php if ($info->USER_WORK_TERM_2 == "4") echo "checked"; ?>><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>국내외 근무경력3 회사명</th>
									<td><input type="text" name="user_work_company3" value="<?php echo $info->USER_WORK_COMPANY_3; ?>"></td>
									<th>기간</th>
									<td>
										<input type="radio" name="user_work_term3" value="0" <?php if ($info->USER_WORK_TERM_3 == "0") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_work_term3" value="1" <?php if ($info->USER_WORK_TERM_3 == "1") echo "checked"; ?>><label>&nbsp;3개월 미만</label>
										<input type="radio" name="user_work_term3" value="2" <?php if ($info->USER_WORK_TERM_3 == "2") echo "checked"; ?>><label>&nbsp;6개월 미만</label>
										<input type="radio" name="user_work_term3" value="3" <?php if ($info->USER_WORK_TERM_3 == "3") echo "checked"; ?>><label>&nbsp;12개월 미만</label>
										<input type="radio" name="user_work_term3" value="4" <?php if ($info->USER_WORK_TERM_3 == "4") echo "checked"; ?>><label>&nbsp;12개월 이상</label>
									</td>
								</tr>
								<tr>
									<th>자격증</th>
									<td colspan="3">
										<input type="radio" name="user_certi_flag" value="N" <?php if ($info->USER_CERTI_FLAG == "N") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_certi_flag" value="Y" <?php if ($info->USER_CERTI_FLAG == "Y") echo "checked"; ?>><label>&nbsp;있음</label>
										<input type="text" name="user_ certificate_name" value="<?php echo $info->USER_CERTIFICATE_NAME; ?>">
									</td>
								</tr>
								<tr>
									<th>여권 소지여부</th>
									<td>
										<input type="radio" name="user_passport_flag" value="N" <?php if ($info->USER_PASSPORT_FLAG == "N") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_passport_flag" value="Y" <?php if ($info->USER_PASSPORT_FLAG == "N") echo "checked"; ?>><label>&nbsp;있음</label>
									</td>
									<th>워킹홀리데이 비자 소지 여부</th>
									<td>
										<input type="radio" name="user_visa_flag" value="N" <?php if ($info->USER_VISA_FLAG == "N") echo "checked"; ?>><label>&nbsp;없음</label>
										<input type="radio" name="user_visa_flag" value="Y" <?php if ($info->USER_VISA_FLAG == "Y") echo "checked"; ?>><label>&nbsp;있음</label>
									</td>
								</tr>
								<tr>
									<th>이력서 등록</th>
									<td colspan="3">
										<input type="file" name="user_profile_doc">
									</td>
								</tr>
								<tr>
									<th>추천경로</th>
									<td colspan="3">
										<input type="checkbox" name="user_join_route" value="1"><label>&nbsp;신문광고</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="2"><label>&nbsp;SNS매체</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="3"><label>&nbsp;온라인검색</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="4"><label>&nbsp;학교설명회/박람회</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="5"><label>&nbsp;광고홍보물</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="6"><label>&nbsp;친구/친척소개</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="7"><label>&nbsp;교수님/선배소개</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="8"><label>&nbsp;업체소개</label>&nbsp;
										<input type="checkbox" name="user_join_route" value="9"><label>&nbsp;기타</label>&nbsp;
										<input type="text" name="user_join_route_str">
									</td>
								</tr>
								<tr>
									<th>출국국가</th>
									<td>
										<select name="user_leave_country">
											<option value="">출국국가</option>
											<option value="미국" <?php if ($info->USER_LEAVE_COUNTRY == "미국") echo "selected"; ?>>미국</option>
											<option value="괌" <?php if ($info->USER_LEAVE_COUNTRY == "괌") echo "selected"; ?>>괌</option>
											<option value="일본" <?php if ($info->USER_LEAVE_COUNTRY == "일본") echo "selected"; ?>>일본</option>
											<option value="싱가포르" <?php if ($info->USER_LEAVE_COUNTRY == "싱가포르") echo "selected"; ?>>싱가포르</option>
											<option value="중국" <?php if ($info->USER_LEAVE_COUNTRY == "중국") echo "selected"; ?>>중국</option>
											<option value="호주" <?php if ($info->USER_LEAVE_COUNTRY == "호주") echo "selected"; ?>>호주</option>
											<option value="유럽" <?php if ($info->USER_LEAVE_COUNTRY == "유럽") echo "selected"; ?>>유럽</option>
											<option value="중동" <?php if ($info->USER_LEAVE_COUNTRY == "중동") echo "selected"; ?>>중동</option>
											<option value="기타" <?php if ($info->USER_LEAVE_COUNTRY == "기타") echo "selected"; ?>>기타</option>
										</select>
									</td>
									<th>출국호텔</th>
									<td>
										<input type="text" name="user_leave_hotel" value="<?php echo $info->USER_LEAVE_HOTEL; ?>">
									</td>
								</tr>
								<tr>
									<th>담당자</th>
									<td>
										<input type="text" name="user_manager_name" value="<?php echo $info->USER_MANAGER_NAME; ?>">
									</td>
									<th>추천인</th>
									<td>
										<input type="text" name="user_recomm_id" value="<?php echo $info->USER_RECOMM_ID; ?>">
									</td>
								</tr>
								<tr>
									<th>관리자 메모</th>
									<td colspan="3">
										<textarea name="user_memo"><?php echo $info->USER_MEMO; ?></textarea>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="row form-footer">
							<div class="col-sm-offset-2 col-sm-10 text-right">
								<a href="#" class="btn btn-default btn-sm">수정하기</a>
								<button id="notice_del" data-seq="" class="btn btn-default btn-sm">삭제하기</button>
								<a href="/admin/user" class="btn btn-primary btn-sm">목록가기</a>

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

