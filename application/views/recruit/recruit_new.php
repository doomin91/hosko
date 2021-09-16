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
                                <li <?php $CATEGORY==1 ? print("class='on'") : "" ?> ><a href="/recruit?ctg=1">인턴쉽</a></li>
                                <li <?php $CATEGORY==2 ? print("class='on'") : "" ?>><a href="/recruit?ctg=2">JOB·헤드헌팅</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php echo "지원하기" ?></h2>
                                </div>

                                <form name="myApplyCreateForm" id="myApplyCreateForm" class="form-horizontal" role="form">
                                    <input type="hidden" id="rec_seq" name="rec_seq" value="<?php echo $RECRUIT->REC_SEQ?>"/>
                                    <input type="hidden" id="user_seq" name="user_seq" value="<?php echo $USER->USER_SEQ?>"/>
                                    <div class="subContSec">

                                        <div class="row RecruitTitle">
                                            <h2>지원자 기본정보</h2>
                                        </div>

                                        <table class="RecruitTable dataTable mb30">
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="80%"/>
                                            </colgroup>
                                            <tbody>
                                                <?php 
                                                    $img_path = explode("/", $USER->USER_PROFILE);
                                                    $path_count = count($img_path);
                                                    $img_name = $img_path[$path_count-1];
                                                ?>
                                                <tr>
                                                    <th>이름</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_user_name" id="apply_user_name" value="<?php echo  $USER->USER_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>주민번호</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_user_birthday" id="apply_user_birthday" value="<?php echo  $USER->USER_BIRTHDAY?>">    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>전화번호</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_user_tel" id="apply_user_tel" value="<?php echo  $USER->USER_HP?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>이메일</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_user_email" id="apply_user_email" value="<?php echo  $USER->USER_EMAIL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사진</th>
                                                    <td>
                                                        <input type="text" class="recruitform file_view" value="<?php echo $img_name?> (기존 회원 이미지)" readonly="">
                                                        <!--
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                <i class="fa fa-upload"></i><input type="file" id="apply_user_img" name="apply_user_img">
                                                                </span>
                                                            </span>
                                                        </div>

                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_img_edit" id="apply_user_img_edit" readonly>
                                                        <input type="button" class="btn btn-s btn-primary" name="apply_user_img_edit_btn" id="apply_user_img_edit_btn" value="찾아보기"> (Size: 110x120 px) -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>사진교체</th>
                                                    <td>
                                                        <div class="recruitfile">
                                                            <input type="text" readonly="readonly" class="filename" />
                                                            <label for="apply_user_img" class="filelabel">파일 업로드</label>
                                                            <input type="file" name="apply_user_img" id="apply_user_img" class="fileupload" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        


                                        <div class="row RecruitTitle">
                                            <h2>지원자 상세정보</h2>
                                        </div>



                                        <table class="RecruitTable dataTable">
                                            <colgroup>
                                                <col width="20%"/>
                                                <col width="80%"/>
                                            </colgroup>                                            
                                            <tbody>
                                                <tr>
                                                    <th>지원 프로그램</th>
                                                    <td>
                                                    <?php echo  $RECRUIT->REC_TITLE?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>University</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_uni" id="apply_uni" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Major</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_major" id="apply_major" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Minor/Double Major</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_doublemajor" id="apply_doublemajor" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Grade</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid25p" name="apply_grade" id="apply_grade" value="">
                                                        <span class="ml10">학년</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1" checked = "checked"> 재학 </label>
                                                        <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2"> 휴학 </label>
                                                        <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3"> 졸업/졸업년도 </label>
                                                        <input type="text" class="recruitform common_select wid25p" name="apply_grade_year" id="apply_grade_year" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>회사명</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_comp_name" id="apply_comp_name" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>재직기간</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select" style="width:120px;" name="apply_work_start_year" id="apply_work_start_year" value=""> &nbsp;년
                                                        <input type="text" class="recruitform common_select" style="width:120px;" name="apply_work_start_month" id="apply_work_start_month" value=""> &nbsp;월
                                                        &nbsp; ~ &nbsp;
                                                        <input type="text" class="recruitform common_select" style="width:120px;" name="apply_work_end_year" id="apply_work_end_year" value=""> &nbsp;년
                                                        <input type="text" class="recruitform common_select" style="width:120px;" name="apply_work_end_month" id="apply_work_end_month" value=""> &nbsp;월
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>부서명</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_comp_department" id="apply_comp_department" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Date you wish to begin<br>your desired program</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_start_date" id="apply_start_date" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>(Language Skill) English</th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_eng_skill_1"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_1" value="1" checked = "checked"> Fluent</label>
                                                        <label for="apply_eng_skill_2"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_2" value="2"> Fair</label>
                                                        <label for="apply_eng_skill_3"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_3" value="3"> Poor</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>기타외국어</th>
                                                    <td class="recruitRadio">
                                                        <label for="apply_another_skill_1"><input type="radio" name="apply_another_skill" id="apply_another_skill_1" value="1" checked = "checked"> Fluent</label>
                                                        <label for="apply_another_skill_2"><input type="radio" name="apply_another_skill" id="apply_another_skill_2" value="2"> Fair</label>
                                                        <label for="apply_another_skill_3"><input type="radio" name="apply_another_skill" id="apply_another_skill_3" value="3"> Poor</label>
                                                        <input type="text" class="recruitform common_select wid25p ml10" name="apply_another_skill_name" id="apply_another_skill_name" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TOEIC Score</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_toeic_score" id="apply_toeic_score" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>TOEFL Score</th>
                                                    <td>
                                                        <input type="text" class="recruitform common_select wid100p" name="apply_toefl_score" id="apply_toefl_score" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>경력사항</th>
                                                    <td>
                                                        <textarea class="recruitform common_textarea wid100p recruit_textarea" name="apply_career" id="apply_career"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>여권보유여부</th>
                                                    <td>
                                                        <label for="apply_passport_flag_y"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_y" value="Y" checked = "checked"> Yes</label>
                                                        <label for="apply_passport_flag_n"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_n" value="N" > No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>미국비자발급거절여뷰</th>
                                                    <td>
                                                        <label for="apply_visa_flag_y"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_y" value="Y" > Yes</label>
                                                        <label for="apply_visa_flag_n"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_n" value="N" checked = "checked"> No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Self Introduction and goal<br>and motivation</th>
                                                    <td>
                                                        <textarea class="recruitform common_textarea wid100p recruit_textarea" name="apply_self_introduce" id="apply_self_introduce"></textarea>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>

                                </form>

                                <div class="detail_footer mb60">
                                    <button class="recruit_btn01 mr20" id="recruit_apply_create" name="recruit_apply_create">지원하기</button>
                                    <button class="recruit_btn02"><a href="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $RECRUIT->REC_SEQ?>">취소하기</a></button>
                                    
                                    <!--
                                        <input type="button" id="recruit_apply_create" name="recruit_apply_create" class="btn btn-s btn-primary" value="지원하기">
                                        <a href="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $RECRUIT->REC_SEQ?>" class="btn btn-s btn-default">취소하기</a>
                                    -->
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
        var FILE = new FormData();

        $("input[name='apply_user_img']").change(function(){
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

        $("#recruit_apply_create").on("click", function(){
            var rec_seq = $("input[name=rec_seq]").val();
            var user_seq = $("input[name=user_seq]").val();
            var fd = new FormData();
            fd.append("rec_seq", rec_seq);
            fd.append("user_seq", user_seq);
            
            var is_blank = false;
            
            var form_data = $('#myApplyCreateForm').serializeArray(); // serialize 사용

            $.each(form_data, function (key, input) {
                var ip = "";
                console.log(input);
                if(input.name == "apply_career" || input.name == "apply_self_introduce"){
                    ip = $(`textarea[name=${input.name}]`);
                }else{
                    ip = $(`input[name=${input.name}]`);
                }
                
                console.log(ip);
                if($(ip).val() == ""){
                    alert("빈 값을 넣어주세요");
                    $(ip).focus();
                    is_blank = true;
                    return false;
                }
                
                
                fd.append(input.name, input.value);
            });

            for (var key of fd.keys()) {
                console.log(key);
            }

            // FormData의 value 확인
            for (var value of fd.values()) {
                console.log(value);
            }

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
                url: "/recruit/recruit_new_proc",
                type: "POST",
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(resultMsg){
                    console.log(resultMsg.code);
                    if(resultMsg.code == 200){
                        alert("지원 되었습니다");
                        document.location.href="/consult/apply";
                        
                    }else{
                        console.log("문제 발생");
                    }
                },
                error: function (request, status, error){      
                    console.log(request);
                    console.log(status);
                    console.log(error);
                }
            });
        })
    });
</script>






