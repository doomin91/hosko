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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>인턴쉽/유학 목록</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">유학목록</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">
            <input type='hidden' id='ctg2' name='ctg2' value="<?php echo $ctg2?>">
            <input type='hidden' id='ctg3' name='ctg3' value="<?php echo $ctg3?>">
            <input type='hidden' id='totalCount' name='totalCount' value="<?php echo $listCountAll?>">
            <form name="abroadSearchForm" id="abroadSearchForm" class="form-horizontal" method="get" role="form">
            <div class="row">
				<div class="col-md-6">
                
                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                      <table class="table datatable table-custom applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">컨텐츠분류</th>
                                    
                                        <td class="col-sm-10">
                                            <select name="ctg" class="abroad_contents_first_category  common_select search_field" >
                                                <option value="" <?php if($ctg == "") echo "selected"; ?>>:: 대분류 ::</option>
                                                <option value="1" <?php if($ctg == 1) echo "selected"; ?>>인턴쉽</option>
                                                <option value="2" <?php if($ctg == 2) echo "selected"; ?>>채용&헤드헌팅</option>
                                                <option value="3" <?php if($ctg == 3) echo "selected"; ?>>유학</option>
                                            </select>
                                            
                                            <select name="ctg2" class="abroad_contents_second_category common_select search_field">
                                                <option value="" selected>:: 중분류 ::</option>
                                            </select>
                                            <select name="ctg3" class="abroad_contents_third_category common_select search_field">
                                                <option value="" selected>:: 소분류 ::</option>
                                            </select>
                                            
                                        </td>

									</tr>
									<tr>
                                        <th class="col-sm-2">검색조건</th>
                                        <td class="col-sm-10">
                                            <select name="searchOpt" class="abroad_contents_search_option common_select">
                                                <option value="name" <?php if($searchOpt == "name") echo "selected"; ?>>컨텐츠명</option>
                                                <option value="code" <?php if($searchOpt == "code") echo "selected"; ?>>컨텐츠코드</option>
                                                <option value="company" <?php if($searchOpt == "company") echo "selected"; ?>>제조사</option>
                                            </select>
                                            <input type="text" id="abroad_contents_search_text" name="searchTxt" placeholder="검색어를 입력해주세요" value="<?php echo $searchTxt; ?>">
                                            
                                        </td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">그룹</th>
										<td class="col-sm-10">
                                            <select name="searchGrp" class="abroad_group_option common_select search_field">
                                                <option value=""  <?php if($searchGrp == "") echo "selected"; ?>>:: 그룹선택 ::</option>
                                                <option value="new" <?php if($searchGrp == "new") echo "selected"; ?>>신컨텐츠</option>
                                                <option value="best" <?php if($searchGrp == "best") echo "selected"; ?>>베스트컨텐츠</option>
                                                <option value="popular" <?php if($searchGrp == "popular") echo "selected"; ?>>인기컨텐츠</option>
                                                <option value="recommend" <?php if($searchGrp == "recommend") echo "selected"; ?>>추천컨텐츠</option>
                                                <option value="sale" <?php if($searchGrp == "sale") echo "selected"; ?>>세일컨텐츠</option>
                                            </select>
                                            <input type="submit" class="btn btn-sm btn-primary" id="abroad_search" value="검색"></input>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
                <div class="col-md-6">
                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                      <table class="table datatable table-custom applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">쿠폰적용</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-3">
                                                <select name="coupon" class="common_select search_field">
                                                    <option value=""  <?php if($coupon == "") echo "selected"; ?>>:: 선택 ::</option>
                                                    <option value="Y" <?php if($coupon == "Y") echo "selected"; ?>>예</option>
                                                    <option value="N" <?php if($coupon == "N") echo "selected"; ?>>아니오</option>
                                                </select>
                                            </div>
										</td>
									</tr>
									<tr>
										<th class="col-sm-2">진열여부</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-3">
                                                <select name="display" class="abroad_display_option common_select search_field">
                                                    <option value=""  <?php if($display == "") echo "selected"; ?>>:: 선택 ::</option>
                                                    <option value="Y" <?php if($display == "Y") echo "selected"; ?>>진열함</option>
                                                    <option value="N" <?php if($display == "N") echo "selected"; ?>>진열안함</option>
                                                </select>
                                            </div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			<!-- /row -->
            </form>			

			<!-- row -->
			<div class="row">

				<!-- col 6 -->
				<div class="col-md-12">
				<!-- tile -->
				<section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">

						<div class="table-responsive dataTables_wrapper form-inline" role="grid" id="basicDataTable_wrapper">
							<div class="row">
								<div class="col-md-8">총 컨텐츠수 : <?php echo $listCountAll?> &nbsp&nbsp&nbsp 검색 컨텐츠수 : <?php echo $listCount ?></div>
                                <div class="col-md-4 text-right">
                                    <!-- <input type="button" id="abroad_excel_register" class="btn btn-xs btn-default" value="+ 엑셀일괄등록">
									<input type="button" id="abroad_excel_save" class="btn btn-xs btn-default" value="+ 엑셀파일저장"> -->
                                    <a href="/admin/recruit/recruit_abroad_new" id="abroad_register" name="abroad_register" class="btn btn-xs btn-default">+ 컨텐츠등록</a>
								</div>
							</div>

                            <table class="table datatable table-custom01 applyTopViewTable">

							<colgroup>
									<col width="5%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="35%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox" id="abroad_select_all"></th>
									<th class="text-center">컨텐츠코드</th>
									<th class="text-center"></th>
									<th class="text-center">컨텐츠명</th>
									<th class="text-center">컨텐츠가격</th>
                                    <th class="text-center">재고</th>
									<th class="text-center">진열순서</th>
									<th class="text-center">기능</th>
									
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)) :
								foreach ($lists as $key => $list) : 
									
						?>
								<tr>
									<td class="text-center"><input type="checkbox" name="abroad_select" value=<?php echo $list->REC_SEQ?>></td>
									<td class="text-center"><?php echo $list->REC_SEQ ?></td>
                                    <td class="text-center">
                                        <?php if($list->REC_THUMBNAIL_R): ?>
                                            <img src="<?php echo $list->REC_THUMBNAIL_R ?>">
                                        <?php endif?>
                                    </td>
                                    <td class="text-center"><a href="/admin/recruit/recruit_abroad_edit/<?php echo $list->REC_SEQ ?>"><?php echo $list->REC_TITLE ?></a></td>
                                    <td class="text-center"><?php echo $list->REC_PAY ?></td>
                                    <td class="text-center"><?php echo $list->REC_COUNT ?></td>
                                    <td class="text-center"><span class="recruit_abroad_display_up" data-prev="<?php $key>0 ? print($lists[$key-1]->REC_SEQ) : "" ?>" data-seq="<?php echo $list->REC_SEQ?>" data-order="<?php echo $list->REC_DISPLAY_ORDER?>"> 위 </span><span class="recruit_abroad_display_down" data-after="<?php count($lists)-1>$key ? print($lists[$key+1]->REC_SEQ) : "" ?>" data-seq="<?php echo $list->REC_SEQ?>" data-order="<?php echo $list->REC_DISPLAY_ORDER?>"> 아래 </span></td>
                                    <td class="text-center">
                                        <a href ="/admin/recruit/recruit_abroad_edit/<?php echo $list->REC_SEQ?>" class="btn btn-xs btn-default">수정</a>
                                        <input type="button" data-seq="<?php echo $list->REC_SEQ?>" class="btn btn-xs btn-danger recruit_abroad_del" value="삭제">
                                        <input type="button" data-seq="<?php echo $list->REC_SEQ?>" class="btn btn-xs btn-primary recruit_abroad_copy" value="복사">
                                    </td>
								</tr>
						<?php
								$pagenum--;
								endforeach;
							else :
								echo "<tr><td colspan=\"14\" class=\"text-center\"> * 신청서가 없습니다. </td></td>";
							endif;
						?>
							</tbody>
							</table>

							<div class="row">
                                <div class="col-md-4 text-left">
                                    <input type="button" id="selected_abroad_del" class="btn btn-xs btn-default" value="- 선택삭제">
                                    <!-- <input type="button" id="selected_abroad_move" class="btn btn-xs btn-default" value="+ 컨텐츠이동"> -->
                                    <input type="button" id="selected_abroad_copy" class="btn btn-xs btn-default" value="+ 컨텐츠복사">
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
                                <div class="col-md-4 text-right sm-center">
									<div class="dataTables_info">
									<?php if ($listCount > 0) :
										$end = ($start+$limit)-1;
										if ($end > $listCount) $end = $listCount;
									?>
										Showing <?php echo $start; ?> to <?php echo $end; ?> of <?php echo $listCount; ?> entries
									<?php endif; ?>
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
	<?php
		include_once dirname(__DIR__)."/admin-footer.php";
	?>

    <script>
        $(function(){
            var ctg = $("select[name=ctg] option:selected").val();
            var ctg2 = $("input[name=ctg2]").val();
            var ctg3 = $("input[name=ctg3]").val();
            var searchOpt = $("select[name=searchOpt] option:selected").val();
            var searchTxt = $("input[name=searchTxt] option:selected").val();
            var searchGrp =$("select[name=searchGrp] option:selected").val();
            var coupon = $("select[name=coupon] option:selected").val();
            var dispaly = $("select[name=dispaly] option:selected").val();
            var ctg2Html = "";
            var ctg3Html = "";
            // var queryString = "?ctg="+ctg+"&ctg2"+ctg2+"&ctg3"+ctg3+"&searchOpt"+searchOpt+"&searchGrp"+searchGrp+"&coupon"+coupon+"&dispaly"+dispaly;
            console.log(ctg);
            if(ctg == ""){
                ctg2Html = ""
                        + "<option value=\"\">:: 중분류 ::</option>";
            }else if(ctg == 1){
                ctg2Html = ""
                        + "<option value=\"\">:: 중분류 ::</option>"
                        + "<option value=\"10\">해외호텔 인턴쉽</option>"
                        + "<option value=\"11\">해외 외식전문 인턴쉽</option>"
                        + "<option value=\"12\">국내호텔 인턴쉽</option>";

            }else if(ctg == 2){
                ctg2Html = ""
                        + "<option value=\"\">:: 중분류 ::</option>"
                        + "<option value=\"20\">Job</option>"
                        + "<option value=\"21\">Headhunting</option>";

            }else if(ctg == 3){
                ctg2Html = ""
                        + "<option value=\"\">:: 중분류 ::</option>"
                        + "<option value=\"30\">영어권유학</option>"
                        + "<option value=\"31\">일본어 및 기타국가 유학</option>"
                        + "<option value=\"32\">해외추업교육과정</option>"
                        + "<option value=\"33\">EMT 영어캠프</option>";
            }
            $("select[name=ctg2]").html(ctg2Html);
            $("select[name=ctg2] option[value='"+ctg2+"']").attr("selected", 'selected');

            if(ctg2 == ""){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>";
            }else if(ctg2 == 10){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>"
                        + "<option value=\"100\">호텔 인턴 및 직원 채용</option>"
                        + "<option value=\"101\">조리인턴 및 직원 채용</option>"
                        + "<option value=\"102\">Management Trainee</option>";
                        + "<option value=\"103\">기타</option>";
            }else if(ctg2 == 11){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>"
                        + "<option value=\"110\">호텔 인턴 및 직원 채용</option>"
                        + "<option value=\"111\">조리인턴 및 직원 채용</option>"
                        + "<option value=\"112\">기타</option>";
            }else if(ctg2 == 12){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>"
                        + "<option value=\"120\">호텔 인턴 및 직원 채용</option>"
                        + "<option value=\"121\">조리인턴 및 직원 채용</option>"
                        + "<option value=\"122\">기타</option>";
            }else if(ctg2 == 20){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>"
                        + "<option value=\"200\">국내호텔 직원 채용</option>"
                        + "<option value=\"201\">해외취업</option>"
                        + "<option value=\"202\">유학+취업프로그램</option>"
                        + "<option value=\"203\">크루즈</option>";
            }else if(ctg2 == 21){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>"
                        + "<option value=\"210\">호스코 귀국 회원 채용 정보</option>"
                        + "<option value=\"211\">호텔 및 기타 헤드헌팅</option>";
            }else if(ctg2 == 30){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>";
            }else if(ctg2 == 31){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>";
            }else if(ctg2 == 32){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>";
            }else if(ctg2 == 33){
                ctg3Html = ""
                        + "<option value=\"\">:: 소분류 ::</option>";
            }
            $("select[name=ctg3]").html(ctg3Html);
            $("select[name=ctg3] option[value='"+ctg3+"']").attr("selected", 'selected');


            $(".search_field").on("change", function(){
                console.log($(this));
                var selectedValue = $(this).val();
                if($(this).is(".abroad_contents_first_category")){
                    $("select[name=ctg2] option[value='']").attr("selected", 'selected');
                    $("select[name=ctg3] option[value='']").attr("selected", 'selected');
                }else if($(this).is(".abroad_contents_second_category")){
                    $("select[name=ctg3] option[value='']").attr("selected", 'selected');
                }else if($(this).is(".abroad_contents_third_category")){
                    // if(selectedValue == ""){
                    // }
                }
                $('#abroadSearchForm').attr('action','recruit_abroad_list').submit();
            });

            $("#abroad_select_all").on("change", function(){
                var selects = $("input[name=abroad_select]");

                if($(this).is(":checked")){
                    console.log("지금체크");
                    $.each(selects, function(index, element){
                        $(element).prop("checked", true);
                    });
                }else{
                    console.log("지금체크품");
                    $.each(selects, function(index, element){
                        $(element).prop("checked", false);
                    });
                }
            });

            $("#selected_abroad_del").on("click", function(){
                var selected = $("input[name=abroad_select]:checked");
                var seqs = [];

                selected.each(function(index, element){
                    seqs.push($(this).val());
                })
                console.log(seqs);

                if(seqs.length == 0){
					alert("삭제할 목록을 선택해주세요");
					return false;
				}
                
                if(confirm("정말 모두 삭제하시겠습니까?")){
                    $.ajax({
                        url : "/admin/recruit/recruit_abroads_del",
                        type : "post",
                        data : {
                            "SEQ" : seqs
                        },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("삭제되었습니다.");
                                alert("삭제되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(){
                            console.log("삭제할 수 없습니다.");
                        }
                    });
                }
            });

            $("#selected_abroad_move").on("click", function(){
                alert("테스트 선택 이동");
            });

            $("#selected_abroad_copy").on("click", function(){
                var selected = $("input[name=abroad_select]:checked");
                var seqs = [];

                selected.each(function(index, element){
                    seqs.push($(this).val());
                })

                if(seqs.length == 0){
                    alert("복사할 컨텐츠를 선택해주세요");
                    return false;
                }

                if(confirm("선택한 컨텐츠를 복사하시겠습니까?")){
                    $.ajax({
                        url : "/admin/recruit/recruit_abroads_copy",
                        type : "post",
                        data : {
                            "SEQ" : seqs
                        },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("복사되었습니다.");
                                alert("복사되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(){
                            console.log("삭제할 수 없습니다.");
                        }
                    });
                }
            });

            $("#abroad_excel_register").on("click", function(){
                alert("테스트 엑셀일괄등록");
            });

            $("#abroad_excel_save").on("click", function(){
                alert("테스트 엑셀저장");
            });

            $(".recruit_abroad_del").on("click", function(){
                var ABROAD_SEQ = $(this).data("seq");
                console.log(ABROAD_SEQ);
                if(confirm("삭제하시겠습니까?")){
                
                    $.ajax({
                        url : "/admin/recruit/recruit_abroad_del/"+ABROAD_SEQ,
                        type : "get",
                        // data : {
                        //     "ABROAD_SEQ" : ABROAD_SEQ
                        // },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("삭제되었습니다.");
                                alert("삭제되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(){
                            console.log("삭제할 수 없습니다.");
                        }
                    });
                }
            });

            $(".recruit_abroad_copy").on("click", function(){
                var ABROAD_SEQ = $(this).data("seq");
                console.log(ABROAD_SEQ);
                if(confirm("복사하시겠습니까?")){
                
                    $.ajax({
                        url : "/admin/recruit/recruit_abroad_copy/"+ABROAD_SEQ,
                        type : "get",
                        // data : {
                        //     "ABROAD_SEQ" : ABROAD_SEQ
                        // },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("복사되었습니다.");
                                alert("복사되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(e){
                            console.log(e.responseText);
                            // console.log(Object.values(e.responseText));
                        }
                    });
                }
            });

            $('#apply_start_date').datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                closeText:'취소',
                //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
                showButtonPanel:true,
                beforeShow: function(input) {
                    var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                    setTimeout(function(){
                        $('#ui-datepicker-div').css({'top':i_offset.top, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                    })
                },
                onClose: function( selectedDate ) {    
                    // 시작일(fromDate) datepicker가 닫힐때
                    // 종료일(toDate)의 선택할수있는 최소 날짜(minDate)를 선택한 시작일로 지정
                    $("#p_end_date").datepicker( "option", "minDate", selectedDate );
                }                
            });

            //종료일
            $('#apply_end_date').datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                closeText:'취소',
                //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
                showButtonPanel:true,
                beforeShow: function(input) {
                    var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                    setTimeout(function(){
                        $('#ui-datepicker-div').css({'top':i_offset.top, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                    })
                },
                onClose: function( selectedDate ) {
                    // 종료일(toDate) datepicker가 닫힐때
                    // 시작일(fromDate)의 선택할수있는 최대 날짜(maxDate)를 선택한 종료일로 지정 
                    $("#p_start_date").datepicker( "option", "maxDate", selectedDate );
                }                
            });

            $(".recruit_abroad_display_up").on("click", function(){
                const RecruitSeq = $(this).data("seq");
                const RecruitDisplayOrder = $(this).data("order");
                const RecruitPrevSeq = $(this).data("prev");

                if(RecruitDisplayOrder == 1){
                    alert("가장 상단의 컨텐츠입니다");
                    return false;
                }
                // console.log(RecruitSeq);
                // return 0;
                $.ajax({
                        url : "/admin/recruit/recruit_abroad_display_up",
                        type : "post",
                        data : {
                            "RecruitSeq" : RecruitSeq,
                            "RecruitDisplayOrder" : RecruitDisplayOrder,
                            "RecruitPrevSeq" : RecruitPrevSeq
                        },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(e){
                            console.log(e.responseText);
                            // console.log(Object.values(e.responseText));
                        }
                    });
            })

            $(".recruit_abroad_display_down").on("click", function(){
                const RecruitSeq = $(this).data("seq");
                const RecruitDisplayOrder = $(this).data("order");
                const TotalCount = $("input[name=totalCount]").val();
                const RecruitAfterSeq = $(this).data("after");
                if(RecruitDisplayOrder == TotalCount){
                    alert("가장 하단의 컨텐츠입니다.");
                    return false;
                }
                
                // console.log(RecruitDisplayOrder);
                // console.log(TotalCount);
                // return 0;
                $.ajax({
                        url : "/admin/recruit/recruit_abroad_display_down",
                        type : "post",
                        data : {
                            "RecruitSeq" : RecruitSeq,
                            "RecruitDisplayOrder" : RecruitDisplayOrder,
                            "RecruitAfterSeq" : RecruitAfterSeq
                        },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(e){
                            console.log(e.responseText);
                            // console.log(Object.values(e.responseText));
                        }
                    });
            })

        });
    </script>
    <style>
        .common_select{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }
        #abroad_contents_search_text{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }
        #abroad_search{
            padding: 4px 10px;
        }

        #apply_search{
            padding: 4px 10px;
        }
        
    </style>
</body>
</html>


