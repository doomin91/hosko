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
                        <form name="tag" id="">

                        <?php if(isset($BOARD_INFO)){
                        ?>
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php echo $BOARD_INFO->BOARD_KOR_NAME?></h2>
                                </div>
                                <div class="subContSec">

                                    <div class="boardTotallist clearfix">
                                        <p>총 <?php echo $listCount;?>개의 글이 등록 되어있습니다.</p>
                                    </div>
                                    <div class="tblArea boardList_flex"> 
                                        <div class="tblTop">
                                            <span class="col_num">번호</span>
                                            <span class="col_tit">제목</span>
                                            <span class="col_name">글쓴이</span>
                                            <span class="col_hit">조회</span>
                                            <span class="col_date">작성일</span>
                                        </div>
                                        <?php
                                         foreach ($lists as $lt){ ?>
                                        <div class="tblBot-item">
                                            <span class="col_num"><?php 
                                            if($lt->POST_NOTICE_YN == 'Y'){
                                                echo "[공지]";
                                            } else {
                                                echo $pagenum;
                                            }
									    ?></span>
                                            <span class="col_tit">
                                            <?php 
                                                date_default_timezone_set('Asia/Seoul');
                                                if($BOARD_INFO->BOARD_PERIOD_NEW > 0){
                                                    if(time() - strtotime($lt->POST_REG_DATE) < ( 86400 * $BOARD_INFO->BOARD_PERIOD_NEW )){
                                                        echo "[NEW ICON]";												
                                                    };
                                                }
                                                    
                                                if($BOARD_INFO->BOARD_PERIOD_HOT > 0){
                                                    if($lt->POST_VIEW_CNT >= $BOARD_INFO->BOARD_PERIOD_HOT){
                                                        echo "[HOT ICON]";
                                                    }
                                                }

                                                echo "<a href=\"/board/board_view/$lt->POST_SEQ\">$lt->POST_SUBJECT</a>";
                                                echo $lt->POST_SECRET_YN == "Y" ? "[자물쇠 ICON]" : "";
                                                echo $lt->ATTACHS > 0 ? "[첨부파일 ICON]" : "";

                                                ?></span>
                                            <span class="col_name"><?php echo $lt->USER_NAME?></span>
                                            <span class="col_hit"><?php echo $lt->POST_VIEW_CNT?></span>
                                            <span class="col_date">2021-05-14</span>                                            
                                        </div>
                                        <?php 
                                        $pagenum -= 1;} 
                                        ?>
                                    </div>

                                    <div class="subBtn_Write f_right mt40">
                                        <a href="/Board/board_write/<?php echo $BOARD_INFO->BOARD_SEQ?>">글쓰기</a>
                                    </div>

                                        <?php echo $pagination; ?>

                                    <div class="boardSearchWrap">
                                        <!-- <input type="hidden" name="page" value="1"> -->
                                        <!-- <input type="hidden" name="num" value=""> -->
                                        
                                        
                                            <div class="boardSearch">
                                                <select name="search_field">
                                                    <option value="all" <?php echo $searchField == "all" ?  "selected" : "" ?>>전체</option>
                                                    <option value="SUBJECT" <?php echo $searchField == "SUBJECT" ?  "selected" : "" ?>>제목</option>
                                                    <option value="CONTENTS" <?php echo $searchField == "CONTENTS" ?  "selected" : "" ?>>내용</option>
                                                    <option value="USER_NAME" <?php echo $searchField == "USER_NAME" ?  "selected" : "" ?>>글쓴이</option>
                                                </select>
                                                <div class="inputSearch">
                                                    <input type="text" name="search_string" value="<?php echo $searchString; ?>" maxlength="50">
                                                    <input type="submit" value="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                            <?php } else { ?>

                                <div class="subContWrap">
                                <div class="subTit">
                                    <h2>페이지 준비중</h2>
                                </div>
                            </div>

                            <?php } ?>






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





