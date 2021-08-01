<?php include 'header.php'; ?>


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

</style>

    <body>

        <div id="wrap" class="main_wrap">

            <?php include 'nav.php'; ?>

            <div id="container">
                <div class="layout_sub">
                    <div class="sub_visual v01">
                        <div class="sub_visual_text">
                            <h1><?php echo $GROUP_INFO->GP_NAME;?></h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                        <ul>
                                <?php foreach($BOARDS_INFO as $val){
                                    switch($val->BOARD_TYPE){
                                        case 0:
                                            // 일반 게시판
                                            echo "<li><a href=\"/Board/q/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            break;
                                        case 1:
                                            // 갤러리 게시판
                                            echo "<li><a href=\"/Board/g/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            break;
                                        
                                        case 2:
                                            // 동영상 게시판
                                            echo "<li><a href=\"/Board/v/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            break;
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php echo $BOARD_INFO->BOARD_KOR_NAME?></h2>
                                </div>
                                <div class="subContSec">
                                    <div class="boardWriteTop">
                                <form id="post_write_form">
                                        <div class="type_tableWrite">
                                            <!-- <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>작성자</strong>
                                                    <div class="type_td">
                                                        <input type="text" class="input_s1">								
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>이메일</strong>
                                                    <div class="type_td">
                                                        <input type="email" class="input_s1">
                                                    </div>
                                                </div>                               
                                            </div> -->


                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>제목</strong>
                                                    <div class="type_td">
                                                        <!-- <div class="boardSelect">
                                                            <select name="" id="" class="select_s1">
                                                                <option value="">111</option>
                                                                <option value="">222</option>
                                                                <option value="">333</option>
                                                                <option value="">444</option>
                                                            </select>
                                                        </div> -->
                                                        <div class="boardInputText">
                                                            <input type="text" class="input_s1" id="post_title" name="post_title" placeholder="제목을 입력해주세요" value="<?php echo $POST_INFO->POST_SUBJECT?>">
                                                        </div>
                                                    </div>
                                                </div>                               
                                            </div>

                                        </div>
                                    </div>


                                    <div class="boardWriteCont">

                                        <div class="type_tableWrite">
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>내용</strong>
                                                    <div class="type_td">
                                                        <textarea class="textarea_s1" name="post_contents" id="post_contents"></textarea>								
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if($BOARD_INFO->BOARD_TYPE == 1): ?>
                                                <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>썸네일 이미지</strong>
                                                    <div class="type_td">
                                                        <div class="filebox file_s1">
                                                            <label for="thumnail_img">파일선택</label> 
                                                            <input type="file" class="form-control" ID="thumnail_img" name="thumnail_img">
                                                            <input class="thumnail-name" value="선택된 이미지 없음">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <?php endif; ?>

                                            <?php if($BOARD_INFO->BOARD_TYPE == 2): ?>
                                                <div class="col1 n_br">
                                                    <div class="boardWriteTop_item" id="youtube_view">
                                                        <strong>미리보기</strong>
                                                        <div class="type_td">
                                                            <div id="player"></div>
                                                        </div>
                                                    </div>
                                                </div>     

                                                <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>유튜브 URL 등록</strong>
                                                    <div class="type_td">
                                                        <input type="hidden" class="form-control" name="video_id">
                                                        <input type="text" class="form-control" name="youtube_url">
                                                        <button class="btn btn-default" type="button" onclick="url_upload();">업로드</button>
                                                    </div>
                                                </div>
                                            </div>   
                                            <?php endif; ?>

                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>첨부파일</strong>
                                                    <div class="type_td">
                                                        <div class="filebox file_s1">
                                                            <label for="post_attach">파일선택</label> 
                                                            <input type="file" multiple="multiple" id="post_attach" name=post_attach[] > 
                                                            <input class="upload-name" value="선택된 파일 없음">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong></strong>
                                                        <div class="type_td">
                                                            <div class="input-group upload-area" id="uploadfile">
                                                            <p>파일을 이곳에 드래그 하시거나 파일첨부를 클릭하세요</p>
                                                            <ul class="list-type caret-right file_list">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>   

                                            <?php if($BOARD_INFO->BOARD_ADMIN_ID == $this->session->userdata("USER_SEQ")){?>
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>공지사항</strong>
                                                    <div class="type_td">
                                                        <input class="input" type="checkbox" name="post_notice_chk" value="Y">
                                                    </div>
                                                </div>
                                            </div>     
                                            <?php }?>

                                            <?php if($BOARD_INFO->BOARD_SECRET_FLAG == 'Y'){?>
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>비밀글</strong>
                                                    <div class="type_td">
                                                            <input class="input" type="checkbox" name="post_secret_chk" value="Y" <?php echo $POST_INFO->POST_SECRET_YN == "Y" ? "checked" : "";?>>
                                                    </div>
                                                </div>
                                            </div>     
                                            <?php }?>

                                            <?php if($BOARD_INFO->BOARD_SPAM_CHECK_FLAG == 'Y'){?>
                                            <!-- <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>자동입력방지</strong>
                                                    <div class="type_td">
                                                        <p><label class="label label-waning" style="color:#000;">Please enter the letters displayed:</label>
										                <input type="hidden" id="defaultRealHash" name="defaultRealHash" value="">
										                <input type="text" id="defaultReal" name="defaultReal" placeholder="문자를 입력해주세요." style="color:#000;"></p>
                                                    </div>
                                                </div>
                                            </div>      -->
                                            <?php }?>
                                        </div>
                                    </div>
                                </form>
                                    <div class="boardBtnArea pb50">
                                        <!-- <div class="btn_box f_left">
                                            <a href="/"  class="btn_style01 ">목록보기</a>
                                        </div> -->

                                        <div class="btn_box f_right">
                                            <a type="button" onclick="post_modify()" class="btn_style02">확인하기</a>
                                        </div>

                                        <div class="btn_box f_right">
                                            <a href="/Board/q/<?php echo $GROUP_INFO->GP_SEQ?>?seq=<?php echo $BOARD_INFO->BOARD_SEQ?>"  class="btn_style01">목록보기</a>
                                        </div>

                                    </div>


                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

        <?php include 'footer.php'; ?>

        </div>
        <!-- Bootstrap -->
        <link href="/static/admin/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="/js/captcha/jquery.realperson.css"> 
        <script src="/js/editor.js"></script>
        <script type="text/javascript" src="/js/captcha/jquery.plugin.js"></script> 
        <script type="text/javascript" src="/js/captcha/jquery.realperson.js"></script>
        <script type="text/javascript" src="/static/admin/js/DragAndDrop.js"></script>
        <script type="text/javascript" src="/js/google-player-api.js"></script>


<script>
	loadAttach();

		
$(document).ready( function() {
		$("#post_contents").Editor();
		$("#defaultReal").realperson();
        $("#post_contents").Editor('setText', "<?php echo $POST_INFO->POST_CONTENTS;?>");
		tag.src = "https://www.youtube.com/iframe_api";
		video_id = "<?php echo $POST_INFO->POST_YOUTUBE_URL?>";
		$("input[name=youtube_url]").val("https://www.youtube.com/watch?v=" + video_id);
	})

    $("#thumnail_img").on('change',function(){
    var fileName = $("#thumnail_img").val();
    $(".thumnail-name").val(fileName);
    });

    $("#post_attach").on('change',function(){
    var fileName = $("#post_attach").val();
    $(".upload-name").val(fileName);
    });

    function loadAttach(){
            $.ajax({
            type : "GET",
            url: '/Board/FileLoad/' + <?php echo $POST_INFO->POST_SEQ;?>,
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
			url:"/board/upt_post_info?post_seq=" + post_seq,
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
                    <?php
                    switch($BOARD_INFO->BOARD_TYPE){
                                        case 0:
                                            // 일반 게시판
                                            echo "location.href=\"/Board/q/$GROUP_INFO->GP_SEQ?seq=$BOARD_INFO->BOARD_SEQ\"";
                                            break;
                                        case 1:
                                            // 갤러리 게시판
                                            echo "location.href=\"/Board/g/$GROUP_INFO->GP_SEQ?seq=$BOARD_INFO->BOARD_SEQ\"";
                                            break;
                                        
                                        case 2:
                                            // 동영상 게시판
                                            echo "location.href=\"/Board/v/$GROUP_INFO->GP_SEQ?seq=$BOARD_INFO->BOARD_SEQ\"";
                                            break;
                                    }
                    ?>
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
		url : "s/Board/CheckUrlAndSave",
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






