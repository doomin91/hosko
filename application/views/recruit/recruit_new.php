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
                                    <h2><?php echo "지원하기" ?></h2>
                                </div>

                                <form name="myApplyCreateForm" id="myApplyCreateForm" class="form-horizontal" role="form">
                                    <input type="hidden" id="rec_seq" name="rec_seq" value="<?php echo $RECRUIT->REC_SEQ?>"/>
                                    <input type="hidden" id="user_seq" name="user_seq" value="<?php echo $USER->USER_SEQ?>"/>
                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">지원자 기본정보</div>
                                        </div>
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">이름</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_name" id="apply_user_name" value="<?php echo  $USER->USER_NAME?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">주민번호</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_birthday" id="apply_user_birthday" value="<?php echo  $USER->USER_BIRTHDAY?>">    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">전화번호</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_tel" id="apply_user_tel" value="<?php echo  $USER->USER_HP?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">이메일</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_user_email" id="apply_user_email" value="<?php echo  $USER->USER_EMAIL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">사진</th>
                                                    <td class="col-sm-10">
                                                        <div class="input-group col-sm-12">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                <i class="fa fa-upload"></i><input type="file" id="apply_user_img" name="apply_user_img">
                                                                </span>
                                                            </span>
                                                            <!-- <input type="text" class="form-control file_view" value="" readonly=""> -->
                                                        </div>

                                                        <!-- <input type="text" class="form-control common_select wid100p" name="apply_user_img_edit" id="apply_user_img_edit" readonly>
                                                        <input type="button" class="btn btn-s btn-primary" name="apply_user_img_edit_btn" id="apply_user_img_edit_btn" value="찾아보기"> (Size: 110x120 px) -->
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
                                                    <th class="col-sm-2">지원 프로그램</th>
                                                    <td class="col-sm-10">
                                                    <?php echo  $RECRUIT->REC_TITLE?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">University</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_uni" id="apply_uni" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Major</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_major" id="apply_major" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Minor/Double Major</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_doublemajor" id="apply_doublemajor" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Grade</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_grade" id="apply_grade" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2"></th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_uni_status_1"><input type="radio" name="apply_uni_status" id="apply_uni_status_1" value="1"> 재학 </label>
                                                        <label for="apply_uni_status_2"><input type="radio" name="apply_uni_status" id="apply_uni_status_2" value="2"> 휴학 </label>
                                                        <label for="apply_uni_status_3"><input type="radio" name="apply_uni_status" id="apply_uni_status_3" value="3"> 졸업 </label>
                                                        <input type="text" class="form-control common_select" name="apply_grade_year" id="apply_grade_year" value="">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">회사명</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_comp_name" id="apply_comp_name" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">재직기간</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_start_year" id="apply_work_start_year" value=""> 년
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_start_month" id="apply_work_start_month" value=""> 월
                                                        ~
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_end_year" id="apply_work_end_year" value=""> 년
                                                        <input type="text" class="form-control common_select wid100p" name="apply_work_end_month" id="apply_work_end_month" value=""> 월
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">부서명</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_comp_department" id="apply_comp_department" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Date you wish to begin<br>your desired program</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_start_date" id="apply_start_date" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">(Language Skill) English</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_eng_skill_1"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_1" value="1"> Fluent</label>
                                                        <label for="apply_eng_skill_2"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_2" value="2"> Fair</label>
                                                        <label for="apply_eng_skill_3"><input type="radio" name="apply_eng_skill" id="apply_eng_skill_3" value="3"> Poor</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">기타외국어</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_another_skill_1"><input type="radio" name="apply_another_skill" id="apply_another_skill_1" value="1"> Fluent</label>
                                                        <label for="apply_another_skill_2"><input type="radio" name="apply_another_skill" id="apply_another_skill_2" value="2"> Fair</label>
                                                        <label for="apply_another_skill_3"><input type="radio" name="apply_another_skill" id="apply_another_skill_3" value="3"> Poor</label>
                                                        <input type="text" class="form-control common_select wid100p" name="apply_another_skill_name" id="apply_another_skill_name" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">TOEIC Score</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_toeic_score" id="apply_toeic_score" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">TOEFL Score</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control common_select wid100p" name="apply_toefl_score" id="apply_toefl_score" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">경력사항</th>
                                                    <td class="col-sm-10">
                                                        <textarea class="form-control common_textarea wid100p" name="apply_career" id="apply_career"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">여권보유여부</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_passport_flag_y"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_y" value="Y" > Yes</label>
                                                        <label for="apply_passport_flag_n"><input type="radio" name="apply_passport_flag" id="apply_passport_flag_n" value="N" > No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">미국비자발급거절여뷰</th>
                                                    <td class="col-sm-10">
                                                        <label for="apply_visa_flag_y"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_y" value="Y" > Yes</label>
                                                        <label for="apply_visa_flag_n"><input type="radio" name="apply_visa_flag" id="apply_visa_flag_n" value="N" > No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Self Introduction and goal<br>and motivation</th>
                                                    <td class="col-sm-10">
                                                        <textarea class="form-control common_textarea wid100p" name="apply_self_introduce" id="apply_self_introduce"></textarea>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>

                            <div class="subContSec">
                                <div class="col-md-12 text-right">
                                    <input type="button" id="recruit_apply_create" name="recruit_apply_create" class="btn btn-s btn-primary" value="지원하기">
                                        <a href="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $RECRUIT->REC_SEQ?>" class="btn btn-s btn-default">취소하기</a>
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
            });

        $("#recruit_apply_create").on("click", function(){
            var rec_seq = $("input[name=rec_seq]").val();
            var user_seq = $("input[name=user_seq]").val();
            var fd = new FormData();
            fd.append("rec_seq", rec_seq);
            fd.append("user_seq", user_seq);

            var form_data = $('#myApplyCreateForm').serializeArray(); // serialize 사용
            $.each(form_data, function (key, input) {
                if(input.value=="" && input.name != "apply_user_img"){
                    alert("값을 넣어주세요");
                    return false;
                }
                fd.append(input.name, input.value);
            });
            
            for (var key of FILE.keys()) {
                fd.append(key, FILE.get(key));
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
                    console.log(error);
                }
            });
        })
    });
</script>






