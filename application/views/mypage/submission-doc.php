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
                    <div class="sub_visual v01">
                        <div class="sub_visual_text">
                            <h1>서류제출</h1>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category03">
                            <ul>
                                <li><a href="/mypage/memberEdit">정보관리</a></li>
                                <li><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                                <li class="on"><a href="/mypage/memberResumeManage">제출서류 관리</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="MissionDocCont mt200 pb100">
                                    <div class="MissionDocTitle">
                                        <h2>출국 진행 프로세스</h2>
                                    </div>

                                    <div class="MissionDocimg mt100">
                                        <img src="../../static/front/img/missiondoc_img01.jpg">
                                    </div>

                                    <div class="MissionDocimg mt100">
                                        <img src="../../static/front/img/missiondoc_img02.jpg">
                                    </div>

                                </div>

                                <div class="MissionDocCont pb100 pt100">
                                    <div class="MissionDocTitle">
                                        <h2>회원 진행단계</h2>
                                    </div>

                                    <div class="MissionDocimg mt100">
                                        <img src="../../static/front/img/missiondoc_img03.jpg" style="width:100%;">
                                    </div>
                                    <div class="membermission_cont">
                                        <ul class="membermission_title">
                                            <li><em class="title_num"><img src="../static/front/img/membermission_m01.jpg" style="width:100%;"></em><span class="<?php if(array_search($USER->USER_LEVEL, [1, 2, 3, 4]) !== false) echo "on"?>">일반</span></li>
                                            <li><em class="title_num"><img src="../static/front/img/membermission_m02.jpg" style="width:100%;"></em><span class="<?php if($USER->USER_LEVEL== 5) echo "on"?>">상담진행</span></li>
                                            <li><em class="title_num"><img src="../static/front/img/membermission_m03.jpg" style="width:100%;"></em><span class="<?php if($USER->USER_LEVEL== 6) echo "on"?>">참가 계약확정</span></li>
                                            <li><em class="title_num"><img src="../static/front/img/membermission_m04.jpg" style="width:100%;"></em><span class="<?php if($USER->USER_LEVEL== 8) echo "on"?>">멘토링 서비스</span></li>
                                            <li><em class="title_num"><img src="../static/front/img/membermission_m05.jpg" style="width:100%;"></em><span class="<?php if($USER->USER_LEVEL== 8) echo "on"?>">비자수속</span></li>
                                            <li><em class="title_num"><img src="../static/front/img/membermission_m06.jpg" style="width:100%;"></em><span class="<?php if($USER->USER_LEVEL== 9) echo "on"?>">출국</span></li>
                                        </ul>
                                        <div class="memebermission_step">
                                            *** 회원님은 현재 
                                            <span>
                                                <?php if(array_search($USER->USER_LEVEL, [1, 2, 3, 4]) !== false) echo "일반"?>
                                                <?php if($USER->USER_LEVEL== 5) echo "상담진행"?>
                                                <?php if($USER->USER_LEVEL== 6) echo "참가 계약확정"?>
                                                <?php if($USER->USER_LEVEL== 7) echo "멘토링 서비스"?>
                                                <?php if($USER->USER_LEVEL== 8) echo "비자수속"?>
                                                <?php if($USER->USER_LEVEL== 9) echo "출국"?>
                                                
                                            </span> 
                                            단계입니다.
                                        </div>
                                    </div>
                                </div>

                                <div class="MissionDocCont pb100 pt100">
                                    <div class="MissionDocTitle">
                                        <h2>서류 제출 및 확인</h2>
                                    </div>

                                    <div class="MissionTableWrap">
                                        <h3>1) 양식작성 후 업로드</h3>
                                        <table class="missiontable">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="20%">
                                                <col width="35%">
                                                <col width="20%">
                                            </colgroup>
                                            <thead>
                                                <th>서류</th>
                                                <th>서류양식</th>
                                                <th>제출</th>
                                                <th>확인결과</th>
                                            </thead>
                                            <tbody>
                                                <tr class="bg01">
                                                    <td>- 영문에세이(Essay Question)</td>
                                                    <td>essay.doc</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docEq" class="docEqLabel"><?php ($DOCUMENT->DOC_EQ_FILE_NAME == "") ? print("없음") : print($DOCUMENT->DOC_EQ_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docEq" class="docEqLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docEq" id="docEq" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_EQ_FLAG == -1 || $DOCUMENT->DOC_EQ_FLAG == 0 || $DOCUMENT->DOC_EQ_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docEqBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docEqBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_EQ_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_EQ_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_EQ_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_EQ_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 영문커버레터(Cover Letter)</td>
                                                    <td>etter.doc</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docCl" class="docClLabel"><?php $DOCUMENT->DOC_CL_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_CL_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docCl" class="docClLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docCl" id="docCl" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_CL_FLAG == -1 || $DOCUMENT->DOC_CL_FLAG == 0 || $DOCUMENT->DOC_CL_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docClBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docClBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_CL_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_CL_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_CL_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_CL_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td>- 비상연락처(Emergency Contact)</td>
                                                    <td>contact.doc</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docEc" class="docEcLabel"><?php $DOCUMENT->DOC_EC_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_EC_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docEc" class="docEcLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docEc" id="docEc" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_EC_FLAG == -1 || $DOCUMENT->DOC_EC_FLAG == 0 || $DOCUMENT->DOC_EC_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docEcBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docEcBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_EC_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_EC_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_EC_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_EC_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="MissionTableWrap">
                                        <h3>2) 서류 스캔 후 업로드</h3>
                                        <table class="missiontable">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="20%">
                                                <col width="35%">
                                                <col width="20%">
                                            </colgroup>
                                            <thead>
                                                <th>서류</th>
                                                <th>예시</th>
                                                <th>제출</th>
                                                <th>확인결과</th>
                                            </thead>
                                            <tbody>
                                                <tr class="bg01">
                                                    <td>- 여권전면상하사본(Passport)</td>
                                                    <td>essay.doc</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docPassport" class="docPassportLabel">
                                                                <?php $DOCUMENT->DOC_PASSPORT_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_PASSPORT_FILE_NAME) ?>
                                                            </label>
                                                        <?php else :?>
                                                            <label for="docPassport" class="docPassportLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docPassport" id="docPassport" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_PASSPORT_FLAG == -1 || $DOCUMENT->DOC_PASSPORT_FLAG == 0 || $DOCUMENT->DOC_PASSPORT_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docPassportBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docPassportBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_PASSPORT_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_PASSPORT_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_PASSPORT_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_PASSPORT_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 학생증 사본(Student Card)</td>
                                                    <td>etter.doc</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docSc" class="docScLabel"><?php $DOCUMENT->DOC_SC_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_SC_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docSc" class="docScLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docSc" id="docSc" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_SC_FLAG == -1 || $DOCUMENT->DOC_SC_FLAG == 0 || $DOCUMENT->DOC_SC_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docScBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docScBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_SC_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_SC_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_SC_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_SC_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td style="">-비자용 사진(Photo for J1 visa)<span class="doctablefont04">*5cm x 5cm</span></td>
                                                    <td>contact.doc</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docPhoto" class="docPhotoLabel"><?php $DOCUMENT->DOC_PHOTO_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_PHOTO_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docPhoto" class="docPhotoLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docPhoto" id="docPhoto" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_PHOTO_FLAG == -1 || $DOCUMENT->DOC_PHOTO_FLAG == 0 || $DOCUMENT->DOC_PHOTO_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docPhotoBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docPhotoBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_PHOTO_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_PHOTO_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_PHOTO_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_PHOTO_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="MissionTableWrap">
                                        <h3>3) 스캔본 업로드 후 우편발송</h3>
                                        <table class="missiontable">
                                            <colgroup>
                                                <col width="25%">
                                                <col width="20%">
                                                <col width="35%">
                                                <col width="20%">
                                            </colgroup>
                                            <thead>
                                                <th>서류</th>
                                                <th>예시</th>
                                                <th>제출</th>
                                                <th>확인결과</th>
                                            </thead>
                                            <tbody>
                                                <tr class="bg01">
                                                    <td>- 영문 재학/졸업 증명서<br/>(Registration or Diploma)</td>
                                                    <td>diploma.jpg</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docRod" class="docRodLabel"><?php $DOCUMENT->DOC_ROD_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_ROD_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docRod" class="docRodLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docRod" id="docRod" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_ROD_FLAG == -1 || $DOCUMENT->DOC_ROD_FLAG == 0 || $DOCUMENT->DOC_ROD_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docRodBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docRodBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_ROD_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_ROD_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_ROD_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_ROD_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 영문 성적증명서(Transcript)</td>
                                                    <td>transcript.jpg</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docTranscript" class="docTranscriptLabel"><?php $DOCUMENT->DOC_TRANSCRIPT_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_TRANSCRIPT_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docTranscript" class="docTranscriptLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docTranscript" id="docTranscript" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_TRANSCRIPT_FLAG == -1 || $DOCUMENT->DOC_TRANSCRIPT_FLAG == 0 || $DOCUMENT->DOC_TRANSCRIPT_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docTranscriptBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docTranscriptBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_TRANSCRIPT_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_TRANSCRIPT_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_TRANSCRIPT_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_TRANSCRIPT_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td>- 영문 추천서1(Recommendation)</td>
                                                    <td>recommendation.jpg</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docRec" class="docRecLabel"><?php $DOCUMENT->DOC_RECOMMENDATION_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_RECOMMENDATION_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docRec" class="docRecLabel"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docRec" id="docRec" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_RECOMMENDATION_FLAG == -1 || $DOCUMENT->DOC_RECOMMENDATION_FLAG == 0 || $DOCUMENT->DOC_RECOMMENDATION_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docRecBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docRecBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_RECOMMENDATION_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_RECOMMENDATION_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_RECOMMENDATION_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_RECOMMENDATION_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>    
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 영문 추천서2(Recommendation)</td>
                                                    <td>recommendation.jpg</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docRec2" class="docRec2Label"><?php $DOCUMENT->DOC_RECOMMENDATION2_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_RECOMMENDATION2_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docRec2" class="docRec2Label"><?php print("없음") ?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docRec2" id="docRec2" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_RECOMMENDATION2_FLAG == -1 || $DOCUMENT->DOC_RECOMMENDATION2_FLAG == 0 || $DOCUMENT->DOC_RECOMMENDATION2_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docRec2Btn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docRec2Btn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_RECOMMENDATION2_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_RECOMMENDATION2_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_RECOMMENDATION2_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_RECOMMENDATION2_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td>- 영문 건강진단서<br/>(Medical Statement)</td>
                                                    <td>statement.jpg</td>
                                                    <td class="doctableline">
                                                        <!-- <input type="text" readonly="readonly" class="filename" /> -->
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <label for="docMs" class="docMsLabel"><?php $DOCUMENT->DOC_MS_FILE_NAME == "" ? print("없음") : print($DOCUMENT->DOC_MS_FILE_NAME) ?></label>
                                                        <?php else :?>
                                                            <label for="docMs" class="docMsLabel"><?php print("없음")?></label>
                                                        <?php endif ?>
                                                        
                                                        <input type="file" name="docMs" id="docMs" class="hide" />
                                                        
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_MS_FLAG == -1 || $DOCUMENT->DOC_MS_FLAG == 0 || $DOCUMENT->DOC_MS_FLAG == 1): ?>
                                                                <span class="doctablebtn01" id="docMsBtn" style="cursor: pointer" >파일찾기</span>
                                                            <?php else: ?>
                                                                <span class="doctablebtn02" style="cursor: context-menu" >파일찾기</span>
                                                            <?php endif?>
                                                        <?php else: ?>
                                                            <span class="doctablebtn01" id="docMsBtn" style="cursor: pointer" >파일찾기</span>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if(isset($DOCUMENT)): ?>
                                                            <?php if($DOCUMENT->DOC_MS_FLAG == 0): ?>
                                                                <span class="doctablefont01">미제출</span>
                                                            <?php elseif($DOCUMENT->DOC_MS_FLAG == 1): ?>
                                                                <span class="doctablefont01">제출완료 (미확인)</span>
                                                            <?php elseif($DOCUMENT->DOC_MS_FLAG == 2): ?>
                                                                <span class="doctablefont02">OK</span>
                                                            <?php elseif($DOCUMENT->DOC_MS_FLAG == -1): ?>
                                                                <span class="doctablefont03">반송</span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="doctablefont01">미제출</span>
                                                        <?php endif ?>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="MissionDocCont mt100 pb100 n_br">

                                    

                                    <div class="MissionDocbox">
                                        
                                        <?php if(isset($CERTIFICATE)): ?>
                                            <div class="MissionDocTitle">
                                                <h3>수료증</h3>
                                            </div>
                                            
                                            <div class="Docboxname"><?php echo $USER->USER_NAME ?>님 수료증</div>
                                            <div class="Docboxbtn" id="certDown">
                                                <?php echo "<a href=\"/mypage/CertificateDown/".$CERTIFICATE->CERT_SEQ."\">".$CERTIFICATE->CERT_NAME."</a>"; ?>
                                            </div>
                                        <?php else : ?>
                                            <div class="MissionDocTitle">
                                                <h3>수료증 발급</h3>
                                            </div>
                                            
                                            <div class="MissionDocTextbox">
                                                <div class="resumefile">
                                                    <span class="filetitle">출입국 사실 증명서</span>
                                                    <input type="text" readonly="readonly" name="certificateEEName" class="filename" />
                                                    <?php if($DOCUMENT->DOC_CERTIFICATE_EE_FLAG != 2) : ?>
                                                        <label for="docCertificateEE" class="filelabel">파일 업로드</label>
                                                        <input type="file" name="docCertificateEE" id="docCertificateEE" class="fileupload" />
                                                    <?php endif?>
                                                    
                                                </div>

                                                <?php if($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == 0) :?>
                                                    <div class="DocboxbtnCheck" id="certEEUpload">
                                                        신청하기
                                                    </div>
                                                <?php else:?>
                                                    <div class="DocboxbtnCheck" id="certEEUpload" style="display: none">
                                                        신청하기
                                                    </div>

                                                    <?php if($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == -1):?>
                                                        <div class="DocboxbtnCancel" id="certEEDownload">
                                                        <?php echo "<a href=\"/mypage/DocumentDown/".$DOCUMENT->DOC_SEQ."/docCertificateEE\" style=\"color: #ffffff\">".$DOCUMENT->DOC_CERTIFICATE_EE_FILE_NAME." (반송)"."</a>"; ?>
                                                        </div>
                                                    <?php elseif($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == 1) :?>
                                                        <div class="DocboxbtnSuccess" id="certEEDownload">
                                                        <?php echo "<a href=\"/mypage/DocumentDown/".$DOCUMENT->DOC_SEQ."/docCertificateEE\" style=\"color: #ffffff\">".$DOCUMENT->DOC_CERTIFICATE_EE_FILE_NAME." (미확인)"."</a>"; ?>
                                                        </div>
                                                    <?php elseif($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == 2) :?>
                                                        <div class="DocboxbtnCheck" id="certEEDownload">
                                                        <?php echo "<a href=\"/mypage/DocumentDown/".$DOCUMENT->DOC_SEQ."/docCertificateEE\" style=\"color: #ffffff\">".$DOCUMENT->DOC_CERTIFICATE_EE_FILE_NAME." (확인 완료)"."</a>"; ?>
                                                        </div>
                                                    <?php endif?>
                                                    <!-- <div class="Docboxbtn2" id="certEEDownload">
                                                        <?php if($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == -1):?>
                                                            <?php echo "<a href=\"/mypage/DocumentDown/".$DOCUMENT->DOC_SEQ."/docCertificateEE\" style=\"color: #ffffff\">".$DOCUMENT->DOC_CERTIFICATE_EE_FILE_NAME." (반송)"."</a>"; ?>
                                                        <?php elseif($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == 1) :?>
                                                            <?php echo "<a href=\"/mypage/DocumentDown/".$DOCUMENT->DOC_SEQ."/docCertificateEE\" style=\"color: #ffffff\">".$DOCUMENT->DOC_CERTIFICATE_EE_FILE_NAME." (미확인)"."</a>"; ?>
                                                        <?php elseif($DOCUMENT->DOC_CERTIFICATE_EE_FLAG == 2) :?>
                                                            <?php echo "<a href=\"/mypage/DocumentDown/".$DOCUMENT->DOC_SEQ."/docCertificateEE\" style=\"color: #ffffff\">".$DOCUMENT->DOC_CERTIFICATE_EE_FILE_NAME." (확인 완료)"."</a>"; ?>
                                                        <?php endif?>
                                                    </div> -->
                                                <?php endif?>
                                                
                                                
                                            </div>
                                                
                                            </div>
                                        <?php endif ?>
                                        
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
    var FILE = new FormData();
    var EeFlag = false;

    $(function(){
        $("#docEqBtn, #docClBtn ,#docEcBtn ,#docPassportBtn ,#docScBtn ,#docPhotoBtn ,#docRodBtn ,#docTranscriptBtn ,#docRecBtn ,#docRec2Btn ,#docMsBtn").on("click", function(){
            if($(this).is("#docEqBtn")){
                $("#docEq").click();
            }else if($(this).is("#docClBtn")){
                $("#docCl").click();
            }else if($(this).is("#docEcBtn")){
                $("#docEc").click();
            }else if($(this).is("#docPassportBtn")){
                $("#docPassport").click();
            }else if($(this).is("#docScBtn")){
                $("#docSc").click();
            }else if($(this).is("#docPhotoBtn")){
                $("#docPhoto").click();
            }else if($(this).is("#docRodBtn")){
                $("#docRod").click();
            }else if($(this).is("#docTranscriptBtn")){
                $("#docTranscript").click();
            }else if($(this).is("#docRecBtn")){
                $("#docRec").click();
            }else if($(this).is("#docRec2Btn")){
                $("#docRec2").click();
            }else if($(this).is("#docMsBtn")){
                $("#docMs").click();
            }
            
        })


        $("#docEq, #docCl ,#docEc ,#docPassport ,#docSc ,#docPhoto ,#docRod ,#docTranscript ,#docRec ,#docRec2 ,#docMs, #docCertificateEE").change(function(){
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

            var type = "";
            var date = "";
            var flag = "";

            if($(this).is("#docEq")){
                $(".docEqLabel")[0].innerHTML = file.name;
                img = "docEq";
                type = "DOC_EQ";
            }else if($(this).is("#docCl")){
                $(".docClLabel")[0].innerHTML = file.name;
                img = "docCl";
                type = "DOC_CL";
            }else if($(this).is("#docEc")){
                $(".docEcLabel")[0].innerHTML = file.name;
                img = "docEc";
                type = "DOC_EC";
            }else if($(this).is("#docPassport")){
                $(".docPassportLabel")[0].innerHTML = file.name;
                img = "docPassport";
                type = "DOC_PASSPORT";
            }else if($(this).is("#docSc")){
                $(".docScLabel")[0].innerHTML = file.name;
                img = "docSc";
                type = "DOC_SC";
            }else if($(this).is("#docPhoto")){
                $(".docPhotoLabel")[0].innerHTML = file.name;
                img = "docPhoto";
                type = "DOC_PHOTO";
            }else if($(this).is("#docRod")){
                $(".docRodLabel")[0].innerHTML = file.name;
                img = "docRod";
                type = "DOC_ROD";
            }else if($(this).is("#docTranscript")){
                $(".docTranscriptLabel")[0].innerHTML = file.name;
                img = "docTranscript";
                type = "DOC_TRANSCRIPT";
            }else if($(this).is("#docRec")){
                $(".docRecLabel")[0].innerHTML = file.name;
                img = "docRec";
                type = "DOC_RECOMMENDATION";
            }else if($(this).is("#docRec2")){
                $(".docRec2Label")[0].innerHTML = file.name;
                img = "docRec2";
                type = "DOC_RECOMMENDATION2";
            }else if($(this).is("#docMs")){
                $(".docMsLabel")[0].innerHTML = file.name;
                img = "docMs";
                type = "DOC_MS";
            }else if($(this).is("#docCertificateEE")){
                $("input[name=certificateEEName]").val(file.name);
                type = "DOC_CERTIFICATE_EE"
                img = "docCertificateEE";
            }
            date = type + "_REG_DATE";
            flag = type + "_FLAG";
            name = type + "_FILE_NAME"

            FILE.append("type", type);
            FILE.append("date", date);
            FILE.append("flag", flag);
            FILE.append("name", name);
            FILE.append("img", img);

            if($(this).is("#docCertificateEE")){
                $("#certEEUpload").css("display", "");
                $("#certEEDownload").css("display", "none");
                EeFlag = true;
                return false;
            }

            $.ajax({
                url: "/mypage/submissionDocProc",
                type: "POST",
                data: FILE,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(resultMsg){
                    console.log(resultMsg.code);
                    if(resultMsg.code == 200){
                        alert(resultMsg.msg);
                        console.log(resultMsg.msg);
                        location.reload();
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
            
        });

        $("#certEEUpload").on("click", function(){
            console.log(FILE.get("img"));
            if(!FILE.get("img")){
                alert("파일을 선택해주세요");
                return false;
            }
            if(EeFlag){
                $.ajax({
                    url: "/mypage/submissionDocProc",
                    type: "POST",
                    data: FILE,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(resultMsg){
                        console.log(resultMsg.code);
                        if(resultMsg.code == 200){
                            alert(resultMsg.msg);
                            console.log(resultMsg.msg);
                            location.reload();
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
            }
           
            
        })

        
    });
</script>