<?php include 'header.php'; ?>

    <body>

        <div id="wrap" class="main_wrap">

            <?php include 'nav.php'; ?>

            <div id="container">
                <div class="layout_sub">
                    <div class="sub_visual v01">
                        <div class="sub_visual_text">
                            <h1>공지 & 뉴스</h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                            <ul>
                                <li class="on"><a href="/">호스코뉴스</a></li>
                                <li><a href="/">해외취업후기</a></li>
                                <li><a href="/">출국회원소식</a></li>
                                <li><a href="/">동영상자료실</a></li>
                                <li><a href="/">갤러리</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>호스코 뉴스</h2>
                                </div>
                                <div class="subContSec">

                                    <div class="boardTotallist clearfix">
                                        <p>총 88개의 글이 등록 되어있습니다.</p>
                                    </div>
                                    <div class="tblArea boardList_flex"> 
                                        <div class="tblTop">
                                            <span class="col_num">번호</span>
                                            <span class="col_tit">제목</span>
                                            <span class="col_name">글쓴이</span>
                                            <span class="col_hit">조회</span>
                                            <span class="col_date">작성일</span>
                                        </div>
                                        <div class="tblBot-item">
                                            <span class="col_num">1</span>
                                            <span class="col_tit"><a href="news_view.php">공지사항입니다.</a></span>
                                            <span class="col_name">홍길동</span>
                                            <span class="col_hit">5</span>
                                            <span class="col_date">2021-05-14</span>                                            
                                        </div>
                                    </div>

                                    <div class="subBtn_Write f_right mt40">
                                        <a href="/">글쓰기</a>
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






