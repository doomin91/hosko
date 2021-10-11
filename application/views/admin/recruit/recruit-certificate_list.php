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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>출국 및 증명서</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">출국 및 증명서</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">
            <form name="documentSearchForm" id="documentSearchForm" class="form-horizontal" method="get" role="form">
            <div class="row">
				<div class="col-md-12">
                
                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                        <table class="table datatable table-custom applyTopViewTable">
								<tbody>
									<tr>
										<th class="col-sm-2">회원 분류</th>
                                    
                                        <td class="col-sm-10">
                                            <select name="user_level" class="documentSearchUserLevel document_search_option" >
                                                <option value="" <?php if($user_level == "") echo "selected"; ?>>회원등급(전체)</option>
                                                <option value="1" <?php if($user_level == 1) echo "selected"; ?>>일반회원</option>
                                                <option value="2" <?php if($user_level == 2) echo "selected"; ?>>정회원</option>
                                                <option value="3" <?php if($user_level == 3) echo "selected"; ?>>합격회원</option>
                                                <option value="4" <?php if($user_level == 4) echo "selected"; ?>>특별회원</option>
                                                <option value="5" <?php if($user_level == 5) echo "selected"; ?>>응시회원</option>
                                                <option value="6" <?php if($user_level == 6) echo "selected"; ?>>관심회원</option>
                                                <option value="7" <?php if($user_level == 7) echo "selected"; ?>>환불회원</option>
                                                <option value="8" <?php if($user_level == 8) echo "selected"; ?>>파기회원</option>
                                                <option value="9" <?php if($user_level == 9) echo "selected"; ?>>탈퇴회원</option>
                                            </select>
                                            <!-- <div class="col-sm-4">
                                                <select name="ctg" class="chosen-select chosen-transparent chosen-single form-control documentSearchUserLevel common_select" >
                                                    <option value="" <?php if($user_level == "") echo "selected"; ?>>컨펌상태(전체)</option>
                                                    <option value="1" <?php if($user_level == 1) echo "selected"; ?>>미확인</option>
                                                    <option value="2" <?php if($user_level == 2) echo "selected"; ?>>반송</option>
                                                    <option value="2" <?php if($user_level == 2) echo "selected"; ?>>완료</option>
                                                </select>
                                            </div> -->
                                        </td>

									</tr>
                                    <tr>
                                        <th class="col-sm-2">검색</th>
										<td class="col-sm-10">
                                            <select class="document_search_option" name="document_search_option">
                                                <option value="all" <?php if($search_option == "all") echo "selected"?>)>전체</option>
                                                <option value="name" <?php if($search_option == "name") echo "selected"?>>이름</option>
                                                <option value="id" <?php if($search_option == "id") echo "selected"?>>아이디</option>
                                            </select>
                                            <input type="text" id="document_search_text" name="document_search_text" placeholder="검색어를 입력해주세요" value="<?php echo $search_text ?>">

                                            <input type="submit" class="btn btn-success" id="document_search" value="검색"></input>
                                            
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
							</div>

                            <table class="table datatable table-custom01 applyTopViewTable">

							<colgroup>
									<col width="15%"/>
									<col width="15%"/>
									<col width="15%"/>
									<col width="20%"/>
									<col width="20%"/>
									<col width="15%"/>
							</colgroup>
							<thead>
								<tr>
									<th class="text-center">이름</th>
									<th class="text-center">아이디</th>
									<th class="text-center">회원등급</th>
									<th class="text-center">등록일</th>
                                    <th class="text-center">인증서</th>
									<th class="text-center">파일첨부</th>
									
								</tr>
							</thead>
							<tbody>
						<?php
							if (!empty($lists)) :
								foreach ($lists as $key => $list) : 
									// print_r($list);
                                    // print_r("<br><br><br><br>");
						?>
								<tr>
									<td class="text-center"><?php echo $list->USER_NAME ?></td>
									<td class="text-center"><?php echo $list->USER_ID ?></td>
                                    <td class="text-center">
                                        <?php if($list->USER_LEVEL == 1): ?>
                                            일반회원
                                        <?php elseif($list->USER_LEVEL == 2): ?>
                                            정회원
                                        <?php elseif($list->USER_LEVEL == 3): ?>
                                            합격회원
                                        <?php elseif($list->USER_LEVEL == 4): ?>
                                            특별회원
                                        <?php elseif($list->USER_LEVEL == 5): ?>
                                            응시회원
                                        <?php elseif($list->USER_LEVEL == 6): ?>
                                            관심회원
                                        <?php elseif($list->USER_LEVEL == 7): ?>
                                            환불회원
                                        <?php elseif($list->USER_LEVEL == 8): ?>
                                            파기회원
                                        <?php elseif($list->USER_LEVEL == 9): ?>
                                            탈퇴회원
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center"><?php echo $list->CERT_REG_DATE ?></td>
                                    <td class="text-center">
                                        <?php echo "<a href=\"/admin/recruit/CertificateDown/".$list->CERT_SEQ."\">".$list->CERT_NAME."</a>"; ?>
                                    </td>
                                    <input type="file" name="certificate" id="certificate" class="hide" />
                                    <td class="text-center"><input type="button" class="btn btn-xs btn-primary uploadCertificate" data-cert_seq="<?php echo $list->CERT_SEQ ?>" data-user_seq="<?php echo $list->USER_USER_SEQ ?>" value="인증서 등록"></td>
								</tr>
						<?php
								$pagenum--;
								endforeach;
							else :
								echo "<tr><td colspan=\"14\" class=\"text-center\"> * 데이터가 없습니다. </td></td>";
							endif;
						?>
							</tbody>
							</table>

							<div class="row">
                                <div class="col-md-4 text-left">
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
            var FILE = new FormData();
            $(".uploadCertificate").on("click", function(){
                File = new FormData();
                var cert_seq = $(this).data("cert_seq");
                var user_seq = $(this).data("user_seq");
                FILE.append("USER_SEQ", user_seq);
            
                
                if(cert_seq){
                    alert("이미 등록된 증명서가 있습니다.\n 다시 등록하면 새로운 파일로 대체됩니다.");
                }else{

                }

                $("#certificate").click();
            });

            $("#certificate").on("change", function(){
                var file = this.files[0];
                FILE.append(this.id, file);

                for (var key of FILE.keys()) {
                    console.log(key);
                }

                // FormData의 value 확인
                for (var value of FILE.values()) {
                    console.log(value);
                }

                $.ajax({
                    url: "/admin/recruit/uploadUserCertificate",
                    type: "POST",
                    data: FILE,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(resultMsg){
                        console.log(resultMsg.code);
                        if(resultMsg.code == 200){
                            alert(resultMsg.msg);
                            console.log(resultMsg.msg);
                            location.reload();
                        }else{
                            alert(resultMsg.msg);
                            console.log(resultMsg.msg);
                        }
                    },
                    error: function (request, status, error){  
                        console.log(request);
                        console.log(request["responseText"]);    
                        console.log(status);
                        console.log(error);
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

        .date_field{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }

        .ui-datepicker-month, .ui-datepicker-year{
            color: black;
        }
        .ui-state-default {
            color: black !important;
        }

        .document_search_option{
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

        #document_search_text{
            padding: 7px 10px;
			border-radius: 5px;
			margin-bottom: 5px !important;
			margin: 5px !important;
			border: 0;
			background-color: #f3f3f3;
			color: #555;
			border: 1px solid #e4e4e4;
        }

        #document_search{
            padding: 4px 10px;
        }
        
    </style>
</body>
</html>


