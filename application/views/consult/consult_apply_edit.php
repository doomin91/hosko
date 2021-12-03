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
                                    <h2>지원내용 보기</h2>
                                </div>
                                <form name="myApplyEditForm" id="myApplyEditForm" class="form-horizontal" role="form">
                                    <input type="hidden" id="app_seq" name="app_seq" value="<?php echo $MY_APPLY->APP_SEQ?>"/>
                                    <div class="subContSec">
                                        <div class="applyViewTitle">지원자 기본정보</div>
                                        <table class="applyViewTable dataTable">
                                            <colgroup>
                                                <col width="15%"/>
                                                <col width="85%"/>
                                            </colgroup>  
                                            <tbody>
                                                <tr>
                                                    <th>이름</th>
                                                    <td>
                                                        <input type="text" class="applyform wid100p" name="apply_user_name" id="apply_user_name" value="<?php echo  $MY_APPLY->APP_USER_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>주민번호</th>
                                                    <td>
                                                        <input type="text" class="applyform wid100p" name="apply_user_birthday" id="apply_user_birthday" value="<?php echo  $MY_APPLY->APP_USER_BIRTHDAY?>">    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>전화번호</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_user_tel" id="apply_user_tel" value="<?php echo  $MY_APPLY->APP_USER_TEL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>이메일</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_user_email" id="apply_user_email" value="<?php echo  $MY_APPLY->USER_EMAIL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사진</th>
                                                    <td class="applyphoto">
                                                        <img src="<?php echo  $MY_APPLY->APP_USER_IMG?>">
                                                        <!-- <input type="text" class="applyform common_select wid100p" name="apply_user_img" id="apply_user_img" value="<?php echo  $MY_APPLY->APP_USER_IMG?>"> -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사진 변경</th>
                                                    <td>
                                                        <div class="recruitfile">
                                                            <input type="text" readonly="readonly" class="filename" />
                                                            <label for="apply_user_img_edit" class="filelabel">파일 업로드</label>
                                                            <input type="file" name="apply_user_img_edit" id="apply_user_img_edit" class="fileupload" />
                                                        </div>

                                                        <!-- <input type="text" class="applyform common_select wid100p" name="apply_user_img_edit" id="apply_user_img_edit" readonly>
                                                        <input type="button" class="btn btn-s btn-primary" name="apply_user_img_edit_btn" id="apply_user_img_edit_btn" value="찾아보기"> (Size: 110x120 px) -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        

                                        <div class="applyViewTitle mt50">지원자 상세정보</div>



                                        <table class="applyViewTable dataTable">
                                            <colgroup>
                                                <col width="15%"/>
                                                <col width="85%"/>
                                            </colgroup>  
                                            <tbody>
                                                <tr>
                                                    <th>University</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_uni" id="apply_uni" value="<?php echo  $MY_APPLY->APP_UNIVERSITY?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Major</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_major" id="apply_major" value="<?php echo  $MY_APPLY->APP_MAJOR?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Minor/Double Major</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_doublemajor" id="apply_doublemajor" value="<?php echo  $MY_APPLY->APP_DOUBLEMAJOR?>">
                                                    </td>
                                                </tr>
                                                <tr style="border-bottom:0;">
                                                    <th rowspan="2">Grade</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_grade" id="apply_grade" value="<?php echo  $MY_APPLY->APP_GRADE?>">
                                                    </td>
                                                </tr>
                                                <tr style="border-top:0;">
                                                    <td class="recruitRadio">
                                                        <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" <?php if($MY_APPLY->APP_GRADE_TYPE == 1) echo "checked"?>> 재학 </label>
                                                        <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2" <?php if($MY_APPLY->APP_GRADE_TYPE == 2) echo "checked"?>> 휴학 </label>
                                                        <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3" <?php if($MY_APPLY->APP_GRADE_TYPE == 3) echo "checked"?>> 졸업 </label>
                                                        <input type="text" class="applyform common_select wid25p ml10" name="apply_grade_year" id="apply_grade_year" value="<?php echo  $MY_APPLY->APP_GRADE_YEAR?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>회사명</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_comp_name" id="apply_comp_name" value="<?php echo  $MY_APPLY->APP_COMP_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>재직기간</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select" style="width:120px;" name="apply_work_start_year" id="apply_work_start_year" value="<?php echo  $MY_APPLY->APP_WORK_START_YEAR?>">&nbsp; 년 &nbsp;
                                                        <input type="text" class="applyform common_select" style="width:120px;" name="apply_work_start_month" id="apply_work_start_month" value="<?php echo  $MY_APPLY->APP_WORK_START_MONTH?>">&nbsp; 월 &nbsp;
                                                        ~
                                                        <input type="text" class="applyform common_select" style="width:120px;" name="apply_work_end_year" id="apply_work_end_year" value="<?php echo  $MY_APPLY->APP_WORK_END_YEAR?>">&nbsp; 년 &nbsp;
                                                        <input type="text" class="applyform common_select" style="width:120px;" name="apply_work_end_month" id="apply_work_end_month" value="<?php echo  $MY_APPLY->APP_WORK_END_MONTH?>">&nbsp; 월 &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>부서명</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_comp_department" id="apply_comp_department" value="<?php echo  $MY_APPLY->APP_COMP_DEPARTMENT?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Date you wish to begin your desired program</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_start_date" id="apply_start_date" value="<?php echo  $MY_APPLY->APP_START_DATE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>(Language Skill) English</th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_eng_skill_1"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_1" value="1"<?php if($MY_APPLY->APP_ENG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                        <label for="apply_eng_skill_2"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_2" value="2" <?php if($MY_APPLY->APP_ENG_SKILL == 2) echo "checked"?>> Fair</label>
                                                        <label for="apply_eng_skill_3"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_3" value="3" <?php if($MY_APPLY->APP_ENG_SKILL == 3) echo "checked"?>> Poor</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>기타외국어</th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_another_skill_1"><input type="radio" name="apply_another_skill" id="apply_another_skill_1" value="1"<?php if($MY_APPLY->APP_ETC_LANG_SKILL == 1) echo "checked"?> > Fluent</label>
                                                        <label for="apply_another_skill_2"><input type="radio" name="apply_another_skill" id="apply_another_skill_2" value="2" <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 2) echo "checked"?>> Fair</label>
                                                        <label for="apply_another_skill_3"><input type="radio" name="apply_another_skill" id="apply_another_skill_3" value="3" <?php if($MY_APPLY->APP_ETC_LANG_SKILL == 3) echo "checked"?>> Poor</label>
                                                        <input type="text" class="applyform common_select wid25p" style="margin-bottom:0; margin-left:10px;" name="apply_another_skill_name" id="apply_another_skill_name" value="<?php echo  $MY_APPLY->APP_ETC_LANG_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TOEIC Score</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_toeic_score" id="apply_toeic_score" value="<?php echo  $MY_APPLY->APP_TOEIC_SCORE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TOEFL Score</th>
                                                    <td>
                                                        <input type="text" class="applyform common_select wid100p" name="apply_toefl_score" id="apply_toefl_score" value="<?php echo  $MY_APPLY->APP_TOEFL_SCORE?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>경력사항</th>
                                                    <td class="apply_textarea">
                                                        <textarea class=" " cols="50" rows="8" name="apply_career" id="apply_career"><?php echo  $MY_APPLY->APP_CAREER?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>여권보유여부</th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_passport_flag_y"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_y" value="Y" <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'Y') echo "checked"?>> Yes</label>
                                                        <label for="apply_passport_flag_n"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_n" value="N" <?php if($MY_APPLY->APP_PASSPORT_FLAG == 'N') echo "checked"?>> No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>미국 비자발급거절 여부</th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_visa_flag_y"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_y" value="Y" <?php if($MY_APPLY->APP_VISA_FLAG == 'Y') echo "checked"?>> Yes</label>
                                                        <label for="apply_visa_flag_n"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_n" value="N" <?php if($MY_APPLY->APP_VISA_FLAG == 'N') echo "checked"?>> No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Self Introduction and goal and motivation</th>
                                                    <td class="apply_textarea">
                                                        <textarea class="" cols="50" rows="8" name="apply_self_introduce" id="apply_self_introduce"><?php echo  $MY_APPLY->APP_INTRODUCE?></textarea>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </form>

                                <div class="ApplyBtnWrap mt30 mb30">
                                    <button type="button" onclick="location.href='/consult/apply';" class="applybtn01 f_left">취소하기</button>
                                    <button type="button" id="recruit_apply_edit" class="applybtn02 f_right" data_seq="<?php echo $MY_APPLY->APP_SEQ?>">수정하기</button>
                                </div>


                                <!--
                                <div class="subContSec">
                                    <div class="col-md-12 text-right">
                                        <input type="button" id="recruit_apply_edit" name="recruit_apply_edit" data_seq="<?php echo $MY_APPLY->APP_SEQ?>" class="btn btn-s btn-primary" value="수정하기">
                                        <a href="/consult/apply" class="btn btn-s btn-default">취소하기</a>
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
        var FILE = new FormData();

        $("input[name='apply_user_img_edit']").change(function(){
            FILE = new FormData();
            var file = this.files[0];
            // var parent = $(this).closest(".input-group");
            // // $(this).val("test");
            // console.log(parent);
            // var input = $(parent).find(".file_view");
            // console.log(input);
            // $(input).val(file['name']);
            // // console.log(file['name']);
            // // console.log(input);
            // console.log(file);
            // console.log(this.id);

            FILE.append(this.id, file);

            for (var key of FILE.keys()) {
            console.log(key);
            }

            // FormData의 value 확인
            for (var value of FILE.values()) {
            console.log(value);
            }
            
            $(".filename").val(file.name);
        });

        $("#recruit_apply_edit").on("click", function(){
            var app_seq = $("input[name=app_seq]").val();
            var fd = new FormData();
            fd.append("app_seq", app_seq);

            var is_blank = false;

            var form_data = $('#myApplyEditForm').serializeArray(); // serialize 사용
            $.each(form_data, function (key, input) {
                // var ip = "";
                // console.log(input);
                // if(input.name == "apply_career" || input.name == "apply_self_introduce"){
                //     ip = $(`textarea[name=${input.name}]`);
                // }else{
                //     ip = $(`input[name=${input.name}]`);
                // }
                
                // console.log(ip);
                // if($(ip).val() == ""){
                //     alert("빈 값을 넣어주세요");
                //     $(ip).focus();
                //     is_blank = true;
                //     return false;
                // }
                
                
                fd.append(input.name, input.value);
            });

            if(is_blank){
                return false;
            }

            if($(".filename").val() != ""){
                for (var key of FILE.keys()) {
                    fd.append(key, FILE.get(key));
                }
            }
   
            // console.log(form_data);

            // for (var key of fd.keys()) {
            //     console.log(key);
            // }

            // // FormData의 value 확인
            // for (var value of fd.values()) {
            //     console.log(value);
            // }
            
            $.ajax({
                url: "/consult/apply_edit_proc",
                type: "POST",
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(resultMsg){
                    console.log(resultMsg.code);
                    if(resultMsg.code == 200){
                        alert("수정 되었습니다");
                        document.location.href="/consult/apply_view/"+app_seq;
                        
                    }else{
                        console.log("문제 발생");
                    }
                },
                error: function (request, status, error){        
                    console.log(request);
                    console.log(error);
                }
            });
        })
    });
</script>






