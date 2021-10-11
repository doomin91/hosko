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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>수속서류 관리</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">수속관리</a></li>
				<li class="active">수속서류 관리</li>
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
                                            <select name="doc_status" class="documentSearchUserLevel document_search_option" >
                                                <option value="" <?php if($doc_status == "") echo "selected"; ?>>컨펌상태(전체)</option>
                                                <option value="0" <?php if($doc_status == 1) echo "selected"; ?>>미확인</option>
                                                <option value="-1" <?php if($doc_status == -1) echo "selected"; ?>>반송</option>
                                                <option value="1" <?php if($doc_status == 2) echo "selected"; ?>>완료</option>
                                            </select>
                                            
                                        </td>

									</tr>
									<tr>
                                        <th class="col-sm-2">서류 등록 날짜</th>
                                        <td class="col-sm-10">
                                            <input type="text" id="start_date" name="start_date" class="date_field" value="<?php if(isset($start_date)) echo $start_date?>">
                                            ~
                                            <input type="text" id="end_date" name="end_date" class="date_field" value="<?php if(isset($end_date)) echo $end_date?>">
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
									<th class="text-center">최근 제출일</th>
                                    <th class="text-center">최근 확인일</th>
                                    <th class="text-center">컨펌상태</th>
									<th class="text-center">서류확인</th>
									
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
                                    <td class="text-center"><?php echo $list->DOC_LAST_UPDATE_DATE ?></td>
                                    <td class="text-center"><?php echo $list->DOC_LAST_CHECK_DATE ?></td>
                                    <td class="text-center">
                                        <?php if($list->DOC_STATUS == 0): ?>
                                            미확인
                                        <?php elseif($list->DOC_STATUS == 1): ?>
                                            OK
                                        <?php elseif($list->DOC_STATUS == -1): ?>
                                            반송
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center"><input type="button" class="btn btn-xs btn-primary showDocument" data-doc_seq="<?php echo $list->DOC_SEQ?>" value="서류보기"></td>
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
    <!-- 모달 팝업 -->
	<div class="modal fade" id="modalDocument" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
					<h3 class="modal-title" id="modalConfirmLabel">제출 서류 목록</h3>
				</div>
				<div class="modal-body">
                    <form id="documentModalForm">
                        <table class="table datatable table-custom01">
                            <colgroup>
                                <col width="30%"/>
                                <col width="40%"/>
                                <col width="30%"/>
                            </colgroup>
                            <tbody>
                                
                                <!-- <tr>
                                    <th>- 영문에세이</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 영문커버레터</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 비상연락처</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 여권전면상하사본</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 학생증 사본</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 비자용 사진</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 영문 재학/졸업 증명서</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 영문 성적 증명서</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 영문 추천서1</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 영문 추천서2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>- 영문 건강진단서</td>
                                    <td></td>
                                </tr> -->
                                
                            </tbody>
                        </form>
                    </table>
				</div>
				<div class="modal-footer">
					<button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
					<button id="saveDocument" class="btn btn-green">저장하기</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<?php
		include_once dirname(__DIR__)."/admin-footer.php";
	?>

    <script>
        $(function(){
            $(".showDocument").on("click", function(){
                var doc_seq = $(this).data("doc_seq");
                console.log(doc_seq);
                if(doc_seq){
                    
                    $.ajax({
                        url: "/admin/recruit/getUserDocument",
                        type: "POST",
                        data: {
                            "DOC_SEQ": doc_seq
                        },
                        dataType: "json",
                        success: function(resultMsg){
                            console.log(resultMsg.code);
                            var document = resultMsg.document;
                            if(resultMsg.code == 200){
                                // alert(resultMsg.msg);
                                // console.log(resultMsg.msg);
                                var tbody = $("#modalDocument").find("tbody");
                                console.log(tbody);
                                var html = "<tr>" +
                                                "<th>- 영문에세이</td>" +
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/eq\">" +document["DOC_EQ_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_EQ_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_EQ_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_EQ_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_EQ_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_EQ_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>" +
                                           " <tr>" +
                                                "<th>- 영문커버레터</td>" +
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/cl\">" +document["DOC_CL_FILE_NAME"] + "</a></td>" +
                                               "<td>"+
                                                    "<select id=\"DOC_CL_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_CL_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_CL_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_CL_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_CL_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<th>- 비상연락처</td>" +
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/ec\">" +document["DOC_EC_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_EC_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_EC_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_EC_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_EC_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_EC_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>" +
                                            "<tr>" +
                                                "<th>- 여권전면상하사본</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/pp\">" +document["DOC_PASSPORT_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_PASSPORT_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_PASSPORT_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_PASSPORT_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_PASSPORT_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_PASSPORT_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                "<th>- 학생증 사본</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/sc\">" +document["DOC_SC_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_SC_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_SC_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_SC_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_SC_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_SC_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                               " <th>- 비자용 사진</td>"+
                                               "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/ph\">" +document["DOC_PHOTO_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_PHOTO_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_PHOTO_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_PHOTO_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_PHOTO_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_PHOTO_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                "<th>- 영문 재학/졸업 증명서</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/rod\">" +document["DOC_ROD_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_ROD_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_ROD_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_ROD_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_ROD_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_ROD_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                "<th>- 영문 성적 증명서</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/tran\">" +document["DOC_TRANSCRIPT_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_TRANSCRIPT_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_TRANSCRIPT_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_TRANSCRIPT_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_TRANSCRIPT_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_TRANSCRIPT_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                "<th>- 영문 추천서1</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/rec\">" +document["DOC_RECOMMENDATION_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_RECOMMENDATION_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_RECOMMENDATION_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_RECOMMENDATION_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_RECOMMENDATION_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_RECOMMENDATION_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                "<th>- 영문 추천서2</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/rec2\">" +document["DOC_RECOMMENDATION2_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_RECOMMENDATION2_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_RECOMMENDATION2_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_RECOMMENDATION2_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_RECOMMENDATION2_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_RECOMMENDATION2_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                "<th>- 영문 건강진단서</td>"+
                                                "<td><a href=\"/admin/recruit/DocumentDown/" + document['DOC_SEQ'] + "/ms\">" +document["DOC_MS_FILE_NAME"] + "</a></td>" +
                                                "<td>"+
                                                    "<select id=\"DOC_MS_FLAG\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_MS_FLAG"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_MS_FLAG"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미제출</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_MS_FLAG"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";

                                    html +=             "<option value=\"2\" ";
                                                        if(document["DOC_MS_FLAG"] == 2){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>"+
                                            "<tr>"+
                                                // "<th></td>"+
                                                "<td colspan=2 style='text-align: center; font-size: 20px; font-weight: 700'>"+"컨펌 상태"+"</td>"+
                                                "<td>"+
                                                    "<select id=\"DOC_STATUS\" class=\"document_search_option\">"+
                                                        "<option value=\"-1\" ";
                                                        if(document["DOC_STATUS"] == -1){
                                                            html += "selected"
                                                        }
                                    html +=             ">반송</option>";

                                    html +=             "<option value=\"0\" ";
                                                        if(document["DOC_STATUS"] == 0){
                                                            html += "selected"
                                                        }
                                    html +=             ">미확인</option>";
                                    
                                    html +=             "<option value=\"1\" ";
                                                        if(document["DOC_STATUS"] == 1){
                                                            html += "selected"
                                                        }
                                    html +=             ">OK</option>";
                                    html +=         "</select>"+
                                                "</td>" +
                                            "</tr>";
                                $(tbody).html(html);
                                $("#saveDocument").data("doc_seq", document["DOC_SEQ"]);
                                $("#modalDocument").modal("show");
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
                    
                }else{
                    alert("아직 제출 서류가 없습니다");
                    return false;
                }
                
            })

            $("#saveDocument").on("click", function(){
                //documentModalForm
                var doc_seq = $("#saveDocument").data("doc_seq");
                var select = $('#documentModalForm').find("select");
                console.log(select);
                var data = {};
                data["DOC_SEQ"] = doc_seq;
                $.each(select, function(index, form){
                    var value = $(form).val();
                    var key= $(form).attr('id');
                    data[key] = value;
                })

                $.ajax({
                        url: "/admin/recruit/saveUserDocument",
                        type: "POST",
                        data: data,
                        dataType: "json",
                        success: function(resultMsg){
                            console.log(resultMsg.code);
                            if(resultMsg.code == 200){
                                alert(resultMsg.msg);
                                console.log(resultMsg.msg);                                    
                                $("#modalDocument").modal("hide");
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

            $('#start_date').datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                closeText:'취소',
                //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
                showButtonPanel:true,
                beforeShow: function(input) {
                    var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                    setTimeout(function(){
                        $('#ui-datepicker-div').css({'top':i_offset.top-20, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                    })
                },
                onClose: function( selectedDate ) {    
                    // 시작일(fromDate) datepicker가 닫힐때
                    // 종료일(toDate)의 선택할수있는 최소 날짜(minDate)를 선택한 시작일로 지정
                    $("#end_date").datepicker( "option", "minDate", selectedDate );
                }                
            });

            //종료일
            $('#end_date').datepicker({
                dateFormat : "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                closeText:'취소',
                //minDate: 0,                       // 선택할수있는 최소날짜, ( 0 : 오늘 이전 날짜 선택 불가)
                showButtonPanel:true,
                beforeShow: function(input) {
                    var i_offset= $(input).offset(); //클릭된 input의 위치값 체크

                    setTimeout(function(){
                        $('#ui-datepicker-div').css({'top':i_offset.top-20, 'bottom':'', 'left':i_offset.left});      //datepicker의 div의 포지션을 강제로 input 위치에 그리고 좌측은 모바일이여서 작기때문에 무조건 10px에 놓았다.
                    })
                },
                onClose: function( selectedDate ) {
                    // 종료일(toDate) datepicker가 닫힐때
                    // 시작일(fromDate)의 선택할수있는 최대 날짜(maxDate)를 선택한 종료일로 지정 
                    $("#start_date").datepicker( "option", "maxDate", selectedDate );
                }                
            });

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


