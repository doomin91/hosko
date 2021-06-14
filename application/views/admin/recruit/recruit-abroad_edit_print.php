<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-ｅquiv='Content-Type' content='text/html; charset=utf-8'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="/assets/css/font-awesome.css" rel="stylesheet">
        <style>
            body { font-family:'NanumGothic', '나눔고딕', 'dotum', '돋움'; font-size: 10px; line-height:18px; -webkit-font-smoothing: antialiased; }
            .print_content {position:relative; width:700px;  }
            .print_content .header-text p {font-size: 13px;}
            .table {position:relative; width:100%;border-bottom:1px solid #777575;}
            .table table {width: 100%; border-spacing: 0;  }
            .table table tr {height: 35px; line-height: 18px; padding: 5px 0;  }
            .table table tr th {text-align: left; font-weight: bold;  padding-left: 5px; background-color:#e5e5e5; border-top:1px solid #777575; }
            .table table tr td {padding-left:10px; padding-top:5px; padding-bottom:5px; border-top:1px solid #777575; word-break: break-all}
            .approval_div {width: 160px; padding:5px; float:left;}
            .box_h30 {height:30px; vertical-align: middle; line-height: 30px; border-top-left-radius: 5px; border-top-right-radius: 5px; text-align: center; border:1px solid #777575;}
            .box_h60 {height:50px; vertical-align: middle; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align: center; line-height: 22px; text-align: center; margin-top:-1px; border:1px solid #777575;}
            .comment {width: 100%;}
            .comment .comment_name {width: 100px; display: inline-block}
            .comment .comment_description {width: 300px; display: inline-block; word-break:break-all}
            .comment .comment_date {width: 130px; display: inline-block}

            .table_c {position:relative; width:100%; border-bottom:1px solid #777575;}
            .table_c table {width: 100%; border-spacing: 0; }
            .table_c table tr {height: 35px; line-height: 18px; padding: 5px 0; }
            .table_c table tr th {text-align:center; font-weight: bold; background:#e5e5e5; padding-left: 5px; border-top:1px solid #777575;}
            .table_c table tr td {padding-left:10px; padding-top:5px; padding-bottom:5px; text-align:center; border-top:1px solid #777575; word-break: break-all}
            .text-center {text-align:center;}
            .bg_bc01 {background-color:#e5e5e5; }
        </style>
    </head>
    <body class="bg-1">

        <!-- Preloader -->
        <div class="mask"><div id="loader"></div></div>
        <!--/Preloader -->

        <!-- Wrap all page content here -->
        <div id="wrap">

        <!-- Make page fluid -->
            <div class="row">

            <!-- Page content -->
            <div id="content" class="col-md-12">

            <!-- content main container -->
            <div class="main">

                <div class="row">
                    <div class="col-md-12">
                        <section class="tile transparent">
                            <!-- tile header -->
                            <div class="header-text">
                                <p class="apply_detail_view"><strong>기본정보</strong></p>
                            </div>
                            <!-- tile body -->
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyTopViewTable">
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-2">컨텐츠분류</th>
                                            
                                            <td class="col-sm-10">
                                                <div class="col-sm-2 ctg_select_form">
                                                    <select name="ctg" class="chosen-select chosen-transparent chosen-single form-control ctg_select search_field" >
                                                        <option value="" >:: 대분류 ::</option>
                                                        <option value="1" >인턴쉽</option>
                                                        <option value="2" >채용&헤드헌팅</option>
                                                        <option value="3" >유학</option>
                                                    </select>
                                                    
                                                    </div>
                                                <div class="col-sm-2 ctg_select_form ">
                                                    <select name="ctg2" class="chosen-select chosen-transparent form-control ctg_select search_field">
                                                        <option value="" selected>:: 중분류 ::</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-2 ctg_select_form">
                                                    <select name="ctg3" class="chosen-select chosen-transparent form-control ctg_select search_field">
                                                        <option value="" selected>:: 소분류 ::</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">컨텐츠명</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="abroad_contents_title" name="abroad_contents_title" value="<?php echo $ABROAD_INFO->REC_TITLE?>">
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">마감</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-6">
                                                    <label for="abroad_status_open"><input type="radio" name="abroad_status" id="abroad_status_open" value="1" <?php if($ABROAD_INFO->REC_STATUS == 1) echo "checked" ?>> 모집중 </label>
                                                    <label for="abroad_status_close"><input type="radio" name="abroad_status" id="abroad_status_close" value="0" <?php if($ABROAD_INFO->REC_STATUS == 0) echo "checked" ?>> 마감 </label>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">조회수</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="abroad_hit_count" name="abroad_hit_count" value="<?php echo $ABROAD_INFO->REC_COUNT?>">
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">담당</th>
                                            <td class="col-sm-10">
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="abroad_manager" name="abroad_manager" value="<?php echo $ABROAD_INFO->ADMIN_USER_ID?>">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                        <section class="tile transparent">
                            <!-- tile header -->
                            <div class="header-text">
                                <p class="apply_detail_view"><strong>컨텐츠정보</strong></p>
                            </div>
                            <!-- tile body -->
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyViewTable">
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-3" rowspan="12">컨텐츠 정보</th>
                                            <td class="col-sm-1">국가/도시</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_country" id="abroad_country"><?php echo $ABROAD_INFO->REC_COUNTRY?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">유학분류</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_type" id="abroad_type"><?php echo $ABROAD_INFO->REC_TYPE?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">기간</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_period" id="abroad_period"><?php echo $ABROAD_INFO->REC_PERIOD?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">채용분야</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_category" id="abroad_category"><?php echo $ABROAD_INFO->REC_CATEGORY?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">채용마감</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_deadline" id="abroad_deadline"><?php echo $ABROAD_INFO->REC_DEADLINE?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">면접방식</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_interview_type" id="abroad_interview_type"><?php echo $ABROAD_INFO->REC_INTERVIEW_TYPE?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">면접일자</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_interview_date" id="abroad_interview_date"><?php echo $ABROAD_INFO->REC_INTERVIEW_DATE?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">자격요건</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_prerequisite" id="abroad_prerequisite"><?php echo $ABROAD_INFO->REC_PREREQUISITE?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">급여</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_pay" id="abroad_pay"><?php echo $ABROAD_INFO->REC_PAY?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">숙소</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_accomdation" id="abroad_accomdation"><?php echo $ABROAD_INFO->REC_LODGIN?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">복지</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_welfare" id="abroad_welfare"><?php echo $ABROAD_INFO->REC_WELFARE?></textarea>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-1">비자</td>
                                            <td class="col-sm-8">
                                                <div class="col-sm-11">
                                                    <textarea class="form-control common_textarea wid100p" name="abroad_visa" id="abroad_visa"><?php echo $ABROAD_INFO->REC_VISA?></textarea>
                                                </div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                    <section class="tile transparent">
                            <!-- tile header -->
                            <div class="header-text">
                                <p class="apply_detail_view"><strong>컨텐츠사진</strong></p>
                            </div>
                            <!-- tile body -->
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyTopViewTable">
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-2">원본 이미지</th>
                                            <td>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <div class="input-group col-sm-12">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                <i class="fa fa-upload"></i><input type="file" id="abroad_origin_pic" name="abroad_pics[]">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control file_view" value="<?php echo $ABROAD_INFO->REC_THUMBNAIL?>" readonly="">
                                                        </div>
                                                        <p style="margin-top: 5px;">
                                                        원본이미지를 등록하면 나머지 이미지가 자동생성 됩니다.
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p style="margin-top: 7px; margin-left: -15px"> [GIF, JPG, PNG] </p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">컨텐츠목록 이미지 * <br> => 크기 : 200* x 200*</th>
                                            <td >
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <div class="input-group col-sm-12">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file disabled">
                                                                <i class="fa fa-upload"></i><input type="file" id="abroad_contents_pic" name="abroad_pics[]">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control file_view" value="<?php echo $ABROAD_INFO->REC_THUMBNAIL_R?>" readonly="">
                                                        </div>  
                                                    </div>
                                                </div>                                      
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">축소 이미지1 <br> => 크기 : 200 x 200</th>
                                            <td>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <div class="input-group col-sm-12">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file disabled">
                                                                <i class="fa fa-upload"></i><input type="file" id="abroad_contents_small_pic" name="abroad_pics[]">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control file_view" value="<?php echo $ABROAD_INFO->REC_THUMBNAIL_S?>" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">제품상세 이미지1 * <br> =>크기 : 200 x 200</th>
                                            <td>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <div class="input-group col-sm-12">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file disabled">
                                                                <i class="fa fa-upload"></i><input type="file" id="abroad_contents_medium_pic" name="abroad_pics[]">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control file_view" value="<?php echo $ABROAD_INFO->REC_THUMBNAIL_M?>" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="col-sm-2">확대 이미지1 * <br> =>크기 : 200 x 200</th>
                                            <td>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6">
                                                        <div class="input-group col-sm-12">
                                                            <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file disabled">
                                                                <i class="fa fa-upload"></i><input type="file" id="abroad_contents_large_pic" name="abroad_pics[]">
                                                                </span>
                                                            </span>
                                                            <input type="text" class="form-control file_view" value="<?php echo $ABROAD_INFO->REC_THUMBNAIL_L?>" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                            
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /row -->

                <div class="row">
                    <div class="col-md-12">
                    <section class="tile transparent">
                            <!-- tile header -->
                            <div class="header-text">
                                <p class="apply_detail_view"><strong>컨텐츠설명</strong></p>
                            </div>
                            <!-- tile body -->
                            <div class="tile-body color transparent-black rounded-corners">
                                <table class="table table-custom dataTable applyTopViewTable">`~
                                    <tbody>
                                        <tr>
                                            <th class="col-sm-12 text-center">상세설명</th>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-12">
                                                <div class="col-sm-12 transparent-editor">
                                                <textarea class="form-control" name="abroad_detail" id="abroad_detail"><?php echo $ABROAD_INFO->REC_CONTENTS?></textarea>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
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

        <style>
            .applyTopViewTable{
                height: 90px;
            }
            .apply_status_option{
                border-radius:5px; 
                margin-right: 5px;
                padding: 6px;
                border:0; 
                background-color:rgba(0, 0, 0, 0.3)
            }

            .common_select, .common_input{
                min-height: 30px;
                font-size: 12px !important;
            }
            
            .note-editable{
                overflow-y: auto;
            }
            
        </style>
    </body>
</html>
<script>
	window.print();
    window.onfocus=function(){ window.close();}
</script>