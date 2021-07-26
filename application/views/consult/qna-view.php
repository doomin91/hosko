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
                                <li class="on"><a href="/consult/qnaList">Q&A</a></li>
                                <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                                <li><a href="/">방문상담신청</a></li>
                                <li><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="#">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>Q&A</h2>
                                </div>
                                <div class="subContSec">
                                    <div class="boardViewTop">
                                        <div class="type_table">
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>제목</strong>
                                                    <div class="type_td">
                                                        <?php echo $qnaInfo->QNA_SUBJECT; ?>										
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>이름</strong>
                                                    <div class="type_td">
                                                        <?php echo $qnaInfo->QNA_USER_NAME; ?>										
                                                    </div>
                                                    <strong>이메일</strong>
                                                    <div class="type_td">
                                                        <?php echo $qnaInfo->QNA_USER_EMAIL; ?>										
                                                    </div>
                                                    <strong>등록일</strong>
                                                    <div class="type_td">
                                                        <?php echo $qnaInfo->QNA_REG_DATE; ?>										
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>내용</strong>
                                                    <div class="type_td">
                                                        <?php echo nl2br($qnaInfo->QNA_CONTENTS); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_right">
                                            <button type="button" class="memberBtnOk f_left" id="consultlist">목록보기</button>
                                        </div>

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
        $(document).on("click", "#consultlist", function(){
            document.location.href="/consult/qnaList"
        })

    });
</script>