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
                                <li><a href="/consult/qnaList">Q&A</a></li>
                                <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                                <li><a href="/consult/visitConsult">방문신청 상담</a></li>
                                <li class="on"><a href="/consult/apply">포지션&연수 지원</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>지원내용 보기</h2>
                                </div>

                                <div class="subContSec">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-10">지원자 기본정보</div>
                                    </div>
                                    <table class="table table-custom dataTable applyViewTable">
                                        <tbody>
                                            <tr>
                                                <th class="col-sm-2">이름(아이디)</th>
                                                <td class="col-sm-10"><?php echo $MY_APPLY->APP_USER_NAME."(".$MY_APPLY->USER_ID.")"?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">주민번호</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->APP_USER_BIRTHDAY?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">전화번호</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->APP_USER_TEL?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">이메일</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->APP_USER_EMAIL?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">주소</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->USER_ADDR1." ".$MY_APPLY->USER_ADDR1?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">사진</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->APP_USER_IMG?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>

                                <div class="subContSec">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-10">지원자 상세정보</div>
                                    </div>
                                    <table class="table table-custom dataTable applyViewTable">
                                        <tbody>
                                            <tr>
                                                <th class="col-sm-2">지원프로그램</th>
                                                <td class="col-sm-10">
                                                    <?php echo $MY_APPLY->REC_TITLE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">University</th>
                                                <td class="col-sm-10">
                                                    <div class="col-sm-3">
                                                        <?php echo  $MY_APPLY->APP_UNIVERSITY?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Major</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_MAJOR?>
                                                    <!-- <div class="col-sm-3">
                                                        <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" <?php if($MY_APPLY->APP_GRADE_TYPE == 1) echo "checked"?>> 재학 </label>
                                                        <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2" <?php if($MY_APPLY->APP_GRADE_TYPE == 2) echo "checked"?>> 휴학 </label>
                                                        <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3" <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "checked"?>> 졸업 </label>
                                                    </div> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Minor/Double Major</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_DOUBLEMAJOR?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Grade</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_GRADE?>
                                                    /
                                                    <?php if($MY_APPLY->APP_GRADE_TYPE == 1) echo "재학"?>
                                                    <?php if($MY_APPLY->APP_GRADE_TYPE == 2) echo "휴학"?>
                                                    <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "졸업"?> <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "("."$MY_APPLY->APP_GRADE_YEAR".")"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">회사명</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->APP_COMP_NAME?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">재직기간</th>
                                                <td class="col-sm-10"><?php echo  $MY_APPLY->APP_WORK_START_YEAR.".".$MY_APPLY->APP_WORK_START_MONTH." ~ ".$MY_APPLY->APP_WORK_END_YEAR.".".$MY_APPLY->APP_WORK_END_MONTH ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">부서명</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_COMP_DEPARTMENT?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Date you wish to begin<br>yourdesired program</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_START_DATE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">(Language Skill) English</th>
                                                <td class="col-sm-10">
                                                    <?php if($MY_APPLY->APP_ENG_SKILL == 1) echo "Fluent"?>
                                                    <?php if($MY_APPLY->APP_ENG_SKILL == 2) echo "Fair"?>
                                                    <?php if($MY_APPLY->APP_ENG_SKILL == 3) echo "Poor"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">기타 외국어 : <?php echo $MY_APPLY->APP_ETC_LANG_NAME?></th>
                                                <td class="col-sm-10">
                                                    <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 1) echo "Fluent"?>
                                                    <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 2) echo "Fair"?>
                                                    <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 3) echo "Poor"?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th class="col-sm-2">TOEIC Score</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_TOEIC_SCORE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">TOEFL Score</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_TOEFL_SCORE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">경력사항</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_CAREER?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">여권보유여부</th>
                                                <td class="col-sm-10">
                                                    <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'Y') echo "Yes"?>
                                                    <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'N') echo "No"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">미국비자발급거절여뷰</th>
                                                <td class="col-sm-10">
                                                    <?php if($MY_APPLY->APP_VISA_FLAG == 'Y') echo "Yes"?>
                                                    <?php if($MY_APPLY->APP_VISA_FLAG == 'N') echo "No"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Self Introduction and goal<br>and motivation</th>
                                                <td class="col-sm-10">
                                                    <?php echo  $MY_APPLY->APP_INTRODUCE?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="subContSec">
                                    <div class="col-md-10">
                                        <a href="/consult/apply" class="btn btn-s btn-default">목록보기</a>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a href="/consult/apply_edit/<?php echo $MY_APPLY->APP_SEQ?>" class="btn btn-s btn-primary">수정하기</a>
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






