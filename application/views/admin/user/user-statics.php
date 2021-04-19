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
            <h2><i class="fa fa-puzzle-piece" style="line-height: 48px;padding-left: 5px;"></i> <b>회원분석</b> <span></span></h2>
            <div class="breadcrumbs">
              <ol class="breadcrumb">
                <li>관리자 페이지</li>
                <li><a href="#">회원관리</a></li>
                <li class="active">회원분석</li>
              </ol>
            </div>

          </div>
          <!-- /page header -->

          <!-- content main container -->
          <div class="main">

            <div class="row">

            <!-- col 12 -->
            <div class="col-md-12">

                <!-- tile -->
               <section class="tile color transparent-black">

                  <!-- tile body -->
                    <div class="tile-body">
                        <div class="row">
                            <div class="title">등급별 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>등급</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($levRanks as $rank){
                            ?>
                                <tr>
                                    <td><?php echo $rank->LEVEL_NAME; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">성별 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>성별</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($genRanks as $rank){
                                    if ($rank->USER_SEX == "F"){
                                        $gender = "여성";
                                    }else if ($rank->USER_SEX == "M"){
                                        $gender = "남성";
                                    }else{
                                        $gender = "미선택";
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">연령 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>연령</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($geneRanks as $rank){
                            ?>
                                <tr>
                                    <td><?php echo $rank->GENERATION; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">지역별 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>지역</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($areaRank as $rank){
                            ?>
                                <tr>
                                    <td><?php echo $rank->AREA; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">가입경로 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>가입경로</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($joinRank as $rank){
                                    $joinRoute = "";
                                    switch($rank->USER_JOIN_ROUTE){
                                        case 1:
                                            $joinRoute = "신문광고";
                                            break;
                                        case 2:
                                            $joinRoute = "SNS매체";
                                            break;
                                        case 3:
                                            $joinRoute = "온라인검색";
                                            break;
                                        case 4:
                                            $joinRoute = "학교설명회/박람회";
                                            break;
                                        case 5:
                                            $joinRoute = "광고홍보물";
                                            break;
                                        case 6:
                                            $joinRoute = "친구/친척소개";
                                            break;
                                        case 7:
                                            $joinRoute = "교수님/선배소개";
                                            break;
                                        case 8:
                                            $joinRoute = "업체소개";
                                            break;
                                        case 9:
                                            $joinRoute = "기타";
                                            break;
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $joinRoute; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">희망국가 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>희망국가</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($hopeRank as $rank){
                                    $hopeCountry = "미선택";
                                    switch($rank->USER_HOPE_NATION){
                                        case 1:
                                            $hopeCountry = "미국";
                                            break;
                                        case 2:
                                            $hopeCountry = "괌";
                                            break;
                                        case 3:
                                            $hopeCountry = "일본";
                                            break;
                                        case 4:
                                            $hopeCountry = "호주";
                                            break;
                                        case 5:
                                            $hopeCountry = "중국";
                                            break;
                                        case 6:
                                            $hopeCountry = "유럼";
                                            break;
                                        case 7:
                                            $hopeCountry = "중동";
                                            break;
                                        case 8:
                                            $hopeCountry = "기타";
                                            break;
                                        case 9:
                                            $hopeCountry = "싱가포르";
                                            break;
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $hopeCountry; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">출국국가별 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>출국국가</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($leaveRank as $rank){
                            ?>
                                <tr>
                                    <td><?php echo $rank->USER_LEAVE_COUNTRY; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tile-body">
                        <div class="row">
                            <div class="title">지원부서별 통계</div>
                        </div>
                        <table class="table table-custom dataTable userTable">
                            <colgroup>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="20%"/>
                                <col width="40%"/>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>지원부서</th>
                                    <th>회원수</th>
                                    <th>비율</th>
                                    <th>그래프</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($hopePartRank as $rank){
                                     $hopePart = "미선택";
                                    switch($rank->USER_HOPE_PART){
                                        case 1:
                                            $hopePart = "Fornt Office";
                                            break;
                                        case 2:
                                            $hopePart = "F&B";
                                            break;
                                        case 3:
                                            $hopePart = "Culinary";
                                            break;
                                        case 4:
                                            $hopePart = "Housekeeping";
                                            break;
                                        case 5:
                                            $hopePart = "Cruises";
                                            break;
                                        case 6:
                                            $hopePart = "기타";
                                            break;
                                    }
                            ?>
                                <tr>
                                    <td><?php echo $hopePart; ?></td>
                                    <td><?php echo $rank->CNT; ?></td>
                                    <td><?php echo round($rank->CNT/($AllCount/100), 2); ?>%</td>
                                    <td>
                                        <div style="background:#418bca; width:<?php echo round($rank->CNT/($AllCount/100), 2); ?>%">&nbsp;</div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /tile body -->

                </section>
                <!-- /tile -->

            </div>

          </div>
          <!-- /content container -->

        </div>
        <!-- Page content end -->

      </div>
      <!-- Make page fluid-->

    </div>
    <!-- Wrap all page content end -->
    <div class="modal fade" id="modalAddLevel" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
                    <h4 class="modal-title" id="modalConfirmLabel">등급추가</h4>
                </div>
                <div class="modal-body">
                    <form name="saveForm" role="form">
                    <input type="hidden" name="level_seq">
                    <table class="table table-customdataTable ">
                        <colgroup>
                            <col width="30%"/>
                            <col width="70%"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>등급명</th>
                                <td><input type="text" class="form-control" id="level_name" name="level_name"></td>
                            </tr>
                            <tr>
                                <th>등급명</th>
                                <td>
                                    <select name="level_rank" id="level_rank">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>할인타입</th>
                                <td>
                                    <input type="radio" name="level_discount_unit" value="원" checked><label>원</label> (구매시 X원 할인 혜택을 드립니다.)<br>
                                    <input type="radio" name="level_discount_unit" value="%"><label>퍼센트</label> (구매시 X% 할인 혜택을 드립니다.)
                                </td>
                            </tr>
                            <tr>
                                <th>할인액</th>
                                <td><input type="text" class="form-control" id="level_discount" name="level_discount"></td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-red" data-dismiss="modal" aria-hidden="true">취소</button>
                    <button id="saveLevel" class="btn btn-green">저장하기</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php
        include_once dirname(__DIR__)."/admin-footer.php";
    ?>

</body>
</html>
<script type="text/javascript">
    $(function(){
        $(document).on("click", ".levelDelete", function(){
            var level_seq = $(this).data("key");

            if (confirm("회원등급을 삭제하시겠습니까?")){
                $.ajax({
                    url:"/admin/user/LevelDeleteProc",
                    type:"post",
                    data:{
                        "level_seq" : level_seq,
                    },
                    dataType:"json",
                    success:function(resultMsg){
                        if (resultMsg.code == "200"){
                            alert(resultMsg.msg);
                            document.location.reload();
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

        $(document).on("click", "#saveLevel", function(){
            var level_name = $("input[name=level_name]").val();
            var level_rank = $("select[name=level_rank]").val();
            var level_discount = $("input[name=level_discount]").val();
            var level_discount_unit = $("input:radio[name=level_discount_unit]").val();
            var level_seq = $("input[name=level_seq]").val();

            $.ajax({
                url:"/admin/user/LevelSaveProc",
                type:"post",
                data:{
                    "level_name" : level_name,
                    "level_rank" : level_rank,
                    "level_discount" : level_discount,
                    "level_discount_unit" : level_discount_unit,
                    "level_seq" : level_seq
                },
                dataType:"json",
                success:function(resultMsg){
                    if (resultMsg.code == "200"){
                        alert(resultMsg.msg);
                        document.location.reload();
                    }else{
                        alert(resultMsg.msg);
                    }
                },
                error:function(e){
                    console.log(e);
                }
            })
        });

        $(document).on("click", ".levelModify", function(){
            var level_seq = $(this).data("key");

            $.ajax({
                url:"/admin/user/getlevelInho",
                type:"post",
                data:{
                    "level_seq" : level_seq,
                },
                dataType:"json",
                success:function(resultMsg){
                    if (resultMsg.code == "200"){
                        console.log(resultMsg.result);
                        var rs = resultMsg.result;
                        $("input[name=level_name]").val(rs.LEVEL_NAME);
                        $("input[name=level_discount]").val(rs.LEVEL_DISCOUNT);
                        $("select[name=level_rank]").val(rs.LEVEL_RANK);
                        $("input[name=level_seq]").val(rs.LEVEL_SEQ);
                        $.each($("input:radio[name=level_discount_unit]"), function(){
                            if ($(this).val() == rs.LEVEL_DISCOUNT_UNIT){
                                $(this).prop("checked", true);
                            }else{
                                $(this).prop("checked", false);
                            }
                        })

                        $("#modalAddLevel").modal("show");
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
