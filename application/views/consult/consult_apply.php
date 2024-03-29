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
                                <li><a href="/consult/visitConsult">방문신청 상담</a></li>
                                <li class="on"><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="/consult/presentationList">설명회신청</a></li>
                            </ul>
                        </div>



                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>관심 목록 및 지원현황</h2>
                                </div>

                                <div class="subContSec">


                                    <div class="consultCont">

                                        <div class="row mb20">
                                            <div class="col-md-8 TableTitle">관심 프로그램 목록</div>
                                            <div class="col-md-4 tar">
                                            <!-- <button class="subBtn01" id="consult_position_apply">포지션 지원하기</button> -->
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
                                            <?php if(count($MY_INTEREST_APPLIES) > 0):?>
                                                <?php foreach($MY_INTEREST_APPLIES as $MY_INTEREST_APPLY):?>
                                                <tr>
                                                    <td><?php echo $MY_INTEREST_APPLY->REC_SEQ ?></td>
                                                    <td><span class="thumImg"><img src="<?php echo $MY_INTEREST_APPLY->REC_THUMBNAIL?>"></span><a class="fontcb" href ="/recruit/recruit_view/<?php echo $MY_INTEREST_APPLY->REC_CONTENTS_CATEGORY?>/<?php echo $MY_INTEREST_APPLY->REC_SEQ?>"><?php echo $MY_INTEREST_APPLY->REC_TITLE ?></a></td>
                                                    <td><?php echo $MY_INTEREST_APPLY->ADMIN_USER_NAME ?></td>
                                                    <td><!-- <span class="deadlineIcon">마감</span> <span class="recuitIcon">모집중</span> --><?php $MY_INTEREST_APPLY->REC_STATUS==0 ? print("마감") : print("모집중") ?></td>
                                                    <td><?php echo $MY_INTEREST_APPLY->REC_COUNT ?></td>
                                                    <td><?php echo explode(" ", $MY_INTEREST_APPLY->REC_REG_DATE)[0] ?></td>
                                                </tr>
                                                <?php endforeach?>
                                            <?php else:?>
                                                <tr>
                                                    <td colspan="6">목록이 없습니다</td>
                                                </tr>
                                            <?php endif?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="consultCont mb80">
                                    <div class="row mb20">
                                        <div class="col-md-12 TableTitle mb20 mt30">지원 프로그램 현황</div>
                                        <div class="boardTotallist clearfix mb20">
                                            <p>총 <?php echo count($MY_APPLIES)?>개의 글이 등록 되어있습니다.</p>
                                        </div>                                        
                                    </div>
                                    <table class="tableCont">
                                        <colgroup>
                                                <col width="5%"/>
                                                <col width="65%"/>
                                                <col width="15%"/>
                                                <col width="15%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>번호</th>
                                                <th>제목</th>
                                                <th>지원날짜</th>
                                                <th>상세보기</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php if(count($MY_APPLIES) > 0):?>
                                            <?php $num = 1;
                                            foreach($MY_APPLIES as $MY_APPLY): ?>
                                            <tr>
                                                <td><?php echo $num++;?></td>
                                                <td class="tal pl20"><?php echo $MY_APPLY->RECRUIT_TITLE;?></td>
                                                <td><?php echo explode(" ", $MY_APPLY->APP_REG_DATE)[0];?></td>
                                                <td><a href ="/consult/apply_view/<?php echo $MY_APPLY->APP_SEQ?>" class="btn btn-sm subBtn02">상세보기</a></td>
                                            </tr>
                                        <?php endforeach?>
                                        <?php else:?>
                                            <tr>
                                                <td colspan="4">목록이 없습니다</td>
                                            </tr>
                                        <?php endif?>
                                        
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






