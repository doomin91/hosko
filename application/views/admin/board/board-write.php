<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>

<style>
input[type=text]{	
	width:220px;
}
</style>

<script src="/ckeditor/ckeditor.js"></script>
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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>게시판 등록 </b></h2>
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
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="10%"/>
								<col width="40%"/>
								<col width="10%"/>
								<col width="40%"/>
							</colgroup>
							<tbody>
								<tr>
									<td>영문명(db명) <span style="bold:700;">*</span></td>
									<td colspan=3><input type="text" name="board_name"></td>
								</tr>
								<tr>
									<td>한글명 <span style="bold:700;">*</span></td>
									<td colspan=3><input type="text" name="board_name_kor"></td>
								</tr>
								<tr>
									<td>게시판그룹</td>
									<td colspan=3>
										<select name="board_group">
											<option>:: 게시판그룹 ::</option>
											<option>고객센터</option>
											<option>커뮤니티</option>
											<option>호텔채용정보</option>
											<option>지식경영</option>
										</select>
										<button type="button" class="btn btn-xs btn-slategray">그룹관리</button>
									</td>
								</tr>
								<tr>
									<td>카테고리</td>
									<td colspan=3>
										<select name="board_cate">
										<option>:: 카테고리 ::</option>
											<option>호텔 인턴 및 직원 채용</option>
											<option>조리인턴 및 직원채용</option>
											<option>Management Trainee</option>
										</select>
										<button type="button" class="btn btn-xs btn-slategray">카테고리관리</button>
									</td>
								</tr>
								<tr>
									<td>게시판관리자</td>
									<td colspan=3><input type="text" name="board_admin">아이디를 쉼표를 분리(admin,admin1,admin2)</td>
									
								</tr>
								<tr>
									<td>자동 비밀글</td>
									<td colspan=3><label for="fn_secret"><input type="checkbox" id="fn_secret" name="fn_secret" value="Y"> 작성자와 운영자만 열람가능</label></td>
								</tr>
								<tr>
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

											<tr>
												<td>
													<select name="auth_list">
														<option value=0>전체</option>
														<option value=1>관리자</option>
														<option value=3>합격회원</option>
														<option value=5>정회원</option>
														<option value=7>일반회원</option>
													</select>
												</td>
												<td>
													<select name="auth_content">
														<option value=0>전체</option>
														<option value=1>관리자</option>
														<option value=3>합격회원</option>
														<option value=5>정회원</option>
														<option value=7>일반회원</option>
													</select>
												</td>
												<td>
													<select name="auth_write">
														<option value=0>전체</option>
														<option value=1>관리자</option>
														<option value=3>합격회원</option>
														<option value=5>정회원</option>
														<option value=7>일반회원</option>
													</select>
												</td>
												<td>
													<select name="auth_repost">
														<option value=0>전체</option>
														<option value=1>관리자</option>
														<option value=3>합격회원</option>
														<option value=5>정회원</option>
														<option value=7>일반회원</option>
													</select>
												</td>
												<td>
													<select name="auth_reply">
														<option value=0>전체</option>
														<option value=1>관리자</option>
														<option value=3>합격회원</option>
														<option value=5>정회원</option>
														<option value=7>일반회원</option>
													</select>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>권한이 없을경우</td>
									<td colspan=3>
										경고메세지:<input type="text" name="warn_message">경고후 이동페이지:<input type="text" name="redirect_url"><br>
										<label for="show_write_btn_y"><input type="radio" name="show_write_btn" id="show_write_btn_y" value="Y"> 글쓰기 버튼이 보이지 않음</label>
										<label for="show_write_btn_n"><input type="radio" name="show_write_btn" id="show_write_btn_n" value="N"> 글쓰기 버튼이 보이고 클릭 시 경고창</label>
									</td>
								</tr>
								<tr>
									<td>이미지크기</td>
									<td colspan=3>
									목록페이지 : <input type="text" style="width:60px;" name="thumbnail_size">픽셀&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp보기페이지 : <input type="text" style="width:60px;" name="detail_size">픽셀
									</td>
								</tr>
								<tr>
									<td>이미지파일</td>
									<td colspan=3><input type="checkbox" name="attach_img_view">첨부파일이 이미지인 경우 보기 페이지에서 이미지 감추기</td>
								</tr>
								<tr>
									<td>이미지 첨부파일 정렬</td>
									<td colspan=3>
										<label for="align_img_l"><input type="radio" name="align_img" id="align_img_l" value="left">좌측정렬</label>
										<label for="align_img_c"><input type="radio" name="align_img" id="align_img_c" value="center">중앙정렬</label>
										<label for="align_img_r"><input type="radio" name="align_img" id="align_img_r" value="right">우측정렬</label>
									</td>
								</tr>
								<tr>
									<td>보기 하단에 목록보기</td>
									<td>
										<label for="fn_viewpage_y"><input type="radio" name="fn_viewpage" id="fn_viewpage_y" value="Y"> 사용함</label>
										<label for="fn_viewpage_n"><input type="radio" name="fn_viewpage" id="fn_viewpage_n" value="N"> 사용안함</label>
									</td>
								</tr>
								<tr>
									<td>스팸글체크기능</td>
									<td colspan=3>
										<label for="fn_spamcheck_y"><input type="radio" name="fn_spamcheck" id="fn_spamcheck_y" value="Y"> 사용함</label>
										<label for="fn_spamcheck_n"><input type="radio" name="fn_spamcheck" id="fn_spamcheck_n" value="N"> 사용안함</label>
									</td>
								</tr>
								<tr>
									<td>날짜형식(목록페이지)</td>
									<td></td>
									<td>글쓴이 형식</td>
									<td></td>
								</tr>
								<tr>
									<td>추천 기능</td>
									<td>
										<label for="fn_recommand_y"><input type="radio" name="fn_recommand" id="fn_recommand_y" value="Y"> 사용함</label>
										<label for="fn_recommand_n"><input type="radio" name="fn_recommand" id="fn_recommand_n" value="N"> 사용안함</label>
									</td>
									<td>코멘트 허용</td>
									<td>
										<label for="fn_reply_y"><input type="radio" name="fn_reply" id="fn_reply_y" value="Y"> 허용함</label>
										<label for="fn_reply_n"><input type="radio" name="fn_reply" id="fn_reply_n" value="N"> 허용안함</label>
									</td>
								</tr>
								<tr>
									<td>파일 업로드</td>
									<td colspan=3>
										<select name="file_upload">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
											<option>10</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>페이지출력수</td>
									<td>
										<select name="page_view">
											<option>10</option>
											<option>20</option>
											<option>30</option>
											<option>40</option>
											<option>50</option>
											<option>60</option>
											<option>70</option>
											<option>80</option>
											<option>90</option>
											<option>100</option>
										</select>
									</td>
									<td>리스트출력수</td>
									<td>
										<select name="list_view">
											<option>10</option>
											<option>20</option>
											<option>30</option>
											<option>40</option>
											<option>50</option>
											<option>60</option>
											<option>70</option>
											<option>80</option>
											<option>90</option>
											<option>100</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>new 기간설정</td>
									<td><input type="text" name="new_period"></td>
									<td>hot 조회수설정</td>
									<td><input type="text" name="hot_period"></td>
								</tr>

								<tr>
									<td>욕설 비방글 필터링</td>
									<td colspan=3>
										<label for="fn_filter"><input type="checkbox" name="fn_filter" id="fn_filter" value="Y">사용함 (공백없이 단어를 입력하시고, 단어와 단어사이에는 콤마(,)로 구분하세요.)</label>
										<br>
										<textarea name="fn_filter_words" style="width:500px;"></textarea>
									</td>
								</tr>
								<tr>
									<td>메모</td>
									<td><input type="text" name="board_memo"></td>
								</tr>
							</tbody>
						</table>

						<div class="row form-footer">
							<div class="col-sm-offset-2 col-sm-10 text-right">
								<button type="button" class="btn btn-default btn-sm" onclick="write_board()">등록하기</button>
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
	<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> 
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<script src=" https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-ko-KR.min.js"></script> -->

<script>
	function write_board(){
		let form = $("#board_write_form").serializeArray();
		console.log(form);

		$.ajax({
			url:"/admin/board/regist_board",
			type:"post",
			data:form,
			dataType:"json",
			success:function(resultMsg){
				let code = resultMsg["code"];
				let msg = resultMsg["msg"];
				if(code == 200){
					alert(msg);
					// location.reload();
				} else {
					alert(msg);
				}
			},
			error:function(e){
				console.log(e);
			}
		})
	}
</script>

</body>
</html>



