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
                                    <h2>지원내용 보기</h2>
                                </div>
                                <form name="myApplyEditForm" id="myApplyEditForm" class="form-horizontal" role="form">
                                    <input type="hidden" id="app_seq" name="app_seq" value="<?php echo $MY_APPLY->APP_SEQ?>"/>
                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">지원자 기본정보</div>
                                        </div>
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">이름</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_name" id="apply_user_name" value="<?php echo  $MY_APPLY->APP_USER_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">주민번호</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_birthday" id="apply_user_birthday" value="<?php echo  $MY_APPLY->APP_USER_BIRTHDAY?>">    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">전화번호</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_tel" id="apply_user_tel" value="<?php echo  $MY_APPLY->APP_USER_TEL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">이메일</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_email" id="apply_user_email" value="<?php echo  $MY_APPLY->USER_EMAIL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">사진</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_img" id="apply_user_img" value="<?php echo  $MY_APPLY->APP_USER_IMG?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">사진 변경</th>
                                                    <td class="col-sm-3">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_img_edit" id="apply_user_img_edit" readonly>
                                                        <input type="button" class="btn btn-s btn-primary" name="apply_user_img_edit_btn" id="apply_user_img_edit_btn" value="찾아보기"> (Size: 110x120 px)
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">지원자 상세정보</div>
                                        </div>
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">University</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_uni" id="apply_uni" value="<?php echo  $MY_APPLY->APP_UNIVERSITY?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Major</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_major" id="apply_major" value="<?php echo  $MY_APPLY->APP_MAJOR?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Minor/Double Major</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_doublemajor" id="apply_doublemajor" value="<?php echo  $MY_APPLY->APP_DOUBLEMAJOR?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Grade</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_grade" id="apply_grade" value="<?php echo  $MY_APPLY->APP_GRADE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2"></th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" <?php if($MY_APPLY->APP_GRADE_TYPE == 1) echo "checked"?>> 재학 </label>
                                                        <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2" <?php if($MY_APPLY->APP_GRADE_TYPE == 2) echo "checked"?>> 휴학 </label>
                                                        <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3" <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "checked"?>> 졸업 </label>
                                                        <input type="text" class="form-control common_select" name="apply_grade_year" id="apply_grade_year" value="<?php echo  $MY_APPLY->APP_GRADE_YEAR?>">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">회사명</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_comp_name" id="apply_comp_name" value="<?php echo  $MY_APPLY->APP_COMP_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">재직기간</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_start_year" id="apply_work_start_year" value="<?php echo  $MY_APPLY->APP_WORK_START_YEAR?>"> 년
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_start_month" id="apply_work_start_month" value="<?php echo  $MY_APPLY->APP_WORK_START_MONTH?>"> 월
                                                        ~
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_end_year" id="apply_work_end_year" value="<?php echo  $MY_APPLY->APP_WORK_END_YEAR?>"> 년
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_end_month" id="apply_work_end_month" value="<?php echo  $MY_APPLY->APP_WORK_END_MONTH?>"> 월
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">부서명</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_department" id="apply_department" value="<?php echo  $MY_APPLY->APP_COMP_DEPARTMENT?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Date you wish to begin<br>your desired program</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_start_date" id="apply_start_date" value="<?php echo  $MY_APPLY->APP_START_DATE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">(Language Skill) English</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_eng_skill_1"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_1" value="1"<?php if($MY_APPLY->APP_ENG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                        <label for="apply_eng_skill_2"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_2" value="2" <?php if($MY_APPLY->APP_ENG_SKILL == 2) echo "checked"?>> Fair</label>
                                                        <label for="apply_eng_skill_3"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_3" value="3" <?php if($MY_APPLY->APP_ENG_SKILL == 3) echo "checked"?>> Poor</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">기타외국어</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_another_skill_1"><input type="radio" name="apply_another_skill" id="apply_another_skill_1" value="1"<?php if($MY_APPLY->APP_ETC_LANG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                        <label for="apply_another_skill_2"><input type="radio" name="apply_another_skill" id="apply_another_skill_2" value="2" <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 2) echo "checked"?>> Fair</label>
                                                        <label for="apply_another_skill_3"><input type="radio" name="apply_another_skill" id="apply_another_skill_3" value="3" <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 3) echo "checked"?>> Poor</label>
                                                        <input type="text" class="form-control common_select wid100p" name="apply_another_skill_name" id="apply_another_skill_name" value="<?php echo  $MY_APPLY->APP_ETC_LANG_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">TOEIC Score</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_toeic_score" id="apply_toeic_score" value="<?php echo  $MY_APPLY->APP_TOEIC_SCORE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">TOEFL Score</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_toefl_score" id="apply_toefl_score" value="<?php echo  $MY_APPLY->APP_TOEFL_SCORE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">경력사항</th>
                                                    <td class="col-sm-10">
                                                        <textarea class="form-control common_textarea wid100p" name="apply_career" id="apply_career"><?php echo  $MY_APPLY->APP_CAREER?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">여권보유여부</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_passport_flag_y"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_y" value="Y" <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'Y') echo "checked"?>> Yes</label>
                                                        <label for="apply_passport_flag_n"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_n" value="N" <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'N') echo "checked"?>> No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">미국비자발급거절여뷰</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_visa_flag_y"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_y" value="Y" <?php if($MY_APPLY->APP_VISA_FLAG == 'Y') echo "checked"?>> Yes</label>
                                                        <label for="apply_visa_flag_n"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_n" value="N" <?php if($MY_APPLY->APP_VISA_FLAG == 'N') echo "checked"?>> No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Self Introduction and goal<br>and motivation</th>
                                                    <td class="col-sm-10">
                                                        <textarea class="form-control common_textarea wid100p" name="apply_self_introduce" id="apply_self_introduce"><?php echo  $MY_APPLY->APP_INTRODUCE?></textarea>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </form>

                                <div class="subContSec">
                                    <div class="col-md-12 text-right">
                                        <input type="button" id="recruit_apply_edit" name="recruit_apply_edit" data_seq="<?php echo $MY_APPLY->APP_SEQ?>" class="btn btn-s btn-primary" value="수정하기">
                                        <a href="/consult/apply" class="btn btn-s btn-default">취소하기</a>
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
        $("#recruit_apply_edit").on("click", function(){
            var app_seq = $("input[name=app_seq]").val();
            var fd = new FormData();

            var form_data = $('#myApplyEditForm').serializeArray(); // serialize 사용
            // $.each(form_data, function (key, input) {
            //     if(input.value==""){
            //         alert("값을 넣어주세요");
            //         return false;
            //     }
            //     fd.append(input.name, input.value);
            // });
            
            // for (var key of FILE.keys()) {
            //     fd.append(key, FILE.get(key));
            // }

            for (var key of fd.keys()) {
                console.log(key);
            }

            // FormData의 value 확인
            for (var value of fd.values()) {
                console.log(value);
            }

            return 0;
            
            $.ajax({
                url: "/consult/apply_edit_proc",
                type: "POST",
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(resultMsg){
                    console.log(resultMsg);
                    if(resultMsg.code == 200){
                        alert("수정 되었습니다");
                        document.location.href="/consult/apply_view/"+app_seq;
                        
                    }else{
                        console.log("문제 발생");
                    }
                },
                error: function (request, status, error){        
                    console.log(error);
                }
            });
        })
    });
</script>






