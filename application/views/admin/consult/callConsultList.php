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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>전화상담이력</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">상담관리</a></li>
				<li class="active">전화상담이력</li>
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
                                <form name="sform"  method="get" action="/admin/consult/callConsultList">
                                    <tr>
										<th>날자</th>
										<td>
											<div class="col-md-5">
												<input name="reg_date_start" type="text" class="wid100p datepicker" value="<?php echo $reg_date_start; ?>">
											</div>
											<div class="col-md-5">
												<input name="reg_date_end" type="text" class="wid100p datepicker" value="<?php echo $reg_date_end; ?>">
											</div>
										</td>
                                        <td colspan="2"></td>
									</tr>
									<tr>
										<th>단어검색</th>
										<td colspan="3">
											<div class="col-md-2">
												<select name="search_field" class="wid100p">
													<option value="all">전체</option>
													<option value="CLOG_MANAGER_NAME" <?php if ($search_field == "CLOG_MANAGER_NAME") echo "selected"; ?>>상담자</option>
													<option value="CLOG_USER_NAME" <?php if ($search_field == "CLOG_USER_NAME") echo "selected"; ?>>회원명</option>
													<option value="CLOG_USER_COMPANY" <?php if ($search_field == "CLOG_USER_COMPANY") echo "selected"; ?>>학교</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="text" name="search_string" class="wid100p" placeholder="검색어를 입력해주세요" value="<?php echo $search_string; ?>">
											</div>
										</td>
									</tr>
                                    <tr>
                                        <td colspan="4" class="text-right" style="padding-right:10px">
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
                    <div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
                      <table class="table datatable table-custom01 userTable">

							<colgroup>
                                    <col width="4%"/>
									<col width="6%"/>
									<col width="6%"/>
                                    <col width="6%"/>
                                    <col width="8%"/>
                                    <col width="6%"/>
                                    <col width="31%"/>
                                    <col width="4%"/>
                                    <col width="4%"/>
									<col width="4%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">날짜</th>
									<th class="text-center">상담자</th>
									<th class="text-center">회원명</th>
									<th class="text-center">학교명/직장명</th>
									<th class="text-center">회원번호</th>
                                    <th class="text-center">내용</th>
									<th class="text-center">관심도</th>
									<th class="text-center">외국어</th>
									<th class="text-center"> - </th>
								</tr>
							</thead>
							<tbody>
                            <?php
                            if (!empty($lists)){
                                foreach ($lists as $lt){
                                    if ($lt->CLOG_INTEREST == "1"){
                                        $interest = "상";
                                    }else if ($lt->CLOG_INTEREST == "2"){
                                        $interest = "중";
                                    }else if ($lt->CLOG_INTEREST == "3"){
                                        $interest = "하";
                                    }
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $pagenum; ?></td>
                                    <td class="text-center"><?php echo $lt->CLOG_REG_DATE; ?></td>
                                    <td class="text-center"><?php echo $lt->CLOG_MANAGER_NAME; ?></td>
                                    <td class="text-center"><?php echo $lt->CLOG_USER_NAME; ?></td>
                                    <td class="text-center"><?php echo $lt->CLOG_USER_COMPANY; ?></td>
                                    <td class="text-center"><?php echo $lt->CLOG_USER_NUM; ?></td>
                                    <td class="text-center" style="word-break: break-all; white-space: pre-line"><?php echo $lt->CLOG_MESSAGE; ?></td>
                                    <td class="text-center"><?php echo $interest; ?></td>
                                    <td class="text-center"><?php echo $lt->CLOG_LANG_SKILL; ?>점</td>
                                    <td class="text-center">
                                        <button class="btn btn-default btn-xs clogView" data-seq="<?php echo $lt->CLOG_SEQ; ?>">보기</button>
                                        <button class="btn btn-danger btn-xs clogDel" data-seq="<?php echo $lt->CLOG_SEQ; ?>">삭제</button>
                                    </td>
                                </tr>
                            <?php
                                    $pagenum--;
                                }
                            }else{
                                echo "<tr><td colspan=\"10\" align=\"center\"> 회원 통화내역이 없습니다. </td></tr>";
                            }
                            ?>
							</tbody>
							</table>

							<div class="row">
								<div class="col-md-12 text-center sm-center">
									<div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
										<?php  echo $pagination; ?>
									</div>
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

		  </div>
		  <!-- /content container -->

		</div>
		<!-- Page content end -->

	  </div>
	  <!-- Make page fluid-->

	</div>
	<!-- Wrap all page content end -->

    <!-- 모달 팝업 -->
	<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
					<h3 class="modal-title" id="modalConfirmLabel">회원 통화내역 저장</h3>
				</div>
				<div class="modal-body">
					<form role="wform" id="wform">
                        <input type="hidden" name="user_seq" value="">
                        <input type="hidden" name="clog_seq" value="">
                        <input type="hidden" name="clog_mode" value="">
					<table class="table datatable table-custom01 userTable">
                        <colgroup>
                            <col width="30%"/>
						    <col width="70%"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>상담자</td>
                                <td><input type="text" class="form-control" id="manager_name" name="manager_name" value="<?php echo $this->session->userdata("admin_name"); ?>"></td>
                            </tr>
                            <tr>
                                <th>회원명</td>
                                <td><input type="text" class="form-control" id="user_name" name="user_name" value=""></td>
                            </tr>
                            <tr>
                                <th>학교명/직장명</td>
                                <td><input type="text" class="form-control" id="user_company" name="user_company" value=""></td>
                            </tr>
                            <tr>
                                <th>상담날짜</td>
                                <td>
                                    <input name="consult_date" id="consult_date" type="text" class="wid100p datepicker">
                                </td>
                            </tr>
                            <tr>
                                <th>내용</td>
                                <td><textarea class="form-control" id="call_message" name="call_message"></textarea></td>
                            </tr>
                            <tr>
                                <th>관심도</td>
                                <td>
                                    <select name="interest">
                                        <option value="1">상</option>
                                        <option value="2">중</option>
                                        <option value="3">하</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>외국어 능력</td>
                                <td>
                                    <select name="lang_skill">
                                        <option value="1">1점</option>
                                        <option value="2">2점</option>
                                        <option value="3">3점</option>
                                        <option value="4">4점</option>
                                        <option value="5">5점</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
					<button id="saveMessage" class="btn btn-green">저장하기</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

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
	        color: "black",
            zindex: "20000"
	    });
		$(".datepicker").datepicker();
        console.log("ASDFASDFASDF");
        $(document).on("click", "#writeMsg", function(){
            $('#wform')[0].reset();
            $("#modalMessage").modal("show");
        });

        $(document).on("click", "#saveMessage", function(){
            var manager_name = $("input[name=manager_name]").val();
            var user_seq = $("input[name=user_seq]").val();
            var user_name = $("input[name=user_name]").val();
            var user_company = $("input[name=user_company]").val();
            var call_message = $("textarea[name=call_message]").val();
            var consult_date = $("input[name=consult_date]").val();
            var interest = $("select[name=interest]").val();
            var lang_skill = $("select[name=lang_skill]").val();
            var clog_seq = $("input[name=clog_seq]").val();
            var clog_mode = $("input[name=clog_mode]").val();

            $.ajax({
                url:"/admin/user/userCallMsgProc",
                type:"post",
                data:{
                    "manager_name" : manager_name,
                    "user_seq" : user_seq,
                    "user_name" : user_name,
                    "user_company" : user_company,
                    "call_message" : call_message,
                    //"consult_date" : consult_year + "-" + numLneCheck(consult_month) + "-" + numLneCheck(consult_day),
                    "consult_date" : consult_date,
                    "interest" : interest,
                    "lang_skill" : lang_skill,
                    "clog_seq" : clog_seq,
                    "clog_mode" : clog_mode
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);

                    if (resultMsg.code == "200"){
                        alert(resultMsg.msg);
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

        $(document).on("click", ".clogView", function(){
            var seq = $(this).data("seq");

            $.ajax({
                url:"/admin/user/getCallMsg",
                type:"post",
                data:{
                    "clog_seq" : seq
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        //alert(resultMsg.msg);
                        //document.location.reload();
                        var result = resultMsg.result;

                        $("input[name=manager_name]").val(result.CLOG_MANAGER_NAME);
                        $("input[name=user_name]").val(result.CLOG_USER_NAME);
                        $("input[name=user_company]").val(result.CLOG_USER_COMPANY);
                        $("input[name=consult_date]").val(result.CLOG_CONSULT_DATE);
                        $("textarea[name=call_message]").val(result.CLOG_MESSAGE);
                        $("select[name=interest]").val(result.CLOG_INTEREST);
                        $("select[name=lang_skill]").val(result.CLOG_LANG_SKILL);
                        $("input[name=clog_seq]").val(result.CLOG_SEQ);
                        $("input[name=clog_mode]").val("modify");
                        $("#modalMessage").modal("show");
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            })
        })

        $(document).on("click", ".clogDel", function(){
             var seq = $(this).data("seq");

            if (confirm("통화내역을 삭제하시겠습니까?")){
                $.ajax({
                    url:"/admin/user/deleteCallMsg",
                    type:"post",
                    data:{
                        "clog_seq" : seq
                    },
                    dataType:"json",
                    success:function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert("삭제 완료되었습니다.");
                            document.location.reload();
                        }else{
                            alert(resultMsg.msg);
                        }
                    },
                    error:function(e){
                        console.log(e.responseText);
                    }
                })
            }
        });

        function numLneCheck(num){
            if (parseInt(num) < 10){
                num = "0"+num;
            }

            return num;
        }
	});
</script>
