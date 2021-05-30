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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>메일폼 관리</b> <span></span></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="#">회원관리</a></li>
                <li class="active">메일폼 관리</li>
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
                    <div class="table-responsive"  role="grid" id="basicDataTable_wrapper">
                      <table class="table datatable table-custom01 userTable">

                            <colgroup>
                                    <col width="5%"/>
                                    <col width="15%"/>
                                    <col width="60%"/>
                                    <col width="20%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">코드</th>
                                    <th class="text-center">메일폼 명칭</th>
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
                                    <td class="text-center"><?php echo $lt->MF_CODE; ?></td>
                                    <td class="text-center"><?php echo $lt->MF_NAME; ?></td>
                                    <td class="text-center">
                                        <a href="/admin/user/mailformModify/<?php echo $lt->MF_SEQ; ?>" class="btn btn-default btn-xs" >보기</a>
                                        <button class="btn btn-danger btn-xs mfDel" data-seq="<?php echo $lt->MF_SEQ; ?>">삭제</button>
                                    </td>
                                </tr>
                            <?php
                                    $pagenum--;
                                }
                            }else{
                                echo "<tr><td colspan=\"10\" align=\"center\"> 등록된 메일폼이 없습니다. </td></tr>";
                            }
                            ?>
                            </tbody>
                            </table>

                            <div class="row">
                                <div class="col-lg-4 text-right">
                                </div>
                                <div class="col-md-4 text-center sm-center">
                                    <div class="dataTables_paginate paging_bootstrap paging_custombootstrap">
                                        <?php  echo $pagination; ?>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <a href="/admin/user/mailFormWrite" type="button" class="btn btn-info btn-sm"> 메일폼 등록</a>
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
        console.log("ASDFASDFASDF");
        $(document).on("click", "#writeMsg", function(){
            $('#wform')[0].reset();
            $("#modalMessage").modal("show");
        });

        $(document).on("click", ".mfDel", function(){
             var seq = $(this).data("seq");

            if (confirm("통화내역을 삭제하시겠습니까?")){
                $.ajax({
                    url:"/admin/user/mailFormDelProc",
                    type:"post",
                    data:{
                        "mf_seq" : seq
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
