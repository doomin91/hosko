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
                                <li <?php $CATEGORY==1 ? print("class='on'") : "" ?> ><a href="/recruit_?ctg=1">인턴쉽</a></li>
                                <li <?php $CATEGORY==2 ? print("class='on'") : "" ?>><a href="/recruit_?ctg=2">JOB·헤드헌팅</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php $CATEGORY==1 ? print("인턴쉽") : print("JOB·헤드헌팅") ?></h2>
                                </div>

                                <div class="subContSec">
                                    <table class="table table-custom dataTable applyViewTable">
                                        <tbody>
                                            <tr>
                                                <th class="col-sm-3" rowspan="12">컨텐츠 정보</th>
                                                <td class="col-sm-1">국가/도시</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_country" id="recruit_country"><?php echo $RECRUIT->REC_COUNTRY?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">유학분류</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_type" id="recruit_type"><?php echo $RECRUIT->REC_TYPE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">기간</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_period" id="recruit_period"><?php echo $RECRUIT->REC_PERIOD?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">채용분야</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_recruit__type" id="recruit_recruit__type"><?php echo $RECRUIT->REC_RECRUIT_TYPE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">채용마감</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_deadline" id="recruit_deadline"><?php echo $RECRUIT->REC_DEADLINE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">면접방식</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_interview_type" id="recruit_interview_type"><?php echo $RECRUIT->REC_INTERVIEW_TYPE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">면접일자</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_interview_date" id="recruit_interview_date"><?php echo $RECRUIT->REC_INTERVIEW_DATE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">자격요건</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_prerequisite" id="recruit_prerequisite"><?php echo $RECRUIT->REC_PREREQUISITE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">급여</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_pay" id="recruit_pay"><?php echo $RECRUIT->REC_PAY?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">숙소</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_accomdation" id="recruit_accomdation"><?php echo $RECRUIT->REC_LODGIN?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">복지</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_welfare" id="recruit_welfare"><?php echo $RECRUIT->REC_WELFARE?></div>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-1">비자</td>
                                                <td class="col-sm-8">
                                                    <div class="col-sm-11">
                                                        <div class="wid100p" name="recruit_visa" id="recruit_visa"><?php echo $RECRUIT->REC_VISA?></div>
                                                    </div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="subContSec">
                                <div class="row">
                                    <div class="col-md-12">
                                    <section class="tile transparent">
                                            <!-- tile header -->
                                            <div class="header-text">
                                                <p class="apply_detail_view"><strong>상세정보</strong></p>
                                            </div>
                                            <!-- tile body -->
                                            <div class="tile-body color transparent-black rounded-corners">
                                                <table class="table table-custom dataTable applyTopViewTable">
                                                    <tbody>
                                                        <tr>
                                                            <td class="col-sm-12">
                                                                <div class="col-sm-12 transparent-editor">
                                                                <?php echo $RECRUIT->REC_CONTENTS?>
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
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






