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
                                <li><a href="/consult/visitConsult">방문신청 상담</a></li>
                                <li><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="/consult/presentationList">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>Q&A</h2>
                                </div>
                                <div class="subContSec">
                                    <div class="boardWriteTop">
                                        <div class="boardViewTop">
                                            <div class="type_table">
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>제목</strong>
                                                        <div class="type_td">
                                                            <input type="text" class="input_s1" name="qna_subject">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col1">
                                                    <div class="boardViewTop_item">
                                                        <strong>이름</strong>
                                                        <div class="type_td">
                                                            <input type="text" name="qna_user_name" class="input_s1" value="<?php echo isset($userInfo->USER_NAME) ? $userInfo->USER_NAME : ""; ?>">
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
                                                            <input type="email" name="qna_user_email1" class="input_s2 mr5 mb0" value="<?php echo $userEmail[0]; ?>">@<input type="email" name="qna_user_email2" class="input_s2 ml5 mb0" value="<?php echo $userEmail[1]; ?>">
                                                            <select name="email_sel" class="select_s2">
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
                                                        <strong>내용</strong>
                                                        <div class="type_td">
                                                            <textarea name="qna_contents" class="textarea_s1"> </textarea>								
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_right">
                                            <button type="button" class="memberBtnOk f_left" id="consultSave">문의하기</button>
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
                url:"/Consult/qnaWriteProc",
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
                        document.location.href="/consult/qnaList";
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