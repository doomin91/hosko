<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>
<script src="/ckeditor/ckeditor.js"></script>

<style>

.content-identity-count {
	float:left;
	width:50px;
	text-align:right;
}	

#content-body .panel-title{
	font-size:22px;
	margin-top:0;
	word-break:break-all;
}

.note-title {
    padding: 10px 15px;
    background-color: #f2f2f2;
}

td a {
	color:#000;
}

</style>

<body class="bg-1">

	<!-- Preloader -->
	<div class="mask">
		<div id="loader"></div>
	</div>
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
					<h2><i class="fa fa-puzzle-piece"
							style="line-height: 48px;padding-left: 5px;"></i><b><?php echo $BOARD_INFO->BOARD_NAME;?>
							게시글 등록</b></h2>
					<div class="breadcrumbs">
						<ol class="breadcrumb">
							<li>관리자 페이지</li>
							<li>게시판관리</li>
							<li><?php echo $BOARD_INFO->BOARD_NAME;?></li>
							<li>게시글 작성</li>
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
							<section class="tile color transparent-white">

								<!-- tile body -->
								<div class="tile-body" style="padding:0">
									<form id="comment_write_form">
										<div class="panel panel-default clearfix fa-">
											<div class="panel-heading clearfix">
												<input type="hidden" name="post_seq" value="<?php echo $POST_INFO->POST_SEQ ?>">

												<div class="avatar clearfix avatar-medium pull-left">
													<!-- <a href="/user/info/71755" class="avatar-photo"><img src="//www.gravatar.com/avatar/c8f8ae1de372f1338bb08e0e3258bd02?d=identicon&amp;s=40"></a> -->
													<div class="avatar-info">
														<a class="nickname" href="/user/info/71755"
															title="fluke"><?php echo $POST_INFO->USER_NAME;?></a>
														<div class="date-created"><span class="timeago"><?php echo $POST_INFO->POST_REG_DATE;?></span>
														</div>
													</div>
												</div>

												<div class="content-identity pull-right">
													<?php if($BOARD_INFO->BOARD_RECOMMAND_FLAG == 'Y'):?>
													<div class="content-identity-count"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
														<?php echo $RECOMMAND;?></div>
													<?php endif;?>
													<div class="content-identity-count"><i class="fa fa-comment"></i>
														<?php echo count($COMMENTS);?></div>
													<div class="content-identity-count"><i class="fa fa-eye"></i>
														<?php echo $POST_INFO->POST_VIEW_CNT;?></div>
												</div>
											</div>
											<div class="content-container clearfix">
												<div id="content-body" class="panel-body content-body pull-left">
													<div class="content-tags">
														<span
															class="list-group-item-text article-id">#<?php echo $POST_INFO->POST_SEQ;?></span>
													</div>
													<h2 class="panel-title">
														<?php echo $POST_INFO->POST_SUBJECT;?>
													</h2>
													<hr>
													<article class="content-text" itemprop="articleBody">
														<?php if($BOARD_INFO->BOARD_TYPE == 2):?>
															<div id="player"></div><br>
														<?php endif;?>
														<?php echo $POST_INFO->POST_CONTENTS;?>
													</article>

												</div>
												<div id="content-function"
													class="content-function pull-right text-center">
													<div class="content-function-group">



													</div>

												</div>
											</div>



											<div class="row form-footer" style="margin-right:0px;margin-bottom:10px;">
												<div class="col-sm-offset-2 col-sm-10 text-right">
													<!-- <?php if($BOARD_INFO->BOARD_RECOMMAND_FLAG == 'Y'):?>
													<button type="button" class="btn btn-primary btn-sm"
														id="btnRecommand">추천</button>
													<?php endif;?> -->
													<button type="button" class="btn btn-primary btn-sm"
														id="btnRepost">답글</button>
														<button type="button" class="btn btn-primary btn-sm"
														onclick="postDelete(<?php echo $POST_INFO->POST_SEQ?>)">삭제</button>
													<a href="/admin/board/post_modify/<?php echo $POST_INFO->POST_SEQ?>"
														class="btn btn-primary btn-sm">수정</a>
													<a href="/admin/board/post_list/<?php echo $BOARD_INFO->BOARD_SEQ?>"
														class="btn btn-primary btn-sm">목록</a>
												</div>
											</div>
											
											<ul class="list-group" style="margin-top:5px;">
												<li id="note-title" class="list-group-item note-title">
													<h3 class="panel-title">첨부파일 <?php echo count($ATTACH_FILES);?><span id="note-count"></span></h3>
												</li>
													<?php foreach($ATTACH_FILES as $files){
														echo "<li id=\"note-title\" class=\"list-group-item\" style=\"border-bottom:0\">";
														echo "<a href=\"/admin/Board/downalod_attach/" . $files->ATTACH_SEQ . "\">". $files->ATTACH_FILE_NAME ."</a></li>";
													}?>
											</ul>
											
											
											<?php if($BOARD_INFO->BOARD_COMMENT_FLAG == 'Y'): ?>
											<ul class="list-group" style="margin-top:5px;">
												<li id="note-title" class="list-group-item note-title">
													<h3 class="panel-title">댓글 <span
															id="note-count"><?php echo count($COMMENTS);?></span></h3>
												</li>

												<?php foreach($COMMENTS as $cm){?>
												<li class="list-group-item note-item clearfix">
													<div class="content-body panel-body pull-left">
														<div class="note-select-indicator note-deselected">
															<i class="fa fa-comment"></i>
														</div>
														<div class="avatar clearfix avatar-medium ">
															<!-- <a href="/user/info/5989" class="avatar-photo"><img src="//www.gravatar.com/avatar/99a1b0074de6e2181c0b6a5c1b98f023?d=identicon&amp;s=40"></a> -->
															<div class="avatar-info">
																<a class="nickname"
																	href="#"><?php echo $cm->USER_ID?></a>
																<div class="date-created"><span class="timeago"
																		title="2018-07-25T15:46:46"><?php echo $cm->COM_REG_DATE?></span>
																</div>
															</div>
														</div>
														<fieldset class="form">
															<article class="list-group-item-text note-text">
																<p><?php echo $cm->COM_CONTENTS?></p>
															</article>
														</fieldset>
													</div>
													<?php } ?>
												<li class="list-group-item note-form clearfix">
													<!-- <div class="panel-body">
										<h5 class="text-center"><a href="/login/auth?redirectUrl=%2Farticle%2F486343" class="link">로그인</a>을 하시면 답변을 등록할 수 있습니다.</h5>
									</div>
									-->
													<div>
														<textarea name="comment_content" id="comment_content"></textarea>
													</div>
													<div style="text-align:right;margin-top:5px;">
														<button type="button" class="btn btn-success" onclick="comment_regist();">댓글 등록</button>
													</div>
												</li>
											</ul>
											<?php endif;?>
										</div>
										<!-- /tile body -->

							</section>
							<!-- /tile -->

							<?php if($BOARD_INFO->BOARD_BOTTOM_LIST_FLAG == "Y"): ?>
							<!-- tile -->
							<section class="tile color transparent-black">
							<!-- tile body -->
							<div class="tile-body">
								<div class="table-responsive">
								<table class="table table-hover table-condensed table-custom01">

											<tbody>
											<?php foreach($BOTTOM_LIST as $lt):?>
											<?php if($POST_INFO->POST_SEQ == $lt->POST_SEQ):?>
											<tr style="background:#3071A9; color:white;">
											<td style="text-align:center;">-</td>
											<?php else: ?>
											<tr style="cursor:pointer;" onclick="viewPost(<?php echo $lt->POST_SEQ?>);">
											<td style="text-align:center;"><?php echo $lt->POST_SEQ?></td>
											<?php endif; ?>
												<td><?php 
												if($lt->POST_NOTICE_YN == 'Y'){
													echo "<span style=\"color:red;\">[공지]</span> ";
												} else {
													// echo $pagenum;
												}
													?>	
												
												</td>
												<td>
													<?php 
														echo $lt->POST_SUBJECT;
														if($lt->POST_SECRET_YN == "Y"){
															echo "&nbsp<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>";
														}
													?> 
												</td>
												<td style="text-align:center;"><?php echo $lt->USER_NAME?></td>
												<td style="text-align:center;"><?php echo $lt->POST_VIEW_CNT?></td>
												<td style="text-align:center;"><?php echo $lt->POST_REG_DATE?></td>
											</tr>
											<?php 
											// $pagenum -= 1;	
											endforeach;
											?>
											</tbody>
										</table>
									</div>
								</div>
							</section>
							<?php endif; ?>

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
<script type="text/javascript" src="/js/google-player-api.js"></script>

	<script>
		
		<?php if($BOARD_INFO->BOARD_TYPE == 2):?>
		video_id = "<?php echo $POST_INFO->POST_YOUTUBE_URL;?>";
		video_width = "480";
		video_height = "320";
		tag.src = "https://www.youtube.com/iframe_api";
		<?php endif; ?>

		<?php if($BOARD_INFO->BOARD_COMMENT_FLAG == 'Y'): ?>
		$(document).ready(function () {
			// $("#comment_content").Editor();
			CKEDITOR.replace('comment_content',
			{

			}
			);
		})
		<?php endif;?>
		let post_seq = <?php echo $POST_INFO->POST_SEQ ?>;
		let board_seq = <?php echo $BOARD_INFO->BOARD_SEQ ?>;
		$("#btnRecommand").click(function () {
			$.ajax({
				url: "/admin/board/post_recommand?post_seq=" + post_seq,
				type: "get",
				dataType: "json",
				success: function (resultMsg) {
					let code = resultMsg["code"];
					let msg = resultMsg["msg"];
					alert(msg);
				},
				error: function (e) {
					console.log(e);
				}
			})
		});

		function postDelete(POST_SEQ){
			console.log(POST_SEQ);
			if(confirm("삭제하시겠습니까?")){
				$.ajax({
					url:"/Board/post_delete",
					type: "post",
					data: {
						"post_seq" : POST_SEQ
					},
					dataType:"json",
					success: function(resultMsg){
						if(resultMsg["code"] == 200){
							alert("삭제되었습니다.");
							location.href="/admin/board/post_list/" + board_seq;
						}else {
							alert("삭제 실패");
						}
					},error: function(e){
						console.log(e)
					}
				})
			}
		}

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

		function comment_regist() {
			let board_seq = <?php echo $BOARD_INFO->BOARD_SEQ?>;
			$("#comment_content").val(CKEDITOR.instances.comment_content.getData());
			let form = $("#comment_write_form").serializeArray();
			console.log(form);
			$.ajax({
				url: "/admin/board/comment_regist",
				type: "post",
				data: form,
				dataType: "json",
				success: function (resultMsg) {
					location.reload();
				},
				error: function (e) {
					console.log(e);
				}
			})
		}

	</script>