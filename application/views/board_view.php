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
                                    echo "<li><a href=\"/Board/q/$GROUP_INFO->GP_SEQ?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</a></li>";
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
                                    <div class="boardViewTop">
                                        <div class="type_table">
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong><?php echo $POST_INFO->POST_SEQ?></strong>
                                                    <div class="type_td">
                                                        
                                                    <?php 
                                                date_default_timezone_set('Asia/Seoul');
                                                if($BOARD_INFO->BOARD_PERIOD_NEW > 0){
                                                    if(time() - strtotime($POST_INFO->POST_REG_DATE) < ( 86400 * $BOARD_INFO->BOARD_PERIOD_NEW )){
                                                        echo "[NEW ICON]";												
                                                    };
                                                }
                                                    
                                                if($BOARD_INFO->BOARD_PERIOD_HOT > 0){
                                                    if($POST_INFO->POST_VIEW_CNT >= $BOARD_INFO->BOARD_PERIOD_HOT){
                                                        echo "[HOT ICON]";
                                                    }
                                                }

                                                echo "<a href=\"/board/board_view/$POST_INFO->POST_SEQ\">$POST_INFO->POST_SUBJECT</a>";
                                                echo $POST_INFO->POST_SECRET_YN == "Y" ? "[자물쇠 ICON]" : "";
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
                                                                <?php foreach($ATTACH as $at){ ?>
                                                                <a href="/admin/Board/downalod_attach/<?php echo $at->ATTACH_SEQ?>" title="파일 다운로드 하기"><em><?php echo $at->ATTACH_FILE_NAME;?></em></a>
                                                                <?php } ?>
                                                            </li>
                                                        </ul>								
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="boardViewCont">
                                        <div class="View_cont">
                                            <p><?php echo $POST_INFO->POST_CONTENTS;?></p>
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
                                                    <p class="delete"><button type="button" onclick="comment_del(<?php echo $cm->COM_SEQ;?>)"><img src="/static/front/html/static/img/icon_comment_del.png" alt="댓글삭제"></button></p>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="pagination">
                                            <a href="/" class="btn_prev"><span>맨처음</span></a>
                                            <span>1</span>
                                            <a href="/">2</a>
                                            <a href="/" class="btn_next"><span>맨마지막</span></a>
                                        </div>

                                        <div class="comment_write">

                                            <div class="comment_write_con">
                                                <div class="write_box">
                                                    <input type="hidden" name="board_seq" value="<?php echo $BOARD_INFO->BOARD_SEQ?>">
                                                    <input type="hidden" name="post_seq" value="<?php echo $POST_INFO->POST_SEQ?>">
                                                    <textarea cols="30" row="5" name="contents"></textarea>
                                                </div>
                                                <div class="comment_write_btn"><a type="button" onclick="comment_write()">등록</a></div>
                                            </div>

                                        </div>
									<?php endif;?>

                                    


                                    </div>



                                    <?php if($BOARD_INFO->BOARD_BOTTOM_LIST_FLAG == "Y"): ?>
                                    <div class="boardViewBot">
                                        <div class="type_table">
                                            <?php foreach($BOTTOM_LIST AS $bl):?>
                                                <?php if($bl->TYPE == "PREV"){
                                                        echo "<div class=\"cont_prev\">";
                                                        echo "<div class=\"boardViewBot_item\">";
                                                        echo "<strong>이전글</strong>";
                                                } else {
                                                        echo "<div class=\"cont_next\">";
                                                        echo "<div class=\"boardViewBot_item\">";
                                                        echo "<strong>다음글</strong>";
                                                    }?>
                                                    <div class="type_td">
                                                        
                                                        <a href="/" class="ellipsis">
                                                        <?php 
														echo "<a href=\"/board/board_view/".$bl->POST_SEQ."\">".$bl->POST_SUBJECT."</a>";
														if($bl->POST_SECRET_YN == "Y"){
															echo "&nbsp<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>";
														}
													    ?> </a>
                                                        <span class="date"><?php echo date("Y-m-d", strtotime($bl->POST_REG_DATE))?></span>
                                                    </div>
                                            <?php 
                                            echo "</div></div>";
                                            endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_left">
                                    

                                            <a href="/Board/<?php echo $BOARD_TYPE . "/" . $GROUP_INFO->GP_SEQ?>?seq=<?php echo $BOARD_INFO->BOARD_SEQ?>"  class="btn_style01 ">목록보기</a>
                                        </div>

                                        <div class="btn_box f_right">
                                            <a href="#" onclick="board_delete()" class="btn_style02">수정</a>
                                        </div>

                                        <div class="btn_box f_right">
                                            <a href="#" onclick="board_reply()" class="btn_style02">답글</a>
                                        </div>

                                        <div class="btn_box f_right">
                                            <a href="#" onclick="board_modify()" class="btn_style01">삭제</a>
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

    </body>
</html>

<script>
let board_seq = $("input[name=board_seq]").val();
let post_seq = $("input[name=post_seq]").val();

function board_delete(){
    alert("1")
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
        url:"/admin/Board/comment_regist",
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
