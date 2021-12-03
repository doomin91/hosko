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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>온라인상담 상세보기</b></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="index.html">상담관리</a></li>
                <li class="active">온라인상담 상세보기</li>
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
                        <input type="hidden" name="oc_seq" value="<?php echo $info->OC_SEQ; ?>">
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
                                    <td colspan="3"><?php echo $info->OC_SUBJECT; ?></td>
                                </tr>
                                <tr>
                                    <th>이름</th>
                                    <td colspan="3"><?php echo $info->OC_USER_NAME; ?></td>
                                </tr>
                                <tr>
                                    <th>전화번호</th>
                                    <td><?php echo $info->OC_USER_TEL; ?></td>
                                    <th>휴대폰번호</th>
                                    <td><?php echo $info->OC_USER_HP; ?></td>
                                </tr>
                                <tr>
                                    <th>이메일</th>
                                    <td colspan="3"><?php echo $info->OC_USER_EMAIL; ?></td>
                                </tr>
                                <tr>
                                    <th>상담 내용</th>
                                    <td colspan="3" style="padding-right:10px !important"><?php echo nl2br($info->OC_CONTENTS); ?></td>
                                </tr>
                                <?php if ($info->OC_ANSWER_FLAG == "W"){ ?>
                                <tr>
                                    <th>답변</th>
                                    <td colspan="3" style="padding-right:10px !important">
                                        <textarea name="oc_answer" rows="15"></textarea>
                                    </td>
                                </tr>
                                <?php }else if ($info->OC_ANSWER_FLAG == "Y"){ ?>
                                <tr>
                                    <th>담당자</th>
                                    <td><?php echo $info->ADMIN_NAME; ?></td>
                                    <th>답변일</th>
                                    <td><?php echo $info->OC_ANSWER_DATE; ?></td>
                                </tr>
                                <tr>
                                    <th>답변</th>
                                    <td colspan="3" style="padding-right:10px !important">
                                        <?php echo nl2br($info->OC_ANSWER); ?>
                                    </td>
                                </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                            <?php if ($info->OC_ANSWER_FLAG == "W"){ ?>    
                                <a href="/admin/consult/onlineConsult" class="btn btn-default btn-sm">취소</a>
                                <button id="onlineDelete" data-seq="<?php echo $info->OC_SEQ; ?>" class="btn btn-danger btn-sm">삭제</button>
                                <button type="button" class="btn btn-primary btn-sm" id="answer_save">답변저장</a>
                            <?php }else if ($info->OC_ANSWER_FLAG == "Y"){ ?>
                                <button id="onlineDelete" data-seq="<?php echo $info->OC_SEQ; ?>" class="btn btn-danger btn-sm">삭제</button>
                                <a href="/admin/consult/onlineConsult" class="btn btn-primary btn-sm">목록</a>
                            <?php }  ?>
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

        $(document).on("click", "#answer_save", function(){
            var oc_seq = $("input[name=oc_seq]").val();
            var oc_answer = $("textarea[name=oc_answer]").val();

            if (confirm("온라인상담 답변 저장 하시겠습니까?")){
                $.ajax({
                    url:"/admin/consult/onlineConsultAnswer",
                    type:"post",
                    data:{
                        "oc_seq" : oc_seq,
                        "oc_answer" : oc_answer,
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

        $(document).on("click", "#onlineDelete", function(){
            var oc_seq = $(this).data("seq");

            if (confirm("온라인상담 삭제 하시겠습니까?")){
                $.ajax({
                    url:"/admin/consult/onlineConsultDelete",
                    type:"post",
                    data:{
                        "oc_seq" : oc_seq
                    },
                    dataType:"json",
                    success:function(resultMsg){
                        console.log(resultMsg);
                        if (resultMsg.code == "200"){
                            alert(resultMsg.msg);
                            document.location.href="/admin/consult/onlineConsult";
                        }else{
                            alert(resultMsg.msg);
                        }
                    },
                    error:function(e){
                        console.log(e);
                    }
                })
            }
        })
    });
</script>
