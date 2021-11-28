<?php include 'header.php'; ?>
    <body>

        <div id="wrap" class="main_wrap">

            <?php include 'nav.php'; ?>

            <div id="container">
                <div class="layout_main">
                    <div class="main_visual">
                        <div class="main_visual_text">
                            <h1>대표적인 교육 훈련기관 브랜드</h1>
                            <h2>“ HOSKO ”</h2>
                            <p>지속적인 교육훈련을 제공하는 Hospitality HR 전문기관입니다.</p>
                        </div>

                        <div class="main_visual_menu">
                            <ul>
                                <li>
                                    <a href="/Board/q/1?seq=1">
                                        <div class="visual_menu">
                                            <p><img src="/static/front/img/main_visual_icon01.png"></p>
                                            <h1>호스코 뉴스</h1>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/recruit?ctg=1">
                                        <div class="visual_menu">
                                            <p><img src="/static/front/img/main_visual_icon02.png"></p>
                                            <h1>포지션 공고</h1>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/Board/q/1?seq=2">
                                        <div class="visual_menu">
                                            <p><img src="/static/front/img/main_visual_icon03.png"></p>
                                            <h1>해외취업 후기</h1>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/Board/g/1?seq=5">
                                        <div class="visual_menu">
                                            <p><img src="/static/front/img/main_visual_icon04.png"></p>
                                            <h1>갤러리</h1>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="right_sidemenu">
                            <ul>
                                <li>
                                    <a href="http://pf.kakao.com/_ZrXjxl/chat" target="_blank"><div class="sidemenu_item01"></div></a>
                                </li>
                                <li>
                                    <a href="/consult/onlineConsultList"><div class="sidemenu_item02"></div></a>
                                </li>                                
                            </ul>
                        </div>


                    </div>

                    <div class="main_contents">


                        <div class="mid_section01 mt80 mb80">
                            <div class="inner">
                                <div class="mid_banner01">
                                    <div class="mid_titleimg">
                                        <img src="/static/front/img/mid_title01.png">
                                    </div>
                                    <div class="mid_banner_text">
                                        당신을 위해 세계로 달리세요.<br/>
                                        완벽한 당신을 위해 호스코와 함께 달리세요.
                                    </div>
                                    <div class="mid_banner_btn">
                                        <a href="/company/introduce">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="mid_section02 mb80">
                            <div class="inner">
                                <div class="mid_banner02">
                                    <h2>RECRUIT HOSKO</h2>
                                    <div class="mid_banner_text01">
                                        <b>HOSKO</b>는 대한민국 <b>HR(Human Resource)</b>분야를 이끌어가고 있는<br/>
                                        <b>대표적인 교육 훈련기관 브랜드</b> 입니다.
                                    </div>

                                    <ul class="mt50">
                                        <li>
                                            <p><img src="/static/front/img/mid_sec02_01.png"></p>
                                            <h3>교육 컨설팅</h3>
                                        </li>
                                        <li>
                                            <p><img src="/static/front/img/mid_sec02_02.png"></p>
                                            <h3>해외문화 교류</h3>
                                        </li>
                                        <li>
                                            <p><img src="/static/front/img/mid_sec02_03.png"></p>
                                            <h3>산학협동</h3>
                                        </li>
                                        <li>
                                            <p><img src="/static/front/img/mid_sec02_04.png"></p>
                                            <h3>취업지원</h3>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        
                        <div class="mid_section03">
                            <div class="inner">
                                <div class="mid_banner_text02">
                                    HOSKO는 국내외 대학과 산학협동 체결을 통한<br/>
                                    산학 일체형 교육에 의거한 인재 양성을 위해<br/>
                                    최선의 노력을 기울이고 있습니다.
                                </div>
                            </div>
                        </div>

                        
                        <div class="mid_section04 mb40">
                            <div class="inner">
                                <div class="mid_banner_img01">
                                    <img src="/static/front/img/midbg03.jpg">
                                </div>
                            </div>
                        </div>

                        
                        <div class="mid_section05 mb80">
                            <div class="inner pd0">
                                <div class="mid_board">
                                    <div class="main_news">
                                        <div class="main_news_title">
                                            <h2>호스코 뉴스</h2>
                                            <span><a href="/"><img src="/static/front/img/main_plus_icon.jpg"></a></span>
                                        </div>

                                        <div class="main_news_box">
                                            <ul>
                                                <?php foreach($NEWS as $val): ?>
                                                <li>
                                                        <div class="news_box_item">
                                                            <p class="text" onclick="viewPage(<?php echo $val->POST_SEQ?>)"><?php echo $this->customclass->strcut(strip_tags($val->POST_SUBJECT), 30)?></p>
                                                            <p class="date"><?php echo date("Y-m-d", strtotime($val->POST_REG_DATE))?></p>
                                                        </div>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="main_notice">
                                        <div class="main_notice_title">
                                            <h2>질문과 답변</h2>
                                            <span><a href="/consult/qnaList"><img src="/static/front/img/main_plus_icon.jpg"></a></span>
                                        </div>

                                        <div class="main_notice_box">
                                            <ul>
                                                <?php foreach($QNALIST as $val): ?>
                                                <li>
                                                    <div class="notice_box_item">
                                                        <p class="text"><a href="/consult/qnaList"><?php echo $this->customclass->strcut(strip_tags($val->QNA_SUBJECT), 30)?></a></p>
                                                        <p class="date"><?php echo date("Y-m-d", strtotime($val->QNA_REG_DATE))?></p>
                                                    </div>                                                 
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <?php include 'footer.php'; ?>
        </div>

<script>


function viewPage(post_seq){
    window.location = "/board/board_view/" + post_seq;
}

</script>
<?php 
foreach ($POPUPS as $pop):
?>    
<div class="popup" style="top:<?php echo $pop->POP_LOCAT_X;?>; left:<?php echo $pop->POP_LOCAT_Y;?>">
    <div class="pop_content" style="width:<?php echo $pop->POP_WIDTH;?>px; height:<?php echo $pop->POP_HEIGHT;?>px">
        <?php echo $pop->POP_CONTENTS; ?>
    </div>
    <div class="pop_footer">
        <span class="p_left"></span>    
        <span class="p_right"><button class="popClose">닫기</button></span>
    </div>
</div>
<?php 
endforeach; 
?>
    </body>
</html>

<style>
.popup {
    position:absolute;
}

.popup .pop_content {background:#fff; color:#000; overflow:auto}
.popup .pop_footer {background:#000; color:#fff; line-height: 25px; display:block}
.popup .pop_footer span {display:inline-block; width:49%}
.popup .p_left {text-align:left}
.popup .p_right {text-align:right}
</style>

<script type="text/javascript">
    $(function(){
        $(document).on("click", ".popClose", function(){
            console.log("ADFASDFSDA");
            $(this).parents(".popup").eq(0).css("display", "none");
        });
    });
</script>
