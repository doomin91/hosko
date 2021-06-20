<?php
    include_once dirname(__DIR__)."/header.php";
?>
<script src="/ckeditor/ckeditor.js"></script>
    <body>
        <div id="wrap" class="main_wrap">
            <?php
                include_once dirname(__DIR__)."/nav.php";
            ?>
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
                            <div class="joinWrap" style="height:3500px;">
                                <div class="joinContentTop">
                                    <h2>Sign up to be a member</h2>
                                    <h3>HOSKO에 오신것을 환영합니다.</h3>
                                    <p>호스코만의 특별한 멤버쉽 서비스를 만나보세요.</p>
                                </div>

                                <div class="joinContent">
                                
                                    <div class="joinStep">
                                        <ul>
                                            <li><img src="/static/front/img/agree_top_icon02.png" /></li>
                                            <li><img src="/static/front/img/info_top_icon01.png" /></li>
                                            <li><img src="/static/front/img/joinend_top_icon02.png" /></li>
                                        </ul>
                                    </div>

                                    <div class="agreeTextBox mt30">
                                        <p>HOSKO 서비스를 이용하기 위해 이용자는 이용약관을 읽어보시고 동의하셔야 합니다.</p>
                                        <p>일반회원등록은 무료이며, 등록 즉시 서비스 이용이 가능합니다.</p>
                                        <p>단, 유료화서비스와 인증절차가 필요한 경우 해당절차를 거펴야 서비스를 이용하실 수 있습니다.</p>
                                    </div>
                                <form name="form1" id="form1">
                                <input type="hidden" name="id_check"/>
                                    <div class="mt50"> 
                                        <h2>로그인 정보</h2>
                                        <div class="mt20">
                                            <div>아이디</div>
                                            <div>
                                                <input type="text" name="user_id">
                                                <div><a href="/">중복확인</a></div>    
                                            </div>
                                        </div>
                                        <div class="mt20">
                                            <div>비밀번호</div>
                                            <div>
                                                <input type="password" name="user_pass">
                                            </div>
                                        </div>
                                        <div class="mt20">
                                            <div>비밀번호확인</div>
                                            <div>
                                                <input type="password" name="user_pass_chk">
                                            </div>
                                        </div> 
                                    </div>


                                    <div class="mt50">
                                        <h2>개인정보</h2>
                                        <div class="mt20">
                                            <div>이름</div>
                                            <div>
                                                <input type="text" name="user_name">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>사진</div>
                                            <div>
                                                <input type="file" name="user_profile">
                                                <label>찾아보기</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>이메일</div>
                                            <input type="text" name="user_email1">@<input type="text" name="user_email2">
                                            <select name="user_email_sel">
                                            <option value="">직접입력</option>
                                                <option value="nate.com">nate.com</option>
                                                <option value="naver.com">naver.com</option>
                                                <option value="gmail.com">gmail.com</option>
                                                <option value="yahoo.com">yahoo.com</option>
                                                <option value="hotmail.com">hotmail.com</option>
                                            </select>
                                            <p>※ 인턴십 프로그램 및 취업 정보 안내 메일의 정확한 수신을 위해<br/>한메일 이외의 수신받을 수 있는 메일주소를 기입 바랍니다.</p>                                            
                                        </div>


                                        <div class="mt20">
                                            <div>이메일 수신</div>
                                            <div>
                                                <input type="radio" name="user_mail_flag" value="Y" checked id="mailY"><label for="mailY">수신</label>
                                                <input type="radio" name="user_mail_flag" value="N" id="mailN"><label for="mailN">미수신</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>성별</div>
                                            <div>
                                                <input type="radio" name="user_sex" value="M" checked id="sexM"><label for="sexM">남</label>
                                                <input type="radio" name="user_sex" value="F" id="sexF"><label for="sexF">여</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>생년월일</div>
                                            <div>
                                                <input type="text" name="user_birthday" class="datepicker">
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>집전화번호</div>
                                            <div>
                                                <input type="number" name="tel1"> - <input type="number" name="tel2"> - <input type="number" name="tel3"> 
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>휴대전화</div>
                                            <div>
                                                <input type="number" name="hp1"> - <input type="number" name="hp2"> - <input type="number" name="hp3"> 
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>SMS 수신</div>
                                            <div>
                                                <input type="radio" name="user_sms_flag" value="Y" checked id="smsY"><label for="smsY">수신</lebel>
                                                <input type="radio" name="user_sms_flag" value="N" id="smsN"><label for="smsN">미수신</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>Skype ID</div>
                                            <div>
                                                <input type="text" name="user_skype_id">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>학교명 / 직장명</div>
                                            <div>
                                                <input type="text" name="user_company">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>학과</div>
                                            <div>
                                                <select name="user_department">
                                                    <option value="">학과선택</option>
                                                    <option value="1">호텔/관광</option>
                                                    <option value="3">조리</option>
                                                    <option value="4">기타/외국어</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>전공 / 부서</div>
                                            <div>
                                                <input type="text" name="user_major">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>주소</div>
                                            <div>
                                                <input type="text" name="user_zip" id="user_zip"><button class="btn btn-default btn-sm" type="button" id="searchZip">우편번호 검색</button><br>
                                                <input type="text" name="user_addr1" id="user_addr1"><br>
                                                <input type="text" name="user_addr2" id="user_addr2">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>희망국가</div>
                                            <div>
                                                <select name="user_hope_nation">
                                                    <option value="">선택</option>
                                                    <option value="1">미국</option>
                                                    <option value="2">괌</option>
                                                    <option value="3">일본</option>
                                                    <option value="9">싱가포르</option>
                                                    <option value="5">중국</option>
                                                    <option value="4">호주</option>
                                                    <option value="6">유럽</option>
                                                    <option value="7">중동</option>
                                                    <option value="8">기타</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>지원부서</div>
                                            <div>
                                                <input type="text" name="user_hope_part">
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>회화능력</div>
                                            <div>
                                                <span>영어</span>
                                                <input type="radio" name="user_skill_eng" value="5" id="eng5"><label for="eng5">5점</label>
                                                <input type="radio" name="user_skill_eng" value="4" id="eng4"><label for="eng4">4점</label>
                                                <input type="radio" name="user_skill_eng" value="3" id="eng3"><label for="eng3">3점</label>
                                                <input type="radio" name="user_skill_eng" value="2" id="eng2"><label for="eng2">2점</label>
                                                <input type="radio" name="user_skill_eng" value="1" id="eng1"><label for="eng1">1점</label>
                                                <input type="radio" name="user_skill_eng" value="0" checked id="eng0"><label for="eng0">모름</label>
                                            </div>
                                            <div>
                                                <span>일본어</span>
                                                <input type="radio" name="user_skill_jp" value="5" id="jp5"><label for="jp5">5점</label>
                                                <input type="radio" name="user_skill_jp" value="4" id="jp4"><label for="jp4">4점</label>
                                                <input type="radio" name="user_skill_jp" value="3" id="jp3"><label for="jp3">3점</label>
                                                <input type="radio" name="user_skill_jp" value="2" id="jp2"><label for="jp2">2점</label>
                                                <input type="radio" name="user_skill_jp" value="1" id="jp1"><label for="jp1">1점</label>
                                                <input type="radio" name="user_skill_jp" value="0" checked id="jp0"><label for="jp0">모름</label>
                                            </div>
                                            <div>
                                                <span>중국어</span>
                                                <input type="radio" name="user_skill_ch" value="5" id="ch5"><label for="ch5">5점</label>
                                                <input type="radio" name="user_skill_ch" value="4" id="ch4"><label for="ch4">4점</label>
                                                <input type="radio" name="user_skill_ch" value="3" id="ch3"><label for="ch3">3점</label>
                                                <input type="radio" name="user_skill_ch" value="2" id="ch2"><label for="ch2">2점</label>
                                                <input type="radio" name="user_skill_ch" value="1" id="ch1"><label for="ch1">1점</label>
                                                <input type="radio" name="user_skill_ch" value="0" checked id="ch0"><label for="ch0">모름</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>해외연수</div>
                                            <div>
                                                <span>국가</span>
                                                <select name="user_study_nation">
                                                    <option value="">선택</option>
                                                    <option value="1">미국</option>
                                                    <option value="2">괌</option>
                                                    <option value="3">일본</option>
                                                    <option value="4">호주</option>
                                                    <option value="5">아시아</option>
                                                    <option value="6">유럽</option>
                                                    <option value="7">서남아시아</option>
                                                    <option value="8">기타</option>
                                                </select>
                                            </div>
                                            <div>
                                                <span>기간</span>
                                                <input type="radio" name="user_study_term" value="0" checked id="ust0"><label for="ust0">없음</label>
                                                <input type="radio" name="user_study_term" value="1" id="ust1"><label for="ust1">6개월미만</label>
                                                <input type="radio" name="user_study_term" value="2" id="ust2"><label for="ust2">12개월미만</label>
                                                <input type="radio" name="user_study_term" value="3" id="ust3"><label for="ust3">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>해외연수경험</div>
                                            <div>
                                                <span>국가</span>
                                                <select name="user_lan_study_nation">
                                                    <option value="">선택</option>
                                                    <option value="1">미국</option>
                                                    <option value="2">괌</option>
                                                    <option value="3">일본</option>
                                                    <option value="4">호주</option>
                                                    <option value="5">아시아</option>
                                                    <option value="6">유럽</option>
                                                    <option value="7">서남아시아</option>
                                                    <option value="8">기타</option>
                                                </select>
                                            </div>
                                            <div>
                                                <span>기간</span>
                                                <input type="radio" name="user_lan_study_term" value="0" checked id="ulst0"><label for="ulst0">없음</label>
                                                <input type="radio" name="user_lan_study_term" value="1" id="ulst1"><label for="ulst1">6개월미만</label>
                                                <input type="radio" name="user_lan_study_term" value="2" id="ulst2"><label for="ulst2">12개월미만</label>
                                                <input type="radio" name="user_lan_study_term" value="3" id="ulst3"><label for="ulst3">12개월이상</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>국내외근무경력1</div>
                                            <div>
                                                <span>회사명</span>
                                                <input type="text" name="user_work_company">
                                            </div>
                                            <div>
                                                <span>기간</span>
                                                <input type="radio" name="user_work_term" value="0" checked id="uwt0"><label for="uwt0">없음</label>
                                                <input type="radio" name="user_work_term" value="1" id="uwt1"><label for="uwt1">3개월미만</label>
                                                <input type="radio" name="user_work_term" value="2" id="uwt2"><label for="uwt2">6개월미만</label>
                                                <input type="radio" name="user_work_term" value="3" id="uwt3"><label for="uwt3">12개월미만</label>
                                                <input type="radio" name="user_work_term" value="4" id="uwt4"><label for="uwt4">12개월이상</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>국내외근무경력2</div>
                                            <div>
                                                <span>회사명</span>
                                                <input type="text" name="user_work_company2">
                                            </div>
                                            <div>
                                                <span>기간</span>
                                                <input type="radio" name="user_work_term2" value="0" checked id="uwt20"><label for="uwt20">없음</label>
                                                <input type="radio" name="user_work_term2" value="1" id="uwt21"><label for="uwt21">3개월미만</label>
                                                <input type="radio" name="user_work_term2" value="2" id="uwt22"><label for="uwt22">6개월미만</label>
                                                <input type="radio" name="user_work_term2" value="3" id="uwt23"><label for="uwt23">12개월미만</label>
                                                <input type="radio" name="user_work_term2" value="4" id="uwt24"><label for="uwt24">12개월이상</label>
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>국내외근무경력3</div>
                                            <div>
                                                <span>회사명</span>
                                                <input type="text" name="user_work_company3">
                                            </div>
                                            <div>
                                                <span>기간</span>
                                                <input type="radio" name="user_work_term3" value="0" checked id="uwt30"><label for="uwt30">없음
                                                <input type="radio" name="user_work_term3" value="1" id="uwt31"><label for="uwt31">3개월미만
                                                <input type="radio" name="user_work_term3" value="2" id="uwt32"><label for="uwt32">6개월미만
                                                <input type="radio" name="user_work_term3" value="3" id="uwt33"><label for="uwt33">12개월미만
                                                <input type="radio" name="user_work_term3" value="4" id="uwt34"><label for="uwt34">12개월이상
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>자격증</div>
                                            <div>
                                                <input type="radio" name="user_certi_flag" value="N" checked id="ucfN"><label for="ucfN">없음</label>
                                                <input type="radio" name="user_certi_flag" value="Y" id="ucfY"><label for="ucfY">있음</label>
                                                <input type="text" name="user_certificate_name">
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>여권소지여부</div>
                                            <div>
                                                <input type="radio" name="user_passport_flag" value="N" checked id="upfN"><label for="upfN">>없음</label>
                                                <input type="radio" name="user_passport_flag" value="Y" id="upfN"><label for="upfN">>있음</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>W/H (워킹홀리데이) 비자소지유무</div>
                                            <div>
                                                <input type="radio" name="user_visa_flag" value="N" checked id="uvfN"><label for="uvfN">없음
                                                <input type="radio" name="user_visa_flag" value="Y" id="uvfY"><label for="uvfY">있음
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>추천인</div>
                                            <div>
                                                <input type="text" name="user_recomm_id">
                                            </div>
                                        </div>


                                        <div class="mt20">
                                            <div>이력서등록</div>
                                            <div>
                                                <input type="file" name="user_profile_doc">
                                                <label>찾아보기</label>
                                            </div>
                                        </div>

                                        <div class="mt20">
                                            <div>추천경로</div>
                                            <div>
                                                <span><input type="checkbox" name="user_join_route" value="1" id="ujr1"><label for="ujr1">신문광고</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="2" id="ujr2"><label for="ujr2">SMS 매체</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="3" id="ujr3"><label for="ujr3">온라인검색</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="4" id="ujr4"><label for="ujr4">학교설명회/박람회</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="5" id="ujr5"><label for="ujr5">광고홍보물</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="6" id="ujr6"><label for="ujr6">친구/친척소개</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="7" id="ujr7"><label for="ujr7">교수님/선배소개</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="8" id="ujr8"><label for="ujr8">업체 소개</label></span>
                                                <span><input type="checkbox" name="user_join_route" value="9" id="ujr9"><label for="ujr9">기타</label></span>
                                                <input tyep="text" name="user_join_route_str"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <div class="memberBtn mt50">
                                        <div class="memberBtnOk"><a href="#" id="saveUser">회원가입</a></div>
                                        <div class="memberBtnCancel"><a href="#">가입취소</a></div>
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
        var _val = $(this).val();

        $("input[name=user_email2]").val(_val);
    });

    $(document).on("click", "#saveUser", function(){
        var user_id = $("input[name=user_id]").val();
        var user_pass = $("input[name=user_pass]").val();
        var user_pass_chk = $("input[name=user_pass_chk]").val();
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

        if (user_id == ""){
            alert("아이디를 입력해주세요");
            $("input[name=user_id]").focus();
            return false;
        }

        if (user_pass == ""){
            alert("비밀번호를 입력해주세요");
            $("input[name=user_pass]").focus();
            return false;
        }

        if (user_pass_chk != user_pass){
            alert("비밀번호를 동일하게 입력해주세요");
            $("input[name=user_pass_chk]").focus();
            return false;
        }
        
        if (user_name == ""){
            alert("이름을 입력해주세요");
            $("input[name=user_name]").focus();
            return false;
        }

        var formData = $("#form1").serialize();

        $.ajax({
			url:"/member/userInsertProc",
			type:"post",
			dataType:"json",
			data : formData,
			success:function(data){
				console.log(data);
				if (data.code == "200"){
					alert(data.msg);
					document.location.href="/Member/member_input_step3";
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