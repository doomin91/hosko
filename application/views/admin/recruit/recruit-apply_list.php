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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>수속신청현황</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">수속신청현황</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">
		  	<form name="applySearchForm" id="applySearchForm" class="form-horizontal" method="get" role="form">
			<div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTable">
								<tbody>
									<tr>
										<th class="col-sm-2">진행상태</th>
										<input type="hidden" name="apply_status" id="apply_status" value="<?php echo $status?>">
										<td class="col-sm-10">
                                            <span class="status_option <?php if($status==0) echo "active"?>" data-val="0">전체</span>
                                            <span class="status_option <?php if($status==1) echo "active"?>" data-val="1">온라인상담</span>
                                            <span class="status_option <?php if($status==2) echo "active"?>" data-val="2">지원</span>
                                            <span class="status_option <?php if($status==3) echo "active"?>" data-val="3">지원서류제출</span>
                                            <span class="status_option <?php if($status==4) echo "active"?>" data-val="4">비용입금</span>
                                            <span class="status_option <?php if($status==5) echo "active"?>" data-val="5">서류전형</span>
                                            <span class="status_option <?php if($status==6) echo "active"?>" data-val="6">인터뷰준비</span>
                                            <span class="status_option <?php if($status==7) echo "active"?>" data-val="7">인터뷰</span>
                                            <span class="status_option <?php if($status==8) echo "active"?>" data-val="8">합격공지</span>
                                            <span class="status_option <?php if($status==9) echo "active"?>" data-val="9">출국준비</span>
                                            <span class="status_option <?php if($status==10) echo "active"?>" data-val="10">소양교육</span>
                                            <span class="status_option <?php if($status==11) echo "active"?>" data-val="11">출국</span>
                                        </td>
									</tr>
									<tr>
										<th class="col-sm-2">기간</th>
										<input type="hidden" name="apply_date" id="apply_date" value="">
										<td class="col-sm-10">
                                            <input type="text" id="apply_start_date" name="apply_start_date" class="date_field" value="<?php echo $startDate?>">
                                            ~
                                            <input type="text" id="apply_end_date" name="apply_end_date" class="date_field" value="<?php echo $endDate?>">
                                                
                                            <span class="date_option today <?php if($searchDate=="today") echo "active"?>" data-val="today">오늘</span>
                                            <span class="date_option yesterday <?php if($searchDate=="yesterday") echo "active"?>" data-val="yesterday">어제</span>
                                            <span class="date_option week <?php if($searchDate=="week") echo "active"?>" data-val="week">1주일</span>
                                            <span class="date_option month <?php if($searchDate=="month") echo "active"?>" data-val="month">1개월</span>
										</td>
									</tr>
									<tr>
                                        <th class="col-sm-2">조건검색</th>
										<td class="col-sm-10">
                                            <select name="apply_search_option" class="apply_search_option">
                                                <option value="title"  <?php if($searchOption=="title") echo "selected"?>>지원프로그램</option>
                                                <option value="name" <?php if($searchOption=="name") echo "selected"?>>성명</option>
                                                <option value="id" <?php if($searchOption=="id") echo "selected"?>>아이디</option>
                                            </select>
                                            <input type="text" id="apply_search_text" name="apply_search_text" placeholder="검색어를 입력해주세요" value="">

                                            <input type="submit" class="btn btn-sm btn-primary" id="apply_search" value="검색"></input>
                                            
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
			</form>
			<!-- row -->
			<div class="row">

				<!-- col 6 -->
				<div class="col-md-12">
				<!-- tile -->
				<section class="tile transparent">

					<!-- tile body -->
					<div class="tile-body color transparent-black rounded-corners">

						<div class="table-responsive dataTables_wrapper form-inline" role="grid" id="basicDataTable_wrapper">
							<div class="row">
								<div class="col-md-10">총 컨텐츠수 : <?php echo $listCountAll?> &nbsp&nbsp&nbsp 검색 컨텐츠수 : <?php echo $listCount ?></div>
                                <div class="col-md-2 text-right">
									<input type="button" id="apply_excel_save" class="btn btn-xs btn-default" value="+ 엑셀파일저장">
								</div>
							</div>

							<table class="table table-custom dataTable">
							<colgroup>
									<col width="5%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="20%"/>
									<col width="10%"/>
									<col width="10%"/>
									<col width="15%"/>
									<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox" id="apply_select_all"></th>
									<th class="text-center">성명</th>
									<th class="text-center">아이디</th>
									<th class="text-center">지원프로그램</th>
									<th class="text-center">금액</th>
									<th class="text-center">지원일</th>
									<th class="text-center">상태</th>
									<th class="text-center">기능</th>
									
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)) :
								foreach ($lists as $list) :
						?>
								<tr>
									<td class="text-center"><input type="checkbox" name="apply_select" value=<?php echo $list->APP_SEQ?>></td>
									<td class="text-center"><?php echo $list->USER_NAME ?></td>
                                    <td class="text-center"><?php echo $list->USER_ID ?></td>
                                    <td class="text-center"><?php echo $list->REC_TITLE ?></td>
                                    <td class="text-center"><?php echo $list->REC_PAY ?></td>
                                    <td class="text-center"><?php echo $list->APP_REG_DATE ?></td>
                                    <td class="text-center">
										<select class="apply_status">
											<option value="1" <?php if($list->APP_STATUS==1) echo "selected"?>>온라인상담</option>
											<option value="2" <?php if($list->APP_STATUS==2) echo "selected"?>>지원</option>
											<option value="3" <?php if($list->APP_STATUS==3) echo "selected"?>>지원서류제출</option>
											<option value="4" <?php if($list->APP_STATUS==4) echo "selected"?>>비용입금</option>
											<option value="5" <?php if($list->APP_STATUS==5) echo "selected"?>>서류전형</option>
											<option value="6" <?php if($list->APP_STATUS==6) echo "selected"?>>인터뷰준비</option>
											<option value="7" <?php if($list->APP_STATUS==7) echo "selected"?>>인터뷰</option>
											<option value="8" <?php if($list->APP_STATUS==8) echo "selected"?>>합격공지</option>
											<option value="9" <?php if($list->APP_STATUS==9) echo "selected"?>>출국준비</option>
											<option value="10" <?php if($list->APP_STATUS==10) echo "selected"?>>소양교육</option>
											<option value="11" <?php if($list->APP_STATUS==11) echo "selected"?>>출국</option>
										</select>

										<input type="button" class="btn btn-sm btn-success" id="apply_status_save" data-seq="<?php echo $list->APP_SEQ ?>" value="적용"></input>
									</td>
									
                                    <td class="text-center"><a href ="/admin/recruit/recruit_apply_view/<?php echo $list->APP_SEQ?>" class="btn btn-sm btn-default">상세보기</a></td>
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
                                    <input type="button" id="selected_apply_del" class="btn btn-xs btn-default" value="- 선택삭제">
                                    <input type="button" id="selected_apply_save" class="btn btn-xs btn-default" value="+ 선택일괄적용">
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
                    $("#apply_end_date").datepicker( "option", "minDate", selectedDate );
                },
				onSelect: function( dateText, inst) {
					$(".date_option.active").removeClass("active");
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
                    $("#apply_start_date").datepicker( "option", "maxDate", selectedDate );
                },
				onSelect: function( dateText, inst) {
					$(".date_option.active").removeClass("active");
                }                
            });

            $(".applyTable").on("click", ".status_option", function(){
                var row = $(this).closest("td");
                console.log(row);

                $(row).find(".status_option.active").removeClass("active");

                $(this).addClass("active");

				$("input[name=apply_status]").val($(this).data("val"));
				console.log($("input[name=apply_status]").val());
            });

            $(".applyTable").on("click", ".date_option", function(){
                var row = $(this).closest("td");
                console.log(row);

                $(row).find(".date_option.active").removeClass("active");

                $(this).addClass("active");

				$("input[name=apply_date]").val($(this).data("val"));
				console.log($("input[name=apply_date]").val());

				var date = new Date();
				var today = date.getFullYear()+'-'+("0" + (1 + date.getMonth())).slice(-2)+'-'+("0" + date.getDate()).slice(-2);
				var str = "";
				if($(this).is(".today")){
					str = today;
					$('#apply_start_date').val(str);
				}else if($(this).is(".yesterday")){
					var yesterday = new Date(date.setDate(date.getDate()-1));
					str = yesterday.getFullYear()+'-'+("0" + (1 + yesterday.getMonth())).slice(-2)+'-'+("0" + yesterday.getDate()).slice(-2);
					$('#apply_start_date').val(str);
				}else if($(this).is(".week")){
					var week = new Date(date.setDate(date.getDate()-7));
					str = week.getFullYear()+'-'+("0" + (1 + week.getMonth())).slice(-2)+'-'+("0" + week.getDate()).slice(-2);
					$('#apply_start_date').val(str);
				}else if($(this).is(".month")){
					var month = new Date(date.setDate(date.getDate()-30));
					str = month.getFullYear()+'-'+("0" + (1 + month.getMonth())).slice(-2)+'-'+("0" + month.getDate()).slice(-2);
					$('#apply_start_date').val(str);
				}
				console.log(str);

				if($(this).is(".yesterday")){
					$('#apply_end_date').val(str);
				}else{
					$('#apply_end_date').val(today);
				}
            });

            // $("#apply_search_text").on("keypress", function(e){
            //     var key = e.which;
                
            //     if (key == 13){
            //         $("#apply_search").click();
            //     }
            // });

            // $("#apply_search").on("click", function(){
            //     var row = $(this).closest("td");
            //     var input = $(row).find("#apply_search_text").val();

			// 	var APPLY_STATUS = $(".status_option.active").data("val");
			// 	var START_DATE = $("input[name=apply_start_date]").val();
			// 	var END_DATE = $("input[name=apply_end_date]").val();
			// 	var date_option = $(".date_option.active");
			// 	var SEARCH_OPTION = $(".apply_search_option option:selected").val();
			// 	console.log(APPLY_STATUS);
			// 	console.log(SEARCH_OPTION);

            // });

            $("#apply_excel_save").on("click", function(){
                alert("엑셀 따운");
            });

			$("#apply_select_all").on("change", function(){
                var selects = $("input[name=apply_select]");

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

            $("#selected_apply_del").on("click", function(){
                var selected = $("input[name=apply_select]:checked");
                var seqs = [];

                selected.each(function(index, element){
                    seqs.push($(this).val());
                })
                console.log(seqs);

                if(seqs.length == 0){
					alert("신청서를 선택해주세요");
					return false;
				}
                
                if(confirm("정말 모두 삭제하시겠습니까?")){
                    $.ajax({
                        url : "/admin/recruit/recruit_applies_del",
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
                        error : function(e){
							console.log(e.responseText);
                            // console.log("삭제할 수 없습니다.");
                        }
                    });
                }
            });

			$("#selected_apply_save").on("click", function(){
				var SELECTED = $("input[name=apply_select]:checked");
                var SEQ = [];
				var STATUS = [];

                SELECTED.each(function(index, element){
                    SEQ.push($(this).val());
					var OPTIONS = $(element).closest("tr").find("option");
					$.each(OPTIONS, function(index, element){
						if(element.selected){
							STATUS.push($(element).val());
						}
					});
					console.log(STATUS);

					// console.log($(element).closest("tr").find("option"));
                })
                console.log(SEQ);
				if(confirm("일괄 변경 하시겠습니까?")){
                    $.ajax({
                        url : "/admin/recruit/update_recruits_status",
                        type : "post",
                        data : {
                            "APP_SEQ": SEQ,
							"APP_STATUS": STATUS
                        },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("수정되었습니다.");
                                alert("수정되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(e){
							console.log(e.responseText);
                            // console.log("삭제할 수 없습니다.");
                        }
                    })
				}
			});

			$("#apply_status_save").on("click", function(){
				var APP_SEQ = $(this).data("seq");
				var OPTIONS = $(this).prev().find("option");
				var APP_STATUS = "";
				$.each(OPTIONS, function(index, element){
					if(element.selected){
						APP_STATUS = $(element).val();
					}
				});

				if(confirm("변경 하시겠습니까?")){
                    $.ajax({
                        url : "/admin/recruit/update_recruit_status",
                        type : "post",
                        data : {
                            "APP_SEQ": APP_SEQ,
							"APP_STATUS": APP_STATUS
                        },
                        dataType : "json",
                        success : function(resultMsg){
                            if(resultMsg.code == 200){
                                console.log("수정되었습니다.");
                                alert("수정되었습니다.");
                                location.reload();
                            }else{
                                alert(resultMsg.msg)
                            }
                        },
                        error : function(e){
							console.log(e.responseText);
                            // console.log("삭제할 수 없습니다.");
                        }
                    })
				}

			});


        });
    </script>
    <style>
        .ui-datepicker-month, .ui-datepicker-year{
            color: black;
        }
        .ui-state-default {
            color: black !important;
        }

        .applyTable .date_field{
            border-radius:5px; 
            margin-left: 5px;
            margin-right: 5px;
            padding: 8px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

        .apply_search_option{
            border-radius:5px; 
            margin-right: 5px;
            width: 15%;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

		.apply_status{
            border-radius:5px; 
            margin-right: 5px;
            width: 50%;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

        #apply_search_text{
            border-radius:5px; 
            margin-right: 5px;
            width: 20%;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3)
        }

        #apply_search{
            padding: 4px 10px;
        }

        .applyTable .status_option, .date_option{
            margin-right:3px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 2px 6px;
            box-sizing: border-box;
            background: grey;
            cursor: pointer;
        }

        .applyTable .status_option.active, .date_option.active{
            background: rgb(60,180,180);
        }
        
    </style>
</body>
</html>


