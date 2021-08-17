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
                        <div class="sub_category03">
                            <ul>
                                <li><a href="/mypage/memberEdit">정보관리</a></li>
                                <li class="on"><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                                <li ><a href="/mypage/submissionDoc">제출서류 관리</a></li>
                            </ul>
                        </div>
                        <?php if(isset($RESUME_INFO)) :?>
                            <div class="inner">
                                <div class="subContWrap">
                                    <div class="ContTopresumeBtn">
                                        <button class="resumadminbtn01" onclick="location.href='/mypage/memberResumeRegist' ">이력서 작성</button>
                                    </div>                                    
                                    <div class="resumetoptext">
                                        <p>- 붉은 칸에 자세히 기재하되, 적합한 영어단어가 없으면 한글로 기재바랍니다.</p>
                                        <p>- 완성 후 본인 영문이름으로 파일을 만들고 보내주시기 바랍니다.</p>
                                        <p>- 취미와 운동, 아르바이트 경험, 장학금 등은 많이 기재하시는 것이 좋습니다.</p>
                                        <p>- 군복무 이력은 Working Experience에 기재하시기 바랍니다.</p>
                                    </div>                                    
                                    <div class="subTit">
                                        <h2><?php echo "이력서 첨삭보기" ?></h2>
                                    </div>
                                    <div class="ResumeWrap">
                                        <div class="resume_img_frame mb40">
                                            <img src="<?php echo $RESUME_INFO->RESUME_USER_PHOTO?>">
                                        </div>


                                        <table class="resumemanagertable dataTable">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="75%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_TITLE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Name (영문)</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_NAME ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td>
                                                        <?php echo "(.".$RESUME_INFO->RESUME_USER_ZIPCODE.") " ?> <?php echo $RESUME_INFO->RESUME_USER_ADDR1." " ?><?php echo $RESUME_INFO->RESUME_USER_ADDR2 ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phone No.</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_PHONE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>E-mail</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_EMAIL ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>SkypeID</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_SKYPE_ID ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="25%">
                                                <col width="25%">
                                                <col width="25%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="4" class="managertabletitle">Personal Particulars</th>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_AGE ?>
                                                    </td>
                                                    <th>Date of Birth</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_DOB ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Nationality</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_NATIONALITY ?>
                                                    </td>
                                                    <th>Martial Status</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_MARTIAL_STATUS ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>I/C Number (여권번호)</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_IC_NUMBER ?>
                                                    </td>
                                                    <th>Permanent Residence</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_PERMANENT_RESIDENCE ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_RELIGION ?>
                                                    </td>
                                                    <th>Graduation Date (yyyy/mm/dd)</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_DOG ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Height</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_HEIGHT ?> Cm
                                                    </td>
                                                    <th>Weight</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_WEIGHT ?> Kg
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Hobbies</th>
                                                    <td>
                                                        <?php echo $RESUME_INFO->RESUME_USER_HOBBY ?>
                                                    </td>
                                                    <th>Criminal Record</th>
                                                    <td>
                                                        <?php  echo $RESUME_INFO->RESUME_USER_CRIMINAL_RECORD ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>



                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="75%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" class="managertabletitle">Education</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="75%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" class="managertabletitle">Working Experience</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="75%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" class="managertabletitle">Activities</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="75%">
                                                <col width="25%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="2" class="managertabletitle">Achievements</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <td>
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="33.333%">
                                                <col width="33.333%">
                                                <col width="33.333%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="3" class="managertabletitle">Professional Skills</th>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="33.333%">
                                                <col width="33.333%">
                                                <col width="33.333%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="3" class="managertabletitle">Languange Skills</th>
                                                </tr>
                                                <tr>
                                                    <th><span class="languangeText">Laguage</span></th>
                                                    <th><span class="languangeText">Spoken</span></th>
                                                    <th><span class="languangeText">Written</span></th>
                                                </tr>
                                                <tr>
                                                    <td class="managercolor01">English</td>
                                                    <td class="managercolor02">Basic</td>
                                                    <td class="managercolor02">Basic</td>
                                                </tr>
                                            </tbody>
                                        </table>



                                        <table class="resumemanagertable dataTable mt50">
                                            <colgroup>
                                                <col width="100%">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <th colspan="3" class="managertabletitle"> Computer Skills</th>
                                                </tr>
                                                <tr>
                                                    <td> <?php echo $RESUME_INFO->RESUME_USER_COMPUTER_SKILL?></td>
                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>

                                    <div class="resumebtnwrap">
                                        <input type="button" id="" name="" class="resumebtn01 mw10" value="취소하기">
                                        <input type="button" id="" name="" class="resumebtn mw10" value="저장하기">
                                    </div>

<!--
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
                                                                -->


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






