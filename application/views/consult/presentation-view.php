<?php
    include_once dirname(__DIR__)."/header.php";
?>

    <body>

        <div id="wrap" class="main_wrap">

            <?php
                include_once dirname(__DIR__)."/nav.php";
            ?>

            <div id="container">
                <div class="layout_sub">
                    <div class="sub_visual v01">
                        <div class="sub_visual_text">
                            <h1>상담ㆍ신청</h1>
                            <p>HOSPITALITY KOREA</p>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category">
                            <ul>
                                <li><a href="/consult/qnaList">Q&A</a></li>
                                <li><a href="/consult/onlineConsultList">온라인 상담</a></li>
                                <li><a href="/consult/visitConsult">방문상담신청</a></li>
                                <li><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li class="on"><a href="/consult/presentationList">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>설명회 신청</h2>
                                </div>
                                <div class="subContSec">
                                    <table class="tableCont01 dataTable applyViewTable">
                                        <colgroup>
                                            <col width="10%"/>
                                            <col width="90%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>제 목</th>
                                                <th class="tal pl20"><?php echo $info->PT_SUBJECT; ?>	</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">
                                                    <?php echo $info->PT_CONTENTS;?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                             
                                    <div class="boardBtnArea pb50">
                                        <div class="btn_box f_right">
                                            <button type="button" class="btn_style01 mr10" onclick="location.href='/consult/presentationList'">목록보기</button>
                                        <?php if ($this->session->userdata("USER_SEQ") == ""){ ?>
                                            <button type="button" class="btn_style02 " onclick="alert('로그인 해주세요');">바로신청</button>
                                        <?php }else{ ?>
                                            <button type="button" class="btn_style02" id="pt_apply">바로신청</button>
                                        <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>

        <?php
            include_once dirname(__DIR__)."/footer.php";
        ?>

        </div>

    </body>
</html>
<script type="text/javascript">
    $(function(){
        $(document).on("click", "#pt_apply", function(){
            var pt_seq = "<?php echo $info->PT_SEQ; ?>";
            
            if (confirm("설명회 신청 하시겠습니까?")){
                $.ajax({
                    url:"/Consult/presentationApply",
                    type:"post",
                    dataType:"json",
                    data : {
                        "pt_seq" : pt_seq,
                    }, success:function(data){
                        console.log(data);
                        if (data.code == "200"){
                            alert(data.msg);
                            document.location.href="/consult/presentationList";
                        }else{
                            alert(data.msg);
                        }
                    }, error:function(e){
                        console.log(e);
                    }
                })
            }
        })
    });
</script>