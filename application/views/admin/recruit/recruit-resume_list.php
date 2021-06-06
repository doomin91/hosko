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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>이력서 목록</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">이력서 목록</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">
				<div class="col-md-12">
					<section class="tile transparent">
						<div class="tile-body color transparent-black rounded-corners">
							<table class="table table-custom dataTable applyTable">
								<tbody>
									<tr>
                                        <th class="col-sm-2">조건검색</th>
										<td class="col-sm-10">
                                            <select id="resume_search_option" name="resume_search_option">
                                                <option value="ALL">전체</option>
                                                <option value="NAME">이름</option>
                                                <option value="ID">아이디</option>
                                                <option value="TITLE">제목</option>x
                                            </select>
                                            <input type="text" id="resume_search_text" name="resume_search_text" placeholder="검색어를 입력해주세요" value="">

                                            <input type="button" class="btn btn-success" id="resume_search" value="검색"></input>
                                            
										</td>
									</tr>
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
				<section class="tile transparent">

					<!-- tile body -->
					<div class="tile-body color transparent-black rounded-corners">

						<div class="table-responsive dataTables_wrapper form-inline" role="grid" id="basicDataTable_wrapper">
							<div class="row">
								<div class="col-md-10">총 주문수 : 100 &nbsp&nbsp&nbsp 검색 주문수 : 100</div>
                                <div class="col-md-2 text-right">
									<input type="button" id="apply_excel_save" class="btn btn-sm btn-default" value="+ 엑셀파일저장">
								</div>
							</div>

							<table class="table table-custom dataTable">
							<colgroup>
									<col width="5%"/>
									<col width="15%"/>
									<col width="15%"/>
									<col width="50%"/>
									<col width="15%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox"></th>
									<th class="text-center">성명</th>
									<th class="text-center">아이디</th>
									<th class="text-center">이력서 제목</th>
									<th class="text-center">기능</th>
									
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)) :
								foreach ($lists as $list) :
									
						?>
								<tr>
									<td class="text-center"><input type="checkbox" value=<?php echo $list->APP_SEQ?>></td>
									<td class="text-center"><?php echo $list->USER_NAME ?></td>
                                    <td class="text-center"><?php echo $list->USER_ID ?></td>
                                    <td class="text-center"><?php echo $list->REC_TITLE ?></td>
									
                                    <td class="text-center"><a href ="/admin/recruit/recruit_apply_view/<?php echo $list->APP_SEQ?>" class="btn btn-sm btn-default">상세보기</a></td>
								</tr>
						<?php
								$pagenum--;
								endforeach;
							else :
								
								echo "<tr><td colspan=\"14\" class=\"text-center\"> * 이력서가 없습니다. </td></td>";
							endif;
						?>
							</tbody>
							</table>

							<div class="row">
                                <div class="col-md-4 text-left">
                                    <input type="button" id="selected_resume_del" class="btn btn-sm btn-default" value="- 선택삭제">
								</div>
								<div class="col-md-4 text-center sm-center">
									<div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
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

            $("#apply_search_text").on("keypress", function(e){
                var key = e.which;
                
                if (key == 13){
                    $("#resume_search").click();
                }
            });

            $("#apply_search").on("click", function(){
                var row = $(this).closest("td");
                var input = $(row).find("#resume_search_text").val();

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

        #resume_search_option{
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

        .applyTable .status_condition, .date_condition{
            margin-right:3px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 2px 6px;
            box-sizing: border-box;
            background: grey;
            cursor: pointer;
        }

        .applyTable .status_condition.active, .date_condition.active{
            background: rgb(60,180,180);
        }
        
    </style>
</body>
</html>


