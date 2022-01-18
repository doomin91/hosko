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
                    <div class="sub_visual v02">
                        <div class="sub_visual_text">
                            <h1>HOSKO</h1>
                            <p>고객님의 정보를 소중하게 다루겠습니다.</p>
                        </div>

                    </div>
                    <div class="sub_contents">

                        <div class="inner">
                            <div class="loginWrap pb70">
                                <div class="loginContentTop">
                                    <h2>ALWAYS <span>WITH YOU</span></h2>
                                    <h3>언제나 회원님과 함께, HOSKO</h3>
                                    <p>호스코는 회원제로 운영이 됩니다.</p>
                                    <p>하나의 ID로 해외호텔 인턴쉽 및 채용프로그램을 정보를 제공 받을 수 있으며 편리하고 안전하게 고객님의정보를 소중하게 다루겠습니다.</p>
                                </div>
                                <div class="loginContent">
                                    <div class="inquiryBox">
                                        <div class="inquiryBoxform">
                                            <h2>아이디 / 비밀번호 찾기</h2>
                                            <div class="inquirymenu">
                                                <ul>
                                                    <li><a href="/member/idfind">아이디 찾기</a></li>
                                                    <li class="on">비밀번호 찾기</li>
                                                </ul>
                                            </div>
                                            <div class="inquiryDbox pt30">
                                                <label>아이디</label>
                                                <input type="text" class="inquiry_s1" name="user_id">
                                            </div>
                                            <div class="inquiryDbox pt30">
                                                <label>이름</label>
                                                <input type="text" class="inquiry_s1" name="user_name">
                                            </div>
                                            <div class="inquiryDbox">
                                                <label>이메일</label>
                                                <input type="email" class="inquiry_s1" name="user_email">
                                            </div>
                                            <p class="tal pt30">위에 정보를 입력시면 가입시 작성하신 이메일로 비밀번호를 보내드립니다.</p>
                                            <div class="inquiryBtn">
                                                <a type="button" id="pwfind">확인</a>
                                            </div>
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
    $(document).on("click", "#pwfind", function(){
        var user_id = $("input[name=user_id]").val();
        var user_name = $("input[name=user_name]").val();
        var user_email = $("input[name=user_email]").val();
        
        if (user_id == ""){
            alert("이름을 입력해주세요");
            $("input[name=user_name]").focus();
            return false;
        }

        if (user_name == ""){
            alert("이름을 입력해주세요");
            $("input[name=user_name]").focus();
            return false;
        }

        if (user_email == ""){
            alert("이메일을 입력해주세요");
            $("input[name=user_email]").focus();
            return false;
        }

		$.ajax({
			url:"/Member/pwFindProc",
			type:"post",
			dataType:"json",
			data : {
                "user_id" : user_id,
                "user_name" : user_name,
                "user_email" : user_email
            }, success:function(data){
				console.log(data);
				if (data.code == "200"){
                    alert(data.msg);
					//alert("회원님의 아이디는 "+data.user_id+"입니다");
					//document.location.href="/";
				}else{
                    alert(data.msg);
                }
			}, error:function(e){
				console.log(e);
			}
		})

    });
});
</script>