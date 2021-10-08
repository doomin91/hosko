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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>회원목록</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">회원관리</a></li>
				<li class="active">회원목록</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">
				<div class="col-md-12">
                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                      <table class="table table-custom datatable userTable">
								<colgroup>
									<col width="15%"/>
									<col width="35%"/>
									<col width="15%"/>
									<col width="35%"/>
								</colgroup>
								<tbody>
								<form name="sform" method="get">
									<tr>
										<th>가입일자</th>
										<td>
											<div class="col-md-5">
												<input name="reg_date_start" type="text" class="wid100p datepicker">
											</div>
											<div class="col-md-5">
												<input name="reg_date_end" type="text" class="wid100p datepicker">
											</div>
										</td>
										<th>로그인 일자</th>
										<td>
											<div class="col-md-5">
												<input name="last_login_start" type="text" class="wid100p datepicker">
											</div>
											<div class="col-md-5">
												<input name="last_login_end" type="text" class="wid100p datepicker">
											</div>
										</td>
									</tr>
									<tr>
										<th>회화능력</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_skill_eng" class="wid100p">
													<option value="">::영어::</option>
													<option value="1">1점</option>
													<option value="2">2점</option>
													<option value="3">3점</option>
													<option value="4">4점</option>
													<option value="5">5점</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_skill_jp" class="wid100p">
													<option value="">::일본어::</option>
													<option value="1">1점</option>
													<option value="2">2점</option>
													<option value="3">3점</option>
													<option value="4">4점</option>
													<option value="5">5점</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name=user_skill_ch" class="wid100p">
													<option value="">::중국::</option>
													<option value="1">1점</option>
													<option value="2">2점</option>
													<option value="3">3점</option>
													<option value="4">4점</option>
													<option value="5">5점</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>해외연수경험</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_study_nation" class="wid100p">
													<option value="">::국가::</option>
													<option value="1">미국</option>
													<option value="2">괌</option>
													<option value="3">일본</option>
													<option value="4">호주</option>
													<option value="5">아시아</option>
													<option value="6">유럽</option>
													<option value="7">서남아시아</option>
													<option value="8">기타</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_study_term" class="wid100p">
													<option value="">::기간::</option>
													<option value="0">없음</option>
													<option value="1">6개월 미만</option>
													<option value="2">12개월 미만</option>
													<option value="3">12개월 이상</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>해외어학연수경험</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_lan_study_nation" class="wid100p">
													<option value="">::국가::</option>
													<option value="1">미국</option>
													<option value="2">괌</option>
													<option value="3">일본</option>
													<option value="4">호주</option>
													<option value="5">아시아</option>
													<option value="6">유럽</option>
													<option value="7">서남아시아</option>
													<option value="8">기타</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_lan_study_term" class="wid100p">
													<option value="">::기간::</option>
													<option value="0">없음</option>
													<option value="1">6개월 미만</option>
													<option value="2">12개월 미만</option>
													<option value="3">12개월 이상</option>
												</select>
											</div>
										</td>
									</tr>
									<!--
									<tr>
										<th>국내외 근무경력</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="wid100p">
													<option value="">::근무기간1::</option>
													<option value="0">없음</option>
													<option value="1">3개월 미만</option>
													<option value="2">6개월 미만</option>
													<option value="3">12개월 미만</option>
													<option value="4">12개월 이상</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="wid100p">
													<option value="">::근무기간2::</option>
													<option value="0">없음</option>
													<option value="1">3개월 미만</option>
													<option value="2">6개월 미만</option>
													<option value="3">12개월 미만</option>
													<option value="4">12개월 이상</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="wid100p">
													<option value="">::근무기간3::</option>
													<option value="0">없음</option>
													<option value="1">3개월 미만</option>
													<option value="2">6개월 미만</option>
													<option value="3">12개월 미만</option>
													<option value="4">12개월 이상</option>
												</select>
											</div>
										</td>
									</tr>
									-->
									<tr>
										<th>회원등급</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_level" class="wid100p">
													<option value="">선택해주세요</option>
												<?php
													foreach ($levels as $lev) {
														if ($lev->LEVEL_SEQ == $user_level){
															echo "<option value=\"".$lev->LEVEL_SEQ."\" selected>".$lev->LEVEL_NAME."</option>";
														}else{
															echo "<option value=\"".$lev->LEVEL_SEQ."\">".$lev->LEVEL_NAME."</option>";
														}

													}
												?>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>단어검색</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="search_field" class="wid100p">
													<option value="all">전체</option>
													<option value="USER_ID">아이디</option>
													<option value="USER_NAME">이름</option>
													<option value="USER_NUMBER">회원번호</option>
													<option value="USER_HP">연락처</option>
													<option value="USER_EMAIL">이메일주소</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="text" name="search_string" class="wid100p" placeholder="검색어를 입력해주세요">
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="4" class="text-right">
											<button class="btn btn-primary">검색하기</button>
										</td>
									</tr>
								</form>
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


				<section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                    <div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
                      <table class="table datatable table-custom01 userTable">

							<colgroup>
									<col width="5%"/>
									<col width="10%"/>
									<col width="8%"/>
									<col width="5%"/>
									<col width="8%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="5%"/>
									<col width="5%"/>
									<col width="5%"/>
									<col width="5%"/>
									<col width="5%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">아이디</th>
									<th class="text-center">이름</th>
									<th class="text-center">회원번호</th>
									<th class="text-center">담당자</th>
									<th class="text-center">출국국가</th>
									<th class="text-center">출국호텔</th>
									<th class="text-center">연락처</th>
									<th class="text-center">학교/직창</th>
									<th class="text-center">등급</th>
									<th class="text-center">가입일</th>
									<th class="text-center">방문일</th>
									<th class="text-center">방문수</th>
									<th class="text-center"> - </th>
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)) :
								foreach ($lists as $list) :
									if ($list->USER_LEVEL == "2"){
										$user_level = "합격회원";
									}else if ($list->USER_LEVEL == "3"){
										$user_level = "특별회원";
									}else if ($list->USER_LEVEL == "4"){
										$user_level = "응시회원";
									}else if ($list->USER_LEVEL == "5"){
										$user_level = "정회원";
									}else if ($list->USER_LEVEL == "6"){
										$user_level = "탈퇴회원";
									}else if ($list->USER_LEVEL == "7"){
										$user_level = "환불회원";
									}else if ($list->USER_LEVEL == "8"){
										$user_level = "파기회원";
									}else if ($list->USER_LEVEL == "9"){
										$user_level = "일반회원";
									}else if ($list->USER_LEVEL == "10"){
										$user_level = "관심회원";
									}else{
										$user_level = "";
									}
						?>
								<tr>
									<td class="text-center"><?php echo $pagenum; ?></td>
									<td class="text-center"><a href="/admin/user/userCallMsg/<?php echo $list->USER_SEQ; ?>"><?php echo $list->USER_ID; ?></a></td>
									<td class="text-center"><?php echo $list->USER_NAME; ?></td>
									<td class="text-center"><?php echo $list->USER_NUMBER; ?></td>
									<td class="text-center"><?php echo $list->USER_MANAGER_NAME; ?></td>
									<td class="text-center"><?php echo $list->USER_LEAVE_COUNTRY; ?></td>
									<td class="text-center"><?php echo $list->USER_LEAVE_HOTEL; ?></td>
									<td class="text-center"><?php echo $list->USER_HP; ?></td>
									<td class="text-center"><?php echo $list->USER_COMPANY; ?></td>
									<td class="text-center"><?php echo $user_level; ?></td>
									<td class="text-center"><?php echo $list->USER_REG_DATE; ?></td>
									<td class="text-center"><?php echo $list->USER_LAST_LOGIN; ?></td>
									<td class="text-center"><?php echo $list->USER_LOGIN_CNT; ?></td>
									<td class="text-center">
										<a href="/admin/user/userModify/<?php echo $list->USER_SEQ; ?>" class="btn btn-default btn-xs">수정</a>
									</td>
								</tr>
						<?php
								$pagenum--;
								endforeach;
							else :
								echo "<tr><td colspan=\"14\" class=\"text-center\"> * 회원이 없습니다. </td></td>";
							endif;
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
								<div class="col-md-4 text-right">
									<a href="/admin/user/userWrite" type="button" class="btn btn-primary "> 회원 등록하기</a>
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
	        color: "black"
	    });
		$(".datepicker").datepicker();
	});
</script>
