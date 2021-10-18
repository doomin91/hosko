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
                            <li><a href="/m/consult/qnaList">Q&A</a></li>
                                <li><a href="/m/consult/onlineConsultList">온라인 상담</a></li>
                                <li class="on"><a href="/m/consult/visitConsult">방문신청 상담</a></li>
                                <li><a href="/m/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="/m/consult/presentationList">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>방문상담 신청</h2>
                                </div>

                                <div class="VisitTopText">
                                    <p>방문상담 셀프신청 이용안내</p>
                                    <p>STEP1 일정을 확인하고 상담을 원하는 날짜를 클릭해주세요</p>
                                    <p>STEP2 '상담신청' 버튼을 눌러 신청을 진행해주세요</p>
                                    <p style="padding-left:50px;">상담희망자의 이름과 상담희망시간, 연락처, 이메일은 필수적으로 적어주세요</p>
                                    <p style="padding-left:50px;">상담 가능한 시간은 월~금 오전 10시부터 오후5시까지 이며, 점심시간은 12시부터 오후 1시까지 1시간 입니다.</p>
                                    <p>STEP3 상담 신청완료를 진행하시면, HOSKO에서 확인전화를 통해 에약을 확정해드립니다.</p>
                                    <p>TIP** 방문상담 전에 홈페이지 회원가입을 진행해주세요. 기본적인 이력과 분야를 미리 분석하여 좀 더 정확하고 많은 정보를 제공해드립니다.</p>
                                </div>
                                <div class="subContSec mt30">

                                    <div class="col-lg-12 align-left datapaging">
                                        <a href="/m/consult/visitConsult/?strYear=<?php echo $year; ?>&strMon=<?php echo $month-1; ?>"><i class="fa fa-caret-left"></i></a>
                                        &nbsp;&nbsp;&nbsp;<?php echo $year; ?>년 <?php echo $month; ?>월 &nbsp;&nbsp;&nbsp;
                                        <a href="/m/consult/visitConsult/?strYear=<?php echo $year; ?>&strMon=<?php echo $month+1; ?>"><i class="fa fa-caret-right"></i></a>
                                    </div>

                                    <div class="table-responsive mb60"  role="grid" id="basicDataTable_wrapper">
                                        <table class="datatable CalendarTable" id="calendarTable">
                                        <colgroup>
                                                <col width="14%"/>
                                                <col width="14%"/>
                                                <col width="14%"/>
                                                <col width="14%"/>
                                                <col width="14%"/>
                                                <col width="14%"/>
                                                <col width="14%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th class="text-center">일</th>
                                                <th class="text-center">월</th>
                                                <th class="text-center">화</th>
                                                <th class="text-center">수</th>
                                                <th class="text-center">목</th>
                                                <th class="text-center">금</th>
                                                <th class="text-center">토</th>
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                        <?php
                                            $startW = date("w", strtotime($year . "-" . $this->customclass->numConvertString($month) . "-01"));
                            
                                            $endDay = date("t", strtotime($year . "-" . $this->customclass->numConvertString($month) . "-01"));
                                            $endW = date("w", strtotime($year . "-" . $this->customclass->numConvertString($month) . "-" . $endDay));
                                            $start = 0-$startW;
                                            $end = $endDay + (7-$endW);
                                            echo "<tr>";
                                            for ($i=$start; $i<($end-1); $i++){
                                                //echo $year. "-" . $month . "-" . $i . "<br>";
                                                $_nDay = $year . "-" . $this->customclass->numConvertString($month) . "-" . $this->customclass->numConvertString($i+1);
                                                //echo $_nDay;
                                                $_nW = date("w", strtotime($_nDay));
                                                if ($i<0 || ($i+1)>$endDay){
                                                    echo "<td></td>";
                                                }else{
                                                //    echo "<td>";
                                                //    echo "<span class=\"col-lg-12 date-block\">".$_nDay."</span>";
                                                //    echo "<div class=\"col-lg-12\">김인호</div>";
                                                //    echo "</td>";
                                                $apply_cnt = $this->customclass->getVisitConsult($_nDay);
                                                //print_r($slists);
                                            ?>
                                                <td>
                                                    <div class="col-lg-12 date-block"><a href="/m/consult/visitConsultList/<?php echo $_nDay; ?>"><?php echo $this->customclass->numConvertString($i+1); ?></a></div>
                                                    <?php if ($apply_cnt > 0){ ?>
                                                        <div class="col-lg-12 schedule-item">신청자수<br><?php echo $apply_cnt; ?>명</div>
                                                    <?php } ?>
                                                </td>
                                            <?php
                                                }
                                                if ($_nW == 6){
                                                    echo "</tr><tr>";
                                                }
                                            }
                                            echo "</tr>";
                                        ?>
                                        </tbody>
                                        </table>
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
        $(document).on("click", "#consultSave", function(){
            var qna_subject = $("input[name=qna_subject]").val();
            var qna_user_name = $("input[name=qna_user_name]").val();
            var qna_contents = $("textarea[name=qna_contents]").val();
            var qna_user_email = $("input[name=qna_user_email1]").val() + "@" + $("input[name=qna_user_email2]").val();
            if (qna_subject == ""){
                alert("제목을 입력해주세요");
                $("input[name=qna_subject]").focus();
                return false;
            }

            if (qna_user_name == ""){
                alert("이름을 입력해주세요");
                $("input[name=qna_user_name]").focus();
                return false;
            }

            if (qna_contents == ""){
                alert("상담내용을 입력해주세요");
                $("textarea[name=qna_contents]").focus();
                return false;
            }

            $.ajax({
                url:"/m/Consult/qnaWriteProc",
                type:"post",
                dataType:"json",
                data : {
                    "qna_subject" : qna_subject,
                    "qna_user_name" : qna_user_name,
                    "qna_user_email" : qna_user_email,
                    "qna_contents" : qna_contents
                }, success:function(data){
                    console.log(data);
                    if (data.code == "200"){
                        alert(data.msg);
                        document.location.href="/m/consult/qnaList";
                    }else{
                        alert(data.msg);
                    }
                }, error:function(e){
                    console.log(e);
                }
            })

        })

        $(document).on("change", "select[name=email_sel]", function(){
            var _var = $(this).val();
            $("input[name=qna_user_email2]").val(_var);
        })

    });
</script>