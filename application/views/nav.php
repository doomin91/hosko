
<header>
    <div class="header_con">
        <h1><a href="/">Hosko</a></h1>

        <nav class="gnb">
            <ul class="gnb_menu">
                <li>
                    <a href="/">HOME</a>
                </li>
                <li>
                    <a href="/company/introduce">HOSKO</a>
                    <ul class="sub">
                        <li><a href="/company/introduce">인사말</a></li>
                        <li><a href="/company/vision">Mission&Vision</a></li>
                        <li><a href="/company/ethics">윤리강령</a></li>
                        <li><a href="/company/organization">사업분야ㆍ실적</a></li>
                        <li><a href="/company/cooperation">산학협력현황</a></li>
                        <li><a href="/company/location">오시는길</a></li>
                    </ul>
                </li>
                <li id="news">
                    <a href="#">공지 & 뉴스</a>
                    <ul class="sub" >
                        <li><a href="#">호스코뉴스</a></li>
                        <li><a href="#">해외취업 후기</a></li>
                        <li><a href="#">출국회원소식</a></li>
                        <li><a href="#">동영상자료실</a></li>
                        <li><a href="#">갤러리</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/recruit?ctg=1">포지션 공고</a>
                    <ul class="sub">
                        <li><a href="/recruit?ctg=1">인턴십</a></li>
                        <li><a href="/recruit?ctg=2">JOB&헤드헌팅</a></li>
                    </ul>
                </li>
                <li id="abroad">
                    <a href="#">해외연수</a>
                    <ul class="sub">
                        <li><a href="#">해외연수</a></li>
                        <li><a href="#">해외현장실습</a></li>
                        <li><a href="#">해외유학</a></li>
                        <li><a href="#">해외취업연수</a></li>
                        <li><a href="#">국내연수</a></li>
                        <li><a href="#">EMT영어캠프</a></li>
                    </ul>
                </li>
                <li id="guide">
                    <a href="#">해외취업가이드</a>
                    <ul class="sub" >
                        <li><a href="#">이력서 가이드</a></li>
                        <li><a href="#">영어인터뷰 대비</a></li>
                        <li><a href="#">스폰서인터뷰 대비</a></li>
                        <li><a href="#">미국대사관인터뷰 대비</a></li>
                        <li><a href="#">해외취업 전략설명회</a></li>
                        <li><a href="#">해외진출 성공스토리</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/consult/qnaList">상담ㆍ신청</a>
                    <ul class="sub">
                        <li><a href="/consult/qnaList">Q&A</a></li>
                        <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                        <li><a href="/consult/visitConsult">방문상담 신청</a></li>
                        <li><a href="/consult/apply">포지션&연수 지원</a></li>
                        <li><a href="/consult/presentationList">설명회 신청</a></li>
                    </ul>
                </li>
            <?php 
                if (($this->session->userdata("USER_ID") == "")){
            ?>
                <li>
                    <a href="/member/member_input_step1">회원가입</a>                    
                </li>
            <?php 
                }else{
            ?>
                <li>
                    <a href="#">마이페이지</a>
                    <ul class="sub">
                        <li><a href="/mypage/memberEdit">정보 관리</a></li>
                        <li><a href="/mypage/memberResumeRegist">이력서 작성</a></li>
                        <li><a href="/mypage/submissionDoc">제출서류 관리</a></li>
                    </ul>
                </li>
            <?php 
                }
            ?>
            </ul>
        </nav>

        <div class="header_util">
            <ul>
                <li>
                <?php if (($this->session->userdata("USER_ID") == "")){ ?>
                    <span class="header_login">
                        <img src="/static/front/img/header_login_icon.png">
                        <a href="/member/login">Login</a>
                    </span>
                <?php }else{ ?>
                    <span class="header_login">
                        <img src="/static/front/img/header_login_icon.png">
                        <a href="/member/logout">Logout</a>
                    </span>
                <?php } ?>
                </li>
                <li>
                    <a href="#" class="header_totalmenu"><img src="/static/front/img/header_totalmenu_icon.png"></a>    
                </li>
            </ul>
        </div>

    </div>
</header>


<header class="m_header">
	<div id="m_top_area" class="clearfix">
		<div class="m_left_area"></div>
		<div id="m_menu_wrap">
			<div id="menu">
                <div class="loginbox">
                <ul>
            <?php 
                if (($this->session->userdata("USER_ID") == "")){
            ?>
                    <li><a href="/member/login">로그인</a></li>
            <?php 
                }else{
            ?>                    
                    <li class="loginid"><?php echo $this->session->userdata("USER_NAME"); ?></li>
                    <li class="mypage"><a href="/mypage/memberEdit">마이페이지</a></li>
                    <li class="logout"><a href="/member/logout">로그아웃</a></li>
            <?php
                }
            ?>
                </ul>
                </div>

				<a href="#none" class="close"></a>
				<ul id="m_menu" class="gnb clearfix">
					<li>
						<a href="#" class="depth1_title">HOSKO</a>
						<ul class="mb_sub_menu gnb">
							<li><a href="/company/introduce">인사말</a></li>
                            <li><a href="/company/vision">Mission & Vision</a></li>
                            <li><a href="/company/ethics">윤리강령</a></li>
                            <li><a href="/company/organization">사업분야ㆍ실적</a></li>
                            <li><a href="/company/cooperation">산학협력현황</a></li>
                            <li><a href="/company/location">오시는길</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class="depth1_title">공지&뉴스</a>
						<ul class="mb_sub_menu gnb">
							<li><a href="/Board/q/1?seq=1">호스코뉴스</a></li>
                            <li><a href="/Board/q/1?seq=2">해외취업후기</a></li>
                            <li><a href="/Board/q/1?seq=3">출국회원소식</a></li>
                            <li><a href="/Board/v/1?seq=4">동영상자료실</a></li>
                            <li><a href="/Board/g/1?seq=5">갤러리</a></li>
						</ul>
					</li>
                    <li>
						<a href="#" class="depth1_title">포지션 공고</a>
						<ul class="mb_sub_menu gnb">
							<li><a href="/recruit?ctg=1">인턴쉽</a></li>
                            <li><a href="/recruit?ctg=2">JOBㆍ헤드헌팅</a></li>
						</ul>
					</li>
                    <li>
						<a href="#" class="depth1_title">해외연수</a>
						<ul class="mb_sub_menu gnb">
							<li><a href="/Board/q/3?seq=12">해외연수</a></li>
                            <li><a href="/Board/q/3?seq=13">해외현장실습</a></li>
                            <li><a href="/Board/q/3?seq=14">해외유학</a></li>
                            <li><a href="/Board/q/3?seq=15">해외취업연수</a></li>
                            <li><a href="/Board/q/3?seq=16">국내연수</a></li>
                            <li><a href="/Board/q/3?seq=17">EMT영어캠프</a></li>
						</ul>
					</li>
                    <li>
						<a href="#" class="depth1_title">해외취업가이드</a>
						<ul class="mb_sub_menu gnb">
							<li><a href="/Board/q/2?seq=6">이력서 가이드</a></li>
                            <li><a href="/Board/q/2?seq=7">영어인터뷰 대비</a></li>
                            <li><a href="/Board/q/2?seq=8">스폰서인터뷰 대비</a></li>
                            <li><a href="/Board/q/2?seq=9">미국대사관 인터뷰대비</a></li>
                            <li><a href="/Board/q/2?seq=10">해외취업 전략설명회</a></li>
                            <li><a href="/Board/q/2?seq=11">해외진출 성공스토리</a></li>
						</ul>
					</li>
                    <li>
						<a href="#" class="depth1_title">상담신청</a>
						<ul class="mb_sub_menu gnb">
							<li><a href="/consult/qnaList">Q&A</a></li>
                            <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                            <li><a href="/consult/visitConsult">포지션&연수 지원</a></li>
                            <li><a href="/consult/apply">설명회신청</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="bg_shadow"></div>
		<div class="logo">
			<a href="/"></a>
		</div>
		<div class="m_right_area">
			<a href="tel:02-2052-9700" class="tel"></a>
			<a href="http://pf.kakao.com/_ZrXjxl/chat" target="_blank" class="talk"></a>
		</div>
	</div>
</header>



<script>

    $(function(){
        
        $('#m_top_area .m_left_area').on('click', function(){
            $('#m_menu_wrap').animate({
                left: "0px"
            }, 500);
            
            $('.bg_shadow').css('display', 'block');
            $('body').css('overflow', 'hidden');
        });
        
        $('#m_menu_wrap .close').on('click', function(){
            
            $('#m_menu_wrap').animate({
                left: "-700px"
            }, 500);
            
            $('.bg_shadow').css('display', 'none');
            $('body').css('overflow', 'auto');
            $('#m_menu li > a').next().slideUp();
        });
        
        $('#m_menu li > a').on('click', function(){
            $(this).next().slideToggle();
        });
        
    });




	ViewBoardMenu();
	function ViewBoardMenu(){
		let str = "";
		$.ajax({
			url:"/Board/get_boards",
			type:"post",
			dataType:"json",
			success: function(data){
				let board = data["board"];
				let group = data["group"];
                // console.log(group);
                // console.log(board);
                let news = "";
                let guide = "";

				$.each(group, function(index, value){
                    switch(value["GP_SEQ"]){
                        // 공지 & 뉴스와 연결
                        case "1":
                            news = "<a href=\"/board/q/" + value["GP_SEQ"] + "\">" + value["GP_NAME"] + "</a>";
                            break;
                        // 해외취업가이드와 연결
                        case "2":
                            guide = "<a href=\"/board/q/" + value["GP_SEQ"] + "\">" + value["GP_NAME"] + "</a>";
                            break;
                        case "3":
                            abroad = "<a href=\"/board/q/" + value["GP_SEQ"] + "\">" + value["GP_NAME"] + "</a>";
                            break;
                            
                    }
				});
                
                news += "<ul class=\"sub\" style=\"display:none;\">";
                guide += "<ul class=\"sub\" style=\"display:none;\">";
                abroad += "<ul class=\"sub\" style=\"display:none;\">";

/** 나중에 함수형으로 수정 */
                $.each(board, function(index, value){
                    switch(value["GP_SEQ"]){
                        case "1":
                            switch(value["BOARD_TYPE"]){
                                case "0": 
                                    news += "<li><a href=\"/Board/q/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "1":
                                    news += "<li><a href=\"/Board/g/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "2":
                                    news += "<li><a href=\"/Board/v/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                            }
                            break;
                        case "2":
                            switch(value["BOARD_TYPE"]){
                                case "0": 
                                    guide += "<li><a href=\"/Board/q/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "1":
                                    guide += "<li><a href=\"/Board/g/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "2":
                                    guide += "<li><a href=\"/Board/v/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                            }
                            break;
                        case "3":
                            switch(value["BOARD_TYPE"]){
                                case "0": 
                                    abroad += "<li><a href=\"/Board/q/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "1":
                                    abroad += "<li><a href=\"/Board/g/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "2":
                                    abroad += "<li><a href=\"/Board/v/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                            }
                            break;
                    }  
                })

                news += "</ul>";
                guide += "</ul>";
                abroad += "</ul>";


                $("#news").html(news);
                $("#guide").html(guide);
                $("#abroad").html(abroad);

                //$("#boardMenu").append(str);
			}, error: function(e){
				console.log(e);
			}
		})
	}








</script>