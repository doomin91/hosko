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

                                    <div class="commentCont">
                                        <div class="commentList">
                                            <div class="comment_item">
                                                <div class="comment_sub01">
                                                    <p class="name">홍지현</p>
                                                    <p class="ip">(14/47/147/136)</p>
                                                </div>
                                                <div class="comment_sub02">
                                                    <p>댓글 테스트</p>
                                                </div>
                                                <div class="comment_sub03">
                                                    <p class="date">2021-05-14</p>
                                                    <p class="time">17:39:33</p>
                                                    <p class="delete"><a href="/"><img src="/static/front/html/static/img/icon_comment_del.png" alt="댓글삭제"></a></p>
                                                </div>
                                            </div>
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
                                                    <textarea cols="30" row="5"></textarea>
                                                </div>
                                                <div class="comment_write_btn"><a href="/">등록</a></div>
                                            </div>
                                        </div>

                                        <div class="code_box">
                                            <div class="code_td">
                                                <div class="code_sub01">ec95c1</div>
                                                <div class="code_sub02"><input type="text"></div>
                                            </div>
                                            <p>*왼쪽의 자동등록방지 코드를 입력하세요.</p>
                                        </div>


                                    </div>



                                    <div class="boardViewBot">
                                        <div class="type_table">
                                            <div class="cont_prev">
                                                <div class="boardViewBot_item">
                                                    <strong>이전글</strong>
                                                    <div class="type_td">
                                                        <a href="/" class="ellipsis">문의드립니다.</a>
                                                        <span class="date">2021-05-14</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="cont_next">
                                                <div class="boardViewBot_item">
                                                    <strong>다음글</strong>
                                                    <div class="type_td">
                                                        <a href="/" class="ellipsis">문의드립니다.</a>
                                                        <span class="date">2021-05-14</span>
                                                    </div>
                                                </div>
                                            </div>
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






