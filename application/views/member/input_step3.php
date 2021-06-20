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
                            <div class="joinWrap">
                                <div class="joinContentTop">
                                    <h2>Sign up to be a member</h2>
                                    <h3>HOSKO에 오신것을 환영합니다.</h3>
                                    <p>호스코만의 특별한 멤버쉽 서비스를 만나보세요.</p>
                                </div>

                                <div class="joinContent">
                                    <div class="joinStep">
                                        <ul>
                                            <li><img src="/static/front/img/agree_top_icon02.png" /></li>
                                            <li><img src="/static/front/img/info_top_icon02.png" /></li>
                                            <li><img src="/static/front/img/joinend_top_icon01.png" /></li>
                                        </ul>
                                    </div>
                                    
                                    <div>
                                        <div>
                                            <p><img src="/static/front/img/member_icon01.png" /></p>
                                            <h2>회원가입완료</h2>
                                            <h3>회원가입이 완료되었습니다. 로그인 후 다양한 서비스를 이용하실 수 있습니다.</h3>
                                        </div>
                                    </div>

                                    <div class="memberBtn mt50">
                                        <div class="memberBtnOk"><a href="/member/login">LOGIN</a></div>
                                        <div class="memberBtnCancel"><a href="/">HOME</a></div>
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






