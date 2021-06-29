<?php
	include_once dirname(__DIR__)."/admin-header.php";
?>

<style>


</style>

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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b><?php echo $BOARD_INFO->BOARD_KOR_NAME;?></b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">게시판관리</a></li>
				<li class="active"><?php echo $BOARD_INFO->BOARD_KOR_NAME;?></li>
			  </ol>
			</div>

		  </div>
		  <div class="main">
		  <div class="row">
				<div class="col-md-12">
                <!-- tile -->
                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                      <table class="table table-custom datatable userTable">
						<form method="get" role="form"> 
								<colgroup>
									<col width="15%"/>
									<col width="35%"/>
									<col width="15%"/>
									<col width="35%"/>
								</colgroup>
								<tbody>
									<tr>
										<th>등록일자</th>
										<td colspan="3">
											<div class="col-md-5">
												<input name="regDateStart" type="text" class="wid100p datepicker" value="<?php echo $startDate?>">
											</div>
											<div class="col-md-5">
												<input name="regDateEnd" type="text" class="wid100p datepicker" value="<?php echo $endDate?>">
											</div>
										</td>
									</tr>
									<tr>
										<th>단어검색</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="search_field" class="wid100p">
													<option value="all">전체</option>
													<option value="USER_NAME" <?php echo $searchField == "USER_NAME" ? 'selected': ""?>>글쓴이</option>
													<option value="SUBJECT" <?php echo $searchField == "SUBJECT" ? 'selected': ""?>>제목</option>
													<option value="CONTENTS" <?php echo $searchField == "CONTENTS" ? 'selected': ""?>>내용</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="text" name="search_string" class="wid100p" placeholder="검색어를 입력해주세요" value="<?php echo $searchString?>">
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="4" class="text-right">
											<div class="col-md-12">
											<?php if($this->session->userdata("AUTH") == 'Y' || $this->session->userdata("USER_SEQ") == $BOARD_INFO->BOARD_ADMIN_ID):?>
												<button class="btn btn-default">+ 카테고리 추가</button>
											<?php endif;?>
												<button class="btn btn-primary">검색하기</button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</form>
						</div>
					</section>
				</div>
			</div>

			<div class="row">

<!-- col 12 -->
			<div class="col-md-12">
                <!-- tile -->

                <!-- tile -->
                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                    <div class="table-responsive">
                      <table class="table table-datatable table-custom01 userTable">
                        <thead>
                          <tr>
                            <th class="sort-numeric">No</th>
							<?php 
							if($BOARD_INFO->BOARD_TYPE == 1 || $BOARD_INFO->BOARD_TYPE == 2):?>
							<th class="sort">대표이미지/영상</th>
							<?php endif ?>
                            <th class="sort">제목</th>
							<th class="sort">글쓴이</th>
							<th class="sort">조회</th>
							<?php 
							// 댓글 표시
							if($BOARD_INFO->BOARD_COMMENT_FLAG == 'Y'):?>
							<th class="sort">댓글수</th>
							<?php endif;?>

							<?php
							// 추천 표시
							if($BOARD_INFO->BOARD_RECOMMAND_FLAG == 'Y'):?>
							<th class="sort">추천수</th>
							<?php endif;?>
							<th class="sort">등록일</th>
							
							<?php 
							// 게시판 관리자 혹은 마스터 계정인 경우
							if($this->session->userdata("AUTH") == 'Y' || $this->session->userdata("USER_SEQ") == $BOARD_INFO->BOARD_ADMIN_ID):?>
							<th class="sort">#</th>
							<?php endif;?>
                          </tr>
                        </thead>
                        <tbody id="boardItems">

							<?php 
							if($listCount > 0):
							foreach($lists as $lt):?>
							<tr style="cursor:pointer;" onclick="viewPost(<?php echo $lt->POST_SEQ?>);">
								<td style="text-align:center;"><?php 
								if($lt->POST_NOTICE_YN == 'Y'){
									echo "<span style=\"color:red;\">[공지]</span> ";
								} else {
									echo $pagenum;
								}
									?>	
								
								</td>

								<?php if($BOARD_INFO->BOARD_TYPE == 1 || $BOARD_INFO->BOARD_TYPE == 2):?>
								<td><img src="<?php echo $lt->POST_THUMB_PATH?>" style="width:100px; height:100px;"></td>
								<?php endif ?>
								<td>
									<?php 

										date_default_timezone_set('Asia/Seoul');
										if($BOARD_INFO->BOARD_PERIOD_NEW > 0){
											if(time() - strtotime($lt->POST_REG_DATE) < ( 86400 * $BOARD_INFO->BOARD_PERIOD_NEW )){
												echo "<label class=\"label label-red\">new</label>";												
											};
										}
											
										if($BOARD_INFO->BOARD_PERIOD_HOT > 0){
											if($lt->POST_VIEW_CNT >= $BOARD_INFO->BOARD_PERIOD_HOT){
												echo "<label class=\"label label-hotpink\">hot</label>";
											}
										}
										echo $lt->POST_SUBJECT;

										// 비밀글
										if($lt->POST_SECRET_YN == "Y"){
											echo "&nbsp<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>";
										}

										// if(count($lt->ATTACHS) > 0){
										// 	echo " cjaqn파일 있다";
										// }
									?> 
								</td>
								<td><?php echo $lt->USER_NAME?></td>
								<td style="text-align:center;"><?php echo $lt->POST_VIEW_CNT?></td>
								<?php
								// 댓글 기능
								if($BOARD_INFO->BOARD_COMMENT_FLAG == 'Y'):?>
								<td style="text-align:center;">
								<span class="badge badge-danger"><?php echo $lt->COMMENTS?></span>
								</td>
								<?php
								endif;
								?>
								
								<?php 
								// 추천 표시
								if($BOARD_INFO->BOARD_RECOMMAND_FLAG == 'Y'):?>
								<td style="text-align:center;"><i class="fa fa-heart" aria-hidden="true"></i> <?php ?><?php echo $lt->CNT?></td>
								<?php endif;?>
								<td style="text-align:center;"><?php echo $lt->POST_REG_DATE?></td>
								<?php 
								// 게시판 관리자 혹은 마스터 계정인 경우
								if($this->session->userdata("AUTH") == 'Y' || $this->session->userdata("USER_SEQ") == $BOARD_INFO->BOARD_ADMIN_ID):?>
								<td style="text-align:center;"><button class="btn btn-xs btn-danger">삭제</button></td>
								<?php endif;?>
							</tr>
							<?php 
							$pagenum -= 1;	
							endforeach;
							else:
								echo "<tr><td colspan=5 style=\"text-align:center;padding:50px;\">게시글이 없습니다.</td></tr>";
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
                                        if ($start == 0) $start = 1;
                                    ?>
                                        전체 <?php echo $listCount; ?>개 중 <?php echo $listCount-$start; ?> - <?php echo $listCount-$end == 0 ? "1" : $listCount-$end ?>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center sm-center">
                                    <div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
                                        <?php echo $pagination; ?>
                                    </div>
	                    </div>
					</div>



                    </div>
                  </div>
                  <!-- /tile body -->

				  
                </section>



                <!-- /tile -->
					<div style="text-align:right" id="menu">
						<?php
						$ADMIN = explode(",", $BOARD_INFO->BOARD_ADMIN_ID);
						if( $this->session->userdata("admin_id") == "admin" 
						|| in_array($this->session->userdata("admin_id"), $ADMIN) ):
						?>
						<a href="/admin/board/post_write/<?php echo $BOARD_INFO->BOARD_SEQ?>" class="btn btn-success">게시글 작성</a>
						<?php elseif($BOARD_INFO->BOARD_WRITE_BTN_VIEW == "N"):?>
						<button type="button" onclick="alert('<?php echo $BOARD_INFO->BOARD_AUTH_MSG;?>');location.href='<?php echo $BOARD_INFO->BOARD_AUTH_REDIRECT;?>'" class="btn btn-success">게시글 작성</a>
						<?php endif;?>
					</div>
			</div>

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

<script>

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

	function viewPost(POST_SEQ){
		$.ajax({
			url:"/admin/Board/post_check_auth?post_seq=" + POST_SEQ,
			type:"get",
			dataType:"json",
			success: function(data){
				let auth = data["auth"];
				let url = data["url"];
				let msg = data["msg"];
				if(auth == "Y"){
					location.href="/admin/board/post_view/" + POST_SEQ;
				} else {
					alert(msg);
					// location.href=url;
				}
			},error: function(e){
				console.log(e);
			}
		});
	}
</script>
