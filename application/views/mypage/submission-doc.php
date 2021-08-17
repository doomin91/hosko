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
                                        <img src="../static/front/img/missiondoc_img01.jpg">
                                    </div>

                                    <div class="MissionDocimg mt100">
                                        <img src="../static/front/img/missiondoc_img02.jpg">
                                    </div>

                                </div>

                                <div class="MissionDocCont pb100 pt100">
                                    <div class="MissionDocTitle">
                                        <h2>회원 진행단계</h2>
                                    </div>

                                    <div class="MissionDocimg mt100">
                                        <img src="../static/front/img/missiondoc_img03.jpg">
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
                                                    <td class="doctableline">essay.doc <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont01">확인전</span></td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 영문커버레터(Cover Letter)</td>
                                                    <td>etter.doc</td>
                                                    <td class="doctableline">myletter.doc <span class="doctablebtn02">파일찾기</span></td>
                                                    <td><span class="doctablefont02">OK</span></td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td>- 비상연락처(Emergency Contact)</td>
                                                    <td>contact.doc</td>
                                                    <td class="doctableline">mycontact.doc <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont03">반송</span></td>
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
                                                    <td class="doctableline">essay.doc <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont01">확인전</span></td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 학생증 사본(Student Card)</td>
                                                    <td>etter.doc</td>
                                                    <td class="doctableline">myletter.doc <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont02">OK</span></td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td style="">-비자용 사진(Photo for J1 visa)<span class="doctablefont04">*5cm x 5cm</span></td>
                                                    <td>contact.doc</td>
                                                    <td class="doctableline">mycontact.doc <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont03">반송</span></td>
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
                                                    <td class="doctableline">mydiploma.jpg <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont01">확인전</span></td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 영문 성적증명서(Transcript)</td>
                                                    <td>transcript.jpg</td>
                                                    <td class="doctableline">mytranscript.jpg <span class="doctablebtn02">파일찾기</span></td>
                                                    <td><span class="doctablefont02">OK</span></td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td>- 영문 추천서1(Recommendation)</td>
                                                    <td>recommendation.jpg</td>
                                                    <td class="doctableline">myrecommen.jpg <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont03">반송</span></td>
                                                </tr>
                                                <tr class="">
                                                    <td>- 영문 추천서2(Recommendation)</td>
                                                    <td>recommendation.jpg</td>
                                                    <td class="doctableline">myrecommen.jpg <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont03">반송</span></td>
                                                </tr>
                                                <tr class="bg01">
                                                    <td>- 영문 건강진단서<br/>(Medical Statement)</td>
                                                    <td>statement.jpg</td>
                                                    <td class="doctableline">mystatement.jpg <span class="doctablebtn01">파일찾기</span></td>
                                                    <td><span class="doctablefont02">OK</span></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="MissionDocCont mt100 pb100 n_br">
                                    <div class="MissionDocTitle">
                                        <h3>수료증</h3>
                                    </div>
                                    
                                    <div class="MissionDocTextbox">
                                        <p>수료증 발급이 필요하시면 호스코로 문의주세요.</p>
                                    </div>

                                    <div class="MissionDocbox">
                                        <div class="Docboxname">김영준님 수료증</div>
                                        <div class="Docboxbtn">Certificate.pdf</div>
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