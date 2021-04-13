<?php include_once "header.php"; ?>

<!--header-->
<?php include_once "menu.php"; ?>

<!-- // header -->


<section class="sub_wrap">


<!--main content-->
<section id="container" class="main_wrap">
    <!--메인 비주얼슬라이드-->
    <article class="main_visual">
        <div class="owl-carousel main_visual_slide">

<!-- 메인배너
            <div class="item slide3">
                <div class="inner">
                    <div class="img"></div>

                    <div class="txt">
                        <div class="mb_btn"><a href="http://www.itevents.co.kr/company/withnetworks/1907_withnetworks_Fortinet_roadshow/register.html" target="_blank">사전등록 바로가기</a></div>
                    </div>
                </div>
            </div>

-->

            <div class="item slide1">
                <div class="inner">
                    <div class="img"></div>
                    <div class="txt">
                        <dl>
                            <dt class="main_font01">IT의 가치를 고객과 함께</dt>
							<dt class="main_font02">With you and withnetworks</dt>
							<dt class="main_font03">Total ICT 보안 서비스 전문 기업</dt>
                           <!--  <dd>㈜ 위드네트웍스</dd> -->
                        </dl>

                    </div>
                </div>
            </div>



            <div class="item slide2">
                <div class="inner">
                    <div class="img"></div>
                    <div class="txt">
                        <dl>
                            <dt class="main_font01">Cybereason</dt>
							<dt class="main_font02">엔드포인트 통합 보안 플랫폼</dt>
							<dt class="main_font03">EDR(Endpoint Detection & Response) + MDR (Managed Detection & Response)</dt>
							<dt class="main_font03"><div class="mb_link_btn"><a href="http://www.withnetworks.com/Cybereason" target="_blank">Cybereason 바로가기</a></div></dt>
                        </dl>

                    </div>
                </div>
            </div>


            <div class="item slide3">
                <div class="inner">
                    <div class="img"></div>
                    <div class="txt">
                        <dl>
                            <dt class="main_font01">i24</dt>
							<dt class="main_font02">보안의 체질을 강화하다</dt>
							<dt class="main_font03"><div class="mb_link_btn"><a href="http://www.i24safe.com" target="_blank">i24 바로가기</a></div></dt>
                        </dl>

                    </div>
                </div>
            </div>





        </div>
    </article>
    <!--E 메인 비주얼슬라이드-->




    <!-- 위드네트웍스 솔루션-->

	<article class="solution_box">
        <h3>사업소개</h3>
		<p>Total ICT Security</p>
        <ul>
            <li class="list1"><a href="/Security">Security</a></li>

			<li class="list2"><a href="/Infra">Infrastructure</a></li>

			<li class="list3"><a href="/Managed">Managed Service</a></li>

			<li class="list4"><a href="/Solutions">Solution</a></li>
        </ul>
    </article>

    <!--// 위드네트웍스 솔루션-->

	<!-- G 회사 소개 영역 -->
	<article class="company_box">
        <h3>withnetworks</h3>
		<div class="company_box_list">
			<ul class="thumbnailList">
				<li>
					<a href="/Company">
						<p class="img"><img src="static/front/img/main_with_visual01.jpg" alt=""></p>
						<div class="txtwrap">
							<span>회사소개</span>
							<p class="tit">고객의 입장에 선 Total 컨설팅을 통해 ICT혁신을 지지하는 기업입니다.</p>
						</div>
					</a>
				</li>
				<li>
					<a href="/news/award_list">
						<p class="img"><img src="static/front/img/main_with_visual02.jpg" alt=""></p>
						<div class="txtwrap">
							<span>인증 및 수상</span>
							<p class="tit">위드네트웍스의 인증 및 수상 내역을 확인하실 수 있습니다.</p>
						</div>
					</a>
				</li>
				<li>
					<a href="/Partners">
						<p class="img"><img src="static/front/img/main_with_visual03.jpg" alt=""></p>
						<div class="txtwrap">
							<span>위드파트너</span>
							<p class="tit">위드네트웍스의 파트너사를 확인하실 수 있습니다.</p>
						</div>
					</a>
				</li>
			</ul>
		</div>
    </article>
	<!-- E 회사 소개 영역 -->



	<!--// 보도자료 -->
	<article class="news_box">

	<div class="news_box_list">
        <h3>보도자료</h3>
		<ul class="clearfix ul_list_area">
    <?php
      foreach ($main_press as $press) :
    ?>
        <li>
					<a href="/news/press_view/<?php echo $press->SEQ; ?>" class="btn_photo">
							<span class="photo">
								<span class="img_area">
									<span class="img" style="background-image:url('<?php echo $press->PRESS_THUMBNAIL; ?>')"></span>
								</span>
							</span>

						<span class="info">
							<span class="cat"><!-- SNS --> &nbsp;</span>
							<span class="title"><?php echo $press->PRESS_TITLE; ?></span>

							<span class="date"><?php echo str_replace("-", ".", substr($press->PRESS_REG_DATE, 0, 10)); ?></span>
						</span>
					</a>
				</li>
    <?php
        endforeach;
    ?>
		</ul>
	</div>






	</article>
	<!-- 보도자료 -->









</section>
<!--// main content-->


		</section>


<!-- 리뉴얼 레이어 팝업 ->

<div id="layer_popup" style="visibility: visible;">
    <a href="http://www.itevents.co.kr/company/withnetworks/1907_withnetworks_Fortinet_roadshow/register.html" target="_blank"><div class="popup_img01"><img src="static/front/img/popup/fortinet_load.jpg" alt="fortinet 세미나"></div></a>
    <div class="close">
        <form name="pop_form">
            <div id="check"><input type="checkbox" name="chkbox" value="checkbox" style="margin-right:5px; vertical-align: middle;display:inline-block;">오늘 하루동안 보지 않기</div>
            <div id="close" style="margin:auto;"><a href="javascript:closePop();">닫기</a></div>
        </form>
    </div>
</div>

<script language="Javascript">
    cookiedata = document.cookie;
    if ( cookiedata.indexOf("maindiv=done") < 0 ){
        document.all['layer_popup'].style.visibility = "visible";
    }
    else {
        document.all['layer_popup'].style.visibility = "hidden";
    }
</script>



<style>
#layer_popup { width:500px; height:530px; text-align:center; position:absolute; top:18%; left: 10%;  z-index:1;background-color:#505050;}
.close div{float:left; text-align:right;}
.popup_img01 {width:500px; height:500px;position:relative;}

.popup_btn {position:absolute; bottom:40px; width:500px; height:60px;  margin:0 auto;}
.popup_btn li {display:inline-block; padding:0 5px; }
#check{font-size:12px; font-family:'돋움'; position:absolute; bottom:3px; right:60px; color:#fff;  }
#close{font-size:12px; position:absolute; bottom:4px; right:20px; }
#close a { color:#fff; }

@media all and (max-width:700px){
	#layer_popup { width:330px; height:360px; text-align:center; position:absolute; top:18%; left: 10%;  z-index:1;background-color:#505050;}

	.popup_img01 {width:100%; min-height:100%; position:relative;}

}

</style>

<!--메인팝업-->

<script type="text/javascript">

        function setCookie( name, value, expiredays ) {
            var todayDate = new Date();
            todayDate.setDate( todayDate.getDate() + expiredays );
            document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
        }

        function closePop() {
            if ( document.pop_form.chkbox.checked ){
                setCookie( "maindiv", "done" , 1 );
            }
            document.all['layer_popup'].style.visibility = "hidden";
        }

        window.open("/home/popup0805", "popup0805", "width=560, height=460")

</script>
<!--// 메인팝업-->



<!--
!-- 하단 배너->
	<?php include_once "footer_banner.php"; ?>

!-- 하단 사이트 맵 ->
	<?php include_once "footer_sitemap.php"; ?>
-->

	<?php include_once "footer.php"; ?>
