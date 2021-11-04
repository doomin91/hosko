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
                    <?php if(isset($MY_INFO)) : ?>
                    <div class="sub_contents">
                        <div class="sub_category03">
                            <ul>
                                <li><a href="/mypage/memberEdit">정보관리</a></li>
                                <li class="on"><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                                <li><a href="/mypage/submissionDoc">제출서류 관리</a></li>
                            </ul>
                        </div>
                        <div class="inner">
                            <div class="subContWrap">
                                <div class="ContTopresumeBtn">
                                    <button class="resumadminbtn" onclick="location.href='/mypage/memberResumeManage' ">이력서 첨삭보기</button>
                                </div>
                                <div class="subTit">
                                    <h2><?php echo "이력서 작성" ?></h2>
                                </div>

                                <form name="myResumeCreateForm" id="myResumeCreateForm" class="form-horizontal" role="form">
                                    <input type="hidden" id="user_seq" name="user_seq" value="<?php echo $MY_INFO->USER_SEQ ?>"/>
                                    
                                    <div class="ResumeWrap">
                                        <div class="resume_img_frame">
                                            <img id="userPhoto" src="../static/front/img/resume_noimg.jpg">
                                        </div>

                                        <div class="resumefile">
                                            <span class="filetitle">사진</span>
                                            <input type="text" readonly="readonly" class="filename" />
                                            <label for="resume_img" class="filelabel">파일 업로드</label>
                                            <input type="file" name="resume_img" id="resume_img" class="fileupload" />
                                        </div>
                                        <!--
                                        <div class="input-group text-center col-sm-12">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                <i class="fa fa-upload"></i><input type="file" id="resume_img" name="resume_img">
                                                </span>
                                            </span>
                                        </div>
                                        -->

                                    </div>

                                    <div class="ResumeCont">
                                        <table class="ResumeTable dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-3">Title</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_title" id="resume_title" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Name (영문)</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_name" id="resume_user_name" value="<?php echo $MY_INFO->USER_ENG_NAME?>">
                                                        <div class="resumetext01"> * 영문 이름은 반드시 여권 이름과 동일하게 작성 되어야 합니다. </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Address</th>
                                                    <td class="col-sm-9">
                                                        <div>
                                                            <div class="wid100p">
                                                                <div class="resume_zip_form mb10">
                                                                    <input type="text" name="resume_user_zipcode" id="resume_user_zipcode" class="resumeform" value="<?php echo $MY_INFO->USER_ZIPCODE?>" readonly>
                                                                </div>
                                                                <div class="resume_zip_btn">
                                                                    <input type="button" class="btn btn-default" value="우편번호" id="searchZip">
                                                                </div>
                                                            </div>
                                                            <div class="mb10">
                                                                <input type="text" name="resume_user_addr1" id="resume_user_addr1" class="resumeform" value="<?php echo $MY_INFO->USER_ADDR1?>" readonly>
                                                            </div>
                                                            <div class="mb10">
                                                                <input type="text" name="resume_user_addr2" id="resume_user_addr2" class="resumeform" value="<?php echo $MY_INFO->USER_ADDR2?>">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Phone No.</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_phone" id="resume_user_phone" value="<?php echo $MY_INFO->USER_HP?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">E-mail</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_email" id="resume_user_email" value="<?php echo $MY_INFO->USER_EMAIL?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">SkypeID</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_skype_id" id="resume_user_skype_id" value="<?php echo $MY_INFO->USER_SKYPE_ID?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="resumetitle">
                                            <h2>Personal Particulars</h2>
                                        </div>


                                        <table class="ResumeTable dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-3">Age</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_age" id="resume_user_age" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Date of Birth</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" id="resume_user_dob" name="resume_user_dob" class="resumeform" value="<?php echo $MY_INFO->USER_BIRTHDAY?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Nationality</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_nationality" id="resume_user_nationality" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Martial Status</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_martial_status" id="resume_user_martial_status" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">I/C Number<br>(여권번호)</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_ic_number" id="resume_user_ic_number" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Permanent<br>Residence</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_permanent_residence" id="resume_user_permanent_residence" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Religion</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_religion" id="resume_user_religion" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Graduation Date<br>(yyyy/mm/dd)</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" id="resume_user_dog" name="resume_user_dog" class="resumeform" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Height</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid50p" name="resume_user_height" id="resume_user_height" value="">
                                                        <span class="">cm</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Weight</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid50p" name="resume_user_weight" id="resume_user_weight" value="">
                                                        <span class="">Kg</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Hobbies</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_hobby" id="resume_user_hobby" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Criminal Record</th>
                                                    <td class="col-sm-9">
                                                        <select name="resume_user_criminal_record" class="chosen-select chosen-transparent resumeform">
                                                            <option value="N" selected>No</option>
                                                            <option value="Y" >Yes</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="resumetitle">
                                            <h2>Education</h2>
                                        </div>

                                        <div class="resumeAcbox resumeJoinBox">
                                            <div class="resumeBox">
                                                <div class="box_content">
                                                    <div class="wid25p resume_activity_box">
                                                        <input type="text" class="resumeform" name="redu_date[]" value="" placeholder="날짜">
                                                    </div>
                                                    <div class="wid70p resume_activity_box">
                                                        <input type="text" class="resumeform" name="redu_description[]" value="" placeholder="내용">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_edu" data-which="redu">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_edu" data-which="redu_date" data-ph="날짜">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Working Experience</h2>
                                        </div>


                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <div class="box_content">
                                                    <div class="wid25p resume_activity_box">
                                                        <input type="text" class="resumeform" name="rwexp_date[]" value="" placeholder="날짜">
                                                    </div>
                                                    <div class="wid70p resume_activity_box">
                                                        <input type="text" class="resumeform" name="rwexp_description[]" value="" placeholder="내용">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_wexp" data-which="rwexp">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_wexp" data-which="rwexp_date" data-ph="날짜">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Activities</h2>
                                        </div>

                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <div class="box_content">
                                                    <div class="wid25p resume_activity_box">
                                                        <input type="text" class="resumeform" name="ract_date[]" value="" placeholder="날짜">
                                                    </div>
                                                    <div class="wid70p resume_activity_box">
                                                        <input type="text" class="resumeform" name="ract_description[]" value="" placeholder="내용">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_ract" data-which="ract">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_ract" data-which="ract_date" data-ph="날짜">
                                            </div>                                            
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Achievements</h2>
                                        </div>

                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <div class="box_content">
                                                    <div class="wid25p resume_activity_box">
                                                        <input type="text" class="resumeform" name="rahcv_title[]" value="" placeholder="타이틀">
                                                    </div>
                                                    <div class="wid70p resume_activity_box">
                                                        <input type="text" class="resumeform" name="rahcv_description[]" value="" placeholder="내용">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rahcv" data-which="rahcv">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rahcv" data-which="rahcv_title" data-ph="타이틀">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Professional Skills</h2>
                                        </div>

                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <div class="box_content">
                                                    <div class="wid25p resume_activity_box">
                                                        <input type="text" class="resumeform" name="rskil_date[]" value="" placeholder="날짜">
                                                    </div>
                                                    <div class="wid70p resume_activity_box">
                                                        <input type="text" class="resumeform" name="rskil_description[]" value="" placeholder="내용">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rskil" data-which="rskil">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rskil" data-which="rskil_date" data-ph="날짜">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Language Skills</h2>
                                        </div>


                                        <div class="resumeJoinBox resumeJoinBoxWider">
                                            <div class="resumeBox_label">
                                                <div class="resume_activity_box wid25p">Language</div>
                                                <div class="resume_activity_box wid25p">Speak</div>
                                                <div class="resume_activity_box wid25p">Written</div>
                                            </div> 
                                            <div class="resumeBox">
                                                <div class="box_content">
                                                    <div class="resume_activity_box wid25p">
                                                        <input type="text" name="rlang_name[]" value="" class="wid100p">
                                                    </div>
                                                    <div class="resume_activity_box wid25p">
                                                        <select name="rlang_speaking[]" class="wid100p">
                                                            <option value="0" selected>BASIC</option>
                                                            <option value="1" >GOOD</option>
                                                            <option value="2" >EXCELLENT</option>
                                                        </select>
                                                    </div>
                                                    <div class="resume_activity_box wid25p">
                                                        <select name="rlang_writing[]" class="wid100p">
                                                            <option value="0" selected>BASIC</option>
                                                            <option value="1" >GOOD</option>
                                                            <option value="2" >EXCELLENT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_lskil" data-which="lskil">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_lskil" data-which="lskil">
                                            </div>

                                        </div>

                                        <div class="resumetitle">
                                            <h2>Computer Skills</h2>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <input type="text" class="resumeform wid100p" name="resume_user_computer_skill" id="resume_user_computer_skill" value="">
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="resumebtnwrap">
                                <input type="button" id="create_resume" name="create_resume" class="resumebtn" value="완료하기">
                            </div>

                        </div>

                    </div>
                    <?php else : ?>

                    <div class="sub_contents">
                        <div class="sub_category03">
                            <ul>
                                <li><a href="/mypage/memberEdit">정보관리</a></li>
                                <li class="on"><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                                <li><a href="/mypage/submissionDoc">제출서류 관리</a></li>
                            </ul>
                        </div>
                        <div class="inner">
                            <div class="subContWrap">
                                <div class="ContTopresumeBtn">
                                    <button class="resumadminbtn" onclick="location.href='/mypage/memberResumeManage' ">이력서 첨삭보기</button>
                                </div>
                                <div class="subTit">
                                    <h2><?php echo "이력서 수정" ?></h2>
                                </div>

                                <form name="myResumeUpdateForm" id="myResumeUpdateForm" class="form-horizontal" role="form">
                                    <input type="hidden" id="resume_seq" name="resume_seq" value="<?php echo $RESUME_INFO->RESUME_SEQ ?>"/>


                                    <div class="ResumeWrap">
                                        <div class="resume_img_frame">
                                            <?php if($RESUME_INFO->RESUME_USER_PHOTO != ""):?>
                                                <img id="userPhoto" src="<?php echo $RESUME_INFO->RESUME_USER_PHOTO?>">
                                            <?php else:?>
                                                <img id="userPhoto" src="/upload/user_default.jpg">
                                            <?php endif?>
                                            
                                        </div>
                                        <div class="resumefile">
                                            <span class="filetitle">사진</span>
                                            <input type="text" readonly="readonly" class="filename" />
                                            <label for="resume_img" class="filelabel">파일 업로드</label>
                                            <input type="file" name="resume_img" id="resume_img" class="fileupload" />
                                        </div>

                                        <!--
                                        <div class="input-group col-sm-12">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                <i class="fa fa-upload"></i><input type="file" id="resume_img" name="resume_img">
                                                </span>
                                            </span>
                                        </div>
                                        -->
                                    </div>

                                    <div class="ResumeCont">
                                        <table class="ResumeTable dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-3">Title</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_title" id="resume_title" value="<?php echo $RESUME_INFO->RESUME_TITLE ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Name (영문)</th>
                                                    <td class="col-sm-9 vtb">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_name" id="resume_user_name" value="<?php echo $RESUME_INFO->RESUME_USER_NAME ?>">
                                                        <div class="resumetext01"> * 영문 이름은 반드시 여권 이름과 동일하게 작성 되어야 합니다. </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Address</th>
                                                    <td class="col-sm-9">
                                                        <div>
                                                            <div class="wid100p">
                                                                <div class="resume_zip_form mb10">
                                                                    <input type="text" name="resume_user_zipcode" id="resume_user_zipcode" class="resumeform" value="<?php echo $RESUME_INFO->RESUME_USER_ZIPCODE ?>" readonly>
                                                                </div>
                                                                <div class="resume_zip_btn">
                                                                    <input type="button" class="btn btn-default" value="우편번호" id="searchZip">
                                                                </div>
                                                            </div>
                                                            <div class="mb10">
                                                                <input type="text" name="resume_user_addr1" id="resume_user_addr1" class="resumeform" value="<?php echo $RESUME_INFO->RESUME_USER_ADDR1 ?>" readonly>
                                                            </div>
                                                            <div class="mb10">
                                                                <input type="text" name="resume_user_addr2" id="resume_user_addr2" class="resumeform" value="<?php echo $RESUME_INFO->RESUME_USER_ADDR2 ?>">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Phone No.</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_phone" id="resume_user_phone" value="<?php echo $RESUME_INFO->RESUME_USER_PHONE ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">E-mail</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_email" id="resume_user_email" value="<?php echo $RESUME_INFO->RESUME_USER_EMAIL ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">SkypeID</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_skype_id" id="resume_user_skype_id" value="<?php echo $RESUME_INFO->RESUME_USER_SKYPE_ID ?>">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="resumetitle">
                                            <h2>Personal Particulars</h2>
                                        </div>

                                        <table class="ResumeTable dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-3">Age</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_age" id="resume_user_age" value="<?php echo $RESUME_INFO->RESUME_USER_AGE ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Date of Birth</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" id="resume_user_dob" name="resume_user_dob" class="resumeform" value="<?php echo $RESUME_INFO->RESUME_USER_DOB ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Nationality</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_nationality" id="resume_user_nationality" value="<?php echo $RESUME_INFO->RESUME_USER_NATIONALITY ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Martial Status</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_martial_status" id="resume_user_martial_status" value="<?php echo $RESUME_INFO->RESUME_USER_MARTIAL_STATUS ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">I/C Number<br>(여권번호)</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_ic_number" id="resume_user_ic_number" value="<?php echo $RESUME_INFO->RESUME_USER_IC_NUMBER ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Permanent<br>Residence</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_permanent_residence" id="resume_user_permanent_residence" value="<?php echo $RESUME_INFO->RESUME_USER_PERMANENT_RESIDENCE ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Religion</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_religion" id="resume_user_religion" value="<?php echo $RESUME_INFO->RESUME_USER_RELIGION ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Graduation Date<br>(yyyy/mm/dd)</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" id="resume_user_dog" name="resume_user_dog" class="resumeform" value="<?php echo $RESUME_INFO->RESUME_USER_DOG ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Height</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid50p" name="resume_user_height" id="resume_user_height" value="<?php echo $RESUME_INFO->RESUME_USER_HEIGHT ?>">
                                                        <span class="">cm</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Weight</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid50p" name="resume_user_weight" id="resume_user_weight" value="<?php echo $RESUME_INFO->RESUME_USER_WEIGHT ?>">
                                                        <span class="">Kg</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Hobbies</th>
                                                    <td class="col-sm-9">
                                                        <input type="text" class="resumeform wid100p" name="resume_user_hobby" id="resume_user_hobby" value="<?php echo $RESUME_INFO->RESUME_USER_HOBBY ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">Criminal Record</th>
                                                    <td class="col-sm-9">
                                                        <select name="resume_user_criminal_record" class="chosen-select chosen-transparent resumeform">
                                                            <option value="N" <?php if($RESUME_INFO->RESUME_USER_CRIMINAL_RECORD == 'N') echo 'selected' ?> >No</option>
                                                            <option value="Y" <?php if($RESUME_INFO->RESUME_USER_CRIMINAL_RECORD == 'Y') echo 'selected' ?> >Yes</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="resumetitle">
                                            <h2>Education</h2>
                                        </div>

                                        <div class="resumeAcbox resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_EDU)) : ?>
                                                    <?php foreach($RESUME_EDU as $EDU): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="redu_seq[]" value="<?php echo $EDU->SEQ ?>">
                                                            <div class="wid25p resume_activity_box ">
                                                                <input type="text" class="resumeform" name="redu_date[]" value="<?php echo $EDU->REDU_DATE ?>" placeholder="날짜">
                                                            </div>
                                                            <div class="wid70p resume_activity_box ">
                                                                <input type="text" class="resumeform" name="redu_description[]" value="<?php echo $EDU->REDU_DESCRIPTION ?>" placeholder="내용">
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_edu" data-which="redu">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_edu" data-which="redu_date" data-ph="날짜">
                                            </div>
                                        </div>



                                        <div class="resumetitle">
                                            <h2>Working Experience</h2>
                                        </div>

                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_WEXP)) : ?>
                                                    <?php foreach($RESUME_WEXP as $WEXP): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rwexp_seq[]" value="<?php echo $WEXP->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <input type="text" class="resumeform" name="rwexp_date[]" value="<?php echo $WEXP->RWEXP_DATE?>" placeholder="날짜">
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <input type="text" class="resumeform" name="rwexp_description[]" value="<?php echo $WEXP->RWEXP_DESCRIPTION?>" placeholder="내용">
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_wexp" data-which="rwexp">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_wexp" data-which="rwexp_date" data-ph="날짜">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Activities</h2>
                                        </div>


                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_ACT)) : ?>
                                                    <?php foreach($RESUME_ACT as $ACT): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="ract_seq[]" value="<?php echo $ACT->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <input type="text" class="resumeform" name="ract_date[]" value="<?php echo $ACT->RACT_DATE?>" placeholder="날짜">
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <input type="text" class="resumeform" name="ract_description[]" value="<?php echo $ACT->RACT_DESCRIPTION?>" placeholder="내용">
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_ract" data-which="ract">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_ract" data-which="ract_date" data-ph="날짜">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Achievements</h2>
                                        </div>


                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_ACHV)) : ?>
                                                    <?php foreach($RESUME_ACHV as $ACHV): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rahcv_seq[]" value="<?php echo $ACHV->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <input type="text" class="resumeform" name="rahcv_title[]" value="<?php echo $ACHV->RACHV_TITLE?>" placeholder="타이틀">
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <input type="text" class="resumeform" name="rahcv_description[]" value="<?php echo $ACHV->RACHV_DESCRIPTION?>" placeholder="내용">
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rahcv" data-which="rahcv">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rahcv" data-which="rahcv_title" data-ph="타이틀">
                                            </div>
                                        </div>



                                        <div class="resumetitle">
                                            <h2>Professional Skills</h2>
                                        </div>

                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_SKIL)) : ?>
                                                    <?php foreach($RESUME_SKIL as $SKIL): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rskil_seq[]" value="<?php echo $SKIL->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <input type="text" class="resumeform" name="rskil_date[]" value="<?php echo $SKIL->RSKL_DATE?>" placeholder="날짜">
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <input type="text" class="resumeform" name="rskil_description[]" value="<?php echo $SKIL->RSKL_DESCRIPTION?>" placeholder="내용">
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rskil" data-which="rskil">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rskil" data-which="rskil_date" data-ph="날짜">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Language Skills</h2>
                                        </div>

                                        <div class="resumeJoinBox resumeJoinBoxWider">
                                            <div class="resumeBox_label">
                                                <div class="resume_activity_box wid25p">Language</div>
                                                <div class="resume_activity_box wid25p">Speak</div>
                                                <div class="resume_activity_box wid25p">Written</div>
                                            </div>
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_LANG)) : ?>
                                                    <?php foreach($RESUME_LANG as $LANG): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rlang_seq[]" value="<?php echo $LANG->SEQ ?>">
                                                            <div class="resume_activity_box wid25p">
                                                                <input type="text" name="rlang_name[]" value="<?php echo $LANG->RLANG_NAME?>" class="wid100p">
                                                            </div>
                                                            <div class="resume_activity_box wid25p">
                                                                <select name="rlang_speaking[]" class="wid100p">
                                                                    <option value="0" <?php if($LANG->RLANG_SPEAKING == "0") echo "selected" ?>>BASIC</option>
                                                                    <option value="1" <?php if($LANG->RLANG_SPEAKING == "1") echo "selected" ?>>GOOD</option>
                                                                    <option value="2" <?php if($LANG->RLANG_SPEAKING == "2") echo "selected" ?>>EXCELLENT</option>
                                                                </select>
                                                            </div>
                                                            <div class="resume_activity_box wid25p">
                                                                <select name="rlang_writing[]" class="wid100p">
                                                                    <option value="0" <?php if($LANG->RLANG_WRITING == "0") echo "selected" ?>>BASIC</option>
                                                                    <option value="1" <?php if($LANG->RLANG_WRITING == "1") echo "selected" ?>>GOOD</option>
                                                                    <option value="2" <?php if($LANG->RLANG_WRITING == "2") echo "selected" ?>>EXCELLENT</option>
                                                                </select>
                                                            </div>
                                                        </div>   
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                            
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_lskil" data-which="lskil">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_lskil" data-which="lskil">
                                            </div>
                                        </div>

                                        <div class="resumetitle">
                                            <h2>Computer Skills</h2>
                                        </div>

                                        <div class="resumeJoinBox">
                                            <input type="text" class="resumeform wid100p" name="resume_user_computer_skill" id="resume_user_computer_skill" value="<?php echo $RESUME_INFO->RESUME_USER_COMPUTER_SKILL?>">
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div class="resumebtnwrap">
                                <input type="button" id="update_resume" name="update_resume" class="resumebtn" value="수정하기">
                            </div>



                        </div>

                    </div>

                    <?php endif ?>
                    
                </div>
            </div>

        <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
            <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" alt="닫기 버튼">
        </div>

        <?php
            include_once dirname(__DIR__)."/footer.php";
        ?>

        </div>

    </body>
</html>

<script>
    var FILE = new FormData();

    $(function(){
        $(document).on("click", "#searchZip", function(){
            sample2_execDaumPostcode();
        });

        $(document).on("click", "#btnCloseLayer", function(){
            closeDaumPostcode();
        });

        // 우편번호 찾기 화면을 넣을 element
        var element_layer = document.getElementById('layer');

        function closeDaumPostcode() {
            // iframe을 넣은 element를 안보이게 한다.
            element_layer.style.display = 'none';
        }

        function sample2_execDaumPostcode() {
            var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수

            new daum.Postcode({
                oncomplete: function(data) {
                    // 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.


                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                    if(data.userSelectedType === 'R'){
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if(data.buildingName !== '' && data.apartment === 'Y'){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if(extraAddr !== ''){
                            extraAddr = ' (' + extraAddr + ')';
                        }
                        // 조합된 참고항목을 해당 필드에 넣는다.
                        //document.getElementById("sample2_extraAddress").value = extraAddr;

                    } else {
                        //document.getElementById("sample2_extraAddress").value = '';
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('resume_user_zipcode').value = data.zonecode;
                    document.getElementById("resume_user_addr1").value = addr+extraAddr;
                    // 커서를 상세주소 필드로 이동한다.
                    document.getElementById("resume_user_addr2").focus();

                    // iframe을 넣은 element를 안보이게 한다.
                    // (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
                    element_layer.style.display = 'none';
                },
                width : '100%',
                height : '100%',
                maxSuggestItems : 5
            }).embed(element_layer);

            // iframe을 넣은 element를 보이게 한다.
            element_layer.style.display = 'block';

            // iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
            initLayerPosition();
        }

        // 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
        // resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
        // 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
        function initLayerPosition(){
            var width = 500; //우편번호서비스가 들어갈 element의 width
            var height = 400; //우편번호서비스가 들어갈 element의 height
            var borderWidth = 2; //샘플에서 사용하는 border의 두께

            // 위에서 선언한 값들을 실제 element에 넣는다.
            element_layer.style.width = width + 'px';
            element_layer.style.height = height + 'px';
            element_layer.style.border = borderWidth + 'px solid';
            // 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
            element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
            element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
        }

        $("#resume_user_dob, #resume_user_dog").datepicker({
            dateFormat : "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            closeText:'취소',
            //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
            showButtonPanel:true,
            beforeShow: function(input) {
                var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                setTimeout(function(){
                    $('#ui-datepicker-div').css({'top':i_offset.top, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                })
            }       
        });

        $("input[name='redu_date[]']").daterangepicker();
        $("input[name='rwexp_date[]']").daterangepicker();
        $("input[name='ract_date[]']").daterangepicker();
        $("input[name='rskil_date[]']").daterangepicker();
        // .daterangepicker({ 
        //     "locale": { 
        //         "format": "YYYY-MM-DD", 
        //         "separator": " ~ ",
        //         "applyLabel": "확인",
        //         "cancelLabel": "취소",
        //         "fromLabel": "From",
        //         "toLabel": "To",
        //         "customRangeLabel": "Custom",
        //         "weekLabel": "W",
        //         "daysOfWeek": ["월", "화", "수", "목", "금", "토", "일"],
        //         "monthNames": ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"], "firstDay": 1 
        //     },
                   
        //     "startDate": new Date(),
        //     "endDate": new Date(),
        //     "drops": "auto" 
        // }, function (start, end, label) { 
        //     console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); 
        // });

        $("#del_resume_edu, #del_resume_wexp, #del_resume_ract, #del_resume_rahcv, #del_resume_rskil, #del_resume_lskil").on("click", function(){
            const Flag = $(this).data("which");
            // console.log(Flag);
            const Frame = $(this).closest(".resumeJoinBox");
            const Box = $(Frame).find(".resumeBox");
            // console.log(Box);
            const Count = $(Box).find(".box_content").length;
            // console.log(Count);
            const LastOne = $(Box).find(".box_content")[Count-1];
            $(LastOne).remove();

            if(Flag =="lskil"){
                $(Frame).height($(Frame).height()-40);
            }else{
                $(Frame).height($(Frame).height()-45);
            }
            
        })

        $("#add_resume_edu, #add_resume_wexp, #add_resume_ract, #add_resume_rahcv, #add_resume_rskil, #add_resume_lskil").on("click", function(){
            const Flag = $(this).data("which").split("_");
            const Ph = $(this).data("ph");
            // console.log(Flag);

            const Frame = $(this).closest(".resumeJoinBox");
            
            // console.log(Frame);
            const Box = $(Frame).find(".resumeBox");
            // console.log(Box);
            let html = "";
            if(Flag[0] == "lskil"){
                html = `<div class="box_content">
                            <div class="resume_activity_box wid25p">
                                <input type="text" name="rlang_name[]" value="" class="wid100p">
                            </div>
                            <div class="resume_activity_box wid25p">
                                <select name="rlang_speaking[]" class="wid100p">
                                    <option value="0" selected>BASIC</option>
                                    <option value="1" >GOOD</option>
                                    <option value="2" >EXCELLENT</option>
                                </select>
                            </div>
                            <div class="resume_activity_box wid25p">
                                <select name="rlang_writing[]" class="wid100p">
                                    <option value="0" selected>BASIC</option>
                                    <option value="1" >GOOD</option>
                                    <option value="2" >EXCELLENT</option>
                                </select>
                            </div>
                        </div>`;
                $(Frame).height($(Frame).height()+40);
            }else{
                html = `<div class="box_content">
                                <div class="wid25p resume_activity_box">
                                    <input type="text" class="resumeform" placeholder="${Ph}" name="${Flag[0]}_${Flag[1]}[]" value="">
                                </div>
                                <div class="wid70p resume_activity_box">
                                    <input type="text" class="resumeform" placeholder="내용" name="${Flag[0]}_description[]" value="">
                                </div>
                            </div>`;
                $(Frame).height($(Frame).height()+45);
            }
            $(Box).append(html);

            if(Flag[0] != "lskil" && Flag[0] != "rahcv"){
                $(`input[name='${Flag[0]}_${Flag[1]}[]']`).daterangepicker();
            }
        });

        $("input[name='resume_img']").change(function(){
            FILE = new FormData();
            var file = this.files[0];
            FILE.append(this.id, file);

            for (var key of FILE.keys()) {
                console.log(key);
            }

            // FormData의 value 확인
            for (var value of FILE.values()) {
                console.log(value);
            }

            var reader = new FileReader();
            reader.onload = function(e) {
                $("#userPhoto").attr("src", e.target.result);
            }

            reader.readAsDataURL(file);
            $(".filename").val(file.name);
        });

        $("#update_resume").on("click", function(){
            var fd = new FormData();
            var is_blank = false;

            var resume_seq = $("input[name=resume_seq]").val();
            fd.append("resume_seq", resume_seq);
            var form_data = $('#myResumeUpdateForm').serializeArray(); // serialize 사용
            
            var redu_seq = [];
            $.each($("input[name='redu_seq[]']"), function(key, element){
                redu_seq.push($(element).val());
            });
            var redu_date = [];
            $.each($("input[name='redu_date[]']"), function(key, element){
                redu_date.push($(element).val());
            });
            var redu_description = [];
            $.each($("input[name='redu_description[]']"), function(key, element){
                redu_description.push($(element).val());
            });

            var rwexp_seq = [];
            $.each($("input[name='rwexp_seq[]']"), function(key, element){
                rwexp_seq.push($(element).val());
            });
            var rwexp_date = [];
            $.each($("input[name='rwexp_date[]']"), function(key, element){
                rwexp_date.push($(element).val());
            });
            var rwexp_description = [];
            $.each($("input[name='rwexp_description[]']"), function(key, element){
                rwexp_description.push($(element).val());
            });

            var ract_seq = [];
            $.each($("input[name='ract_seq[]']"), function(key, element){
                ract_seq.push($(element).val());
            });
            var ract_date = [];
            $.each($("input[name='ract_date[]']"), function(key, element){
                ract_date.push($(element).val());
            });
            var ract_description = [];
            $.each($("input[name='ract_description[]']"), function(key, element){
                ract_description.push($(element).val());
            });

            var rahcv_seq = [];
            $.each($("input[name='rahcv_seq[]']"), function(key, element){
                rahcv_seq.push($(element).val());
            });
            var rahcv_title = [];
            $.each($("input[name='rahcv_title[]']"), function(key, element){
                rahcv_title.push($(element).val());
            });
            var rahcv_description = [];
            $.each($("input[name='rahcv_description[]']"), function(key, element){
                rahcv_description.push($(element).val());
            });

            var rskil_seq = [];
            $.each($("input[name='rskil_seq[]']"), function(key, element){
                rskil_seq.push($(element).val());
            });
            var rskil_date = [];
            $.each($("input[name='rskil_date[]']"), function(key, element){
                rskil_date.push($(element).val());
            });
            var rskil_description = [];
            $.each($("input[name='rskil_description[]']"), function(key, element){
                rskil_description.push($(element).val());
            });

            var rlang_seq = [];
            $.each($("input[name='rlang_seq[]']"), function(key, element){
                rlang_seq.push($(element).val());
            });
            var rlang_name = [];
            $.each($("input[name='rlang_name[]']"), function(key, element){
                rlang_name.push($(element).val());
            });
            var rlang_speaking = [];
            $.each($("select[name='rlang_speaking[]']"), function(key, element){
                rlang_speaking.push($(element).val());
            });
            var rlang_writing = [];
            $.each($("select[name='rlang_writing[]']"), function(key, element){
                rlang_writing.push($(element).val());
            });

            $.each(form_data, function (key, input) {
                // console.log(input);
                if(input.name != "resume_img"){
                    // alert("값을 넣어주세요");
                    // var ip = $(`input[name=${input.name}]`);
                    // $(ip).focus();
                    // is_blank = true;
                    // return false;
                    fd.append(input.name, input.value);
                }
                
            });
            
            // if(is_blank){
            //     return false;
            // }

            fd.append("redu_seq", JSON.stringify(redu_seq));
            fd.append("redu_date", JSON.stringify(redu_date));
            fd.append("redu_description", JSON.stringify(redu_description));
            fd.append("rwexp_seq", JSON.stringify(rwexp_seq));
            fd.append("rwexp_date", JSON.stringify(rwexp_date));
            fd.append("rwexp_description", JSON.stringify(rwexp_description));
            fd.append("ract_seq", JSON.stringify(ract_seq));
            fd.append("ract_date", JSON.stringify(ract_date));
            fd.append("ract_description", JSON.stringify(ract_description));
            fd.append("rahcv_seq", JSON.stringify(rahcv_seq));
            fd.append("rahcv_title", JSON.stringify(rahcv_title));
            fd.append("rahcv_description", JSON.stringify(rahcv_description));
            fd.append("rskil_seq", JSON.stringify(rskil_seq));
            fd.append("rskil_date", JSON.stringify(rskil_date));
            fd.append("rskil_description", JSON.stringify(rskil_description));
            fd.append("rlang_seq", JSON.stringify(rlang_seq));
            fd.append("rlang_name", JSON.stringify(rlang_name));
            fd.append("rlang_speaking", JSON.stringify(rlang_speaking));
            fd.append("rlang_writing", JSON.stringify(rlang_writing));
            

            for (var key of FILE.keys()) {
                fd.append(key, FILE.get(key));
            }
            // for (var key of fd.keys()) {
            //     console.log(key);
            // }

            // // FormData의 value 확인
            // for (var value of fd.values()) {
            //     console.log(value);
            // }

            $.ajax({
                url: "/mypage/memberResumeUpdateProc",
                type: "POST",
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(resultMsg){
                    console.log(resultMsg.code);
                    if(resultMsg.code == 200){
                        alert(resultMsg.msg);
                        document.location.href="/mypage/memberResumeRegist";
                    }else{
                        alert(resultMsg.msg);
                        console.log(resultMsg.msg);
                    }
                },
                error: function (request, status, error){  
                    console.log(request);
                    console.log(request["responseText"]);    
                    console.log(status);
                    console.log(error);
                }
            });
        })

        $("#create_resume").on("click", function(){
            var fd = new FormData();
            var is_blank = false;

            var user_seq = $("input[name=user_seq]").val();
            fd.append("user_seq", user_seq);
            var form_data = $('#myResumeCreateForm').serializeArray(); // serialize 사용
            
            var redu_date = [];
            $.each($("input[name='redu_date[]']"), function(key, element){
                redu_date.push($(element).val());
            });
            var redu_description = [];
            $.each($("input[name='redu_description[]']"), function(key, element){
                redu_description.push($(element).val());
            });
            var rwexp_date = [];
            $.each($("input[name='rwexp_date[]']"), function(key, element){
                rwexp_date.push($(element).val());
            });
            var rwexp_description = [];
            $.each($("input[name='rwexp_description[]']"), function(key, element){
                rwexp_description.push($(element).val());
            });
            var ract_date = [];
            $.each($("input[name='ract_date[]']"), function(key, element){
                ract_date.push($(element).val());
            });
            var ract_description = [];
            $.each($("input[name='ract_description[]']"), function(key, element){
                ract_description.push($(element).val());
            });
            var rahcv_title = [];
            $.each($("input[name='rahcv_title[]']"), function(key, element){
                rahcv_title.push($(element).val());
            });
            var rahcv_description = [];
            $.each($("input[name='rahcv_description[]']"), function(key, element){
                rahcv_description.push($(element).val());
            });
            var rskil_date = [];
            $.each($("input[name='rskil_date[]']"), function(key, element){
                rskil_date.push($(element).val());
            });
            var rskil_description = [];
            $.each($("input[name='rskil_description[]']"), function(key, element){
                rskil_description.push($(element).val());
            });
            var rlang_name = [];
            $.each($("input[name='rlang_name[]']"), function(key, element){
                rlang_name.push($(element).val());
            });
            var rlang_speaking = [];
            $.each($("select[name='rlang_speaking[]']"), function(key, element){
                rlang_speaking.push($(element).val());
            });
            var rlang_writing = [];
            $.each($("select[name='rlang_writing[]']"), function(key, element){
                rlang_writing.push($(element).val());
            });

            $.each(form_data, function (key, input) {
                // console.log(input);
                if(input.name != "resume_img"){
                    // alert("값을 넣어주세요");
                    // var ip = $(`input[name=${input.name}]`);
                    // $(ip).focus();
                    // is_blank = true;
                    // return false;
                    fd.append(input.name, input.value);
                }
                
            });
            
            if(is_blank){
                return false;
            }

            fd.append("redu_date", JSON.stringify(redu_date));
            fd.append("redu_description", JSON.stringify(redu_description));
            fd.append("rwexp_date", JSON.stringify(rwexp_date));
            fd.append("rwexp_description", JSON.stringify(rwexp_description));
            fd.append("ract_date", JSON.stringify(ract_date));
            fd.append("ract_description", JSON.stringify(ract_description));
            fd.append("rahcv_title", JSON.stringify(rahcv_title));
            fd.append("rahcv_description", JSON.stringify(rahcv_description));
            fd.append("rskil_date", JSON.stringify(rskil_date));
            fd.append("rskil_description", JSON.stringify(rskil_description));
            fd.append("rlang_name", JSON.stringify(rlang_name));
            fd.append("rlang_speaking", JSON.stringify(rlang_speaking));
            fd.append("rlang_writing", JSON.stringify(rlang_writing));
            

            for (var key of FILE.keys()) {
                fd.append(key, FILE.get(key));
            }
            // for (var key of fd.keys()) {
            //     console.log(key);
            // }

            // // FormData의 value 확인
            // for (var value of fd.values()) {
            //     console.log(value);
            // }

            $.ajax({
                url: "/mypage/memberResumeRegistProc",
                type: "POST",
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(resultMsg){
                    console.log(resultMsg.code);
                    if(resultMsg.code == 200){
                        alert(resultMsg.msg);
                        document.location.href="/mypage/memberResumeRegist";
                    }else{
                        alert(resultMsg.msg);
                        console.log(resultMsg.msg);
                    }
                },
                error: function (request, status, error){  
                    console.log(request);
                    console.log(request["responseText"]);    
                    console.log(status);
                    console.log(error);
                }
            });
        })

        

    });
</script>






