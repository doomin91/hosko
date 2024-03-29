<header>
    <div class="header_con">
        <h1><a href="/">Hosko</a></h1>

        <nav class="gnb">
            <ul class="gnb_menu">
                <li>
                    <a href="/">HOME</a>
                </li>
                <li>
                    <a href="/m/company/introduce">HOSKO</a>
                    <ul class="sub">
                        <li><a href="/m/company/introduce">인사말</a></li>
                        <li><a href="/m/company/vision">Mission&Vision</a></li>
                        <li><a href="/m/company/ethics">윤리강령</a></li>
                        <li><a href="/m/company/organization">사업분야ㆍ실적</a></li>
                        <li><a href="/m/company/cooperation">산학협력현황</a></li>
                        <li><a href="/m/company/location">오시는길</a></li>
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
                    <a href="/m/recruit?ctg=1">포지션 공고</a>
                    <ul class="sub">
                        <li><a href="/m/recruit?ctg=1">인턴십</a></li>
                        <li><a href="/m/recruit?ctg=2">JOB&헤드헌팅</a></li>
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
                    <a href="/m/consult/qnaList">상담ㆍ신청</a>
                    <ul class="sub">
                        <li><a href="/m/consult/qnaList">Q&A</a></li>
                        <li><a href="/m/consult/onlineConsultList">온라인 상담</a></li>
                        <li><a href="/m/consult/visitConsult">방문상담 신청</a></li>
                        <li><a href="/m/consult/apply">포지션&연수 지원</a></li>
                        <li><a href="/m/consult/presentationList">설명회 신청</a></li>
                    </ul>
                </li>
            <?php 
                if (($this->session->userdata("USER_ID") == "")){
            ?>
                <li>
                    <a href="/m/member/member_input_step1">회원가입</a>                    
                </li>
            <?php 
                }else{
            ?>
                <li>
                    <a href="#">마이페이지</a>
                    <ul class="sub">
                        <li><a href="/m/mypage/memberEdit">정보 관리</a></li>
                        <li><a href="/m/mypage/memberResumeRegist">이력서 작성</a></li>
                        <li><a href="/m/mypage/submissionDoc">제출서류 관리</a></li>
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
                        <a href="/m/member/login">Login</a>
                    </span>
                <?php }else{ ?>
                    <span class="header_login">
                        <img src="/static/front/img/header_login_icon.png">
                        <a href="/m/member/logout">Logout</a>
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

<script>

	ViewBoardMenu();
	function ViewBoardMenu(){
		let str = "";
		$.ajax({
			url:"/m/Board/get_boards",
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
                            news = "<a href=\"/m/board/q/" + value["GP_SEQ"] + "\">" + value["GP_NAME"] + "</a>";
                            break;
                        // 해외취업가이드와 연결
                        case "2":
                            guide = "<a href=\"/m/board/q/" + value["GP_SEQ"] + "\">" + value["GP_NAME"] + "</a>";
                            break;
                        case "3":
                            abroad = "<a href=\"/m/board/q/" + value["GP_SEQ"] + "\">" + value["GP_NAME"] + "</a>";
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
                                    news += "<li><a href=\"/m/Board/q/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "1":
                                    news += "<li><a href=\"/m/Board/g/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "2":
                                    news += "<li><a href=\"/m/Board/v/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                            }
                            break;
                        case "2":
                            switch(value["BOARD_TYPE"]){
                                case "0": 
                                    guide += "<li><a href=\"/m/Board/q/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "1":
                                    guide += "<li><a href=\"/m/Board/g/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "2":
                                    guide += "<li><a href=\"/m/Board/v/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                            }
                            break;
                        case "3":
                            switch(value["BOARD_TYPE"]){
                                case "0": 
                                    abroad += "<li><a href=\"/m/Board/q/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "1":
                                    abroad += "<li><a href=\"/m/Board/g/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
                                    break;
                                case "2":
                                    abroad += "<li><a href=\"/m/Board/v/" + value["GP_SEQ"] + "?seq="+ value["BOARD_SEQ"]+"\">" + value["BOARD_KOR_NAME"] + "</a></li>";
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