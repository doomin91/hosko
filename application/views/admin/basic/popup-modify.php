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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>팝업등록 </b></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="index.html">팝업관리</a></li>
                <li class="active">팝업 등록하기</li>
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
                        <input type="hidden" name="popup_seq" value="<?php echo $info->POP_SEQ; ?>">
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="15%"/>
                                <col width="35%"/>
                                <col width="15%"/>
                                <col width="35%"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>팝업 제목</th>
                                    <td colspan="3"><input type="text" name="popup_subject" size="150" value="<?php  echo $info->POP_TITLE; ?>"></td>
                                </tr>
                                <tr>
                                    <th>시작일</th>
                                    <td><input type="text" name="popup_start" class="datepicker" value="<?php echo $info->POP_START; ?>" size="20" readonly></td>
                                    <th>종료일</th>
                                    <td><input type="text" name="popup_end" class="datepicker" value="<?php echo $info->POP_END; ?>" size="20" readonly></td>
                                </tr>
                                <tr>
                                    <th>팝업크기(가로)</th>
                                    <td><input type="number" name="popup_width" value="<?php echo $info->POP_WIDTH; ?>" size="10">px</td>
                                    <th>팝업크기(세로)</th>
                                    <td><input type="number" name="popup_height" value="<?php echo $info->POP_HEIGHT; ?>" size="10">px</td>
                                </tr>
                                <tr>
                                    <th>위치(top)</th>
                                    <td><input type="number" name="popup_x" value="<?php echo $info->POP_LOCAT_X; ?>" size="10">px</td>
                                    <th>위치(left)</th>
                                    <td><input type="number" name="popup_y" value="<?php echo $info->POP_LOCAT_Y; ?>" size="10">px</td>
                                </tr>
                                <tr>
                                    <th>팝업내용</th>
                                    <td colspan="3">
                                        <textarea class="common_input wid100p" name="popup_contents" id="popup_contents"><?php echo $info->POP_CONTENTS; ?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <a href="/admin/basic/managers" class="btn btn-default btn-sm">취소</a>
                                <button type="button" class="btn btn-primary btn-sm" id="savePopup">저장</a>
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
        $("#popup_contents").Editor();
        $("#popup_contents").Editor('setText', '<?php echo str_replace("'", "\'", $info->POP_CONTENTS);?>');
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
	        color: "black"
	    });
		$(".datepicker").datepicker();

        //$("#popup_contents").Editor();

        $(document).on("click", "#savePopup", function(){
            var popup_seq = $("input[name=popup_seq]").val();
            var popup_subject = $("input[name=popup_subject]").val();
            var popup_start = $("input[name=popup_start]").val();
            var popup_end = $("input[name=popup_end]").val();
            var popup_width = $("input[name=popup_width]").val();
            var popup_height = $("input[name=popup_height]").val();
            var popup_x = $("input[name=popup_x]").val();
            var popup_y = $("input[name=popup_y]").val();
            var popup_contents = $("#popup_contents").Editor("getText");

            var diffDate_1 = popup_start instanceof Date ? popup_start : new Date(popup_start);
            var diffDate_2 = popup_end instanceof Date ? popup_end : new Date(popup_end);

            diffDate_1 = new Date(diffDate_1.getFullYear(), diffDate_1.getMonth()+1, diffDate_1.getDate());
            diffDate_2 = new Date(diffDate_2.getFullYear(), diffDate_2.getMonth()+1, diffDate_2.getDate());

            //var diff = Math.abs(diffDate_2.getTime() - diffDate_1.getTime());
            var diff = diffDate_2.getTime() - diffDate_1.getTime();
            //diff = Math.ceil(diff / (1000 * 3600 * 24));
            //console.log(diff);
            diff = diff / (1000 * 3600 * 24);

            //console.log(diff);
            
            if (popup_subject == ""){
                alert("팝업제목을 입력하세요");
                $("input[name=popup_subject]").focus();
                return false;
            }

            if (popup_start == ""){
                alert("시작일을 입력하세요");
                $("input[name=popup_start]").focus();
                return false;
            }

            if (popup_end == ""){
                alert("종료일을 입력하세요");
                $("input[name=popup_end]").focus();
                return false;
            }

            if (diff < 0){
                alert("팝업시작일보다 종료일이 전 날짜일수는 없습니다.");
                return false;
            }

            $.ajax({
                url:"/admin/basic/popupModifyProc",
                type:"post",
                data:{
                    "popup_seq" : popup_seq,
                    "popup_subject" : popup_subject,
                    "popup_start" : popup_start,
                    "popup_end" : popup_end,
                    "popup_width" : popup_width,
                    "popup_height" : popup_height,
                    "popup_x" : popup_x,
                    "popup_y" : popup_y,
                    "popup_contents" : popup_contents
                },
                dataType:"json",
                success:function(resultMsg){
                    if (resultMsg.code == "200"){
                        alert(resultMsg.msg);
                        document.location.href="/admin/basic/popupList";
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
