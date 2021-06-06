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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b><?php echo $flag_string; ?></b> <span></span></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="#">상담관리</a></li>
                <li class="active"><?php echo $flag_string; ?></li>
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
                                    <th>이름</th>
                                    <td><input type="text" name="user_name" value="<?php echo $this->session->userdata("admin_name"); ?>" size="50"></td>
                                    <th>이메일</th>
                                    <td><input type="text" name="user_name" value="<?php echo $this->session->userdata("admin_email"); ?>" size="50"></td>
                                </tr>
                                <tr>
                                    <th>일정 날짜</th>
                                    <td colspan="3"><?php echo $nDay; ?></td>
                                </tr>
                                <tr>
                                    <th>일정 제목</th>
                                    <td colspan="3"><input type="text" name="user_tel" value="" size="100"></td>
                                </tr>
                                <tr>
                                    <th>일정 날짜</th>
                                    <td colspan="3">
                                        <textarea name="test_result"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <a href="/admin/consult/visitConsult" class="btn btn-default btn-sm">취소</a>
                                <button type="button" class="btn btn-primary btn-sm" id="editConsult">저장</a>
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

        $(document).on("click", "#editConsult", function(){
            var user_name = $("input[name=user_name]").val();
            var user_age = $("select[name=user_age]").val();
            var user_tel = $("input[name=user_tel]").val();
            var user_email = $("input[name=user_email]").val();
            var consult_date = $("input[name=consult_date]").val();
            var consult_hour = $("select[name=consult_hour]").val();
            var consult_minute = $("select[name=consult_minute]").val();
            var user_comp =-$("input[name=user_comp]").val();
            var user_depart = $("select[name=user_depart]").val();
            var user_major = $("input[name=user_major]").val();
            var user_grades = $("input[name=user_grades]").val();
            var test_result = $("textarea[name=test_result]").val();
            var mail_flag = $("select[name=mail_flag]").val();
            var vcon_seq = $("input[name=vcon_seq]").val();

            if (confirm("방문상담 신청서 수정 하시겠습니까?")){

                $.ajax({
                    url:"/admin/consult/consultEditProc",
                    type:"post",
                    data:{
                        "user_name" : user_name,
                        "user_age" : user_age,
                        "user_tel" : user_tel,
                        "user_email" : user_email,
                        "consult_date" : consult_date,
                        "consult_time" : consult_hour + ":" + consult_minute,
                        "user_comp" : user_comp,
                        "user_depart" : user_depart,
                        "user_major" : user_major,
                        "user_grades" : user_grades,
                        "test_result" : test_result,
                        "mail_flag" : mail_flag,
                        "vcon_seq" : vcon_seq
                    },
                    dataType:"json",
                    success:function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert(resultMsg.msg);
                            document.location.href="/admin/consult/visitConsult";
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
