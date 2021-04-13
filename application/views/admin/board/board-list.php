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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>게시판 목록</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">게시판관리</a></li>
				<li class="active">게시판 목록</li>
			  </ol>
			</div>

		  </div>
		  <!-- /page header -->

		  <!-- content main container -->
		  <div class="main">

			<div class="row">


<!-- col 12 -->
<div class="col-md-12">
                
                
                <!-- tile -->
                <section class="tile transparent">

                  <!-- tile body -->
                  <div class="tile-body color transparent-black rounded-corners">
                    
                    <div class="table-responsive">
                      <table  class="table table-datatable table-custom">
                        <thead>
                          <tr>
                            <th class="sort-numeric">#</th>
                            <th class="sort">게시판명</th>
							<th class="sort">게시판 그룹</th>
							<th class="sort">관리자</th>
							<th class="sort">비밀글</th>
							<th class="sort">추천</th>
							<th class="sort">하단노출</th>
							<th class="sort">스팸체크</th>
							<th class="sort">댓글</th>
							<th class="sort">파일업로드 갯수</th>
							<th class="sort">리스트 출력수</th>
							<th class="sort">게시판 메모</th>
							<th class="sort">등록일</th>
							<th class="sort">#</th>
                          </tr>
                        </thead>
                        <tbody id="boardItems">
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <!-- /tile body -->

                </section>
                <!-- /tile -->

			</div>

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
	view_board_list();

	function view_board_list(){
		$.ajax({
			url:"/admin/board/get_boards",
			type:"post",
			dataType:"json",
			success:function(data){
				let str = "";
				$.each(data, function(index, value){
					str += "<tr onclick=\"view_board("+  value["BOARD_SEQ"] +")\" style=\"cursor:pointer\">";
					str += "<td>" + (index+1) + "</td>";
					str += "<td>" + value["BOARD_KOR_NAME"] + "</td>";
					str += "<td>" + value["BOARD_GROUP"] + "</td>";
					str += "<td>" + value["BOARD_ADMIN_ID"] + "</td>";
					str += "<td>" + value["BOARD_SECRET_FLAG"] + "</td>";
					str += "<td>" + value["BOARD_RECOMMAND_FLAG"] + "</td>";
					str += "<td>" + value["BOARD_BOTTOM_LIST_FLAG"] + "</td>";
					str += "<td>" + value["BOARD_SPAM_CHECK_FLAG"] + "</td>";
					str += "<td>" + value["BOARD_COMMENT_FLAG"] + "</td>";
					str += "<td>" + value["BOARD_FILEUPLOAD_COUNT"] + "</td>";
					str += "<td>" + value["BOARD_LIST_COUNT"] + "</td>";
					str += "<td>" + value["BOARD_MEMO"] + "</td>";
					str += "<td>" + value["BOARD_REG_DATE"] + "</td>";
					str += "<td><button class=\"btn btn-xs btn-danger\" onclick=\"del_board(" + value["BOARD_SEQ"] + ")\">삭제</button></td>";
					str += "</tr>";
				})
				$("#boardItems").html(str);
			},
			error:function(e){
				alert("게시판 목록을 불러 올 수 없습니다.");
			}
		})
	}

	function del_board(BOARD_SEQ){
		if(confirm("게시판을 삭제하시겠습니까?")){
			$.ajax({
				url : "/admin/board/del_board",
				type : "post",
				data : {
					"BOARD_SEQ" : BOARD_SEQ
				},
				dataType : "json",
				success : function(){
					console.log("삭제되었습니다.");
					location.reload();
				},
				error : function(){
					console.log("삭제할 수 없습니다.");
				}
			});
		}
	}

	function view_board(BOARD_SEQ){
		location.href="/admin/board/board_view/" + BOARD_SEQ;
	}

</script>

</body>
</html>

