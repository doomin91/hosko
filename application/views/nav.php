<header>
    <div class="header_con">
        <h1><a href="/">Hosko</a></h1>

        <nav class="gnb">
            <ul class="gnb_menu">
                <li>
                    <a href="#">HOME</a>
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

                </li>
                <li>
                    <a href="/recruit?ctg=1">포지션 공고</a>
                    <ul class="sub">
                        <li><a href="/recruit?ctg=1">인턴십</a></li>
                        <li><a href="/recruit?ctg=2">JOB&헤드헌팅</a></li>
                    </ul>
                </li>
                <li>
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

                </li>
                <li>
                    <a href="/consult/qnaList">상담ㆍ신청</a>
                    <ul class="sub">
                        <li><a href="/consult/qnaList">Q&A</a></li>
                        <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                        <li><a href="/consult/visitConsult">방문상담 신청</a></li>
                        <li><a href="/consult/apply">포지션&연수 지원</a></li>
                        <li><a href="#">설명회 신청</a></li>
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
                        <li><a href="#">이력서 작성</a></li>
                        <li><a href="#">제출서류 관리</a></li>
                        <!--
                        <li><a href="#">관심프로그램</a></li>
                        <li><a href="#">지원현황관리</a></li>
                        <li><a href="#">수료현황</a></li>
                        <li><a href="#">취업증명서</a></li>
                        -->
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

<script src="https://code.jquery.com/jquery.js"></script>

<script>

	ViewBoardMenu();
	function ViewBoardMenu(){
		let str = "";
		$.ajax({
			url:"/board/get_boards",
			type:"post",
			dataType:"json",
			success: function(data){
				let board = data["board"];
				let group = data["group"];
                console.log(group);
                console.log(board);
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
                    }
				});
                
                news += "<ul class=\"sub\" style=\"display:none;\">";
                guide += "<ul class=\"sub\" style=\"display:none;\">";

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
                    }  
                })

                news += "</ul>";
                guide += "</ul>";


                $("#news").html(news);
                $("#guide").html(guide);


                //$("#boardMenu").append(str);
			}, error: function(e){
				console.log(e);
			}
		})
	}

</script>