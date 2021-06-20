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
                                            <li><img src="/static/front/img/agree_top_icon01.png" /></li>
                                            <li><img src="/static/front/img/info_top_icon02.png" /></li>
                                            <li><img src="/static/front/img/joinend_top_icon02.png" /></li>
                                        </ul>
                                    </div>

                                    <div class="agreeTextBox mt30">
                                        <p>HOSKO 서비스를 이용하기 위해 이용자는 이용약관을 읽어보시고 동의하셔야 합니다.</p>
                                        <p>일반회원등록은 무료이며, 등록 즉시 서비스 이용이 가능합니다.</p>
                                        <p>단, 유료화서비스와 인증절차가 필요한 경우 해당절차를 거펴야 서비스를 이용하실 수 있습니다.</p>
                                    </div>
                                    
                                    <div>
                                        <div>
                                            <input type="checkbox" id="agree1">
                                            <label for="agree1">이용약관</label>
                                        </div>
                                        <div>
                                            <textarea style="width:100%; height:100px" placeholder="이용약관 텍스트"></textarea>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="agree2">
                                            <label for="agree2">개인정보 수집 및 이용 (필수)</label>
                                        </div>
                                        <div>
                                            <textarea style="width:100%; height:100px" placeholder="개인정보 수집 및 이용 텍스트"></textarea>
                                        </div>
                                    </div>

                                    <div class="memberBtn mt50" style="text-align:center">
                                        <div class="memberBtnOk"><a href="/member/member_input_step2">회원가입</a></div>
                                        <div class="memberBtnCancel"><a href="/">가입취소</a></div>
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