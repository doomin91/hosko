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
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable">
								<colgroup>
									<col width="15%"/>
									<col width="35%"/>
									<col width="15%"/>
									<col width="35%"/>
								</colgroup>
								<tbody>
									<tr>
										<th>가입일자</th>
										<td>
											<div class="col-md-6">
												<input type="text" class="form-control">
											</div>
											<div class="col-md-6">
												<input type="text" class="form-control">
											</div>
										</td>
										<th>로그인 일자</th>
										<td>
											<div class="col-md-6">
												<input type="text" class="form-control">
											</div>
											<div class="col-md-6">
												<input type="text" class="form-control">
											</div>
										</td>
									</tr>
									<tr>
										<th>회화능력</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::영어::</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::일본어::</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::중국::</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>해외연수경험</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::국가::</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::기간::</option>
												</select>
											</div>

										</td>
									</tr>
									<tr>
										<th>해외어학연수경험</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::국가::</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::기간::</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>국내외 근무경력</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::근무기간1::</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::근무기간2::</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::근무기간3::</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>단어검색</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="form-control">
													<option value="">::근무기간1::</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="text" name="searchstring" class="form-control" placeholder="검색어를 입력해주세요">
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="4" class="text-right">
											<button class="btn btn-primary">검색하기</button>
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
								<div class="col-md-6"></div>
								<div class="col-md-6">
									<form name="sform" id="sform" method="get">
									<div class="dataTables_filter text-right" id="basicDataTable_filter">
										<label>
											<input type="text" name="search" id="search" aria-controls="basicDataTable" placeholder="Search" class="form-control" value="">
										</label>
									</div>
									</form>
								</div>
							</div>

							<table class="table table-custom dataTable">
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
									<td class="text-center"><a href="/admin/user/user_modify/<?php echo $list->USER_SEQ; ?>"><?php echo $list->USER_ID; ?></a></td>
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
										<a href="/admin/user/user_modify/<?php echo $list->USER_SEQ; ?>" class="btn btn-default btn-xs">수정</a>
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
									<a href="#" type="button" class="btn btn-primary "> 회원 등록하기</a>
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

