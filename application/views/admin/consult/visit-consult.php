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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>방문 상담</b> <span></span></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="#">상담관리</a></li>
                <li class="active">방문 상담</li>
              </ol>
            </div>

          </div>
          <!-- /page header -->

          <!-- content main container -->
          <div class="main">
            <div class="row">
                <div class="col-md-12">
                   <section class="tile color transparent-black">
                        <div class="tile-body">
                            <table class="table table-custom datatable userTable">
                                <colgroup>
                                    <col width="15%"/>
                                    <col width="85%"/>
                                </colgroup>
                                <tbody>
                                <form name="sform"  method="get" action="/admin/consult/visitConsult">
                                    <tr>
                                        <th>신청일</th>
                                        <td>
                                            <div class="col-md-2">
                                                <input name="consult_date_start" type="text" class="wid100p datepicker" value="<?php //echo $reg_date_start; ?>">
                                            </div>
                                            <div class="col-md-2">
                                                <input name="consdult_date_end" type="text" class="wid100p datepicker" value="<?php //echo $reg_date_end; ?>">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>신청시간</th>
                                        <td>
                                            <div class="col-md-2">
                                                <select name="consult_hour" class="wid100p">
                                                    <option value="">전체</option>
                                                    <?php for ($h = 10; $h<=20; $h++){ ?>
                                                        <option value="<?php echo $h; ?>"><?php echo $h; ?>시</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="consult_minute" class="wid100p">
                                                    <option value="">전체</option>
                                                    <option value="00">00분</option>
                                                    <option value="20">20분</option>
                                                    <option value="40">40분</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                   <tr>
                                        <th>나이</th>
                                        <td>
                                            <div class="col-md-2">
                                                <select name="user_age" class="wid100p">
                                                    <option value="">전체</option>
                                                    <?php for ($i = 1; $i<=50; $i++){ ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?>세</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>학과</th>
                                        <td>
                                            <div class="col-md-2">
                                                <select name="user_major" class="wid100p">
                                                    <option value="">전체</option>
                                                    <option value="1">호텔</option>
                                                    <option value="2">관광</option>
                                                    <option value="3">조리</option>
                                                    <option value="4">기타/외국어</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>회원등급</th>
                                        <td colspan="3">
                                            <div class="col-md-2">
                                                <select name="search_field" class="wid100p">
                                                    <option value="all">전체</option>
                                                    <option value="USER_NAME">이름</option>
                                                    <option value="USER_COIMPANY">학교/회사명</option>
                                                    <option value="USER_MAJOR">전공</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="search_string" class="wid100p" placeholder="검색어를 입력해주세요">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">
                                            <button class="btn btn-primary" type="submit">검색하기</button>
                                        </td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

            <!-- row -->
            <div class="row">

                <!-- col 6 -->
                <div class="col-md-12">
                <!-- tile -->


                <section class="tile color transparent-black">
                  <!-- tile body -->
                  <div class="tile-body">
                    <div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
                      <table class="table datatable table-custom01 userTable">

                            <colgroup>
                                    <col width="5%"/>
                                    <col width="10%"/>
                                    <col width="5%"/>
                                    <col width="10%"/>
                                    <col width="10%"/>
                                    <col width="5%"/>
                                    <col width="5%"/>
                                    <col width="15%"/>
                                    <col width="5%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">이름</th>
                                    <th class="text-center">나이</th>
                                    <th class="text-center">신청일</th>
                                    <th class="text-center">신청시간</th>
                                    <th class="text-center">점수</th>
                                    
                                    <th class="text-center">연락처</th>
                                    <th class="text-center">이메일</th>
                                    <th class="text-center"> - </th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            if (!empty($lists)){
                                foreach ($lists as $lt){
                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $pagenum; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_USER_NAME; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_USER_AGE; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_CONSULT_DATE; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_CONSULT_TIME; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_USER_GRADES; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_USER_TEL; ?></td>
                                    <td class="text-center"><?php echo $lt->VCON_USER_EMAIL; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-default btn-xs vconView" href="/admin/consult/visitConsultEdit/<?php echo $lt->VCON_SEQ; ?>">보기</a>
                                        <button class="btn btn-danger btn-xs vconDel" data-seq="<?php echo $lt->VCON_SEQ; ?>">삭제</button>
                                    </td>
                                </tr>
                        <?php
                                    $pagenum--;
                                }
                            }else{
                                echo "<tr><td colspan=\"10\" align=\"center\">등록된 방문 상담건이 없습니다.</td></tr>";
                            }
                        ?>
                            </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center sm-center">
                                    <div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
                                        <?php  echo $pagination; ?>
                                    </div>
                                </div>

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
