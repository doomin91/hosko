<?php include 'header.php'; ?>

    <body>

        <div id="wrap" class="main_wrap">

            <?php include 'nav.php'; ?>

            <div id="container">
                <div class="layout_sub">
                    <div class="sub_visual v02">
                        <div class="sub_visual_text">
                            <h1>HOSKO</h1>
                            <p>고객님의 정보를 소중하게 다루겠습니다.</p>
                        </div>

                    </div>
                    <div class="sub_contents">

                        <div class="inner">
                            <div class="joinWrap">
                                <div class="joinContentTop">
                                    <h2>Sign up to be a member</h2>
                                    <h3>HOSKO에 오신것을 환영합니다.</h3>
                                    <p>호스코만의 특별한 멤버쉽 서비스를 만나보세요.</p>
                                </div>

                                <div class="joinContent">
                                    <div class="joinStep">
                                        <ul>
                                            <li><img src="./static/img/agree_top_icon02.png" /></li>
                                            <li><img src="./static/img/info_top_icon01.png" /></li>
                                            <li><img src="./static/img/joinend_top_icon02.png" /></li>
                                        </ul>
                                    </div>

                                    <div class="agreeTextBox mt30">
                                        <p>HOSKO 서비스를 이용하기 위해 이용자는 이용약관을 읽어보시고 동의하셔야 합니다.</p>
                                        <p>일반회원등록은 무료이며, 등록 즉시 서비스 이용이 가능합니다.</p>
                                        <p>단, 유료화서비스와 인증절차가 필요한 경우 해당절차를 거펴야 서비스를 이용하실 수 있습니다.</p>
                                    </div>
                                    
                                    <div class="memberJoinBox mt50"> 
                                        <h2>로그인 정보</h2>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">아이디</div>
                                            <div class="joinBoxInput">
                                                <input type="text" class="wd80" placeholder="4자이상 12자이하">
                                                <button class="joinBtn01">중복확인</button>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">비밀번호</div>
                                            <div class="joinBoxInput">
                                                <input type="password" placeholder="영문소문자, 숫자포함 4~12자 이내 사용가능">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">비밀번호확인</div>
                                            <div class="joinBoxInput">
                                                <input type="password">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="memberJoinBox mt20">
                                        <h2>개인정보</h2>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">이름</div>
                                            <div class="joinBoxInput">
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">사진</div>
                                            
                                            <div class="joinBoxInput">
                                                <div class="fileInputWrap">
                                                    <input type="text" name="" id="webThumb" readonly="readonly" />
                                                    <div class="btnFlieWrap">
                                                        <input type="button" value="찾아보기" />
                                                        <input type="file" name="" id="" onchange="javascript:document.getElementById('webThumb').value = this.value;" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">이메일</div>
                                            <div class="joinBoxEmail">
                                                <input type="email" class="emailInput">@<input type="email" class="emailInput">
                                                <select class="emailSelect">
                                                    <option value="dd">aaa</option>
                                                    <option>bbbb</option>
                                                    <option>ccc</option>
                                                </select>
                                            </div>
                                            <p class="joinEmailText">※ 인턴십 프로그램 및 취업 정보 안내 메일의 정확한 수신을 위해<br/>한메일 이외의 수신받을 수 있는 메일주소를 기입 바랍니다.</p>                                            
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">이메일 수신</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio">
                                                <label for="">수신</label>
                                                <input type="radio">
                                                <label for="">미수신</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">성별</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio">
                                                <label for="">남</label>
                                                <input type="radio">
                                                <label for="">여</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">집전화번호</div>
                                            <div class="joinBoxPhone">
                                                <input type="tel" class="phoneInput"> - <input type="tel" class="phoneInput"> - <input type="tel" class="phoneInput"> 
                                            </div>
                                        </div>
                                        <div class="mt20">
                                            <div class="joinBoxTitle">휴대전화</div>
                                            <div class="joinBoxPhone">
                                                <input type="tel" class="phoneInput"> - <input type="tel" class="phoneInput"> - <input type="tel" class="phoneInput"> 
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">SMS 수신</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio">
                                                <label for="">수신</label>
                                                <input type="radio">
                                                <label for="">미수신</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">Skype ID</div>
                                            <div class="joinBoxInput">
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">학교명 / 직장명</div>
                                            <div class="joinBoxInput">
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">학과</div>
                                            <div class="joinBoxSelect">
                                                <input type="text" class="f_left">
                                                <select class="f_right">
                                                    <option>선택</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">전공 / 부서</div>
                                            <div class="joinBoxInput">
                                                <input type="text">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">주소</div>
                                            <div class="joinBoxAdress">
                                                <input type="text" class="adressInput"> - <input type="text" class="adressInput">
                                                <button class="joinBtn01">우편번호</button>
                                                <div class="joinBoxInput">
                                                    <input type="text">
                                                </div>
                                                <div class="joinBoxInput">
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">희망국가</div>
                                            <div class="joinBoxSelect">
                                                <input type="text">
                                                <select>
                                                    <option>선택</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">지원부서</div>
                                            <div class="joinBoxSelect">
                                                <input type="text">
                                                <select>
                                                    <option>선택</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">이메일 수신</div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">영어</span>
                                                <input type="radio">
                                                <label for="">5점</label>
                                                <input type="radio">
                                                <label for="">4점</label>
                                                <input type="radio">
                                                <label for="">3점</label>
                                                <input type="radio">
                                                <label for="">2점</label>
                                                <input type="radio">
                                                <label for="">1점</label>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">일본어</span>
                                                <input type="radio">
                                                <label for="">5점</label>
                                                <input type="radio">
                                                <label for="">4점</label>
                                                <input type="radio">
                                                <label for="">3점</label>
                                                <input type="radio">
                                                <label for="">2점</label>
                                                <input type="radio">
                                                <label for="">1점</label>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">중국어</span>
                                                <input type="radio">
                                                <label for="">5점</label>
                                                <input type="radio">
                                                <label for="">4점</label>
                                                <input type="radio">
                                                <label for="">3점</label>
                                                <input type="radio">
                                                <label for="">2점</label>
                                                <input type="radio">
                                                <label for="">1점</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">해외연수</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">국가</span>
                                                <div class="joinBoxEtcSelect">
                                                    <input type="text">
                                                    <select>
                                                        <option>선택</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">6개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">해외연수경험</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">국가</span>
                                                <div class="joinBoxEtcSelect">
                                                    <input type="text">
                                                    <select>
                                                        <option>선택</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">6개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월이상</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">국내외근무경력1</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">회사명</span>
                                                <div class="joinBoxEtcSelect">
                                                    <input type="text" class="wd100">
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">3개월미만</label>
                                                <input type="radio">
                                                <label for="">6개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">국내외근무경력2</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">회사명</span>
                                                <div class="joinBoxEtcSelect">
                                                    <input type="text" class="wd100">
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">3개월미만</label>
                                                <input type="radio">
                                                <label for="">6개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월이상</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">국내외근무경력3</div>
                                            <div class="joinBoxEtc">
                                                <span class="joinSubEtcTitle">회사명</span>
                                                <div class="joinBoxEtcSelect">
                                                    <input type="text" class="wd100">
                                                </div>
                                            </div>
                                            <div class="joinBoxRadio">
                                                <span class="joinSubTitle">기간</span>
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">3개월미만</label>
                                                <input type="radio">
                                                <label for="">6개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월미만</label>
                                                <input type="radio">
                                                <label for="">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">자격증</div>
                                            <div class="joinBoxRadio mt20">
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">있음</label>
                                                <input type="text" class="joinBoxSubInput">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">여권소지여부</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">있음</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">W/H (워킹홀리데이) 비자소지유무</div>
                                            <div class="joinBoxRadio">
                                                <input type="radio">
                                                <label for="">없음</label>
                                                <input type="radio">
                                                <label for="">있음</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">추천인</div>
                                            <div class="joinBoxInput">
                                                <input type="text">
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div class="joinBoxTitle">이력서등록</div>
                                            <div class="joinBoxInput">
                                                <div class="fileInputWrap">
                                                    <input type="text" name="" id="webThumb" readonly="readonly" />
                                                    <div class="btnFlieWrap">
                                                        <input type="button" value="찾아보기" />
                                                        <input type="file" name="" id="" onchange="javascript:document.getElementById('webThumb').value = this.value;" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt20">
                                            <div class="joinBoxTitle">추천경로</div>
                                            <div class="joinBoxCheckbox">
                                                <ul>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">신문광고</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">SMS매체</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">온라인검색</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">학교설명회/박람회</label>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">광고홍보물</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">친구/친척소개</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">교수님/선배소개</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox">
                                                        <label for="">업체소개</label>
                                                    </li>
                                                </ul>
                                                <ul>
                                                    <li class="mt10">
                                                        <input type="checkbox">
                                                        <label for="">기타</label>
                                                        <input type="text" class="TextInput">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="memberBtn mt50">
                                        <button class="memberBtnOk wd48 f_left">회원가입</button>
                                        <button class="memberBtnCancel wd48 f_right">가입취소</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        <?php include 'footer.php'; ?>


        </div>

    </body>
</html>






