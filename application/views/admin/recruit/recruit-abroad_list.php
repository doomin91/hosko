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

          <div class="row">
				<div class="col-md-6">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">컨텐츠분류</th>
                                    
                                        <td class="col-sm-10">
                                            <div class="col-sm-3">
                                            <select class="chosen-select chosen-transparent chosen-single form-control abroad_contents_first_category common_select" >
                                                <option selected>:: 대분류 :: <i class="fa fa-angle-down"></i></option>
                                                <option>글자1</option>
                                                <option>글자2</option>
                                                <option>글자3</option>
                                                <option>글자4</option>
                                            </select>
                                            
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="chosen-select chosen-transparent form-control abroad_contents_second_category common_select">
                                                    <option selected>:: 중분류 ::</option>
                                                    <option>글자1</option>
                                                    <option>글자2</option>
                                                    <option>글자3</option>
                                                    <option>글자4</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3">
                                                <select class="chosen-select chosen-transparent form-control abroad_contents_thrid_category common_select">
                                                    <option selected>:: 소분류 ::</option>
                                                    <option>글자1</option>
                                                    <option>글자2</option>
                                                    <option>글자3</option>
                                                    <option>글자4</option>
                                                </select>
                                            </div>
                                        </td>

									</tr>
									<tr>
                                        <th class="col-sm-2">검색조건</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-2">
                                                <select class="chosen-select chosen-transparent form-control abroad_contents_search_option common_select">
                                                    <option selected>컨텐츠명</option>
                                                    <option>글자1</option>
                                                    <option>글자2</option>
                                                    <option>글자3</option>
                                                    <option>글자4</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-5">
                                            <input type="text" class="form-control" id="abroad_contents_search_text" name="abroad_contents_search_text" placeholder="검색어를 입력해주세요" value="">
                                            </div>
                                        </td>
									</tr>
                                    <tr>
                                        <th class="col-sm-2">그룹</th>
										<td class="col-sm-10">
                                            <div class="col-sm-3">
                                                <select class="chosen-select chosen-transparent form-control abroad_group_option common_select">
                                                    <option selected>:: 그룹선택 ::</option>
                                                    <option>글자1</option>
                                                    <option>글자2</option>
                                                    <option>글자3</option>
                                                    <option>글자4</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="button" class="btn btn-sm btn-primary" id="abroad_search" value="검색"></input>
                                            </div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</section>
				</div>
                <div class="col-md-6">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">쿠폰적용</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-2">
                                                <select class="chosen-select chosen-transparent form-control abroad_apply_coupon common_select">
                                                    <option selected>:: 선택 ::</option>
                                                    <option>글자1</option>
                                                    <option>글자2</option>
                                                    <option>글자3</option>
                                                    <option>글자4</option>
                                                </select>
                                            </div>
										</td>
									</tr>
									<tr>
										<th class="col-sm-2">쿠폰적용</th>
                                        <td class="col-sm-10">
                                            <div class="col-sm-2">
                                                <select class="chosen-select chosen-transparent form-control abroad_display_option common_select">
                                                    <option selected>:: 선택 ::</option>
                                                    <option>글자1</option>
                                                    <option>글자2</option>
                                                    <option>글자3</option>
                                                    <option>글자4</option>
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
								<div class="col-md-8">총 컨텐츠수 : <?php echo $listCount?> &nbsp&nbsp&nbsp 검색 컨텐츠수 : <?php echo $listCount ?></div>
                                <div class="col-md-4 text-right">
                                    <input type="button" id="abroad_excel_register" class="btn btn-sm btn-default" value="+ 엑셀일괄등록">
									<input type="button" id="abroad_excel_save" class="btn btn-sm btn-default" value="+ 엑셀파일저장">
                                    <input type="button" id="abroad_register" class="btn btn-sm btn-default" value="+ 컨텐츠등록">
								</div>
							</div>

							<table class="table table-custom dataTable">
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
								foreach ($lists as $list) :
									
						?>
								<tr>
									<td class="text-center"><input type="checkbox" name="abroad_select" value=<?php echo $list->REC_SEQ?>></td>
									<td class="text-center"><?php echo $list->REC_SEQ ?></td>
                                    <td class="text-center"><?php echo $list->REC_THUMBNAIL ?></td>
                                    <td class="text-center"><a href="/admin/recruit/recruit_abroad_view/<?php echo $list->REC_SEQ ?>"><?php echo $list->REC_TITLE ?></a></td>
                                    <td class="text-center"><?php echo $list->REC_PAY ?></td>
                                    <td class="text-center"><?php echo $list->REC_COUNT ?></td>
                                    <td class="text-center"><?php echo "진열순서" ?></td>
                                    <td class="text-center">
                                        <a href ="/admin/recruit/recruit_abroad_edit/<?php echo $list->REC_SEQ?>" class="btn btn-xs btn-default">수정</a>
                                        <input type="button" data-seq="<?php echo $list->REC_SEQ?>" class="btn btn-xs btn-danger recruit-abroad-del" value="삭제">
                                        <a href ="/admin/recruit/recruit_abroad_view/<?php echo $list->REC_SEQ?>" class="btn btn-xs btn-primary">복사</a>
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
                                    <input type="button" id="selected_abroad_del" class="btn btn-sm btn-default" value="- 선택삭제">
                                    <input type="button" id="selected_abroad_move" class="btn btn-sm btn-default" value="+ 컨텐츠이동">
                                    <input type="button" id="selected_abroad_copy" class="btn btn-sm btn-default" value="+ 컨텐츠복사">
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
            $("#abroad_select_all").on("change", function(){

            });

            $("#selected_abroad_del").on("click", function(){
                alert("테스트 선택 삭제");
            });

            $("#selected_abroad_move").on("click", function(){
                alert("테스트 선택 이동");
            });

            $("#selected_abroad_copy").on("click", function(){
                alert("테스트 선택 복사");
            });

            $("#abroad_excel_register").on("click", function(){
                alert("테스트 엑셀일괄등록");
            });

            $("#abroad_excel_save").on("click", function(){
                alert("테스트 엑셀저장");
            });

            $("#abroad_register").on("click", function(){
                alert("테스트 컨텐츠등록");
            });

            $(".recruit-abroad-del").on("click", function(){
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


            $("#apply_search_text").on("keypress", function(e){
                var key = e.which;
                
                if (key == 13){
                    $("#apply_search").click();
                }
            });

            $("#apply_search").on("click", function(){
                var row = $(this).closest("td");
                var input = $(row).find("#apply_search_text").val();

                if(input == ""){
                    alert("검색어를 입력해주세요");
                }
            });

            $("#apply_excel_save").on("click", function(){
                alert("엑셀 따운");
            });

        });
    </script>
    <style>
        .common_select{
            min-height: 30px;
            font-size: 12px !important;
        }
        #abroad_contents_search_text{
            min-height: 30px;
            font-size: 12px !important;
            margin-left: -20px !important;
        }
        #abroad_search{
            margin-left: -20px !important;
        }

        .apply_search_option{
            border-radius:5px; 
            margin-right: 5px;
            width: 15%;
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

        .applyTable .status_condition, .date_condition{
            margin-right:3px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 2px 6px;
            box-sizing: border-box;
            background: grey;
            cursor: pointer;
        }

        .applyTable .status_condition.active{
            background: rgb(60,180,180);
        }

        
    </style>
</body>
</html>


