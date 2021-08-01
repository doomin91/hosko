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
			<h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>설명회 관리</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">상담관리</a></li>
				<li class="active">설명회 관리</li>
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
                        <form name="form1" id="form1" method="post">
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="15%"/>
                                <col width="35%"/>
                                <col width="15%"/>
                                <col width="35%"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>제목</th>
                                    <td colspan="3"><?php echo $info->PT_SUBJECT; ?></td>
                                </tr>
                                <tr>
                                    <th>작성자</th>
                                    <td><?php echo $info->ADMIN_NAME; ?></td>
                                    <th>등록일</th>
                                    <td><?php echo $info->PT_REG_DATE; ?></td>
                                </tr>
                                <tr>
                                    <th>설명회 날짜</th>
                                    <td><?php echo $info->PT_DATE; ?></td>
                                    <th>신청자수 제한</th>
                                    <td><?php echo $info->PT_APPLY_CNT; ?></td>
                                </tr>
                                <tr>
                                    <th>설명회 내용</th>
                                    <td colspan="3" style="padding-right:10px !important"><?php echo nl2br($info->PT_CONTENTS); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <button class="btn btn-danger btn-sm" data-seq="<?php echo $info->PT_SEQ; ?>" id="qna_del">삭제</button>
                                <button class="btn btn-primary btn-sm">수정</button>
                                <a href="/admin/consult/qnaList" class="btn btn-default btn-sm">목록</a>
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
            color: "black",
            zindex: "20000"
        });
        $(".datepicker").datepicker();

        $(document).on("click", "#qna_del", function(){
            var qna_seq = $(this).data("seq");

            if (confirm("Q&A 답변 삭제 하시겠습니까?")){
                $.ajax({
                    url:"/admin/consult/qnaAnswerDelete",
                    type:"post",
                    data:{
                        "qna_seq" : qna_seq
                    },
                    dataType:"json",
                    success:function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert(resultMsg.msg);
                            document.location.href="/admin/consult/qnaList";
                        }else{
                            alert(resultMsg.msg);
                        }
                    },
                    error:function(e){
                        console.log(e);
                    }
                })
            }
        });
    });
</script>
