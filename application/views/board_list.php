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
                                        if(count($lists) > 0){
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

                                                if($lt->POST_PARENT_SEQ != $lt->POST_SEQ){
                                                    for($i=1; $i<$lt->POST_DEPTH;$i++){
                                                        echo "ㄴ<img src=\"/static/front/img/ico_reply.png\" style=\"width:30px;height:17px;vertical-align: middle;margin: 0 5px;\">";												
                                                    }
                                                }

                                                if($BOARD_INFO->BOARD_PERIOD_NEW > 0){
                                                    if(time() - strtotime($lt->POST_REG_DATE) < ( 86400 * $BOARD_INFO->BOARD_PERIOD_NEW )){
                                                        // echo "<img src=\"/static/front/img/ico_reply.png\" style=\"width:34px;height:20px;\">";												
                                                    };
                                                }
                                                    
                                                if($BOARD_INFO->BOARD_PERIOD_HOT > 0){
                                                    if($lt->POST_VIEW_CNT >= $BOARD_INFO->BOARD_PERIOD_HOT){
                                                        echo "<img src=\"/static/front/img/promotional.png\" style=\"width:30px;height:30px;\">";												
                                                    }
                                                }

                                                if($lt->POST_DEL_YN == "N") {
                                                if($lt->POST_SECRET_YN == "Y"){
                                                    if($lt->POST_USER_SEQ == $this->session->userdata("USER_SEQ") || $this->session->userdata("admin_seq")){
                                                        echo "<a href=\"/board/board_view/$lt->POST_SEQ\">$lt->POST_SUBJECT</a>";
                                                    } else {
                                                        echo "<a onclick=\"alert('게시글 권한이 없습니다.');\">" . $this->customclass->strcut(strip_tags($lt->POST_SUBJECT), 100) . "</a>";
                                                    }
                                                    echo "<img src=\"/static/front/img/ico_lock.png\" style=\"width:12px;height:18px;margin: 0 5px;\">";												
                                                } else {
                                                    echo "<a href=\"/board/board_view/$lt->POST_SEQ\">".$this->customclass->strcut(strip_tags($lt->POST_SUBJECT),100)."</a>";
                                                }

                                                    echo $lt->ATTACHS > 0 ? "[". ($lt->ATTACHS) ."]" : "";
                                                } else {
                                                    echo "삭제된 게시글 입니다.";
                                                }

                                                ?></span>
                                            <span class="col_name"><?php echo !empty($lt->ADMIN_NAME)? $lt->ADMIN_NAME : $lt->USER_NAME ?></span>
                                            
                                            <span class="col_hit"><?php echo $lt->POST_VIEW_CNT?></span>
                                            <span class="col_date"><?php echo date("Y-m-d", strtotime($lt->POST_REG_DATE));?></span>                                            
                                        </div>
                                        <?php 
                                        $pagenum -= 1;} 
                                            } else {
                                                echo "<div class=\"tblBot-item\">";
                                                echo "<span>게시글이 없습니다 :( </span>";
                                                echo "</div>";
                                            }
                                        ?>
                                    </div>

                                    <?php if($this->session->userdata("USER_SEQ")): ?>
                                    <div class="subBtn_Write f_right mt40">
                                        <a href="/Board/board_write/<?php echo $GROUP_INFO->GP_SEQ . "?seq=" . $BOARD_INFO->BOARD_SEQ?>">글쓰기</a>
                                    </div>
                                    <?php endif; ?>

                                        <?php echo $pagination; ?>

                                    <div class="boardSearchWrap">
                                        <!-- <input type="hidden" name="page" value="1"> -->
                                        <input type="hidden" name="seq" value="<?php echo $BOARD_SEQ?>">
                                        
                                        
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






