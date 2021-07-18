<?php
    include_once dirname(__DIR__)."/header.php";
?>

    <body>

        <div id="wrap" class="main_wrap">

            <?php
                include_once dirname(__DIR__)."/nav.php";
            ?>

            <div id="container">
                <div class="layout_sub">
                    <div class="sub_visual v01">
                        <div class="sub_visual_text">
                            <h1>온라인 상담</h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                            <ul>
                                <li><a href="/">Q&A</a></li>
                                <li class="on"><a href="/">온라인 상담</a></li>
                                <li><a href="/">방문상담신청</a></li>
                                <li><a href="/">포지션&연수 지원</a></li>
                                <li><a href="/">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>온라인 상담</h2>
                                </div>
                                <div class="subContSec">

                                    <div class="boardTotallist clearfix">
                                        <p>총 <?php echo $listCount; ?>개의 글이 등록 되어있습니다.</p>
                                    </div>
                                    <div class="tblArea boardList_flex"> 
                                        <div class="tblTop">
                                            <span class="col_num">번호</span>
                                            <span class="col_tit">제목</span>
                                            <span class="col_name">글쓴이</span>
                                            <span class="col_date">작성일</span>
                                        </div>
                                    <?php   
                                        if (!empty($lists)){
                                            foreach($lists as $list){
                                    ?>
                                        <div class="tblBot-item">
                                            <span class="col_num"><?php echo $pagenum; ?></span>
                                            <span class="col_tit"><a href="/consult/onlineConsultView/<?php echo $list->OC_SEQ; ?>"><?php echo $list->OC_SUBJECT; ?></a></span>
                                            <span class="col_name"><?php echo $list->USER_NAME; ?></span>
                                            <span class="col_date"><?php echo $list->OC_REG_DATE; ?></span>                                            
                                        </div>
                                    <?php 
                                            $pagenum--;
                                            }
                                        }else{ 
                                    ?>
                                        <div class="tblBot-item">      
                                            <span class="col_name">문의한 글이 없습니다.</span>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    </div>

                                    <div class="subBtn_Write f_right mt40">
                                        <!--a href="/">글쓰기</a-->
                                        <button type="button" class="memberBtnOk f_left" id="consultWrite">문의하기</button>
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
                                            <form name="sfrom" method="get">
                                                <select name="searchField">
                                                    <option value="all" selected="selected">전체</option>
                                                    <option value="oc_subject" selected="selected">제목</option>
                                                    <option value="oc_contents" selected="selected">내용</option>
                                                </select>
                                                <div class="inputSearch">
                                                    <input type="text" name="searchString" value="" maxlength="50">
                                                    <input type="submit" value="">
                                                </div>
                                            </form>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

        <?php
            include_once dirname(__DIR__)."/footer.php";
        ?>

        </div>

    </body>
</html>
<script type="text/javascript">
    $(function(){
        $(document).on("click", "#consultWrite", function(){
            document.location.href="/consult/onlineConsultWrite"
        })

    });
</script>





