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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>방문삼당 상세보기</b></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="index.html">상담관리</a></li>
                <li class="active">방문삼당 상세보기</li>
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
                        <input type="hidden" name="vcon_seq" value="<?php echo $info->VCON_SEQ; ?>">
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
                                    <td><input type="text" name="user_name" value="<?php echo $info->VCON_USER_NAME; ?>" size="50"></td>
                                    <th>나이</th>
                                    <td>
                                        <select name="user_age" class="">
                                            <option value="">시 선택</option>
                                            <?php for ($age = 1; $age<=40; $age++){ ?>
                                                <option value="<?php echo $age; ?>"  <?php if ($info->VCON_USER_AGE == $age) echo "selected"; ?>><?php echo $age; ?>세</option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>전화번호</th>
                                    <td><input type="text" name="user_tel" value="<?php echo $info->VCON_USER_TEL; ?>" size="50"></td>
                                    <th>이메일</th>
                                    <td><input type="text" name="user_email" value="<?php echo $info->VCON_USER_EMAIL; ?>" size="50"></td>
                                </tr>
                                <tr>
                                    <th>방문 신청일</th>
                                    <td><input type="text" class="datepicker" name="consult_date" value="<?php echo $info->VCON_CONSULT_DATE; ?>" size="50"></td>
                                    <th>방문 신청시간</th>
                                    <td>
                                        <?php
                                            $times = explode(":", $info->VCON_CONSULT_TIME);
                                        ?>
                                        <select name="consult_hour" class="">
                                            <option value="">시 선택</option>
                                            <?php for ($h = 10; $h<=20; $h++){ ?>
                                                <option value="<?php echo $h; ?>"  <?php if ($times[0] == $h) echo "selected"; ?>><?php echo $h; ?>시</option>
                                            <?php } ?>
                                        </select>
                                        &nbsp;:&nbsp;
                                        <select name="consult_minute" class="">
                                            <option value="">분 선택</option>
                                            <option value="00" <?php if ($times[1] == "00") echo "selected"; ?>>00분</option>
                                            <option value="20" <?php if ($times[1] == "20") echo "selected"; ?>>20분</option>
                                            <option value="40" <?php if ($times[1] == "40") echo "selected"; ?>>40분</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>학교명/직장명</th>
                                    <td><input type="text" name="user_comp" value="<?php echo $info->VCON_USER_COMP; ?>" size="50"></td>
                                    <th>학과</th>
                                    <td>
                                        <select name="user_depart">
                                            <option value="">전체</option>
                                            <option value="1" <?php if ($info->VCON_USER_MAJOR == "1") echo "selected"; ?>>호텔</option>
                                            <option value="2" <?php if ($info->VCON_USER_MAJOR == "2") echo "selected"; ?>>관광</option>
                                            <option value="3" <?php if ($info->VCON_USER_MAJOR == "3") echo "selected"; ?>>조리</option>
                                            <option value="4" <?php if ($info->VCON_USER_MAJOR == "4") echo "selected"; ?>>기타/외국어</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>전공</th>
                                    <td><input type="text" name="user_major" value="<?php echo $info->VCON_USER_MAJOR; ?>" size="50"></td>
                                    <th>점수</th>
                                    <td><input type="text" name="user_grades" value="<?php echo $info->VCON_USER_GRADES; ?>" size="50"></td>
                                </tr>
                                <tr>
                                    <th>채점결과</th>
                                    <td colspan="3">
                                        <textarea name="test_result"><?php echo $info->VCON_TEST_RESULT; ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>메일수신여부</th>
                                    <td colspan="3">
                                        <select name="mail_flag">
                                            <option value="N">미수신</option>
                                            <option value="Y">수신</option>
                                        </select>
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
