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
                    <div class="sub_visual v03">
                        <div class="sub_visual_text">
                            <h1>HOSKO</h1>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category01">
                            <ul>
                                <li><a href="/company/introduce">인사말</a></li>
                                <li><a href="/company/vision">Mission & Vision</a></li>
                                <li><a href="/company/ethics">윤리강령</a></li>
                                <li><a href="/company/organization">사업분야ㆍ실적</a></li>
                                <li><a href="/company/cooperation">산학협력현황</a></li>
                                <li class="on"><a href="/company/location">오시는길</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>오시는 길</h2>
                                </div>

                                <div class="subContSec">
                                    <div class="subContImg tac">
                                        <img src="/static/front/img/company_19.jpg">
                                    </div>

                                    <div class="company_map pt50 pb50">
                                        <div class="subContImg">
                                            <img src="/static/front/img/company_map.jpg">
                                        </div>
                                    </div>

                                    <div class="subContImg tac pb100">
                                        <img src="/static/front/img/company_20.jpg">
                                    </div>
<!--
                                    <div class="company_contact">
                                        <ul>
                                            <li></li>
                                        </ul>
                                    </div>
-->
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






