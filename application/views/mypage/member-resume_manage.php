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
                                <li><a href="/mypage/memberEdit">정보관리</a></li>
                                <li><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                                <li class="on"><a href="/mypage/memberResumeManage">제출서류 관리</a></li>
                            </ul>
                        </div>
                        <?php if(isset($RESUME_INFO)) :?>
                            <div class="inner">
                                <div class="subContWrap">
                                    <div class="subTit">
                                        <h2><?php echo "이력서 첨삭보기" ?></h2>
                                    </div>

                                    <div class="">
                                        <div class="col-md-12 text-center resume_img_frame">
                                            <img src="<?php echo $RESUME_INFO->RESUME_USER_PHOTO?>">
                                        </div>
                                    </div>

                                    <div class="">
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">Title</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_TITLE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Name (영문)</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_NAME ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Address</th>
                                                    <td class="col-sm-10">
                                                        <?php echo "(.".$RESUME_INFO->RESUME_USER_ZIPCODE.") " ?> <?php echo $RESUME_INFO->RESUME_USER_ADDR1." " ?><?php echo $RESUME_INFO->RESUME_USER_ADDR2 ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Phone No.</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_PHONE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">E-mail</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_EMAIL ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">SkypeID</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_SKYPE_ID ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Personal Particulars</div>
                                        </div>
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">Age</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_AGE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Date of Birth</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_DOB ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Nationality</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_NATIONALITY ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Martial Status</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_MARTIAL_STATUS ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">I/C Number<br>(여권번호)</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_IC_NUMBER ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Permanent<br>Residence</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_PERMANENT_RESIDENCE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Religion</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_RELIGION ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Graduation Date<br>(yyyy/mm/dd)</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_DOG ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Height</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_HEIGHT ?> Cm
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Weight</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_WEIGHT ?> Kg
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Hobbies</th>
                                                    <td class="col-sm-10">
                                                        <?php echo $RESUME_INFO->RESUME_USER_HOBBY ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Criminal Record</th>
                                                    <td class="col-sm-10">
                                                        <?php  echo $RESUME_INFO->RESUME_USER_CRIMINAL_RECORD ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Education</div>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_EDU)) : ?>
                                                    <?php foreach($RESUME_EDU as $EDU): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="redu_seq[]" value="<?php echo $EDU->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <input type="text" class="form-control" name="redu_date[]" value="<?php echo $EDU->REDU_DATE ?>">
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <input type="text" class="form-control" name="redu_description[]" value="<?php echo $EDU->REDU_DESCRIPTION ?>">
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Working Experience</div>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_WEXP)) : ?>
                                                    <?php foreach($RESUME_WEXP as $WEXP): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rwexp_seq[]" value="<?php echo $WEXP->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <?php echo $WEXP->RWEXP_DATE?>
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <?php echo $WEXP->RWEXP_DESCRIPTION?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Activities</div>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_ACT)) : ?>
                                                    <?php foreach($RESUME_ACT as $ACT): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="ract_seq[]" value="<?php echo $ACT->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <?php echo $ACT->RACT_DATE?>
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <?php echo $ACT->RACT_DESCRIPTION?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Achievements</div>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_ACHV)) : ?>
                                                    <?php foreach($RESUME_ACHV as $ACHV): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rahcv_seq[]" value="<?php echo $ACHV->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <?php echo $ACHV->RACHV_TITLE?>
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <?php echo $ACHV->RACHV_DESCRIPTION?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Professional Skills</div>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <div class="resumeBox">
                                                <?php if(isset($RESUME_SKIL)) : ?>
                                                    <?php foreach($RESUME_SKIL as $SKIL): ?>
                                                        <div class="box_content">
                                                            <input type="hidden" name="rskil_seq[]" value="<?php echo $SKIL->SEQ ?>">
                                                            <div class="wid25p resume_activity_box">
                                                                <?php echo $SKIL->RSKL_DATE?>
                                                            </div>
                                                            <div class="wid70p resume_activity_box">
                                                                <?php echo $SKIL->RSKL_DESCRIPTION?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Languange Skills</div>
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
                                                                <input type="text" name="rlang_name[]" value="<?php echo $LANG->RLANG_NAME?>">
                                                            </div>
                                                            <div class="resume_activity_box wid25p">
                                                                <?php 
                                                                    if($LANG->RLANG_SPEAKING == "0"){
                                                                        echo "BASIC";
                                                                    }else if($LANG->RLANG_SPEAKING == "1"){
                                                                        echo "GOOD";
                                                                    } else if($LANG->RLANG_SPEAKING == "2"){
                                                                        echo "EXCELLENT";
                                                                    } 
                                                                ?>
                                                            </div>
                                                            <div class="resume_activity_box wid25p">
                                                                <?php 
                                                                    if($LANG->RLANG_WRITING == "0"){
                                                                        echo "BASIC";
                                                                    }else if($LANG->RLANG_WRITING == "1"){
                                                                        echo "GOOD";
                                                                    } else if($LANG->RLANG_WRITING == "2"){
                                                                        echo "EXCELLENT";
                                                                    } 
                                                                ?>
                                                            </div>
                                                        </div>   
                                                    <?php endforeach ?>
                                                <?php endif?>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Computer Skills</div>
                                        </div>
                                        <div class="resumeJoinBox">
                                            <?php echo $RESUME_INFO->RESUME_USER_COMPUTER_SKILL?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php else :?>
                            <div class="inner">
                                <div class="subContWrap">
                                    <div class="subTit">
                                        <h2><?php echo "관리자가 등록한 이력서가 없습니다." ?></h2>
                                    </div>
                            </div>
                        <?php endif ?>

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






