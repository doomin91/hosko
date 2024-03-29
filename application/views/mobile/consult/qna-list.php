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
                            <h1>상담ㆍ신청</h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                            <ul>
                                <li class="on"><a href="/m/consult/qnaList">Q&A</a></li>
                                <li><a href="/m/consult/onlineConsultList">온라인 상담</a></li>
                                <li><a href="/m/consult/visitConsult">방문신청 상담</a></li>
                                <li><a href="/m/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="/m/consult/presentationList">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>Q&A</h2>
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
                                                $replyStr = "";
                                                for ($i=0; $i<$list->QNA_DEPTH; $i++){
                                                    $replyStr .= "<img src=\"/static/front/img/ico_reply.png\" style=\"width:34px;height:20px;\">&nbsp;";
                                                }
                                                $q_user_seq = $this->customclass->getQuestionUserSeq($list->QNA_GROUP);
                                    ?>
                                        <div class="tblBot-item">
                                            <span class="col_num"><?php echo $pagenum; ?></span>
                                        <?php if (($this->session->userdata("USER_SEQ") == $list->QNA_USER_SEQ) || ($this->session->userdata("USER_SEQ") == $q_user_seq)){ ?>
                                            <span class="col_tit"><?php echo $replyStr; ?><a href="/m/consult/qnaView/<?php echo $list->QNA_SEQ; ?>"><?php echo $list->QNA_SUBJECT; ?></a></span>
                                        <?php }else{ ?>    
                                            <span class="col_tit"><?php echo $replyStr; ?><a href="javascript:alert('질문 작성자만 확인 가능합니다.');"><?php echo $list->QNA_SUBJECT; ?></a></span>
                                        <?php } ?>
                                            <span class="col_name"><?php echo $list->QNA_USER_NAME; ?></span>
                                            <span class="col_date"><?php echo substr($list->QNA_REG_DATE, 0, 10); ?></span>                                            
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

                                    <div class="row">
                                        <div class="f_left mt30 col-lg-3">
                                            <!--a href="/">글쓰기</a-->
                                            <!-- <button type="button" class="btn_style01 f_left" id="qnaList">목록보기</button> -->
                                        </div>
                                        <div class="f_center mt30 col-lg-6">
                                            <?php echo $pagination; ?>    
                                        </div>
                                        <div class="f_right mt30 col-lg-3">
                                            <!--a href="/">글쓰기</a-->
                                            <button type="button" class="btn_style02 f_right" id="qnaWrite">문의하기</button>
                                        </div>
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
        $(document).on("click", "#qnaWrite", function(){
            document.location.href="/consult/qnaWrite"
        })

    });
</script>





