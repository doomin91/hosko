<?php
    include_once dirname(__DIR__)."/admin-header.php";
?>
<body class="bg-1">

    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Make page fluid -->
        <div class="row">

        <!-- Fixed navbar -->
        <?php
            include_once dirname(__DIR__)."/admin-top.php";
        ?>
        <!-- Fixed navbar end -->

        <!-- Page content -->
        <div id="content" class="col-md-12">

          <!-- page header -->
          <div class="pageheader">
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>단체 SMS 발송</b> <span></span></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="#">회원관리</a></li>
                <li class="active">단체 SMS 발송</li>
              </ol>
            </div>

          </div>
          <!-- /page header -->

          <!-- content main container -->
          <div class="main">

            <div class="row">
                <div class="col-md-12">
                   <section class="tile color transparent-black">
                        <div class="tile-body">
                            <table class="table table-custom datatable userTable">
                                <colgroup>
									<col width="15%"/>
									<col width="35%"/>
									<col width="15%"/>
									<col width="35%"/>
								</colgroup>
                                <tbody>
                                <form name="sform"  method="get" action="/admin/user/smsSend">
                                    <!--
                                    <tr>
										<th>가입일자</th>
										<td>
											<div class="col-md-5">
												<input name="reg_date_start" type="text" class="wid100p datepicker" value="<?php echo $reg_date_start; ?>">
											</div>
											<div class="col-md-5">
												<input name="reg_date_end" type="text" class="wid100p datepicker" value="<?php echo $reg_date_end; ?>">
											</div>
										</td>
										<th>로그인 일자</th>
										<td>
											<div class="col-md-5">
												<input name="last_login_start" type="text" class="wid100p datepicker" value="<?php echo $last_login_start; ?>">
											</div>
											<div class="col-md-5">
												<input name="last_login_end" type="text" class="wid100p datepicker" value="<?php echo $last_login_end; ?>">
											</div>
										</td>
									</tr>
									<tr>
										<th>회화능력</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_skill_eng" class="wid100p">
													<option value="">::영어::</option>
													<option value="1" <?php if ($user_skill_eng == "1") echo "selected"; ?>>1점</option>
													<option value="2" <?php if ($user_skill_eng == "2") echo "selected"; ?>>2점</option>
													<option value="3" <?php if ($user_skill_eng == "3") echo "selected"; ?>>3점</option>
													<option value="4" <?php if ($user_skill_eng == "4") echo "selected"; ?>>4점</option>
													<option value="5" <?php if ($user_skill_eng == "5") echo "selected"; ?>>5점</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_skill_jp" class="wid100p">
													<option value="">::일본어::</option>
													<option value="1" <?php if ($user_skill_jp == "1") echo "selected"; ?>>1점</option>
													<option value="2" <?php if ($user_skill_jp == "2") echo "selected"; ?>>2점</option>
													<option value="3" <?php if ($user_skill_jp == "3") echo "selected"; ?>>3점</option>
													<option value="4" <?php if ($user_skill_jp == "4") echo "selected"; ?>>4점</option>
													<option value="5" <?php if ($user_skill_jp == "5") echo "selected"; ?>>5점</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_skill_ch" class="wid100p">
													<option value="">::중국::</option>
													<option value="1" <?php if ($user_skill_ch == "1") echo "selected"; ?>>1점</option>
													<option value="2" <?php if ($user_skill_ch == "2") echo "selected"; ?>>2점</option>
													<option value="3" <?php if ($user_skill_ch == "3") echo "selected"; ?>>3점</option>
													<option value="4" <?php if ($user_skill_ch == "4") echo "selected"; ?>>4점</option>
													<option value="5" <?php if ($user_skill_ch == "5") echo "selected"; ?>>5점</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>해외연수경험</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_study_nation" class="wid100p">
													<option value="">::국가::</option>
													<option value="1" <?php if ($user_study_nation == "1") echo "selected"; ?>>미국</option>
													<option value="2" <?php if ($user_study_nation == "2") echo "selected"; ?>>괌</option>
													<option value="3" <?php if ($user_study_nation == "3") echo "selected"; ?>>일본</option>
													<option value="4" <?php if ($user_study_nation == "4") echo "selected"; ?>>호주</option>
													<option value="5" <?php if ($user_study_nation == "5") echo "selected"; ?>>아시아</option>
													<option value="6" <?php if ($user_study_nation == "6") echo "selected"; ?>>유럽</option>
													<option value="7" <?php if ($user_study_nation == "7") echo "selected"; ?>>서남아시아</option>
													<option value="8" <?php if ($user_study_nation == "8") echo "selected"; ?>>기타</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_study_term" class="wid100p">
													<option value="">::기간::</option>
													<option value="0">없음</option>
													<option value="1" <?php if ($user_study_term == "1") echo "selected"; ?>>6개월 미만</option>
													<option value="2" <?php if ($user_study_term == "2") echo "selected"; ?>>12개월 미만</option>
													<option value="3" <?php if ($user_study_term == "3") echo "selected"; ?>>12개월 이상</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>해외어학연수경험</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_lan_study_nation" class="wid100p">
													<option value="">::국가::</option>
													<option value="1" <?php if ($user_lan_study_nation == "1") echo "selected"; ?>>미국</option>
													<option value="2" <?php if ($user_lan_study_nation == "2") echo "selected"; ?>>괌</option>
													<option value="3" <?php if ($user_lan_study_nation == "3") echo "selected"; ?>>일본</option>
													<option value="4" <?php if ($user_lan_study_nation == "4") echo "selected"; ?>>호주</option>
													<option value="5" <?php if ($user_lan_study_nation == "5") echo "selected"; ?>>아시아</option>
													<option value="6" <?php if ($user_lan_study_nation == "6") echo "selected"; ?>>유럽</option>
													<option value="7" <?php if ($user_lan_study_nation == "7") echo "selected"; ?>>서남아시아</option>
													<option value="8" <?php if ($user_lan_study_nation == "8") echo "selected"; ?>>기타</option>
												</select>
											</div>
											<div class="col-md-2">
												<select name="user_lan_study_term" class="wid100p">
													<option value="">::기간::</option>
													<option value="0">없음</option>
													<option value="1" <?php if ($user_lan_study_term == "1") echo "selected"; ?>>6개월 미만</option>
													<option value="2" <?php if ($user_lan_study_term == "2") echo "selected"; ?>>12개월 미만</option>
													<option value="3" <?php if ($user_lan_study_term == "3") echo "selected"; ?>>12개월 이상</option>
												</select>
											</div>
										</td>
									</tr>
                                    -->
									<!--
									<tr>
										<th>국내외 근무경력</th>
										<td colspan="3">
											<div class="col-md-2">
												<select class="wid100p">
													<option value="">::근무기간1::</option>
													<option value="0">없음</option>
													<option value="1">3개월 미만</option>
													<option value="2">6개월 미만</option>
													<option value="3">12개월 미만</option>
													<option value="4">12개월 이상</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="wid100p">
													<option value="">::근무기간2::</option>
													<option value="0">없음</option>
													<option value="1">3개월 미만</option>
													<option value="2">6개월 미만</option>
													<option value="3">12개월 미만</option>
													<option value="4">12개월 이상</option>
												</select>
											</div>
											<div class="col-md-2">
												<select class="wid100p">
													<option value="">::근무기간3::</option>
													<option value="0">없음</option>
													<option value="1">3개월 미만</option>
													<option value="2">6개월 미만</option>
													<option value="3">12개월 미만</option>
													<option value="4">12개월 이상</option>
												</select>
											</div>
										</td>
									</tr>
									-->
									<tr>
										<th>회원등급</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="user_level" class="wid100p">
													<option value="">선택해주세요</option>
												<?php
													foreach ($levels as $lev) {
														if ($lev->LEVEL_SEQ == $user_level){
															echo "<option value=\"".$lev->LEVEL_SEQ."\" selected>".$lev->LEVEL_NAME."</option>";
														}else{
															echo "<option value=\"".$lev->LEVEL_SEQ."\">".$lev->LEVEL_NAME."</option>";
														}

													}
												?>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<th>단어검색</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="search_field" class="wid100p">
													<option value="all">전체</option>
													<option value="USER_ID" <?php if ($search_field == "USER_ID") echo "selected"; ?>>아이디</option>
													<option value="USER_NAME" <?php if ($search_field == "USER_NAME") echo "selected"; ?>>이름</option>
													<option value="USER_NUMBER" <?php if ($search_field == "USER_NUMBER") echo "selected"; ?>>회원번호</option>
													<option value="USER_HP" <?php if ($search_field == "USER_HP") echo "selected"; ?>>연락처</option>
													<option value="USER_EMAIL" <?php if ($search_field == "USER_EMAIL") echo "selected"; ?>>이메일주소</option>
													<option value="USER_LEAVE_COUNTRY" <?php if ($search_field == "USER_LEAVE_COUNTRY") echo "selected"; ?>>출국국가</option>
													<option value="USER_LEAVE_HOTEL" <?php if ($search_field == "USER_LEAVE_HOTEL") echo "selected"; ?>>출국호텔</option>
													<option value="USER_COMPANY" <?php if ($search_field == "USER_COMPANY") echo "selected"; ?>>학교/직장</option>
													<option value="USER_MANAGER_NAME" <?php if ($search_field == "USER_MANAGER_NAME") echo "selected"; ?>>담당자</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="text" name="search_string" class="wid100p" placeholder="검색어를 입력해주세요" value="<?php echo $search_string; ?>">
											</div>
										</td>
									</tr>
                                    <tr>
                                        <th>SMS 수신</th>
                                        <td colspan="3">
                                            <div class="col-md-6">
                                                <input type="radio" id="all" name="user_sms_flag" value="" <?php if ($user_sms_flag == "") echo "checked"; ?>><label for="all"> 회원전체</label>
                                                &nbsp;&nbsp;&nbsp;
                                                <input type="radio" id="sms_send" name="user_sms_flag" value="Y" <?php if ($user_sms_flag == "Y") echo "checked"; ?>><label for="sms_send"> 수신거부회원 제의</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <button class="btn btn-primary" type="submit">검색하기</button>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

            <!-- row -->
            <div class="row">

                <!-- col 6 -->
                <div class="col-md-12">
                <!-- tile -->
                <section class="tile color transparent-black">

                    <!-- tile body -->
                    <div class="tile-body">

                        <div class="table-responsive dataTables_wrapper form-inline" role="grid" id="basicDataTable_wrapper">

                            <table class="table table-custom datatable userTable">
                            <colgroup>
                                    <col width="5%"/>
                                    <col width="10%"/>
                                    <col width="8%"/>
                                    <col width="5%"/>
                                    <col width="8%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="5%"/>
                                    <col width="5%"/>
                                    <col width="5%"/>
                                    <col width="5%"/>
                                    <col width="5%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center"><input type="checkbox" name="userall"></th>
                                    <th class="text-center">아이디</th>
                                    <th class="text-center">이름</th>
                                    <th class="text-center">회원번호</th>
                                    <th class="text-center">담당자</th>
                                    <th class="text-center">출국국가</th>
                                    <th class="text-center">출국호텔</th>
                                    <th class="text-center">연락처</th>
                                    <th class="text-center">학교/직창</th>
                                    <th class="text-center">등급</th>
                                    <th class="text-center">가입일</th>
                                    <th class="text-center">방문일</th>
                                    <th class="text-center">방문수</th>
                                    <th class="text-center"> - </th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            if (!empty($lists)) :
                                foreach ($lists as $list) :
                                    if ($list->USER_LEVEL == "2"){
                                        $user_level = "합격회원";
                                    }else if ($list->USER_LEVEL == "3"){
                                        $user_level = "특별회원";
                                    }else if ($list->USER_LEVEL == "4"){
                                        $user_level = "응시회원";
                                    }else if ($list->USER_LEVEL == "5"){
                                        $user_level = "정회원";
                                    }else if ($list->USER_LEVEL == "6"){
                                        $user_level = "탈퇴회원";
                                    }else if ($list->USER_LEVEL == "7"){
                                        $user_level = "환불회원";
                                    }else if ($list->USER_LEVEL == "8"){
                                        $user_level = "파기회원";
                                    }else if ($list->USER_LEVEL == "9"){
                                        $user_level = "일반회원";
                                    }else if ($list->USER_LEVEL == "10"){
                                        $user_level = "관심회원";
                                    }else{
                                        $user_level = "";
                                    }
                        ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="user_seq" value="<?php echo $list->USER_SEQ; ?>"></td>
                                    <td class="text-center"><a href="/admin/user/userCallMsg/<?php echo $list->USER_SEQ; ?>"><?php echo $list->USER_ID; ?></a></td>
                                    <td class="text-center"><?php echo $list->USER_NAME; ?></td>
                                    <td class="text-center"><?php echo $list->USER_NUMBER; ?></td>
                                    <td class="text-center"><?php echo $list->USER_MANAGER_NAME; ?></td>
                                    <td class="text-center"><?php echo $list->USER_LEAVE_COUNTRY; ?></td>
                                    <td class="text-center"><?php echo $list->USER_LEAVE_HOTEL; ?></td>
                                    <td class="text-center"><?php echo $list->USER_HP; ?></td>
                                    <td class="text-center"><?php echo $list->USER_COMPANY; ?></td>
                                    <td class="text-center"><?php echo $user_level; ?></td>
                                    <td class="text-center"><?php echo $list->USER_REG_DATE; ?></td>
                                    <td class="text-center"><?php echo $list->USER_LAST_LOGIN; ?></td>
                                    <td class="text-center"><?php echo $list->USER_LOGIN_CNT; ?></td>
                                    <td class="text-center">
                                        <a href="/admin/user/userModify/<?php echo $list->USER_SEQ; ?>" class="btn btn-default btn-xs">수정</a>
                                    </td>
                                </tr>
                        <?php
                                $pagenum--;
                                endforeach;
                            else :
                                echo "<tr><td colspan=\"14\" class=\"text-center\"> * 회원이 없습니다. </td></td>";
                            endif;
                        ?>
                            </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-4 sm-center">
                                    <div class="dataTables_info">
                                    <?php if ($listCount > 0) :
                                        $end = ($start+$limit)-1;
                                        if ($end > $listCount) $end = $listCount;
                                    ?>
                                        Showing <?php echo $start; ?> to <?php echo $end; ?> of <?php echo $listCount; ?> entries
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center sm-center">
                                    <div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
                                        <!--
                                        <ul class="pagination" style="margin:0 !important">
                                            <li class="prev disabled"><a href="#">Previous</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li class="next"><a href="#">Next</a></li>
                                        </ul>
                                        -->
                                        <?php echo $pagination; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 text-right">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /tile body -->

                </section>
                <!-- /tile -->

              </div>
              <!-- /col 12 -->

            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-md-12">
                    <section class="tile color transparent-black">
                        <div class="tile-body">
                            <table class="table table-custom datatable userTable">
                                <colgroup>
                                    <col width="15%"/>
                                    <col width="85%"/>
                                </colgroup>
                                <tbody>
                                    <!--
                                    <tr>
                                        <th>연락받을 번호</th>
                                        <td>
                                            <div class="col-md-12">
                                                <input name="send_phone" type="text" class="wid100p">
                                            </div>
                                        </td>
                                    </tr>
                                    -->
                                    <tr>
                                        <th>전달 SMS 메세지</th>
                                        <td colspan="3">
                                            <div class="col-md-12">
                                                <textarea name="send_message" class="wid100p"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" style="margin-top:10px;">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" id="sendSms">발송하기</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

          </div>
          <!-- /content container -->

        </div>
        <!-- Page content end -->

      </div>
      <!-- Make page fluid-->

    </div>
    <!-- Wrap all page content end -->
    <?php
        include_once dirname(__DIR__)."/admin-footer.php";
    ?>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            showMonthAfterYear: true,
            yearSuffix: '년',
            color: "black"
        });
        $(".datepicker").datepicker();


        $(document).on("click", "#sendSms", function(){
            //var sformData = $("#sform").serialize();
            var reg_date_start = $("input[name=reg_date_start]").val();
            var reg_date_end = $("input[name=reg_date_end]").val();
            var user_level = $("select[name=user_level]").val();
            var search_field = $("select[name=search_field]").val();
            var search_string = $("input[name=search_string]").val();
            var user_email_flag = $("input:checkbox[name=user_email_flag]").val();
            var send_message = $("textarea[name=send_message]").val();
            
            const user_seq_arr = []
            
            $.each($("input:checkbox[name=user_seq]"), function(){
                if ($(this).is(":checked") == true){
                    user_seq_arr.push($(this).val());
                }
            })
             
            if (send_message == ""){
                alert("메세지를 입력해주세요");
                $("textarea[name=send_message]").focus();
                return false;
            }

            if (user_seq_arr.length < 1){
                alert("SMS 발송될 회원을 선택해주세요");
                return false;
            }

            $.ajax({
                url:"/admin/user/smsSendProc",
                type:"post",
                data:{
                    "user_seq_arr" : user_seq_arr,
                    "send_message" : send_message
                },
                dataType:"json",
                success:function(resultMsg){
                    if (resultMsg.code == "200"){
                        //alert(resultMsg.msg);
                        alert("SMS 발송 완료되었습니다.")
                        //document.location.href="/admin/user/managers";
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            })
        });

        $(document).on("click", "input:checkbox[name=userall]", function(){
            var _checked = $(this).is(":checked")
            $.each($("input:checkbox[name=user_seq]"), function(){
                if (_checked == true){
                    $(this).prop("checked", true);
                }else{
                    $(this).prop("checked", false);
                }
            })
            
        });
    });
</script>
