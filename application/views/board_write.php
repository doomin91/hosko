<?php include 'header.php'; ?>

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
                                                        <div class="boardSelect">
                                                            <select name="" id="" class="select_s1">
                                                                <option value="">111</option>
                                                                <option value="">222</option>
                                                                <option value="">333</option>
                                                                <option value="">444</option>

                                                            </select>
                                                        </div>
                                                        <div class="boardInputText">
                                                            <input type="text" class="input_s1" id="post_title" name="post_title" placeholder="제목을 입력해주세요">
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
                                                        <textarea class="textarea_s1" name="post_contents" id="post_contents"> </textarea>								
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>첨부파일</strong>
                                                    <div class="type_td">
                                                        <div class="filebox file_s1">
                                                            <label for="file">파일선택</label> 
                                                            <input type="file" id="file" > 

                                                            <input class="upload-name" value="선택된 파일 없음">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    

                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>비밀글</strong>
                                                    <div class="type_td">
                                                            <input class="input" type="checkbox" name="post_secret_chk" value="Y">
                                                    </div>
                                                </div>
                                            </div>     
                                            
                                            <div class="col1 n_br">
                                                <div class="boardWriteTop_item">
                                                    <strong>자동입력방지</strong>
                                                    <div class="type_td">
                                                        <p><label class="label label-waning" style="color:#000;">Please enter the letters displayed:</label>
										                <input type="hidden" id="defaultRealHash" name="defaultRealHash" value="">
										                <input type="text" id="defaultReal" name="defaultReal" placeholder="문자를 입력해주세요." style="color:#000;"></p>
                                                    </div>
                                                </div>
                                            </div>     
                                            
                                        </div>
                                    </div>
                                </form>
                                    <div class="boardBtnArea pb50">
                                        <!-- <div class="btn_box f_left">
                                            <a href="/"  class="btn_style01 ">목록보기</a>
                                        </div> -->

                                        <div class="btn_box f_right">
                                            <a type="button" onclick="post_regist()" class="btn_style02">확인하기</a>
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
        <link rel="stylesheet" type="text/css" href="/js/captcha/jquery.realperson.css"> 
        <script type="text/javascript" src="/js/captcha/jquery.plugin.js"></script> 
        <script type="text/javascript" src="/js/captcha/jquery.realperson.js"></script>

<script>

		
$(document).ready( function() {
		$("#defaultReal").realperson();
	})


$("#file").on('change',function(){
  var fileName = $("#file").val();
  $(".upload-name").val(fileName);
});


function post_regist(){
		let hash = $("#defaultReal").realperson('getHash');
		let board_seq = <?php echo $BOARD_INFO->BOARD_SEQ?>;
        let group_seq = <?php echo $GROUP_INFO->GP_SEQ?>;
        let type = "<?php echo $BOARD_TYPE?>";
		$("#defaultRealHash").val(hash);
		// var form = $("#post_write_form").serializeArray();
		var formData = new FormData($("#post_write_form")[0]);

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
					location.href="/Board/" + type + "/" + group_seq +"?seq=" + board_seq;
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






