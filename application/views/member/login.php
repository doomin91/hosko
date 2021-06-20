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
                            <div class="loginWrap">
                                <div class="loginContentTop">
                                    <h2>ALWAYS <span>WITH YOU</span></h2>
                                    <h3>언제나 회원님과 함께, HOSKO</h3>
                                    <p>호스코는 회원제로 운영이 됩니다.</p>
                                    <p>하나의 ID로 해외호텔 인턴쉽 및 채용프로그램을 정보를 제공 받을 수 있으며 편리하고 안전하게 고객님의정보를 소중하게 다루겠습니다.</p>
                                </div>
                                <div class="loginContent">
                                    <div class="loginBox">
                                        <div class="loginBoxform">
                                            <h2>Login</h2>
                                            <p>안녕하세요. 호스코에 오신걸 환영합니다.</p>                                                
                                            <div><input type="text" class="login_s1" name="user_id" placeholder="아이디를 입력해주세요"></div>
                                            <div><input type="password" class="login_s1" name="user_pass" placeholder="비밀번호를 입력해주세요"></div>
                                            <div class="loginBtn"><a href="#" id="login">LOGIN</a></div>
                                            <span class="idpw f_left"><a href="/member/idfind">아이디/비밀번호 찾기</a></span>
                                            <span class="memberjoin f_right"><a href="/member/member_input_step1">회원가입</a></span>
                                        </div>
                                        <div class="loginBoxbg"></div>
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
    $(document).on("click", "#login", function(){
        var user_id = $("input[name=user_id]").val();
        var user_pass = $("input[name=user_pass]").val();
        
        if (user_id == ""){
            alert("아이디를 입력해주세요");
            $("input[name=user_id]").focus();
            return false;
        }

        if (user_pass == ""){
            alert("비밀번호를 입력해주세요");
            $("input[name=user_pass]").focus();
            return false;
        }

		$.ajax({
			url:"/Member/loginProc",
			type:"post",
			dataType:"json",
			data : {
                "user_id" : user_id,
                "user_pass" : user_pass
            }, success:function(data){
				console.log(data);
				if (data.code == "200"){
					alert(data.msg);
					document.location.href="/";
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