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
                                    echo "<li><a href=\"?seq=$val->BOARD_SEQ\">$val->BOARD_KOR_NAME</li>";
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="inner">
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
                                            <span class="col_num"
                                            ><?php 
                                            if($lt->POST_NOTICE_YN == 'Y'){
                                                echo "<span style=\"color:red;\">[공지]</span> ";
                                            } else {
                                                echo $pagenum;
                                            }
									    ?></span>
                                            <span class="col_tit"><a href="news_view.php">
                                            <?php 
                                                date_default_timezone_set('Asia/Seoul');
                                                if($BOARD_INFO->BOARD_PERIOD_NEW > 0){
                                                    if(time() - strtotime($lt->POST_REG_DATE) < ( 86400 * $BOARD_INFO->BOARD_PERIOD_NEW )){
                                                        echo "<label class=\"label label-red\">new</label>";												
                                                    };
                                                }
                                                    
                                                if($BOARD_INFO->BOARD_PERIOD_HOT > 0){
                                                    if($lt->POST_VIEW_CNT >= $BOARD_INFO->BOARD_PERIOD_HOT){
                                                        echo "<label class=\"label label-hotpink\">hot</label>";
                                                    }
                                                }
                                                echo $lt->POST_SUBJECT;

                                                // 비밀글
                                                if($lt->POST_SECRET_YN == "Y"){
                                                    echo "&nbsp<i class=\"fa fa-lock\" aria-hidden=\"true\"></i>";
                                                }
                                                ?> </a></span>
                                            <span class="col_name">홍길동</span>
                                            <span class="col_hit">5</span>
                                            <span class="col_date">2021-05-14</span>                                            
                                        </div>
                                        <?php 
                                        $pagenum -= 1;} 
                                        ?>
                                    </div>

                                    <div class="subBtn_Write f_right mt40">
                                        <a href="/">글쓰기</a>
                                    </div>

                                    <div class="pagination">
                                        <?php echo $pagination; ?>
                                        <a href="/" class="btn_prev"><span>맨처음</span></a>
                                        <span>1</span>
                                        <a href="/">2</a>
                                        <a href="/">3</a>
                                        <a href="/">4</a>
                                        <a href="/">5</a>
                                        <a href="/" class="btn_next"><span>맨마지막</span></a>
                                    </div>

                                    <div class="boardSearchWrap">
                                        <form name="" id="" method="">
                                        <input type="hidden" name="page" value="1">
                                        <input type="hidden" name="num" value="">

                                            <div class="boardSearch">
                                                <select name="">
                                                    <option value="all" selected="selected">전체</option>
                                                </select>
                                                <div class="inputSearch">
                                                    <input type="text" name="" value="" maxlength="50">
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






