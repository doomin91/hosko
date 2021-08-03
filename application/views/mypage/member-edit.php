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
                            <h1>MYPAGE</h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                            <ul>
                                <li class="on"><a href="/mypage/memberEdit">정보관리</a></li>
                                <li><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                                <li><a href="/mypage/memberResumeManage">제출서류 관리</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="joinContent">
                                    
                                    <div class="agreeTextBox mt30">
                                        <p>HOSKO 서비스를 이용하기 위해 이용자는 이용약관을 읽어보시고 동의하셔야 합니다.</p>
                                        <p>일반회원등록은 무료이며, 등록 즉시 서비스 이용이 가능합니다.</p>
                                        <p>단, 유료화서비스와 인증절차가 필요한 경우 해당절차를 거펴야 서비스를 이용하실 수 있습니다.</p>
                                    </div>
                                <form name="form1" id="form1" enctype="multipart/form-data">

                                    <div class="memberJoinBox mt20">
                                        <h2>개인정보</h2>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">이름</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_name" value="<?php echo $info->USER_NAME; ?>">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">사진</div>
                                            <div class="joinBoxInput">
                                                <div class="fileInputWrap">
                                                    <input type="text" name="" id="webThumb" readonly="readonly" />
                                                    <div class="btnFlieWrap">
                                                        <input type="button" value="찾아보기" />
                                                        <input type="file" id="user_profile" name="user_profile" onchange="javascript:document.getElementById('webThumb').value = this.value;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                            if (isset($info->USER_EMAIL)){
                                                $mail = explode("@", $info->USER_EMAIL);
                                            }else{
                                                $mail = ["", ""];
                                            }
                                        ?>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">이메일</div>
                                            <div class="joinBoxEmail">
                                                <input type="email" name="user_email1" class="emailInput" value="<?php echo $mail[0]; ?>">@<input type="email" name="user_email2" class="emailInput" value="<?php echo $mail[1]; ?>">
                                                <select name="user_email_sel" class="emailSelect">
                                                    <option value="">직접입력</option>
                                                    <option value="nate.com">nate.com</option>
                                                    <option value="naver.com">naver.com</option>
                                                    <option value="gmail.com">gmail.com</option>
                                                    <option value="yahoo.com">yahoo.com</option>
                                                    <option value="hotmail.com">hotmail.com</option>
                                                </select>
                                            </div>
                                            <p class="joinEmailText">※ 인턴십 프로그램 및 취업 정보 안내 메일의 정확한 수신을 위해<br/>한메일 이외의 수신받을 수 있는 메일주소를 기입 바랍니다.</p>                                            
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">이메일 수신</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio" name="user_mail_flag" id="mailY" value="Y" <?php if ($info->USER_EMAIL_FLAG == "Y" || $info->USER_EMAIL_FLAG == "") echo "checked"; ?>>
                                                <label for="mailY">수신</label>
                                                <input type="radio" name="user_mail_flag" id="mailN" value="N" <?php if ($info->USER_EMAIL_FLAG == "N") echo "checked"; ?>>
                                                <label for="mailN">미수신</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">성별</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio" name="user_sex" value="M" checked id="sexM" <?php if ($info->USER_SEX == "M" || $info->USER_SEX == "") echo "checked"; ?>>
                                                <label for="sexM">남</label>
                                                <input type="radio" name="user_sex" value="F" id="sexF" <?php if ($info->USER_SEX == "F") echo "checked"; ?>>
                                                <label for="sexF">여</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">생년월일</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_birthday" value="" class="datepicker" value="<?php echo $info->USER_BIRTHDAY; ?>">
                                            </div>
                                        </div>
                                        <?php 
                                            if (isset($info->USER_TEL)){
                                                $tel = explode("-", $info->USER_TEL);
                                            }else{
                                                $tel = ["", "", ""];
                                            }
                                        ?>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">집전화번호</div>
                                            <div class="joinBoxPhone">
                                                <input type="tel" class="phoneInput" name="tel1" value="<?php echo $tel[0]; ?>">
                                                - <input type="tel" class="phoneInput" name="tel2" value="<?php echo $tel[1]; ?>">
                                                - <input type="tel" class="phoneInput" name="tel3" value="<?php echo $tel[2]; ?>"> 
                                            </div>
                                        </div>
                                        <?php 
                                            if (isset($info->USER_HP)){
                                                $hp = explode("-", $info->USER_HP);
                                            }else{
                                                $hp = ["", "", ""];
                                            }
                                        ?>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">휴대전화</div>
                                            <div class="joinBoxPhone">
                                                <input type="tel" class="phoneInput" name="hp1"  value="<?php echo $hp[0]; ?>">
                                                - <input type="tel" class="phoneInput" name="hp2"  value="<?php echo $hp[1]; ?>">
                                                - <input type="tel" class="phoneInput" name="hp3"  value="<?php echo $hp[2]; ?>"> 
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">SMS 수신</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio" name="user_sms_flag" value="Y" id="smsY" <?php if ($info->USER_SMS_FLAG == "Y") echo "checked"; ?>><label for="smsY">수신</lebel>
                                                <input type="radio" name="user_sms_flag" value="N" id="smsN" <?php if ($info->USER_SMS_FLAG == "N") echo "checked"; ?>><label for="smsN">미수신</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">Skype ID</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_skype_id" value="<?php echo $info->USER_SKYPE_ID; ?>">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">학교명 / 직장명</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_company" value="<?php echo $info->USER_COMPANY; ?>">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">학과</div>
                                            <div class="joinBoxSelect">
                                                <select class="" name="user_department">
                                                    <option value="">학과선택</option>
                                                    <option value="1" <?php if ($info->USER_DEPARTMENT == "1") echo "selected"; ?>>호텔/관광</option>
                                                    <option value="3" <?php if ($info->USER_DEPARTMENT == "3") echo "selected"; ?>>조리</option>
                                                    <option value="4" <?php if ($info->USER_DEPARTMENT == "4") echo "selected"; ?>>기타/외국어</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">전공 / 부서</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_major" value="<?php $info->USER_MAJOR; ?>">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">주소</div>
                                            <div class="joinBoxAdress">
                                                <input type="text" name="user_zip" id="user_zip" class="adressInput" value="<?php echo $info->USER_ZIPCODE; ?>">
                                                <button type="button" class="joinBtn01" id="searchZip">우편번호</button>
                                                <div class="joinBoxInput">
                                                    <input type="text" name="user_addr1" id="user_addr1" value="<?php echo $info->USER_ADDR1; ?>">
                                                </div>
                                                <div class="joinBoxInput">
                                                    <input type="text" name="user_addr2" id="user_addr2" value="<?php echo $info->USER_ADDR2; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">희망국가</div>
                                            <div class="joinBoxSelect">
                                                <select name="user_hope_nation">
                                                    <option value="">선택</option>
                                                    <option value="1" <?php if ($info->USER_HOPE_NATION == "1") echo "selected"; ?>>미국</option>
                                                    <option value="2" <?php if ($info->USER_HOPE_NATION == "2") echo "selected"; ?>>괌</option>
                                                    <option value="3" <?php if ($info->USER_HOPE_NATION == "3") echo "selected"; ?>>일본</option>
                                                    <option value="9" <?php if ($info->USER_HOPE_NATION == "9") echo "selected"; ?>>싱가포르</option>
                                                    <option value="5" <?php if ($info->USER_HOPE_NATION == "5") echo "selected"; ?>>중국</option>
                                                    <option value="4" <?php if ($info->USER_HOPE_NATION == "4") echo "selected"; ?>>호주</option>
                                                    <option value="6" <?php if ($info->USER_HOPE_NATION == "6") echo "selected"; ?>>유럽</option>
                                                    <option value="7" <?php if ($info->USER_HOPE_NATION == "7") echo "selected"; ?>>중동</option>
                                                    <option value="8" <?php if ($info->USER_HOPE_NATION == "8") echo "selected"; ?>>기타</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">지원부서</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_hope_part" value="<?php echo $info->USER_HOPE_PART; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="mt20">
                                            <div class="joinBoxTitle">회화능력</div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">영어</span>
                                                <input type="radio" name="user_skill_eng" value="5" id="eng5" <?php if ($info->USER_SKILL_ENG == "5") echo "checked"; ?>>
                                                <label for="eng5">5점</label>
                                                <input type="radio" name="user_skill_eng" value="4" id="eng4" <?php if ($info->USER_SKILL_ENG == "4") echo "checked"; ?>>
                                                <label for="eng4">4점</label>
                                                <input type="radio" name="user_skill_eng" value="3" id="eng3" <?php if ($info->USER_SKILL_ENG == "3") echo "checked"; ?>>
                                                <label for="eng3">3점</label>
                                                <input type="radio" name="user_skill_eng" value="2" id="eng2" <?php if ($info->USER_SKILL_ENG == "2") echo "checked"; ?>>
                                                <label for="eng2">2점</label>
                                                <input type="radio" name="user_skill_eng" value="1" id="eng1" <?php if ($info->USER_SKILL_ENG == "1") echo "checked"; ?>>
                                                <label for="eng1">1점</label>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">일본어</span>
                                                <input type="radio" name="user_skill_jp" value="5" id="jp5" <?php if ($info->USER_SKILL_JP == "5") echo "checked"; ?>>
                                                <label for="jp5">5점</label>
                                                <input type="radio" name="user_skill_jp" value="4" id="jp4" <?php if ($info->USER_SKILL_JP == "4") echo "checked"; ?>>
                                                <label for="jp4">4점</label>
                                                <input type="radio" name="user_skill_jp" value="3" id="jp3" <?php if ($info->USER_SKILL_JP == "3") echo "checked"; ?>>
                                                <label for="jp3">3점</label>
                                                <input type="radio" name="user_skill_jp" value="2" id="jp2" <?php if ($info->USER_SKILL_JP == "2") echo "checked"; ?>>
                                                <label for="jp2">2점</label>
                                                <input type="radio" name="user_skill_jp" value="1" id="jp1" <?php if ($info->USER_SKILL_JP == "1") echo "checked"; ?>>
                                                <label for="jp1">1점</label>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">중국어</span>
                                                <input type="radio" name="user_skill_ch" value="5" id="ch5" <?php if ($info->USER_SKILL_CH == "5") echo "checked"; ?>>
                                                <label for="ch5">5점</label>
                                                <input type="radio" name="user_skill_ch" value="4" id="ch4" <?php if ($info->USER_SKILL_CH == "4") echo "checked"; ?>>
                                                <label for="ch4">4점</label>
                                                <input type="radio" name="user_skill_ch" value="3" id="ch3" <?php if ($info->USER_SKILL_CH == "3") echo "checked"; ?>>
                                                <label for="ch3">3점</label>
                                                <input type="radio" name="user_skill_ch" value="2" id="ch2" <?php if ($info->USER_SKILL_CH == "2") echo "checked"; ?>>
                                                <label for="ch2">2점</label>
                                                <input type="radio" name="user_skill_ch" value="1" id="ch1" <?php if ($info->USER_SKILL_CH == "1") echo "checked"; ?>>
                                                <label for="ch1">1점</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">해외연수</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">국가</span>
                                                <div class="joinBoxEtcSelect">
                                                    <select name="user_study_nation">
                                                        <option value="">선택</option>
                                                        <option value="1" <?php if ($info->USER_STUDY_NATION == "1") echo "selected"; ?>>미국</option>
                                                        <option value="2" <?php if ($info->USER_STUDY_NATION == "2") echo "selected"; ?>>괌</option>
                                                        <option value="3" <?php if ($info->USER_STUDY_NATION == "3") echo "selected"; ?>>일본</option>
                                                        <option value="4" <?php if ($info->USER_STUDY_NATION == "4") echo "selected"; ?>>호주</option>
                                                        <option value="5" <?php if ($info->USER_STUDY_NATION == "5") echo "selected"; ?>>아시아</option>
                                                        <option value="6" <?php if ($info->USER_STUDY_NATION == "6") echo "selected"; ?>>유럽</option>
                                                        <option value="7" <?php if ($info->USER_STUDY_NATION == "7") echo "selected"; ?>>서남아시아</option>
                                                        <option value="8" <?php if ($info->USER_STUDY_NATION == "8") echo "selected"; ?>>기타</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio" name="user_study_term" value="0" id="ust0" <?php if ($info->USER_STUDY_TERM == "0") echo "checked"; ?>>
                                                <label for="ust0">없음</label>
                                                <input type="radio" name="user_study_term" value="1" id="ust1" <?php if ($info->USER_STUDY_TERM == "1") echo "checked"; ?>>
                                                <label for="ust1">6개월미만</label>
                                                <input type="radio" name="user_study_term" value="2" id="ust2" <?php if ($info->USER_STUDY_TERM == "2") echo "checked"; ?>>
                                                <label for="ust2">12개월미만</label>
                                                <input type="radio" name="user_study_term" value="3" id="ust3" <?php if ($info->USER_STUDY_TERM == "3") echo "checked"; ?>>
                                                <label for="ust3">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">해외연수경험</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">국가</span>
                                                <div class="joinBoxEtcSelect">
                                                    <select name="user_lan_study_nation">
                                                        <option value="">선택</option>
                                                        <option value="1" <?php if ($info->USER_LAN_STUDY_NATION == "1") echo "selected"; ?>>미국</option>
                                                        <option value="2" <?php if ($info->USER_LAN_STUDY_NATION == "2") echo "selected"; ?>>괌</option>
                                                        <option value="3" <?php if ($info->USER_LAN_STUDY_NATION == "3") echo "selected"; ?>>일본</option>
                                                        <option value="4" <?php if ($info->USER_LAN_STUDY_NATION == "4") echo "selected"; ?>>호주</option>
                                                        <option value="5" <?php if ($info->USER_LAN_STUDY_NATION == "5") echo "selected"; ?>>아시아</option>
                                                        <option value="6" <?php if ($info->USER_LAN_STUDY_NATION == "6") echo "selected"; ?>>유럽</option>
                                                        <option value="7" <?php if ($info->USER_LAN_STUDY_NATION == "7") echo "selected"; ?>>서남아시아</option>
                                                        <option value="8" <?php if ($info->USER_LAN_STUDY_NATION == "8") echo "selected"; ?>>기타</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio" name="user_lan_study_term" value="0" checked id="ulst0" <?php if ($info->USER_LAN_STUDY_TERM == "0") echo "checked"; ?>>
                                                <label for="ulst0">없음</label>
                                                <input type="radio" name="user_lan_study_term" value="1" id="ulst1" <?php if ($info->USER_LAN_STUDY_TERM == "1") echo "checked"; ?>>
                                                <label for="ulst1">6개월미만</label>
                                                <input type="radio" name="user_lan_study_term" value="2" id="ulst2" <?php if ($info->USER_LAN_STUDY_TERM == "2") echo "checked"; ?>>
                                                <label for="ulst2">12개월미만</label>
                                                <input type="radio" name="user_lan_study_term" value="3" id="ulst3" <?php if ($info->USER_LAN_STUDY_TERM == "3") echo "checked"; ?>>
                                                <label for="ulst3">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">국내외근무경력1</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">회사명</span>
                                                <div class="joinBoxEtcSelect">
                                                    <input type="text" class="wd100" name="user_work_company" value="<?php echo $info->USER_WORK_COMPANY; ?>">
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio" name="user_work_term" value="0" id="uwt0" <?php if ($info->USER_WORK_TERM == "0") echo "checked"; ?>><label for="uwt0">없음</label>
                                                <input type="radio" name="user_work_term" value="1" id="uwt1" <?php if ($info->USER_WORK_TERM == "1") echo "checked"; ?>><label for="uwt1">3개월미만</label>
                                                <input type="radio" name="user_work_term" value="2" id="uwt2" <?php if ($info->USER_WORK_TERM == "2") echo "checked"; ?>><label for="uwt2">6개월미만</label>
                                                <input type="radio" name="user_work_term" value="3" id="uwt3" <?php if ($info->USER_WORK_TERM == "3") echo "checked"; ?>><label for="uwt3">12개월미만</label>
                                                <input type="radio" name="user_work_term" value="4" id="uwt4" <?php if ($info->USER_WORK_TERM == "4") echo "checked"; ?>><label for="uwt4">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">국내외근무경력2</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">회사명</span>
                                                <div class="joinBoxEtcSelect">
                                                <input type="text" name="user_work_company2" value="<?php echo $info->USER_WORK_COMPANY_2; ?>">
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio" name="user_work_term2" value="0" id="uwt20" <?php if ($info->USER_WORK_TERM_2 == "0") echo "checked"; ?>><label for="uwt20">없음</label>
                                                <input type="radio" name="user_work_term2" value="1" id="uwt21" <?php if ($info->USER_WORK_TERM_2 == "1") echo "checked"; ?>><label for="uwt21">3개월미만</label>
                                                <input type="radio" name="user_work_term2" value="2" id="uwt22" <?php if ($info->USER_WORK_TERM_2 == "2") echo "checked"; ?>><label for="uwt22">6개월미만</label>
                                                <input type="radio" name="user_work_term2" value="3" id="uwt23" <?php if ($info->USER_WORK_TERM_2 == "3") echo "checked"; ?>><label for="uwt23">12개월미만</label>
                                                <input type="radio" name="user_work_term2" value="4" id="uwt24" <?php if ($info->USER_WORK_TERM_2 == "4") echo "checked"; ?>><label for="uwt24">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">국내외근무경력2</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">회사명</span>
                                                <div class="joinBoxEtcSelect">
                                                <input type="text" name="user_work_company3" value="<?php echo $info->USER_WORK_COMPANY_3; ?>">
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio" name="user_work_term3" value="0" id="uwt30" <?php if ($info->USER_WORK_TERM_3 == "0") echo "checked"; ?>><label for="uwt30">없음
                                                <input type="radio" name="user_work_term3" value="1" id="uwt31" <?php if ($info->USER_WORK_TERM_3 == "1") echo "checked"; ?>><label for="uwt31">3개월미만
                                                <input type="radio" name="user_work_term3" value="2" id="uwt32" <?php if ($info->USER_WORK_TERM_3 == "2") echo "checked"; ?>><label for="uwt32">6개월미만
                                                <input type="radio" name="user_work_term3" value="3" id="uwt33" <?php if ($info->USER_WORK_TERM_3 == "3") echo "checked"; ?>><label for="uwt33">12개월미만
                                                <input type="radio" name="user_work_term3" value="4" id="uwt34" <?php if ($info->USER_WORK_TERM_3 == "4") echo "checked"; ?>><label for="uwt34">12개월이상
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">자격증</div>
                                            <div class="joinBoxRadio mt20">
                                                <input type="radio" name="user_certi_flag" value="N" id="ucfN" <?php if ($info->USER_CERTI_FLAG == "N") echo "checked"; ?>><label for="ucfN">없음</label>
                                                <input type="radio" name="user_certi_flag" value="Y" id="ucfY" <?php if ($info->USER_CERTI_FLAG == "Y") echo "checked"; ?>><label for="ucfY">있음</label>
                                                <input type="text" name="user_certificate_name" class="joinBoxSubInput" value="<?php echo $info->USER_CERTIFICATE_NAME; ?>">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">여권소지여부</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio" name="user_passport_flag" value="N" id="upfN" <?php if ($info->USER_PASSPORT_FLAG == "N") echo "checked"; ?>><label for="upfN">없음</label>
                                                <input type="radio" name="user_passport_flag" value="Y" id="upfN" <?php if ($info->USER_PASSPORT_FLAG == "Y") echo "checked"; ?>><label for="upfN">있음</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">W/H (워킹홀리데이) 비자소지유무</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio" name="user_visa_flag" value="N" id="uvfN" <?php if ($info->USER_VISA_FLAG == "N") echo "checked"; ?>><label for="uvfN">없음
                                                <input type="radio" name="user_visa_flag" value="Y" id="uvfY" <?php if ($info->USER_VISA_FLAG == "Y") echo "checked"; ?>><label for="uvfY">있음
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">추천인</div>
                                            <div class="joinBoxInput">
                                                <input type="text" name="user_recomm_id" value="<?php echo $info->USER_RECOMM_ID; ?>">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">이력서등록</div>
                                            <div class="joinBoxInput">
                                                <div class="fileInputWrap">
                                                    <input type="text" name="user_profile_doc_str" id="user_profile_doc_str" readonly="readonly" />
                                                    <div class="btnFlieWrap">
                                                        <input type="button" value="찾아보기" />
                                                        <input type="file" name="user_profile_doc" id="user_profile_doc" onchange="javascript:document.getElementById('user_profile_doc_str').value = this.value;" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                            if (isset($info->USER_JOIN_ROUTE)){
                                                $routes = explode(",", $info->USER_JOIN_ROUTE);
                                            }else{
                                                $routes = array();
                                            }
                                        ?>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">추천경로</div>
                                            <div class="joinBoxCheckbox">
                                                <ul>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="1" id="ujr1" <?php if (array_search("1", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr1">신문광고</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="2" id="ujr2" <?php if (array_search("2", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr2">SMS매체</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="3" id="ujr3" <?php if (array_search("3", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr3">온라인검색</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="4" id="ujr4" <?php if (array_search("4", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr4">학교설명회/박람회</label>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="5" id="ujr5"<?php if (array_search("5", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr5">광고홍보물</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="6" id="ujr6" <?php if (array_search("6", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr6">친구/친척소개</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="7" id="ujr7" <?php if (array_search("7", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr7">교수님/선배소개</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" name="user_join_route" value="8" id="ujr8" <?php if (array_search("8", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr8">업체소개</label>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li class="mt10">
                                                        <input type="checkbox" name="user_join_route" value="9" id="ujr9" <?php if (array_search("9", $routes) != "") echo "checked"; ?>>
                                                        <label for="ujr9">기타</label>
                                                        <input type="text" class="TextInput" name="user_join_route_str" value="<?php echo $info->USER_JOIN_ROUTE_STR; ?>">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <div class="memberBtn mt50">
                                        <button type="button" class="memberBtnOk wd48 f_left" id="editUser">정보수정</button>
                                        <button type="button" class="memberBtnCancel wd48 f_right">취소</button>
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
        <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
            <img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" alt="닫기 버튼">
        </div>
    </body>
</html>
<script type="text/javascript">
$(function(){
    $(document).on("change", "select[name=user_email_sel]", function(){
        var _var = $(this).val();
        $("input[name=user_email2]").val(_var);
    })
    
    $(document).on("click", "#editUser", function(){
        var user_name = $("input[name=user_name]").val();
        var user_email1 = $("input[name=user_email1]").val();
        var user_email2 = $("input[name=user_email2]").val();
        var user_email_flag = $("input:radio[name=user_email_flag]").val();
        var user_sex = $("input:radio[name=user_sex]").val();
        var user_birthday = $("input[name=user_birthday]").val();
        var tel1 = $("input[name=tel1]").val();
        var tel2 = $("input[name=tel2]").val();
        var tel3 = $("input[name=tel3]").val();
        var hp1 = $("input[name=hp1]").val();
        var hp2 = $("input[name=hp2]").val();
        var hp3 = $("input[name=hp3]").val();
        var user_sms_flag = $("input[name=user_sms_flag]").val();
        var user_skype_id = $("input[name=user_skype_id]").val();
        var user_company = $("input[name=user_company]").val();
        var user_department = $("select[name=user_department]").val();
        var user_major = $("input[name=user_major]").val();
        var user_zip = $("input[name=user_zip]").val();
        var user_addr1 = $("input[name=user_addr1]").val();
        var user_addr2 = $("input[name=user_addr2]").val();
        /*
        var user_hope_nation = $("select[name=user_hope_nation]").val();
        var user_hope_part = $("input[name=user_hope_part]").val();
        var user_skill_eng = $("input:radio[name=user_skill_eng]").val();
        var user_skill_jp = $("input:radio[name=user_skill_jp]").val();
        */
        
        if (user_name == ""){
            alert("이름을 입력해주세요");
            $("input[name=user_name]").focus();
            return false;
        }

        var user_join_route = [];
        $.each($("input:checkbox[name=user_join_route]"), function(){
            if ($(this).is(":checked")){
                user_join_route.push($(this).val());
            }
        })

		var formData = new FormData();
		formData.append("user_name", $("input[name=user_name]").val());
		formData.append("user_eng_name", $("input[name=user_eng_name]").val());
		formData.append("user_level", $("select[name=user_level]").val());
		formData.append("user_sex", $("input:radio[name=user_sex]").val());
		formData.append("user_tel", $("input[name=tel1]").val()+"-"+$("input[name=tel2]").val()+"-"+$("input[name=tel3]").val());
		formData.append("user_hp", $("input[name=hp1]").val()+"-"+$("input[name=hp2]").val()+"-"+$("input[name=hp3]").val());
		formData.append("user_zip", $("input[name=user_zip]").val());
		formData.append("user_addr1", $("input[name=user_addr1]").val());
		formData.append("user_addr2", $("input[name=user_addr2]").val());
		formData.append("user_email", $("input[name=user_email1]").val() + "@" + $("input[name=user_email2]").val());
		formData.append("user_skype_id", $("input[name=user_skype_id]").val());
		formData.append("user_email_flag", $("input:radio[name=user_email_flag]:checked").val());
		formData.append("user_sms_flag", $("input:radio[name=user_sms_flag]:checked").val());
		formData.append("user_birthday", $("input[name=user_birthday]").val());
		formData.append("user_company", $("input[name=user_company]").val());
		formData.append("user_department", $("select[name=user_department]").val());
		formData.append("user_major", $("input[name=user_major]").val());
		formData.append("user_hope_nation", $("select[name=user_hope_nation]").val());
		formData.append("user_hope_part", $("input[name=user_hope_part]").val());
		formData.append("user_skill_eng", $("input:radio[name=user_skill_eng]:checked").val());
		formData.append("user_skill_jp", $("input:radio[name=user_skill_jp]:checked").val());
		formData.append("user_skill_ch", $("input:radio[name=user_skill_ch]:checked").val());
		formData.append("user_study_nation", $("select[name=user_study_nation]").val());
		formData.append("user_study_term", $("input:radio[name=user_study_term]:checked").val());
		formData.append("user_lan_study_nation", $("select[name=user_lan_study_nation]").val());
		formData.append("user_lan_study_term", $("input:radio[name=user_lan_study_term]:checked").val());
		formData.append("user_work_company", $("input[name=user_work_company]").val());
		formData.append("user_work_term", $("input:radio[name=user_work_term]:checked").val());
		formData.append("user_work_company_2", $("input[name=user_work_company2]").val());
		formData.append("user_work_term_2", $("input:radio[name=user_work_term2]:checked").val());
		formData.append("user_work_company_3", $("input[name=user_work_company3]").val());
		formData.append("user_work_term_3", $("input:radio[name=user_work_term3]:checked").val());
		formData.append("user_certi_flag", $("input:radio[name=user_certi_flag]:checked").val());
		formData.append("user_certificate_name", $("input[name=user_certificate_name]").val());
		formData.append("user_passport_flag", $("input:radio[name=user_passport_flag]:checked").val());
		formData.append("user_visa_flag", $("input:radio[name=user_visa_flag]:checked").val());
		formData.append("user_join_route", user_join_route);
		formData.append("user_join_route_str", $("input[name=user_join_route_str]").val());
		formData.append("user_leave_country", $("select[name=user_leave_country]").val());
		formData.append("user_leave_hotel", $("input[name=user_leave_hotel]").val());
		formData.append("user_manager_name", $("input[name=user_manager_name]").val());
		formData.append("user_recomm_id", $("input[name=user_recomm_id]").val());
		formData.append("user_memo", $("textarea[name=user_memo]").val());

		formData.append("user_profile", $("#user_profile").prop('files')[0]);
		formData.append("user_profile_doc", $("input[name=user_profile_doc]").prop('files')[0]);

        //var formData = $("#form1").serialize();
        //formData.append("user_profile", $("#user_profile").prop('files')[0]);
        //formData.append("user_profile_doc", $("#user_profile_doc").prop('files')[0]);

        //formData.append("user_profile", $("#user_profile").prop('files')[0]);

        $.ajax({
			url:"/mypage/memberEditProc",
			type:"post",
			dataType:"json",
			data : formData,
            contentType: false,
			processData: false,
			success:function(data){
				console.log(data);
				if (data.code == "200"){
					alert(data.msg);
					document.location.href="/Mypage/memberEdit";
				}else{
                    alert(data.msg);
                }
			}, error:function(e){
				console.log(e);
			}
		})
    });

	$(document).on("click", "#searchZip", function(){
		sample2_execDaumPostcode();
	});

	$(document).on("click", "#btnCloseLayer", function(){
		console.log("asdfasdfsadf");
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
				document.getElementById('user_zip').value = data.zonecode;
				document.getElementById("user_addr1").value = addr+extraAddr;
				// 커서를 상세주소 필드로 이동한다.
				document.getElementById("user_addr2").focus();

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
});
</script>