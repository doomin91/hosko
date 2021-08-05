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
						<div class="tile color transparent-black rounded-corners">
							<table class="table table-custom dataTable reSumeTable">
								<tbody>
									<tr>
                                        <th class="col-sm-2">조건검색</th>
										<td class="col-sm-10">
                                            <select id="resume_search_option" name="resume_search_option">
                                                <option value="all">전체</option>
                                                <option value="name">이름</option>
                                                <option value="id">아이디</option>
                                                <option value="title">제목</option>x
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
					<div class="tile color transparent-black rounded-corners">

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
									<col width="15%"/>
									<col width="15%"/>
									<col width="50%"/>
									<col width="15%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center"><input type="checkbox" id="resume_select_all" name="resume_select_all"></th>
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
									<td class="text-center"><input type="checkbox" name="resume_select" value=<?php echo $list->RESUME_SEQ?>></td>
									<td class="text-center"><?php echo $list->USER_NAME ?></td>
                                    <td class="text-center"><?php echo $list->USER_ID ?></td>
                                    <td class="text-center"><?php echo $list->RESUME_TITLE ?></td>
									
                                    <td class="text-center">
										<a href ="/admin/recruit/recruit_resume_view/<?php echo $list->RESUME_SEQ?>" class="btn btn-xs btn-default">상세보기</a>
										<a href ="/admin/recruit/recruit_resume_admin_create/<?php echo $list->RESUME_SEQ?>/<?php echo $list->USER_SEQ?>" class="btn btn-xs btn-default">첨삭하기</a>
									</td>
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
                                    <input type="button" id="selected_resume_del" name="selected_resume_del" class="btn btn-xs btn-default" value="- 선택삭제">
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

            $("#resume_search_text").on("keypress", function(e){
                var key = e.which;
                
                if (key == 13){
                    $("#resume_search").click();
                }
            });

            $("#resume_search").on("click", function(){
                var row = $(this).closest("td");
                var input = $(row).find("#resume_search_text").val();

                if(input == ""){
                    alert("검색어를 입력해주세요");
                }
            });

            $("#apply_excel_save").on("click", function(){
                alert("엑셀 따운");
            });

			$("#resume_select_all").on("change", function(){
                var selects = $("input[name=resume_select]");

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

			$("#selected_resume_del").on("click", function(){
                var selected = $("input[name=resume_select]:checked");
                var seqs = [];

                selected.each(function(index, element){
                    seqs.push($(this).val());
                })
                console.log(seqs);

				if(seqs.length == 0){
					alert("이력서를 선택해주세요");
					return false;
				}
                
                if(confirm("정말 모두 삭제하시겠습니까?")){
                    $.ajax({
                        url : "/admin/recruit/recruit_resumes_del",
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


        });
    </script>
    <style>
        #resume_search_option{
			padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;

            /* border-radius:5px; 
            margin-right: 5px;
            width: 15%;
            padding: 6px;
            border:0; 
            background-color:rgba(0, 0, 0, 0.3) */
        }

        #resume_search_text{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }

        #resume_search{
            padding: 4px 10px;
        }
        
    </style>
</body>
</html>


