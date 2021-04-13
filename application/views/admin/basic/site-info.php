<?php
  include_once dirname(__DIR__)."/admin-header.php";
?>
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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>사이트 정보</b></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="index.html">기본설정</a></li>
				<li class="active">사이트 정보</li>
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
					<form name="contentsForm" id="contentsForm">
					<div class="tile-body">
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="15%"/>
								<col width="35%"/>
								<col width="15%"/>
								<col width="35%"/>
							</colgroup>
							<tbody>
								<tr>
									<th>사이트명</th>
									<td><input type="text" name="site_name" value="<?php echo $info->SITE_NAME; ?>" size="50"></td>
									<th>사이트 URL</th>
									<td><input type="text" name="site_url" value="<?php echo $info->SITE_URL; ?>" size="50"></td>
								</tr>
								<tr>
									<th>관리자 이메일</th>
									<td><input type="text" name="site_admin_email" value="<?php echo $info->SITE_ADMIN_EMAIL; ?>" size="50"></td>
									<th>관리자 연락처</th>
									<td><input type="text" name="site_admin_tel" value="<?php echo $info->SITE_ADMIN_TEL; ?>" size="50"></td>
								</tr>
								<tr>
									<th>관리자 휴대폰</th>
									<td><input type="text" name="site_admin_hp" value="<?php echo $info->SITE_ADMIN_HP; ?>" size="50"></td>
									<th>&nbsp;</th>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tile-body">
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="15%"/>
								<col width="35%"/>
								<col width="15%"/>
								<col width="35%"/>
							</colgroup>
							<tbody>
								<tr>
									<th>FTP 접속 주소(ip, 도메인)</th>
									<td><input type="text" name="ftp_ip" value="<?php echo $info->FTP_IP; ?>" size="50"></td>
									<th>&nbsp;</th>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th>아이디</th>
									<td><input type="text" name="ftp_id" value="<?php echo $info->FTP_ID; ?>" size="50"></td>
									<th>비밀번호</th>
									<td><input type="text" name="ftp_pw" value="<?php echo $info->FTP_PW; ?>" size="50"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tile-body">
						<div class="row">
							<div class="col-lg-12 text-right">
								<a href="#modalDomain" role="button" class="btn btn-default btn-xs" data-toggle="modal">등록하기</a>
							</div>
						</div>
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="5%"/>
								<col width="35%"/>
								<col width="15%"/>
								<col width="15%"/>
								<col width="10%"/>
								<col width="10%"/>
								<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th>No.</th>
									<th>도메인</th>
									<th>구입 사이트</th>
									<th>아이디</th>
									<th>비밀번호</th>
									<th>만료일</th>
									<th>기능</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$num = 1;
								foreach ($domains as $domain){
							?>
								<tr>
									<td><?php echo $num; ?></td>
									<td><?php echo $domain->DOMAIN_NAME; ?></td>
									<td><?php echo $domain->DOMAIN_BUY_SITE; ?></td>
									<td><?php echo $domain->DOMAIN_BUY_ID; ?></td>
									<td><?php echo substr($domain->DOMAIN_BUY_PASS, 0, 2);?>****</td>
									<td><?php echo $domain->DOMAIN_EXPIRATION_DATE; ?></td>
									<td>
										<button type="button" class="btn btn-default btn-xs domainModify" data-key="<?php echo $domain->DOMAIN_SEQ; ?>" data-json='<?php echo json_encode($domain); ?>'>수정</button>
										<button type="button" class="btn btn-danger btn-xs domainDelete" data-key='<?php echo $domain->DOMAIN_SEQ; ?>'>삭제</button>
									</td>
								</tr>
							<?php
									$num++;
								}
							?>
							</tbody>
						</table>
					</div>
					<div class="tile-body">
						<div class="row">
							<div class="col-lg-12 text-right">
								<a href="#modalEmail" role="button" class="btn btn-default btn-xs" data-toggle="modal">등록하기</a>
							</div>
						</div>
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="5%"/>
								<col width="40%"/>
								<col width="15%"/>
								<col width="15%"/>
								<col width="15%"/>
								<col width="10%"/>
							</colgroup>
							<thead>
								<tr>
									<th>No.</th>
									<th>이메일</th>
									<th>사용자명</th>
									<th>아이디</th>
									<th>비밀번호</th>
									<th>기능</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$num2 = 1;
								foreach ($emails as $email){
							?>
								<tr>
									<td><?php echo $num2; ?></td>
									<td><?php echo $email->EMAIL_ADDR; ?></td>
									<td><?php echo $email->EMAIL_USER; ?></td>
									<td><?php echo $email->EMAIL_ID; ?></td>
									<td><?php echo substr($email->EMAIL_PASS, 0, 2);?>****</td>
									<td>
										<button type="button" class="btn btn-default btn-xs emailModify" data-key="<?php echo $email->EMAIL_SEQ; ?>"data-json='<?php echo json_encode($email); ?>'>수정</button>
										<button type="button" class="btn btn-danger btn-xs emailDelete" data-key="<?php echo $email->EMAIL_SEQ; ?>">삭제</button>
									</td>
								</tr>
							<?php
									$num2++;
								}
							?>
							</tbody>
						</table>
					</div>
					<div class="tile-body">
						<table class="table table-custom dataTable userTable">
							<colgroup>
								<col width="15%"/>
								<col width="35%"/>
								<col width="15%"/>
								<col width="35%"/>
							</colgroup>
							<tbody>
								<tr>
									<th>사업자 등록번호</th>
									<td><input type="text" name="comp_num" value="<?php echo $info->COMP_NUM; ?>" size="50"></td>
									<th>&nbsp;</th>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th>업체명</th>
									<td><input type="text" name="comp_name" value="<?php echo $info->COMP_NAME; ?>" size="50"></td>
									<th>대표자명</th>
									<td><input type="text" name="comp_ceo_name" value="<?php echo $info->COMP_CEO_NAME; ?>" size="50"></td>
								</tr>
								<tr>
									<th>우편번호</th>
									<td>
										<input type="text" name="comp_zip" id="comp_zip" value="<?php echo $info->COMP_ZIP_CODE; ?>" size="50">
										<button class="btn btn-default btn-sm" id="searchZip">우편번호 검색</button>
									</td>
									<th>&nbsp;</th>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th>주소</th>
									<td><input type="text" name="comp_addr" id="comp_addr" value="<?php echo $info->COMP_ADDR; ?>" size="100"></td>
									<th>&nbsp;</th>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th>업태</th>
									<td><input type="text" name="comp_cate1" value="<?php echo $info->COMP_CATE1; ?>" size="50"></td>
									<th>종목</th>
									<td><input type="text" name="comp_cate2" value="<?php echo $info->COMP_CATE2; ?>" size="50"></td>
								</tr>
								<tr>
									<th>전화번호</th>
									<td><input type="text" name="comp_tel" value="<?php echo $info->COMP_TEL; ?>" size="50"></td>
									<th>팩스번호</th>
									<td><input type="text" name="comp_fax" value="<?php echo $info->COMP_FAX; ?>" size="50"></td>
								</tr>
							</tbody>
						</table>
						 <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <button type="button" class="btn btn-primary btn-sm" id="saveInfo">저장</button>
                            </div>
                        </div>
					</div>
					</form>
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
	<div class="modal fade" id="modalDomain" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
					<h3 class="modal-title" id="modalConfirmLabel">도메인 정보</h3>
				</div>
				<div class="modal-body">
					<form role="form">
					<input type="hidden" name="mode">
					<input type="hidden" name="domain_seq">
						<div class="form-group">
							<label for="domain">도메인</label>
							<input type="text" class="form-control" id="domain" name="domain">
						</div>

						<div class="form-group">
							<label for="buy_site">도메인 구입 사이트</label>
							<input type="text" class="form-control" id="buy_site" name="buy_site">
						</div>

						<div class="form-group">
							<label for="buy_site_id">도메인 사이트 아이디</label>
							<input type="text" class="form-control" id="buy_site_id" name="buy_site_id">
						</div>

						<div class="form-group">
							<label for="buy_site_pass">도메인 사이트 비밀번호</label>
							<input type="text" class="form-control" id="buy_site_pass" name="buy_site_pass">
						</div>

						<div class="form-group">
							<label for="expiration_date">도메인  만료일</label>
							<input type="text" class="form-control datepicker" id="expiration_date" name="expiration_date">
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
					<button id="saveDomain" class="btn btn-green">저장하기</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
					<h3 class="modal-title" id="modalConfirmLabel">이메일 정보</h3>
				</div>
				<div class="modal-body">
					<form name="eForm" role="form">
					<input type="hidden" name="email_mode">
					<input type="hidden" name="email_seq">
						<div class="form-group">
							<label for="email_addr">이메일</label>
							<input type="text" class="form-control" id="email_addr" name="email_addr">
						</div>

						<div class="form-group">
							<label for="email_user">사용자명</label>
							<input type="text" class="form-control" id="email_user" name="email_user">
						</div>

						<div class="form-group">
							<label for="email_id">아이디</label>
							<input type="text" class="form-control" id="email_id" name="email_id">
						</div>

						<div class="form-group">
							<label for="email_pass">비밀번호</label>
							<input type="text" class="form-control" id="email_pass" name="email_pass">
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
					<button id="saveEmail" class="btn btn-green">저장하기</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<?php
		include_once dirname(__DIR__)."/admin-footer.php";
	?>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:1;-webkit-overflow-scrolling:touch;">
	<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnCloseLayer" style="cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" alt="닫기 버튼">
</div>

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
	        color: "black"
	    });
		$(".datepicker").datepicker();

		$(document).on("click", "#saveDomain", function(){
			var domain = $("input[name=domain]").val();
			var buy_site = $("input[name=buy_site]").val();
			var buy_site_id = $("input[name=buy_site_id]").val();
			var buy_site_pass = $("input[name=buy_site_pass]").val();
			var expiration_date = $("input[name=expiration_date]").val();
			var mode = $("input[name=mode]").val();
			var domain_seq = $("input[name=domain_seq]").val();

			if (domain == ""){
				alert("도메인을 입력해주세요");
				return false;
			}

			if (buy_site == ""){
				alert("도메인 구입 사이트를 입력해주세요");
				return false;
			}

			$.ajax({
				url:"/admin/Basic/setDomain",
				type:"post",
				dataType:"json",
				data : {
					"domain" : domain,
					"buy_site" : buy_site,
					"buy_site_id" : buy_site_id,
					"buy_site_pass" : buy_site_pass,
					"expiration_date" : expiration_date,
					"mode" : mode,
					"domain_seq" : domain_seq
				}, success:function(data){
					if (data.code == "200"){
						alert(data.msg);
						//$("#modalDomain").modal("hide");
						document.location.reload();
					}
				}, error:function(e){
					console.log(e);
				}
			})
		});

		$(document).on("click", ".domainModify", function(){
			var domain_data = $(this).data("json");

			//console.log(domain_data);
			$("input[name=mode]").val("modify");
			$("input[name=domain_seq]").val(domain_data.DOMAIN_SEQ);
			$("input[name=domain]").val(domain_data.DOMAIN_NAME);
			$("input[name=buy_site]").val(domain_data.DOMAIN_BUY_SITE);
			$("input[name=buy_site_id]").val(domain_data.DOMAIN_BUY_ID);
			$("input[name=buy_site_pass]").val(domain_data.DOMAIN_BUY_PASS);
			$("input[name=expiration_date]").val(domain_data.DOMAIN_EXPIRATION_DATE);

			$("#modalDomain").modal("show");
		});

		$(document).on("click", ".domainDelete", function(){
			var domain_seq = $(this).data("key");
			if (confirm("도매인 정보를 삭제하시겠습니까?")){
				$.ajax({
					url:"/admin/Basic/deleteDomain",
					type:"post",
					dataType:"json",
					data : {
						"domain_seq" : domain_seq
					}, success:function(data){
						if (data.code == "200"){
							alert(data.msg);
							//$("#modalDomain").modal("hide");
							document.location.reload();
						}
					}, error:function(e){
						console.log(e);
					}
				})
			}
		});

		$(document).on("click", "#saveEmail", function(){
			var email_addr = $("input[name=email_addr]").val();
			var email_user = $("input[name=email_user]").val();
			var email_id = $("input[name=email_id]").val();
			var email_pass = $("input[name=email_pass]").val();
			var email_mode = $("input[name=email_mode]").val();
			var email_seq = $("input[name=email_seq]").val();

			if (email_addr == ""){
				alert("이메일 주소를 입력해주세요");
				return false;
			}

			if (email_user == ""){
				alert("이메일 유저를 입력해주세요");
				return false;
			}

			$.ajax({
				url:"/admin/Basic/setEmail",
				type:"post",
				dataType:"json",
				data : {
					"email_addr" : email_addr,
					"email_user" : email_user,
					"email_id" : email_id,
					"email_pass" : email_pass,
					"email_mode" : email_mode,
					"email_seq" : email_seq
				}, success:function(data){
					if (data.code == "200"){
						alert(data.msg);
						//$("#modalDomain").modal("hide");
						document.location.reload();
					}
				}, error:function(e){
					console.log(e);
				}
			})
		});

		$(document).on("click", ".emailModify", function(){
			var email_data = $(this).data("json");

			$("input[name=email_mode]").val("modify");
			$("input[name=email_addr]").val(email_data.EMAIL_ADDR);
			$("input[name=email_user]").val(email_data.EMAIL_USER);
			$("input[name=email_id]").val(email_data.EMAIL_ID);
			$("input[name=email_pass]").val(email_data.EMAIL_PASS);
			$("input[name=email_seq]").val(email_data.EMAIL_SEQ);

			$("#modalEmail").modal("show");
		});

		$(document).on("click", ".emailDelete", function(){
			var email_seq = $(this).data("key");
			if (confirm("이메일 정보를 삭제하시겠습니까?")){
				$.ajax({
					url:"/admin/Basic/deleteEmail",
					type:"post",
					dataType:"json",
					data : {
						"email_seq" : email_seq
					}, success:function(data){
						if (data.code == "200"){
							alert(data.msg);
							//$("#modalDomain").modal("hide");
							document.location.reload();
						}
					}, error:function(e){
						console.log(e);
					}
				})
			}
		});

		$(document).on("click", "#saveInfo", function(){
			var formData = $("#contentsForm").serialize();

			$.ajax({
				url:"/admin/Basic/setInfo",
				type:"post",
				dataType:"json",
				data : formData,
				success:function(data){
					console.log(data);
					if (data.code == "200"){
						alert(data.msg);
						//$("#modalDomain").modal("hide");
						document.location.reload();
					}
				}, error:function(e){
					console.log(e);
				}
			})
		});

		$(document).on("click", "#searchZip", function(){
			sample2_execDaumPostcode();
		});

		$(document).on("click", "#btnCloseLayer", function(){
			console.log("asdfasdfsadf");
			closeDaumPostcode();
		});

		// 우편번호 찾기 화면을 넣을 element
		var element_layer = document.getElementById('layer');

		function closeDaumPostcode() {
			// iframe을 넣은 element를 안보이게 한다.
			element_layer.style.display = 'none';
		}

		function sample2_execDaumPostcode() {
			var addr = ''; // 주소 변수
			var extraAddr = ''; // 참고항목 변수

			new daum.Postcode({
				oncomplete: function(data) {
					// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

					// 각 주소의 노출 규칙에 따라 주소를 조합한다.
					// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.


					//사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
					if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
						addr = data.roadAddress;
					} else { // 사용자가 지번 주소를 선택했을 경우(J)
						addr = data.jibunAddress;
					}

					// 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
					if(data.userSelectedType === 'R'){
						// 법정동명이 있을 경우 추가한다. (법정리는 제외)
						// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
						if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
							extraAddr += data.bname;
						}
						// 건물명이 있고, 공동주택일 경우 추가한다.
						if(data.buildingName !== '' && data.apartment === 'Y'){
							extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
						}
						// 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
						if(extraAddr !== ''){
							extraAddr = ' (' + extraAddr + ')';
						}
						// 조합된 참고항목을 해당 필드에 넣는다.
						//document.getElementById("sample2_extraAddress").value = extraAddr;

					} else {
						//document.getElementById("sample2_extraAddress").value = '';
					}

					// 우편번호와 주소 정보를 해당 필드에 넣는다.
					document.getElementById('comp_zip').value = data.zonecode;
					document.getElementById("comp_addr").value = addr+extraAddr;
					// 커서를 상세주소 필드로 이동한다.
					document.getElementById("comp_addr").focus();

					// iframe을 넣은 element를 안보이게 한다.
					// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
					element_layer.style.display = 'none';
				},
				width : '100%',
				height : '100%',
				maxSuggestItems : 5
			}).embed(element_layer);

			// iframe을 넣은 element를 보이게 한다.
			element_layer.style.display = 'block';

			// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
			initLayerPosition();
		}

		// 브라우저의 크기 변경에 따라 레이어를 가운데로 이동시키고자 하실때에는
		// resize이벤트나, orientationchange이벤트를 이용하여 값이 변경될때마다 아래 함수를 실행 시켜 주시거나,
		// 직접 element_layer의 top,left값을 수정해 주시면 됩니다.
		function initLayerPosition(){
			var width = 500; //우편번호서비스가 들어갈 element의 width
			var height = 400; //우편번호서비스가 들어갈 element의 height
			var borderWidth = 2; //샘플에서 사용하는 border의 두께

			// 위에서 선언한 값들을 실제 element에 넣는다.
			element_layer.style.width = width + 'px';
			element_layer.style.height = height + 'px';
			element_layer.style.border = borderWidth + 'px solid';
			// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
			element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2 - borderWidth) + 'px';
			element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 'px';
		}
	});
</script>
