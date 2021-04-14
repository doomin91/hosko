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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b><?php echo $BOARD_INFO->BOARD_NAME;?></b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">게시판관리</a></li>
				<li class="active"><?php echo $BOARD_INFO->BOARD_NAME;?></li>
			  </ol>
			</div>

		  </div>
		  <div class="main">
		  <div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
						<form method="get">
							<table class="table table-custom userTable">
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
												<input name="reg_date_start" type="text" class="wid100p datepicker">
											</div>
											<div class="col-md-5">
												<input name="reg_date_end" type="text" class="wid100p datepicker">
											</div>
										</td>
									</tr>
									<tr>
										<th>단어검색</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="search_field" class="wid100p">
													<option value="all">전체</option>
													<option value="USER_ID" <?php echo $searchField == "USER_ID" ? 'selected': ""?>>글쓴이</option>
													<option value="SUBJECT" <?php echo $searchField == "SUBJECT" ? 'selected': ""?>>제목</option>
													<option value="CONTENTS" <?php echo $searchField == "CONTENTS" ? 'selected': ""?>>내용</option>
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

                <section class="tile transparent">

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    <div class="table-responsive">
                      <table  class="table table-datatable table-custom">
                        <thead>
                          <tr>
                            <th class="sort-numeric">No</th>
                            <th class="sort">제목</th>
							<th class="sort">글쓴이</th>
							<th class="sort">조회수</th>
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
							foreach($LIST as $lt):?>
							<tr style="cursor:pointer;" onclick="viewPost(<?php echo $lt->POST_SEQ?>);">
								<td><?php 
								if($lt->POST_NOTICE_YN == 'Y'){
									echo "<span style=\"color:red;\">[공지]</span> ";
								} else {
									echo $pagenum;
								}
									?>	
								
								</td>
								<td><?php 
									echo $lt->POST_SUBJECT?>
								<?php
								// 댓글 기능
								if($BOARD_INFO->BOARD_COMMENT_FLAG == 'Y'):?>
								<span class="badge badge-danger">1</span>
								<?php
								endif;
								?>
								</td>
								<td><?php echo $lt->USER_NAME?></td>
								<td><?php echo $lt->POST_VIEW_CNT?></td>
								<?php 
								// 추천 표시
								if($BOARD_INFO->BOARD_RECOMMAND_FLAG == 'Y'):?>
								<td><?php ?><?php echo $lt->CNT?></td>
								<?php endif;?>
								<td><?php echo $lt->POST_REG_DATE?></td>
								<?php 
								// 게시판 관리자 혹은 마스터 계정인 경우
								if($this->session->userdata("AUTH") == 'Y' || $this->session->userdata("USER_SEQ") == $BOARD_INFO->BOARD_ADMIN_ID):?>
								<td class="sort"><button class="btn btn-xs btn-danger">삭제</button></td>
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
						<a href="/admin/board/post_write/<?php echo $BOARD_INFO->BOARD_SEQ?>" class="btn btn-success">게시글 작성</a>
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
		location.href="/admin/board/post_view/" + POST_SEQ;
	}
</script>
