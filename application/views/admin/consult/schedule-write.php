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
                                    <td><input type="text" name="user_name" value="<?php echo $this->session->userdata("admin_name"); ?>" size="50" readonly></td>
                                    <th>이메일</th>
                                    <td><input type="text" name="user_name" value="<?php echo $this->session->userdata("admin_email"); ?>" size="50" readonly></td>
                                </tr>
                                <tr>
                                    <th>일정 날짜</th>
                                    <td colspan="3"><?php echo $nDay; ?></td>
                                </tr>
                                <tr>
                                    <th>일정 제목</th>
                                    <td colspan="3"><input type="text" name="cal_title" value="" size="100"></td>
                                </tr>
                                <tr>
                                    <th>일정 내용</th>
                                    <td colspan="3">
                                        <textarea name="cal_schedule"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <a href="/admin/consult/schedule?flag=<?php echo $flag; ?>" class="btn btn-default btn-sm">취소</a>
                                <button type="button" class="btn btn-primary btn-sm" id="saveSchedule">저장</a>
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

        $(document).on("click", "#saveSchedule", function(){
            var flag = "<?php echo $flag; ?>";
            var cal_date = "<?php echo $nDay; ?>";
            var cal_title = $("input[name=cal_title]").val();
            var cal_schedule = $("textarea[name=cal_schedule]").val();

            $.ajax({
                url:"/admin/consult/scheduleWriteProc",
                type:"post",
                data:{
                    "flag" : flag,
                    "cal_date" : cal_date,
                    "cal_title" : cal_title,
                    "cal_schedule" : cal_schedule,
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert(resultMsg.msg);
                        document.location.href="/admin/consult/schedule?flag="+flag;
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
