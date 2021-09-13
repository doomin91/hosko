<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>

<style>

.upload-area {
    width: 100%;
    height: 100px;
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid lightgray;
    border-radius: 3px;
    margin-top: 10px;
    padding: 0 10px;
    overflow: auto;
}

.upload-area p {
    text-align: center;
    line-height: 100px;
    color: #000;
    font-size: 16px;
}

.file_view{
	border: 1px solid lightgray !important; 
}

</style>

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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i><b><?php echo $BOARD_INFO->BOARD_NAME;?> 게시글 수정</b></h2>
			<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li>게시판관리</li>
				<li><?php echo $BOARD_INFO->BOARD_NAME;?></li>
				<li>게시글 수정</li>
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
                                    <input type="text" class="form-control" id="post_title" name="post_title" placeholder="제목을 입력해주세요" value="<?php echo $POST_INFO->POST_SUBJECT?>">
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
										<input type="hidden" class="form-control" name="video_id">
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
                                                <i class="fa fa-upload"></i><input type="file" multiple="multiple" id="post_attach" name="post_attach[]">
                                            </span>
                                        </span>										
                                    	<input type="text" class="form-control file_view" name="file_view" readonly="">
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
<script type="text/javascript" src="/static/admin/js/DragAndDrop.js"></script>
<script type="text/javascript" src="/js/google-player-api.js"></script>

	<script>
	loadAttach();
		
	$(document).ready( function() {
		$("#post_contents").Editor();
		$("#defaultReal").realperson();
		$("#post_contents").Editor('setText', '<?php echo $POST_INFO->POST_CONTENTS;?>');
		tag.src = "https://www.youtube.com/iframe_api";
		video_id = "<?php echo $POST_INFO->POST_YOUTUBE_URL?>";
		$("input[name=youtube_url]").val("https://www.youtube.com/watch?v=" + video_id);
	})

	function loadAttach(){
		$.ajax({
        type : "GET",
        url: '/admin/Board/FileLoad/' + <?php echo $POST_INFO->POST_SEQ;?>,
        dataType : "JSON",
        success: function(resultMsg){
            console.log(resultMsg);
            var file_list = resultMsg.file_list;
            $(".upload-area p").addClass("hide");
            //$(".file_list").append("<li>"+$(this).get(0).files[i].name+"</li>");
            $.each(file_list, function(key, element){
                $(".file_list").append("<li>"+element.file_name+"&nbsp;<i class=\"fa fa-times file_del\" data-file_seq=\""+element.file_seq+"\"></i></li>");
            });
        }, error : function(e){
              //alert(e.responseText);
              console.log(e.responseText);
          }
    });
	}

	function post_modify(){
		let upload_files = $(".file_list").children("li").children("i");
		let file_seq = [];
		console.log(upload_files);
		$.each(upload_files, function(index, value){
			console.log($(value).data("file_seq"));
			file_seq.push($(value).data("file_seq"));
		})

		let hash = $("#defaultReal").realperson('getHash');
		let post_seq = <?php echo $POST_INFO->POST_SEQ?>;
		$("#defaultRealHash").val(hash);
		$("#post_contents").val($("#post_contents").Editor("getText"));
		// let form = $("#post_write_form").serializeArray();
		var formData = new FormData($("#post_write_form")[0]);
		formData.append("file_seq", file_seq);

		// let formData = new FormData(form);
		// formData.append("post_file", "D");

		$.ajax({
			url:"/admin/board/upt_post_info?post_seq=" + post_seq,
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
				$("input[name=video_id]").val(video_id);
				alert(msg);
			} else {
				alert(msg);
			}
			
		}, error : function (e){
			console.log(e.responseText);
		}
	});
}


</script>

</body>
</html>



