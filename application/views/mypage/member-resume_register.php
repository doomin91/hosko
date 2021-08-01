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
                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php echo "이력서 작성" ?></h2>
                                </div>

                                <form name="myApplyCreateForm" id="myApplyCreateForm" class="form-horizontal" role="form">
                                    <!-- <input type="hidden" id="user_seq" name="user_seq" value="<?php echo $USER->USER_SEQ?>"/> -->
                                    <div class="subContSec">
                                        <div class="col-md-12 text-center resume_img_frame">
                                            <img src="https://7wdata.be/wp-content/uploads/2016/05/icon-user-default.png">
                                        </div>
                                        
                                        <div class="input-group text-center col-sm-12">
                                            <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                <i class="fa fa-upload"></i><input type="file" id="resume_img" name="resume_img">
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="subContSec">
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">Name (영문)</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_name" id="resume_user_name" value="">
                                                        <div> * 영문 이름은 반드시 여권 이름과 동일하게 작성 되어야 합니다. </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Address</th>
                                                    <td class="col-sm-10">
                                                        <div>
                                                            <div class="wid50p">
                                                                <div class="resumeZipCodeForm">
                                                                    <input type="text" name="resume_user_addr0" id="resume_user_addr0" class="form-control">
                                                                </div>
                                                                <div>
                                                                    <input type="button" class="btn btn-default" value="우편번호" id="searchZip">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input type="text" name="resume_user_addr1" id="resume_user_addr1" class="form-control">
                                                            </div>
                                                            <div>
                                                                <input type="text" name="resume_user_addr2" id="resume_user_addr2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Phone No.</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_phone" id="resume_user_phone" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">E-mail</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_email" id="resume_user_email" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">SkypeID</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_skype_id" id="resume_user_skype_id" value="">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Personal Particulars</div>
                                        </div>
                                        <table class="table table-custom dataTable">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-2">Age</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_age" id="resume_user_age" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Date of Birth</th>
                                                    <td class="col-sm-10">
                                                        <div class="col-sm-2">
                                                            <select name="ctg" class="chosen-select chosen-transparent chosen-single form-control" >
                                                                <option value="" >:: 대분류 ::</option>
                                                                <option value="1" >인턴쉽</option>
                                                                <option value="2" >채용&헤드헌팅</option>
                                                                <option value="3" >유학</option>
                                                            </select>
                                                            
                                                            </div>
                                                        <div class="col-sm-2">
                                                            <select name="ctg2" class="chosen-select chosen-transparent form-control">
                                                                <option value="" selected>:: 중분류 ::</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <select name="ctg3" class="chosen-select chosen-transparent form-control">
                                                                <option value="" selected>:: 소분류 ::</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Martial Status</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_martial_status" id="resume_user_martial_status" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">I/C Number<br>(여권번호)</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_ic_number" id="resume_user_ic_number" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Permanent<br>Residence</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_permanent_residence" id="resume_user_permanent_residence" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Religion</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_religion" id="resume_user_religion" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Graduation Date<br>(mm/dd/yyyy)</th>
                                                    <td class="col-sm-10">
                                                        <div class="col-sm-2 ctg_select_form">
                                                            <select name="ctg" class="chosen-select chosen-transparent chosen-single form-control ctg_select search_field" >
                                                                <option value="" >:: 대분류 ::</option>
                                                                <option value="1" >인턴쉽</option>
                                                                <option value="2" >채용&헤드헌팅</option>
                                                                <option value="3" >유학</option>
                                                            </select>
                                                            
                                                            </div>
                                                        <div class="col-sm-2 ctg_select_form ">
                                                            <select name="ctg2" class="chosen-select chosen-transparent form-control ctg_select search_field">
                                                                <option value="" selected>:: 중분류 ::</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2 ctg_select_form">
                                                            <select name="ctg3" class="chosen-select chosen-transparent form-control ctg_select search_field">
                                                                <option value="" selected>:: 소분류 ::</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Height</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_height" id="resume_user_height" value=""> cm
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Weight</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_weight" id="resume_user_weight" value=""> Kg
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Hobbies</th>
                                                    <td class="col-sm-10">
                                                        <input type="text" class="form-control wid100p" name="resume_user_hobby" id="resume_user_hobby" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-2">Criminal Record</th>
                                                    <td class="col-sm-10">
                                                        <select name="ctg3" class="chosen-select chosen-transparent form-control ctg_select search_field">
                                                            <option value="No" selected>No</option>
                                                            <option value="Yes" >Yes</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Education</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <div class="resumeBox">
                                                <div>
                                                    <input type="text" name="redu_date[]" value="">
                                                    <input type="text" name="redu_description[]" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_edu">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_edu">
                                            <div>
                                        <div>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Working Experience</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <div class="resumeBox">
                                                <div>
                                                    <input type="text" name="rwexp_date[]" value="">
                                                    <input type="text" name="rwexp_description[]" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_wexp">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_wexp">
                                            <div>
                                        <div>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Activities</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <div class="resumeBox">
                                                <div>
                                                    <input type="text" name="ract_date[]" value="">
                                                    <input type="text" name="ract_description[]" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_ract">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_ract">
                                            <div>
                                        <div>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Achievements</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <div class="resumeBox">
                                                <div>
                                                    <input type="text" name="rahcv_date[]" value="">
                                                    <input type="text" name="rahcv_description[]" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rahcv">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rahcv">
                                            <div>
                                        <div>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Professional Skills</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <div class="resumeBox">
                                                <div>
                                                    <input type="text" name="rskil_date[]" value="">
                                                    <input type="text" name="rskil_description[]" value="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rskil">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rskil">
                                            <div>
                                        <div>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Professional Skills</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <div class="resumeBox">
                                                <div>
                                                    <div>Language</div>
                                                    <div>Speak</div>
                                                    <div>Written</div>
                                                </div>
                                                <div class="resume_lang_select">
                                                    <div>
                                                        <input type="text" name="rlang_name[]" value="">
                                                    </div>
                                                    <div>
                                                        <select>
                                                            <option value="0" selected>BASIC</option>
                                                            <option value="1" selected>GOOD</option>
                                                            <option value="2" selected>EXCELLENT</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <option value="0" selected>BASIC</option>
                                                        <option value="1" selected>GOOD</option>
                                                        <option value="2" selected>EXCELLENT</option>
                                                    </div>
                                                <div>
                                            </div>
                                            <div class="col-sm-12 text-right">
                                                <input type="button" class="btn btn-default" value="삭제" id="del_resume_rskil">
                                                <input type="button" class="btn btn-primary" value="추가" id="add_resume_rskil">
                                            <div>
                                        <div>
                                    </div>

                                    <div class="subContSec">
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-10">Computer Skills</div>
                                        </div>
                                        <div class="memberJoinBox mt20">
                                            <input type="text" name="resume_user_computer_skill" value="">
                                        <div>
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
    $(function(){
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
                    document.getElementById('resume_user_addr0').value = data.zonecode;
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
    });
</script>






