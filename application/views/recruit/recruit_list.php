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
                                            <p>총 <?php echo $REC_LIST_COUNT?>개의 글이 등록 되어있습니다.</p>
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
                                                <!-- <td>
                                                    <span class="thumImg recuit_img">
                                                        <img src="<?php echo $REC->REC_THUMBNAIL?>">
                                                    </span>
                                                    <a class="fontcb" style="line-height:96px;" href ="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $REC->REC_SEQ?>"><?php echo $REC->REC_TITLE ?></a>
                                                </td> -->
                                                <td><a class="fontcb" style="line-height:96px;" href ="/recruit/recruit_view/<?php echo $CATEGORY?>/<?php echo $REC->REC_SEQ?>"><?php echo $REC->REC_TITLE ?></a></td>
                                                <td><?php echo $REC->ADMIN_USER_NAME ?></td>
                                                <td><!-- <span class="deadlineIcon">마감</span> <span class="recuitIcon">모집중</span> --><?php $REC->REC_STATUS==0 ? print("마감") : print("모집중") ?></td>
                                                <td><?php echo $REC->REC_COUNT ?></td>
                                                <td><?php echo explode(" ", $REC->REC_REG_DATE)[0] ?></td>
                                            </tr>
                                        <?php endforeach?>
                                        </tbody>
                                    </table>

                                    <?php echo $pagination; ?>

                                    <div class="boardSearchWrap">
                                        <form name="boardSearchForm" id="boardSearchForm" method="get">
                                        <input type="hidden" name="ctg" value="<?php echo $CATEGORY ?>">
                                        <!-- <input type="hidden" name="num" value=""> -->

                                            <div class="boardSearch">
                                                <select name="search_field">
                                                    <option value="all" <?php echo $searchField == "all" ?  "selected" : "" ?>>전체</option>
                                                    <option value="title" <?php echo $searchField == "title" ?  "selected" : "" ?>>제목</option>
                                                    <option value="writer" <?php echo $searchField == "writer" ?  "selected" : "" ?>>글쓴이</option>
                                                </select>
                                                <div class="inputSearch">
                                                    <input type="text" name="search_string" value="<?php echo $searchString; ?>" maxlength="50">
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






