<div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">



<!-- Branding -->
<div class="navbar-header col-md-2">
  <a class="navbar-brand" href="#">
	<strong>Hospitiality</strong>KOREA
  </a>
  <div class="sidebar-collapse">
	<a href="#">
	  <i class="fa fa-bars"></i>
	</a>
  </div>
</div>
<!-- Branding end -->


<!-- .nav-collapse -->
<div class="navbar-collapse">

  <!-- Page refresh -->
  <ul class="nav navbar-nav refresh hidden">
	<li class="divided">
	  <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
	</li>
  </ul>
  <!-- /Page refresh -->

  <!-- Search -->
  <div class="search hidden" id="main-search">
	<i class="fa fa-search"></i> <input type="text" placeholder="Search...">
  </div>
  <!-- Search end -->


  <!-- Sidebar -->
  <ul class="nav navbar-nav side-nav" id="sidebar">

	<li class="collapsed-content">
	  <ul>
		<li class="search"><!-- Collapsed search pasting here at 768px --></li>
	  </ul>
	</li>

	<li class="navigation" id="navigation">
	  <a href="#" class="sidebar-toggle" data-toggle="#navigation">Navigation <i class="fa fa-angle-up"></i></a>

	  <ul class="menu">

		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<i class="fa fa-circle-o" aria-hidden="true"></i> 기본설정 <b class="fa fa-plus dropdown-plus"></b>
		  </a>
		  <ul class="dropdown-menu">
			<!--
		 	<li>
			  <a href="/administrator/en/notice">
				<i class="fa fa-caret-right"></i> 대시보드
			  </a>
			</li>
			-->
			<li>
				<?php if (strpos($this->session->userdata("admin_permi"), "basic_01") !== false): ?>  
				<a href="/admin/basic/siteInfo">
					<i class="fa fa-caret-right"></i> 사이트정보	
			  	</a>
				<?php else: ?>
				<a href="javascript:alert('권한이 없습니다.');">
					<i class="fa fa-caret-right"></i> 사이트정보	
			  	</a>
				<?php endif; ?>
			</li>
			<li>
				<?php if (strpos($this->session->userdata("admin_permi"), "basic_02") !== false): ?>  
				<a href="/admin/basic/managers">
					<i class="fa fa-caret-right"></i> 관리자 설정
				</a>
				<?php else: ?>
				<a href="javascript:alert('권한이 없습니다.');">
					<i class="fa fa-caret-right"></i> 관리자 설정
			  	</a>
				<?php endif; ?>
			</li>
			<li>
				<?php if (strpos($this->session->userdata("admin_permi"), "basic_03") !== false): ?>  
				<a href="/admin/basic/popupList">
					<i class="fa fa-caret-right"></i> 팝업관리
				</a>
				<?php else: ?>
				<!--<a href="javascript:alert('권한이 없습니다.');">-->
				<a href="/admin/basic/popupList">
					<i class="fa fa-caret-right"></i> 팝업관리
			  	</a>
				<?php endif; ?>
			</li>
			<!--
			<li>
			  <a href="/administrator/en/brochure">
				<i class="fa fa-caret-right"></i> 접속통계
			  </a>
			</li>
			<li>
			  <a href="/administrator/en/manual">
				<i class="fa fa-caret-right"></i> 회원접속 현황
			  </a>
			</li>
			-->
		  </ul>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-circle-o" aria-hidden="true"></i> 회원관리 <b class="fa fa-plus dropdown-plus"></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_01") !== false): ?>  
					<a href="/admin/user">
						<i class="fa fa-caret-right"></i> 회원목록
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 회원목록
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_02") !== false): ?>  
					<a href="/admin/user/userLevel">
						<i class="fa fa-caret-right"></i> 등급관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 등급관리
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_03") !== false): ?>  
					<a href="#">
						<i class="fa fa-caret-right"></i> 탈퇴회원
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 탈퇴회원
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_04") !== false): ?>  
					<a href="/admin/user/userStatics">
						<i class="fa fa-caret-right"></i> 회원분석(국가/전공/성별)
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 회원분석(국가/전공/성별)
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_07") !== false): ?>  
					<a href="/admin/user/mailFormList">
						<i class="fa fa-caret-right"></i> 메일폼 관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 메일폼 관리
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_05") !== false): ?>  
					<a href="/admin/user/emailSend">
						<i class="fa fa-caret-right"></i> 메일발송관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 메일발송관리
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "user_06") !== false): ?>  
					<a href="/admin/user/smsSend">
						<i class="fa fa-caret-right"></i> SMS발송관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> SMS발송관리
					</a>
					<?php endif; ?>
				</li>
			  </ul>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-circle-o" aria-hidden="true"></i> 상담관리 <b class="fa fa-plus dropdown-plus"></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_01") !== false): ?>  
					<a href="/admin/consult/qnaList">
						<i class="fa fa-caret-right"></i> QnA 게시판
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> QnA 게시판
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_02") !== false): ?>  
					<a href="/admin/consult/onlineConsult">
						<i class="fa fa-caret-right"></i> 온라인상담
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 온라인상담
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_03") !== false): ?>  
					<a href="/admin/consult/visitConsult">
						<i class="fa fa-caret-right"></i> 방문상담
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 방문상담
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_04") !== false): ?>  
					<a href="#">
						<i class="fa fa-caret-right"></i> 정기설명회
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 정기설명회
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_05") !== false): ?>  
					<a href="/admin/consult/callConsultList">
						<i class="fa fa-caret-right"></i> 전화상담이력
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 전화상담이력
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_06") !== false): ?>  
					<a href="/admin/consult/schedule?flag=hosko">
						<i class="fa fa-caret-right"></i> HOSKO 일정
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> HOSKO 일정
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_07") !== false): ?>  
					<a href="/admin/consult/schedule?flag=presentation">
						<i class="fa fa-caret-right"></i> 설명회 일정
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 설명회 일정
					</a>
					<?php endif; ?>
				</li>
				
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "consult_08") !== false): ?>  
					<a href="/admin/consult/presentationList">
						<i class="fa fa-caret-right"></i> 설명회 관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 설명회 관리
					</a>
					<?php endif; ?>
				</li>
			</ul>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-circle-o" aria-hidden="true"></i> 수속관리 <b class="fa fa-plus dropdown-plus"></b>
			</a>
			<ul class="dropdown-menu">
				
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "apply_02") !== false): ?>  		
					<a href="/admin/recruit">
						<i class="fa fa-caret-right"></i> 수속신청현황
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 수속신청현황
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "apply_03") !== false): ?>  	
					<a href="/admin/recruit/recruit_resume_list">
						<i class="fa fa-caret-right"></i> 이력서관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 이력서관리
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "apply_04") !== false): ?>  	
					<a href="/admin/recruit/recruit_document_list/?doc_status=2">
						<i class="fa fa-caret-right"></i> 수속서류관리
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 수속서류관리
					</a>
					<?php endif; ?>
				</li>
				<!-- <li>
				  <a href="#">
					<i class="fa fa-caret-right"></i> 입금 및 환불
				  </a>
				</li>
				<li>
				  <a href="#">
					<i class="fa fa-caret-right"></i> 수속포기자
				  </a>
				</li> -->
				<li>
					<a href="/admin/recruit/recruit_certificate_list">
						<i class="fa fa-caret-right"></i> 출국 및 증명서
					</a>
				</li>
			</ul>
		</li>

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-circle-o" aria-hidden="true"></i> 게시판관리 <b class="fa fa-plus dropdown-plus"></b>
			</a>
			<ul class="dropdown-menu" id="boardMenu">
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "apply_01") !== false): ?>  	
					<a href="/admin/recruit/recruit_abroad_list">
						<i class="fa fa-caret-right"></i> 포지션공고
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 포지션공고
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "board_01") !== false): ?>  	
					<a href="/admin/board/board_write">
						<i class="fa fa-caret-right"></i> 게시판 등록
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 게시판 등록
					</a>
					<?php endif; ?>
				</li>
				<li>
					<?php if (strpos($this->session->userdata("admin_permi"), "board_02") !== false): ?>  	
					<a href="/admin/board/board_list">
						<i class="fa fa-caret-right"></i> 게시판 현황
					</a>
					<?php else: ?>
					<a href="javascript:alert('권한이 없습니다.');">
						<i class="fa fa-caret-right"></i> 게시판 현황
					</a>
					<?php endif; ?>
				</li>
			</ul>

		</li>

	  </ul>
	</li>
	<li class="navigation">
		<ul class="menu">
			<li>
				<a href="/admin/home/logout">
					<i class="fa fa-power-off"></i> 로그아웃
				</a>
			</li>
			<li>
				<a href="/" target="_blank">
					<i class="fa fa-home"></i> 홈페이지 이동
				</a>
			</li>	
		</ul>
	</li>
  </ul>
  <!-- Sidebar end -->





</div>
<!--/.nav-collapse -->


</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script>
	ViewBoardMenu();
	function ViewBoardMenu(){
		let str = "";
		$.ajax({
			url:"/admin/Board/get_boards",
			type:"post",
			dataType:"json",
			success:function(data){
				let board = data["board"];
				let group = data["group"];

				str += "<li>&nbsp</li>";
				$.each(group, function(index, value){
					str += "<li class=\"dropdown\">"
					str += "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">"
					str += "<i class=\"fa fa-caret-right\"></i>" + value["GP_NAME"] + " <b class=\"fa fa-plus dropdown-plus\"></b>"
					str += "</a>";
					str += "<ul class=\"dropdown-menu\">";
					$.each(board, function(index2, value2){
							if(value["GP_SEQ"] == value2["BOARD_GROUP"]){
								str += "<li>";
								str += "<a href=\"/admin/board/post_list/" + value2["BOARD_SEQ"] + "\">";
								str += "<i class=\"fa fa-caret-right\"></i> " + value2["BOARD_KOR_NAME"];
								str += "</a>"
								str += "</li>";
							}
					})
					str += "</ul>";
					str += "</li>";
				});
				$("#boardMenu").append(str);
			}, error:function(e){
				console.log(e);
			}
		})
	}

</script>
