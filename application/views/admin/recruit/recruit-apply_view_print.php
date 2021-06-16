<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-ｅquiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="/assets/css/font-awesome.css" rel="stylesheet">
        <style>
            body { font-family:'NanumGothic', '나눔고딕', 'dotum', '돋움'; font-size: 10px; line-height:18px; -webkit-font-smoothing: antialiased; }
            .print_content {position:relative; width:700px;  }
            .print_content .header-text p {font-size: 13px;}
            .table {position:relative; width:100%;border-bottom:1px solid #777575;}
            .table table {width: 100%; border-spacing: 0;  }
            .table table tr {height: 35px; line-height: 18px; padding: 5px 0;  }
            .table table tr th {text-align: left; font-weight: bold;  padding-left: 5px; background-color:#e5e5e5; border-top:1px solid #777575; }
            .table table tr td {padding-left:10px; padding-top:5px; padding-bottom:5px; border-top:1px solid #777575; word-break: break-all}
            .approval_div {width: 160px; padding:5px; float:left;}
            .box_h30 {height:30px; vertical-align: middle; line-height: 30px; border-top-left-radius: 5px; border-top-right-radius: 5px; text-align: center; border:1px solid #777575;}
            .box_h60 {height:50px; vertical-align: middle; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align: center; line-height: 22px; text-align: center; margin-top:-1px; border:1px solid #777575;}
            .comment {width: 100%;}
            .comment .comment_name {width: 100px; display: inline-block}
            .comment .comment_description {width: 300px; display: inline-block; word-break:break-all}
            .comment .comment_date {width: 130px; display: inline-block}

            .table_c {position:relative; width:100%; border-bottom:1px solid #777575;}
            .table_c table {width: 100%; border-spacing: 0; }
            .table_c table tr {height: 35px; line-height: 18px; padding: 5px 0; }
            .table_c table tr th {text-align:center; font-weight: bold; background:#e5e5e5; padding-left: 5px; border-top:1px solid #777575;}
            .table_c table tr td {padding-left:10px; padding-top:5px; padding-bottom:5px; text-align:center; border-top:1px solid #777575; word-break: break-all}
            .text-center {text-align:center;}
            .bg_bc01 {background-color:#e5e5e5; }
        </style>
    </head>
    <body class="bg-1">

        <!-- Preloader -->
        <div class="mask"><div id="loader"></div></div>
        <!--/Preloader -->

        <!-- Wrap all page content here -->
        <div id="wrap">

        <!-- Make page fluid -->
            <div class="row">

            <!-- Page content -->
            <div id="content" class="col-md-12">

            <!-- /page header -->

            <!-- content main container -->
            <div class="main">

                <div class="row">
                    <div class="col-md-6">
                        <section class="tile transparent">
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyTopViewTable">
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-2">지원프로그램</th>
                                            <td class="col-sm-10"><?php echo $APPLY_INFO->REC_TITLE?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">가격</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-3">
                                                <input type="text" class="form-control common_select wid100p" name="apply_price" id="apply_price" value="<?php echo $APPLY_INFO->APP_PRICE?>">
                                                </div>
                                                <div class="col-sm-2 common_input" style="line-height:3; margin-left:-20px;">
                                                원
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="tile transparent">
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyTopViewTable">
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-2">지원일자</th>
                                            <td class="col-sm-10"><?php echo $APPLY_INFO->APP_REG_DATE?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">상태</th>
                                            <td class="col-sm-10">
                                                <select class="apply_status_option">
                                                    <option value="0" <?php if($APPLY_INFO->REC_STATUS==1) echo "selected"?>>온라인상담</option>
                                                    <option value="1" <?php if($APPLY_INFO->REC_STATUS==2) echo "selected"?>>지원</option>
                                                    <option value="2" <?php if($APPLY_INFO->REC_STATUS==3) echo "selected"?>>지원서류제출</option>
                                                    <option value="3" <?php if($APPLY_INFO->REC_STATUS==4) echo "selected"?>>비용입금</option>
                                                    <option value="4" <?php if($APPLY_INFO->REC_STATUS==5) echo "selected"?>>서류전형</option>
                                                    <option value="5" <?php if($APPLY_INFO->REC_STATUS==6) echo "selected"?>>인터뷰준비</option>
                                                    <option value="6" <?php if($APPLY_INFO->REC_STATUS==7) echo "selected"?>>인터뷰</option>
                                                    <option value="7" <?php if($APPLY_INFO->REC_STATUS==8) echo "selected"?>>합격공지</option>
                                                    <option value="8" <?php if($APPLY_INFO->REC_STATUS==9) echo "selected"?>>출국준비</option>
                                                    <option value="9" <?php if($APPLY_INFO->REC_STATUS==10) echo "selected"?>>소양교육</option>
                                                    <option value="10" <?php if($APPLY_INFO->REC_STATUS==11) echo "selected"?>>출국</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                        <section class="tile transparent">
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyViewTable">
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-2">이름(아이디)</th>
                                            <td class="col-sm-10"><?php echo $APPLY_INFO->USER_NAME."(".$APPLY_INFO->USER_ID.")"?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">주민번호</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_BIRTHDAY?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">전화번호</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_TEL?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">핸드폰번호</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_HP?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">이메일</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_EMAIL?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">주소</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->USER_ADDR1." ".$APPLY_INFO->USER_ADDR1?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">사진</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_PROFILE_IMG?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">University</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_uni" id="apply_uni" value="<?php echo  $APPLY_INFO->APP_UNIVERSITY?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">Major</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-3">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_major" id="apply_major" value="<?php echo  $APPLY_INFO->APP_MAJOR?>">
                                                </div>
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_grade" id="apply_grade" value="<?php echo  $APPLY_INFO->APP_GRADE?>">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" <?php if($APPLY_INFO->APP_GRADE_TYPE == 1) echo "checked"?>> 재학 </label>
                                                    <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2" <?php if($APPLY_INFO->APP_GRADE_TYPE == 2) echo "checked"?>> 휴학 </label>
                                                    <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3" <?php if($APPLY_INFO->APP_GRADE_TYPE == 3) echo "checked"?>> 졸업 </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">졸업년도</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_GRADE_YEAR?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">회사명</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_COMP_NAME?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">재직기간</th>
                                            <td class="col-sm-10"><?php echo  $APPLY_INFO->APP_WORK_START_YEAR.".".$APPLY_INFO->APP_WORK_START_MONTH." ~ ".$APPLY_INFO->APP_WORK_END_YEAR.".".$APPLY_INFO->APP_WORK_END_MONTH ?></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">부서명</th>
                                            
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_department" id="apply_department" value="<?php echo  $APPLY_INFO->APP_COMP_DEPARTMENT?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">Date you wish to begin<br>yourdesired program</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_start_date" id="apply_start_date" value="<?php echo  $APPLY_INFO->APP_START_DATE?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">(Language Skill) English</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    English: 
                                                    <label for="apply_eng_skill_1"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_1" value="1"<?php if($APPLY_INFO->APP_ENG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                    <label for="apply_eng_skill_2"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_2" value="2" <?php if($APPLY_INFO->APP_ENG_SKILL == 2) echo "checked"?>> Fair</label>
                                                    <label for="apply_eng_skill_3"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_3" value="3" <?php if($APPLY_INFO->APP_ENG_SKILL == 3) echo "checked"?>> Poor</label>
                                                <br>
                                                    기타외국어:
                                                    <label for="apply_another_skill_1"><input type="radio" name="apply_another_skill" id="apply_another_skill_1" value="1"<?php if($APPLY_INFO->APP_ETC_LANG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                    <label for="apply_another_skill_2"><input type="radio" name="apply_another_skill" id="apply_another_skill_2" value="2" <?php if($APPLY_INFO->APP_ETC_LANG_SKILL == 2) echo "checked"?>> Fair</label>
                                                    <label for="apply_another_skill_3"><input type="radio" name="apply_another_skill" id="apply_another_skill_3" value="3" <?php if($APPLY_INFO->APP_ETC_LANG_SKILL == 3) echo "checked"?>> Poor</label>
                                                    <input type="text" class="form-control common_select wid100p" name="apply_another_skill_name" id="apply_another_skill_name" value="<?php echo  $APPLY_INFO->APP_ETC_LANG_NAME?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">TOEIC Score</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_toeic_score" id="apply_toeic_score" value="<?php echo  $APPLY_INFO->APP_TOEIC_SCORE?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">TOEFL Score</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control common_select wid100p" name="apply_toefl_score" id="apply_toefl_score" value="<?php echo  $APPLY_INFO->APP_TOEFL_SCORE?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">경력사항</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <textarea class="form-control common_textarea wid100p" name="apply_career" id="apply_career"><?php echo  $APPLY_INFO->APP_CAREER?></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">여권보유여부</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <label for="apply_passport_flag_y"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_y" value="Y" <?php if($APPLY_INFO->APP_PASSPORT_FLAG == 'Y') echo "checked"?>> YES</label>
                                                    <label for="apply_passport_flag_n"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_n" value="N" <?php if($APPLY_INFO->APP_PASSPORT_FLAG == 'N') echo "checked"?>> NO</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">미국비자발급거절여뷰</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <label for="apply_visa_flag_y"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_y" value="Y" <?php if($APPLY_INFO->APP_VISA_FLAG == 'Y') echo "checked"?>> YES</label>
                                                    <label for="apply_visa_flag_n"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_n" value="N" <?php if($APPLY_INFO->APP_VISA_FLAG == 'N') echo "checked"?>> NO</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">Self Introduction and goal<br>and motivation</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <textarea class="form-control common_textarea wid100p" name="apply_self_introduce" id="apply_self_introduce"><?php echo  $APPLY_INFO->APP_INTRODUCE?></textarea>
                                                    <!-- <input type="textarea" class="form-control common_textarea wid100p" name="apply_self_introduce" id="apply_self_introduce" value="<?php echo  $APPLY_INFO->APP_INTRODUCE?>"> -->
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">관리자 메모</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-5">
                                                    <textarea type="textarea" class="form-control common_textarea wid100p" name="apply_admin_memo" id="apply_admin_memo"><?php echo  $APPLY_INFO->APP_ADMIN_MEMO?></textarea>
                                                    <!-- <input type="textarea" class="form-control common_textarea wid100p" name="apply_admin_memo" id="apply_admin_memo" value="<?php echo  $APPLY_INFO->APP_ADMIN_MEMO?>"> -->
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                
                                
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /row -->

            </div>
            <!-- /content container -->

            </div>
            <!-- Page content end -->

        </div>
        <!-- Make page fluid-->

        </div>
        <!-- Wrap all page content end -->


    </body>
</html>
<script>
	window.print();
    window.onfocus=function(){ window.close();}
</script>


