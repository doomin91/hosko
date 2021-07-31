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
                                <li><a href="/consult/qnaList">Q&A</a></li>
                                <li class="on"><a href="/consult/onlineConsultList">온라인 상담</a></li>
                                <li><a href="/consult/visitConsult">방문상담신청</a></li>
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
                                    <div class="boardViewTop">
                                        <div class="type_table">
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>제목</strong>
                                                    <div class="type_td">
                                                        <?php echo $ocInfo->OC_SUBJECT; ?>										
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>등록일</strong>
                                                    <div class="type_td">
                                                        <?php echo $ocInfo->OC_REG_DATE; ?>										
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>상담내용</strong>
                                                    <div class="type_td">
                                                        <?php echo nl2br($ocInfo->OC_CONTENTS); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($ocInfo->OC_ANSWER_FLAG == "Y"){ ?>
                                            <div class="col1">
                                                <div class="boardViewTop_item">
                                                    <strong>답변내용</strong>
                                                    <div class="type_td">
                                                        <?php echo nl2br($ocInfo->OC_ANSWER); ?>		
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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
            document.location.href="/consult/onlineConsultList"
        })

    });
</script>