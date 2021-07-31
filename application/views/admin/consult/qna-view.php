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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>Q&A 게시판</b> <span></span></h2>
			<div class="breadcrumbs">
			  <ol class="breadcrumb">
				<li>관리자 페이지</li>
				<li><a href="#">상담관리</a></li>
				<li class="active">Q&A 게시판</li>
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
                                    <td colspan="3"><?php echo $info->QNA_SUBJECT; ?></td>
                                </tr>
                                <tr>
                                    <th>이름</th>
                                    <td colspan="3"><?php echo $info->QNA_USER_NAME; ?></td>
                                </tr>
                                <tr>
                                    <th>이메일</th>
                                    <td colspan="3"><?php echo $info->QNA_USER_EMAIL; ?></td>
                                </tr>
                                <tr>
                                    <th>상담 내용</th>
                                    <td colspan="3" style="padding-right:10px !important"><?php echo nl2br($info->QNA_CONTENTS); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <?php if ($info->QNA_ADMIN_SEQ == ""){ ?>
                                <a href="/admin/consult/qnaAnswer/<?php echo $info->QNA_SEQ; ?>" class="btn btn-primary btn-sm">답변하기</a>
                                <?php }else if ($info->QNA_ADMIN_SEQ != ""){ ?>
                                    <button class="btn btn-danger btn-sm" data-seq="<?php echo $info->QNA_SEQ; ?>" id="qna_del">삭제</button>
                                    <button class="btn btn-primary btn-sm">수정</button>
                                <?php } ?>
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
