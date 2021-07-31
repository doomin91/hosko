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
                                    <div class="boardWriteTop">
                                        <div class="boardViewTop">
                                            <div class="type_table">
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>제목</strong>
                                                        <div class="type_td">
                                                            <input type="text" class="input_s1" name="oc_subject">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>이름</strong>
                                                        <div class="type_td">
                                                            <input type="text" name="oc_user_name" class="input_s1" value="<?php echo $userInfo->USER_NAME; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    $userTel = explode("-", $userInfo->USER_TEL);
                                                ?>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>전화번호</strong>
                                                        <div class="type_td">
                                                            <input name="oc_user_tel1" type="text" class="input_s1" style="width:200px !important" value="<?php echo $userTel[0]; ?>" min="1" max="9999" maxlength="4">
                                                            <input name="oc_user_tel2" type="text" class="input_s1" style="width:200px !important" value="<?php echo $userTel[1]; ?>" min="1" max="9999" maxlength="4">
                                                            <input name="oc_user_tel3" type="text" class="input_s1" style="width:200px !important" value="<?php echo $userTel[2]; ?>" min="1" max="9999" maxlength="4">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    $userHp = explode("-", $userInfo->USER_HP);
                                                ?>
                                                <div class="col1 ">
                                                    <div class="boardViewTop_item">
                                                        <strong>휴대폰번호</strong>
                                                        <div class="type_td">
                                                            <input name="oc_user_hp1" type="text" class="input_s1" style="width:200px !important" value="<?php echo $userHp[0]; ?>" maxlength="4">
                                                            <input name="oc_user_hp2" type="text" class="input_s1" style="width:200px !important" value="<?php echo $userHp[1]; ?>" maxlength="4">
                                                            <input name="oc_user_hp3" type="text" class="input_s1" style="width:200px !important" value="<?php echo $userHp[2]; ?>" maxlength="4">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    $userEmail = explode("@", $userInfo->USER_EMAIL);
                                                ?>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>이메일</strong>
                                                        <div class="type_td">
                                                            <input type="email" name="oc_user_email1" class="input_s1" value="<?php echo $userEmail[0]; ?>">@<input type="email" name="oc_user_email2" class="input_s1" value="<?php echo $userEmail[1]; ?>">
                                                            <select name="user_email_sel" class="select_s1">
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
                                                        <strong>상담 내용</strong>
                                                        <div class="type_td">
                                                            <textarea name="oc_contents" class="textarea_s1"> </textarea>								
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_right">
                                            <button type="button" class="memberBtnOk f_left" id="consultSave">문의하기</button>
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
        $(document).on("click", "#consultSave", function(){
            var oc_subject = $("input[name=oc_subject]").val();
            var oc_user_name = $("input[name=oc_user_name]").val();
            var oc_contents = $("textarea[name=oc_contents]").val();
            var oc_user_tel = $("input[name=oc_user_tel1]").val() + "-" + $("input[name=oc_user_tel2]").val() + "-" + $("input[name=oc_user_tel3]").val();
            var oc_user_hp = $("input[name=oc_user_hp1]").val() + "-" + $("input[name=oc_user_hp2]").val() + "-" + $("input[name=oc_user_hp3]").val();
            var oc_user_email = $("input[name=oc_user_email1]").val() + "@" + $("input[name=oc_user_email2]").val();
            if (oc_subject == ""){
                alert("제목을 입력해주세요");
                $("input[name=oc_subject]").focus();
                return false;
            }

            if (oc_user_name == ""){
                alert("이름을 입력해주세요");
                $("input[name=oc_user_name]").focus();
                return false;
            }

            if (oc_contents == ""){
                alert("상담내용을 입력해주세요");
                $("textarea[name=oc_contents]").focus();
                return false;
            }

            $.ajax({
                url:"/Consult/onlineConsultWriteProc",
                type:"post",
                dataType:"json",
                data : {
                    "oc_subject" : oc_subject,
                    "oc_user_name" : oc_user_name,
                    "oc_user_tel" : oc_user_tel,
                    "oc_user_hp" : oc_user_hp,
                    "oc_user_email" : oc_user_email,
                    "oc_contents" : oc_contents
                }, success:function(data){
                    console.log(data);
                    if (data.code == "200"){
                        alert(data.msg);
                        document.location.href="/consult/onlineConsultList";
                    }else{
                        alert(data.msg);
                    }
                }, error:function(e){
                    console.log(e);
                }
            })

        })

    });
</script>