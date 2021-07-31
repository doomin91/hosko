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
                                <li class="on"><a href="/consult/visitConsult">방문상담신청</a></li>
                                <li><a href="/consult/apply">포지션&연수 지원</a></li>
                                <li><a href="#">설명회신청</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2>방문상담 신청</h2>
                                </div>
                                <div>
                                    <p>방문상담 셀프신청 이용안내</p>
                                    <p>STEP1 일정을 확인하고 상담을 원하는 날짜를 클릭해주세요</p>
                                    <p>STEP2 '상담신청' 버튼을 눌러 신청을 진행해주세요</p>
                                    <p style="padding-left:50px;">상담희망자의 이름과 상담희망시간, 연락처, 이메일은 필수적으로 적어주세요</p>
                                    <p style="padding-left:50px;">상담 가능한 시간은 월~금 오전 10시부터 오후5시까지 이며, 점심시간은 12시부터 오후 1시까지 1시간 입니다.</p>
                                    <p>STEP3 상담 신청완료를 진행하시면, HOSKO에서 확인전화를 통해 에약을 확정해드립니다.</p>
                                    <p>TIP** 방문상담 전에 홈페이지 회원가입을 진행해주세요. 기본적인 이력과 분야를 미리 분석하여 좀 더 정확하고 많은 정보를 제공해드립니다.</p>
                                </div>
                                
                                <div class="subContSec">
                                    <div class="col-lg-12">
                                        <div>
                                            <form name="form">
                                            <input type="hidden" name="mode" value="<?php echo $mode; ?>">
                                            <input type="hidden" name="vcon_seq" value="<?php echo $vcon_seq; ?>">
                                            <div>비밀번호 확인</div>
                                            <div><input type="password" name="password"></div>
                                            <div>
                                                <button type="button" class="btn_style02 f_left" id="consultSave">확인</button>
                                                <button type="button" class="btn_style01 f_left" id="consultCancel">취소</button>
                                            </div>
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

        $(document).on("click", "#consultCancel", function(){
            history.back();
        });

        $(document).on("click", "#consultSave", function(){
            var vcon_seq = $("input[name=vcon_seq]").val();
            var password = $("input[name=password]").val();
            var mode = $("input[name=mode]").val();

            if (password == ""){
                alert("비밀번호를 입력해주세요");
                $("input[name=password]").focus();
                return false;
            }
            
            $.ajax({
                url:"/Consult/VisitPassCheck",
                type:"post",
                dataType:"json",
                data : {
                    "vcon_seq" : vcon_seq,
                    "password" : password,
                    "mode" : mode
                }, success:function(data){
                    console.log(data);
                    if (data.code == "200"){
                        document.location.href=data.url+vcon_seq;
                    }else if(data.code == "201"){
                        alert(data.msg);
                        document.location.href="/consult/visitConsult";
                    }else{
                        alert(data.msg);
                    }
                }, error:function(e){
                    console.log(e);
                }
            })
        
        });

        $(document).on("click", ".vcon_delete", function(){
            seq = $(this).data("seq");
            document.location.href="/consult/visitConsultPassCheck/?vcon_seq="+seq+"&mode=delete";
        });
       

    });
</script>