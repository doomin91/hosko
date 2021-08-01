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
                        <div class="sub_category02">
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
                                    <div class="row mb20">
                                        <div class="boardTotallist clearfix mb20">
                                            <p>총 88개의 글이 등록 되어있습니다.</p>
                                        </div>                                        
                                    </div>                                    
                                    <table class="tableCont">
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
                                                <th>번호</th>
                                                <th>제목</th>
                                                <th>글쓴이</th>
                                                <th>진행상황</th>
                                                <th>조회</th>
                                                <th>등록일</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($REC_LIST as $REC):?>
                                            <tr>
                                                <td><?php echo $REC->REC_SEQ ?></td>
                                                <td><span class="thumImg"><!--<img src="">--></span><a class="fontcb" href ="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $REC->REC_SEQ?>"><?php echo $REC->REC_TITLE ?></a></td>
                                                <td><?php echo $REC->ADMIN_USER_NAME ?></td>
                                                <td><!-- <span class="deadlineIcon">마감</span> <span class="recuitIcon">모집중</span> --><?php $REC->REC_STATUS==0 ? print("마감") : print("모집중") ?></td>
                                                <td><?php echo $REC->REC_COUNT ?></td>
                                                <td><?php echo explode(" ", $REC->REC_REG_DATE)[0] ?></td>
                                            </tr>
                                        <?php endforeach?>
                                        </tbody>
                                    </table>


                                    <div class="pagination">
                                        <a href="/" class="btn_prev"><span>맨처음</span></a>
                                        <span>1</span>
                                        <a href="/">2</a>
                                        <a href="/">3</a>
                                        <a href="/">4</a>
                                        <a href="/">5</a>
                                        <a href="/" class="btn_next"><span>맨마지막</span></a>
                                    </div>



                                    <div class="boardSearchWrap">
                                        <form name="" id="" method="">
                                        <input type="hidden" name="page" value="1">
                                        <input type="hidden" name="num" value="">

                                            <div class="boardSearch">
                                                <select name="">
                                                    <option value="all" selected="selected">전체</option>
                                                </select>
                                                <div class="inputSearch">
                                                    <input type="text" name="" value="" maxlength="50">
                                                    <input type="submit" value="">
                                                </div>
                                            </div>
                                        </form>
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

<script>
    $(function(){
        
    });
</script>






