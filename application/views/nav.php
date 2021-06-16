<header>
    <div class="header_con">
        <h1><a href="/">Hosko</a></h1>
        <nav class="gnb">
            <ul class="gnb_depth_1" id="boardMenu">
                <!-- <li>HOME</li>
                <li>HOSKO</li> -->
                <!-- <li>공지&뉴스</li>
                <li>포지션 공고</li>
                <li>해외연수</li>
                <li>해외취업가이드</li> -->
                <!-- <li>상담ㆍ신청</li>
                <li>마이페이지</li> -->
            </ul>
        </nav>
        <!--
        <div class="header_util">
            <ul>
                <li>Login</li>
                <li>더보기</li>
            </ul>
        </div>
-->
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
                    str += "<li>마이페이지</li>"
				$("#boardMenu").append(str);
			}, error: function(e){
				console.log(e);
			}
		})
	}

</script>