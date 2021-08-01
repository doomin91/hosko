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
                                    <td colspan="3">
                                        <input type="text" name="pt_subject" class="wid90p">
                                    </td>
                                </tr>
                                <tr>
                                    <th>설명회 날짜</th>
                                    <td>
                                        <input type="text" name="pt_date" class="wid90p datepicker">
                                    </td>
                                    <th>신청자 제한</th>
                                    <td>
                                        <input type="text" name="pt_apply_cnt" class="wid90p">
                                    </td>
                                </tr>
                                <tr>
                                    <th>설명회 내용</th>
                                    <td colspan="3" style="padding-right:10px !important">
                                        <textarea name="qna_contents" class="wid90p" id="post_contents" style="height:350px"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <button type="button" class="btn btn-primary btn-sm" id="seveBtn">설명회 등록</button>
                                <a href="/admin/consult/presentationList" class="btn btn-default btn-sm">취소</a>
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
        $("#post_contents").Editor();

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

        $(document).on("click", "#seveBtn", function(){
            var pt_subject = $("input[name=pt_subject]").val();
            var pt_date = $("input[name=pt_date]").val();
            var pt_apply_cnt = $("input[name=pt_apply_cnt]").val();
            var pt_contents = $("#post_contents").Editor("getText");

            $.ajax({
                url:"/admin/consult/presentationWriteProc",
                type:"post",
                data:{
                    "pt_subject" : pt_subject,
                    "pt_date" : pt_date,
                    "pt_apply_cnt" : pt_apply_cnt,
                    "pt_contents" : pt_contents
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){ 
                        alert(resultMsg.msg);
                        document.location.href="/admin/consult/presentationList";
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e);
                }
            })
        });
    });
</script>
