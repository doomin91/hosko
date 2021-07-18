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

                                    <div class="boardTotallist clearfix">
                                        <p>총 <?php echo $listCount;?>개의 동영상이 등록 되어있습니다.</p>
                                    </div>


                                    <div class="movieBoardList"> 
                                        <?php foreach ($lists as $key => $lt){ ?>
                                            <?php if($key % 4 == 0 || $key == 0){
                                                echo "<ul>";
                                            } ?>
                                            <li>
                                                <a href="/board/board_view/<?php echo $lt->POST_SEQ?>">
                                                    <div class="movieBox">

                                                        <div class="movieTopph">
                                                            <div class="movieNumber"><?php echo $pagenum?></div>
                                                            <img class="thumnail_img" style="height:200px" src="https://img.youtube.com/vi/<?php echo $lt->POST_YOUTUBE_URL?>/mqdefault.jpg;?>\">

                                                        </div>

                                                        <div class="movieCon">
                                                            <div class="description"><?php echo $lt->POST_SUBJECT?></div>
                                                            <div class="name"><?php echo $lt->USER_NAME?></div>
                                                            <div class="movieConfoot">
                                                                <span class="date"><?php echo $lt->POST_REG_DATE?></span>
                                                                <span class="hit"><?php echo $lt->POST_VIEW_CNT?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>


                                    <?php if($this->session->userdata("USER_SEQ")): ?>
                                    <div class="subBtn_Write f_right mt40">
                                        <a href="/Board/board_write/<?php echo $GROUP_INFO->GP_SEQ . "?seq=" . $BOARD_INFO->BOARD_SEQ?>">글쓰기</a>
                                    </div>
                                    <?php endif; ?>>

                                    <div class="pagination">
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






