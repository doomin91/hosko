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
                                <li><a href="/consult/qna">Q&A</a></li>
                                <li><a href="/consult/online">온라인 상담</a></li>
                                <li><a href="/consult/offline">방문신청 상담</a></li>
                                <li class="on"><a href="/consult/apply">포지션&연수 지원</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>관심 목록 및 지원현황</h2>
                                </div>

                                <div class="subContSec">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-10">관심 프로그램 목록</div>
                                        <div class="col-md-2 text-right">
                                            <input type="button" id="consult_position_apply" class="btn btn-s btn-primary" value="포지션 지원하기">
                                        </div>
                                    </div>
                                    <table class="table">
                                        <colgroup>
                                                <col width="5%"/>
                                                <col width="55%"/>
                                                <col width="10%"/>
                                                <col width="10%"/>
                                                <col width="10%"/>
                                                <col width="10%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th class="text-center">번호</th>
                                                <th class="text-center">제목</th>
                                                <th class="text-center">글쓴이</th>
                                                <th class="text-center">진행상황</th>
                                                <th class="text-center">조회</th>
                                                <th class="text-center">등록일</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="subContSec">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-10">지원 프로그램 목록</div>
                                        <div class="col-md-2 text-right">
                                            <input type="button" id="consult_position_apply" class="btn btn-s btn-primary" value="포지션 지원하기">
                                        </div>
                                    </div>
                                    <table class="table">
                                        <colgroup>
                                                <col width="5%"/>
                                                <col width="65%"/>
                                                <col width="15%"/>
                                                <col width="15%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th class="text-center">번호</th>
                                                <th class="text-center">제목</th>
                                                <th class="text-center">지원날짜</th>
                                                <th class="text-center">상세보기</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
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






