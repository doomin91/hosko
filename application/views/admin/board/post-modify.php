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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i><b><?php echo $BOARD_INFO->BOARD_NAME;?> 게시글 등록</b></h2>
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
				
                <section class="tile color transparent-black">

                    <!-- tile body -->
                    <div class="tile-body">

                        <form class="form-horizontal" role="form" id="post_write_form">
                            
                            <div class="form-group">
                                <label for="input01" class="col-sm-2 control-label">게시글 제목</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="제목을 입력해주세요" value="<?php echo $POST_INFO->POST_SUBJECT?>">
                                </div>
                            </div>
                            
                            <div class="form-group transparent-editor">
                                <label class="col-sm-2 control-label">게시글 내용</label>
                                <div class="col-sm-10">
                                    <textarea name="post_contents" id="post_contents"></textarea>
                                </div>
                            </div>

							<?php
							for($i = 0 ; $i < $BOARD_INFO->BOARD_FILEUPLOAD_COUNT; $i++){?>
                            <div class="form-group">
                                <label for="input01" class="col-sm-2 control-label">첨부파일<?php echo ($i+1)?></label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" ID="post_file_name<?php echo ($i+1)?>" name="post_file_name<?php echo ($i+1)?>">
                                </div>
                                <!-- <div class="col-sm-4" style="font-size:12px">* 한글파일명은 사용할수 없습니다.</div> -->
                            </div>
							<?php }
							?>

							<div class="form-group transparent-editor">
                                <label class="col-sm-2 control-label">공지사항</label>
                                <div class="col-sm-10">
                                    <div>
										<input class="input" type="checkbox" name="post_notice_chk" value="Y" <?php echo $POST_INFO->POST_NOTICE_YN == 'Y'? 'checked' : ''?>>
									</div>
                                </div>
                            </div>

							<?php if($BOARD_INFO->BOARD_SECRET_FLAG == 'Y'): ?>
							<div class="form-group transparent-editor">
								
                                <label class="col-sm-2 control-label">비밀글</label>
                                <div class="col-sm-10">
                                    <div>
										<input class="input" type="checkbox" name="post_secret_chk" value="Y">
									</div>
                                </div>
                            </div>
							<?php endif; ?>
								
							<?php if($BOARD_INFO->BOARD_SPAM_CHECK_FLAG == 'Y'): ?>
							<div class="form-group">
								
								<div class="col-sm-offset-2 col-sm-6" style="background:#FFEFBA;max-width:350px;">
									<p><label class="label label-waning" style="color:#000;">Please enter the letters displayed:</label>
										<input type="hidden" id="defaultRealHash" name="defaultRealHash" value="">
										<input type="text" id="defaultReal" name="defaultReal" placeholder="문자를 입력해주세요." style="color:#000;"></p>
								</div>

							</div>
							<?php endif; ?>
							

                            <div class="form-group form-footer">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" class="btn btn-primary" onclick="post_modify()">수정</button>
                                    <a href="/admin/board/post_view/<?php echo $POST_INFO->POST_SEQ;?>" class="btn btn-default">취소</a>
                                </div>
                            </div>
							

                        </form>
                    </div>
                  <!-- /tile body -->

                </section>


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
<link rel="stylesheet" type="text/css" href="/js/captcha/jquery.realperson.css"> 
<script type="text/javascript" src="/js/captcha/jquery.plugin.js"></script> 
<script type="text/javascript" src="/js/captcha/jquery.realperson.js"></script>

	<script>
		
		
	$(document).ready( function() {
		$("#post_contents").Editor();
		$("#defaultReal").realperson();
		$("#post_contents").Editor('setText', "<?php echo $POST_INFO->POST_CONTENTS;?>");
	})


	function post_modify(){

		let hash = $("#defaultReal").realperson('getHash');
		console.log(hash);

		let post_seq = <?php echo $POST_INFO->POST_SEQ?>;
		
		$("#defaultRealHash").val(hash);
		$("#post_contents").val($("#post_contents").Editor("getText"));
		let form = $("#post_write_form").serializeArray();

		console.log(form);
		$.ajax({
			url:"/admin/board/upt_post_info?post_seq=" + post_seq,
			type:"post",
			data:form,
			dataType:"json",
			success:function(resultMsg){
				let code = resultMsg["code"];
				let msg = resultMsg["msg"];
				if(code == 200){
					alert(msg);
					location.href="/admin/board/post_view/" + post_seq;
				} else {
					alert(msg);
				}
			},
			error:function(e){
				console.log(e);
			}
		})
	}
</script>

</body>
</html>



