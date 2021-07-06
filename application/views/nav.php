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
                <li>
                    <a href="#">공지 & 뉴스</a>
                    <ul class="sub">
                        <li><a href="#">호스코뉴스</a></li>
                        <li><a href="#">해외취업 후기</a></li>
                        <li><a href="#">출국회원소식</a></li>
                        <li><a href="#">동영상자료실</a></li>
                        <li><a href="#">갤러리</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">포지션 공고</a>
                    <ul class="sub">
                        <li><a href="#">인턴십</a></li>
                        <li><a href="#">JOB&헤드헌팅</a></li>
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
                <li>
                    <a href="#">해외취업가이드</a>
                    <ul class="sub">
                        <li><a href="#">이력서 가이드</a></li>
                        <li><a href="#">영어인터뷰 대비</a></li>
                        <li><a href="#">스폰서인터뷰 대비</a></li>
                        <li><a href="#">미국대사관인터뷰 대비</a></li>
                        <li><a href="#">해외취업 전략설명회</a></li>
                        <li><a href="#">해외진출 성공스토리</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">상담ㆍ신청</a>
                    <ul class="sub">
                        <li><a href="#">Q&A</a></li>
                        <li><a href="#">온라인 상담</a></li>
                        <li><a href="#">방문상담 신청</a></li>
                        <li><a href="#">포지션&연수 지원</a></li>
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
                        <li><a href="#">정보 관리</a></li>
                        <li><a href="#">이력서 작성</a></li>
                        <li><a href="#">제출서류 현황</a></li>
                        <li><a href="#">관심프로그램</a></li>
                        <li><a href="#">지원현황관리</a></li>
                        <li><a href="#">수료현황</a></li>
                        <li><a href="#">취업증명서</a></li>
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
			url:"/admin/Board/get_boards",
			type:"post",
			dataType:"json",
			success: function(data){
				let board = data["board"];
				let group = data["group"];
                
				str += "<li>&nbsp</li>";
                str += "<li><a href=\"/\">HOME</a></li>";
                str += "<li>HOSKO</li>";
				$.each(group, function(index, value){
					str += "<li class=\"dropdown\">"
					str += "<a href=\"/Board/q/" + value["GP_SEQ"] + "\">"
					str += "<i class=\"fa fa-caret-right\"></i>" + value["GP_NAME"] + " <b class=\"fa fa-plus dropdown-plus\"></b>"
					str += "</a>";
					str += "</li>";
				});
                    str += "<li>상담ㆍ신청</li>"
                    str += "<li><a href=\"/member/member_input_step1\">회원가입</a></li>"
				console.log(str);
                //$("#boardMenu").append(str);
			}, error: function(e){
				console.log(e);
			}
		})
	}

</script>