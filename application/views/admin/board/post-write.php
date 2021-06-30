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

                        <form class="form-horizontal" role="form" id="post_write_form" method="post">
							
                            <div class="form-group">
                                <label for="input01" class="col-sm-2 control-label">게시글 제목</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="제목을 입력해주세요">
                                </div>
                            </div>
                            
                            <div class="form-group transparent-editor">
                                <label class="col-sm-2 control-label">게시글 내용</label>
                                <div class="col-sm-10">
                                    <textarea name="post_contents" id="post_contents"></textarea>
                                </div>
                            </div>

							<?php if($BOARD_INFO->BOARD_TYPE == 1): ?>
								<div class="form-group">
									<label for="input01" class="col-sm-2 control-label">썸네일 이미지 등록</label>
									<div class="col-sm-6">
										<input type="file" class="form-control" ID="thumnail_img" name="thumnail_img">
									</div>
								</div>
							<?php endif; ?>

							
							<?php if($BOARD_INFO->BOARD_TYPE == 2): ?>
								<div class="form-group" id="youtube_view">
									<label for="input01" class="col-sm-2 control-label">미리보기</label>
									<div class="col-sm-6">
										<div id="player"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="input01" class="col-sm-2 control-label">유튜브 URL 등록</label>
									<div class="col-sm-6">
									<div class="input-group margin-bottom-20">
                          				<input type="text" class="form-control" name="youtube_url">
                          				<span class="input-group-btn">
                            			<button class="btn btn-default" type="button" onclick="url_upload();">업로드</button>
                          				</span>
                        			</div>
									</div>
								</div>
							<?php endif; ?>

							<div class="form-group transparent-editor">
                                <label class="col-sm-2 control-label">첨부파일</label>
                                <div class="col-sm-10">
									<div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-upload"></i><input type="file" multiple="" id="apply_attach" name="apply_attach[]">
                                            </span>
                                        </span>
                                    	<input type="text" class="form-control" name="file_view" readonly="">
                                    </div>
                                    <div class="input-group upload-area" id="uploadfile">
										<p>파일을 이곳에 드래그 하시거나 파일첨부를 클릭하세요</p>
										<ul class="list-type caret-right file_list">
										</ul>
                                    </div>
                                </div>
                            </div>

							<div class="form-group transparent-editor">
                                <label class="col-sm-2 control-label">공지사항</label>
                                <div class="col-sm-10">
                                    <div>
										<input class="input" type="checkbox" name="post_notice_chk" value="Y">
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
                                    <button type="button" class="btn btn-primary" onclick="post_regist()">등록</button>
                                    <a href="/admin/board/post_list/<?php echo $BOARD_INFO->BOARD_SEQ;?>" class="btn btn-default">취소</a>
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
<script type="text/javascript" src="/static/admin/js/DragAndDrop.js"></script>

	<script>
		
		
	$(document).ready( function() {
		$("#post_contents").Editor();
		$("#defaultReal").realperson();
	})

	let video_id = "";

	function post_regist(){
		let hash = $("#defaultReal").realperson('getHash');
		let board_seq = <?php echo $BOARD_INFO->BOARD_SEQ?>;
		$("#defaultRealHash").val(hash);
		$("#post_contents").val($("#post_contents").Editor("getText"));
		var formData = new FormData($("#post_write_form")[0]);

		<?php if($BOARD_INFO->BOARD_TYPE == 1): ?>
		if($("input[name=thumnail_img]").val() == ""){
			alert("썸네일 이미지를 등록해주세요.");
			return false;
		}
		<?php endif; ?>
		<?php if($BOARD_INFO->BOARD_TYPE == 2): ?>
		if($("input[name=youtube_url]").val() == ""){
			alert("동영상 링크를 등록해주세요.");
			return false;
		}
		<?php endif; ?>

		$.ajax({
			url:"/admin/board/set_post_info?board_seq=" + board_seq,
			type:"post",
			data:formData,
			dataType:"json",
			processData:false,
			contentType:false,
			success:function(resultMsg){
				let code = resultMsg["code"];
				let msg = resultMsg["msg"];
				if(code == 200){
					alert(msg);
					location.href="/admin/board/post_list/" + board_seq;
				} else {
					alert(msg);
				}
			},
			error:function(e){
				console.log(e);
			}
		})
	}

	function url_upload(){
		$.ajax({
			url : "/admin/Board/CheckUrlAndSave",
			type : "post",
			data : { "youtube_url" : $("input[name=youtube_url]").val() },
			dataType : "json",
			success : function (resultMsg){
				let code = resultMsg["code"];
				let msg = resultMsg["msg"];
				if(code == 200){
					tag.src = "https://www.youtube.com/iframe_api";
					video_id = resultMsg["video_id"];
					$("input[name=youtube_url]").val(video_id);
					alert($("input[name=youtube_url]").val());
				} else {
					alert(msg);
				}
				
			}, error : function (e){
				console.log(e.responseText);
			}
		});
	}

		// 2. This code loads the IFrame Player API code asynchronously.
		var tag = document.createElement('script');

		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		// 3. This function creates an <iframe> (and YouTube player)
		//    after the API code downloads.
		var player;
		function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			height: '240',
			width: '320',
			videoId: video_id,
			events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
			}
		});
		}

		// 4. The API will call this function when the video player is ready.
		function onPlayerReady(event) {
		event.target.playVideo();
		}

		// 5. The API calls this function when the player's state changes.
		//    The function indicates that when playing a video (state=1),
		//    the player should play for six seconds and then stop.
		var done = false;
		function onPlayerStateChange(event) {
		if (event.data == YT.PlayerState.PLAYING && !done) {
			setTimeout(stopVideo, 6000);
			done = true;
		}
		}
		function stopVideo() {
		player.stopVideo();
		}

</script>

</body>
</html>



