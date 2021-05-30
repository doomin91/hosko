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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i><b>메일폼 수정</b></h2>
            <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li>회원관리</li>
                <li>메일폼 관리</li>
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
                        <form id="wform">
                        <input type="hidden" name="mf_seq" value="<?php echo $info->MF_SEQ; ?>"/>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="15%"/>
                                <col width="85%"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th>코드</th>
                                    <td><input type="text" name="mf_code" value="<?php echo $info->MF_CODE; ?>" size="50"></td>
                                </tr>
                                <tr>
                                    <th>메일폼 명칭</th>
                                    <td><input type="text" name="mf_name" value="<?php echo $info->MF_NAME; ?>" size="150"></td>
                                </tr>
                                <tr>
                                    <th>내용</th>
                                    <td>
                                        <textarea name="mf_body" style="height:300px"><?php echo $info->MF_BODY; ?></textarea>
                                        <br/><span class="bf">{DATE}</span>오늘날짜<span class="bf">{MEM_ID}</span>회원아이디<span class="bf">{MEM_PW}</span>회원비밀번호
                                        <br/><span class="bf">{MEM_NAME}</span>회원이름<span class="bf">{SITE_NAME}</span>사이트명<span class="bf">{SITE_EMAIL}</span>사이트 이메일
                                        <br/><span class="bf">{SITE_TEL}</span>사이트 전화번호<span class="bf">{SITE_URL}</span>사이트 주소로 변경되어 발송됩니다.
                                        <br/><span class="bf">{ORDER_INFO}</span>주문정보
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                         <div class="row form-footer">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                <button type="button" class="btn btn-primary btn-sm" id="saveMailform">저장</button>
                                <a href="/admin/user/mailFormList" type="button" class="btn btn-danger btn-sm">취소</a>
                            </div>
                        </div>

                    </div>
                  <!-- /tile body -->

                </section>


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

        $(document).on("click", "#saveMailform", function(){
            var mf_code = $("input[name=mf_code]").val();
            var mf_name = $("input[name=mf_name]").val();
            var mf_body = $("textarea[name=mf_body]").val();
            var mf_seq = $("input[name=mf_seq]").val();

            if (mf_code == ""){
                alert("코드를 입력해주세요");
                $("input[name=mf_code]").focus();
                return false;
            }

            if (mf_name == ""){
                alert("메일폼 명칭을 입력해주세요");
                $("input[name=mf_name]").focus();
                return false;
            }

            if (mf_body == ""){
                alert("메일폼 내용을 입력해주세요");
                $("input[name=mf_body]").focus();
                return false;
            }

            $.ajax({
                url:"/admin/user/mailFormModifyProc",
                type:"post",
                data:{
                    "mf_seq" : mf_seq,
                    "mf_code" : mf_code,
                    "mf_name" : mf_name,
                    "mf_body" : mf_body,
                },
                dataType:"json",
                success:function(resultMsg){
                    console.log(resultMsg);
                    if (resultMsg.code == "200"){
                        alert(resultMsg.msg);
                        document.location.href="/admin/user/mailFormList";
                        //document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e.responseText);
                }
            })
        });
    });
</script>
