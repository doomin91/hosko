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
                                    <h2>방문상담 신청</h2>
                                </div>
                                <div>
                                    <p>방문상담 셀프신청 이용안내</p>
                                    <p>STEP1 일정을 확인하고 상담을 원하는 날짜를 클릭해주세요</p>
                                    <p>STEP2 '상담신청' 버튼을 눌러 신청을 진행해주세요</p>
                                    <p style="padding-left:50px;">상담희망자의 이름과 상담희망시간, 연락처, 이메일은 필수적으로 적어주세요</p>
                                    <p style="padding-left:50px;">상담 가능한 시간은 월~금 오전 10시부터 오후5시까지 이며, 점심시간은 12시부터 오후 1시까지 1시간 입니다.</p>
                                    <p>STEP3 상담 신청완료를 진행하시면, HOSKO에서 확인전화를 통해 에약을 확정해드립니다.</p>
                                    <p>TIP** 방문상담 전에 홈페이지 회원가입을 진행해주세요. 기본적인 이력과 분야를 미리 분석하여 좀 더 정확하고 많은 정보를 제공해드립니다.</p>
                                </div>
                                
                                <div class="subContSec">
                                    <div class="col-lg-12">
                                        <div class="col-lg-6">
                                        <?php
                                            $dateArr = explode("-", $visit_date);
                                            echo $dateArr[0]."년 ".$dateArr[1]."월 ".$dateArr[2]."일 예약목록";
                                        ?>
                                        </div>
                                        <div class="col-lg-6">

                                            <button type="button" class="btn_style02 f_right" id="<?php if ($diff_str == "-"){ echo "visit_error"; }else{ echo "visit_write"; } ?>" data-date="<?php echo $visit_date; ?>">상담신청</button>
                                        </div>
                                    </div>    
                                    <div class="tblArea boardList_flex"> 
                                        <div class="tblTop">
                                            <span class="col_num">번호</span>
                                            <span class="col_name">신청자</span>
                                            <span class="col_name">테스트시간</span>
                                            <span class="col_date">연락처</span>
                                            <span class="col_date">예약구분</span>
                                            <span class="col_date">수정</span>
                                            <span class="col_date">삭제</span>
                                        </div>
                                    
                                    <?php 
                                    if (!empty($lists)){
                                        foreach ($lists as $list){
                                    ?>
                                        <div class="tblBot-item">  
                                            <span class="col_num"><?php echo $pagenum; ?></span>
                                            <span class="col_name"><?php echo $list->VCON_USER_NAME; ?></span>
                                            <span class="col_name"><?php echo $list->VCON_CONSULT_TIME; ?></span>
                                            <span class="col_date"><?php echo $list->VCON_USER_TEL; ?></span>
                                            <span class="col_date">완료</span>
                                            <span class="col_date">
                                                <button type="button" class="btn btn-info btn-sm vcon_edit" data-seq="<?php echo $list->VCON_SEQ; ?>">수정</button>
                                            </span>
                                            <span class="col_date">
                                                <button type="button" class="btn btn-danger btn-sm vcon_delete" data-seq="<?php echo $list->VCON_SEQ; ?>">삭제</button>
                                            </span>
                                        </div>
                                    <?php
                                            $pagenum--;
                                        }
                                    }else{
                                    ?>
                                        <div class="tblBot-item">      
                                            <span class="col_name">문의한 글이 없습니다.</span>
                                        </div>
                                    <?php } ?>
                                        
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

        $(document).on("click", "#visit_error", function(){
            alert("방문상담 신청할 수 없는 날짜 입니다.")
        });

        $(document).on("click", ".vcon_edit", function(){
            seq = $(this).data("seq");
            document.location.href="/consult/visitConsultPassCheck/?vcon_seq="+seq+"&mode=edit";
        });

        $(document).on("click", ".vcon_delete", function(){
            seq = $(this).data("seq");
            document.location.href="/consult/visitConsultPassCheck/?vcon_seq="+seq+"&mode=delete";
        });
       

    });
</script>