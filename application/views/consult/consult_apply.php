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
                                    <div class="subContImg">
                                        <div>관심 프로그램 목록</div>
                                        <input type="button" class="btn btn-xs" value="포지션 지원하기">
                                    </div>
                                    <table>
                                        <tr>
                                            <th>번호</th>
                                            <th>제목</th>
                                            <th>글쓴이</th>
                                            <th>진행상황</th>
                                            <th>조회</th>
                                            <th>등록일</th>
                                        </tr>
                                    </table>
                                </div>

                                <div class="hr mt80"></div>

                                <div class="subContSec">
                                    <div class="subContImg">
                                        <div>지원 프로그램 현황</div>
                                        <div>총 2개의 데이터가 있습니다.</div>
                                        <div>상품정렬방식</div>
                                    </div>
                                    <table>
                                        <tr>
                                            <th>번호</th>
                                            <th>제목</th>
                                            <th>지원날짜</th>
                                            <th>상세보기</th>
                                        </tr>
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






