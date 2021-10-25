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
                    <div class="col-lg-12 align-center">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                        <form name="weekForm" method="get">
                            <div class="col-lg-2 align-right">
                                <a href="/admin/consult/schedule?flag=<?php echo $flag; ?>&strYear=<?php echo $year; ?>&strMon=<?php echo $month-1; ?>" class="btn btn-default btn-sm" id="prevMon"><</a>
                            </div>
                            <div class="col-lg-4">
                                <select name="strYear" class="form-control" style="height:30px !important;">
                                <?php
                                    for ($i=(date("Y")-3); $i<(date("Y")+3); $i++):
                                ?>
                                    <option value="<?php echo $i; ?>" <?php if ($year == $i) echo "selected"; ?>><?php echo $i; ?>년</option>
                                <?php
                                    endfor;
                                ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select name="strMon" class="form-control" style="height:30px !important;">
                                <?php
                                    for ($i=1; $i<=12; $i++):
                                ?>
                                    <option value="<?php echo $i; ?>" <?php if ($month == $i) echo "selected"; ?>><?php echo $i; ?>월</option>
                                <?php
                                    endfor;
                                ?>
                                </select>
                            </div>
                            <div class="col-lg-2 align-left">
                                <a href="/admin/consult/schedule?flag=<?php echo $flag; ?>&strYear=<?php echo $year; ?>&strMon=<?php echo $month+1; ?>" class="btn btn-default btn-sm" id="nextMon">></a>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
                      <table class="table datatable table-custom01" id="calendarTable">

                            <colgroup>
                                    <col width="14%"/>
                                    <col width="14%"/>
                                    <col width="14%"/>
                                    <col width="14%"/>
                                    <col width="14%"/>
                                    <col width="14%"/>
                                    <col width="14%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">일</th>
                                    <th class="text-center">월</th>
                                    <th class="text-center">화</th>
                                    <th class="text-center">수</th>
                                    <th class="text-center">목</th>
                                    <th class="text-center">금</th>
                                    <th class="text-center">토</th>
                                </tr>
                            </thead>
                            <tbody id="">
                            <?php
                                $startW = date("w", strtotime($year . "-" . $this->customclass->numConvertString($month) . "-01"));
                
                                $endDay = date("t", strtotime($year . "-" . $this->customclass->numConvertString($month) . "-01"));
                                $endW = date("w", strtotime($year . "-" . $this->customclass->numConvertString($month) . "-" . $endDay));
                                $start = 0-$startW;
                                $end = $endDay + (7-$endW);
                                echo "<tr>";
                                for ($i=$start; $i<($end-1); $i++){
                                    //echo $year. "-" . $month . "-" . $i . "<br>";
                                    $_nDay = $year . "-" . $this->customclass->numConvertString($month) . "-" . $this->customclass->numConvertString($i+1);
                                    //echo $_nDay;
                                    $_nW = date("w", strtotime($_nDay));
                                    if ($i<0 || ($i+1)>$endDay){
                                        echo "<td></td>";
                                    }else{
                                    //    echo "<td>";
                                    //    echo "<span class=\"col-lg-12 date-block\">".$_nDay."</span>";
                                    //    echo "<div class=\"col-lg-12\">김인호</div>";
                                    //    echo "</td>";
                                    $slists = $this->customclass->getSchedule($_nDay, $flag);
                                    //print_r($slists);
                                ?>
                                    <td>
                                        <div class="col-lg-12 date-block"><a href="/admin/consult/schedule_write/<?php echo $_nDay; ?>/?flag=<?php echo $flag; ?>"><?php echo $this->customclass->numConvertString($i+1); ?></a></div>
                                        <?php foreach ($slists as $slt): ?>
                                        <div class="col-lg-12 schedule-item"><a href="/admin/consult/schedule_view/<?php echo $slt->CAL_SEQ; ?>/<?php echo $flag; ?>"><?php echo $slt->CAL_TITLE; ?></a></div>
                                        <?php endforeach; ?>
                                    </td>
                                <?php
                                    }
                                    if ($_nW == 6){
                                        echo "</tr><tr>";
                                    }
                                }
                                echo "</tr>";
                            ?>
                            </tbody>
                            </table>
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
        //console.log("ASDFASDFASDF");
        $(document).on("click", "#writeMsg", function(){
            $('#wform')[0].reset();
            $("#modalMessage").modal("show");
        });

        $(document).on("click", "#saveMessage", function(){
            var manager_name = $("input[name=manager_name]").val();
            var user_seq = $("input[name=user_seq]").val();
            var user_name = $("input[name=user_name]").val();
            var user_company = $("input[name=user_company]").val();
            var call_message = $("textarea[name=call_message]").val();
            var consult_date = $("input[name=consult_date]").val();
            var interest = $("select[name=interest]").val();
            var lang_skill = $("select[name=lang_skill]").val();
            var clog_seq = $("input[name=clog_seq]").val();
            var clog_mode = $("input[name=clog_mode]").val();

            $.ajax({
                url:"/admin/user/userCallMsgProc",
                type:"post",
                data:{
                    "manager_name" : manager_name,
                    "user_seq" : user_seq,
                    "user_name" : user_name,
                    "user_company" : user_company,
                    "call_message" : call_message,
                    //"consult_date" : consult_year + "-" + numLneCheck(consult_month) + "-" + numLneCheck(consult_day),
                    "consult_date" : consult_date,
                    "interest" : interest,
                    "lang_skill" : lang_skill,
                    "clog_seq" : clog_seq,
                    "clog_mode" : clog_mode
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);

                    if (resultMsg.code == "200"){
                        alert(resultMsg.msg);
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            })
        });

        $(document).on("click", ".clogView", function(){
            var seq = $(this).data("seq");

            $.ajax({
                url:"/admin/user/getCallMsg",
                type:"post",
                data:{
                    "clog_seq" : seq
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        //alert(resultMsg.msg);
                        //document.location.reload();
                        var result = resultMsg.result;

                        $("input[name=manager_name]").val(result.CLOG_MANAGER_NAME);
                        $("input[name=user_name]").val(result.CLOG_USER_NAME);
                        $("input[name=user_company]").val(result.CLOG_USER_COMPANY);
                        $("input[name=consult_date]").val(result.CLOG_CONSULT_DATE);
                        $("textarea[name=call_message]").val(result.CLOG_MESSAGE);
                        $("select[name=interest]").val(result.CLOG_INTEREST);
                        $("select[name=lang_skill]").val(result.CLOG_LANG_SKILL);
                        $("input[name=clog_seq]").val(result.CLOG_SEQ);
                        $("input[name=clog_mode]").val("modify");
                        $("#modalMessage").modal("show");
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            })
        })

        $(document).on("click", ".clogDel", function(){
             var seq = $(this).data("seq");

            if (confirm("통화내역을 삭제하시겠습니까?")){
                $.ajax({
                    url:"/admin/user/deleteCallMsg",
                    type:"post",
                    data:{
                        "clog_seq" : seq
                    },
                    dataType:"json",
                    success:function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert(resultMsg.msg);
                            document.location.reload();
                        }else{
                            alert(resultMsg.msg);
                        }
                    },
                    error:function(e){
                        console.log(e.responseText);
                    }
                })
            }
        });

        function numLneCheck(num){
            if (parseInt(num) < 10){
                num = "0"+num;
            }

            return num;
        }
    });
</script>
