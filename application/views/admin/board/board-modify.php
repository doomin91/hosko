<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>
<script src="/ckeditor/ckeditor.js"></script>

<body class="bg-1">

	<!-- Preloader -->
	<div class="mask">
		<div id="loader"></div>
	</div>
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
					<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b><?php echo $BOARD->BOARD_NAME?></b> 게시판 수정 
					</h2>
					<div class="breadcrumbs">
						<ol class="breadcrumb">
							<li>관리자 페이지</li>
							<li><a href="index.html">회원관리</a></li>
							<li class="active">회원정보 수정하기</li>
						</ol>
					</div>

				</div>
				<!-- /page header -->

				<!-- content main container -->
				<div class="main">

					<!-- row -->
					<div class="row">

						<!-- col 6 -->
						<div class="col-md-12">
							<!-- tile -->
							<section class="tile color transparent-black">

					<!-- tile body -->
					<div class="tile-body">
						<form id="board_write_form">
						<input type="hidden" name="board_seq" value="<?php echo $BOARD->BOARD_SEQ ?>">
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="10%"/>
								<col width="40%"/>
								<col width="10%"/>
								<col width="40%"/>
							</colgroup>
							<tbody>
								<tr>
									<td>게시판 타입</td>
									<td colspan=3>
									<select name="board_type" disabled>
											<option value=0 <?php echo $BOARD->BOARD_TYPE == 0 ? "selected" : "" ?>>일반 게시판</option>
											<option value=1 <?php echo $BOARD->BOARD_TYPE == 1 ? "selected" : "" ?>>포토 게시판</option>
											<option value=2 <?php echo $BOARD->BOARD_TYPE == 2 ? "selected" : "" ?>>동영상 게시판</option>
									</select> * 설정된 게시판 타입은 수정 할 수 없습니다.
									</td>
									
								</tr>
								<tr>
									<td>영문명(db명) <span style="bold:700;">*</span></td>
									<td colspan=3><input type="text" name="board_name" value="<?php echo $BOARD->BOARD_NAME?>" disabled></td>
								</tr>
								<tr>
									<td>한글명 <span style="bold:700;">*</span></td>
									<td colspan=3><input type="text" name="board_name_kor" value="<?php echo $BOARD->BOARD_KOR_NAME?>"></td>
								</tr>
								<tr>
									<td>게시판그룹</td>
									<td colspan=3>
										<select name="board_group">
											<option value="">:: 게시판그룹 ::</option>
											<?php 
											foreach($GROUP as $val):
											?>
											<option value=<?php echo $val->GP_SEQ;?> <?php echo $val->GP_SEQ == (int)$BOARD->BOARD_GROUP ? "selected" : ""?>><?php echo $val->GP_NAME;?></option>	
											<?php
											endforeach;
											?>
										</select>
										<button type="button" class="btn btn-xs btn-slategray" onclick="viewGroupList();">그룹관리</button>
									</td>
								</tr>
								<!-- <tr>
									<td>카테고리</td>
									<td colspan=3>
										<select name="board_cate">
											<option value="">:: 카테고리 ::</option>
										</select>
										<button type="button" class="btn btn-xs btn-slategray">카테고리관리</button>
									</td>
								</tr> -->
								<!-- <tr>
									<td>게시판관리자</td>
									<td colspan=3><input type="text" name="board_admin" value="<?php echo $BOARD->BOARD_ADMIN_ID?>">아이디를 쉼표를 분리(admin,admin1,admin2)</td>
								</tr> -->
								<tr>
									<td>자동 비밀글</td>
									<td colspan=3><label for="fn_secret"><input type="checkbox" id="fn_secret" name="fn_secret" value="Y" <?php echo $BOARD->BOARD_SECRET_FLAG == 'Y' ? "checked" : ""?>> 작성자와 운영자만 열람가능</label></td>
								</tr>
								<!-- <tr>
									<td>권한</td>
									<td colspan=3>
										<table style="width:100%; text-align:center;">
											<tr>
												<td>목록보기</td>
												<td>내용보기</td>
												<td>글쓰기</td>
												<td>답글쓰기</td>
												<td>코멘트쓰기</td>
											</tr>

											<?php
												$AUTH = explode(",", $BOARD->BOARD_AUTH);
											?>
											<tr>
												<td>
													<select name="auth_list">
														<option value=0>전체</option>
														<?php foreach($USER_LEVEL AS $ul){
															if($ul->LEVEL_SEQ == $AUTH[0]){
																echo "<option value=" . $ul->LEVEL_SEQ . " selected>" . $ul->LEVEL_NAME . "</option>";
															} else {
																echo "<option value=" . $ul->LEVEL_SEQ . ">" . $ul->LEVEL_NAME . "</option>";
															}
														}?>
													</select>
												</td>
												<td>
													<select name="auth_content">
													<option value="all">전체</option>
													<?php foreach($USER_LEVEL AS $ul){
															if($ul->LEVEL_SEQ == $AUTH[1]){
																echo "<option value=" . $ul->LEVEL_SEQ . " selected>" . $ul->LEVEL_NAME . "</option>";
															} else {
																echo "<option value=" . $ul->LEVEL_SEQ . ">" . $ul->LEVEL_NAME . "</option>";
															}
														}?>
													</select>
												</td>
												<td>
													<select name="auth_write">
													<option value="all">전체</option>
													<?php foreach($USER_LEVEL AS $ul){
															if($ul->LEVEL_SEQ == $AUTH[2]){
																echo "<option value=" . $ul->LEVEL_SEQ . " selected>" . $ul->LEVEL_NAME . "</option>";
															} else {
																echo "<option value=" . $ul->LEVEL_SEQ . ">" . $ul->LEVEL_NAME . "</option>";
															}
														}?>
													</select>
												</td>
												<td>
													<select name="auth_repost">
													<option value="all">전체</option>
													<?php foreach($USER_LEVEL AS $ul){
															if($ul->LEVEL_SEQ == $AUTH[3]){
																echo "<option value=" . $ul->LEVEL_SEQ . " selected>" . $ul->LEVEL_NAME . "</option>";
															} else {
																echo "<option value=" . $ul->LEVEL_SEQ . ">" . $ul->LEVEL_NAME . "</option>";
															}
														}?>
													</select>
												</td>
												<td>
													<select name="auth_reply">
													<option value="all">전체</option>
													<?php foreach($USER_LEVEL AS $ul){
															if($ul->LEVEL_SEQ == $AUTH[4]){
																echo "<option value=" . $ul->LEVEL_SEQ . " selected>" . $ul->LEVEL_NAME . "</option>";
															} else {
																echo "<option value=" . $ul->LEVEL_SEQ . ">" . $ul->LEVEL_NAME . "</option>";
															}
														}?>
													</select>
												</td>
											</tr>
										</table>
									</td>
								</tr> -->
								<tr>
									<td>권한이 없을경우</td>
									<td colspan=3>
										경고메세지:<input type="text" name="warn_message" value="<?php echo $BOARD->BOARD_AUTH_MSG?>">경고후 이동페이지:<input type="text" name="redirect_url" value="<?php echo $BOARD->BOARD_AUTH_REDIRECT?>"><br>
										<label for="show_write_btn_y"><input type="radio" name="show_write_btn" id="show_write_btn_y" value="Y" <?php echo $BOARD->BOARD_WRITE_BTN_VIEW == "Y" ? "checked" : "" ?>> 글쓰기 버튼이 보이지 않음</label>
										<label for="show_write_btn_n"><input type="radio" name="show_write_btn" id="show_write_btn_n" value="N" <?php echo $BOARD->BOARD_WRITE_BTN_VIEW == "N" ? "checked" : "" ?>> 글쓰기 버튼이 보이고 클릭 시 경고창</label>
									</td>
								</tr>
								<tr>
									<td>보기 하단에 목록보기</td>
									<td>
										<label for="fn_viewpage_y"><input type="radio" name="fn_viewpage" id="fn_viewpage_y" value="Y" <?php echo $BOARD->BOARD_BOTTOM_LIST_FLAG == "Y" ? "checked" : ""?>> 사용함</label>
										<label for="fn_viewpage_n"><input type="radio" name="fn_viewpage" id="fn_viewpage_n" value="N" <?php echo $BOARD->BOARD_BOTTOM_LIST_FLAG == "N" ? "checked" : ""?>> 사용안함</label>
									</td>
								</tr>
								<tr>
									<td>스팸글체크기능</td>
									<td colspan=3>
										<label for="fn_spamcheck_y"><input type="radio" name="fn_spamcheck" id="fn_spamcheck_y" value="Y" <?php echo $BOARD->BOARD_SPAM_CHECK_FLAG == "Y" ? "checked" : ""?>> 사용함</label>
										<label for="fn_spamcheck_n"><input type="radio" name="fn_spamcheck" id="fn_spamcheck_n" value="N" <?php echo $BOARD->BOARD_SPAM_CHECK_FLAG == "N" ? "checked" : ""?>> 사용안함</label>
									</td>
								</tr>
								<tr>
									<td>추천 기능</td>
									<td>
										<label for="fn_recommand_y"><input type="radio" name="fn_recommand" id="fn_recommand_y" value="Y" <?php echo $BOARD->BOARD_RECOMMAND_FLAG == "Y" ? "checked" : ""?>> 사용함</label>
										<label for="fn_recommand_n"><input type="radio" name="fn_recommand" id="fn_recommand_n" value="N" <?php echo $BOARD->BOARD_RECOMMAND_FLAG == "N" ? "checked" : ""?>> 사용안함</label>
									</td>
									<td>코멘트 허용</td>
									<td>
										<label for="fn_reply_y"><input type="radio" name="fn_reply" id="fn_reply_y" value="Y" <?php echo $BOARD->BOARD_COMMENT_FLAG == "Y" ? "checked" : ""?>> 허용함</label>
										<label for="fn_reply_n"><input type="radio" name="fn_reply" id="fn_reply_n" value="N" <?php echo $BOARD->BOARD_COMMENT_FLAG == "N" ? "checked" : ""?>> 허용안함</label>
									</td>
								</tr>
								<tr>
									<td>파일 업로드</td>
									<td colspan=3>
										<select name="file_upload">
											<?php for($i=1; $i<=10; $i++){
												if($i == $BOARD->BOARD_FILEUPLOAD_COUNT){
													echo "<option value=$i selected>$i</option>";
												} else {
													echo "<option value=$i>$i</option>";
												}
											}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<!-- <td>페이지출력수</td>
									<td>
										<select name="page_view">
										<?php for($i=1; $i<=10; $i++){
												if($i == $BOARD->BOARD_FILEUPLOAD_COUNT){
													echo "<option value=". ($i*10) ." selected> ".($i*10)."</option>";
												} else {
													echo "<option value=". ($i*10) ."> ".($i*10)."</option>";
												}            
											}
											?>                             
										</select>
									</td>                    -->
									<td>리스트출력수</td>
									<td>
										<select name="list_view">
											<?php for($i=1; $i<=10; $i++){
												if($i*10 == $BOARD->BOARD_LIST_COUNT){
													echo "<option value=". ($i*10) ." selected> ".($i*10)."</option>";
												} else {
													echo "<option value=". ($i*10) ."> ".($i*10)."</option>";
												}
											}
											?> 
										</select>
									</td>
								</tr>
								<tr>
									<td>new 기간설정</td>
									<td><input type="text" name="new_period" value="<?php echo $BOARD->BOARD_PERIOD_NEW ?>"></td>
									<td>hot 조회수설정</td>
									<td><input type="text" name="hot_period" value="<?php echo $BOARD->BOARD_PERIOD_HOT ?>"></td>
								</tr>

								<tr>
									<td>욕설 비방글 필터링</td>
									<td colspan=3>
										<label for="fn_filter"><input type="checkbox" name="fn_filter" id="fn_filter" value="Y" <?php echo $BOARD->BOARD_FILTER_YN == "Y" ? "checked" : ""?>>사용함 (공백없이 단어를 입력하시고, 단어와 단어사이에는 콤마(,)로 구분하세요.)</label>
										<br>
										<textarea name="fn_filter_words" style="width:500px;"><?php echo $BOARD->BOARD_FILTER_WORDS?></textarea>
									</td>
								</tr>
								<tr>
									<td>메모</td>
									<td><textarea name="board_memo" style="width:500px;"><?php echo $BOARD->BOARD_MEMO?></textarea></td>
								</tr>
							</tbody>
						</table>

						<div class="row form-footer">
							<div class="col-sm-offset-2 col-sm-10 text-right">
								<button type="button" class="btn btn-default btn-sm" onclick="modify_board()">수정</button>
								<a href="/admin/board/board_list"
													class="btn btn-primary btn-sm">목록가기</a>

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
		function modify_board() {
			let form = $("#board_write_form").serializeArray();
			$.ajax({
				url: "/admin/Board/board_modify_proc/",
				type: "post",
				data: form,
				dataType: "json",
				success: function (resultMsg) {
					let code = resultMsg["code"];
					let msg = resultMsg["msg"];
					if(code == 200){
						alert(msg);
						location.href="/admin/Board/board_list";
					} else {
						alert(msg);
					}
				},
				error: function (e) {
					console.log(e);
				}
			})
		}

		function viewGroupList(){
		window.open("/admin/group/group_list", "_blank", "left=100; top=100; width=400; height=250; status=0; titlebar=0; menubar=0; scrollbar=0");
	}
	</script>

</body>

</html>