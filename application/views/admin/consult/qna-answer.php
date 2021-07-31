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
                        <input type="hidden" name="qna_seq" value="<?php echo $info->QNA_SEQ; ?>">
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="15%"/>
                                <col width="85%"/>
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
                                <tr>
                                    <th>답변 제목</th>
                                    <td colspan="3">
                                        <input type="text" name="qna_subject" class="wid90p">
                                    </td>
                                </tr>
                                <tr>
                                    <th>답변 내용</th>
                                    <td colspan="3" style="padding-right:10px !important">
                                        <textarea name="qna_contents" class="wid90p" style="height:350px"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <a href="/admin/consult/qnaView/<?php echo $info->QNA_SEQ; ?>" class="btn btn-default btn-sm">목록</a>    
                                <button type="button" class="btn btn-primary btn-sm" id="answerSave">답변저장</button>
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

        $(document).on("click", "#answerSave", function(){
            var qna_seq = $("input[name=qna_seq]").val();
            var qna_subject = $("input[name=qna_subject]").val();
            var qna_contents = $("textarea[name=qna_contents]").val();

            if (confirm("온라인상담 답변 저장 하시겠습니까?")){
                $.ajax({
                    url:"/admin/consult/qnaAnswerSave",
                    type:"post",
                    data:{
                        "qna_seq" : qna_seq,
                        "qna_subject" : qna_subject,
                        "qna_contents" : qna_contents
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
