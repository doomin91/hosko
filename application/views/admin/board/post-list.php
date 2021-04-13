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
		  <!-- /page header -->
			[테스트 페이지]<br>
			<?php echo "비밀글 기능 => " . $BOARD_INFO->BOARD_SECRET_FLAG . "<br>";?>
			<?php echo "추천기능 => " . $BOARD_INFO->BOARD_RECOMMAND_FLAG . "<br>";?>
			<?php echo "뷰페이지 하단 목록 노출 => " . $BOARD_INFO->BOARD_BOTTOM_LIST_FLAG . "<br>";?>
			<?php echo "스팸체크 기능 => " . $BOARD_INFO->BOARD_SPAM_CHECK_FLAG . "<br>";?>
			<?php echo "댓글 기능 => " . $BOARD_INFO->BOARD_COMMENT_FLAG . "<br>";?>
			<?php echo "파일업로드 갯수 => " . $BOARD_INFO->BOARD_FILEUPLOAD_COUNT . "<br>";?>
			<?php echo "리스트 출력수 => " . $BOARD_INFO->BOARD_LIST_COUNT . "<br>";?>
		  <!-- content main container -->
		  <div class="main">

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
								<td><?php echo $lt->USERNAME?></td>
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

					<div class="row">

					<div class="form-group ">
						<form method="get" role="form" id="sform" class="form-horizontal">

						<label for="apply_title" class="col-sm-2 control-label">게시글 검색</label>
						<div class="col-sm-2">
							<select name="searchField" class="form-control">
							<option value="">선택</option>
							<option value="subject" <?php echo $searchField == "subject" ? 'selected': ""?>>제목</option>
							<option value="username" <?php echo $searchField == "username" ? 'selected': ""?>>글쓴이</option>
							</select>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
							<input type="text" name="searchString" class="form-control" value="<?php echo $searchString; ?>" style="z-index:1;">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">검색</button>
							</span>
							</div>
						</div>
						</div>
						</form>

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
	function viewPost(POST_SEQ){
		location.href="/admin/board/post_view/" + POST_SEQ;
	}
</script>
