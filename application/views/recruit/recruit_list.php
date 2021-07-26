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
                    <div class="sub_visual v03">
                        <div class="sub_visual_text">
                            <h1>HOSKO</h1>
                        </div>

                    </div>
                    <div class="sub_contents">
                        <div class="sub_category01">
                            <ul>
                                <li <?php $CATEGORY==1 ? print("class='on'") : "" ?> ><a href="/recruit?ctg=1">인턴쉽</a></li>
                                <li <?php $CATEGORY==2 ? print("class='on'") : "" ?>><a href="/recruit?ctg=2">JOB·헤드헌팅</a></li>
                            </ul>
                        </div>

                        <div class="inner">
                            <div class="subContWrap">
                                <div class="subTit">
                                    <h2><?php $CATEGORY==1 ? print("인턴쉽") : print("JOB·헤드헌팅") ?></h2>
                                </div>

                                <div class="subContSec">
                                    <table class="table">
                                        <colgroup>
                                                <col width="5%"/>
                                                <col width="55%"/>
                                                <col width="10%"/>
                                                <col width="10%"/>
                                                <col width="10%"/>
                                                <col width="10%"/>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th class="text-center">번호</th>
                                                <th class="text-center">제목</th>
                                                <th class="text-center">글쓴이</th>
                                                <th class="text-center">진행상황</th>
                                                <th class="text-center">조회</th>
                                                <th class="text-center">등록일</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($REC_LIST as $REC):?>
                                            <tr>
                                                <td><?php echo $REC->REC_SEQ ?></td>
                                                <td><a href ="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $REC->REC_SEQ?>"><?php echo $REC->REC_TITLE ?></a></td>
                                                <td><?php echo $REC->ADMIN_USER_NAME ?></td>
                                                <td><?php $REC->REC_STATUS==0 ? print("마감") : print("모집중") ?></td>
                                                <td><?php echo $REC->REC_COUNT ?></td>
                                                <td><?php echo explode(" ", $REC->REC_REG_DATE)[0] ?></td>
                                            </tr>
                                        <?php endforeach?>
                                        </tbody>
                                    </table>
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

<script>
    $(function(){
        
    });
</script>






