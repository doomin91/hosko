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
                                <li><a href="/consult/consult/visitConsult">방문신청 상담</a></li>
                                <li class="on"><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="/consult/presentationList">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>지원내용 보기</h2>
                                </div>

                                <div class="subContSec mb80">
                                    <div class="applyViewTitle">지원자 기본정보</div>

                                    <table class="dataTable applyViewTable">
                                        <colgroup>
                                            <col width="15%"/>
                                            <col width="85%"/>
                                        </colgroup>                                        
                                        <tbody>
                                            <tr>
                                                <th>이름(아이디)</th>
                                                <td><?php echo $MY_APPLY->APP_USER_NAME."(".$MY_APPLY->USER_ID.")"?></td>
                                            </tr>
                                            <tr>
                                                <th>주민번호</th>
                                                <td><?php echo  $MY_APPLY->APP_USER_BIRTHDAY?></td>
                                            </tr>
                                            <tr>
                                                <th>전화번호</th>
                                                <td><?php echo  $MY_APPLY->APP_USER_TEL?></td>
                                            </tr>
                                            <tr>
                                                <th>이메일</th>
                                                <td><?php echo  $MY_APPLY->APP_USER_EMAIL?></td>
                                            </tr>
                                            <tr>
                                                <th>주소</th>
                                                <td><?php echo  $MY_APPLY->USER_ADDR1." ".$MY_APPLY->USER_ADDR1?></td>
                                            </tr>
                                            <tr>
                                                <th>사진</th>
                                                <td><?php echo  $MY_APPLY->APP_USER_IMG?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="applyViewTitle mt50">지원자 상세정보</div>

                                    <table class=" dataTable applyViewTable">
                                        <colgroup>
                                            <col width="15%"/>
                                            <col width="85%"/>
                                        </colgroup>  
                                        <tbody>
                                            <tr>
                                                <th>지원프로그램</th>
                                                <td>
                                                    <?php echo $MY_APPLY->REC_TITLE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>University</th>
                                                <td>
                                                    <div>
                                                        <?php echo  $MY_APPLY->APP_UNIVERSITY?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Major</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_MAJOR?>
                                                    <!-- <div class="col-sm-3">
                                                        <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" <?php if($MY_APPLY->APP_GRADE_TYPE == 1) echo "checked"?>> 재학 </label>
                                                        <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2" <?php if($MY_APPLY->APP_GRADE_TYPE == 2) echo "checked"?>> 휴학 </label>
                                                        <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3" <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "checked"?>> 졸업 </label>
                                                    </div> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Minor/Double Major</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_DOUBLEMAJOR?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Grade</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_GRADE?>
                                                    /
                                                    <?php if($MY_APPLY->APP_GRADE_TYPE == 1) echo "재학"?>
                                                    <?php if($MY_APPLY->APP_GRADE_TYPE == 2) echo "휴학"?>
                                                    <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "졸업"?> <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "("."$MY_APPLY->APP_GRADE_YEAR".")"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>회사명</th>
                                                <td><?php echo  $MY_APPLY->APP_COMP_NAME?></td>
                                            </tr>
                                            <tr>
                                                <th>재직기간</th>
                                                <td><?php echo  $MY_APPLY->APP_WORK_START_YEAR.".".$MY_APPLY->APP_WORK_START_MONTH." ~ ".$MY_APPLY->APP_WORK_END_YEAR.".".$MY_APPLY->APP_WORK_END_MONTH ?></td>
                                            </tr>
                                            <tr>
                                                <th>부서명</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_COMP_DEPARTMENT?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Date you wish to begin<br>yourdesired program</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_START_DATE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>(Language Skill) English</th>
                                                <td>
                                                    <?php if($MY_APPLY->APP_ENG_SKILL == 1) echo "Fluent"?>
                                                    <?php if($MY_APPLY->APP_ENG_SKILL == 2) echo "Fair"?>
                                                    <?php if($MY_APPLY->APP_ENG_SKILL == 3) echo "Poor"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>기타 외국어 : <?php echo $MY_APPLY->APP_ETC_LANG_NAME?></th>
                                                <td>
                                                    <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 1) echo "Fluent"?>
                                                    <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 2) echo "Fair"?>
                                                    <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 3) echo "Poor"?>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <th>TOEIC Score</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_TOEIC_SCORE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>TOEFL Score</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_TOEFL_SCORE?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>경력사항</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_CAREER?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>여권보유여부</th>
                                                <td>
                                                    <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'Y') echo "Yes"?>
                                                    <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'N') echo "No"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>미국비자발급거절여뷰</th>
                                                <td>
                                                    <?php if($MY_APPLY->APP_VISA_FLAG == 'Y') echo "Yes"?>
                                                    <?php if($MY_APPLY->APP_VISA_FLAG == 'N') echo "No"?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Self Introduction and goal<br>and motivation</th>
                                                <td>
                                                    <?php echo  $MY_APPLY->APP_INTRODUCE?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="ApplyBtnWrap mt30 mb30">
                                        <button type="button" onclick="location.href='/consult/apply';" class="applybtn01 f_left">목록보기</button>
                                        <button type="button" onclick="location.href='/'" class="applybtn02 f_right">수정하기</button>
                                    </div>

                                </div>

<!--
                                <div class="subContSec">
                                    <div class="col-md-10">
                                        <a href="/consult/apply" class="btn btn-s btn-default">목록보기</a>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <a href="/consult/apply_edit/<?php echo $MY_APPLY->APP_SEQ?>" class="btn btn-s btn-primary">수정하기</a>
                                    </div>
                                </div>

-->


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






