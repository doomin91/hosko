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
                                <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                                <li class="on"><a href="/consult/consult/visitConsult">방문신청 상담</a></li>
                                <li><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="/consult/presentationList">설명회신청</a></li>
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
                                <div class="visit_text01">* 신청하시는 분의 입력사항을 정확히 입력해 주세요.</div>
                                <div class="subContSec">
                                    <div class="boardWriteTop">
                                        <div class="boardViewTop">
                                            <div class="type_table01">
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>신청자명</strong>
                                                        <div class="type_td">
                                                            <input type="text" class="input_s2" name="user_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>일시</strong>
                                                        <div class="type_td">
                                                            <input type="text" class="input_s2" style="width:200px;" name="consult_date" readonly value="<?php echo $visit_date; ?>">
                                                            <select name="consult_hour" class="select_s2" style="width:100px; margin:0 0 0 20px;">
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="13">13</option>
                                                                <option value="14">14</option>
                                                                <option value="15">15</option>
                                                                <option value="16">16</option>
                                                            </select>&nbsp;&nbsp; 시
                                                            <select name="consult_minute" class="select_s2" style="width:100px; margin:0 0 0 20px;">
                                                                <option value="00">00</option>
                                                                <option value="20">20</option>
                                                                <option value="40">40</option>
                                                            </select>&nbsp;&nbsp; 분
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>나이</strong>
                                                        <div class="type_td">
                                                            <input type="text" class="input_s2" name="user_age" style="width:100px !important" maxlength="2">
                                                            &nbsp;&nbsp;세
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>연락처</strong>
                                                        <div class="type_td">
                                                            <input type="text" class="input_s2" name="user_tel1" style="width:200px !important" maxlength="3">&nbsp; - &nbsp;
                                                            <input type="text" class="input_s2" name="user_tel2" style="width:200px !important" maxlength="4">&nbsp; - &nbsp;
                                                            <input type="text" class="input_s2" name="user_tel3" style="width:200px !important" maxlength="4">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    if (isset($userInfo->USER_EMAIL)){
                                                        $userEmail = explode("@", $userInfo->USER_EMAIL);
                                                    }else{
                                                        $userEmail = ["", ""];
                                                    }
                                                ?>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>이메일</strong>
                                                        <div class="type_td">
                                                            <input type="email" name="user_email1" class="input_s2" style="width:200px;" value="<?php echo $userEmail[0]; ?>">&nbsp; @ &nbsp;<input type="email" name="user_email2" style="width:200px;" class="input_s2" value="<?php echo $userEmail[1]; ?>">
                                                            <select name="email_sel" class="select_s2" style="width:140px; margin:0 0 0 20px;">
                                                                <option value="">직접입력</option>
                                                                <option value="nate.com">nate.com</option>
                                                                <option value="naver.com">naver.com</option>
                                                                <option value="gmail.com">gmail.com</option>
                                                                <option value="yahoo.com">yahoo.com</option>
                                                                <option value="hotmail.com">hotmail.com</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>학교명/직장명</strong>
                                                        <div class="type_td">
                                                            <input type="text" name="user_comp" class="input_s2" value="<?php echo isset($userInfo->USER_NAME) ? $userInfo->USER_NAME : ""; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>학과</strong>
                                                        <div class="type_td">
                                                            <select name="user_depart" class="select_s2">
                                                                <option value="">선택</option>
                                                                <option value="1">호텔</option>
                                                                <option value="2">관광</option>
                                                                <option value="3">조리</option>
                                                                <option value="4">기타/외국어</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>전공부서</strong>
                                                        <div class="type_td">
                                                            <input type="text" name="user_major" class="input_s2" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1 npbd">
                                                    <div class="boardViewTop_item">
                                                        <strong>비밀번호</strong>
                                                        <div class="type_td">
                                                            <input type="password" name="user_pass" class="input_s2" value="" style="width:200px !important">
                                                            <p>(정보 수정/삭제시 필요합니다.)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_right">
                                            <button type="button" class="btn_style05 f_left" id="consultSave">문의하기</button>
                                            <button type="button" class="btn_style06 f_left" id="consultCancel">취소하기</button>
                                        </div>sssss

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
            var user_name = $("input[name=user_name]").val();
            var consult_date = $("input[name=consult_date]").val();
            var consult_hour = $("select[name=consult_hour]").val();
            var consult_minute = $("select[name=consult_minute]").val();
            var user_age = $("input[name=user_age]").val();
            var user_tel1 = $("input[name=user_tel1]").val();
            var user_tel2 = $("input[name=user_tel2]").val();
            var user_tel3 = $("input[name=user_tel3]").val();
            var user_tel = user_tel1 + "-" + user_tel2 + "-" + user_tel3;
            var user_email = $("input[name=user_email1]").val() + "@" + $("input[name=user_email2]").val();
            var user_comp = $("input[name=user_comp]").val();
            var user_depart = $("select[name=user_depart]").val();
            var user_major = $("input[name=user_major]").val();
            var user_pass = $("input[name=user_pass]").val();

            if (user_name == ""){
                alert("신청자명을 입력해주세요");
                $("input[name=user_name]").focus();
                return false;
            }

            if (user_age == ""){
                alert("나이를 입력해주세요");
                $("input[name=user_age]").focus();
                return false;
            }

            if (user_email == ""){
                alert("이메일을 입력해주세요");
                $("textarea[name=user_email1]").focus();
                return false;
            }

            if (user_comp == ""){
                alert("학교명/직장명을 입력해주세요");
                $("textarea[name=user_comp]").focus();
                return false;
            }

            if (user_depart == ""){
                alert("학과를 선택해주세요");
                $("select[name=user_depart]").focus();
                return false;
            }

            if (user_major == ""){
                alert("전공부서를 입력해주세요");
                $("input[name=user_major]").focus();
                return false;
            }

            if (user_pass == ""){
                alert("비밀번호를 입력해주세요");
                $("input[name=user_pass]").focus();
                return false;
            }

            $.ajax({
                url:"/Consult/visitConsultWriteProc",
                type:"post",
                dataType:"json",
                data : {
                    "user_name" : user_name,
                    "consult_date" : consult_date,
                    "consult_hour" : consult_hour,
                    "consult_minute" : consult_minute,
                    "user_age" : user_age,
                    "user_tel" : user_tel,
                    "user_email" : user_email,
                    "user_comp" : user_comp,
                    "user_depart" : user_depart,
                    "user_major" : user_major,
                    "user_pass" : user_pass
                }, success:function(data){
                    console.log(data);
                    if (data.code == "200"){
                        alert(data.msg);
                        document.location.href="/consult/visitConsult";
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
            $("input[name=user_email2]").val(_var);
        })

    });
</script>