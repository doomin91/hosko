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
                        <div class="sub_category">
                            <ul>
                                <li><a href="/consult/qnaList">Q&A</a></li>
                                <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                                <li><a href="/consult/visitConsult">방문상담신청</a></li>
                                <li><a href="/consult/apply">포지션ㆍ연수 지원</a></li>
                                <li class="on"><a href="/consult/presentationList">설명회 신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>설명회 신청</h2>
                                </div>

                                <div class="subContSec">


                                    <div class="consultCont">

                                        <div class="row mb20">
                                            <div class="col-md-12 TableTitle mb20 mt30">설명회 목록</div>
                                            <div class="boardTotallist clearfix mb20">
                                                <p>총 88개의 글이 등록 되어있습니다.</p>
                                            </div>                                        
                                        </div>

                                        <table class="tableCont">
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
                                                    <th>번호</th>
                                                    <th>제목</th>
                                                    <th>글쓴이</th>
                                                    <th>진행상황</th>
                                                    <th>조회</th>
                                                    <th>등록일</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            
                                            <div class="f_center mt30 col-lg-6">
                                                <?php //echo $pagination; ?>    
                                            </div>
                                            
                                        </div>

                                        

                                        <div class="boardSearchWrap">
                                            <form name="" id="" method="">
                                            <input type="hidden" name="page" value="1">
                                            <input type="hidden" name="num" value="">

                                                <div class="boardSearch">
                                                <form name="sfrom" method="get">
                                                    <select name="searchField">
                                                        <option value="all" selected="selected">전체</option>
                                                        <option value="oc_subject" selected="selected">제목</option>
                                                        <option value="oc_contents" selected="selected">내용</option>
                                                    </select>
                                                    <div class="inputSearch">
                                                        <input type="text" name="searchString" value="" maxlength="50">
                                                        <input type="submit" value="">
                                                    </div>
                                                </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="consultCont mb80">
                                    <div class="row mb20">
                                        <div class="col-md-12 TableTitle mb20 mt30">설명회 지원 현황 현황</div>
                                        <div class="boardTotallist clearfix mb20">
                                            <p>총 88개의 글이 등록 되어있습니다.</p>
                                        </div>                                        
                                    </div>
                                    <table class="tableCont">
                                        <colgroup>
                                                <col width="5%"/>
                                                <col width="80%"/>
                                                <col width="15%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>번호</th>
                                                <th>제목</th>
                                                <th>지원날짜</th>
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

<script>
    $(function(){
        
    });
</script>
