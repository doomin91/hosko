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
                        <div class="<?php echo count($BOARDS_INFO) > 5 ? "sub_category01" : "sub_category" ?>">    
                            <ul>
                                <?php foreach($BOARDS_INFO as $val){
                                    switch($val->BOARD_TYPE){
                                        case 0:
                                            // 일반 게시판
                                            if($BOARD_INFO->BOARD_SEQ == $val->BOARD_SEQ){
                                                echo "<li class=\"on\"><a href=\"/Board/q/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            }else{
                                                echo "<li><a href=\"/Board/q/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            }
                                            break;
                                        case 1:
                                            // 갤러리 게시판
                                            if($BOARD_INFO->BOARD_SEQ == $val->BOARD_SEQ){
                                                echo "<li class=\"on\"><a href=\"/Board/g/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            }else{
                                                echo "<li><a href=\"/Board/g/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            }
                                            break;
                                        
                                        case 2:
                                            // 동영상 게시판
                                            if($BOARD_INFO->BOARD_SEQ == $val->BOARD_SEQ){
                                                echo "<li class=\"on\"><a href=\"/Board/v/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            }else{
                                                echo "<li><a href=\"/Board/v/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
                                            }
                                            break;
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <input type="hidden" name="board_seq" value="<?php echo $BOARD_INFO->BOARD_SEQ?>">
                        <input type="hidden" name="post_seq" value="<?php echo $POST_INFO->POST_SEQ?>">

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php echo $BOARD_INFO->BOARD_KOR_NAME?></h2>
                                </div>
                                <div class="subContSec">
                                    <div class="boardViewTop">
                                        <div class="type_table">
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <div class="type_td">
                                                        
                                                    <?php 
                                                date_default_timezone_set('Asia/Seoul');
                                                if($BOARD_INFO->BOARD_PERIOD_NEW > 0){
                                                    if(time() - strtotime($POST_INFO->POST_REG_DATE) < ( 86400 * $BOARD_INFO->BOARD_PERIOD_NEW )){
                                                        // echo "<img src=\"/static/front/img/ico_reply.png\" style=\"width:34px;height:20px;\">";												
                                                    };
                                                }
                                                    
                                                if($BOARD_INFO->BOARD_PERIOD_HOT > 0){
                                                    if($POST_INFO->POST_VIEW_CNT >= $BOARD_INFO->BOARD_PERIOD_HOT){
                                                        echo "<img src=\"/static/front/img/promotional.png\" style=\"width:30px;height:30px;\">";												
                                                    }
                                                }

                                                echo "<a href=\"/board/board_view/$POST_INFO->POST_SEQ\">".strip_tags($POST_INFO->POST_SUBJECT)."</a>";
                                                echo $POST_INFO->POST_SECRET_YN == "Y" ? "<img src=\"/static/front/img/ico_lock.png\" style=\"width:12px;height:18px;margin: 0 5px;\">" : "";
                                                ?>					
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col3">
                                                <div class="boardViewTop_item">
                                                    <strong>작성자</strong>
                                                    <div class="type_td">
                                                        <?php echo !empty($POST_INFO->ADMIN_NAME)? $POST_INFO->ADMIN_NAME : $POST_INFO->USER_NAME ?>
                                                    </div>
                                                </div>
                                                <div class="boardViewTop_item">
                                                    <strong>작성일</strong>
                                                    <div class="type_td">
                                                        <?php echo $POST_INFO->POST_REG_DATE; ?>
                                                    </div>
                                                </div>
                                                <div class="boardViewTop_item">
                                                    <strong>조회수</strong>
                                                    <div class="type_td">
                                                        <?php echo $POST_INFO->POST_VIEW_CNT;?>
                                                    </div>
                                                </div>                                                
                                            </div>

                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>첨부파일</strong>
                                                    <div class="type_td">
                                                        <ul class="fileList">
                                                            <li class="file_item">
                                                                <?php
                                                                 foreach($ATTACH as $at){ 
                                                                     ?>
                                                                    <a href="/Board/downalod_attach/<?php echo $at->ATTACH_SEQ?>" title="파일 다운로드 하기"><em><?php echo $at->ATTACH_FILE_NAME;?></em></a>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </li>
                                                        </ul>								
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="boardViewCont">
                                        <div class="View_cont" style="text-align:center;">
                                            <?php if($BOARD_INFO->BOARD_TYPE == 2):?>
												<div id="player"></div>
											<?php endif;?>
                                            <?php if($BOARD_INFO->BOARD_TYPE == 1):
                                                foreach($ATTACH as $at){ 
                                                    // $allow_types에 포함되는 경우 이미지를 뿌려준다.
                                                    $filepath = $at->ATTACH_FILE_PATH;
                                                    $filetype = explode(".", $filepath);
                                                    $allow_types = ["jpg", "png", "jpeg", "bmp", "gif"];
                                                    if(in_array(strtolower($filetype[1]), $allow_types)){
                                                        echo "<img src=\"". $at->ATTACH_FILE_PATH."\">";
                                                    }
                                                }
                                                ?>
                                                <br><br>
											<?php endif;?>
                                            <?php echo $POST_INFO->POST_CONTENTS;?>
                                        </div>
                                    </div>


                                    
                                    <?php
                                    // 댓글 등록 기능 활성화 여부
                                    if($BOARD_INFO->BOARD_COMMENT_FLAG == 'Y'): ?>
                                    <div class="commentCont">
                                        <div class="commentList">
                                            <?php foreach($COMMENTS as $cm):?>
                                            <div class="comment_item">
                                                <div class="comment_sub01">
                                                    <p class="name"><?php echo $cm->USER_ID?></p>
                                                    <p class="ip">(<?php echo $cm->COM_REG_IP?>)</p>
                                                </div>
                                                <div class="comment_sub02">
                                                    <p><?php echo $cm->COM_CONTENTS?></p>
                                                </div>
                                                <div class="comment_sub03">
                                                    <p class="date"><?php echo $cm->COM_REG_DATE?></p>
                                                    <!-- <p class="time">17:39:33</p> -->
                                                    <?php if($cm->COM_USER_SEQ == $this->session->userdata("USER_SEQ")){?>
                                                        <p class="delete"><button type="button" onclick="comment_del(<?php echo $cm->COM_SEQ;?>)"><img src="/static/front/html/static/img/icon_comment_del.png" alt="댓글삭제"></button></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <!-- <div class="pagination">
                                            <a href="/" class="btn_prev"><span>맨처음</span></a>
                                            <span>1</span>
                                            <a href="/">2</a>
                                            <a href="/" class="btn_next"><span>맨마지막</span></a>
                                        </div> -->

                                        <?php if($this->session->userdata("USER_SEQ")):?>

                                        <div class="comment_write">
                                            
                                            <div class="comment_write_con">
                                                <div class="write_box">

                                                    <textarea cols="30" row="5" name="contents"></textarea>
                                                </div>
                                                <div class="comment_write_btn"><a type="button" onclick="comment_write()">등록</a></div>
                                            </div>

                                        </div>
                                        <?php endif;?>

									<?php endif;?>

                                    


                                    </div>

                                    <?php if($BOARD_INFO->BOARD_BOTTOM_LIST_FLAG == "Y"):  ?>
                                    <?php if($NEXT): ?>
                                    <div class="boardViewBot">
                                        <div class="type_table">
                                            <div class="cont_next">
                                                <div class="boardViewBot_item">
                                                <strong>다음글</strong>
                                                <div class="type_td">
                                                    <?php 
                                                    echo "<a class=\"ellipsis\" href=\"/board/board_view/".$NEXT->POST_SEQ."\">";
                                                    if($NEXT->POST_PARENT_SEQ != $NEXT->POST_SEQ){
                                                        for($i=1; $i<$NEXT->POST_DEPTH;$i++){
                                                            echo "ㄴ<img src=\"/static/front/img/ico_reply.png\" style=\"width:34px;height:20px;vertical-align:text-top\">";												
                                                        }
                                                    }
                                                    echo $this->customclass->strcut(strip_tags($NEXT->POST_SUBJECT), 100);
													if($NEXT->POST_SECRET_YN == "Y"){
														echo "&nbsp<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>"."</a>";
													}
													?> </a>
                                                    <span class="date"><?php echo date("Y-m-d", strtotime($NEXT->POST_REG_DATE))?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($PREV): ?>
                                    <div class="boardViewBot">
                                        <div class="type_table">
                                            <div class="cont_prev">
                                                <div class="boardViewBot_item">
                                                <strong>이전글</strong>
                                                <div class="type_td">
                                                    <?php 
                                                    echo "<a class=\"ellipsis\" href=\"/board/board_view/".$PREV->POST_SEQ."\">";
                                                    if($PREV->POST_PARENT_SEQ != $PREV->POST_SEQ){
                                                        for($i=1; $i<$PREV->POST_DEPTH;$i++){
                                                            echo "ㄴ<img src=\"/static/front/img/ico_reply.png\" style=\"width:34px;height:20px;vertical-align:text-top\">";												
                                                        }
                                                    }
													echo $this->customclass->strcut(strip_tags($PREV->POST_SUBJECT), 100);
													if($PREV->POST_SECRET_YN == "Y"){
														echo "&nbsp<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>"."</a>";
													}
													?> </a>
                                                    <span class="date"><?php echo date("Y-m-d", strtotime($PREV->POST_REG_DATE))?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_left">
                                    

                                            <a href="/Board/<?php echo $BOARD_TYPE . "/" . $GROUP_INFO->GP_SEQ?>?seq=<?php echo $BOARD_INFO->BOARD_SEQ?>"  class="btn_style01 ">목록보기</a>
                                        </div>
                                        <?php if($BOARD_INFO->BOARD_ADMIN_FLAG == 'N'): ?>
                                        <?php if($POST_INFO->USER_SEQ == $this->session->userdata("USER_SEQ")  && $POST_INFO->USER_SEQ != NULL):?>
                                        <div class="btn_box f_right">
                                            <a href="/Board/board_modify/<?php echo $POST_INFO->POST_SEQ?>" class="btn_style02 ml5">수정</a>
                                        </div>
                                        <?php endif?>
                                        
                                        <?php if($this->session->userdata("USER_SEQ")):?>
                                        <?php if($BOARD_INFO->BOARD_TYPE == 0):?>
                                        <div class="btn_box f_right">
                                            <a href="/Board/board_reply/<?php echo $POST_INFO->POST_SEQ?>" class="btn_style02">답글</a>
                                        </div>
                                        <?php endif?>
                                        <?php endif?>
                                        
                                        <?php 
                                        if($POST_INFO->USER_SEQ == $this->session->userdata("USER_SEQ") && $POST_INFO->USER_SEQ != NULL):?>
                                        <div class="btn_box f_right">
                                            
                                            <a href="#" onclick="board_delete()" class="btn_style01">삭제</a>
                                        </div>
                                        <?php endif?>
                                        <?php endif?>

                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

        <?php include 'footer.php'; ?>

        </div>

    </body>
</html>
<script type="text/javascript" src="/js/google-player-api.js"></script>

<script>
let board_seq = $("input[name=board_seq]").val();
let post_seq = $("input[name=post_seq]").val();

<?php if($BOARD_INFO->BOARD_TYPE == 2):?>
		video_id = "<?php echo $POST_INFO->POST_YOUTUBE_URL;?>";
		video_width = "640";
		video_height = "480";
		tag.src = "https://www.youtube.com/iframe_api";
<?php endif; ?>


function board_delete(){
    if(confirm("게시글을 삭제하시겠습니까? 삭제 후 복구 할 수 없습니다.")){
        $.ajax({
            url:"/Board/post_delete",
            type:"post",
            data:{
                "post_seq" : post_seq
            },
            dataType:"json",
            success:function(data){
                let code = data["code"];
                let msg = data["msg"]
                alert(msg);
                if(code == 200){
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
                }
            }, error:function(e){
                console.log(e.reponseText);
            }
        });
    }
}

function board_reply(){
    alert("2")
}

function board_modify(){
    alert("3")
}

function comment_write(){
    let contents = $("textarea[name=contents]").val();
    if(contents == ""){
        alert("내용을 입력해주세요.");
        return false;
    }
    $.ajax({
        url:"/Board/comment_regist",
        type:"post",
        data:{
            "post_seq" : post_seq,
            "comment_content" : contents
        }, success:function(data){
            if(data){
                location.reload();
            }
        }, error:function(e){
            console.log(e.responseText);
        }
    });
}

function comment_del(seq){

    if(confirm("정말로 삭제하시겠습니까?")){
        $.ajax({
        url:"/Board/comment_del",
        type:"post",
        data:{
            "com_seq" : seq
        },
        dataType:"text",
        success:function(data){
            location.reload();
        }, error:function(e){
            console.log(e.responseText);
        }
    })
    }
}

</script>
