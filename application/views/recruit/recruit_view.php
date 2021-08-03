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
                        <div class="sub_category02">
                            <ul>
                                <li <?php $CATEGORY==1 ? print("class='on'") : "" ?> ><a href="/recruit_?ctg=1">인턴쉽</a></li>
                                <li <?php $CATEGORY==2 ? print("class='on'") : "" ?>><a href="/recruit?ctg=2">JOB·헤드헌팅</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php $CATEGORY==1 ? print("인턴쉽") : print("JOB·헤드헌팅") ?></h2>
                                </div>

                                <div class="subContSec">
                                    <table class="tableCont01 dataTable applyViewTable">
                                        <colgroup>
                                            <col width="10%"/>
                                            <col width="90%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>제 목</th>
                                                <th class="tal pl20">[해외인턴쉽] 미국 네브레스카 'A'복합 리조트 인턴채용</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="table_tit">국가/도시</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_country" id="recruit_country"><?php echo $RECRUIT->REC_COUNTRY?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">유학분류</td>
                                                <td >
                                                    <div class="table_con">
                                                        <div name="recruit_type" id="recruit_type"><?php echo $RECRUIT->REC_TYPE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">기간</td>
                                                <td >
                                                    <div class="table_con">
                                                        <div  name="recruit_period" id="recruit_period"><?php echo $RECRUIT->REC_PERIOD?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit" >채용분야</td>
                                                <td >
                                                    <div class="table_con">
                                                        <div name="recruit_recruit__type" id="recruit_recruit__type"><?php echo $RECRUIT->REC_RECRUIT_TYPE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">채용마감</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_deadline" id="recruit_deadline"><?php echo $RECRUIT->REC_DEADLINE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">면접방식</td>
                                                <td >
                                                    <div class="table_con">
                                                        <div class="wid100p" name="recruit_interview_type" id="recruit_interview_type"><?php echo $RECRUIT->REC_INTERVIEW_TYPE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">면접일자</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_interview_date" id="recruit_interview_date"><?php echo $RECRUIT->REC_INTERVIEW_DATE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">자격요건</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_prerequisite" id="recruit_prerequisite"><?php echo $RECRUIT->REC_PREREQUISITE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">급여</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_pay" id="recruit_pay"><?php echo $RECRUIT->REC_PAY?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">숙소</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_accomdation" id="recruit_accomdation"><?php echo $RECRUIT->REC_LODGIN?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">복지</td>
                                                <td>
                                                    <div class="table_con">
                                                        <div name="recruit_welfare" id="recruit_welfare"><?php echo $RECRUIT->REC_WELFARE?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="table_tit">비자</td>
                                                <td >
                                                    <div class="table_con">
                                                        <div name="recruit_visa" id="recruit_visa"><?php echo $RECRUIT->REC_VISA?></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="subContSec mb50">
                                    <div class="recruit_detail">
                                        <div class="page_tab_title">
                                            <div class="tab_title_text">상세정보</div>
                                        </div>

                                        <div class="detail_view">
                                            <?php echo $RECRUIT->REC_CONTENTS?>
                                        </div>

                                        <div class="detail_footer">
                                            <button class="recruit_btn01 mr20">지원하기</button>
                                            <button class="recruit_btn02">목록가기</button>
                                        </div>

                                        <!-- 
                                        <div class="col-md-12 text-right">
                                            <a href="/recruit/recruit_new/<?php echo $CATEGORY?>/<?php echo $RECRUIT->REC_SEQ?>" class="btn btn-s btn-primary">지원하기</a>
                                        </div>
                                        -->

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

<script>
    $(function(){
        
    });
</script>






