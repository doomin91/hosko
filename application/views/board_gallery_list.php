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
                                    <h2>Photo Album</h2>
                                </div>
                                <div class="subContSec">

                                    <div class="boardTotallist clearfix">
                                        <p>총 <?php echo $listCount;?>개의 이미지가 등록 되어있습니다.</p>
                                    </div>


                                    <div class="galleryBoardList"> 
                                        <ul>
                                            <li>
                                                <a href="gallery_view.php">
                                                    <div class="galleryBox">

                                                        <div class="galleryTopph">
                                                            <img src="/static/front/html/static/img/gallery_t.jpg">
                                                        </div>

                                                        <div class="galleryCon">
                                                            <div class="description">미국 플로리다 마이애미 비치의 초특급호텔 폰테인에서 여러분을 초대합니다.</div>
                                                            <div class="galleryConfoot">
                                                                <span class="date">2021-03-08</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/">
                                                    <div class="galleryBox">

                                                        <div class="galleryTopph">
                                                            <img src="/static/front/html/static/img/gallery_t.jpg">
                                                        </div>

                                                        <div class="galleryCon">
                                                            <div class="description">미국 플로리다 마이애미 비치의 초특급호텔 폰테인에서 여러분을 초대합니다.</div>
                                                            <div class="galleryConfoot">
                                                                <span class="date">2021-03-08</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/">
                                                    <div class="galleryBox">

                                                        <div class="galleryTopph">
                                                            <img src="/static/front/html/static/img/gallery_t.jpg">
                                                        </div>

                                                        <div class="galleryCon">
                                                            <div class="description">미국 플로리다 마이애미 비치의 초특급호텔 폰테인에서 여러분을 초대합니다.</div>
                                                            <div class="galleryConfoot">
                                                                <span class="date">2021-03-08</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/">
                                                    <div class="galleryBox">

                                                        <div class="galleryTopph">
                                                            <img src="/static/front/html/static/img/gallery_t.jpg">
                                                        </div>

                                                        <div class="galleryCon">
                                                            <div class="description">미국 플로리다 마이애미 비치의 초특급호텔 폰테인에서 여러분을 초대합니다.</div>
                                                            <div class="galleryConfoot">
                                                                <span class="date">2021-03-08</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>




                                        </ul>
                                    </div>


                                    <div class="subBtn_List f_right mt40">
                                        <a href="/">목록보기</a>
                                    </div>

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






